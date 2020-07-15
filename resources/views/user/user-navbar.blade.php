<style>
    .logo{
  width:300px;
  padding: 0px 70px !important;
}
.nav-link{
  padding: 0px 30px !important;
}
nav{
  background-color: black;
  font-size: 20px;
}
nav a{
  color: white;
}
nav a:hover{
  color: rgb(199, 130, 3);
  transition: 0.4s;
}
body{
  padding-top: 60px;
}
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("../image/user-page-img.jpg");
  min-height: 75%;
}

.sanpham{
    width: 100%;
}
.spprice{
    font-weight: 10px;
}
button{
    background-color: white;
    color: orange;
    border: solid 2px orange;
    border-radius: 5px;
    transition: 0.4s;
}
.dtlbtn:hover{
    background-color: orange;
    color: white;
}
.buybtn{
    background-color: orange;
    color: white;
}
.buybtn:hover{
    background-color: white;
    color: orange;
}
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
.loginbutton {
  background-color: #1C86EE;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.loginbutton:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 10%;

}



span.psw {
  float: right;
  padding-top: 16px;
  color:#1C86EE ;
}

span.psw a{
  color:#1C86EE ;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  padding-left: 20%;
  padding-right: 20%;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 1% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 400px; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
@media screen and (max-width: 500px) {
  nav a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .mynavbar {
    float: none;
  }
}
</style>
<nav class="navbar navbar-expand-sm  fixed-top">
    <div class="container-fluid mynavbar" >
    <!-- Brand -->
    <a style="text-align: center;" href="#"><img class="logo" src="images/logo3.jfif" alt=""></a>
    <!-- Links -->
    <div  class="navbar-nav " >
      <div  class="nav-item">
        <a class="nav-link" href="{{route('trangchuUser')}}">HOME</a>
      </div>
      <div  class="nav-item">
        <a class="nav-link" href="{{route('danhSachSanPham')}}">MENU</a>
      </div>
      <div  class="nav-item">
        <a class="nav-link"  href="tintuc">NEWS</a>
      </div>
      <div  class="nav-item">
        <a class="nav-link" href="cuahang">FEEDBACK</a>
      </div>
    </div class="nav-item">
    <div class="nav-item">
      <a class="nav-link" href="{{route('giohang')}}"><i class="fas fa-shopping-cart"></i>
        @if(Cart::instance('default')->count() > 0)
        <small style="font-size: 8px;" class="badge badge-light">{{Cart::instance('default')->count()}}</small>
        @else

        @endif
      </a>
  </div>
    <form  class="form-inline" action="/action_page.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-warning" type="submit">Search</button>
    </form>
    <div  class="nav-item">

      @if(Session::has('logined'))
     <a href="{{route('thongtin', Session::get('logined') )}}" class="btn btn-success">{{Auth::user()->username}}</a>
     <a href="{{route('thoatUser')}}">Đăng Xuất</a>
      {{-- @dd(Session::get('logined')); --}}
      @else
      <button class="btn btn-success" onclick="document.getElementById('id01').style.display='block'" >Đăng nhập</button>
      @endif
    </div>
    <!--------------------------------------------------------------login form------------------------------------------------------------------------------>
<div id="id01" class="modal">
	  
  <form class="modal-content animate" action="{{route('dangnhapUserTest')}}" method="post">
    {{csrf_field()}}
    <div class="container">
      <label for="username"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>

      <label for="password"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
        
      <button class="loginbutton" type="submit">Đăng nhập</button>
      <a href="{{route('dangkyUser')}}" class="loginbutton" style="text-align: center;">Đăng ký</a>
    </div>

  </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
<!---------------------------------------------------------------------------------------------------------------------------------------------->
</div>

</nav>