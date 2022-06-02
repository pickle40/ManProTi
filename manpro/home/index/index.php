<?php 
include "connect.php";
// include "navbar.php";

if(isset($_GET['stat'])){
  if($_GET['stat']==1){
    echo "<script>alert('username tidak boleh kosong');</script>";
  } else if($_GET['stat']==2){
    echo "<script>alert('Password tidak boleh kosong');</script>";
  } else if($_GET['stat']==3){
    echo "<script>alert('Password salah');</script>";
  } else if($_GET['stat']==4){
    echo "<script>alert('Account tidak ditemukan');</script>";
  } else if($_GET['stat']==5){
    echo "<script>alert('Session anda expired');</script>";
  }  else if($_GET['stat']==6){
    echo "<script>alert('Anda admin yang tidak aktif!');</script>";
  } 
  
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title></title>
</head>
<style type="text/css">
  body{
    height: 100vh;
    background-image: url(bg.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow-y: hidden;
}


.container form input{
    width: calc(100% - 20px);
    padding: 8px 10px;
    margin-bottom: 15px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid #FE7F9C;
    color: #fff;
    font-size: 20px;
}


.container form input:focus{
    width: calc(100% - 20px);
    padding: 8px 10px;
    margin-bottom: 15px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid #FE7F9C;
    color: #fff;
    font-size: 20px;
}

</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: black">
        <div class="container">
        <a class="navbar-brand" href="#">
          <img src="kucing.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
          Kocheng
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:700px;">
          <ul class="navbar-nav"  style="margin-left: auto;">
            <li class="nav-item">
              <a class="nav-link" href="manpro/home/halamanpelamar.php">Lamar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Login</a>
            </li>
          </ul>
        </div>
        </div>
        </div>
      </nav>

<div class="container">
  <div style="margin-top: 200px;" class="row">
    <div class="col-1 col-lg-4"></div>
    <div class="col-10 col-lg-4" style="Backdrop-filter: blur(5px);color:white;background-color: #ffffff66;  border-radius: 10px; padding: 20px;">

         <h1 style="text-align: center;">Login</h1>

        <div class="row">
        
        <form action="ceklogin.php" method="POST">
          <label class="form-label">Username</label><br>
          <input class="form-control" name="username" id = "username">
          <label class="form-label">Password</label><br>
          <input class="form-control" type = password name="password" id = "password">
          <br>
          <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
            <button style="width: 100%; justify-content: center; justify-items: center; justify-self: center;" class="btn btn-dark">Log in</button>
            </div>
            <div class="col-1"></div>

          </div>
        
          
        </form>

        </div>


    </div>
    <div class="col-1 col-lg-4"></div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>