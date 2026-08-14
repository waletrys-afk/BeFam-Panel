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
  <header>
    <a href="../pages/dashboard">
      <div class="mainname">
        <i class=" bx bx-planet"></i>
        <h1><span>Be</span>Fam</h1>
      </div>
    </a>
    <div class="personname">

      <div class="avatar">
        <? if (empty($user['avatar'])): ?>
          <p>
            <?= $user['login'][0] ?>
          </p>
        <? else: ?>
          <img src="<?= $user['avatar'] ?>">
        <? endif ?>
      </div>

      <div class="persinfo">
        <p>
          <?= $user['login'] ?>
          <? if ($user['famrank'] == '10' || $user['famrank'] == '9'): ?>
            <i class="bx bx-badge-check"></i>
          <? endif ?>
        </p>
        <div class="persinf2">
          <p>
            <?= $user['family'] ?>: <?= $user['famrank'] ?> Ранг
          </p>
        </div>
      </div>

      <div class="openlmen" onclick="openl()">
        <div></div>
        <div></div>
        <div></div>
      </div>

    </div>
  </header>
</body>

</html>