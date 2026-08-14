<?php

session_start();
require_once('../database/db.php');

$userId = $_GET['id'] ?? '';

if (!empty($userId)) {
  $user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$userId'");
  $user = mysqli_fetch_assoc($user);
} else {
  header("Location: ../auth/login");
}

if (empty($user)) {
  header("Location: ../auth/login");
}

if ($user['family'] == 'spucmes') {
  $famzc = 'rgb(109, 218, 0)';
  $famzbc = 'rgba(103, 206, 0, 0.212);';
  $famzb = 'rgba(69, 138, 0, 0.212);';

} elseif ($user['family'] == 'highter') {
  $famzc = 'rgb(218, 167, 0)';
  $famzbc = 'rgba(206, 124, 0, 0.21);';
  $famzb = 'rgba(138, 94, 0, 0.21);';
}

?>


<!DOCTYPE html>
<html lang="en" style="overflow-y: auto;">

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
  <title>BeFam - <?= $user['login'] ?>.</title>
</head>

<body>
  <img class="asd" src="../all/sGlVi.jpg">

  <a href="../pages/dashboard" class="sadf14 anim"><span><i class="bx bx-planet"></i> Be</span>Fam Panel</a>
  
  <? if (empty($user['baner'])): ?>
    <br>
    <br>
    <br>
  <? endif ?>

  <div class="prfomainb anim">
    <div class="esa1">
      <? if (!empty($user['baner'])): ?>
        <div class="prfusbaner">
          <img src="<?= $user['baner'] ?>">
          <div class="bnrasc1"></div>
        </div>
      <? else: ?>
        <br>
      <? endif ?>
      <div class="prfussav">
        <? if (empty($user['avatar'])): ?>
          <b><?= $user['login'][0] ?></b>
        <? else: ?>
          <img src="<?= $user['avatar'] ?>">
        <? endif ?>
      </div>
      <h2><?= $user['login'] ?>
        <? if ($user['famrank'] == '10' || $user['famrank'] == '9'): ?>
          <i class="bx bx-badge-check"></i>
        <? endif ?>
      </h2>
      <div class="prfnamsdp">
        <p class="sdfa12"><?= $user['family'] ?>: <?= $user['famrank'] ?> ранг</p>
        <? if ($user['login'] == 'Dmitriy_Spucme'): ?>
          <p class="sdfera2">!Разработчик</p>
        <? endif ?>
      </div>
      <hr class="prfmushr">
      <div class="obuserty1">
        <h2>О пользователе</h2>
        <p>Семья: <span><?= $user['family'] ?></span></p>
        <p>Предупреждения: <span><?= $user['pred'] ?>/2</span></p>
        <p>Ранг в семье: <span><?= $user['famrank'] ?>/10</span></p>
        <p>Дата регистрации: <span><?= $user['datereg'] ?></span></p>
        <p>id в database: <span><?= $user['id'] ?></span></p>
      </div>

      <hr class="prfmushr">

      <div class="obuserty1">
        <h2>Описание</h2>
        <p><?= $user['opis'] ?? 'Не установлено.' ?></p>
      </div>

      <hr class="prfmushr">

    </div>
  </div>

  <style>
    .sdfa12 {
      font-size: 14px;
      color:
        <?= $famzc ?>
      ;
      background-color:
        <?= $famzbc ?>
      ;
      padding: 0 10px;
      border-radius: 5px;
      border: 1px solid
        <?= $famzb ?>
      ;
    }
  </style>
</body>

</html>