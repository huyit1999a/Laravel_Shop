<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderDetails;
use App\Customer;
use App\Shipping;
use Cart;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class OrderController extends Controller
{
    //
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('login')->send();
        }
    }

    public function manage_order(){
		$this->AuthLogin();
        $order = Order::orderby('order_day','DESC')->paginate(3);

        return view('admin.manage_order')->with(compact('order'));
	}

	public function view_order($order_code){
		$this->AuthLogin();

        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

        return view('admin.view_order')->with(compact('order_details','customer','shipping','order'));
	}

	public function delete_order($order_code){
        $this->AuthLogin();
    	$order = Order::where('order_code',$order_code)->first();
        $order->delete();
         Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();
    }

    public function process_order($order_id){
        $this->AuthLogin();
        $order = Order::where('order_id',$order_id)->first();
        $order->order_status = 1;
        $order->save();
        return redirect()->back();
    }
}
