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

  <body>



    <main>
      <div class="authbaner">
        <div class="authb">
          <div class="authnam">
            <h2>BF</h2>
            <h3>BeFam Panel</h3>
          </div>
          <h1>Добро пожаловать!</h1>
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

        <h1>Вход в аккаунт</h1>
        <p>Введите данные для входа</p>

        <div class="errtext" id="error">
          <p>
            <?= $err_reg ?>
          </p>
        </div>

        <form action="./check/checklog" method="post">

          <div class="authbk">
            <div class="abknamm abnfi">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="4"></circle>
                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
              </svg>
              <h4>Ваш логин</h4>
            </div>
            <input maxlength="30" type="text" placeholder="Имя пользователя" required minlength="4" name="login">

          </div>


          <div class="authbk">
            <div class="abknamm">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
              <h4>Ваш пароль</h4>
            </div>
            <input maxlength="20" type="password" placeholder="Введите пароль" required minlength="4" name="pass">
          </div>

          <button type="submit">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
              <polyline points="10 17 15 12 10 7"></polyline>
              <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>

            <b>Войти</b></button>
        </form>

        <div class="rzdil">
          <div></div>
          <p>ИЛИ</p>
          <div></div>
        </div>

        <div class="prlg">
          <p>Нет аккаунта?</p>
          <a href="./registr">Создать аккаунт</a>
        </div>
        <br>

      </div>


    </main>

    <style>
      .authbaner {
        width: 50%;
        height: 100%;
        background: linear-gradient(180deg, #6d42d3, #4f46e5);
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
        background: linear-gradient(0deg, #6d42d3, #4f46e5);
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
          background: linear-gradient(145deg, #6d42d3, #4f46e5);
        }

        .authb {
          transform: translateY(-28px);
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