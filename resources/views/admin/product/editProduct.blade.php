@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Chỉnh sửa sản phẩm</h2><br>     
      @if(count($errors) > 0)
      <div class="alert alert-danger">
          @foreach($errors->all() as $err)
          {{$err}}<br>
          @endforeach
      </div>
      @endif

      @if(Session('thongbao'))
      <div class="alert alert-success">
          {{Session('thongbao')}}
      </div>
        @endif
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
              <form action="{{route('suasanpham', $product->id)}}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input class="form-control" name="txtTieuDe" placeholder="" value="{{$product->product_title}}"/>
                  </div>
                  <div class="form-group">
                      <label>Thể loại</label>
                      <input class="form-control" name="txtTheLoai" placeholder="" value="{{$product->productType_id}}"/>
                  </div>
                  <div class="form-group">
                      <label>Giá (VND)</label>
                      <input class="form-control" name="txtGia" placeholder="" value="{{$product->product_price}}"/>
                  </div>
                  <div class="form-group">
                      <label>Mô tả</label>
                      <textarea class="form-control ckeditor" rows="15" name="txtIntro" id="demo">{{$product->product_description}}</textarea>
                  </div>
                  <div class="form-group">
                      <label>Hình ảnh</label>
                      <p><img src="{{ url('images/'.$product->product_image) }}" alt="" width="200px" height="200px"></p>
                      <input type="file" name="fImages">
                  </div>
                  <div class="form-group">
                      <label>Trạng thái</label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="1" @if($product->product_status == 1)
                          {{"checked"}}
                          @endif
                          type="radio">Hiện
                      </label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="1" @if($product->product_status == 0)
                          {{"checked"}}
                          @endif
                          type="radio">Ẩn
                      </label>
                  </div>
                  <button type="submit" class="btn btn-info">Sửa</button>
                  <button type="reset" class="btn btn-default">Làm mới</button>
                  </form>
                  </div>
                  </div>
                  </div>
@endsection