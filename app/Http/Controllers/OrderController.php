<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Cart;
use Session;

class OrderController extends Controller
{
    public function getPay(){
        if(Session::has('logined')){
            $idCust = Session::get('logined');
            $custOrder = Customer::where('id', $idCust)->first();
            return view('user.pages.pay', compact('custOrder'));
        } else{
            return view('user.pages.pay');
        }
    }
}
