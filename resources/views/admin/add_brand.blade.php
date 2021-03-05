@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
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
                    <form role="form" action="{{URL::to('/save-brand')}}" method="post" id="frm_brand">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <input type="text" class="form-control" name="brand_name" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                        <label>Mô tả thương hiệu</label>
                            <textarea style="resize: none;" rows="5" class="ckeditor form-control" name="brand_desc" placeholder="Mô tả thương hiệu">
                            </textarea>
                        </div>
                        <div class="form-group">
                        <label>Hiển thị</label>
                            <select name="brand_status" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_brand" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection