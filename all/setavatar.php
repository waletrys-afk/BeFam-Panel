<?php
require_once('../database/db.php');
session_start();

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
  $link = $_POST['linkav'];
  $_SESSION['setavvv'] = 'scss';

  $check_log = mysqli_query($conn, "UPDATE `users` SET avatar = '$link' WHERE login = '$login'");
} 

header("Location: ../pages/dashboard");