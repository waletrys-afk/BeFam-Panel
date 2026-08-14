<?php

require_once('../../database/db.php');
session_start();


$login = $_POST["login"];
$pass = $_POST["pass"];
$_SESSION['error'] = "";
$_SESSION['flog'] = '';

$check_log = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$check_log2 = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$check_log2 = mysqli_fetch_assoc($check_log);

if (!$check_log->num_rows > 0) {
  $_SESSION['error'] = 'Неверный логин или пароль';
  header("Location: ../login");
} elseif (!password_verify($pass, $check_log2['pass'])) {
  $_SESSION['error'] = 'Неверный пароль';
  header("Location: ../login");
} elseif ($check_log2['famrank'] == '0') {
  $_SESSION['error'] = 'Аккаунт не подтвержден';
  header("Location: ../login");
} else {
  $_SESSION['login'] = $login;
  header("Location: ../../pages/dashboard");
}
