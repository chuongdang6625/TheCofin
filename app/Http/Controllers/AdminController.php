<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Admin;
use App\User;
use Auth;

class AdminController extends Controller
{
     //lay danh sach admin
     public function getListAdmin(){
        $admins = User::all();
        $id = Auth::user()->id;
        return view('admin.admin.listAdmin', compact('admins', 'id'));
    }

    //trang chinh sua thong tin admin
    public function getEditAdmin($id){
        $p = User::where('id', $id)->first();
        return view('admin.admin.editAdmin', compact('p'));
    }

    //ham xu ly chinh sua thong tin admin
    public function postEditAdmin(Request $rs, $id){
        $this->validate(
            $rs,
            [
                'ademail' => 'bail|required|email|unique:users,email',
                'adname' =>'bail|required|max:50',
                'adpass' => 'required',
                'adrole' => 'required'
            ],
            [
                'ademail.required' => 'Email không được để trống',
                'ademail.email' => 'Không đúng định dạng email',
                'ademail.unique' => 'Email đã có người sử dụng',
                'adname.required' => 'Tên không thể để trống',
                'adname.max' => 'Tên có độ dài tối đa 50 ký tự',
                'adpass.required' => 'Vui lòng nhập mật khẩu',
                'adrole.required' => 'Vui lòng chọn chức năng admin'

            ]
            );

        User::where('id', $id)->update([
            'email'=>$rs->ademail,
            'password'=>bcrypt($rs->adpass),
            'username' => $rs->adname,
            'role'=>$rs->adrole,
        ]);

        return back()->with('edit_admin_success', 'Sửa thành công');
    }

    //ham delete admin
    public function deleteAd($id){
        $p = User::where('id', $id);
        $p->delete();
        return back()->with('delete_admin_success', 'Xóa thành công');
    }

    //chuyen den trang them admin
    public function getAddAdmin(){
        return view('admin.admin.addAdmin');
    }

    //ham xu ly them admin
    public function postAddAdmin(Request $rs){
            $messages = [
                'ademail.required' => 'Email không được để trống',
                'ademail.email' => 'Không đúng định dạng email',
                'ademail.unique' => 'Email đã có người sử dụng',
                'adname.required' => 'Tên không thể để trống',
                'adname.max' => 'Tên có độ dài tối đa 50 ký tự',
                'adpass.required' => 'Vui lòng nhập mật khẩu',
                'adrole.required' => 'Vui lòng chọn chức năng admin'
                ];
    
                $validator = Validator::make($rs->all(),[
                    'ademail' => 'bail|required|email|unique:users,email',
                    'adname' =>'bail|required|max:50',
                    'adpass' => 'required',
                    'adrole' => 'required'
                ], $messages);
                     
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator)  ;
        } 
        else{
            $admin = $rs->all();

            $admin = new User();
            $admin->role = $rs->adrole;
            $admin->email = $rs->ademail;
            $admin->username = $rs->adname;
            $admin->password = bcrypt($rs->adpass);
            $admin->save();
            return back()->with('create_admin_success', 'Đã tạo thành công');
        }
      
    }
}
