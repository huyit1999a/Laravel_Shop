<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
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

    public function add_category() {
        $this->AuthLogin();
    	return view('admin.add_category');
    }

    public function all_category() {
        $this->AuthLogin();
    	$all_category = DB::table('tbl_category')->orderby('category_id','desc')->paginate(4);
    	$manager_category = view('admin.all_category')->with('all_category',$all_category);
    	return view('admin_layout')->with('admin.all_category',$manager_category);
    }

    public function save_category(Request $request) {
        $this->AuthLogin();

        $this->validate($request, ['category_name'=>'required'],
            ['category_name.required'=>"Vui lòng nhập tên danh mục"]
        );

        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_desc = $data['category_desc'];
        
        $category->category_status = $data['category_status'];
        $category->save();

    	// $data = array();
    	// $data['category_name'] = $request->category_name;
    	// $data['category_desc'] = $request->category_desc;
    	// $data['category_status'] = $request->category_status;
    	// DB::table('tbl_category')->insert($data);

    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-category');
    }

    public function unactive_category($category_id){
    	$this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
    	Session::put('message','Kích hoạt danh mục thành công');
    	return Redirect::to('all-category');
    }

    public function active_category($category_id){
    	$this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
    	Session::put('message','Không kích hoạt danh mục thành công');
    	return Redirect::to('all-category');
    }

    public function edit_category($category_id){
        $this->AuthLogin();
    	$edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
    	$manager_category = view('admin.edit_category')->with('edit_category',$edit_category);
    	return view('admin_layout')->with('admin.edit_category',$manager_category);
    }

    public function update_category(Request $request,$category_id){
    	$this->AuthLogin();
        $this->validate($request, ['category_name'=>'required'],
            ['category_name.required'=>"Vui lòng nhập tên danh mục"]
        );

        $data = $request->all();
        $category = Category::find($category_id);
        $category->category_name = $data['category_name'];
        $category->category_desc = $data['category_desc'];
        $category->save();

     //    $data = array();
    	// $data['category_name'] = $request->category_name;
     //    $data['category_desc'] = $request->category_desc;  
    	// DB::table('tbl_category')->where('category_id',$category_id)->update($data);

    	Session::put('message','Cập nhật danh mục sản phẩm thành công');
    	return Redirect::to('all-category');
    }

    public function delete_category($category_id){
    	$this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
    	Session::put('message','Xóa danh mục sản phẩm thành công');
    	return Redirect::to('all-category');
    }

    //End function Admin Page

    public function show_category_home($category_id){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
        $cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
        ->where('tbl_product.category_id',$category_id)->get();

        $category_name = DB::table('tbl_category')->where('category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category_home')
        ->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('slider',$slider);
    }

}
