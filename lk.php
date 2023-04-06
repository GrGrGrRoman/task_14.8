<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
    <title>Личный кабинет.148</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">
</head>

<?php
include 'auth.php';
$login = getCurrentUser();
?>
<body>
<main>

<div class="d-flex align-item-center" id="bgLk">
    <!-- Header с лого и навигацией -->
      <nav class="navbar fixed-top navbar-expand-lg bg-transparent">
        <div class="container-fluid" id="navigator">
          <a class="navbar-brand ms-3" id="logo" href="index.php">SPAsphere</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active ms-5" id="menu" aria-current="page" href="index.php#services">services</a>
              </li>
            </ul>
            <!-- Кнопка выход -->
            <div class="d-flex">
                <?php if ($login !== null): ?>
                <a href="logout.php" class="btn btn-outline-secondary ms-3">Выйти</a>
                <?php endif; ?>
            </div>
            <!-- КОНЕЦ Кнопка выход -->          
          </div>
        </div>
    </nav>
    <!-- КОНЕЦ Header с лого и навигацией -->
  
    <!-- Wellcome -->
    <div class="container m-auto bg-dark bg-opacity-50" id="main1">
    <?php if ($login !== null): ?>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <p class="text-center mt-3" id="wellcome">Рады видеть Вас снова, <?= $login ?></p>
          </div>
        </div>
      </div>
    <!-- Если НЕ ДР -->
    <?php if ($_COOKIE['birthDayNow'] == 'no'): ?>
      <div class="container">

        <div class="row">
          <div class="col-md-6">
            <p id="stockText">Приглашаем всех нашей любимых клиенток на нашу новую акцию на маникюр! 
              Получите скидку 20% на любой вид маникюра при бронировании услуги до конца дня. 
              Наш высококвалифицированный персонал с радостью поможет вам создать неповторимый образ, подчеркнув красоту ваших рук. 
              Не упустите возможность сэкономить и насладиться отличным сервисом нашего спа-салона. Мы ждем вас!</p> 
          </div>
          <div class="col-md-6 text-end">
          <p id="stockText">Получите красивый загар круглый год с нашей новой акцией на услуги солярия! 
              Воспользуйтесь нашей специальной предложением и получите сегодня 30% скидку на первый сеанс. 
              Наш солярий оборудован последними технологиями, что гарантирует быстрый и безопасный загар. Забудьте о сезонных колебаниях и наслаждайтесь сияющей кожей в любое время года. 
              Запишитесь уже сегодня и получите идеальный загар вместе с нами!</p>
          </div>
        </div>

        <div class="row">
          <?php include 'diffTime.php'; ?>
        </div>

        <div class="row">
          <div class="col-md-6">
            <p class="text-center" id="wellcome">Специальное предложение в День Рождения!</p>
            <p id="stockText">
              Отпразднуйте свой особенный день в нашем спа-салоне и получите в подарок одну из наших наиболее популярных процедур! 
              Наслаждайтесь расслабляющим массажем или освежающей фэйс-маской - выбор за вами! 
              А еще мы дарим 20% скидку на любую другую процедуру, чтобы вы могли полностью насладиться своим днем рождения. 
              Забронируйте свой подарок уже сегодня и позвольте нашим профессионалам позаботиться о вас в этот особенный день!</p>
          </div>
          <div class="col-md-6">
            <p class="text-center" id="wellcome">До Вашего дня рождения осталось: <?php include './timer/timer.html'; ?></p> 
          </div>
        </div>
      </div>      
    <?php endif; ?>
    <!-- КОНЕЦ Если НЕ ДР -->

    <!-- Если ДР -->
    <?php if ($_COOKIE['birthDayNow'] == 'yes'): ?>
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-4 text-center">
            <p id="wellcome">УРА! Сегодня <?php echo date("d M Y"); ?></p>
            <p id="birthDay">Поздравляем с Днем Рождения!</p>
            <p id="birthDay">Получите в подарок процедуру на выбор</p>
            <p id="birthDay"> и ещё минус 20% на всё!</p>
            <p id="stockText">
              Отпразднуйте свой особенный день в нашем спа-салоне и получите в подарок одну из наших наиболее популярных процедур! 
              Наслаждайтесь расслабляющим массажем или освежающей фэйс-маской - выбор за вами! 
              А еще мы дарим 20% скидку на любую другую процедуру, чтобы вы могли полностью насладиться своим днем рождения. 
              Забронируйте свой подарок уже сегодня и позвольте нашим профессионалам позаботиться о вас в этот особенный день!</p>
          </div>
        </div>

        <div class="row">
          <?php include 'diffTime.php' ?>
        </div>

      </div>
    <?php endif; ?>
    <!-- КОНЕЦ Если ДР -->

    <?php else: 
    header('Location: index.php');
    ?>  
    <?php endif; ?>    
    </div>
</div>
<!-- КОНЕЦ Wellcome -->

</main>
<script src="./js/bootstrap.bundle.min.js" type="text/javascript"></script>     
</body>
</html>