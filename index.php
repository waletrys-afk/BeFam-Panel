<?php
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BeFam — Система управления семьей.</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300..900;1,300..900&family=Raleway:ital,wght@0,400..800;1,400..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="stylesheet" href="../styles/dashboard.css">

  <style>
    body {
      font-family: 'Rubik', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Montserrat', sans-serif;
    }

    .landing-wrapper {
      width: 100%;
      height: calc(100vh - 70px);
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
    }

    .landing-wrapper::before {
      content: '';
      position: absolute;
      top: 5%;
      left: 50%;
      transform: translateX(-50%);
      width: 600px;
      height: 350px;
      background: radial-gradient(circle, rgba(118, 60, 255, 0.25) 0%, rgba(249, 72, 255, 0.08) 50%, transparent 80%);
      filter: blur(80px);
      pointer-events: none;
      z-index: 0;
    }

    .hero-section {
      width: 90%;
      max-width: 1000px;
      margin: 70px auto 40px auto;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 22px;
      position: relative;
      z-index: 1;
    }

    .hero-tag {
      font-family: 'Raleway', sans-serif;
      background: rgba(118, 60, 255, 0.1);
      border: 1px solid rgba(118, 60, 255, 0.4);
      color: #f948ff;
      padding: 8px 20px;
      border-radius: 30px;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      box-shadow: 0 0 15px rgba(249, 72, 255, 0.15);
      backdrop-filter: blur(10px);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .hero-title {
      font-family: 'Montserrat', sans-serif;
      font-size: 54px;
      font-weight: 900;
      color: #ffffff;
      line-height: 1.15;
      margin: 0;
      letter-spacing: -0.5px;
    }

    .hero-title span {
      background: linear-gradient(135deg, #a855f7 0%, #763cff 50%, #f948ff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 0 30px rgba(118, 60, 255, 0.3);
    }

    .hero-subtitle {
      font-family: 'Rubik', sans-serif;
      font-size: 17px;
      color: rgba(236, 236, 236, 0.75);
      max-width: 720px;
      margin: 0;
      line-height: 1.65;
      font-weight: 400;
    }

    .hero-buttons {
      display: flex;
      gap: 16px;
      margin-top: 10px;
    }

    .btn-primary {
      font-family: 'Raleway', sans-serif;
      background: linear-gradient(135deg, #763cff, #f948ff);
      color: #fff;
      padding: 14px 34px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 700;
      font-size: 15px;
      letter-spacing: 0.3px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 6px 20px rgba(118, 60, 255, 0.35);
      display: inline-flex;
      align-items: center;
      gap: 10px;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-primary:hover {
      box-shadow: 0 8px 30px rgba(249, 72, 255, 0.5);
      transform: translateY(-3px);
      filter: brightness(1.1);
    }

    .btn-secondary {
      font-family: 'Raleway', sans-serif;
      background: rgba(20, 24, 36, 0.7);
      border: 1px solid rgba(73, 69, 94, 0.8);
      color: #ffffff;
      padding: 14px 34px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 700;
      font-size: 15px;
      letter-spacing: 0.3px;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }

    .btn-secondary:hover {
      background: rgba(27, 32, 48, 0.9);
      border-color: #763cff;
      color: #fff;
      box-shadow: 0 4px 15px rgba(118, 60, 255, 0.2);
      transform: translateY(-2px);
    }

    .features-section {
      width: 90%;
      max-width: 1100px;
      margin: 50px auto 30px auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
      position: relative;
      z-index: 1;
    }

    .feature-card {
      background: rgba(20, 24, 36, 0.65);
      border: 1px solid rgba(73, 69, 94, 0.5);
      backdrop-filter: blur(20px);
      border-radius: 16px;
      padding: 28px 24px;
      display: flex;
      flex-direction: column;
      gap: 14px;
      transition: all 0.35s ease;
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, #763cff, #f948ff);
      opacity: 0;
      transition: opacity 0.35s ease;
    }

    .feature-card:hover {
      transform: translateY(-6px);
      border-color: rgba(118, 60, 255, 0.5);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(118, 60, 255, 0.15);
      background: rgba(20, 24, 36, 0.85);
    }

    .feature-card:hover::before {
      opacity: 1;
    }

    .feature-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: linear-gradient(135deg, rgba(118, 60, 255, 0.15), rgba(249, 72, 255, 0.15));
      border: 1px solid rgba(118, 60, 255, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      color: #f948ff;
      transition: transform 0.3s ease;
    }

    .feature-card:hover .feature-icon {
      transform: scale(1.1);
      color: #ffffff;
      background: linear-gradient(135deg, #763cff, #f948ff);
    }

    .feature-card h3 {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      color: #ffffff;
      font-size: 18px;
      font-weight: 700;
    }

    .feature-card p {
      font-family: 'Rubik', sans-serif;
      margin: 0;
      color: rgba(236, 236, 236, 0.65);
      font-size: 14px;
      line-height: 1.6;
      font-weight: 300;
    }

    .stats-section {
      width: 90%;
      max-width: 1100px;
      background: rgba(20, 24, 36, 0.65);
      border: 1px solid rgba(73, 69, 94, 0.5);
      backdrop-filter: blur(20px);
      border-radius: 16px;
      padding: 32px 20px;
      margin: 20px auto 60px auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
      position: relative;
      z-index: 1;
    }

    .stat-item {
      text-align: center;
      position: relative;
    }

    .stat-item:not(:last-child)::after {
      content: '';
      position: absolute;
      right: 0;
      top: 20%;
      height: 60%;
      width: 1px;
      background: rgba(73, 69, 94, 0.4);
    }

    .stat-item h2 {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      font-size: 38px;
      font-weight: 800;
      background: linear-gradient(135deg, #ffffff 0%, #f948ff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .stat-item p {
      font-family: 'Raleway', sans-serif;
      margin: 6px 0 0 0;
      color: rgba(236, 236, 236, 0.6);
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    @media (max-width: 850px) {
      .hero-title {
        font-size: 38px;
      }

      .hero-subtitle {
        font-size: 15px;
      }

      .stat-item:not(:last-child)::after {
        display: none;
      }
    }

    @media (max-width: 580px) {
      .hero-buttons {
        flex-direction: column;
        width: 100%;
      }

      .btn-primary,
      .btn-secondary {
        justify-content: center;
        width: 100%;
      }

      .stats-section {
        grid-template-columns: 1fr 1fr;
      }

      .asdw {
        display: none;
      }
    }
  </style>
</head>

<body>

  <header>
    <a href="/" class="mainname" style="font-family: 'Montserrat', sans-serif;">
      <i class="ri-shield-user-fill"></i>
      <h1>Be<span>Fam</span></h1>
    </a>

    <div style="margin-right: 40px; display: flex; gap: 10px;">
      <a href="../auth/login" class="btn-secondary" style="padding: 8px 18px; font-size: 13.5px; border-radius: 8px;">
        <i class="ri-login-box-line"></i> Войти
      </a>
      <a href="../auth/registr" class="btn-primary asdw"
        style="padding: 8px 18px; font-size: 13.5px; border-radius: 8px;">
        Регистрация
      </a>
    </div>
  </header>

  <div class="landing-wrapper">

    <section class="hero-section">
      <div class="hero-tag">
        <i class="ri-gamepad-line"></i> BeFam Panel
      </div>
      <h1 class="hero-title">Управляй своей семьей в <span>любом проекте</span> на новом уровне</h1>
      <p class="hero-subtitle">
        BeFam — единая экосистема для руководителей и членов семей.
        Отслеживайте логи, управляйте составом, распределяйте ранги и держите дисциплину под полным контролем.
      </p>
      <div class="hero-buttons">
        <a href="../auth/registr" class="btn-primary">
          <i class="ri-user-add-line"></i> Присоединиться
        </a>
        <a href="../auth/login" class="btn-secondary">
          <i class="ri-key-2-line"></i> Войти в систему
        </a>
      </div>
    </section>

    <section class="features-section">

      <div class="feature-card">
        <div class="feature-icon">
          <i class="ri-group-fill"></i>
        </div>
        <h3>Управление составом</h3>
        <p>Полный учет участников семьи. Удобный интерфейс для изменения рангов, выдачи предупреждений и контроля роли
          каждого игрока.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="ri-history-line"></i>
        </div>
        <h3>Логирование действий</h3>
        <p>Детальная история всех ключевых изменений внутри вашей семьи и на платформе с фиксацией участников и
          администраторов.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="ri-user-star-fill"></i>
        </div>
        <h3>Руководящий состав</h3>
        <p>Выделенный мониторинг лидеров и заместителей (9-10 рангов) с наглядным отслеживанием их активности и
          заполненности слотов.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="ri-palette-fill"></i>
        </div>
        <h3>Кастомизация профиля</h3>
        <p>Настройка персональных аватаров, баннеров и описания для поддержания индивидуального стиля вашей семьи.</p>
      </div>

    </section>

    <section class="stats-section">
      <div class="stat-item">
        <h2>180</h2>
        <p>Макс. мест в семье</p>
      </div>
      <div class="stat-item">
        <h2>6</h2>
        <p>Слотов заместителей</p>
      </div>
      <div class="stat-item">
        <h2>100%</h2>
        <p>Прозрачность логов</p>
      </div>
      <div class="stat-item">
        <h2>24/7</h2>
        <p>Доступ к платформе</p>
      </div>
    </section>

    <footer></footer>
  </div>

</body>

</html>