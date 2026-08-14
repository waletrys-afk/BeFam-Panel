<?php
require_once('../database/db.php');
session_start();

$otlogin = $_POST['zrid'];
$login = $_SESSION['login'];

$chec = mysqli_query($conn, "DELETE FROM users WHERE login = '$otlogin'");
$checc = mysqli_query($conn, "DELETE FROM applications WHERE login = '$otlogin'");

$user = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$user = mysqli_fetch_assoc($user);
$famy = $user['family'];

date_default_timezone_set('Europe/Moscow');
$time2 = date('d.m.y - H:i') . " (мск)";
$thlog = $login . ' Отказал в регистрации пользователю ' . $otlogin . ' Date: ' . $time2;
$ssaqq = mysqli_query($conn, "INSERT INTO `logs` (famy, adm, usr, logg) VALUES ('$famy', '$login', '$otlogin', '$thlog')");

$_SESSION['sms'] = 'Вы отказали регистрацию пользователю ' . $otlogin . '!';

header("Location: ../pages/users_reg");

