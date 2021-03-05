@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Slider
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
                        <form role="form" action="{{URL::to('/save-slider')}}" method="post" id="frm_slider" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" class="form-control" name="slider_name" placeholder="Tên slider">
                            @if ($errors->has('slider_name'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('slider_name') }}
                                    </strong>                   
                                </span>
                            @endif
                            <!--  required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên danh mục')" oninput="setCustomValidity('')" -->
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="slider_image">    
                            @if ($errors->has('slider_image'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('slider_image') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="slider_status" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_slider" class="btn btn-info">Thêm slider</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection