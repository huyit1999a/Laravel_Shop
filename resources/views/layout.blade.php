<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ asset('public/frontend/') }}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | H-Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet"> 
    
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row header_top_nav">
                    <div class="col-sm-4">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="{{URL::to('/')}}">Chào mừng đến với H-Shop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav navbar-top">
                                <?php 
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){
                                ?>
                                    <li><a href="{{URL::to('/thong-tin/'.$customer_id)}}"><i class="fa fa-user"></i> Thông tin</a></li>
                                    
                                <?php 
                                    } else{
                                ?>
                                    
                                <?php 
                                    }
                                ?>

                                <?php 
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){
                                ?>
                                    
                                <?php 
                                    } else{
                                ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i> Đăng ký</a></li>
                                <?php 
                                    }
                                ?>

                                <?php 
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){
                                ?>
                                    <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>   
                                <?php 
                                    } else{
                                ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php 
                                    }
                                ?>
                            </ul>
                        </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row header-m-flex">
                    <div class="col-sm-2">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="{{URL::to('public/frontend/images/logo.png')}}" width="170px" height="60px" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="search_box pull-right">
                            <form action="{{URL::to('/tim-kiem')}}" method="post">
                                {{csrf_field()}}
                                <input type="text" name="keywords_search" id="keywords" placeholder="Nhập để tìm kiếm" class="search_input" />
                                
                                <input type="submit" name="search" class="btn btn-primary btn-icon" value='Tìm kiếm'>
                                <div id="search_ajax" style="z-index: 9999;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav navbar-cart">
                                
                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> <span class="cart-text">Giỏ hàng</span></a></li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
      
                    
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                        @php
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)   
                            @php
                                $i++;
                            @endphp 
                            <div class="item {{$i==1 ? 'active' : ''}}">
                                <div class="col-sm-12">
                                    <img src="{{URL::to('public/uploads/slider/'.$slide->slider_image)}}" class="slider-img img-responsive" alt="slider" />
                                </div>
                            </div>
                        @endforeach
                            <!-- <div class="item"> 
                                <div class="col-sm-12">
                                    <img src="{{URL::to('public/frontend/images/slider2.png')}}" class="slider-img img-responsive" alt="" />
                                 
                                </div>
                            </div>
                            
                            <div class="item"> 
                                <div class="col-sm-12">
                                    <img src="{{URL::to('public/frontend/images/slider3.png')}}" class="slider-img img-responsive" alt="" />     
                                </div>
                            </div> -->
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">
                                            <span class="badge pull-right"></span>
                                            {{$cate->category_name}}
                                        </a>
                                    </h4>
                                </div>
                               <!--  <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Nike </a></li>
                                            <li><a href="#">Under Armour </a></li>
                                            <li><a href="#">Adidas </a></li>
                                            <li><a href="#">Puma</a></li>
                                            <li><a href="#">ASICS </a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                            @endforeach 
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">

                   @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
                        <div class="single-widget">
                            <h2>Chăm sóc khách hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url::to('/')}}">Trung tâm trợ giúp</a></li>
                                <li><a href="{{url::to('/')}}">H-Shop Blog</a></li>
                                <li><a href="{{url::to('/')}}">Chăm sóc khách hàng</a></li>
                                <li><a href="{{url::to('/')}}">Chính sách bảo hành</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-md-4 col-xs-6">
                        <div class="single-widget">
                            <h2>Về H-Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                               <li><a href="{{url::to('/')}}">Giới thiệu về H-Shop</a></li>
                               <li><a href="{{url::to('/')}}">Tuyển dụng</a></li>
                               <li><a href="{{url::to('/')}}">Điều khoản</a></li>
                               <li><a href="{{url::to('/')}}">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                   
                    <div class="col-lg-2 col-sm-2 col-md-4 social">
                        <div class="single-widget">
                            <h2>Theo dõi chúng tôi trên</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url::to('/')}}"><i class="fa fa-facebook"></i>
                                    <span style="margin-left: 5px;">Facebook</span></a></li>
                                <li><a href="{{url::to('/')}}"><i class="fa fa-instagram"></i> <span>Instagram</span></a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d694.5403167104603!2d105.7674425051068!3d10.024009779328553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883a5f0f0339%3A0xa5d50f3650d5cb44!2zMzIgQmEgVGjDoW5nIEhhaSwgSMawbmcgTOG7o2ksIE5pbmggS2nhu4F1LCBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1607075577061!5m2!1svi!2s" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="js/jquery.js"></script>
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/sweetalert.js"></script>
    <script type="text/javascript">
        
        $('#keywords').keyup(function(){
            var query = $(this).val();

            if(query !='')
            {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{url('/autocomplete-ajax')}}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }
            else
            {
                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click','.li_search',function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){ //Comment

            load_comment();
            function load_comment(){
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{url('/load-comment')}}",
                    method:"POST",
                    data:{product_id:product_id, _token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
                });
            }
            
                $('.send-comment').click(function(){
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                if(comment_name!="" && comment_content!="" && comment_content.length > 20)
                {

                    $.ajax({
                        url:"{{url('/send-comment')}}",
                        method:"POST",
                        data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                        success:function(data){
                            $('#notify_comment').html('<p class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</p>');
                            load_comment();
                            $('#notify_comment').fadeOut(8000);
                            $('.comment_name').val('');
                            $('.comment_content').val('');
                            location.reload();
                        }
                    });
                } else{
                    if(comment_name==""){
                        $(".error").html("Vui lòng nhập họ và tên");
                        return false;
                        }
                        else{ $(".error").html(""); }   
                    if(comment_content==""){
                        $(".error1").html("Vui lòng nhập bình luận");
                        return false;
                    }else if(comment_content.length < 20)
                        {
                            $(".error1").html("Bình luận phải hơn 20 ký tự");
                            return false;
                        }
                    else{$(".error1").html("");}

                    return true;
                }
            });
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.send_order').click(function(){ //Gio hang
                var shipping_name = $(".shipping_name").val();
                var shipping_email = $(".shipping_email").val();
                var shipping_address = $(".shipping_address").val();
                var shipping_phone = $(".shipping_phone").val();

                if(shipping_name!="" && shipping_email!="" && shipping_address!="" && shipping_phone!="")
                {        
                    swal({
                    title: "Xác nhận đơn hàng?",
                    text: "Đơn hàng sẽ không được hoàn trả lại khi đặt, bạn có muốn đặt không",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Cảm ơn, Mua hàng",
                    cancelButtonText: "Không, Hủy bỏ",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                    function(isConfirm) {          
                        if (isConfirm) {
                            var shipping_name = $('.shipping_name').val();
                            var shipping_email = $('.shipping_email').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_note = $('.shipping_note').val();
                            var shipping_method = $('.payment_select').val();

                            var _token = $('input[name="_token"]').val();

                            if(shipping_note=="")
                                shipping_note = "Không có ghi chú";

                            $.ajax({
                                url: '{{url('/confirm-order')}}',
                                method: 'POST',
                                data:{shipping_name:shipping_name,shipping_email:shipping_email,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_note:shipping_note,shipping_method:shipping_method,_token:_token},
                                success:function(data){
                                   swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                                }
                            });

                            window.setTimeout(function(){
                                location.reload();
                            }, 2000);

                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                        }
                    });
                }  
                else{
                    if(shipping_name==""){
                    $(".error").html("Vui lòng nhập trường này");
                    return false;
                    }
                    if(shipping_email==""){
                        $(".error").html("Vui lòng nhập trường này");
                        return false;
                    }
                    if(shipping_address==""){
                        $(".error").html("Vui lòng nhập trường này");
                        return false;
                    }
                    if(shipping_phone==""){
                        $(".error").html("Vui lòng nhập trường này");
                        return false;
                    }  
                    return true;     
                }
                
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){ //Them gio hang
            $('.add-to-cart').click(function(){
                var id=$(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(data){
                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        });
                    }
                });
            });
        });
    </script>
    @yield('script')
    <script type="text/javascript">
       
        function remove_background(product_id){ //Danh gia sao
            for(var count=1; count<=5; count++){
                $('#'+product_id+'-'+count).css('color','#c2c2c2');
            }
        }

        //hover danh gia
        $(document).on('mouseenter','.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');


            remove_background(product_id);

            for(var count=1; count<=index; count++){
                $('#'+product_id+'-'+count).css('color','#ff9705');
            }
        });

        //nha chuot ra
        $(document).on('mouseleave','.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            
            remove_background(product_id);

            for(var count=1; count<=1; count++){
                $('#'+product_id+'-'+count).css('color','#ff9705');
            }
        });
        //click de danh gia
        $(document).on('click','.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'{{url('/insert-rating')}}',
                method:"POST",
                data: {index:index,product_id:product_id,_token:_token},
                success:function(data){
                    if(data == 'done'){
                        alert("Bạn đã đánh giá "+index+"trên 5");
                        location.reload();
                    }
                    else{
                        alert("Lỗi đánh giá");
                    }
                }
            });

        });

        $(document).ready(function(){

        });
        

    </script>
</body>
</html>