<?php
require_once('../database/db.php');
session_start();

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
  $pasdel = $_POST['pasdel'];
  $check = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
  $check = mysqli_fetch_assoc($check);

  if (password_verify($pasdel, $check['pass'])) {
    $chec = mysqli_query($conn, "DELETE FROM users WHERE login = '$login'");
    header("Location: ../logout");

    date_default_timezone_set('Europe/Moscow');
    $time2 = date('d.m.y - H:i') . " (мск)";
    $thlog = $login . ' Удалил свой аккаунт на BeFam. Date: ' . $time2;
    $ssaqq = mysqli_query($conn, "INSERT INTO `logs` (famy, usr, logg) VALUES ('$famy', '$login', '$thlog')");
  } else {
    $_SESSION['erdelk'] = 'nn';
    header("Location: ../pages/dashboard");
  }
} else {
  header("Location: ../pages/dashboard");
}




