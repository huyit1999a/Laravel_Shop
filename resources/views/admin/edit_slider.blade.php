@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật slider
                </header>
                <div class="panel-body">
                    <?php 
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="message">'.$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                    <div class="position-center">
                        @foreach($edit_slider as $key => $slider)
                        <form id="frm_edit_slider" role="form" action="{{URL::to('/update-slider/'.$slider->slider_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="example">Tên slider</label>
                            <input type="text" class="form-control" name="slider_name" placeholder="Tên slider" id="example" value="{{$slider->slider_name}}">
                            @if ($errors->has('slider_name'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('slider_name') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                       
                        <div class="form-group">
                            <label for="example">Hình ảnh slider</label>
                            <input type="file" class="form-control" name="slider_image" id="example">
                            <img src="{{URL::to('public/uploads/slider/'.$slider->slider_image)}}" height="100" width="100">
                             @if ($errors->has('slider_image'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('slider_image') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                       
                       <!--  <div class="form-group">
                            <label for="example">Hiển thị</label>
                            <select name="product_status" class="form-control">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div> -->
                        <button type="submit" name="update_product" class="btn btn-info">Cập nhật slider</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
@endsection