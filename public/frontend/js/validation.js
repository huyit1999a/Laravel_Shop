$().ready(function() {
	$("#login_form").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "email_account": {
                required: true,
            },
            "password_account":{
                required: true,
            },
            
        },
        messages: {
            "email_account": {
                required: "Tài khoản không được bỏ trống",
            },
            "password_account": {
                required: "Mật khẩu không được bỏ trống",
            },
           
        }
   });


   $("#register_form").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "customer_name": {
                required: true,
            },
            "customer_phone":{
                required: true,
            },
            "customer_email":{
                required: true,
            },
            "customer_password":{
                required: true,
            },
            "customer_phone":{
                required: true,
            }
        },
        messages: {
            "customer_name": {
                required: "Vui lòng nhập họ và tên",
            },
            "customer_phone": {
                required: "Vui lòng nhập số điện thoại",
            },
            "customer_email": {
                required: "Vui lòng nhập email",
            },
            "customer_password": {
                required: "Vui lòng nhập mật khẩu",
            }
        }
   });

   $("#form-checkout").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "shipping_name": {
                required: true,
            },
            "shipping_phone":{
                required: true,
            },
            "shipping_email":{
                required: true,
            },
            "shipping_address":{
                required: true,
            },
        },
        messages: {
            "shipping_name": {
                required: "Vui lòng nhập họ và tên",
            },
            "shipping_phone": {
                required: "Vui lòng nhập số điện thoại",
            },
            "shipping_email": {
                required: "Vui lòng nhập email",
            },
            "shipping_address": {
                required: "Vui lòng nhập mật khẩu",
            }
        }
   });

});

