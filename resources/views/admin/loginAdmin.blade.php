<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/simple-sidebar.css">

    @yield('css')
    <title>Document</title>
</head>
<body>
    <header>
        @include('admin.admin-navbar')
    </header>
    <br>
    <div class="container">
            <div class="row justify-content-center align-items-center">
    <div class="col col-sm-8 align-self-center">
    <div class="card">
        <div class="card-header">
            <strong>
                Login                    
             </strong>
                @if(session()->has('login_fail1'))
                    <div class="alert alert-danger mb-0 text-uppercase">{{session()->get('login_fail1')}}</div>
                @else

                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </div>
                @endif
        </div><!--card-header-->
    
        <div class="card-body">
            <form method="post" action="{{route('dangnhapAdminTest')}}">
                {{csrf_field()}}

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email Address</label>
    
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Nhập tên tài khoản" maxlength="191" autofocus>
                        </div><!--form-group--> 
                    </div><!--col-->
                </div><!--row-->
    
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Password</label>
    
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
    
                <div class="row">
                    <div class="col">
                        <div class="form-group clearfix">
                            <button class="btn btn-success btn-sm pull-right" type="submit">Login</button>
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
    
            </form>
    
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card body-->
    </div><!--card-->
    </div><!-- col-md-8 -->
    </div><!-- row -->
    </div>
</body>
</html>


