<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use Session;

class CustomerController extends Controller
{
    public function getListCustomer(){
        $customers = Customer::where('cust_status', 1)->get();
        return view('admin.customer.listCustomer', ['customers'=>$customers]);
    }

    public function getDetailCustomer($id){
        $customer = Customer::where('id', $id)->first();
        return view('admin.customer.detailCustomer', ['customer'=>$customer]);
    }

    public function getDelete($cust_id){
        Customer::where('id', $cust_id)
        ->update([
            'cust_status'=>0
        ]);
        return redirect('admin/customer/list')->with('delete_cust_success','Xóa khách hàng thành công');
    }

    public function getEditCustomer($cust_id){
        $customer = Customer::find($cust_id);
        return view('admin.customer.editCustomer',['customer'=>$customer]);
    }
}
