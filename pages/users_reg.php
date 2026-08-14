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

$famyy = $user['family'];
$apl = mysqli_query($conn, "SELECT * FROM `applications` WHERE family = '$famyy'");

$usregzav = mysqli_query($conn, "SELECT * FROM `applications` WHERE family = '$famyy'");

if ($apl->num_rows == 0) {
  header("Location: ../pages/dashboard");
  $_SESSION['smsa'] = 'Сейчас нету заявок на регистрацию!';
} else {
}

if ($user['famrank'] == '10' || $user['famrank'] == '9') {

} else {
  header("Location: ../pages/dashboard");
  $_SESSION['smsa'] = 'Раздел заявок доступен только с 9-го ранга!';
}

if ($user['family'] == 'spucmes') {
  $famzc = 'rgb(109, 218, 0)';
  $famzbc = 'rgba(103, 206, 0, 0.212);';
  $famzb = 'rgba(69, 138, 0, 0.212);';

} elseif ($user['family'] == 'highter') {
  $famzc = 'rgb(218, 167, 0)';
  $famzbc = 'rgba(206, 124, 0, 0.21);';
  $famzb = 'rgba(138, 94, 0, 0.21);';
} else {
}

if (!empty($_SESSION['sms'])) {
  $sms = $_SESSION['sms'];
} else {
  $sms = '';
}

if (!empty($_SESSION['smsr'])) {
  $sms = $_SESSION['smsr'] ?? '';
  $_SESSION['smsr'] = '';
} else {}
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
  <title>BeFam - Заявки в семью.</title>
</head>

<body>
  <?php include '../all/header.php'; ?>

  <main>
    <?php include '../all/lmenu.php'; ?>
    <div class="mainblock">
      <h1 class="fh1fs">Заявки в семью</h1>
      <div class="rmenu" style="overflow-x: auto;">
        <div class="allzavsinfamer anim">
          <div class="allzavsreg">
            <p>Никнейм</p>
            <p>Док-ва</p>
            <p>Дата</p>
            <p style="text-align: right;">Действие</p>
          </div>
          <div class="alzavsinfam">
            <?php while ($row = $usregzav->fetch_assoc()): ?>
              <div class="asddda">
                <div class="asd4c">
                  <p class="era1 eax"><?= htmlspecialchars($row['login']) ?></p>
                  <a href="<?= htmlspecialchars($row['pastime']) ?>" class="era2 eax">Док-ва</a>
                  <p class="era3 eax"><?= htmlspecialchars($row['regtime']) ?></p>
                  <div class="era4 eax rrera">

                    <form method="post" action="../all/otappl">
                      <input style="display: none;" name="zrid" value="<?= htmlspecialchars($row['login']) ?>">
                      <button type="submit"><b><i class="bx bx-no-entry"></i> отказать</b></button>
                    </form>

                    <form method="post" action="../all/odappl">
                      <input style="display: none;" name="zrid2" value="<?= htmlspecialchars($row['login']) ?>">
                      <button type="submit"><b style="color: rgb(0, 209, 28);"><i class=" ri-attachment-2"></i>
                          одобрить</b></button>
                    </form>

                  </div>

                </div>
              </div>

            <?php endwhile ?>

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
      let sms = <?php echo json_encode($sms); ?>;
      if (sms && sms.trim() !== '') {
        addBlock(sms);
        <?php $_SESSION['sms'] = ''; ?>
      }

    })


  </script>



  <style>
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
  </style>

</body>

</html>