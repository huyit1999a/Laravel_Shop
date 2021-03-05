<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
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

    public function add_slider() {
        $this->AuthLogin();
    	return view('admin.add_slider');
    }

     public function all_slider() {
        $this->AuthLogin();
    	$all_slider = DB::table('tbl_slider')->orderby('slider_id','desc')->paginate(4);
    	$manager_slider = view('admin.all_slider')->with('all_slider',$all_slider);
    	return view('admin_layout')->with('admin.all_slider',$manager_slider);
    }

    public function save_slider(Request $request) {
        $this->AuthLogin();
    	$data = array();
    	$data['slider_name'] = $request->slider_name;
    	$data['slider_status'] = $request->slider_status;
    	$data['slider_image'] = $request->slider_image;

    	$get_image = $request->file('slider_image');
    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/slider',$new_image);
    		$data['slider_image'] = $new_image;

    		DB::table('tbl_slider')->insert($data);
    		Session::put('message','Thêm sản phẩm thành công');
    		return Redirect::to('all-slider');
    	}
    	$data['slider_image'] = '';

    	$this->validate($request,[
			'slider_name'=>'required',
			'slider_image'=>'required',
           
			
		],
		[
			'slider_name.required'=>"Vui lòng nhập tên slider",
			'slider_image.required'=>"Vui lòng thêm hình ảnh slider",
			
		]
		);
		
    	DB::table('tbl_slider')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-slider');
    }

    public function unactive_slider($slider_id){
        $this->AuthLogin();
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
    	Session::put('message','Kích hoạt slider thành công');
    	return Redirect::to('all-slider');
    }

    public function active_slider($slider_id){
        $this->AuthLogin();
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
    	Session::put('message','Không kích hoạt slider thành công');
    	return Redirect::to('all-slider');
    }

    public function edit_slider($slider_id){
        $this->AuthLogin();
    	

    	$edit_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();
    	$manager_slider = view('admin.edit_slider')->with('edit_slider',$edit_slider);
    	return view('admin_layout')->with('admin.edit_slider',$manager_slider);
    }

    public function update_slider(Request $request,$slider_id){
        $this->AuthLogin();
    	$data = array();
    	$data['slider_name'] = $request->slider_name;
    	$get_image = $request->file('slider_image');

    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/slider',$new_image);
    		$data['slider_image'] = $new_image;

    		DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
    		
		}
		
		$this->validate($request,[
			'slider_name'=>'required',
			         
			
		],
		[
			'slider_name.required'=>"Vui lòng nhập tên slider",
			'slider_image.required'=>"Vui lòng thêm hình ảnh slider",
			
		]
		);
		
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
    	Session::put('message','Cập nhật slider thành công');
    	return Redirect::to('all-slider');
    }

    public function delete_slider($slider_id){
        $this->AuthLogin();
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
    	Session::put('message','Xóa slider thành công');
    	return Redirect::to('all-slider');
    }
}
