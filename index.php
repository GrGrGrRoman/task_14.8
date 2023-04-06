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
    <title>14.8</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">
</head>
<body>
<!-- Авторизация: получаем имя пользователя -->
<?php
include 'auth.php';
$login = getCurrentUser();
?>
<!-- КОНЕЦ Авторизация  -->
<main>
<section></section>
<!-- Блок на весь экран -->
<div class="d-flex align-items-center" id="bg">

<!-- Текст Главная-->
<div class="container pt-3 bg-success bg-opacity-25" id="main1">
    <div class="row">
        <div class="col-md-6">
        <?php if ($login === null): ?>
                <span id="backgrondText">Авторизуйтесь, чтобы получить персональную скидку</span>
        <?php else: ?>
                <span id="backgrondText">Добро пожаловать, <?= $login ?></span>     
        <?php endif; ?>
        </div>
        <div class="col-md-6">
            <p id="backgrondText">
            Вы заходите в просторный спа-салон, где царит приятный аромат эфирных масел и звучит музыка для релаксации. 
            Вас встречает улыбающийся массажист, который предлагает вам выбрать программу для подготовки к лету. 
            Вы выбираете комплекс процедур, который включает сауну, массаж, скраб тела, а также маску для лица и волос.
            Ароматерапия, лёгкая музыка, расслабление, травяной чай... сон...
            </p>
        </div>

    </div>
</div>
<!-- КОНЕЦ Текст Главная -->

    <!-- Header с лого и навигацией -->
    <nav class="navbar fixed-top navbar-expand-lg bg-transparent">
        <div class="container-fluid" id="navigator">
          <a class="navbar-brand ms-3" id="logo" href="#">SPAsphere</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active ms-5" id="menu" aria-current="page" href="#services">services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="menu" aria-current="page" data-bs-toggle="modal" data-bs-target="#stock" href="#">stock</a>
              </li>
              <?php if ($login !== null): ?>
              <li class="nav-item">
              <a class="nav-link active ms-5" id="menu" aria-current="page" href="lk.php">private</a>
              </li>
              <?php endif; ?>
            </ul>
            <!-- Кнопки Вход и выход -->
            <div class="d-flex">
                <?php if ($login === null): ?>
                <a href="login.php" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#loginInput">Вход</a>
                <?php else: ?> 
                <span id="wellcome">Добро пожаловать, <?= $login ?></span>
                <a href="logout.php" class="btn btn-outline-secondary ms-3">Выйти</a>
                <?php endif; ?>
            </div>
            <!-- КОНЕЦ Кнопки Вход и выход -->
          
          </div>
        </div>
    </nav>
    <!-- КОНЕЦ Header с лого и навигацией -->

<!-- Модальное окно авторизации -->
<div class="modal fade" id="loginInput" tabindex="-1" aria-labelledby="loginInputLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginInputLabel">Вход в личный кабинет</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">          
                <form action="login.php" method="post">
                    <div class="row mb-3">
                        <label for="login" class="col-sm-2 col-form-label">
                        Имя:
                        </label>
                        <div class="col-sm-10">
                        <input type="text" name="login" id="login" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">
                        Пароль:
                        </label>
                        <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label for="dateOfBirthDay" class="col-sm-2 col-form-label">
                        День рождения:
                        </label>
                        <div class="col-sm-10">
                        <input type="date" name="dateOfBirthDay" id="dateOfBirthDay" class="form-control" value="" required>
                        </div>
                    </div> 
                    <div class="row mb-3 ms-3 me-3">
                        <button class="btn btn-secondary" type="submit">Войти</button>                                           
                    </div>   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>              
            </div>
        </div>
    </div>
</div>
<!-- КОНЕЦ Модальное окно авторизации -->

<!-- Модальное окно акции -->
<div class="modal fade" id="stock" tabindex="-1" aria-labelledby="stockLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="stockLabel">stock /акции</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md">
                            <h6 class="text-uppercase text-center">Зарегистрируйся, чтобы получить специальное предложение на День Рождения! </h6>
                            <img class="w-100" src="/img/spa_happyb.jpg" alt="День рождения">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <h6 class="text-center">Для всех!</h6>
                            <p>
                                Приглашаем всех наших любимых клиенток на нашу новую акцию на маникюр! Получите скидку 20% на любой вид маникюра при бронировании услуги до конца этой недели. 
                                Наш высококвалифицированный персонал с радостью поможет вам создать неповторимый образ, подчеркнув красоту ваших рук. 
                                Не упустите возможность сэкономить и насладиться отличным сервисом нашего спа-салона. Мы ждем вас!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-- КОНЕЦ Модальное окно акции -->

</div>
<!-- КОНЕЦ Блок на весь экран -->
</section>

