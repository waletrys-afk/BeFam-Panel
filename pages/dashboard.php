<?php

session_start();
require_once('../database/db.php');

if (empty($_SESSION['login'])) {
  header("Location: ../auth/login");
} else {
  $login = $_SESSION['login'];
}

if (!empty($_SESSION['sms'])) {
  $sms = $_SESSION['sms'];
} else {
  $sms = '';
}

if (!empty($_SESSION['smsa'])) {
  $sms = $_SESSION['smsa'] ?? '';
  $_SESSION['smsa'] = '';
} else {
}



$user = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$login'");
$user = mysqli_fetch_assoc($user);


if ($user['family'] == 'spucmes') {
  $famzc = 'rgb(109, 218, 0)';
  $famzbc = 'rgba(103, 206, 0, 0.212);';
  $famzb = 'rgba(69, 138, 0, 0.212);';

} elseif ($user['family'] == 'highter') {
  $famzc = 'rgb(218, 167, 0)';
  $famzbc = 'rgba(206, 124, 0, 0.21);';
  $famzb = 'rgba(138, 94, 0, 0.21);';
}


if (isset($_SESSION['setavvv'])) {
  $setavvv = $_SESSION['setavvv'];
  $_SESSION['setavvv'] = '';
}

if (isset($_SESSION['erdelk'])) {
  $erdelk = $_SESSION['erdelk'];
  $_SESSION['erdelk'] = '';
}

$usfam = $user['family'];
$confam = mysqli_query($conn, "SELECT * FROM `users` WHERE family = '$usfam' and famrank != '0'");
$colwfam = $confam->num_rows;
$procfam = ($colwfam / 180) * 100 . '%';

$zamfam = mysqli_query($conn, "SELECT * FROM `users` WHERE family = '$usfam' and famrank = '9' or famrank = '10'");
$proczam = ($zamfam->num_rows / 6) * 100 . '%';

$logs = mysqli_query($conn, "SELECT * FROM `logs` WHERE usr = '$login' or adm = '$login' ORDER BY id DESC");

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
  <title>BeFam - Главная.</title>
</head>

