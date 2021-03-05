@extends('layout')
@section('content')
@foreach($product_details as $key => $product)
<h2 class="title text-center">Chi tiết sản phẩm</h2>
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<div class="view-product__img">
			<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" class="view-product__img-dt"/>
			</div>
			<!-- 	 -->
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
		
		</div>

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2>{{$product->product_name}}</h2>
			<p>Mã ID: {{$product->product_id}}</p>
			
			<span>
				<span>{{number_format($product->product_price).' VNĐ'}}</span>
				<input name="productid_hidden" type="hidden" value="{{$product->product_id}}"/>
				<form>
					{{csrf_field()}}
					<input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
					<input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
					<input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
					<input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
					<input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
					
					<button type="button" name="add-to-cart" style="margin-left: 0;" class="btn btn-fefault cart add-to-cart" data-id_product="{{$product->product_id}}">
						<i class="fa fa-shopping-cart"></i>
						Thêm giỏ hàng
					</button>
				</form>	
			</span>

			<p><b>Tình trạng:</b> Còn hàng</p>
			<p><b>Điều kiện:</b> Hàng mới 100%</p>
			<p><b>Thương hiệu:</b> {{$product->brand_name}}</p>
			<p><b>Danh mục:</b> {{$product->category_name}}</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class=""><a href="#desc" data-toggle="tab">Mô tả</a></li>
			<li class=""><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
			<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
		</ul>
	</div>
	<div class="tab-content" style="margin-left:20px;">
		<div class="tab-pane fade " id="desc" >
			<p>{!!$product->product_desc!!}</p>
			
		</div>

		<div class="tab-pane fade" id="details" >
			<p>{!!$product->product_content!!}</p>
			
		</div>
		
		<div class="tab-pane fade active in" id="reviews" >
			<div class="col-sm-12">

				<div class="component_rating">
					<h3>Đánh giá sản phẩm</h3>
					<div class="component_rating_content">
					
						<div class="rating_item">
							<span class="fa fa-star icon-rating"></span><b class="rating-text">{{$rating}}</b>
						</div>
					
						<div class="list-rating">
							@for($count=1; $count<=5; $count++)
							<div class="item-rating">	
								<div style="width: 15%">
									{{$count}} <span class="fa fa-star"></span>
								</div>
								<div style="width: 60%;margin: 0 10px 0 -10px;">
									<div class="progress item-line">
									@php
										$j1=0; $j2=0; $j3=0; $j4=0; $j5=0; $j=0;	
									@endphp	
									@foreach($rating_pro as $key =>$ratee)

										@php
											if($ratee->product_id == $product->product_id)
											{
												$j++;
												if($ratee->rating==1)
													$j1++;
												elseif($ratee->rating==2)
													$j2=$j2+1;
												elseif($ratee->rating==3)
													$j3=$j3+1;
												elseif($ratee->rating==4)
													$j4=$j4+1;
												else
													$j5=$j5+1;
											}		
										@endphp
									
									@endforeach	
									
								@php
									if($j==0){
										$j=1;
									}

									$p1 = $j1/$j*100;
									$p2 = $j2/$j*100;
									$p3 = $j3/$j*100;
									$p4 = $j4/$j*100;
									$p5 = $j5/$j*100;	
								

									if($count==1)
										$wid = 'width:'.$p1.'%;';
									elseif($count==2)
										$wid = 'width:'.$p2.'%;';
									elseif($count==3)
										$wid = 'width:'.$p3.'%;';
									elseif($count==4)
										$wid = 'width:'.$p4.'%;';
									else
									$wid = 'width:'.$p5.'%;';

								@endphp
								
										<div class="progress-bar" style="{{$wid}};background-color: #ff9705;"></div>;
																	
  									</div>
							

								</div>
								<div style="width: 30%">
									<span>
									@php
										$i1=0; $i2=0; $i3=0; $i4=0; $i5=0;	
									@endphp	
									@foreach($rating_pro as $key =>$rate)
										
										@php
											if($rate->product_id == $product->product_id)
											{
												if($rate->rating==1)
													$i1++;
												elseif($rate->rating==2)
													$i2=$i2+1;
												elseif($rate->rating==3)
													$i3=$i3+1;
												elseif($rate->rating==4)
													$i4=$i4+1;
												else
													$i5=$i5+1;
											}		
										@endphp
									@endforeach	
									@php
										if($count==1)
											echo $i1.' đánh giá';
										elseif($count==2)
											echo $i2.' đánh giá';
										elseif($count==3)
											echo $i3.' đánh giá';
										elseif($count==4)
											echo $i4.' đánh giá';
										else
											echo $i5.' đánh giá';
									@endphp					
									</span>
								</div>		
							</div>
							@endfor							
						</div>
						<?php 
                   			$customer_id = Session::get('customer_id');
                            if($customer_id!=NULL){
                		?>
                			<button class="send-rating" id="show">Gửi đánh giá</button>	
                		<?php 
                    	} else{
               			?>
                   			<a href="{{URL::to('/login-checkout')}}" class="send-rating">Gửi đánh giá</a>		
                		<?php 
                   		} 
                		?> 

					</div>

					<div class="form_rating" style="display: none;">
						<ul class="list-inline">
								<span style="">Đánh giá của bạn</span>
								@for($count=1; $count<=5; $count++)
								<li id="{{$product->product_id}}-{{$count}}" class="rating" style="cursor: pointer; color:#c2c2c2;" data-index="{{$count}}" data-product_id="{{$product->product_id}}" data-rating={{$rating_round}}>
									<i class="fa fa-star" style="font-size: 20px;"></i>
								</li>
							@endfor
						</ul>
					</div>	
	
				</div>

				<form>
					{{csrf_field()}}
					<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->product_id}}">
					<div id="comment_show"></div>
					
				</form>

				<!-- <p><b>Viết đánh giá của bạn</b></p> -->
						

				<form action="#">
					<span class="comment_name-style">
						<input type="text" placeholder="Họ và tên" class="comment_name" style="width: 100%;"/>	<div class="error" style="color:red; margin: 5px 0 5px 0;"></div>
					</span>
					<textarea name="comment" class="comment_content" style="width: 100%;" placeholder="Nội dung bình luận"></textarea>
					<div class="error1" style="color:red; margin: -20px 0 5px 0;"></div>
					<div id="notify_comment"></div>

					<!-- <b>Đánh giá sao: </b> <img src="{{asset('public/frontend/images/rating.png')}}" alt="" /> -->

					<button type="button" class="btn btn-default pull-right send-comment">
						Gửi bình luận
					</button>	
				</form>
			</div>
		</div>
		
	</div>
