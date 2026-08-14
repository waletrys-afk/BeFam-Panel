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
  <title>BeFam - Добавить отчет.</title>
</head>

<body>

  <?php include '../all/header.php'; ?>

  <main>
    <?php include '../all/lmenu.php'; ?>

    <div class="mainblock">
      <h1 class="fh1fs">Добавить отчет</h1>
      <div class="rmenu">

        <form class="addfamrep" action="../all/addfrep" method="POST">

          <input required placeholder="ССЫЛКА НА ДОКАЗАТЕЛЬСТВА СО /TIME" name="replinkkg">
          <select required name="reptypeg">
            <option value="">ВЫБЕРИТЕ ПУНКТ ИЗ СПИСКА</option>
            <option>[УЧ] Отчет на повышение</option>
            <option>[УЧ] Отчет на снятие выговора</option>
            <option>[УЧ] Отчет на снятие преда</option>
            <option>[ЗАМ] Отчет заместителя</option>
            <option>[ЗАМ] Отчет личного онлайна</option>
            <option>[ЗАМ] Отчет онлайна семьи</option>
            <option>[ЛИД] Отчет лидера семьи</option>
            <option>[ЛИД] Отчет личного онлайна</option>
            <option>[ЛИД] Отчет онлайна семьи</option>я
          </select>

          <div class="bbtreptv">
            <button type="submit" style="color: rgb(0, 209, 28);"><b>Отправить</b></button>
            <a href="fam_reports"><b>Отмена</b></a>
          </div>
        </form>

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