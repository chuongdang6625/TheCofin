@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Chỉnh Sửa Loại Sản Phẩm: {{$productType->productType_name}}</h2><br>     
      
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>
            @endforeach
        </div>
      @endif

      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
              <form action="{{route('sualoaisp', $productType->id)}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                      <label>Tên loại Sản Phẩm</label>
                      <input class="form-control" name="txtName" value="{{$productType->productType_name}}" placeholder=""  />
                  </div>
                  <div class="form-group">
                      <label>Mô tả</label>
                      <textarea class="form-control ckeditor" rows="3" name="txtIntro" id="demo3" value="">{{$productType->productType_description}}</textarea>
                  </div>
                  <div class="form-group">
                      <label>Loại id</label>
                      <input class="form-control" name="txtParent" value="{{$productType->parent_id}}" placeholder="">
                  </div>
                  <div class="form-group">
                      <label>Trạng thái</label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="1" 
                          @if($productType->productType_status == 0)
                          {{"checked"}}
                          @endif
                          type="radio">Hiện
                      </label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="0" 
                          @if($productType->productType_status == 1)
                          {{"checked"}}
                          @endif
                          type="radio">Ẩn
                      </label>
                  </div>
                  <button type="reset" class="btn btn-info">Làm mới</button>
                  <button type="submit" class="btn btn-success">Cập nhật</button>
                  </form>
                  </div>
                  </div>
                  </div>
@endsection