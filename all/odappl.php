<?php
require_once('../database/db.php');
session_start();

$otlogin = $_POST['zrid2'];
$login = $_SESSION['login'];

$check_lg = mysqli_query($conn, "UPDATE `users` SET famrank = '1' WHERE login = '$otlogin'");
$checc = mysqli_query($conn, "DELETE FROM applications WHERE login = '$otlogin'");

$user = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$user = mysqli_fetch_assoc($user);
$famy = $user['family'];

date_default_timezone_set('Europe/Moscow');
$time2 = date('d.m.y - H:i') . " (мск)";
$thlog = $login . ' Одобрил регистрацию пользователю ' . $otlogin . ' Date: ' . $time2;
$time22 = date('d.m.y');
$checa_l = mysqli_query($conn, "UPDATE `users` SET datereg = '$time22' WHERE login = '$otlogin'");

$ssaqq = mysqli_query($conn, "INSERT INTO `logs` (famy, adm, usr, logg) VALUES ('$famy', '$login', '$otlogin', '$thlog')");

$_SESSION['sms'] = 'Вы одобрили регистрацию пользователю ' . $otlogin . '! Пользователю назначен ранг: 1.';

header("Location: ../pages/users_reg");