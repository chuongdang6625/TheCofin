@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid" style="padding-bottom:120px">
      <h2>Chi tiết khách hàng</h2>
     <hr>     
     <form action="" method="POST">
      <input type="hidden" id="cment_id" name="cment_id" value="">
      <div class="form-group">
          <label>ID</label>
          <input class="form-control" name="cment_title" value="{{$customer->id}}" disabled />
      </div>
      <div class="form-group">
          <label>Họ Tên</label>
          <input class="form-control" name="product_cment" value="{{$customer->cust_name}}" disabled />
      </div>
      <div class="form-group">
          <label>SĐT</label>
          <input class="form-control" name="user_cment" value="{{$customer->cust_tel}}" disabled />
      </div>
      <div class="form-group">
          <label>Địa chỉ</label>
          <input class="form-control" name="user_cment" value="{{$customer->cust_add}}" disabled />
      </div>
      <div class="form-group">
          <label>Điểm tích lũy</label>
          <input class="form-control" name="user_cment" value="{{$customer->cust_mark}}" disabled />
      </div>
      
      <a href="{{route('danhsachkhachhang')}}" class="btn btn-primary">Quay lại</a>
  <form>
    </div>
</div>
@endsection