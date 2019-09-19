<!DOCTYPE html>
<html lang="en">
<head>
  <title>MAD</title>
  <link rel = "icon" href ="image/logo.png" type = "image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<script>
</script>   

</head>
<body>
<div id='language'>
<div class="jumbotron text-center" id="header" style="border-radius: 0px; margin-bottom:0;height: 120px; padding: 30px;background-image:url(image/bg2.png);background-size: Auto Auto">
  <h1 id="title" style="color: white">Media Management And Dissemination For AAU</h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="/"><img src="image/cam.png" style="width: 45px;height: 30px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
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
        @else
          <li class="nav-item">
            <a class="nav-link" href="/user">Users</a>
          </li>
        @endif
      @endif
    </ul>
      <ul class="navbar-nav ml-auto">
      @if(Session::has('user'))

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
  
<div class="jumbotron text-center" style="border-radius: 0px;margin-bottom:0;height: 50px; padding: 12px;background-color: #2c2e30;color: white">
  Developed by: Meet Ladani
</div>
</div>
</body>
</html>