@extends('layout')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Đăng nhập</h2>
					<?php 
						$message = Session::get('message');
						if($message){
							echo '<span class="text-alert">'.$message.'</span>';
							Session::put('message',null);
						}
					?>
					<form id="login_form" action="{{URL::to('/login-customer')}}" method="post">
						{{csrf_field()}}
				
                        <div class="form-group">
                        	<input type="text" name="email_account" placeholder="Tài khoản" />
							@if ($errors->has('email_account'))
                            <span class="invalid" >
                                <strong>
                                    {{ $errors->first('email_account') }}
                                </strong>                   
                            </span>
                       	 	@endif
                        </div>
						<div class="form-group">
							<input type="password" name="password_account" placeholder="Mật khẩu" />
							@if ($errors->has('password_account'))
                            <span class="invalid" >
                                <strong>
                                    {{ $errors->first('password_account') }}
                                </strong>                   
                            </span>
                        	@endif
						</div>
						
						<button type="submit" name="login_customer" class="btn btn-default">Đăng nhập</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">Hoặc</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>Đăng ký</h2>
					<form id="register_form" action="{{URL::to('/add-customer')}}" method="post">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" name="customer_name" placeholder="Họ và tên"/>
							@if ($errors->has('customer_name'))
                            <span class="invalid" >
                                <strong>
                                    {{ $errors->first('customer_name') }}
                                </strong>                   
                            </span>
                        	@endif
						</div>
						<div class="form-group">
							<input type="text" name="customer_phone"  placeholder="Số điện thoại"/>
							@if ($errors->has('customer_phone'))
                            <span class="invalid" >
                                <strong>
                                    {{ $errors->first('customer_phone') }}
                                </strong>                   
                            </span>
                        	@endif
						</div>
						<div class="form-group">
							<input type="email" name="customer_email" placeholder="Địa chỉ Email"/>
							@if ($errors->has('customer_email'))
                            <span class="invalid" >
                                <strong>
                                    {{ $errors->first('customer_email') }}
                                </strong>                   
                            </span>
                        	@endif
						</div>
						<div class="form-group">
							<input type="password" name="customer_password"  placeholder="Mật khẩu"/>
							@if ($errors->has('customer_password'))
                            <span class="invalid" >
                                <strong>
                                    {{ $errors->first('customer_password') }}
                                </strong>                   
                            </span>
                        	@endif
						</div>			
				
						<button type="submit" name="checkout_register" class="btn btn-default">Đăng ký</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection