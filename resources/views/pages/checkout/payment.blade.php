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

	<div class="table-responsive cart_info">
		<?php 
		$content = Cart::content();
		?>
		<table class="table table-condensed ">
			<thead>
				<tr class="cart_menu">
					<td class="image">Hình ảnh</td>
					<td class="name">Tên sản phẩm</td>
					<td class="price">Giá</td>
					<td class="quantity">Số lượng</td>
					<td class="total">Tổng tiền</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach($content as $v_content)
				<tr>
					<td class="cart_product">
						<a href="">
							<img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt=""/>
						</a>
					</td>
					<td class="cart_name">
						<h4 style="color: #787672;">{{$v_content->name}}</h4>
					</td>
					<td class="cart_price">
						<p style="padding-top:10px;">{{number_format($v_content->price).' VNĐ'}}</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<form action="{{URL::to('update-cart-quantity')}}" method="post">
								{{csrf_field()}}
								<input class="cart_quantity_input" type="number" name="cart_quantity" value="{{$v_content->qty}}" min="1">
								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
								<input class="cart_quantity_update btn-success" type="submit" value="Cập nhật" name="update_quantity">
							</form>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price" style="padding-top:10px;">
							<?php 
							$subtotal = $v_content->price * $v_content->qty;
							echo number_format($subtotal).' VNĐ'
							?>
						</p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<h4 style="margin:40px 0;">Chọn hình thức thanh toán</h4>
	<form method="post" action="{{URL::to('/order')}}">
		{{csrf_field()}}
		<div class="payment-options">
				<!-- <span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span> -->
				<span>
					<label><input name="payment_options" value="1" type="radio"> Chuyển khoản</label>
				</span>
				<span>
					<label><input name="payment_options" value="2" type="radio"> Nhận tiền mặt</label>
				</span>
				
		</div>
		<div class="form-group">
			<input type="submit" name="send_order" class="btn btn-primary btn--payment" value="Đặt hàng">
		</div>
	</form>
</section> <!--/#cart_items-->
@endsection('content')