</div><!--/category-tab-->
@endforeach

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản phẩm liên quan</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item item-ralated active">	
				@foreach($relate as $key => $r_product)
					<a href="{{URL::to('chi-tiet-san-pham/'.$r_product->product_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="product-info text-center">
									<div class="product-info__image">
										<img src="{{URL::to('public/uploads/product/'.$r_product->product_image)}}" alt="" class="product-image" />
									</div>
										<h2>{{number_format($r_product->product_price).' VNĐ'}}</h2>
										<p>{{$r_product->product_name}}</p>
										<!-- <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button> -->
									</div>
								</div>
							</div>
						</div>
					</a>
				@endforeach
				
			</div>

		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->
@section('script')

	<script type="text/javascript">
		$(function(){

			let listStart = $(".list-start .fa");

			listStart.mouseover(function(){
				let $this = $(this);
				let number = $this.attr('data-key');
				listStart.removeClass('rating-active');

				$.each(listStart, function(key, value){
					if(key + 1 <= number){
						$(this).addClass('rating-active')
					}
				});

			});

			// $(".js_rating_action").click(function(event){
			// 	event.prevenDefault();
			// 	if($.(".form_rating").hasClass('hide'))
			// 	{
			// 		$.(".form_rating").addClass('active').removeClass('hide');
			// 	} else
			// 	{
			// 		$.(".form_rating").addClass('hide').removeClass('active');
			// 	}
			// });

		});

		$(document).ready(function(){
    		$('#show').click(function() {

     			$('.form_rating').toggle("slide");
   		});
});
	</script>
@stop
@endsection
