<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function getNews(){
        $newss = News::all();
        return view('user.pages.news',compact('newss'));
    }

    public function getNewsHomepage(){
        $newss = News::all();
        return view('user.pages.homepage', compact('newss'));
    }

    public function getNewDetail($new_id){
        $newss = News::where('id', $new_id)->first();
        return view('user.pages.newDetail',compact('newss'));
    }

    public function getListNews(){
        $newss = News::all();
        return view('admin.news.listNews',compact('newss'));
    }

    public function getEditNews($new_id){
        $newss = News::find($new_id);
        return view('admin.news.editNews', compact('newss'));
    }

    public function postEditNews(Request $res, $new_id){
        $newss = News::find($new_id);

        $newss->new_title = $res->n_title;
        $newss->new_content = $res->n_content;
        $newss->new_topic = $res->n_topic;

        if($res->hasFile('n_image')) {
            $file = $res->file('n_image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return back()->with('Lỗi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("user_asset/images/news",$imageName);
            $newss->n_image = $imageName;
        }

        $newss -> save();
        return back()->with('edit_news_success', 'Chỉnh sửa thành công');
    }

    public function deleteNews($id){
        $newss = News::where('id',$id);
        $newss->delete();
        return back()->with('delete_news_success', 'Xóa thành công');
    }

    public function getAddNews(){
        return view('admin.news.addNews');
    }

    public function postAddNews(Request $res){
        $newss = $res->all();

        $newss = new News;
        $newss->new_title = $res->n_title;
        $newss->new_content = $res->n_content;
        $newss->new_topic = $res->n_topic;

        if($res->hasFile('n_image')) {
            $file = $res->file('n_image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return back()->with('Lỗi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("user_asset/images/news",$imageName);
            $newss->n_image = $imageName;
        } else{
            $imageName = null;
        }

        $newss->save();
        return back()->with('create_news_success', 'Đã tạo bản tin thành công');
    }
}
