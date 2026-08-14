<?php
require_once('../database/db.php');
session_start();

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
  $link = $_POST['linkbnr'];
  $_SESSION['sms'] = 'Вы изменили свой банер!';

  $check_log = mysqli_query($conn, "UPDATE `users` SET baner = '$link' WHERE login = '$login'");
} 

header("Location: ../pages/dashboard");