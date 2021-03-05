<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Statistical;
use App\Order;
use App\OrderDetails;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class StatisticalController extends Controller
{
    //
    public function sales_statistical(){
    	$dt = Carbon::now('Asia/Ho_Chi_Minh');
    	$now = $dt->toDateString();	    	
   		
    	$get_ord = Order::where('order_day',$now)->where('order_status',1)->get();
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

    	return view('admin.sales_statistical');
    }

    public function get_data(){
    	

    	return Redirect::to('/thong-ke');
    }

    public function filter_by_date(Request $request){
    	$data = $request->all();

    	$from_date = $data['from_date'];
    	$to_date = $data['to_date'];

    	$get = Statistical::whereBetween('order_date',[$from_date, $to_date])->orderBy('order_date','ASC')->get();

    	foreach ($get as $key => $val) {
    		$chart_data[] = array(
    			'period'=>$val->order_date,
    			'order'=>$val->total_order,
    			'sales'=>$val->sales,
    			'quantity'=>$val->quantity
    		);
    	}
    	echo $data = json_encode($chart_data);
    }

    public function filter_date(Request $request){
    	$data = $request->all();

    	$dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    	$dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    	$cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

    	$sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    	$sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

    	$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    	if($data['value_filter'] == '7ngay'){
    		$get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
    	} elseif($data['value_filter'] == 'thangtruoc'){
    		$get = Statistical::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
    	} elseif($data['value_filter'] == 'thangnay'){
    		$get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
    	} else{
    		$get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
    	}

    	foreach ($get as $key => $val) {
    		$chart_data[] = array(
    			'period'=>$val->order_date,
    			'order'=>$val->total_order,
    			'sales'=>$val->sales,
    			'quantity'=>$val->quantity
    		);
    	}
    	if(!isset($chart_data))
    		$chart_data[] = "";

    	$data = json_encode($chart_data);

    	if($data!=[]){
    		echo $data;
    	}

    }

}
