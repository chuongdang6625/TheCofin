@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>CHI TIẾT SẢN PHẨM</h2><br>           
      
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input class="form-control" name="txtTieuDe" placeholder="" value="{{$product->product_title}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Thể loại</label>
                      <input class="form-control" name="txtTheLoai" placeholder="" value="{{$productType->productType_name}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Giá (VND)</label>
                      <input class="form-control" name="txtGia" placeholder="" value="{{$product->product_price}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Mô tả</label>
                      <textarea class="form-control ckeditor" rows="15" name="txtIntro" id="demo" disabled>{!!$product->product_description!!}</textarea>
                  </div>
                  <div class="form-group">
                      <label>Hình ảnh</label>
                      <div><img src="{{ url('images/'.$product->product_image) }}" alt="" width="30%"></div>
                  </div>
                  <div class="form-group">
                      <label>Trạng thái</label>
                      @if($product->product_status == 1)
                      <label class="radio-inline">
                          <input name="rdoStatus" value="1" checked="" type="radio" disabled>Hiện
                      </label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="0" type="radio" disabled>Ẩn
                      </label>
                      @else
                      <label class="radio-inline">
                          <input name="rdoStatus" value="1" checked="" type="radio" disabled>Hiện
                      </label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="0" type="radio" disabled>Ẩn
                      </label>
                      @endif
                  </div>
                  <a class="btn btn-info" href="{{route('danhsachsanpham')}}">Quay lại danh sách sản phẩm</a>
                  </form>
                  </div>
                  </div>
                  </div>
@endsection