@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                <?php 
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="message">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                    @foreach($edit_brand as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-brand/'.$edit_value->brand_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" value="{{$edit_value->brand_name}}" class="form-control" name="brand_name" placeholder="Tên thương hiệu">
                            @if ($errors->has('brand_name'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('brand_name') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none;" rows="5" class="ckeditor form-control" name="brand_desc" placeholder="Mô tả thương hiệu">
                                {{$edit_value->brand_desc}}
                            </textarea>
                        </div>
                        <button type="submit" name="update_brand" class="btn btn-info">Cập nhật thương hiệu</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection