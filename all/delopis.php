<?php
require_once('../database/db.php');
session_start();

if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];

  $check_log = mysqli_query($conn, "UPDATE `users` SET opis = NULL WHERE login = '$login'");
} 

header("Location: ../pages/dashboard");