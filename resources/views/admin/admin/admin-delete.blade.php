@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>XÓA ADMIN</h2><br>           
      
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Họ và tên</label>
                      <input class="form-control" name="adname" value="Ngô Hoàng Ân" readonly />
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" name="adname" value="ngohoangan312001@gmail.com" readonly />
                  </div>
                  <div class="form-group">
                      <label>Mật khẩu</label>
                      <input type="password" class="form-control" name="adpass" value="an234567" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Vai trò</label>
                      <input type="password" class="form-control" name="adpass" value="Admin trưởng" readonly/>
                  </div>
                  <a type="submit" class="btn btn-info">QUAY VỀ DANH SÁCH</a>
                  <a type="submit" class="btn btn-info">XÓA</a>
                  </form>
                  </div>
                  </div>
                  </div>
@endsection