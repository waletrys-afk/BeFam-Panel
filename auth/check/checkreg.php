<?php

require_once('../../database/db.php');
session_start();

$login = $_POST["username"];
$pass = $_POST["pass"];
$family = $_POST["family"];
$family = strtolower($family);
$gamepas = $_POST["gamepas"];
$_SESSION['error'] = "";

$check_username = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$check_username2 = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$check_username2 = mysqli_fetch_assoc($check_username2);
$familys = ['spucmes', 'highter'];

if ($check_username->num_rows > 0) {
  $_SESSION['error'] = "Этот игрок уже существует.";
  header("Location: ../registr");

} elseif (!in_array($family, $familys)) {
  $_SESSION['error'] = "Вы ввели название семьи некорректно.";
  header("Location: ../registr");

} else {
  date_default_timezone_set('Europe/Moscow');
  $time2 = date('d.m.y');

  $hash = password_hash($pass, PASSWORD_DEFAULT);
  $ssas = mysqli_query($conn, "INSERT INTO `applications` (login, pastime, family, regtime) VALUES ('$login', '$gamepas', '$family', '$time2')");
  $ssaq = mysqli_query($conn, "INSERT INTO `users` (login, pass, family, famrank) VALUES ('$login', '$hash', '$family', '0')");
  header("Location: ../../pages/noneakk");
}


