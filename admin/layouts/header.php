<?php
  session_start();
  require_once($baseUrl.'.././Utils/utility.php');
  require_once($baseUrl.'.././processDB/dbhelper.php');

  $user = getUserToken();
  if($user == null) {
    header('Location: '.$baseUrl.'authen/login.php');
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?=$baseUrl?>../assets/css/dashboard.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow position-relative">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Group3Shop</a>
  <ul class="navbar-nav px-3">
    
  </ul>
</nav>	
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active text-info" href="<?=$baseUrl?>">
              <i class="bi bi-house-fill"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?=$baseUrl?>category">
              <i class="bi bi-folder"></i>
              Products Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?=$baseUrl?>product">
              <i class="bi bi-file-earmark-text"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?=$baseUrl?>order">
              <i class="bi bi-minecart"></i>
              Order Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?=$baseUrl?>feedback">
              <i class="bi bi-question-circle-fill"></i>
              Feedback Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?=$baseUrl?>user">
              <i class="bi bi-people-fill"></i>
             User Management
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-info" href="<?=$baseUrl?>authen/logout.php">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
