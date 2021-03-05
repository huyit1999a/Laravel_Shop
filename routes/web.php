<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\CheckLogedIn;
//Trang chu
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::post('autocomplete-ajax','HomeController@autocomplete_ajax');

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

//Admin
Route::get('/login','AdminController@index');
Route::get('/logout','AdminController@logout');
Route::get('/dashboard','AdminController@showDashboard');
Route::post('/admin-dashboard','AdminController@check');

//Category
Route::get('/add-category','CategoryProduct@add_category');
Route::get('/edit-category/{category_id}','CategoryProduct@edit_category');
Route::get('/delete-category/{category_id}','CategoryProduct@delete_category');

Route::get('/all-category','CategoryProduct@all_category');
Route::get('/unactive-category/{category_id}','CategoryProduct@unactive_category');
Route::get('/active-category/{category_id}','CategoryProduct@active_category');

Route::post('/save-category','CategoryProduct@save_category');
Route::post('/update-category/{category_id}','CategoryProduct@update_category');

//Slider
Route::get('/add-slider','SliderController@add_slider');
Route::get('/edit-slider/{slider_id}','SliderController@edit_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');

Route::get('/all-slider','SliderController@all_slider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');

Route::post('/save-slider','SliderController@save_slider');
Route::post('/update-slider/{slider_id}','SliderController@update_slider');
//Brand
Route::get('/add-brand','BrandProduct@add_brand');
Route::get('/edit-brand/{brand_id}','BrandProduct@edit_brand');
Route::get('/delete-brand/{brand_id}','BrandProduct@delete_brand');

Route::get('/all-brand','BrandProduct@all_brand');
Route::get('/unactive-brand/{brand_id}','BrandProduct@unactive_brand');
Route::get('/active-brand/{brand_id}','BrandProduct@active_brand');

Route::post('/save-brand','BrandProduct@save_brand');
Route::post('/update-brand/{brand_id}','BrandProduct@update_brand');

//Comment
Route::get('/list-comment','CommentController@list_comment');
Route::post('/allow-comment','CommentController@allow_comment');
Route::post('/reply-comment','CommentController@reply_comment');
Route::post('/load-comment','CommentController@load_comment');
Route::post('/send-comment','CommentController@send_comment');
Route::get('/delete-comment/{comment_id}','CommentController@delete_comment');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::post('/insert-rating','ProductController@insert_rating');

//Cart
Route::post('/save-cart','CartController@save_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@show_cart_ajax');
Route::get('/delete-cart/{rowId}','CartController@delete_cart');
Route::get('/delete-prod/{session_id}','CartController@delete_prod');
Route::get('/delete-all-prod','CartController@delete_all_prod');
//CheckOut
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::get('/complete-order','CheckoutController@complete_order');

Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/save-checkout','CheckoutController@save_checkout');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/order','CheckoutController@order');
Route::post('/confirm-order','CheckoutController@confirm_order');

//Order
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::get('/delete-order/{order_code}','OrderController@delete_order');

Route::get('/process-order/{order_id}','OrderController@process_order');
//Banner


//Customer
Route::get('/thong-tin/{customer_id}','CustomerController@customer_inf');
Route::get('/don-hang/{customer_id}','CustomerController@order_info');
Route::get('/chi-tiet-don-hang/{order_id}','CustomerController@order_details');
Route::post('/update-info/{customer_id}','CustomerController@update_info');

//Statistical
Route::get('/thong-ke','StatisticalController@sales_statistical');
// Route::get('/get-data','StatisticalController@get_data');
Route::post('/filter-by-date','StatisticalController@filter_by_date');
Route::post('/filter-date','StatisticalController@filter_date');