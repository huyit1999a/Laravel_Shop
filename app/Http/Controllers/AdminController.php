<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Order;
use App\Comment;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('login')->send();
        }
    }

    public function index(){
    	return view('admin_login');
    }

    public function showDashboard(){
        $this->AuthLogin();
        $product_count = Product::count();
        $order_count = Order::count();
        $comment_count = Comment::count();

    	return view('admin.dashboard',compact('product_count','order_count','comment_count'));
    }

    public function check(Request $request){
    	$email = $request->email;
    	$password = md5($request->password);

    	$result = DB::table('tbl_admin')->where('email',$email)->where('password',$password)->first();

    	if($result){
    		Session::put('name',$result->name);
            Session::put('id',$result->id);
    		return Redirect::to('/dashboard');
    	}
    	else {
    		Session::put('message','Tài khoản hoặc mật khẩu không chính xác');
    		return Redirect::to('/login');
    	}
    	
    }

    public function logout(){
        $this->AuthLogin();
    	Session::put('name',null);
        Session::put('id',null);
    	return Redirect::to('/login');   	
    }
}

