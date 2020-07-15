@extends('user.index')
@section('css')
    
@endsection

@section('content')
<br>
<br>
<br>
<section class="container p-0">
        <div class="container-fluid p-0 text-center">
            @if (session()->has('delete_success'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('delete_success')}}</div>
            @else
                
            @endif
        </div>
</section>
<div class="row pb-5">
    <div class="container">
    @if (Cart::count() > 0)
        <h2>Thông tin giỏ hàng</h2>
        <table class="table table-striped ">
                <thead>
                <tr>
                <th scope="col" colspan="2">Giỏ hàng({{Cart::content()->count()}} sản phẩm)</th>
                <th scope="col">Giá bán (VNĐ/1)</th>
                <th scope="col" colspan="3"><center>Số lượng</center> </th>
                <th scope="col">Thành tiền</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::content() as $item)
                <tr>
                <td class="text-center"><img style="width: 150px;" src="{{ url('images/'.$item->options->image)}}" alt=""></td>
                    <td>{{$item->name}}</td>
                    <td class="text-price"><strong>{{number_format($item->price) }} đ</strong></td>
                    <td>
                        <form action="{{route('giamsoluong')}}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn-number" data-type="minus" data-field="qty1" name="qtyminus">-</button>
                            <input type="hidden" name="qty" value="{{$item->qty}}">
                            <input type="hidden" name="id" value="{{$item->rowId}}">
                        </form>
                    </td>

                    <td class="text-price"><input class="input-qty ml-2 text-center"readonly type="text" value="{{$item->qty}}" min="1" max="100" name="qty1"></td>

                    <td>
                        <form action="{{route('tangsoluong')}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="ml-2 btn-number" data-type="minus" data-field="qty1" name="qtyplus">+</button>
                                <input type="hidden" name="qty" value="{{$item->qty}}">
                                <input type="hidden" name="id" value="{{$item->rowId}}">
                        </form>         
                    </td>

                    <td class="text-price"><strong>{{number_format($item->price * $item->qty)}} ₫</strong></td>
                    <td> 
                        <form action="{{route('deleteItem',$item->rowId)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-link btn-item-delete" title="xóa sản phẩm">Xóa</button>
                        </form>
                     </td>
                </tr>
            @endforeach
                <tr>
                    <td class="text-right" colspan="7"><strong>Tổng tiền: </strong></td>
                    <td class="text-price">
                       <strong style="color: red;">{{Cart::priceTotal(0,'',',')}} đ</strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{route('xoagiohang')}}">Xóa tất cả sản phẩm</a>
        <hr>
        <tr>
            <a class="btn btn-primary btn-success" href="{{route('thanhtoan')}}">Tiến hành đặt hàng</a>
            <a class="btn btn-primary" href="{{route('danhSachSanPham')}}">Chọn thêm sản phẩm</a>
        </tr>
    @else
        <h2>Thông tin giỏ hàng</h2>
        <table class="table table-striped ">
                <thead>
                <tr>
                <th scope="col" colspan="2">Giỏ hàng(0 sản phẩm)</th>
            
                <th scope="col">Giá bán (VNĐ/1)</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>   
        <tr><a class="btn-cart buy-more-product mt-2 mt-md-0" href="{{route('danhSachSanPham')}}">Quay lại danh sách sản phẩm</a></tr>
    @endif
    </div>
</div>
@endsection