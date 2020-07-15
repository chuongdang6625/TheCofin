
    <div class="container-fluid">
      <div class="container-fluid">
        <h2>Danh sách bình luận</h2>
        @if(session()->get('undo_success'))
            <div class="alert alert-into ml-3 mr-5 text-uppercase">{{session()->get('undo_success')}}</div>
        @else

        @endif

        @if(session()->get('permanently_delete_success'))
            <div class="alert alert-into ml-3 mr-5 text-uppercase">{{session()->get('permanently_delete_success')}}</div>
        @else

        @endif
        <p></p>      
        <table class="table table-striped table-bordered" style="margin-top: 50px">
          <thead>
            <tr align="center" class="text-center">
              <th>ID</th>
              <th>Tiêu đề </th>
              <th>Sản phẩm</th>
              <th>Tài khoản</th>
              <th>Ngày</th>
              <th>Nội dung</th>
              <th>Trả lời</th>
              <th>ACTIONS</th>
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
                  <a href="{{route('hoantacbinhluan', $comment->id)}}" class="btn btn-primary ">Hoàn tác</a>
                  <a href="{{route('xoavinhvienbinhluan', $comment->id)}}" class="btn btn-primary btn-danger">Xóa vĩnh viễn</a>
                </div>
              </td>
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>
  </div>