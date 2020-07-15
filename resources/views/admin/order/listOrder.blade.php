@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Danh sách đơn hàng</h2>  
      @if(session()->get('delete_success'))
          <div class="alert alert-info ml-3 mr-5">{{session()->get('delete_success')}}</div>        
      @else
      
      @endif
      <table class="table table-striped table-bordered">
        <thead>
          <tr class="odd gradeX" align="center">
            <th>ID</th>
            <th>Ngày đặt hàng</th>
            <th>Xác nhận</th>
            <th>Giao hàng</th>
            <th>Tổng tiền (VND)</th>
            <th>Chỉnh sửa </th>
            <th>Chi tiết</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @if(count($orders) > 0)
            @foreach ($orders as $order)
              <tr class="odd gradeX" align="center">
                <td>{{$order->id}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->order_confirm == 1 ? 'Đã xác nhận' : 'Chưa xác nhận'}} </td>
                <td>{{$order->order_delivery == 1 ? 'Đã giao' : 'Chưa giao'}}</td>
                <td>{{number_format($order->order_price)}}</td>
                <td><a href="{{route('suadonhang',$order->id)}}" class="btn btn-primary btn-success">Sửa</a></td>
                <td><a href="{{route('chitietdonhang',$order->id)}}"  class="btn btn-primary">Chi tiết</a></td>
                <td><a href="{{route('xoadonhang', $order->id)}}" class="btn btn-primary btn-danger">Xóa</a></td>
              </tr>
            @endforeach
          @else

          @endif
            </tbody>
      </table>
    </div>
</div>
@endsection