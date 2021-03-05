@extends('layout')
@section('content')
<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
		  <li class="active">Giỏ hàng của bạn</li>
		</ol>
	</div>
	@if(session()->has('message'))
        <div class="alert alert-success">
            {!! session()->get('message') !!}
        </div>
    @elseif(session()->has('error'))
         <div class="alert alert-danger">
            {!! session()->get('error') !!}
        </div>
    @endif
	<div class="table-responsive cart_info">
		<form action="{{URL::to('/update-cart')}}" method="post">	
			{{csrf_field()}}
			<table class="table table-condensed table-cart"  style="table-layout:fixed;">
				<thead>
					<tr class="cart_menu">
						<td width="15%" class="image">Hình ảnh</td>
						<td width="30%" class="name">Tên sản phẩm</td>
						<td width="15%" class="price">Giá sản phẩm</td>
						<td width="15%" class="quantity">Số lượng</td>
						<td width="20%" class="total">Thành tiền</td>
						<td width="5%"></td>
					</tr>
				</thead>
				<tbody>
					@if(Session::get('cart')==true)

					@php
						$total = 0;
					@endphp

					@foreach(Session::get('cart') as $key => $cart)
						@php
							$subtotal = $cart['product_price']*$cart['product_qty'];
							$total += $subtotal;
						@endphp
					<tr>
						<td class="cart_product">
							<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="60" alt="{{$cart['product_name']}}"/>
						</td>
						<td class="td_cart_name">
							<h4 style="color: #787672;">{{$cart['product_name']}}</h4>
						</td>
						<td class="cart_price">
							<p style="padding-top:10px;">{{number_format($cart['product_price'],0,',','.').'đ'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								
								<input class="cart_quantity" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1">
									
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price" style="padding-top: 10px;">
								{{number_format($subtotal,0,',','.').'đ'}}
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-prod/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="2">
							<input class="cart_quantity_update btn btn-default check_out" type="submit" value="Cập nhật giỏ hàng" name="update_qty">
						</td>
						<td>
							<a class="btn btn-default check_out" href="{{URL::to('/delete-all-prod')}}" style="margin-left: -150px;">Xóa giỏ hàng</a> 
						</td>
						@if(Session::get('customer_id')==true)
						<td>
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}" style="margin-left: -150px !important;">Thanh toán</a> 
						</td>
						@else
						<td>
							<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}" style="margin-left: -110px !important;">Thanh toán</a> 
						</td>
						@endif

						<td colspan="2">
							<div style="margin-left: -40px;">
								<li style="margin-top: 14px;">Tổng: <span>{{number_format($total,0,',','.').' VNĐ'}}</span></li>
								<li>Phí vận chuyển: <span>Free</span></li>
								<li>Thành tiền: <span>{{number_format($total,0,',','.').' VNĐ'}}</span></li>
							</div>
						</td>
					</tr>
					@else
					<tr>
						<td colspan="5"><center>
						@php
						echo 'Vui lòng thêm sản phẩm vào giỏ hàng';
						@endphp
						</td></center>
					</tr>
					@endif
				</tbody>
			</table>
		</form>
	</div>
</section> <!--/#cart_items-->

@endsection