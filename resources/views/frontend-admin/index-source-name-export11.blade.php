<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Источник Название</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <link href="mercurial/css/style.css" rel="stylesheet">
</head>
<body>
<div class="grid-wrapper">
    <header class="header">
        <img src="mercurial/images/logo.png" class="logo" alt="logo">
        <form class="form-inline form-search">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Введите поисковый запрос">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><span class="icon icon-search"></span></button>
                </div>
            </div>
        </form>
        <ul class="block-right">
            <li class="icon icon-alarm-active"><a href="#" class="">03</a></li>
            <li class="icon icon-user"><a href="#">Ivan_Ivanov@mail.ru</a></li>
        </ul>
    </header>

    <section class="section-sidebar">
        <h3 class="sidebar-title">
            <span class="menu-item-description collapse show">Meню</span>
            <span class="icon icon-menu"></span>
        </h3>
        <ul class="list-menu">
            <li class="active">
                <a href="#">
                    <span class="icon icon-data-sources"></span>
                    <span class="menu-item-description collapse show">Источники данных</span>
                </a>
            </li>
            <li >
                <a href="#">
                    <span class="icon icon-search-list"></span>
                    <span class="menu-item-description collapse show">Поиск данных</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon icon-monitoring"></span>
                    <span class="menu-item-description collapse show">Мониторинг данных</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon icon-statist"></span>
                    <span class="menu-item-description collapse show">Статистика и анализ</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon icon-setup"></span>
                    <span class="menu-item-description collapse show">Настройки</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon icon-help"></span>
                    <span class="menu-item-description collapse show">Помощь</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="page-source-name" class="section-content export">
        <div class="content-title d-none">
            <h2 class="name-menu">Источник Название</h2>
            <a href="#" class="exit">Выйти</a>
        </div>
        <div class="card card-fluid">
            <div class="card-body">
                <div class="title-block">
                    <span>Экспорт в Excel</span>
                    <a href="#" class="text close-button"><i class="fas fa-times"></i></a>
                </div>
                <form class="card-form">
                    <table class="table table-striped table-borderless">
                        <thead>
                        <tr>
                            <th colspan="3">
                                <div class="filters">
                                    <div class="filters-item">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="all" />
                                            <label for="all">Отметить все</label>
                                        </div>
                                    </div>
                                    <div class="filters-item filter-inline period-date">
                                        <label for="start-from">Дата:</label>
                                        <input type="text" class="form-control" id="start-from" placeholder="Период от --" />
                                        <label for="start-to"></label>
                                        <input type="text" class="form-control" id="start-to" placeholder="Период до --" />
                                    </div>
                                    <div class="filters-item filter-inline select-with-check">
                                        <label for="state">Регион:</label>
                                        <select class="form-control selectpicker" id="state" required="">
                                            <option value="">Вся Украина</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label for="exampleCheck2"></label>
                                </div>
                            </td>
                            <td>Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов</td>
                            <td>
                                <div class="actions"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                    <label for="exampleCheck3"></label>
                                </div>
                            </td>
                            <td>Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов</td>
                            <td>
                                <div class="actions"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                    <label for="exampleCheck4"></label>
                                </div>
                            </td>
                            <td>Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов</td>
                            <td>
                                <div class="actions"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                    <label for="exampleCheck5"></label>
                                </div>
                            </td>
                            <td>Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов</td>
                            <td>
                                <div class="actions"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                    <label for="exampleCheck6"></label>
                                </div>
                            </td>
                            <td>Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов</td>
                            <td>
                                <div class="actions"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck7">
                                    <label for="exampleCheck7"></label>
                                </div>
                            </td>
                            <td>Показатель 6, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов,
                                пока финальный текст еще не создан. Рыбный текст также известен как текст-заполнитель или же текст-наполнитель. Иногда текст-«рыба»
                                также используется композиторами при написании музыки.</td>
                            <td>
                                <div class="actions"></div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="content-row">
                        <button type="submit" class="btn btn-success">Экспорт в Excel</button>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link not-active" href="#"><i class="fas fa-chevron-left"></i></a></li>
                            <li class="page-item active"><a class="page-link " href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                        </ul>
                    </div>

                </form>
            </div>
        </div>

    </section>
</div>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
    $(document).ready(function () {
        var menuSwitcher = $('.icon-menu'),
            menuItems = $('.menu-item-description.collapse');

        menuSwitcher.click(function () {
            menuItems.collapse('toggle');
        });
        $('.selectpicker').selectpicker({
            width: false,
            noneSelectedText: ''
        });
    });
</script>
</body>
</html>