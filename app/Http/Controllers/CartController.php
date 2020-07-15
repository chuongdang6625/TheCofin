<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use App\ProductType;
use Cart;

class CartController extends Controller
{
    //User
    public function getCart(){
        return view('user.pages.cart');
    }

    public function store(Request $res){
        Cart::add($res->id, $res->name, $res->qty, $res->price,0,['image'=>$res->image])
        ->associate('App\Product');
        return back()->with('addtocart_success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function deleteItem($id){
        Cart::remove($id);
        return back()->with('delete_success', 'Đã xóa sản phẩm ');
    }

    public function qtyminus(Request $res){
        $newQty = $res->qty - 1;
        Cart::update($res->id, $newQty);
        return back();
    }

    public function qtyplus(Request $res){
        $newQty = $res->qty + 1;
        Cart::update($res->id, $newQty);
        return back();
    }

    public function empty(){
        Cart::destroy();
        return redirect()->route('giohang');
    }
}
