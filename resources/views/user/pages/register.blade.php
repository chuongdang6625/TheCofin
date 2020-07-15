
<link rel="stylesheet" href="./The_Cofin/public/css/SignupUserForm">
<div class="container" name="SignupUserForm">
<div class="row">
    <div class="col-sm-6">
        <h3>Tạo tài khoản</h3>
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
  <form action="{{route('dangkyPostUser')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">

      <div class="form-group">
      <label for="email">Email</label>
        <input type="email" id="custemail" name="custemail" class="form-control" value="{{old('custemail')}}">
      </div>

      <div class="form-group">
      <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}">
      </div>

      <div class="form-group">
      <label for="password">Nhập lại mật khẩu</label>
        <input type="password" id="re_password" name="re_password" class="form-control">
      </div>

      <div class="form-group">
      <label for="name">Họ tên</label>
        <input type="text" id="fullname" name="custname" class="form-control" value="{{old('custname')}}">
      </div>


      <div class="form-group">
      <label for="name">Số điện thoại</label>
        <input type="text" id="telephone" name="custtel" class="form-control" value="{{old('custtel')}}">
      </div>

      <div class="form-group">
      <label for="name">Địa chỉ</label>
        <input type="text" id="address" name="custaddress" class="form-control" value="{{old('custadd')}}">
      </div>

    <!--<label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>-->
    <div class="text-center">
    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md">Đăng Ký</i></button>
    </div>
  </form>

</div> <!--Ket thuc the div col-->
</div> <!--Ket thuc the div row-->
</div> <!--Ket thuc the div co