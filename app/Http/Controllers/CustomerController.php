<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Customer;
use App\Category;
use App\Brand;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
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

    public function customer_inf($customer_id){
    	$this->AuthLoginF();
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
    	$cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $customer = DB::table('tbl_customer')
        ->where('customer_id',$customer_id)->get();

       return view('pages.customer.info_customer')->with('category',$cate_product)->with('brand',$brand_product)->with('customer_info',$customer)->with('slider',$slider);
    	
    }

    public function update_info(Request $request, $customer_id){
    	$this->AuthLoginF();
    	$data = $request->all();
    	$customer = Customer::find($customer_id);

    	$customer->customer_name = $data['customer_name'];
    	$customer->customer_phone = $data['customer_phone'];
    	$customer->customer_email= $data['customer_email'];

    	$customer->save();

    	Session::put('message','Cập nhật thông tin khách hàng thành công');

    	return Redirect()->back();
    }

    public function order_info($customer_id){
    	$this->AuthLoginF();
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
    	$cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $customer_order = DB::table('tbl_customer')
        ->join('tbl_order','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->where('tbl_customer.customer_id',$customer_id)->get();

        // $order = DB::table('tbl_order')
        // ->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
        // ->where('tbl_order.order_id',$order_id)->get();

       return view('pages.customer.info_order')->with('category',$cate_product)->with('brand',$brand_product)->with('customer_order',$customer_order)->with('slider',$slider);
    }

    public function order_details($order_id){
    	$this->AuthLoginF();
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
    	$cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

      
        $cus_order_details = DB::table('tbl_order_details')
        ->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('tbl_order.order_id',$order_id)->get();

       return view('pages.customer.info_ord_details')->with('category',$cate_product)->with('brand',$brand_product)->with('cus_order_details',$cus_order_details)->with('slider',$slider);

    }
}