<section>
<!-- Услуги -->
<div class="container mt-3">
    <div class="row">
    <div class="col-sm-2">
        <h5 id="services">SERVICES /УСЛУГИ</h5>
    </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
        <img class="w-100" src="/img/spa_massage.jpg" alt="Массаж">
        </div>
        <div class="col-md-6">
            <h6>MASSAGE /МАССАЖ</h6>
            <p>
            Массаж - это одна из самых популярных услуг в спа-салонах. 
            В зависимости от ваших потребностей и предпочтений, вы можете выбрать массаж всего тела, спины, шеи и плеч, стоп или рук. 
            Различные виды массажа, такие как классический, шведский, тайский, спортивный, глубокий, аюрведический, помогают расслабиться и уменьшить стресс.
            </p>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 text-end">
            <h6>FACE /УХОД ЗА ЛИЦОМ</h6>
            <p>
                Лицевые процедуры - это очень популярные услуги в спа-салоне. Они включают в себя различные типы очищения кожи лица, маски, пилинги и массаж лица. 
                Уход за кожей лица - это услуга, которая включает в себя различные процедуры, такие как чистка лица, пилинг, гидрофильное очищение, лазерное омоложение и многие другие, для улучшения состояния кожи лица.
            </p>
        </div>
        <div class="col-md-6">
            <img class="w-100" src="/img/spa_face_mask.jpg" alt="Лицевые процедуры">
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
        <img class="w-100" src="/img/spa_aromatherapy.jpg" alt="Ароматерапия">
        </div>
        <div class="col-md-6">
            <h6 class="text-uppercase">aromatherapy /ароматерапия</h6>
            <p>
                Ароматерапия – это терапевтическое использование эфирных масел для улучшения здоровья и настроения. 
                Наш спа-салон может предложить различные ароматические массажи, ванну, сауну и душевую кабину.
            </p>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 text-end">
            <h6>HAMMAM /ХАММАМ</h6>
            <p>
                Хамам - это традиционная турецкая процедура для ухода за телом, которая включает в себя паровую баню, массаж и другие косметические процедуры. 
                В нашем спа-салоне мы предлагаем вам насладиться уникальным опытом хамама, чтобы полностью расслабиться и очистить ваше тело и душу. 
                В процессе хамама вы будете находиться в паровой бане, где пар и тепло помогут раскрыть поры и улучшить кровообращение. 
                Затем наш специалист проведет массаж всего тела, используя масла.
            </p>
        </div>
        <div class="col-md-6">
            <img class="w-100" src="/img/spa_hammam.jpeg" alt="Хамам">
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
        <img class="w-100" src="/img/spa_mani.webp" alt="Маникюр и педикюр">
        </div>
        <div class="col-md-6">
            <h6 class="text-uppercase">mani&pedi /Маникюр и педикюр</h6>
            <p>
                Маникюр и педикюр - это процедуры ухода за кожей и ногтями рук и ног. 
                Во время сеанса мастер проведет комплексную обработку ногтевой пластины, удаление кутикулы, шлифовку, придание формы ногтям и покрытие лаком. 
                Клиенты также могут выбрать укрепляющие, увлажняющие и питательные процедуры, а также дополнительные услуги, например, массаж стоп или рук. 
                Маникюр и педикюр в спа-салоне - это отличный способ расслабиться и получить удовольствие.
            </p>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 text-end">
            <h6 class="text-uppercase">solarium /Солярий</h6>
            <p>
                Солярий – услуга, которая позволяет получить загар круглый год. В спа-салонах предлагаем услуги как классического солярия, так и инфракрасного. 
                Солярий позволяет получить загар и витамин D в удобной и комфортной обстановке.
            </p>
        </div>
        <div class="col-md-6">
            <img class="w-100" src="/img/spa_solar.jpg" alt="Солярий">
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
        <img class="w-100" src="/img/spa_sauna.jpg" alt="Сауна">
        </div>
        <div class="col-md-6">
            <h6 class="text-uppercase">sauna /банный комплекс</h6>
            <p>
                Сауна – это традиционная услуга, которая позволяет отдохнуть и расслабиться в теплой и влажной атмосфере. 
                В спа-салоне  предлагаем несколько видов саун, таких как финская, турецкая, русская баня и инфракрасная сауна.
            </p>
        </div>
    </div>
</div>
</section>
<!-- КОНЕЦ Услуги -->
</main>

<footer class="d-flex my-md-5 pt-md-5 border-top text-center">
<div class="row m-auto">
    <div class="col-12 col-md">
        <h5>SPAsphere</h5>
        <ul class="list-unstyled text-small">
            <li><a href="#servises" class="a link-secondary">Услуги</a></li>
            <li><a href="#stock" class="a link-secondary">Акции</a></li>
        </ul>
    </div>
</div>
</footer>


<script src="./js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="./timer/timer.js" type="text/javascript"></script> 
</body>
<a target="_blank" href="https://icons8.com/icon/113079/заполненный-круг">Заполненный круг</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>
</html>