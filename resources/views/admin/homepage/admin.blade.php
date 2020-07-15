@extends('admin.index')
@section('css')
    
@endsection

@section('content')
<style>
.mainicon{
    font-size:120px;
    color: black;
}
.mainicon:hover{
    font-size:120px;
    color: white;
}
.col-md-2{
border-radius: 10px;
transition: 0.2s;
}
.col-md-2:hover{
background-color: black;
color: white;
}
</style>
<div class="container-fluid">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-header">Trang Chủ</h1>
            </div>
            
            <div class="col-md-6">
            @if (session()->has('login_success1'))
            <div class="alert alert-info mb-0 text-uppercase">{{session()->get('login_success1')}}</div>
            @else
                
            @endif
        </div>        
     
    </div>
    </div>
</div>
<hr>
    <div class="container">
        @if (session()->has('ql'))
        <div class="row">
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-id-card"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll-h"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-comment-alt"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-calendar"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-user-tie"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-shopping-cart"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-mail-bulk"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll-h"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-comment-alt"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-calendar"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-user-tie"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-shopping-cart"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-mail-bulk"></i></a>
                </center>
            </div>
        </div>
        @endif

        @if (session()->has('qlsp'))
        <div class="row">
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll-h"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-comment-alt"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-calendar"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-user-tie"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-shopping-cart"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-mail-bulk"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll-h"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-comment-alt"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-calendar"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-user-tie"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-shopping-cart"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-mail-bulk"></i></a>
                </center>
            </div>
        </div>
        @endif

        @if (session()->has('qlcskh'))
        <div class="row">
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-id-card"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll-h"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-comment-alt"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-calendar"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-user-tie"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-shopping-cart"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-mail-bulk"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-poll-h"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-comment-alt"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-calendar"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-user-tie"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-shopping-cart"></i></a>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                <a class="mainicon" href=""><i class="fas fa-mail-bulk"></i></a>
                </center>
            </div>
        </div>
        @endif
    </div>
    <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>
    @endsection

