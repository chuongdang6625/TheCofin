@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>THÊM ADMIN</h2><br>           
      @if(session()->has('create_admin_success'))
            <div class="alert alert-success ml-3 mr-5">{{session()->get('create_admin_success')}}</div>
      @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
      @endif
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
          <form action="{{route('postthemadmin')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="ademail" placeholder="Vui lòng nhập email đăng nhập" value="{{old('ademail')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="adpass" placeholder="Vui lòng nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" name="adname" value="{{old('adname')}}" placeholder="Vui lòng nhập họ và tên" />
                    </div>
                    <div class="form-group">
                        <label>Phân công</label>
                        <select id="cars" name="adrole" >
                            <option value="1">Quản lý</option>
                            <option value="2">Quản lý Sản Phẩm</option>
                            <option value="3">Quản lý Chăm Sóc Khách Hàng</option>
                          </select>
                    </div>
                    <button type="submit" class="btn btn-info">Tạo tài khoản Admin</button>
                    </form>
                  </div>
                  </div>
                  </div>
@endsection