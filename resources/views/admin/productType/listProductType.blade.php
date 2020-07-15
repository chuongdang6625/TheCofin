@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Danh sách loại Sản Phẩm</h2>         
      <table id="myTable" class="table table-striped table-bordered">
        <thead>
          <tr align="center" class="odd gradeX">
            <th>ID</th>
            <th>Tên loại sản phẩm</th>
            <th style="text-align: center;">Mô tả</th>
            <th>Trạng thái</th>
            <th>Loại id</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody align="center" class="old gradeX">
          @foreach($productType as $pt)
          <tr>
            <td>{{$pt->id}}</td>
            <td>{{$pt->productType_name}}</td>
            <td>{!!$pt->productType_description!!}</td>
            <td>
              @if($pt->productType_status == 1)
                Hiện
              @else
                Ẩn
              @endif
            </td>
            <td>{{$pt->parent_id}}</td>
            <td class="center"><a class="btn btn-primary" href="{{route('sualoaisp', $pt->id)}}">SỬA</a></td>
            <td class="center"><a class="btn btn-primary btn-danger" href="{{route('xoaloaisp', $pt->id)}}">XÓA</a></td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection