<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
    <title>Document</title>
    <style>
        .title{
          font-style:italic;
          font-weight:bold;
          color: #00000080;
        }
        .nabar_name{
            margin-left:10px;
        }
        nav{
          background-color:#DBE6FD;
          color:white;
        }
        nav a{
          color :white; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/bendera.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
     <span class="title"> Smart Prakerin </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"> <i class="fas fa-home"><span class="navbar_name"> Halaman Utama</span></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"><span class="navbar_name"> Masuk</span></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar.php"><i class="fas fa-user-plus"><span class="navbar_name">Daftar</span></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>