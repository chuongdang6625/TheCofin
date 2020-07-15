<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <form class="form-inline" action="/action_page.php">
        <input class="form-control mr-sm-2" id="myInput" type="text" placeholder="Search">
      </form>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('trangchuAdmin')}}"><i class="fas fa-home"></i>TRANG CHỦ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if (Session::has('ql'))
            Quản lý
            @endif
            @if(Session::has('qlsp'))
            Quản lý  sản phẩm
            @endif
            @if(Session::has('qlcskh'))
            Quản lý CSKH
            @endif 
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if(Session::has('ql'))
            <a class="dropdown-item" href="{{route('suaadmin', Session::get('ql') )}}"><i class="fas fa-user"></i> THÔNG TIN ADMIN</a>
            @endif

            @if(Session::has('qlsp'))
            <a class="dropdown-item" href="{{route('suaadmin',  Session::get('qlsp') )}}"><i class="fas fa-user"></i> THÔNG TIN ADMIN</a>
            @endif

            @if(Session::has('qlcskh'))
            <a class="dropdown-item" href="{{route('suaadmin',  Session::get('qlcskh') )}}"><i class="fas fa-user"></i> THÔNG TIN ADMIN</a>
            @endif

            <div class="dropdown-divider"></div>
            @if (Session::has('ql'))
            <a class="dropdown-item" href="{{route('logoutad')}}"><i class='fas fa-door-open'></i> THOÁT</a>
            @endif
            @if(Session::has('qlsp'))
            <a class="dropdown-item" href="{{route('logoutadsp')}}"><i class='fas fa-door-open'></i>THOÁT</a>
            @endif
            @if (Session::has('qlcskh'))
            <a class="dropdown-item" href="{{route('logoutadcskh')}}"><i class='fas fa-door-open'></i>THOÁT</a>
            @endif
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>