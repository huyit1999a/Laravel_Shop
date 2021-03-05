<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    //
    public function save_cart(Request $request){
    	// $product_id = $request->productid_hidden;
    	// $quantity = $request->qty;
    	// $product_info = DB::table('tbl_product')->where('product_id',$product_id)->first();

    	// // Cart::add('293ad', 'Product 1', 1, 9.99);
    	// // Cart::destroy();
    	// $data['id'] = $product_info->product_id;
    	// $data['qty'] = $quantity;
    	// $data['name'] = $product_info->product_name;
    	// $data['price'] = $product_info->product_price;
    	// $data['weight'] = '123';
    	// $data['options']['image'] = $product_info->product_image;
    	// Cart::add($data);
    	// return Redirect::to('/show-cart');

        // Cart::destroy();
    }

    public function show_cart(){
    	$cate_product = DB::table('tbl_category')->where('category_status','1')
    	->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

    	return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0,26),5);
        $cart = Session::get('cart');

        if($cart == true){
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }    
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    }

    public function show_cart_ajax(){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
        $cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
    }

    public function delete_prod($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');
        }else{
             return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }
    }

    public function delete_all_prod(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            return redirect()->back()->with('message','Xóa giỏ hàng thành công');
        }
    }

    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message',"Cập nhật số lượng thành công");
        }else{
            return redirect()->back()->with('message',"Cập nhật số lượng thất bại");
        }
    }

}
