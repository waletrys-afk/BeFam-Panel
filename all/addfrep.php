<?php
require_once('../database/db.php');
session_start();

$reptypeg = $_POST['reptypeg'];
$replinkkg = $_POST['replinkkg'];

$login = $_SESSION['login'];

$user = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$user = mysqli_fetch_assoc($user);
$snrang = $user['famrank'];
$famy = $user['family'];

$_SESSION['sms'] = 'Вы опубликовали отчет "' . $reptypeg . '"!';
date_default_timezone_set('Europe/Moscow');
$time2 = date('d.m.y H:i');
$ssaq = mysqli_query($conn, "INSERT INTO `famreports` (ottype, sender, snrang, dok, dates, famy) VALUES ('$reptypeg', '$login', '$snrang', '$replinkkg', '$time2', '$famy')");
header("Location: ../pages/fam_reports");