@extends('user.index')
@section('css')
    
@endsection

@section('content')
<style>
    .col-sm-4 img{
        width: 100%;
        margin: 0px;
        padding: 0px;
    }
    .sp{
        margin-bottom: 40px;
        padding: 0px;
        border-radius: 10px;
       
    }
    .sp:hover{
        box-shadow: 2px 2px 2px 2px rgba(59, 59, 59, 0.192);
    }
    .sp img{
        border-radius: 10px 10px 0px 0px;
    }
    
body{
  background-color: rgba(172, 172, 172, 0.164);

}
.sidenav {
  width: 160px;
  position: fixed;
  background-color: white;
  padding-top: 20px;
  margin-top:10px;
  margin-right: 20px;
}
.sp{
  background-color:white;
  padding: 0px;
  padding-bottom: 10px;
  margin: 10px;
}
.mybtn{
  
  color: white !important;
  
}
.mybtn:hover{
  background-color:white;
  color: black !important;
  transition: 0.4s;
}
.sp_name{
  padding-top: 10px;
}
.sp_name:hover{
  color: orange !important;
  transition: 0.4s;
}
.id_color{
  color: orange;
}
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}
.main {
  border-left: orange solid 2px;
  margin:0px 0px 0px 170px  ; /* Same as the width of the sidenav */
  
  font-size: 15px; /* Increased text to enable scrolling */
  padding: 0px 10px;

  
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.main .block_search_wed {
  text-align: left;
}



</style>
<br>
<br>
<br>
<div class="container-fluid">

	<div class="sidenav" >

    <ul class="list-menu pl-0" id="menu">
        <div class="menu-left">
            <li>
                <h5 class="mb-1">Danh mục sản phẩm</h5>
            </li>
            @foreach($TypeUser as $ty)
                @if($ty->productType_status == 1)
                   <a>{{$ty->productType_name}}</a>
                @endif
            @endforeach
        </div>
    </ul>

</div>



	<!---->

<div class="main">

@foreach($TypeUser as $ty)
                @if($ty->productType_status == 1)
	<div class="navbar_1">
		<!--main product-->
		<div>
			<div class="navbar ">
			<div>
                <h2><strong style="border-bottom:orange 3px solid ;">{{$ty->productType_name}}</strong></h2>
            </div>
            </div>
            </div>
            </div>
            <br>
			<!-- start 1 product-->
            <div class="row">
                    @foreach($list_product as $product)
                        @if($product->product_status == 1)
                            @if($product->productType_id == $ty->id)
                            <!--sp1--->
                            <div class="col-sm-4">
                                <div class="sp">
                            <img src="{{ url('images/'.$product->product_image) }}" width="100%" height="70%">
                            <div class="container">
                            <p class="sp_name"><b>{{$product->product_title}}</b></p>
                            <h4 class="id_color">{{number_format($product->product_price)}}</h4>
                            <a class="mybtn btn btn-warning" href="{{route('chitietsanphamUser',  $product->id)}}">Mua Ngay</a>
                            </div>
                            </div>
                            </div>		
                            @endif
                        @endif
                    @endforeach	
            </div>	
			<!---->
			@endif
            @endforeach



	    </div>
</div>
</div>
@endsection