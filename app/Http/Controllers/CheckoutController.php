<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderDetails;
use App\Customer;
use App\Shipping;
use App\Slider;
use Carbon\Carbon;
use Cart;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    //
	public function AuthLoginF(){
        $customer_id = Session::get('customer_id');
        if($customer_id){
            return Redirect::to('/trang-chu');
        }
        else{
            return Redirect::to('login-checkout')->send();
        }
    }

    public function checkF(Request $request){
    	$customer_email = $request->email_account;
    	$customer_password = md5($request->password_account);

    	$result = DB::table('tbl_customer')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();

    	if($result){
    		Session::put('name',$result->customer_name);
            Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/trang-chu');
    	}
    	else {
    		Session::put('message','Tài khoản hoặc mật khẩu không chính xác');
    		return Redirect::to('/login-checkout');
    	}
    	
    }

   	public function login_checkout(){
   		$slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
		$cate_product = DB::table('tbl_category')->where('category_status','1')
    	->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	
		return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
	}

	public function add_customer(Request $request){
		$data = array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_email'] = $request->customer_email;
		$data['customer_password'] = md5($request->customer_password);
		$data['customer_phone'] = $request->customer_phone;

		$this->validate($request, [
				'customer_name'=>'required',
				'customer_phone'=>'required',
				'customer_email'=>'required',
				'customer_password'=>'required'
			],
            [
            	'customer_name.required'=>"Vui lòng nhập họ tên",
            	'customer_phone.required'=>"Vui lòng nhập số điện thoại",
            	'customer_email.required'=>"Vui lòng nhập email",
            	'customer_password.required'=>"Vui lòng nhập mật khẩu"
        	]
        );


		$customer_id = DB::table('tbl_customer')->insertGetId($data);

		Session::put('customer_id',$customer_id);
		Session::put('customer_name',$request->customer_name);
		return Redirect::to('/checkout');
	}

	public function checkout(){
		$slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
		$cate_product = DB::table('tbl_category')->where('category_status','1')
    	->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	
		return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
	}

	// public function save_checkout(Request $request){
	// 	$data = array();
	// 	$data['shipping_name'] = $request->shipping_name;
	// 	$data['shipping_email'] = $request->shipping_email;
	// 	$data['shipping_address'] = $request->shipping_address;
	// 	$data['shipping_phone'] = $request->shipping_phone;
	// 	$data['shipping_note'] = $request->shipping_note;
	// 	$data['shipping_method'] = $request->shipping_method;

	// 	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

	// 	Session::put('shipping_id',$shipping_id);

	// 	return Redirect::to('/payment');
	// }

	public function logout_checkout(){
		Session::flush();
		return Redirect::to('login-checkout');
	}

	public function login_customer(Request $request){
		$email = $request->email_account;
		$password = md5($request->password_account);

		$this->validate($request, [
				'email_account'=>'required',
				'password_account'=>'required'
			],
            [
            	'email_account.required'=>"Tài khoản không được bỏ trống",
            	'password_account.required'=>"Mật khẩu không được bỏ trống"
        	]
        );

		$result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
		if($result){
			Session::put('customer_id',$result->customer_id);
			return Redirect::to('/');
		} else{
			Session::put('message','Tài khoản hoặc mật khẩu không chính xác');
			return Redirect::to('/login-checkout');
		}
	}
 	
	public function confirm_order(Request $request){
		$data = $request->all();
		
		$shipping = new Shipping();
		$shipping->shipping_name = $data['shipping_name'];
		$shipping->shipping_email = $data['shipping_email'];
		$shipping->shipping_phone = $data['shipping_phone'];
		$shipping->shipping_address = $data['shipping_address'];
		$shipping->shipping_note = $data['shipping_note'];
		$shipping->shipping_method = $data['shipping_method'];
		$shipping->save();

		$shipping_id = $shipping->shipping_id;
		$checkout_code = substr(md5(microtime()),rand(0,26),5);

		$order = new Order();
		$order->customer_id = Session::get('customer_id');
		$order->shipping_id = $shipping_id;
		$order->order_status = 0;
		$order->order_code = $checkout_code;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$orday_day = date("Y-m-d"); 
		$order->order_day = $orday_day;
		$order->save();

		$order_id = $order->order_id;
		$totalSale = 0;
		$totalQty = 0;
		if(Session::get('cart')==true){
			foreach (Session::get('cart') as $key => $cart) {
				$order_details = new OrderDetails();
				$order_details->order_id = $order_id;
				$order_details->order_code = $checkout_code;
				$order_details->product_id = $cart['product_id'];
				$order_details->product_name = $cart['product_name'];
				$order_details->product_price = $cart['product_price'];
				$order_details->product_sales_quantity = $cart['product_qty'];
				$totalSale += $cart['product_price']*$cart['product_qty'];
				$totalQty += $cart['product_qty'];
				$order_details->save();
			}
		}
		
		Session::forget('cart');

		return Redirect::to("/complete-order");
	}

	public function get_statistical(){
		$dt = Carbon::now('Asia/Ho_Chi_Minh');
    	$now = $dt->toDateString();
   
    	$get_ord = Order::where('order_day',$now)->get();
    	$order_id = array();
    	$totalOrder = 0;
    	foreach($get_ord as $key => $val){//lay order id, tong so order
    		$totalOrder++;
    		array_push($order_id,$val['order_id']); 
    	}
    	
    	$get_ord_details = OrderDetails::whereIn('order_id',$order_id)->get();

    	$totalSales = 0;
    	$totalQty = 0;
    	foreach($get_ord_details as $key => $val_d){
    		$totalSales += $val_d['product_price']*$val_d['product_sales_quantity'];
    		$totalQty += $val_d['product_sales_quantity'];
    	}

    	$statistical = new Statistical();
    	$statis_ordate = Statistical::where('order_date',$now)->get();
    	
    	foreach ($statis_ordate as $key => $val_statis) {
    		$id_statis = $val_statis['id_statistical'];
    	}

    	if(count($statis_ordate)>0){
    		$statistical = Statistical::find($id_statis);
    		$statistical->sales = $totalSales;
    		$statistical->quantity = $totalQty;
    		$statistical->total_order = $totalOrder;
    		$statistical->save();
    	}
    	else{
    		$statistical->order_date = $now;
    		$statistical->sales = $totalSales;
    		$statistical->quantity = $totalQty;
    		$statistical->total_order = $totalOrder;
    		$statistical->save();
    	}
	}

	// public function order(Request $request){
	// 	$data = array();

	// 	$data['shipping_name'] = $request->shipping_name;
	// 	$data['shipping_email'] = $request->shipping_email;
	// 	$data['shipping_address'] = $request->shipping_address;
	// 	$data['shipping_phone'] = $request->shipping_phone;
	// 	$data['shipping_note'] = $request->shipping_note;
	// 	$data['shipping_method'] = $request->shipping_method;
		
	// 	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

	// 	Session::put('shipping_id',$shipping_id);


	// 	//insert order
	// 	$order_data = array();
	// 	$order_data['customer_id'] = Session::get('customer_id');
	// 	$order_data['shipping_id'] = Session::get('shipping_id');
	// 	$order_data['order_total'] = Cart::total(0,'.','.');
	// 	$order_data['order_status'] = "0";
	// 	$order_id = DB::table('tbl_order')->insertGetId($order_data);

	// 	//insert order details
	// 	$content = Cart::content();

	// 	foreach($content as $v_content){
	// 		$order_d_data = array();
	// 		$order_d_data['order_id'] = $order_id;
	// 		$order_d_data['product_id'] = $v_content->id;
	// 		$order_d_data['product_name'] = $v_content->name;
	// 		$order_d_data['product_price'] = $v_content->price;
	// 		$order_d_data['product_sales_quantity'] = $v_content->qty;;
			
	// 		DB::table('tbl_order_details')->insert($order_d_data);
	// 	}
	// 	if($data['shipping_method']==1){
	// 		Cart::destroy();

 // 			$cate_product = DB::table('tbl_category')->where('category_status','1')
 //    		->orderby('category_id','desc')->get();
 //    		$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
	// 	return Redirect::to('/complete-order');
	// 	}
 // 		elseif($data['shipping_method']==2) {
 // 			Cart::destroy();

 // 			$cate_product = DB::table('tbl_category')->where('category_status','1')
 //    		->orderby('category_id','desc')->get();
 //    		$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
	// 	return Redirect::to('/complete-order');
 // 		}

	// 	// return Redirect::to('/payment');
	// }

	public function complete_order(){
		$slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
		$cate_product = DB::table('tbl_category')->where('category_status','1')
    		->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
		return view('pages.checkout.complete_order')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
	}
	
}
