
<div class="container" name="SignupUserForm">
<div class="row">
    <div class="col-sm-6">
        <h3>Thông tin tài khoản</h3>
    <hr>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}
            @endforeach
        </div>
    @endif
    @if(Session::has('thanhcong'))
        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
    @endif
  <form action="{{route('suakhachhang')}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="idCust" value="{{$customer->id}}">
      <div class="form-group">
        <label for="email">Địa chỉ mail</label>
        <input id="email" type="text" class="form-control" name="txtEmail" value="{{$customer->cust_email}}" placeholder="Please Enter Email" />
      </div>
      <div class="form-group">
      <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="txtPass" class="form-control" value="" placeholder="">
      </div>

      <div class="form-group">
      <label for="name">Họ tên</label>
        <input type="text" id="fullname" name="txtHoten" class="form-control" value="{{$customer->cust_name}}" placeholder="">
      </div>

      <div class="form-group">
      <label for="name">Số điện thoại</label>
        <input type="text" id="telephone" name="txtTel" class="form-control" value="{{$customer->cust_tel}}" placeholder="">
      </div>

      <div class="form-group">
      <label for="name">Địa chỉ</label>
        <input type="text" id="address" name="txtDiachi" class="form-control" value="{{$customer->cust_add}}" placeholder="">
      </div>

      <div class="form-group">
          <label for="name">Số lần order</label>
          <input id="mark" type="text" class="form-control" name="txtMark" value="{{$customer->cust_mark}}" placeholder="" readonly>
      </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md">Cập nhật thông tin</i></button>
    </div>
  </form>

</div> <!--Ket thuc the div col-->
</div> <!--Ket thuc the div row-->
</div> <!--Ket thuc the div co