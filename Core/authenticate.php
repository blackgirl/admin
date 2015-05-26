<?php
$username = null;
$password = null;

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    
    if($username == 'user' && $password == 'pass') {
      session_start();
      $_SESSION["authenticated"] = 'true';
      header('Location:'.$host.'php_unicreo/app/main');
    }
    else {
      Route::LoginPage();
    }
    
  } else {
    Route::LoginPage();
  }
// } else {
?>