<body>
  <?php include '../all/header.php'; ?>

  <main>

    <?php include '../all/lmenu.php'; ?>

    <div class="mainblock">
      <h1>Главная информация</h1>
      <div class="rmenu">
        <div class="column1">
          <div class="profile anim">
            <div class="profileinf">
              <div class="prfava">
                <? if (empty($user['avatar'])): ?>
                  <b><?= $user['login'][0] ?></b>
                <? else: ?>
                  <img src="<?= $user['avatar'] ?>">
                <? endif ?>
              </div>
              <div class="prfinf">
                <h1><?= $user['login'] ?>
                  <? if ($user['famrank'] == '10' || $user['famrank'] == '9'): ?>
                    <i class="bx bx-badge-check"></i>
                  <? endif ?>
                </h1>
                <div class="frinfpr">
                  <p><?= $user['family'] ?></p>
                  <span>[ <?= $user['famrank'] ?> Ранг ]</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="dopinfpr">
              <div>
                <p>Предупреждения</p>
                <span><?= $user['pred'] ?>/2</span>
              </div>
              <div>
                <p>Ранг в семье</p>
                <span><?= $user['famrank'] ?>/10</span>
              </div>
              <div>
                <p>Дата регистрации</p>
                <span><?= $user['datereg'] ?></span>
              </div>
              <div class="dnn1">
                <p>id в database</p>
                <span><?= $user['id'] ?></span>
              </div>
            </div>
          </div>

          <div class="setavatar anim">
            <form method="post" action="../all/setavatar">
              <h2>Сменить аватар</h2>
              <p><i class=" ri-links-fill"></i> Вставьте ссылку на новый аватар</p>
              <input placeholder="Ссылка на новый аватар" required name="linkav" type="link">
              <div class="setavbutt">
                <a onclick="addBlock('Вы удалили аватар!')" href="../all/delavatar"><b>Удалить аватар</b></a>
                <button type="submit" style="color: rgb(0, 209, 28);"><b>Сменить аватар</b></button>
              </div>
            </form>
          </div>

          <div class="setavatar anim">
            <form method="post" action="../all/setopis">
              <h2>Изменить описание</h2>
              <p><i class=" ri-links-fill"></i> Текст описания:</p>
              <textarea placeholder="Введите текст нового описания" required name="newopis"
                type="link"><?= $user['opis'] ?></textarea>
              <div class="setavbutt">
                <a onclick="addBlock('Вы удалили описание!')" href="../all/delopis"><b>Удалить описание</b></a>
                <button type="submit" style="color: rgb(0, 209, 28);"><b>Сохранить описание</b></button>
              </div>
            </form>
          </div>

          <div class="setavatar anim">
            <form method="post" action="../all/setbaner">
              <h2>Изменить банер</h2>
              <p><i class=" ri-links-fill"></i> Вставьте ссылку на новый банер</p>
              <input placeholder="Ссылка на новый банер" required name="linkbnr" type="link">
              <div class="setavbutt">
                <a onclick="addBlock('Вы удалили банер!')" href="../all/delbaner"><b>Удалить банер</b></a>
                <button type="submit" style="color: rgb(0, 209, 28);"><b>Сменить банер</b></button>
              </div>
            </form>
          </div>

          <div class="delack anim">
            <form method="post" action="../all/dellacount">
              <h2>Удалить аккаунт</h2>
              <p><i class=" ri-lock-fill"></i> Введите пароль от аккаунта. Это действмие необратимо!</p>
              <input placeholder="Пароль от аккаунта" required name="pasdel" type="password">
              <button type="submit" style="color: rgb(209, 0, 0);"><b>Удалить аккаунт</b></button>
            </form>
          </div>
        </div>
        <div class="column2">
          <div class="inffam">
            <div class="inffam1">
              <h2>Основаня информация
                <p><?= $user['family'] ?></p>
              </h2>
              <p><i class="ri-group-line"></i> Состав семьи на BeFam</p>
              <div class="anim">
                <p><span><?= $confam->num_rows ?></span> /180</p>
                <div class="infline1">
                </div>
              </div>
              <p><i class=" ri-stack-fill"></i> Заместители (9-10 ранг) на BeFam</p>
              <div class="anim">
                <p><span><?= $zamfam->num_rows ?></span> /6</p>
                <div class="infline2">
                </div>
              </div>
            </div>
          </div>
          <p class="namzam"><i class=" ri-stack-fill"></i> Управляющие семьи на BeFam</p>
          <div class="allzams">
            <?php while ($row = $zamfam->fetch_assoc()): ?>
              <?php
              $ssr = htmlspecialchars($row['login']);
              $avsm = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$ssr'");
              $avsm = mysqli_fetch_assoc($avsm);
              $ssrava = $avsm['avatar'];
              ?>
              <div class="zam anim">
                <div class="inzam">
                  <div class="zamava">
                    <? if (empty($ssrava)): ?>
                      <p>
                        <?= htmlspecialchars($row['login'])[0] ?>
                      </p>
                    <? else: ?>
                      <img src="<?= $ssrava ?>">
                    <? endif ?>
                  </div>
                  <div class="zaminf">
                    <h3>
                      <?= htmlspecialchars($row['login']) ?> <i class="bx bx-badge-check"></i>
                    </h3>
                    <? if (htmlspecialchars($row['famrank']) == '10'): ?>
                      <p>Ранг: Лидер (10)</p>
                    <? else: ?>
                      <p>Ранг: Заместитель(9)</p>
                    <? endif ?>
                  </div>
                </div>
              </div>
            <?php endwhile ?>
          </div>

          <h1 class="namelogs">Логи на платформе</h1>

          <div class="userlogs anim">
            <h2><i class=" ri-bookmark-3-fill"></i> Логи пользователя</h2>
            <hr>

            <div class="logs" id="clrew">
              <?php while ($row = $logs->fetch_assoc()): ?>

                <a><?= htmlspecialchars($row['logg']) ?> | (L-id: <?= htmlspecialchars($row['id']) ?>).</a>

              <?php endwhile ?>
            </div>

          </div>

        </div>
      </div>
      <footer></footer>
    </div>
    <div class="smss" id="column"></div>
  </main>
  <script src="../script.js"></script>
  <script>

    document.addEventListener('DOMContentLoaded', function opener() {
      let setavvv = <?php echo json_encode($setavvv); ?>;
      if (setavvv && setavvv.trim() !== '') {
        addBlock('Вы успешно установили новый аватар!')
        <?php $_SESSION['setavvv'] = ''; ?>
        <?php $setavvv = ''; ?>
        setavvv = '';
      }

    })

    document.addEventListener('DOMContentLoaded', function opener() {
      let erdelk = <?php echo json_encode($erdelk); ?>;
      if (erdelk && erdelk.trim() !== '') {
        addBlock('Неверный пароль!')
        <?php $_SESSION['erdelk'] = ''; ?>
        <?php $erdelk = ''; ?>
        erdelk = '';
      }

    })

    document.addEventListener('DOMContentLoaded', function openere() {
      let sms = <?php echo json_encode($sms); ?>;
      if (sms && sms.trim() !== '') {
        addBlock(sms);
        <?php $_SESSION['sms'] = ''; ?>
      }

    })

  </script>



  <style>
    .infline1::after {
      content: '';
      position: absolute;
      left: 0;
      background-color: #5f1bff;
      height: 120%;
      position: relative;
      border-radius: 12px;
      width:
        <?= $procfam ?>
      ;
    }

    .infline2::after {
      content: '';
      position: absolute;
      left: 0;
      background-color: #5f1bff;
      height: 120%;
      position: relative;
      border-radius: 12px;
      width:
        <?= $proczam ?>
      ;
    }

    .inffam1 h2 p {
      font-size: 14px;
      color:
        <?= $famzc ?>
      ;
      background-color:
        <?= $famzbc ?>
      ;
      padding: 0 5px;
      border-radius: 5px;
      border: 1px solid
        <?= $famzb ?>
      ;
    }

    .persinf2 p {
      font-size: 14px;
      color:
        <?= $famzc ?>
      ;
      background-color:
        <?= $famzbc ?>
      ;
      padding: 0 5px;
      border-radius: 5px;
      border: 1px solid
        <?= $famzb ?>
      ;
    }

    .prfinf p {
      color:
        <?= $famzc ?>
      ;
      background-color:
        <?= $famzbc ?>
      ;
      padding: 0 5px;
      border-radius: 5px;
      border: 1px solid
        <?= $famzb ?>
      ;
    }
  </style>

</body>

</html>