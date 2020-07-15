<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer;
use App\User;
use Session;

class LoginController extends Controller
{
    public function getLoginUser(){
        return view('user.pages.login');
    }

    public function loginUser(Request $request){
       $data = $request->only('email', 'password');

        if(Auth::attempt($data)){
            $user = User::where('email', $request->email)->first();
            $idUser = $user->cust_id;
            Session::put('logined', $idUser);
            return redirect()->route('trangchuUser')->with(['login_success1'=>'Đăng nhập thành công']);
        } else{
            return back()->with(['login_fail1' => 'Thông tin đăng nhập không chính xác!!!']);
        }
    }

    public function login(Request $request){
        $this->validate($request,
        [
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6|max:32'
        ],
        [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'password' => 'Bạn chưa nhập password',
            'password.min' => 'Password phải ít nhất 6 ký tự',
            'password.max' => 'Password không quá 32 ký tự',
        ]);


        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            $user = User::where('email', $request->email)->first();
            if($user->role == 4) {
                $idUser = $user->cust_id;
                Session::put('logined', $idUser);
                return redirect()->route('trangchuUser')->with(['login_success1'=>'Đăng nhập thành công!!!']);
            }
            if($user->role == 1){
                Session::put('ql', 1);
                return redirect()->route('trangchuAdmin')->with(['login_success1' => 'Đăng nhập thành công']);
            }
            if($user->role == 2){
                Session::put('qlsp', 2);
                return redirect()->route('trangchuAdmin')->with(['login_success1' => 'Đăng nhập thành công']);
            }
            if($user->role == 3){
                Session::put('qlcskh', 3);
                return redirect()->route('trangchuAdmin')->with(['login_success1' => 'Đăng nhập thành công']);
            }
        }
        else{
            return back()->with(['login_fail1' => 'Thông tin đăng nhập không chính xác!!!']);
        }

    }


    public function logout(){
        Session::forget('logined');
        return redirect()->route('trangchuUser');
    }

    public function logoutql(){
        Session::forget('ql');
        return redirect()->route('dangnhapAdmin');
    }

    public function logoutqlsp(){
        Session::forget('qlsp');
        return redirect()->route('dangnhapAdmin');
    }
    
    public function logoutqlcskh(){
        Session::forget('qlcskh');
        return redirect()->route('dangnhapAdmin');
    }
}
