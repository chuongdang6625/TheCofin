@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid" style="padding-bottom:120px">
    <h2>Trả lời bình luận</h2>
        @if(session()->get('reply_success'))
            <div class="alert alert-info ml-3 mr-5">{{session()->get('reply_success')}}</div>
            <div style="margin-left: 50px 0"><span><a class="btn btn-outline-danger" href="{{route('danhsachbinhluan')}}">Quay lại danh sách bình luận</a></span></div>
        @else

        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
        @endif
       <hr>     
       <form action="{{route('posttraloibinhluan')}}" method="POST">
           {{csrf_field()}}
        <input type="hidden" id="cment_id" name="cment_id" value="{{$comment->id}}">
        <div class="form-group">
            <label>Tiêu đề bình luận</label>
            <input class="form-control" name="cment_title" value="{{$comment->cment_title}}" disabled />
        </div>
        <div class="form-group">
            <label>Sản phẩm bình luận</label>
            <input class="form-control" name="product_cment" value="{{$comment->product_cment}}" disabled />
        </div>
        <div class="form-group">
            <label>Tài khoản bình luận</label>
            <input class="form-control" name="user_cment" value="{{$comment->user_cment}}" disabled />
        </div>
        <div class="form-group">
            <label>Ngày bình luận</label>
            <input class="form-control" name="cment_date" value="{{$comment->cment_date}}" disabled />
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="form-control" rows="3" name="cment_content" disabled>{{$comment->cment_content}}</textarea>
        </div>
        <div class="form-group">
            <label>Nội dung trả lời</label>
            <textarea class="form-control" rows="3" name="reply_cment">{{$comment->reply_cment}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Đồng ý</button>
        <a class="btn btn-danger" href="{{route('danhsachbinhluan')}}">Hủy bỏ</a>
    <form>
    </div>
</div>
@endsection