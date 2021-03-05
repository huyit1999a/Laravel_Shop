@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
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
                        <form role="form" action="{{URL::to('/save-category')}}" method="post" id="frm_category">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Tên danh mục">
                            <!--  required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên danh mục')" oninput="setCustomValidity('')" -->
                        </div>
                        <div class="form-group">
                            <label>Mô tả danh mục</label>
                            <textarea style="resize: none;" rows="5" class="ckeditor form-control" name="category_desc" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="category_status" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_category" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection