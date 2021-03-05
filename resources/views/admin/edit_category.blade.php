@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <?php 
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="message">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                    @foreach($edit_category as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category/'.$edit_value->category_id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" value="{{$edit_value->category_name}}" class="form-control" name="category_name" placeholder="Tên danh mục">
                            @if ($errors->has('category_name'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('category_name') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mô tả danh mục</label>
                            <textarea style="resize: none;" rows="5" class="ckeditor form-control" name="category_desc" placeholder="Mô tả danh mục">
                                {{$edit_value->category_desc}}
                            </textarea>
                        </div>
                        <button type="submit" name="update_category" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection