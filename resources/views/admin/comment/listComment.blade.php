@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
    <h2>Danh sách bình luận</h2>
        @if(session()->get('delete_success'))
            <div class="alert alert-into ml-3 mr-5 text-uppercase">{{session()->get('delete_success')}}</div>
        @else

        @endif
        <p></p>      
        <table id="myTable" class="table table-striped table-bordered" style="margin-top: 50px">
          <thead>
            <tr align="center" class="text-center">
              <th>ID</th>
              <th>Tiêu đề </th>
              <th>Sản phẩm</th>
              <th>Tài khoản</th>
              <th>Ngày</th>
              <th>Nội dung</th>
              <th>Nội dung phản hồi</th>
              <th>Trả lời</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
              @foreach($comments as $comment)
            <tr class="odd gradeX" align="center">
              <td>{{$comment->id}}</td>
              <td>{{$comment->cment_title}}</td>
              <td>{{$comment->product_cment}}</td>
              <td>{{$comment->user_cment}}</td>
              <td>{{$comment->cment_date}}</td>
              <td>{{$comment->cment_content}}</td>
              <td>{{$comment->reply_cment}}</td>
              <td>
                <div class="btn-group">
                  <a href="{{route('traloibinhluan', $comment->id)}}"  class="btn btn-primary ">TRẢ LỜI</a></button>
                </div>
              </td>
              <td>
                <div class="btn-group">
                  <a href="{{route('xoabinhluan', $comment->id)}}" class="btn btn-primary btn-danger">XÓA</a></button>
                </div>
              </td>
            </tr>
        @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection