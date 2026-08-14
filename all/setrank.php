<?php
require_once('../database/db.php');
session_start();

$inpnrank = $_POST['inpnrank'];
$login = $_SESSION['login'];
$setlogin = $_SESSION['stloginuser'];

$user = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$user = mysqli_fetch_assoc($user);
$setuser = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$setlogin'");
$setuser = mysqli_fetch_assoc($setuser);

$chhs = mysqli_query($conn, "SELECT * FROM `users` WHERE famrank = '9'");

$famy = $user['family'];

if ($inpnrank < 1 or $inpnrank > 9) {
  $_SESSION['setrerr'] = '* Вы не можете выдать такой ранг.';
} elseif ($inpnrank == 9 and $chhs->num_rows >= 6) {
  $_SESSION['setrerr'] = '* Максимум может быть 6 заместителей.';
} elseif ($inpnrank == 9 and $user['famrank'] != '10') {
  $_SESSION['setrerr'] = '* 9 ранг может назначить только лидер.';
} else {
  $check_log = mysqli_query($conn, "UPDATE `users` SET famrank = '$inpnrank' WHERE login = '$setlogin'");
  $_SESSION['sms'] = 'Вы изменили ранг ' . $setlogin . ' на ' . $inpnrank . '!';


  date_default_timezone_set('Europe/Moscow');
  $time2 = date('d.m.y - H:i') . " (мск)";
  $thlog = $login . ' Изменил ранг на сайте пользователю ' . $setlogin . '. Новый ранг: ' . $inpnrank . '. Date: ' . $time2;
  $ssaqq = mysqli_query($conn, "INSERT INTO `logs` (famy, adm, usr, logg) VALUES ('$famy', '$login', '$setlogin', '$thlog')");
  
}


header("Location: ../pages/users");