<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Product;
use App\Comment;
use App\Rating;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
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

    public function add_product() {
        $this->AuthLogin();
    	$cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	
    	return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

    }

    public function all_product() {
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
    	->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    	->orderby('tbl_product.product_id','desc')->paginate(5);
    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;
    	$data['product_image'] = $request->product_image;

    	$get_image = $request->file('product_image');
    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/product',$new_image);
    		$data['product_image'] = $new_image;

    		DB::table('tbl_product')->insert($data);
    		Session::put('message','Thêm sản phẩm thành công');
    		return Redirect::to('all-product');
    	}
    	$data['product_image'] = '';

		
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	Session::put('message','Kích hoạt sản phẩm thành công');
    	return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	Session::put('message','Không kích hoạt sản phẩm thành công');
    	return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
    	$cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    	$edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	// $data['product_status'] = $request->product_status;
    	$get_image = $request->file('product_image');

    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.', $get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/product',$new_image);
    		$data['product_image'] = $new_image;

    		DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    		
		}
		
		$this->validate($request,[
			'product_name'=>'required',
			'product_price'=>'required',
           
			
		],
		[
			'product_name.required'=>"Vui lòng nhập tên sản phẩm",
			'product_price.required'=>"Vui lòng nhập giá sản phẩm",
			
		]
		);
		
    	DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    	Session::put('message','Cập nhật sản phẩm thành công');
    	return Redirect::to('all-product');
    }

    public function delete_product($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->delete();
    	Session::put('message','Xóa sản phẩm thành công');
    	return Redirect::to('all-product');
    }

    //End Admin Page

    public function details_product($product_id){
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
        $cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])->limit(3)->get();

        $rating_pro = Rating::with('product')->where('product_id',$product_id)->get();

        $rating = Rating::with('product')->where('product_id',$product_id)->avg('rating');
        $rating_round = round($rating);
        $rating = number_format($rating,'1','.','.');

        return view('pages.product.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('rating',$rating)->with('rating_pro',$rating_pro)->with('rating_round',$rating_round)->with('slider',$slider);
    }

    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo "done";
    }
  
}

