@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>CHI TIẾT ĐƠN HÀNG</h2><br>           
      
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Mã đơn hàng</label>
                      <input class="form-control" name="txtName" placeholder="" value="{{$order->id}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Ngày đặt hàng</label>
                      <input class="form-control" name="txtName" placeholder="" value="{{$order->order_date}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Xác nhận</label>
                      <select name="confirm" id="confirm" disabled>
                          @if ($order->order_confirm == 1)
                              <option value="1">Đã xác nhận</option>
                          @else
                              <option value="0">Chưa xác nhận</option>
                          @endif                        
                      </select>
                      <label style="margin-left: 50px">Giao hàng</label>
                      <select name="delivery" id="delivery" disabled>
                          @if ($order->order_delivery == 1)
                              <option value="1">Đã giao hàng</option>
                          @else
                              <option value="0">Chưa giao hàng</option>
                          @endif                                   
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Tên khách hàng đặt hàng</label>
                      <input class="form-control" name="txtName" placeholder="" value="{{$order->cust_name}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Email khách hàng đặt hàng</label>
                      <input class="form-control" name="txtName" placeholder="" value="{{$order->cust_mail}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Số điện thoại khách hàng</label>
                      <input class="form-control" name="txtName" placeholder="" value="{{$order->cust_tel}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Địa chỉ khách hàng</label>
                      <input class="form-control" name="txtName" placeholder="" value="{{$order->cust_add}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Ghi chú của đơn hàng</label>
                      <textarea class="form-control" rows="3" name="txtName" placeholder="" readonly>{{$order->order_note}}</textarea>
                  </div>
                 
                  </form>
                  <div class="row pb-5">
                      <h4>Thông tin đơn hàng</h4>
                      <div class="col-lg-10">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                  <th scope="col">Mã sản phẩm</th>
                                  <th scope="col">Tên sản phẩm</th>
                                  <th scope="col">Số lượng</th>
                                  <th scope="col">Giá bán (VNĐ/1)</th>
                                  <th scope="col">Thành tiền</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($orderDetails as $orderDetail)
                                  <tr>
                                      <td class="text-center">{{$orderDetail->product_id}}</td>
                                      <td>{{$orderDetail->product_name}}</td>
                                      <td>{{$orderDetail->orderDetail_quanity}}</td>
                                      <td class="text-price"><strong>{{number_format($orderDetail->orderDetail_price)}}</strong></td>
                                      <td class="text-price"><strong>{{number_format($orderDetail->orderDetail_price * $orderDetail->orderDetail_quanity)}}</strong></td>
                                  </tr>
                                  @endforeach
                                  <tr>
                                      <td class="text-right" colspan="4"><strong>Tổng tiền: </strong></td>
                                      <td class="text-price"><strong style="color:red">{{number_format($order->order_price)}}</strong></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <a href="{{route('danhsachdonhang')}}" class="btn btn-info">  Quay về trang danh sách đơn hàng</a>
                  </div>
                  </div>
                  </div>
@endsection