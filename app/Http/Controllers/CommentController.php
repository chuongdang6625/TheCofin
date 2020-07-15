<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Comment;
use App\Product;
use App\Customer;
use Session;
use App\User;

class CommentController extends Controller
{
     //user

    //ham xu ly khi user gui comment ve cho admin
    public function postComment(Request $rs){
        if(Session::has('logined')){
            $this->validate(
                $rs,
                [
                    'comment_titile' => 'bail|max:70',
                    'comment_content' => 'bail|required|max:500'
                ],
                [
                    'comment_title.max' => 'Tiêu đề bình luận không được dài quá 70 ký tự',
                    'comment_content.required' => 'Nội dung bình luận không được để trống',
                    'comment_content.max' => 'Nội dung bình luận không được dài quá 500 ký tự',
                ]
                );
                
            //get id customer login
            $idCust = Session::get('logined');

            //get user login
            $user_cment = User::where('cust_id', $idCust)->first();

            //get emial cust login
            $useremail_cment = $user_cment->username;

            //get product comment
            $product_cment = Product::where('id', $rs->idProduct)->first();
            //get product title
            $product_name_cment = $product_cment->product_title;

            //create new comment
            $newComment = new Comment;
            $newComment->cment_title = $rs->comment_title;
            $newComment->cment_content = $rs->comment_content;
            $newComment->user_cment = $useremail_cment;
            $newComment->cust_id = $idCust;
            $newComment->product_id = $rs->idProduct;
            $newComment->product_cment = $product_name_cment;
            $newComment->save();

            return back()->with('comment_success', 'Cảm ơn quý khách đã bình luận');
        } else{
            return back()->with('comment_fail', 'Vui lòng đăng nhập để bình luận!!!');
        }

    }

     //Admin
     public function getListComment(){
        $comments = Comment::where('cment_status', 1)->get();
        return view('admin.comment.listComment', compact('comments'));
    }

    //chuyen sang trang tra loi binhf luanj
    public function getReplyComment($id){
        $comment = Comment::where('id', $id)->first();
        return view('admin.comment.replyComment', compact('comment'));
    }

    //xu ly khi tra loi binh luanj
    public function postReplyComment(Request $rs){
        $this->validate(
            $rs,
            [
                'reply_cment' => 'bail|max:500',
            ],
            [
                'reply_cment.max' => 'Nội dung trả lời không được dài quá 500 ký tự',
            ]
            );
            Comment::where('id', $rs->cment_id)
            ->update([
                'reply_cment' => $rs->reply_cment
            ]);

            return back()->with('reply_success', 'Trả lời bình luận thành công');
    }

    public function deleteComment($id){
        Comment::where('id', $id)
        ->update([
            'cment_status'=>0
        ]);
    }

    public function getCommentDeleted(){
        $comments = Comment::where('cment_status', 0)->get();
        return view('admin.comment.commentDeleted', compact('comments'));
    }

    public function undoComment($id){
        Comment::where('id', $id)
            ->update([
                'cment_status' => 1
            ]);

        return back()->with('undo_success', 'Đã hoàn tác bình luận!!!');
    }

    public function permanentlyDeleteComment($id){
        Comment::where('id', $id)->delete();

        return back()->with('permanently_delete_success', 'Đã xóa vĩnh viễn bình luận');
    }
}
