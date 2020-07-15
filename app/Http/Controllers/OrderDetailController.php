<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Session;

class OrderDetailController extends Controller
{
    //User
    public function getUserOrderDetail(Request $request){
        $this->validate(
            $request,
            [
                'eamil' => 'bail|required|email|max:100',
                'name' => 'bail|required|max:100',
                'phone' => 'bail|required|min:10|max:11',
                'address' => 'bail|required|max:500',
                'note' => 'bail|max:255',
            ],
            [
                'email.required' => 'Chưa nhập email',
                'email.email' => 'Chưa đúng định dạng email',
                'email.max' => 'Email không được vượt quá 100 ký tự',
                'name.required' => 'Họ và tên không được để trống',
                'name.max' => 'Họ và tên không vượt quá 100 ký tự',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
                'phone.max' => 'Số điện thoại tối đa 11 ký tự',
                'address.required' => 'Địa chỉ không được để trống',
                'address.max' => 'Địa chỉ không được lớn hơn 500 ký tự',
                'note.max' => 'Ghi chú không được lớn hơn 255 ký tự',
            ]
            );

       if(Session::has('logined')){
           //Get id customer
           $idCust = Session::get('logined');
           //Get customer order
           $custOrder = Customer::where('id', $idCust)->first();
           $totalPriceDiscount = Cart::priceTotal(0,'','') * 95/100;
           //Create new order
           $order = new Order;
           $order->cust_id = $idCust;
           $order->cust_tel = $request->phone;
           $order->cust_name = $request->name;
           $order->cust_email = $request->email;
           $order->cust_add = $request->address;
           if($custOrder->cust_mark > 10){
               $order->order_price = $totalPriceDiscount;
           } else{
               $order->order_price = Cart::priceTotal(0,'','');
           }
           $order->order_note = $request->note;
           $order->order_confirm = 0;
           $order->order_delivery = 0;
           $order->save();

           //Update mark of customer
           $custUpdatemark = Customer::where('id', $idCust)->first();
           $newMark = $custUpdatemark->cust_mark + 1;
           Customer::where('id', $idCust)
            ->update([
                'cust_mark'=>$newMark
            ]);

            //Get last order
            $newOrder = Order::all()->last();

            //Add orderDetail for product on cart
            $productsOnCart = Cart::content();
            foreach($productsOnCart as $productOnCart){
                $orderDetail = new OrderDetail();
                $orderDetail->orderDetail_price = $productOnCart->price;
                $orderDetail->orderDetail_quanity = $productOnCart->qty;
                $orderDetail->product_id = $productOnCart->id;
                $orderDetail->order_id = $newOrder->id;
                $orderDetail->product_name = $productOnCart->name;
                $orderDetail->save();

                //Update quantity product
                $productUpdateQty = Product::where('id', $orderDetail->product_id)->first();
                $newQty = $productUpdateQty->product_quanity - $productOnCart->qty;
                Product::where('id', $orderDetail->product_id)
                    ->update([
                        'product_quanity' => $newQty
                    ]);
            }
            //Get order detail id
            $orderDetails = OrderDetail::where('id', $newOrder->id)->get();

            //Get total price order
            if($custOrder->cust_mark > 10){
                $totalPrice = $totalPriceDiscount;
                //Delete Cart
                Cart::destroy();
                Session::flash('discount_mark', 'Chúc mừng bạn đã được giảm giá 5% trên tổng hóa đơn với số điểm bạn đã tích lũy được');
                return view('user.pages.orderDetail', compact('newOrder', 'orderDetails', 'totalPrice'));
            } else{
                $totalPrice = Cart::priceTotal(0,'','');
                //Delete Cart
                Cart::destroy();
                return view('user.pages.orderDetail', compact('newOrder', 'orderDetails', 'totalPrice'));
            }
       }
       else{
           $order = new Order();
           $order->cust_tel = $request->phone;
           $order->cust_name = $request->name;
           $order->cust_email = $request->email;
           $order->cust_add = $request->address;
           $order->order_price = Cart::priceTotal(0,'','');
           $order->order_note = $request->note;
           $order->order_confirm = 0;
           $order->order_delivery = 0;
           $order->save();
           $newOrder = Order::all()->last();

           $productsOnCart = Cart::content();
           foreach($productsOnCart as $productOnCart){
            $orderDetail = new OrderDetail();
            $orderDetail->orderDetail_price = $productOnCart->price;
            $orderDetail->orderDetail_quanity = $productOnCart->qty;
            $orderDetail->product_id = $productOnCart->id;
            $orderDetail->order_id = $newOrder->id;
            $orderDetail->product_name = $productOnCart->name;
            $orderDetail->save();

            //Update quantity product
            $productUpdateQty = Product::where('id', $orderDetail->product_id)->first();
            $newQty = $productUpdateQty->product_quanity - $productOnCart->qty;
            Product::where('id', $orderDetail->product_id)
                ->update([
                    'product_quanity' => $newQty
                ]);
        }
        $orderDetails = OrderDetail::where('id', $newOrder->id)->get();
        $totalPrice = Cart::priceTotal(0,'','');
        Cart::destroy();
        return view('user.pages.orderDetail', compact('newOrder', 'orderDetails', 'totalPrice'));
       }
    }
}
