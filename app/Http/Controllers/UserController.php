<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use Session;

class UserController extends Controller
{
    public function getUserIndex(){
        return view('user.pages.homepage');
    }

    public function getInformationUser($id){
        $customer = Customer::find($id);
        $users = User::where('cust_id', $id)->first();
        return view('user.pages.informationUser', ['customer'=>$customer, 'users'=>$users]);
    }

    public function editInformation(Request $request){
        $this->validate(
            $request,
            [
                'txtPass' => 'bail|required',
                'txtTel' => ['regex: /(09|03|07|08|05)[0-9]{8}/']
            ],
            [
                'txtPass.required' => 'Chưa nhập mật khẩu',
                'txtTel.regex' => 'Số điện thoại không đúng định dạng'
            ]
        );
        $id = $request->idCust;

        User::where('cust_id', $id)
            ->update([
                'username' => $request->txtHoten,
                'password' => bcrypt($request->txtPass),
                'email' => $request->txtEmail,
            ]);
        Customer::where('id', $id)
        ->update([
            'cust_name' => $request->txtHoten,
            'cust_tel' => $request->txtTel,
            'cust_email' => $request->txtEmail,
            'cust_add' => $request->txtDiachi,
            'cust_pass' => bcrypt($request->txtPass)
        ]);
        return back();
    }
}
