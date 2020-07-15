@extends('user.index')
@section('css')
    
@endsection

@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-7 col-md-pull-5">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif
          <div class="container col-md-4">
              <h2>Địa chỉ nhận hàng</h2>
              <form action="{{route('chitietdathang')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <h2 class="title">Địa chỉ nhận hàng</h2>
             @if(Session::has('logined'))
                  <div class="alert-warning mb-3">
                      Thông tin quý khách đã tự động điền vào các trường, chỉnh sửa nếu có thay đổi
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Email</label>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email-order" name="email" class="form-control" placeholder="Email" value="{{$custOrder->cust_email}}">
                        <div class="invalid-feedback">Email không hợp lệ!</div>
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Họ và tên</label>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" id="name-order" name="name" placeholder="Họ và tên" value="{{$custOrder->cust_name}}">
                        <div class="invalid-feedback">Tên không được để rỗng!</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Số điện thoại</label>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Số điện thoại" value="{{$custOrder->cust_tel}}">
                        <div class="invalid-feedback">Vui lòng nhập kí tự số và có 10 số trở lên !</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Địa chỉ</label>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="address" id="address" cols="50" rows="2" placeholder="Phường/xã, số nhà, đường...">{{$custOrder->cust_add}}</textarea>
                        <div class="invalid-feedback">Địa chỉ không được rỗng !</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Ghi chú</label>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="note" id="note" cols="50" rows="2" placeholder="Ghi chú (Nhập nếu có)"></textarea>
                    </div>
                </div>
            @else
                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Email</label>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email-order" name="email" class="form-control" placeholder="Email">
                        <div class="invalid-feedback">Email không hợp lệ!</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Họ và tên</label>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" id="name-order" name="name" placeholder="Họ và tên">
                        <div class="invalid-feedback">Tên không được để rỗng!</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Số điện thoại</label>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Số điện thoại">
                        <div class="invalid-feedback">Vui lòng nhập kí tự số và có 10 số trở lên !</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Địa chỉ</label>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="address" id="address" cols="50" rows="2" placeholder="Phường/xã, số nhà, đường..."></textarea>
                        <div class="invalid-feedback">Địa chỉ không được rỗng !</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-md-3 col-form-label control-label">Ghi chú</label>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="note" id="note" cols="50" rows="2" placeholder="Ghi chú (Nhập nếu có)"></textarea>
                    </div>
                </div>
            @endif   

                 <div class="row">
                    <div class="col-6">
                        <a class="btn btn-secondary btn-back" href="{{route('giohang')}}" ><i class="fa fa-angle-left mr-2" aria-hidden="true"></i> Quay lại giỏ hàng</a>
                    </div>
                    <div class="col-6 text-right">
                        <button type="submit" id="btn-submit-information" class="btn btn-danger btn-dh">Xác nhận đặt hàng</button>
                        <a class="btn btn-secondary btn-back" href="{{route('giohang')}}" > Quay lại giỏ hàng</a>
                    </div>
                </div>
              </form>
                  </div>
                  <hr>
                  <div class="container col-md-8">
                      <h2>Giỏ hàng</h2>
                      <table class="table table-striped ">
                          @foreach(Cart::content() as $item)
                          <thead>
                              <tr>
                              <th scope="col" colspan="2">Giỏ hàng({{Cart::count()}} sản phẩm)</th>
                          
                              <th scope="col">Giá bán (VNĐ/1)</th>
                              <th scope="col">Số lượng</th>
                              <th scope="col">Thành tiền</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="text-center"><img style="width: 150px;" src="{{ url('images/'.$item->options->image) }}" alt=""></td>
                                  <td>{{$item->name}}</td>
                                  <td class="text-price"><strong>{{number_format($item->price)}}</strong></td>
                                  <td class="text-price">{{$item->qty}}</td>
                                  <td class="text-price"><strong>{{number_format($item->price * $item->qty)}}</strong></td>
                              </tr>
                              <tr>
                                  <td class="text-right" colspan="4"><strong>Tổng tiền: </strong></td>
                                  <td class="text-price"><strong style="color:red">{{Cart::priceTotal(0,'',',')}} ₫</strong></td>
                              </tr>
                          </tbody>
                      </table>
                      <hr>
                      
                  </div>
                </div>               
                  </div>
@endsection