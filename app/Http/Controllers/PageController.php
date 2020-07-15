<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    //User
     
    public function getQA(){
        return view('user.pages.qa');
    }

    public function getAbout(){
        return view('user.pages.about');
    }

    public function getRegisterUser(){
        return view('user.pages.register');
    }

    public function getInformationUser(){
        return view('user.pages.informationUser');
    }

    public function getHomepage(){
        $products = Product::where('product_status', 1)->get();
        return view('user.pages.homepage', compact('products'));
    }

    //Admin
    
    public function getAdminIndex(){
        return view('admin.homepage.admin');
    }

    public function getLoginAdmin(){
        return view('admin.loginAdmin');
    }
}
