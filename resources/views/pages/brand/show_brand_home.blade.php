@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->

    @foreach($brand_name as $key => $brand_name)
    <h2 class="title text-center">{{$brand_name->brand_name}}</h2>
    @endforeach

    @foreach($brand_by_id as $key => $product)
    <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
    <div class="col-sm-4 product-ipad">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="product-info text-center">
                        <form>
                            {{csrf_field()}}
                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                            <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
                                <div class="product-info__image">
                                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="product-image" alt="" />
                                </div>
                                <h2>{{number_format($product->product_price).' VNĐ'}}</h2>
                                <p class="product-name">{{$product->product_name}}</p>
                            </a>
                            <button type="button" name="add-to-cart" style="margin-left: 0;" class="btn btn-fefault cart add-to-cart" data-id_product="{{$product->product_id}}">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm giỏ hàng
                            </button>
                        </form>
                    </div>
                    
            </div>
            <!-- <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    </a>
    @endforeach
</div><!--features_items-->
@endsection