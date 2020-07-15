@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>CẬP NHẬT THÔNG TIN ADMIN</h2><br>           
      @if(session()->has('edit_admin_success'))
            <div class="alert alert-info ml-3 mr-5">{{session()->get('edit_admin_success')}}</div>
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
              <form action="{{route('postsuaadmin',$p->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="ademail" value="{{ $p->email }}" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control" value="" name="adpass" />
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type=text" class="form-control" value="{{ $p->username }}" name="adname" />
                    </div>
                    <div class="form-group">
                        <label>Phân công</label>
                        <select id="role" name="adrole">
                            <option value="1">Quản lý</option>
                            <option value="2">Quản lý Sản Phẩm</option>
                            <option value="3">Quản lý Đơn Hàng</option>
                          </select>
                    </div>
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                  </form>
                  </div>
                  </div>
                  </div>
@endsection