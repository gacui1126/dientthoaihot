<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use App\User;
use Auth;

class CommentController extends Controller
{
    public function load_comment(Request $req){
        $id_product = $req->id_product;
        $comments = Comment::where('id_product',$id_product)->paginate(10);
        $output = '';
        foreach($comments as $key => $comment){
            $output.= '
                <div class="row">
                        <div class="col-md-2">
                            <a href="">
                                <img src="'.$comment->user->image_path.'" width="50%" style="margin-left:65px;border-radius:50%" >
                            </a>
                        </div>
                        <div class="col-md-9 style_comment">
                            <a href="">
                                <strong style="color: rgb(96, 130, 163)">
                                    '.$comment->user->full_name.'
                                </strong>
                            </a>
                                <strong>
                                <p>
                                    '.$comment->created_at.'
                                </p>
                                </strong>
                            <div class="space5">&nbsp;</div>
                            <p>
                                '.$comment->body.'
                            </p>
                    </div>
                </div>
                '.$comments->links().'
                <div class="space5">&nbsp;</div>
            ';
        }
        echo $output;
    }
    public function send_comment(Request $req){
        $comment = new Comment();
        $comment->id_product = $req->id_product;
        $comment->body = $req->comment_body;
        $comment->id_user = auth()->user()->id;
        $comment->save();
    }
    public function delete(Request $req){
        $comment = Comment::where('id',$id_comment)->delete();
        // try{
        //     $comments = Comment::find($id);
        //     if(Auth::user()->id === $comments->user->id){
        //         $comments = Comment::find($id)->delete();
        //     }
        //     return response()->json([
        //         'code' => 200,
        //         'message' =>'delete success',
        //     ], 200);
        // }catch(\Exception $exception){
        //     log::error('Message: ' .$exception->getMessage() . '---line:' . $exception->getLine());
        //     return response()->json([
        //         'code' => 500,
        //         'message' =>'delete fail',
        //     ], 500);
        // }

    }
}
