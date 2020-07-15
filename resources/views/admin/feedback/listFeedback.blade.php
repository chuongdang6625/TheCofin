@extends('admin.index')
@section('css')
    
@endsection

@section('content')
    <div class="container-fluid">
      <div class="container-fluid">
      <h2>Danh sách phản hồi</h2> 
        
      <table class="table table-striped table-bordered">
        <thead>
          <tr class="odd gradeX" align="center">
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ngày</th>
            <th>Nội dung</th>
            <th>Email khách hàng</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr class="odd gradeX">
            @foreach($feedback as $feed)
            <td>{{$feed->id}}</td>
            <td>{{$feed->fb_title}}</td>
            <td>{{$feed->fb_date}}</td>
            <td>{{$feed->fb_content}}</td>
            <td>
              @foreach($custFbs as $cust)
                @if($feed->cust_id == $cust->id)
                  {{$cust->cust_email}}
                @endif
              @endforeach
            </td>
            <td>
              <div class="btn-group">
                <a class="btn btn-primary btn-danger" href="{{route('xoafeedback', $feed->id)}}">XÓA</a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
@endsection