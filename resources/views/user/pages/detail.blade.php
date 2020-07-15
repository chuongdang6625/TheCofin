@extends('user.index')
@section('css')
    
@endsection

@section('content')
<br>
<br>
<style>
    

body {
    font-family: 'Lato', sans-serif;
    line-height: 1.42857143;
    font-size: 14px;

      background-color: rgba(172, 172, 172, 0.164);
}
.product-info{
  background-color: white;
  padding: 10px;
}
.product-name{
  border-bottom: 3px orange solid;
  
}
.product-img{
    padding: 0px;
}
.sp{
 background-color:white;
  padding: 0px;
  padding-bottom: 10px;
  margin: 5px;
  padding-left: 0px;
}
.sp_name:hover{
  color: orange !important;
  transition: 0.4s;
}
.id_color{
  color: orange;
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
}

/* Style the buttons inside the tab */
.tablinks {
  background-color: inherit;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color: black;
  font: bold;
}
/* Create an active/current tablink class */

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-radius: 0px 0px 10px 10px;
  border-top: none;
  background-color: #ffffff;
}
.tablinks{
    border-radius: 0px;
}
.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
    border:2px solid #e5e7e8;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
</style>
{{-- Alert comment --}}
    <section class="comment">
        <div class="container-fluid p-0 text-center">
            @if (session()->has('addtocart_success'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('addtocart_success')}}</div>
            @else
                
            @endif
            @if (session()->has('comment_success'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('comment_success')}}</div>
            @else
                
            @endif

            @if (session()->has('comment_fail'))
                <div class="alert alert-danger mb-0 text-uppercase">{{session()->get('comment_fail')}}</div>
            @else
                
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->   

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="{{ url('images/'.$product->product_image) }}" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">{{$product->product_title}}</h3>
      <p>{{$product->product_description}}</p>
      <h3 class="my-3">{{$product->product_price}}</h3>
      <form action="{{route('giohang',$product->id)}}" method="post">
        <div class="quantity" hidden>
            <label class="label-qty float-left">Số lượng: </label>
            <div class="control-qty">
                <button type="button" class="ml-3 btn-number qtyminus" data-type="minus" data-field="qty" disabled="disabled">-</button>
                <input class="input-qty ml-3" type="text" value="1" min="1" max="100" id="qty1" name="qty">
                <button type="button" class="ml-3 btn-number qtyplus" data-type="minus" data-field="qty">+</button>
            </div>
        </div>
            {{ csrf_field() }}
            <div class="clearfix">
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->product_title}}">
                <input type="hidden" name="price" value="{{$product->product_price}}">
                <input type="hidden" name="image" value="{{$product->product_image}}">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng    
                </button>
            </div>
            </form>
      
    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4">Related Projects</h3>

  <div class="row">
  @foreach($productSames as $productSame)
    @if($productSame->id !== $product->id)
    <div class="col-md-3 col-sm-6 mb-4">
      <a href="{{route('chitietsanphamUser', $productSame->id)}}">
            <img class="img-fluid" src="{{ url('images/'.$productSame->product_image) }}" alt="">
            {{$productSame->product_title}}
      </a>
        <h4 class="id_color">{{number_format($product->product_price)}}</h4>
    </div>
    @else

    @endif
@endforeach


   
  </div>
  <!-- /.row -->
  <!-- Nav tabs -->
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
  <div class="row bootstrap snippets">
    <div class="col-md-6 col-md-offset-2 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Comment panel
                </div>
                <div class="panel-body">
                    <form action="{{route('binhluansanpham')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="idProduct" value="{{$product->id}}">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nhập tiêu đề nhận xét (không bắt buộc)" name="comment_title" id="comment_title">
                        </div>
                        <textarea class="form-control" placeholder="Nội dung bình luận" rows="3" name="comment_content" id="comment_content"></textarea>
                        <br>
                        <button type="submit" class="btn btn-info pull-right">Post</button>
                    </form>
                   
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-body">
                            @if(count($comments) > 0)
                                @foreach($comments as $comment)
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{$comment->cment_date}}  </small>
                                </span>
                                <strong class="text-success">{{$comment->user_cment}}</strong>
                                <p>
                                {{$comment->cment_content}}
                                </p>
                                @if($comment->reply_cment)
                                <div class="container">
                                <div ><b>The Cofin:</b></div>
                                <div >{{$comment->reply_cment}}</div>
                                </div>
                                
                                @endif
                                @endforeach

                                @else
                           
                                <div class="clear-fix">Hiện tại chưa có bình luận về sản phẩm này</div>
                            
                            @endif
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
  <div class="tab-pane container fade" id="menu1">...</div>
  <div class="tab-pane container fade" id="menu2">...</div>
</div>

</div>
<!-- /.container -->

<script>
    function openTab(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
<!--end product-new-->
@endsection