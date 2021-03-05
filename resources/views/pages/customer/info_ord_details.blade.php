@extends('layout')
@section('content')

<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
		  <li class="active">Chi tiết đơn hàng</li>
		</ol>
	</div>

	<div class="table-responsive cart_info">
		<form action="{{URL::to('/update-cart')}}" method="post">	
			{{csrf_field()}}
			<table class="table table-condensed table-cart table-order_details">
				<thead>
					
					<tr class="cart_menu">
						<td class="image">Tên sản phẩm</td>
						<td class="name">Giá sản phẩm</td>
						<td class="price">Số lượng</td>
						<td class="total">Thành tiền</td>
					</tr>
					
				</thead>
				<tbody>
					@php
						$totalPrice=0;
					@endphp
					@foreach($cus_order_details as $key => $cusorder_details)
					@php
						$totalPrice +=$cusorder_details->product_price*$cusorder_details->product_sales_quantity ;
					@endphp
					<tr >
						<td id="td-order" class="name-td">{{$cusorder_details->product_name}}</td>
						<td>{{number_format($cusorder_details->product_price).' VND'}}</td>
						<td>{{$cusorder_details->product_sales_quantity}}</td>
						<td class="price-td">{{number_format($cusorder_details->product_price*$cusorder_details->product_sales_quantity).' VND'}}</td>
					</tr>

					@endforeach
					<tr>
						<td colspan="3" class="name-td">Tổng tiền</td>
						<td class="price-td">{{number_format($totalPrice).' VND'}}</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<a href="{{url::to('/don-hang/'.$cusorder_details->customer_id)}}" class="btn btn-primary pull-right">Trở lại</a>
@endsection