<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <title>Mercurial</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:image" content="path/to/image.jpg">
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <link rel="stylesheet" href="css/main.min.css">

</head>

<body>
    <header>
        <section>
            <div class="container-fluid">
                <nav class="navbar navbar-expand">
                    <a class="navbar-brand" href="#"><img src="img/logo-top.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">О нас  <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Условия  использования</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Часто задаваемые вопросы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Обратная  связь</a>
                            </li>
                            <a href="{{ url('login') }}">
                                <button class="btn">Вход</button>
                            </a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-globe"></i> RU
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">EN</a>
                                    <a class="dropdown-item" href="#">UKR</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </section>
        <section class="top-bg">
            <div class="flex-wrapper">
                <div class="flex-content">
                    <div class="container-fluid">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="header-content">
                                    <strong>Дескриптор - главный заголовок лендинга,</strong>
                                    <h1>Который понятным языком</h1>
                                    <p>коротко объяснит суть сайта или приложения</p>
                                    <button type="button" href="#" class="btn">Оставить заявку</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a class="scroll-down" onclick="downOne()"><img src="img/icon/mouse-icon.svg" alt="mouse"></a>
    </header>
    <main>
        <section class="about">
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-lg-5">
                            <div class="section-text">
                                <h2>О Приложении</h2>
                                <p>Lorem ipsum dolor sit amet. Takimata facilisis dolor. Vero ea at. Lobortis zzril delenit at quis eum accumsan takimata. Erat lobortis ut lobortis dolores vero eos. Sed dolor delenit commodo. Justo magna duis labore ea sit. Luptatum aliquyam eu kasd magna odio. Sadipscing ut labore facilisis sit nibh.</p>
                                <p>Iriure ea sed. Elit et dolor amet. Vero ea soluta. Ipsum clita takimata. Sea autem cum sed. Tempor ullamcorper lorem invidunt takimata justo. Sea nibh exerci no nisl. Nonumy magna duo at stet. Possim et eos diam illum ipsum duo.
                                Iriure ea sed. Elit et dolor amet. Vero ea soluta. Ipsum clita takimata. Sea autem cum sed. Tempor ullamcorper lorem invidunt takimata justo. </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="section-img">
                                <img src="img/section-1-img.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="oblique-background-grey">
            <div class="section-content section-content-bg">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="section-title">преимущества</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icon-holder">
                                <img src="img/icon/section-icons.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="col-content text-center">
                                <img src="img/icon/section-icon-1.png" alt="">
                                <p>Все нужные данные</br>
                                под рукой</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="col-content text-center">
                                <img src="img/icon/section-icon-2.png" alt="">
                                <p>Новая информация</br>
                                сразу доступна</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="col-content col-content-bt text-center">
                                <img src="img/icon/section-icon-3.png" alt="">
                                <p>Удобные инструменты</br>
                                для мониторинга и анализа</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="col-content col-content-bt text-center">
                                <img src="img/icon/section-icon-4.png" alt="">
                                <p>Оптимизация бизнес</br>
                                процессов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="oblique-background-violet">
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-lg-6">
                            <div class="section-text">
                                <h2>Условия использования</h2>
                                <p>Lorem ipsum dolor sit amet. Takimata facilisis dolor. Vero ea at. Lobortis zzril delenit at quis eum accumsan takimata. Erat lobortis ut lobortis dolores vero eos. Sed dolor delenit commodo. Justo magna duis labore ea sit. Luptatum aliquyam eu kasd magna odio. Sadipscing ut labore facilisis sit nibh.</p>
                                <p>Iriure ea sed. Elit et dolor amet. Vero ea soluta. Ipsum clita takimata. Sea autem cum sed. Tempor ullamcorper lorem invidunt takimata justo. Sea nibh exerci no nisl. Nonumy magna duo at stet. Possim et eos diam illum ipsum duo.
                                Iriure ea sed. Elit et dolor amet. Vero ea soluta. Ipsum clita takimata. Sea autem cum sed. Tempor ullamcorper lorem invidunt takimata justo. </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-img">
                                <img src="img/section-3-img.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="oblique-background-grey section-content-bg-2">
            <div class="section-content section-content-bg">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="section-title section-title-sm">Как начать?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="col-content col-content-sm">
                                <strong><span>01</span> Заголовок шага</strong>
                                <p>Lorem ipsum dolor sit amet. Labore dolore diam dolore vero. Ipsum suscipit tempor nonummy</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="col-content col-content-sm">
                                <strong><span>02</span> Заголовок шага</strong>
                                <p>Lorem ipsum dolor sit amet. Labore dolore diam dolore vero. Ipsum suscipit tempor nonummy</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="col-content col-content-sm">
                                <strong><span>03</span> Заголовок шага</strong>
                                <p>Lorem ipsum dolor sit amet. Labore dolore diam dolore vero. Ipsum suscipit tempor nonummy</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="col-content col-content-sm">
                                <strong><span>04</span> Заголовок шага</strong>
                                <p>Lorem ipsum dolor sit amet. Labore dolore diam dolore vero. Ipsum suscipit tempor nonummy</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center"><button type="button" class="btn">Оставить заявку</button></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-slider">
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="section-title section-title-sm">Отзывы</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="slider">
                                <div class="slider-item">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/rev-icon/icon-1.png" alt="" class="rev-img">
                                            </div>
                                            <div class="col-10">
                                                <div class="rev-log">
                                                    <p>Login_random <span>(24.05.2018)</span></p>
                                                </div>
                                                <div class="rev-star">
                                                    <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="rev-text">Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов, пока финальный текст еще не создан. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/rev-icon/icon-2.png" alt="" class="rev-img">
                                            </div>
                                            <div class="col-10">
                                                <div class="rev-log">
                                                    <p>Login_random <span>(24.05.2018)</span></p>
                                                </div>
                                                <div class="rev-star">
                                                    <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="rev-text">Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов, пока финальный текст еще не создан. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/rev-icon/icon-3.png" alt="" class="rev-img">
                                            </div>
                                            <div class="col-10">
                                                <div class="rev-log">
                                                    <p>Login_random <span>(24.05.2018)</span></p>
                                                </div>
                                                <div class="rev-star">
                                                    <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="rev-text">Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов, пока финальный текст еще не создан. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/rev-icon/icon-4.png" alt="" class="rev-img">
                                            </div>
                                            <div class="col-10">
                                                <div class="rev-log">
                                                    <p>Login_random <span>(24.05.2018)</span></p>
                                                </div>
                                                <div class="rev-star">
                                                    <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="rev-text">Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов, пока финальный текст еще не создан. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/rev-icon/icon-1.png" alt="" class="rev-img">
                                            </div>
                                            <div class="col-10">
                                                <div class="rev-log">
                                                    <p>Login_random <span>(24.05.2018)</span></p>
                                                </div>
                                                <div class="rev-star">
                                                    <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="rev-text">Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов, пока финальный текст еще не создан. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center"><a href="#" class="lorem-link">Читать все отзывы...</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="collapse-wrap">
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="section-title">Часто задаваемые вопросы</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Заголовок часто задаваемого вопроса?
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Как долго действует контракт?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Заголовок часто задаваемого вопроса?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFor">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                                                        Заголовок часто задаваемого вопроса?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="accordion" id="accordionExample2">
                                        <div class="card">
                                            <div class="card-header" id="heading1">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                        Заголовок часто задаваемого вопроса?
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample2">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading2">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                        Как долго действует контракт?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse2" class="collapse show" aria-labelledby="heading2" data-parent="#accordionExample2">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading3">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                        Заголовок часто задаваемого вопроса?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample2">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading4">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                        Заголовок часто задаваемого вопроса?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample2">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet. Erat delenit duo autem eos voluptua amet. Feugiat et tincidunt no eum amet. Gubergren tincidunt dolor. Et accusam et est dolor euismod et. Ea vero molestie lorem elitr. Sea ipsum in at. Ea dolore esse. Ex sed takimata consequat. Amet at dolores et ipsum at eu duis. Et dolor et. Vel in sit veniam et amet ut aliquyam. Ipsum sea
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="form-section">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="section-title">Остались вопросы?</h2>
                        <strong class="section-title__text">Спросите, используя форму обратной связи!</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="">
                            <div class="form-group">
                                <div class="input-section__item">
                                    <label for="name-form">Имя:</label>
                                    <input id="name-form" type="text" name="name" placeholder="Имя">
                                </div>
                                <div class="input-section__item">
                                    <label for="mail-form">E-mail:</label>
                                    <input id="mail-form" type="text" name="mail" placeholder="E-mail:">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Текст сообщения"></textarea>
                            </div>
                            <button class="btn">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="section-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="footer-content">
                            <div class="footer-content__logo">
                                <img src="img/logo-bottom.png" alt="logo">
                            </div>
                            <div class="footer-content__contact">
                                <div class="footer-content__contact-link">
                                    <a href="tel:+12 (345) 678 90 12" class="contact-item"><i class="fas fa-phone"></i>  +12 (345) 678 90 12</a>
                                    <a href="mailto:random@gmail.com" class="contact-item"><i class="fas fa-envelope"></i>  random@gmail.com</a>
                                </div>
                                <ul class="social-nav">
                                    <li class="social-nav__item"><a href="#" class="social-nav__item-link"><i class="fab fa-vk"></i></a></li>
                                    <li class="social-nav__item"><a href="#" class="social-nav__item-link"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-nav__item"><a href="#" class="social-nav__item-link"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-nav__item"><a href="#" class="social-nav__item-link"><img src="img/icon/telegram.png"
                                        alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="name-company">Name Company © 2018</span>
            <a class="btn-up" style="cursor: pointer" onclick="up()"><img src="img/icon/arrow-t.png" alt=""></a>
        </footer>
        <script src="js/scripts.min.js"></script>
    </body>
    </html>
