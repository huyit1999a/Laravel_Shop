<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
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

	public function add_brand() {
        $this->AuthLogin();
    	return view('admin.add_brand');
    }

    public function all_brand() {
        $this->AuthLogin();
    	$all_brand = DB::table('tbl_brand')->orderby('brand_id','desc')->paginate(4);
    	$manager_brand = view('admin.all_brand')->with('all_brand',$all_brand);
    	return view('admin_layout')->with('admin.all_brand',$manager_brand);
    }

    public function save_brand(Request $request) {
        $this->AuthLogin();

        $this->validate($request, ['brand_name'=>'required'],
            ['brand_name.required'=>"Vui lòng nhập tên thương hiệu"]
        );

        $data = $request->all();

        $brand = new Brand();
        $brand->brand_name = $data['brand_name'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();

    	// $data = array();
    	// $data['brand_name'] = $request->brand_name;
        // $data['brand_slug'] = str_slug($request->brand_name);
    	// $data['brand_desc'] = $request->brand_desc;
        // $data['brand_status'] = $request->brand_status; 
        // DB::table('tbl_brand')->insert($data); 

    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-brand');
    }

    public function unactive_brand($brand_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
    	Session::put('message','Kích hoạt thương hiệu thành công');
    	return Redirect::to('all-brand');
    }

    public function active_brand($brand_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
    	Session::put('message','Không kích hoạt thương hiệu thành công');
    	return Redirect::to('all-brand');
    }

    public function edit_brand($brand_id){
        $this->AuthLogin();
    	$edit_brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
    	$manager_brand = view('admin.edit_brand')->with('edit_brand',$edit_brand);
    	return view('admin_layout')->with('admin.edit_brand',$manager_brand);
    }

    public function update_brand(Request $request,$brand_id){
        $this->AuthLogin();

        $this->validate($request, ['brand_name'=>'required'],
            ['brand_name.required'=>"Vui lòng nhập tên thương hiệu"]
        );

        $data = $request->all();
        $brand = Brand::find($brand_id);
        $brand->brand_name = $data['brand_name'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->save();

    	// $data = array();
    	// $data['brand_name'] = $request->brand_name;
        // $data['brand_desc'] = $request->brand_desc;
        // DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);

    	Session::put('message','Cập nhật danh mục sản phẩm thành công');
    	return Redirect::to('all-brand');
    }

    public function delete_brand($brand_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
    	Session::put('message','Xóa danh mục sản phẩm thành công');
    	return Redirect::to('all-brand');
    }
    //End Brand Admin

    public function show_brand_home($brand_id){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
        $cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();

        $brand_name = DB::table('tbl_brand')->where('brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.show_brand_home')
        ->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('slider',$slider);
    }
}
