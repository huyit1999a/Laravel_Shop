<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Slider;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    //
    public function index() {
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
    	$cate_product = DB::table('tbl_category')->where('category_status','1')
    	->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

    	// $all_product = DB::table('tbl_product')
    	// ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
    	// ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    	// ->orderby('tbl_product.product_id','desc')->get();

    	$all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('slider',$slider);
    }

    public function search(Request $request){
        $keywords = $request->keywords_search; 
        if($keywords==""){
            $keywords = '#';
        }
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status',1)->take(3)->get();
        $cate_product = DB::table('tbl_category')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_status','1')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.product.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('slider',$slider);
    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();

        if($data['query'])
        {
            $product = Product::where('product_status',1)->where('product_name','LIKE','%'.$data['query'].'%')->get();
            $output = '
                <ul class="dropdown-menu" style="display:block; position:relative";>';
                foreach($product as $key => $val){
                    $output.='
                        <li class="li_search"><a href="'.url('/chi-tiet-san-pham/'.$val->product_id).'">'.$val->product_name.'</a></li>
                    ';
                }
            $output .= '</ul>';
            echo $output;
        }
    }
}
