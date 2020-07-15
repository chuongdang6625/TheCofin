<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderDetail;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class OrderAdminController extends Controller
{
    //Admin
    public function getListOrder(){
        $orders = Order::where('order_status', 1)->get();
        return view('admin.order.listOrder', compact('orders'));
    }

    public function getDetailOrder($id){
        $order = Order::where('id', $id)->first();
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        return view('admin.order.detailOrder', compact('order', 'orderDetails'));
    }

    public function getEditOrder($id){
        $order = Order::where('id', $id)->first();
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        return view('admin.order.editOrder', compact('order', 'orderDetails'));
    }

    public function updateOrder(Request $request){
        Order::where('id', $request->id)
            ->update([
                //them vao
            ]);
        return back()->with('update_success', 'Cập nhật đơn hàng thành công');
    }

    public function deleteOrder($id){
        Order::where('id', $id)
            ->update([
                'order_status' => 0
            ]);
        return back()->with('delete_success', 'Xóa đơn hàng thành công');
    }

    public function getRevenue(){
        $orders = Order::where('order_status', 1)->get();
        return view('admin.order.revenue', compact('orders'));
    }

    public function getOrderDeleted(){
        $orders = Order::where('order_status', 0)->get();
        return view('admin.order.orderDeleted', compact('orders'));
    }

    public function undoOrder($id){
        Order::where('id', $id)
            ->update([
                'order_status' => 1
            ]);

        return back()->with('undo_success', 'Đã hoàn tác đơn hàng');
    }

    public function permanentlyDeleteOrder($id){
        $orderDetails = OrderDetail::where('id', $id)->get();
        foreach($orderDetails as $orderDetail){
            OrderDetail::where('id', $orderDetail->id)->delete();
        }

        Order::where('id', $id)->delete();

        return back()->with('permanently_delete_success', 'Đã xóa vĩnh viễn đơn hàng');
    }

}
