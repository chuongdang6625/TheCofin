@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Danh sách sản phẩm</h2>        
      @if(session()->get('delete_success'))
        <div class="alert alert-danger-into ml-3 mr-5">{{session()->get('delete_success')}}</div>
      @else

      @endif
      <table id="myTable" class="table table-striped table-bordered">
        <thead>
          <tr align="center" class="odd gradeX">
            <th>ID</th>
            <th>Tên</th>
            <th>Loại</th>
            <th>Giá (VND)</th>
            <th>Ảnh</th>
            <th>Chi tiết</th>
              <th>Sửa</th>
              <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr class="old gradeX" align="center">
            <td>{{$product->id}}</td>
            <td>{{$product->product_title}}</td>

            @foreach ($productTypes as $productType)
              @if ($product->productType_id == $productType->id)
                <td>{{$productType->productType_name}}</td>
              @endif
            @endforeach

            <td>{{number_format($product->product_price)}}</td>
            <td><img src="{{ url('images/'.$product->product_image) }}" alt="" width="120px" height="120px"></td>
            <td><a class="btn btn-primary" href="{{route('chitietsanpham',$product->id)}}">CHI TIẾT</a></td>
            <td><a class="btn btn-success" href="{{route('suasanpham', $product->id)}}">SỬA</a></td>
            <td><a class="btn btn-danger" href="{{route('xoasanpham',$product->id)}}">XÓA</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection