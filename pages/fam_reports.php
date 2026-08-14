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
$famreps = mysqli_query($conn, "SELECT * FROM `famreports` WHERE famy = '$famyy' ORDER BY id DESC");


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
  <title>BeFam - Семейные отчеты.</title>
</head>

<body>

  <?php include '../all/header.php'; ?>

  <main>
    <?php include '../all/lmenu.php'; ?>

    <div class="mainblock">
      <h1 class="fh1fs">Семейные отчеты</h1>
      <div class="rmenu" style="display: flex;
  flex-direction: column; overflow-x: auto;">

        <div class="repmbbt">
          <a onclick="addBlock('Информация об отчетах не заполнена!')"><i class="ri-article-line"></i><b> Информация об
              отчетах</b></a>
          <a href="addfam_reports" style="color: rgb(94, 179, 54); text-decoration: none;"><i class="bx bx-plus"></i><b>
              Добавить</b></a>
        </div>
        <table class="otchtab anim">
          <thead>
            <th>ID</th>
            <th>Статус</th>
            <th>Тип отчета</th>
            <th>Отправил</th>
            <th>Текущий ранг</th>
            <th>Док-ва</th>
            <th>Проверил</th>
            <th>Дата создания</th>
          </thead>
          <tbody>
            <?php while ($row = $famreps->fetch_assoc()): ?>
              <?php

              $prvidd = htmlspecialchars($row['prvid']);

              $rstatus = htmlspecialchars($row['status']);

              if ($rstatus == 'ОЖИДАНИЕ') {
                $sc = 'rgb(250, 162, 0)';
                $sb = 'rgba(199, 104, 26, 0.32)';
                $bc = 'rgba(250, 162, 0, 0.85)';
              } elseif ($rstatus == 'ОДОБРЕНО') {
                $sc = 'rgb(0, 197, 0)';
                $sb = 'rgba(0, 179, 0, 0.15)';
                $bc = 'rgba(0, 194, 0, 0.8)';
              } elseif ($rstatus == 'ОТКАЗАНО') {
                $sc = 'rgb(231, 0, 0)';
                $sb = 'rgba(204, 0, 0, 0.199)';
                $bc = 'rgba(204, 0, 0, 0.795)';
              } else {
              }

              $sender = htmlspecialchars($row['sender']);
              $ssdr = mysqli_query($conn, "SELECT * FROM `users` WHERE login = '$sender'");
              $ssdr = mysqli_fetch_assoc($ssdr);
              $sdidd = $ssdr['id'];

              ?>

              <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td>
                  <p class="hajkas2"
                    style="color: <?= $sc ?>; background-color: <?= $sb ?>; border: 1px solid <?= $bc ?>;">
                    <?= htmlspecialchars($row['status']) ?>
                  </p>
                </td>
                <td><?= htmlspecialchars($row['ottype']) ?></td>
                <td><?= htmlspecialchars($row['sender']) ?>
                  <a style="text-decoration: none;" href="profile?id=<?= $sdidd ?>" class="ddfr1s"><i
                      class="bx bxs-user"></i></a>
                </td>
                <td><?= htmlspecialchars($row['snrang']) ?></td>
                <td><a href="<?= htmlspecialchars($row['dok']) ?>">Док-ва</a></td>

                <td><?= htmlspecialchars($row['prov']) ?>

                  <? if ($prvidd != '0'): ?>
                    <a style="text-decoration: none;" href="profile?id=<?= $prvidd ?>" class="ddfr1s"><i
                        class="bx bxs-user"></i></a>
                  <? endif ?>

                </td>

                <td><?= htmlspecialchars($row['dates']) ?></td>



                <td class="ddwerx">
                  <? if ($rstatus == 'ОЖИДАНИЕ'): ?>
                    <i onclick="openrepmenu('<?= htmlspecialchars($row['id']) ?>')" class=" bx bx-dots-horizontal-rounded"
                      id="repbut"></i>
                    <div class="dwlksl" id="allmenu_<?= htmlspecialchars($row['id']) ?>">
                      <div>

                        <form class="repbbttn" action="../all/repodinf" method="post">
                          <input style="display: none;" value="<?= htmlspecialchars($row['id']) ?>" name="repodinf">
                          <button type="submit"><b style="color: rgb(0, 209, 28);">ОДОБРИТЬ</b></button>
                        </form>

                        <form class="repbbttn" action="../all/repotinf" method="post">
                          <input style="display: none;" value="<?= htmlspecialchars($row['id']) ?>" name="repotinf">
                          <button type="submit"><b>ОТКАЗАТЬ</b></button>
                        </form>

                      </div>
                    </div>
                  <? endif ?>
                </td>



              </tr>
            <?php endwhile ?>
          </tbody>
        </table>

      </div>
      <footer></footer>
    </div>
    <div class="smss" id="column"></div>
  </main>

  <script src="../main.js"></script>
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

    .hajkas2 {
      font-size: 12px;
      margin: auto 0;
      border-radius: 7px;
      width: auto;
      text-align: center;
      max-width: 90px;
      position: relative;
      top: 2px;
    }
  </style>

</body>

</html>