@extends('layout')
@section('content')

<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
		  <li class="active">Đơn hàng của bạn</li>
		</ol>
	</div>

	<div class="table-responsive cart_info">
		<form action="{{URL::to('/update-cart')}}" method="post">	
			{{csrf_field()}}
			<table class="table table-condensed table-cart">
				<thead>
					
					<tr class="cart_menu">
						<td class="image">Mã đơn hàng</td>
						<td class="name">Trạng thái đơn hàng</td>
						<td class="price">Ngày đặt</td>
						<td>Chi tiết</td>
					</tr>
					
				</thead>
				<tbody>
					@foreach($customer_order as $key => $cusorder)
					<tr>
						<td>{{$cusorder->order_code}}</td>
						<td>
							@if($cusorder->order_status==0)
								<span style="color:red;">Đang chờ duyệt</span>
							@else 
								<span style="color:green;">Đã được xử lý</span>
							@endif
						</td>
						<td>{{$cusorder->order_day}}</td>
						<td>
							<a href="{{url::to('/chi-tiet-don-hang/'.$cusorder->order_id)}}">Chi tiết đơn hàng</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>	
	</div>
	<a href="{{url::to('/thong-tin/'.$cusorder->customer_id)}}" class="btn btn-primary pull-right">Trở lại</a>
@endsection