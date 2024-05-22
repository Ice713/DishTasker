<?php
// Initialize the session
session_start();

// include '../config/connection.php';

$log_user = $_SESSION['username'];
$log_pass = $_SESSION['password'];

if(!isset($_SESSION['username'])){
    header('location:../index.php');
}

$log_uname = "SELECT username FROM `user` WHERE username = '$log_user'";
$result = $conn->query($log_uname);

$row = $result->fetch_assoc();

?>

<body class="vh-100" id="user-body">

<header id="user-header" class="container-fluid">
  <div class="d-flex justify-content-between align-items-center p-2 container">
    <h1 class="text-left fw-bold fst-italic m-0 home-banner-header" style="font-size: 2em!important;">
        <a href="index.php" class="text-decoration-none">Dish<span id="home-banner-tasker">Tasker</a>
    </h1>
    <a href="#" class="fs-2 me-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal"><h4 class="m-0 fw-bold fst-italic"><i class="far fa-user"></i> <?php echo $row["username"]  ; ?></h4></a>
  </div>
   
</header>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " id="user-modal">
      <button type="button" class="btn-close ms-auto pt-4 pe-4" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body d-flex flex-column justify-content-center align-items-center mt-3">
        <div id="user-icon" class="d-flex flex-content-center align-items-center text-center green-text">
          <i class="far fa-user w-100"></i>
        </div> 
        <p class="fs-1 my-3 fw-bold fst-italic green-text">Hello, <span class="text-white"><?php echo $row["username"]  ; ?>!</span></p>
        <a href="logout.php" class="btn btn-danger btn-lg text-white mb-5">LOG OUT</a>
      </div>

    </div>
  </div>
</div>

