<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Product;
use App\Comment;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();


class CommentController extends Controller
{
    //
    public function list_comment(){
    	$comment = Comment::with('product')->orderBy('comment_id','DESC')->paginate(4);
    	$comment_rep = Comment::with('product')->where('comment_parent_id','>',0)->orderBy('comment_id','DESC')->get();
    	return view('admin.list_comment')->with(compact('comment','comment_rep'));
    }

    public function allow_comment(Request $request){
    	$data = $request->all();
    	$comment = Comment::find($data['comment_id']);
    	$comment->comment_status = $data['comment_status'];
    	$comment->save();
    }

    public function reply_comment(Request $request){
    	$data = $request->all();
    	$comment = new Comment();
    	
    	$comment->comment = $data['comment'];
    	$comment->comment_product_id = $data['comment_product_id'];
    	$comment->comment_parent_id = $data['comment_id'];
    	$comment->comment_status = 0;
    	$comment->comment_name = 'Admin';
    	$comment->save();
    }

    public function delete_comment($comment_id){
    	$comment = Comment::find($comment_id);
    	$comment->delete();
    	return Redirect()->back();
    }

    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where('comment_status',0)->where('comment_parent_id',0)->get();
        $comment_rep = Comment::with('product')->where('comment_parent_id','>',0)->get();
        $output = '';

        foreach ($comment as $key => $comm) {
            $output .= '
                    <div class="row comment-product" style="margin-left:-15px; margin-right:40px; background:white;">
                        <div class="col-sm-2">
                           <img src="'.url('/public/frontend/images/avt.jpg').'" class="img img-responsive img-thumbnail" width="90%">
                        </div>
                        <div class="col-sm-10">
                            <span style="color:green;">@'.$comm->comment_name.'</span>
                            <p style="color:#000;">'.$comm->comment_date.'</p>
                            <p style="word-wrap: break-word;">'.$comm->comment.'</p>

                        </div>
                    </div>
                    <p></p>
                    ';

                    foreach ($comment_rep as $key => $rep_comment) {
                    	if($rep_comment->comment_parent_id==$comm->comment_id){
                    	$output .= '
							<div class="row comment-product comment-product--admin">
                        	<div class="col-sm-2">
                           		<img src="'.url('/public/frontend/images/admin.jpg').'" class="img img-responsive img-thumbnail" width="95%">
                        	</div>
                       		<div class="col-sm-10">
	                            <span style="color:blue;">@Admin</span>
	                            <p style="color:#000;">'.$rep_comment->comment_date.'</p>
	                            <p style="word-wrap: break-word;">'.$rep_comment->comment.'</p>

                        	</div>
                    		</div>
                    		<p></p>

                    	';
                    	}
                    }

        }
        echo $output;
    }

    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;

        $comment = new Comment();
        $comment->comment_product_id = $product_id;
        $comment->comment_name = $comment_name;
        $comment->comment = $comment_content;
        $comment->comment_status = 1;
        $comment->comment_parent_id = 0;
        $comment->save();
    }

}
