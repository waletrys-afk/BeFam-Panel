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


if ($user['family'] == 'spucmes') {
  $famzc = 'rgb(109, 218, 0)';
  $famzbc = 'rgba(103, 206, 0, 0.212);';
  $famzb = 'rgba(69, 138, 0, 0.212);';

} elseif ($user['family'] == 'highter') {
  $famzc = 'rgb(218, 167, 0)';
  $famzbc = 'rgba(206, 124, 0, 0.21);';
  $famzb = 'rgba(138, 94, 0, 0.21);';
}

$usfam = $user['family'];
$confam = mysqli_query($conn, "SELECT * FROM `users` WHERE family = '$usfam' and famrank != '0'");
$colwfam = $confam->num_rows;


if (!empty($_SESSION['ss'])) {
  $setrsost = 'a';
  $setrlogin = $_SESSION['stloginuser'];
  $setrtrank = $_SESSION['stterank'];
} else {
  $setrsost = '';
  $setrlogin = '';
  $setrtrank = '';
}

if (!empty($_SESSION['setrerr'])) {
  $setrerr = $_SESSION['setrerr'];
  $setrlogin = $_SESSION['stloginuser'];
  $setrtrank = $_SESSION['stterank'];
} else {
  $setrerr = '';
}

if (!empty($_SESSION['sms'])) {
  $sms = $_SESSION['sms'];
} else {
  $sms = '';
}

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
  <title>BeFam - Состав семьи ( <?= $colwfam ?> ).</title>
</head>

<body>

  <div class="setrankback" id="setrankmen">
    <div class="setrankmen anim">
      <div>
        <h2>Изменить ранг</h2>
        <p><i class="ri-chat-upload-fill"></i> Введите ранг для <?= $setrlogin ?> (сейчас: <?= $setrtrank ?>).</p>
        <p id="sterror"><?= $setrerr ?></p>
        <form method="post" action="../all/setrank">

          <input placeholder="Введите ранг 1-9" required type="number" name="inpnrank">
          <div>
            <a onclick="clsetr()"><b>Отмена</b></a>
            <button type="submit" style="color: rgb(59, 209, 0);"><b>Изменить</b></button>
          </div>
        </form>

      </div>
    </div>
  </div>




  <?php include '../all/header.php'; ?>

  <main>
    <?php include '../all/lmenu.php'; ?>

    <div class="mainblock">
      <h1 class="fh1fs">Состав семьи на BeFam ( <?= $colwfam ?> )</h1>
      <div class="rmenu">
        <div class="allfamusers anim">
          <div class="allfamusnd">
            <p>Никнейм</p>
            <p>Ранг</p>
            <p>Доп. действия</p>
          </div>
          <div class="alusinfam">
            <?php while ($row = $confam->fetch_assoc()): ?>

              <div>
                <div>
                  <p class="ere1"><?= htmlspecialchars($row['login']) ?>
                    <? if ($row['famrank'] == '10' || $row['famrank'] == '9'): ?>
                      <i class="bx bx-badge-check"></i>
                    <? endif ?>
                  </p>
                  <p class="ere2"><?= htmlspecialchars($row['famrank']) ?></p>

                  <form method="post" action="../all/chuserrank" class="ere3">
                    <? if ($user['famrank'] == '10' || $user['famrank'] == '9'): ?>
                      <? if (htmlspecialchars($row['famrank']) == '10' || htmlspecialchars($row['famrank']) == '9' and $user['famrank'] != '10'): ?>
                      <? else: ?>
                        <? if (htmlspecialchars($row['famrank']) != '10'): ?>

                          <input style="display: none;" name="useridrank" value="<?= htmlspecialchars($row['id']) ?>">
                          <button type="submit"><i class="ri-chat-upload-fill"></i> <span>Ранг</span></button>

                        <? endif ?>
                      <? endif ?>
                    <? endif ?>
                    <a href="profile?id=<?= htmlspecialchars($row['id']) ?>"><i class="bx bxs-user"></i>
                      <span>Профиль</span></a>
                  </form>

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
      let setrsost = <?php echo json_encode($setrsost); ?>;
      if (setrsost && setrsost.trim() !== '') {

        opensetr()
        <?php $_SESSION['ss'] = ''; ?>
        <?php $setrsost = ''; ?>
        setrsost = '';
      }

    })

    document.addEventListener('DOMContentLoaded', function opener() {
      let setrerr = <?php echo json_encode($setrerr); ?>;
      if (setrerr && setrerr.trim() !== '') {
        showster()
        opensetr()
        <?php $_SESSION['setrerr'] = ''; ?>
      }

    })

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