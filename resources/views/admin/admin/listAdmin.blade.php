@extends('admin.index')
@section('css')
    
@endsection

@section('content')


    

    <div class="container-fluid">
      <div class="container-fluid">
        <h2>ADMIN LIST</h2>
        <p>THÔNG TIN CHI TIẾT CÁC ADMIN</p>  
        @if(session()->has('delete_admin_success'))

            <div class="alert alert-info">{{session()->get('delete_admin_success')}}</div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
      @endif          
        <table id="myTable" class="table table-striped table-bordered">
          <thead>
            <tr class="old gradeX" align="center">
              <th>ID</th>
              <th>EMAIL</th>
              <th>Họ và Tên</th>
              <th>ROLE</th>
              <th colspan="2">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($admins as $admin)
                @if($admin->role !== 4  && $admin->id !== $id)
                    <tr class="odd gradeX" align="center">
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->username}}</td>
                        <td>
                            @if($admin->role == 1)
                                Quản lý
                            @endif
                            @if($admin->role == 2)
                                Quản lý Sản Phẩm
                            @endif
                            @if($admin->role == 3)
                                Quản lý Đơn Hàng
                            @endif
                        </td>
                        <td>
                          <a href="{{route('xoaadmin', $admin->id)}}" class="btn btn-danger">XÓA</a>
                        </td>
                        <td>
                        <a href="{{route('suaadmin', $admin->id)}}" class="btn btn-info">SỬA</a>
                        </td>
                    </tr>
                @endif
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

@endsection