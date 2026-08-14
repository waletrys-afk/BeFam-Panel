<?php
require_once('../database/db.php');
session_start();

$userid = $_POST['useridrank'] ?? '';

$user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$userid'");
$user = mysqli_fetch_assoc($user);

  $_SESSION['stloginuser'] = $user['login'];
  $_SESSION['stterank'] = $user['famrank'];
  $_SESSION['ss'] = 'ee';

header("Location: ../pages/users");