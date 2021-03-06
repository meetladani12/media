  <!DOCTYPE html>
<html lang="en">
<head>
  <title>MAD</title>
  <link rel = "icon" href ="image/logo.png" type = "image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="Bootstrap/w3.css">
  <script src="Bootstrap/jquery.min.js"></script>
  <script src="Bootstrap/popper.min.js"></script>
  <script src="Bootstrap/bootstrap.min.js"></script>
  <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <script src="Bootstrap/jquery-3.3.1.js"></script>
  <script src="Bootstrap/jquery.dataTables.min.js"></script>
  <script src="Bootstrap/dataTables.bootstrap4.min.js"></script>  
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
  
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      // Animate loader off screen
      $(".se-pre-con").fadeOut("slow");;
    });
  </script> -->
</head>
<body>
  
<!-- <style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(image/LOAD.gif) center no-repeat #fff;
}
</style>

<div class="se-pre-con"></div> -->
<div id='language'>
<div class="jumbotron text-center" id="header" style="border-radius: 0px; margin-bottom:0;height: 120px; padding: 30px;background-image:url(image/bg2.png);background-size: Auto Auto">
  <h1 id="title" style="color: white">Media Management & Information Dissemination for Farmer</h1>
  <h5 style="color: white">Anand Agricultural University, Anand</h5>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/"><i class="fas fa-home"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      @if(Session::has('user'))
        @if(Session::get('user')=='farmer')
          <li class="nav-item">
            <a class="nav-link" href="/ViewVideo">Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/question">Ask Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/viewAnswer">Answer</a>
          </li>
        @elseif(Session::get('user')=='scientist')
          <li class="nav-item">
            <a class="nav-link" href="/upload">Upload Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/myvideo">My Videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/viewQuestion">Question</a>
          </li>
        @elseif(Session::get('user')=='Super')
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">City</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dist">District</a>
            <a class="dropdown-item" href="/taluka">Taluka</a>
            <a class="dropdown-item" href="/village">Village</a>
          </div>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Department</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/departmentType">Department Type</a>
            <a class="dropdown-item" href="/department">Department</a>
          </div>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Group</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/groupType">Group Type</a>
            <a class="dropdown-item" href="/group">Group</a>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/act">Activity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Advisory">Advisory</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/user">Users</a>
          </li>
        @endif
      @endif
    </ul>
      <ul class="navbar-nav ml-auto">
      @if(Session::has('user'))
        @if(Session::get('user')=='farmer')
          <li class="nav-item">
            <a class="nav-link" href="/Fprofile?id={{$_COOKIE['farmerid']}}"><i class="fas fa-user"></i>{{$_COOKIE['nm']}}</a>
          </li> 
        @elseif(Session::get('user')=='scientist')
          <li class="nav-item">
            <a class="nav-link" href="/Sprofile?id={{$_COOKIE['scientistid']}}"><i class="fas fa-user"></i>{{$_COOKIE['nm']}}</a>
          </li>
        @elseif(Session::get('user')=='Super')
          <li class="nav-item">
            <a class="nav-link" href="/SAprofile?id={{$_COOKIE['admin']}}"><i class="fas fa-user"></i>{{$_COOKIE['nm']}}</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/Aprofile?id={{$_COOKIE['admin']}}"><i class="fas fa-user"></i>{{$_COOKIE['nm']}}</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/signout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li> 
      @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign Up</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/regf">Farmer</a>
            <a class="dropdown-item" href="/regs">Scientist</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/signin"><i class="fas fa-sign-in-alt"></i> Login</a>
        </li> 
      @endif   
      </ul>
    
  </div>  
</nav>

  <div class="" >
  @section('body')
    @show
  </div>
  
<div class="jumbotron text-center" id="footer" style="border-radius: 0px;margin-bottom:0;height: 50px; padding: 12px;background-color: #343a40;color: white">
  Developed by: Meet Ladani
</div>
</div>
</body>
</html>