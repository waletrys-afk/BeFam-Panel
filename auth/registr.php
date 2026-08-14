<?php

require_once('../database/db.php');
session_start();

if (!empty($_SESSION['login'])) {
  header("Location: ../../pages/dashboard");
}

if (isset($_SESSION['error'])) {
  $err_reg = $_SESSION['error'];
} else {
  $err_reg = '';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/auth.css">
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
  <title>BeFam - Авторизация.</title>

</head>

<body>
  <main>
    <div class="authbaner">
      <div class="authb">
        <div class="authnam">
          <h2>BF</h2>
          <h3>BeFam Panel</h3>
        </div>
        <h1>Присоединяйтесь!</h1>
        <p>Удобное управление и просмотр семьи.</p>
        <div class="txtdiva firstmtx">
          <div class="bsvg">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </div>
          <div class="mtxtdiv">
            <h4>Сообщество</h4>
            <p>Присоеденяйся к нашему сообществу</p>
          </div>
        </div>
        <div class="txtdiva">
          <div class="bsvg">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="12" y1="1" x2="12" y2="23"></line>
              <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
          </div>
          <div class="mtxtdiv">
            <h4>Быстрый доступ</h4>
            <p>Полный доступ после авторизации</p>
          </div>
        </div>
        <div class="txtdiva">
          <div class="bsvg">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
          </div>
          <div class="mtxtdiv">
            <h4>Разработчики</h4>
            <p>Прямое общение с разработчиками</p>
          </div>
        </div>
      </div>
    </div>

    <div class="authmain">

      <h1>Создать аккаунт</h1>
      <p>Заполните данные для регистрации</p>

      <div class="errtext" id="error">
        <p>
          <?= $err_reg ?>
        </p>
      </div>

      <form action="./check/checkreg" method="POST">

        <div class="authbk">
          <div class="abknamm abnfi">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="4"></circle>
              <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
            </svg>
            <h4>Имя пользователя</h4>
          </div>
          <input maxlength="30" type="text" placeholder="Введите никнейм" required minlength="4" name="username">
          <p>Введите свое имя из игры на англ. (пр.: Pavel_Spucme)</p>
        </div>


        <div class="authbk">
          <div class="abknamm">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <h4>Пароль</h4>
          </div>
          <input maxlength="20" type="password" placeholder="Придумайте пароль" required minlength="4" name="pass">
        </div>

        <div class="authbk">
          <div class="abknamm">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <h4>Доказательства</h4>
          </div>
          <input type="text" placeholder="Сылка на /stats + /time" required minlength="4" name="gamepas">
        </div>

        <div class="authbk">
          <div class="abknamm">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <h4>Откуда вы?</h4>
          </div>
          <input maxlength="50" type="text" placeholder="Название семьи ( Highter / Spucmes )" required minlength="4" name="family">
        </div>

        <button type="submit">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="8.5" cy="7" r="4"></circle>
            <line x1="20" y1="8" x2="20" y2="14"></line>
            <line x1="23" y1="11" x2="17" y2="11"></line>
          </svg>

          <b>Создать аккаунт</b></button>
      </form>

      <div class="rzdil">
        <div></div>
        <p>ИЛИ</p>
        <div></div>
      </div>

      <div class="prlg">
        <p>Уже есть аккаунт?</p>
        <a href="./login">Войти</a>
      </div>
      <br>

    </div>


  </main>

  <style>
    main {
      box-shadow: 0 10px 10px #31b87956;
    }

    .authbaner {
      width: 50%;
      height: 100%;
      background: linear-gradient(180deg, #34d399, #31b879);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .authbaner::before {
      position: absolute;
      content: "";
      width: 25%;
      height: 100%;
      background: linear-gradient(0deg, #34d399, #31b879);
      left: 25%;
    }

    .authbaner::after {
      position: absolute;
      content: "";
      width: 50%;
      height: 100%;
      background: rgba(0, 0, 0, 0.123);
      backdrop-filter: blur(40px);
    }


    @media (max-width: 1010px) {
      .authbaner {
        width: 100%;
        height: 300px;
        background: linear-gradient(145deg, #34d399, #1a7249);
      }
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function opener() {
      const errorcheck = <?php echo json_encode($err_reg); ?>;

      if (errorcheck && errorcheck.trim() !== '') {

        const error = document.getElementById('error');
        error.style.display = 'block';
        setTimeout(() => {
          error.style.display = 'none'
          <?php $_SESSION['error'] = ''; ?>
        }, 2500)
      }
    })

  </script>
</body>

</html>