<?php

session_start();
require_once('../database/db.php');

if (empty($_SESSION['login'])) {
  header("Location: ../auth/login");
} else {
  $login = $_SESSION['login'];
}

$user = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$user = mysqli_fetch_assoc($user);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,453;1,453&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,319;1,319&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@513&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
</head>

<body>

  <div class="lmenu" id="lmenu">

    <div class="rzdlmen">
      <p>Пользователь</p>
    </div>

    <a href="../pages/dashboard"><i class="bx bxs-user"></i> Главная</a>

    <a href="../pages/profile?id=<?= $user['id'] ?>"><i class="ri-chat-smile-3-line"></i> Мой профиль</a>

    <div class="rzdlmen">
      <p>Семья</p>
    </div>

    <a href="../pages/users"><i class="ri-group-line"></i> Состав семьи</a>

    <a href="../pages/users_reg"><i class="bx bx-user-plus"></i> Заявки в семью</a>

    <a href="../pages/fam_reports"><i class="ri-newspaper-line"></i> Семейные
      отчеты</a>

    <div class="rzdlmen">
      <p>Соц. сети</p>
    </div>

    <a href=""><i class="ri-discord-fill"></i> Наш Discord</a>

    <a href=""><i class="ri-telegram-fill"></i> Наш Telegram</a>

    <a style="color: red; margin-bottom: 100px;" href="../logout"><i class=" ri-logout-box-line"></i> Выйти</a>
  </div>