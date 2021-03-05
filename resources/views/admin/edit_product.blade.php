@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
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
                        @foreach($edit_product as $key => $product)
                        <form id="frm_edit_product" role="form" action="{{URL::to('/update-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="example">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm" id="example" value="{{$product->product_name}}">
                            @if ($errors->has('product_name'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('product_name') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="example">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm" id="example" value="{{$product->product_price}}">
                             @if ($errors->has('product_price'))
                                <span class="invalid" >
                                    <strong>
                                        {{ $errors->first('product_price') }}
                                    </strong>                   
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="example">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="example">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" height="100" width="100">
                            
                        </div>
                        <div class="form-group">
                            <label for="example">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" rows="5" class="ckeditor form-control" name="product_desc" placeholder="Mô tả sản phẩm">
                                {{$product->product_desc}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="example">Nội dung sản phẩm</label>
                            <textarea style="resize: none;" rows="5" class="ckeditor form-control" name="product_content" placeholder="Nội dung sản phẩm">
                                {{$product->product_content}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="example">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control">
                                @foreach($cate_product as $key => $cate)
                                    @if($cate->category_id == $product->category_id)    
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control">
                                @foreach($brand_product as $key => $brand)    
                                    @if($brand->brand_id == $product->brand_id)   
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                       <!--  <div class="form-group">
                            <label for="example">Hiển thị</label>
                            <select name="product_status" class="form-control">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div> -->
                        <button type="submit" name="update_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
@endsection