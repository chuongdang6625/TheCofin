@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Thêm Loại Sản Phẩm</h2><br>     
      
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
          <form action="{{route('themloaisp')}}" method="POST" enctype="multipart/form-data">
                    <!--admin/brand/add  -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên Loại Sản Phẩm</label>
                        <input class="form-control" name="txtName" placeholder="Nhập tên Loại Sản Phẩm" value="{{old('txtName')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control ckeditor" rows="3" name="txtIntro">{{old('txtIntro')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Loại id</label>
                        <select class="form-control" id="" name="txtParent">
                        @foreach($list_parent as $item)
                          <option value="{{ $item->id }}">{{$item->productType_name}}</option>
                          @if(count($item->getParent) > 0)
                            @include('admin.productType.nestedProductType', ['list_parent' => $item->getParent, 'slug' => '-'])
                          @endif
                          @endforeach
                          <option value="">Loại</option>
                          @if(count($item->getParent) > 0)
                              @include('admin.productType.nestedProductType', ['list_parent' => $item->getParent, 'slug' => '-'])
                          @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Hiện
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" type="radio">Ẩn
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-info">Làm mới</button>
                </form>
                  </div>
                  </div>
                  </div>
@endsection