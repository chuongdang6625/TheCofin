@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>CUSTOMER LIST</h2>
      <p>THÔNG TIN KHÁCH HÀNG</p>            
      <table id="myTable" class="table table-striped table-bordered">
        <thead>
          <tr class="odd gradeX" align="center">
            <th>ID</th>
            <th>Họ Tên</th>
            <th>SĐT</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>ĐIỂM</th>
            <th>CHI TIẾT</th>
            <th>XÓA</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $cust)
          <tr align="center">
            <td>{{$cust->id}}</td>
            <td>{{$cust->cust_name}}</td>
            <td>{{$cust->cust_tel}}</td>
            <td>{{$cust->cust_email}}</td>
            <td>{{$cust->cust_add}}</td>
            <td>{{$cust->cust_mark}}</td>
            <td><a  class="btn btn-primary" href="{{route('chitietkhachhang', $cust->id)}}">CHI TIẾT</a></td>
            <td><a class="btn btn-danger" href="admin/customer/delete/{{$cust->id}}">XÓA</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection