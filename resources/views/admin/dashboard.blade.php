@extends('admin_layout')
@section('admin_content')
<h3 style="margin-bottom: 30px;">Chào mừng bạn đến với admin</h3>

<div class="market-updates">
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-eye"> </i>
			</div>
			 <div class="col-md-8 market-update-left">
			 <h4>Lượt xem</h4>
			<h3>13,500</h3>
			<p></p>
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-product-hunt" style="font-size: 3em;color: #fff;text-align: left;"></i>
			</div>
			<div class="col-md-8 market-update-left">
			<h4>Sản phẩm</h4>
				<h3>{{$product_count}}</h3>
				<p></p>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-comment" style="font-size: 3em;color: #fff;text-align: left;"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Bình luận</h4>
				<h3>{{$comment_count}}</h3>
				<p></p>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-4">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Đơn hàng</h4>
				<h3>{{$order_count}}</h3>
				<p></p>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
   <div class="clearfix"> </div>
</div>
@endsection