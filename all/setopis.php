<?php
require_once('../database/db.php');
session_start();

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
  $opis = $_POST['newopis'];
  $_SESSION['sms'] = 'Вы изменили свое описание!';

  $check_log = mysqli_query($conn, "UPDATE `users` SET opis = '$opis' WHERE login = '$login'");
} 

header("Location: ../pages/dashboard");