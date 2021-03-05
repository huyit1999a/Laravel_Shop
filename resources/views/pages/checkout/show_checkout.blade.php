@extends('layout')
@section('content')
<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
		  <li class="active">Thanh toán giỏ hàng</li>
		</ol>
	</div><!--/breadcrums-->

	<div class="review-payment">
		<h2>Xem lại giỏ hàng</h2>
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
			<table class="table table-condensed table-cart" style="table-layout:fixed;">
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
							<p style="padding-top:10px;">{{number_format($cart['product_price'],0,',','.').' đ'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								
								<input class="cart_quantity" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1">
									
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price" style="padding-top: 10px;">
								{{number_format($subtotal,0,',','.').' đ'}}
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
						<td>
							<!-- <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>  -->
						</td>
						<td colspan="2" >
							<div style="margin-left: -150px;">
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
	<div class="row">
		<div class="col-sm-10 clearfix">
			<?php 
				$customer_id = Session::get('customer_id');
				if($customer_id){
					
				}
				else {
					echo '	<div class="register-req">
							<p>Vui lòng đăng ký hoặc đăng nhập để thanh toán</p>
							</div>';
				}
			?>
			<div class="bill-to">
				<p>Thông tin khách hàng</p>
				<div class="form-one" id="form-checkout">
					<form action="{{URL::to('/order')}}" method="post">
						{{csrf_field()}}
						
						<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên" required>
						<div class="error" style="color:red; margin: -5px 0 5px 0;"></div>
						<input type="email" name="shipping_email" class="shipping_email" placeholder="Email" required=>
						<div class="error" style="color:red; margin: -5px 0 5px 0;"></div>
						<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ" required>
						<div class="error" style="color:red; margin: -5px 0 5px 0;"></div>
						<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại" required>
						<div class="error" style="color:red; margin: -5px 0 5px 0;"></div>
						<textarea name="shipping_note" class="shipping_note" placeholder="Ghi chú của bạn" rows="4"></textarea>
						<div style="margin-top: 6px;">
							<label>Chọn hình thức thanh toán</label>
							<select name="payment_select" class="payment_select">
								<option value="1">Chuyển khoản</option>
								<option value="2">Trả tiền mặt</option>
							</select>
							<!-- <label style="margin-right: 30px;"><input name="shipping_method" class="shipping_method" value="1" type="radio"> Chuyển khoản</label>
							<label><input name="shipping_method" class="shipping_method" value="2" type="radio"> Trả bằng tiền mặt</label> -->
						</div>
						<input type="button" name="send_order" class="btn btn-primary btn--order send_order" value="Đặt hàng">
					</form>
				</div>
			</div>
		</div>

	</div>
</section> <!--/#cart_items-->

@endsection('content')