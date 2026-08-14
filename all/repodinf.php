<?php
require_once('../database/db.php');
session_start();

$repid = $_POST['repodinf'];
$login = $_SESSION['login'];

$check = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$check = mysqli_fetch_assoc($check);
$prvid = $check['id'];

$check_log = mysqli_query($conn, "UPDATE `famreports` SET status = 'ОДОБРЕНО' WHERE id = $repid");
$check_lg = mysqli_query($conn, "UPDATE `famreports` SET prvid = $prvid WHERE id = $repid");
$check_g = mysqli_query($conn, "UPDATE `famreports` SET prov = '$login' WHERE id = $repid");

$user = mysqli_query($conn, "SELECT * FROM `famreports` WHERE id = $repid");
$user = mysqli_fetch_assoc($user);
$famy = $user['famy'];
$usr = $user['sender'];

date_default_timezone_set('Europe/Moscow');
$time2 = date('d.m.y - H:i') . " (мск)";
$thlog = $login . ' Одобрил семейный отчет(id: ' . $repid . ') пользователю ' . $usr . ' Date: ' . $time2;
$ssaqq = mysqli_query($conn, "INSERT INTO `logs` (famy, adm, usr, logg) VALUES ('$famy', '$login', '$usr', '$thlog')");

$_SESSION['sms'] = 'Вы одобрили семейный отчет(id: ' . $repid . ') пользователю ' . $usr . '!';

header("Location: ../pages/fam_reports");