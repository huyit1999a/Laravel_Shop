<!DOCTYPE html>
<head>
    <base href="{{ asset('public/backend/') }}/">
    <title>Trang quản lý Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet"> 

    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <link href="css/jquery-ui.css" rel='stylesheet' type='text/css' />
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    
    <script src="../editor/ckeditor/ckeditor.js"></script>

    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jqueryvalidate.js"></script>
</head>
<body>
    <section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="{{URL::to('/dashboard')}}" class="logo">
            Admin
        </a>
    </div>
    <!--logo end-->

    <div class="top-nav clearfix">
        
        <ul class="nav pull-right top-menu">
          
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="images/3.png">
                    <span class="username">
                        <?php 
                            $name = Session::get('name');
                            if($name){
                                echo $name;
                            }
                        ?>
                    </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                   <!--  <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                    <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
           
        </ul>
        <!--search & user info end-->
    </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="{{URL::to('/dashboard')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Danh mục sản phẩm</span>
                        </a>
                        <ul class="sub">
    						<li><a href="{{URL::to('/add-category')}}">Thêm danh mục</a></li>
    						<li><a href="{{URL::to('/all-category')}}">Danh sách danh mục</a></li>
                            
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Thương hiệu sản phẩm</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-brand')}}">Thêm thương hiệu</a></li>
                            <li><a href="{{URL::to('/all-brand')}}">Danh sách thương hiệu</a></li>
                            
                        </ul>
                    </li>
                    
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Sản phẩm</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                            <li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>
                            
                        </ul>
                    </li>

                      <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Slider</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-slider')}}">Thêm slider</a></li>
                            <li><a href="{{URL::to('/all-slider')}}">Danh sách Slider</a></li>
                            
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Bình luận</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/list-comment')}}">Liệt kê bình luận</a></li>                            
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Đơn hàng</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>                            
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Thống kê</span>
                        </a>
                        <ul class="sub">
                            <!-- <li><a href="{{URL::to('/get-data')}}">Lấy dữ liệu</a></li>   -->
                            <li><a href="{{URL::to('/thong-ke')}}">Thống kê doanh số</a></li>  
                        </ul>                           
                    </li>
                </ul>            
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
    	<section class="wrapper">
    		@yield('admin_content')
        </section>
    </section>
    <!--main content end-->
    </section>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="js/jquery.scrollTo.js"></script>

    <script src="js/raphael.js"></script>
    <script src="js/morris.js"></script>
    <!-- morris JavaScript -->	
    <script>
        $(function(){

            $( "#datepicker").datepicker({
                prevText:"Tháng trước",
                nextText:"Tháng sau",
                dateFormat:"yy-mm-dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration:"slow"
            });


            $( "#datepicker2" ).datepicker({
                prevText:"Tháng trước",
                nextText:"Tháng sau",
                dateFormat:"yy-mm-dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration:"slow"
            });

        });
    </script>
    <script type="text/javascript">
       $(document).ready(function(){
  
            var chart = new Morris.Bar({
                element: 'chart',
                lineColors: ['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
                    parseTime: false,
                    hideHover: 'auto',
                    xkey:'period',
                    ykeys: ['order','sales','quantity'],
                    labels: ['đơn hàng', 'doanh số', 'số lượng']
            });

            $('.filter-date').on('change',function(){
                var value_filter = (this.value);
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{url('/filter-date')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{value_filter:value_filter,_token:_token},
                    success:function(data){
                        if(data!="")
                        chart.setData(data);
                        else
                        chart.setData("");
                    }
                });
            });

            $('#btn-filter').click(function(){      
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();

                $.ajax({
                    url:"{{url('/filter-by-date')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{from_date:from_date, to_date:to_date, _token:_token},
                    success:function(data){
                        chart.setData(data);
                    }
                });
                
            });
       });
    </script>
    <script type="text/javascript">
       
            $('.btn-allow-comment').click(function(){
                var comment_status = $(this).data('comment_status');
                var comment_id = $(this).data('comment_id');
                var comment_product_id = $(this).attr('id');

                if(comment_status==0){
                    var alert = 'Duyệt bình luận thành công';
                }else{
                    var alert = 'Bỏ duyệt bình luận thành công';
                }

                $.ajax({
                    url:"{{url('/allow-comment')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
                    success:function(data){

                        $('#notify_comment').html('<span class="text text-success">'+alert+'</span>');
                        location.reload(2000);
                    }
                });
            });
        
            $('.btn-reply-comment').click(function(){    
                var comment_id = $(this).data('comment_id');
                var comment = $('.reply-comment_'+comment_id).val();
                var comment_product_id = $(this).data('product_id');


                $.ajax({
                    url:"{{url('/reply-comment')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{comment_id:comment_id,comment:comment,comment_product_id:comment_product_id},
                    success:function(data){
                        $('.reply-comment_'+comment_id).val('');
                        $('#notify_comment').html('<span class="text text-success">Trả lời bình luận thành công</span>');
                        location.reload(1000);
                    }
                });
            });

    </script>
</body>
</html>
