@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <h2>Danh sách Sản Phẩm đã xóa</h2><br>    
      @if(session()->get('undo_success'))
            <div class="alert alert-success-info ml-3 mr-5 text-uppercase">{{session()->get('undo_success')}}</div>
      @else
             
      
    </div>
</div>
<!-- /#page-content-wrapper -->

  <div class="container-fluid">
      <div class="row">
          
          <div class="col-lg-8" style="padding-bottom:120px">
                            <table class="table table-striped table-bordered">
                            <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Loại</th>
                                <th>Giá (VND)</th>
                                <th>Ảnh</th>
                                <th>Trạng thái</th>
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

                                <td>{{($product->product_price)}}</td>
                                <td><img class="productimg" src="img/{{$product->product_image}}" alt="" width="50%"></td>
                                <td class="center"><a href="{{route('hoantacsanpham', $product->id)}}" class="btn btn-info">Hoàn tác</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                  </div>
                  </div>
                  </div>
@endsection