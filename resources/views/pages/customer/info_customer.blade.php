@extends('layout')
@section('content')
@foreach($customer_info as $key => $customer)
<section id="customer_info">
	<div class="breadcrumbs">
		<ol class="breadcrumb breadcrumb--customer">
		  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
		  <li class="active">Thông tin của bạn</li>
		</ol>
	</div>

	
    <div class="row">
    	<div class="col-sm-6 clearfix" >
    		<h3>Thông tin của bạn</h3>
	 	<?php 
            $message = Session::get('message');
            if($message){
                echo '<span class="message">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
			<form action="{{URL::to('/update-info/'.$customer->customer_id)}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">Họ và tên</label>
					<input type="text" value="{{$customer->customer_name}}" class="form-control" style="width: 50%" name="customer_name">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ email</label>
					<input type="email" value="{{$customer->customer_email}}" class="form-control" style="width: 50%" name="customer_email">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="text" value="{{$customer->customer_phone}}" class="form-control" style="width: 50%" name="customer_phone">
					<input type="submit" name="update_info" class="btn btn-primary" value="Cập nhật">
				</div>
				
			</form>
		</div>
		<div class="col-sm-6">
			<h3>Lịch sử đặt hàng</h3>
			<a href="{{url::to('/don-hang/'.$customer->customer_id)}}" class="btn btn-primary">Xem đơn hàng</a>
		</div>
    </div>
	
</section> <!--/#cart_items-->
@endforeach
@endsection