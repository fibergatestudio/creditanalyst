<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Статистика и анализ</title>
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
            <li>
                <a href="#">
                    <span class="icon icon-data-sources"></span>
                    <span class="menu-item-description collapse show">Источники данных</span>
                </a>
            </li>
            <li>
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
            <li class="active">
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

    <section id="page-statistic-new" class="section-content charts">
        <div class="content-title">
            <h2 class="name-menu">Статистика и анализ</h2>
            <a href="#" class="exit">Выйти</a>
        </div>
        <div class="card card-fluid">
            <div class="card-body">
                <div class="title-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Сохраненные документы</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Создать новый график</li>
                        </ol>
                    </nav>
                    <a href="#" class="text button-back">Назад</a>
                </div>
                <ul class="new-statistic">
                    <li class="new-statistic-items">
                        <div class="order-wrapper">
                            <a href="#" class="disabled"><i class="fas fa-sort-up"></i></a>
                            <a href="#"><i class="fas fa-sort-down"></i></a>
                        </div>
                        <div class="inline-content-inputs">
                            <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">01</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Индикатор 1">
                            </div>
                        </div>
                        <div class="actions">
                            <a href="#" class="icon icon-delete-red"> </a>
                        </div>
                    </li>
                    <li class="new-statistic-items">
                        <div class="order-wrapper">
                            <a href="#"><i class="fas fa-sort-up"></i></a>
                            <a href="#"><i class="fas fa-sort-down"></i></a>
                        </div>
                        <div class="inline-content-inputs">
                            <label class="sr-only" for="inlineFormInputGroupUsername7"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">01</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername7" placeholder="Индикатор 2">
                            </div>
                        </div>
                        <div class="actions">
                            <a href="#" class="icon icon-delete-red"> </a>
                        </div>
                    </li>
                    <li class="new-statistic-items">
                        <div class="order-wrapper">
                            <a href="#"><i class="fas fa-sort-up"></i></a>
                            <a href="#"><i class="fas fa-sort-down"></i></a>
                        </div>

                        <div class="inline-content-inputs">
                            <label class="sr-only" for="inlineFormInputGroupUsername8"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">01</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername8" placeholder="Индикатор 3">
                            </div>
                        </div>
                        <div class="actions">
                            <a href="#" class="icon icon-delete-red"> </a>
                        </div>
                    </li>
                    <li class="new-statistic-items">
                        <div class="order-wrapper">
                            <a href="#"><i class="fas fa-sort-up"></i></a>
                            <a href="#"><i class="fas fa-sort-down"></i></a>
                        </div>
                        <div class="inline-content-inputs">
                            <label class="sr-only" for="inlineFormInputGroupUsername9"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">01</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername9" placeholder="Индикатор 4">
                            </div>
                        </div>
                        <div class="actions">
                            <a href="#" class="icon icon-delete-red"> </a>
                        </div>
                    </li>
                </ul>
                <form class=" content-row orm-inline form-search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Введите поисковый запрос">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><span class="icon icon-search"></span></button>
                        </div>
                    </div>
                    <a href="#" class="btn btn-success">Добавить индикатор</a>
                </form>
            </div>
        </div>

        <div class="card card-fluid">
            <div class="card-body">
                <div class="top-card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link show active" href="#all" role="tab" data-toggle="tab">Вся Украина</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#south" role="tab" data-toggle="tab">Юг</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#west" role="tab" data-toggle="tab">Запад</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#east" role="tab" data-toggle="tab">Восток</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#center" role="tab" data-toggle="tab">Центр</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#state" role="tab" data-toggle="tab">Область</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#region" role="tab" data-toggle="tab">Район</a>
                        </li>
                    </ul>
                </div>
                <div class="content-row form-group charts-save-name">
                    <input type="text" class="form-control" placeholder="Название графика">
                    <a href="#" class="btn btn-success">Сохранить</a>
                    <a href="#" class="btn btn-success">Экспортировать</a>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="all">
                        <div class="map">
                            <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                            <div class="single-chart center">
                                <svg viewBox="0 0 36 36" width="100%" height="100%">
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#cccccc";
                                            stroke-width="4";
                                            stroke-dasharray="100, 100"></path>
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#86c53c";
                                            stroke-width="4";
                                            stroke-dasharray="75, 100"></path>
                                    <text x="50%" y="59%" class="percentage">
                                        <tspan class="number">50</tspan>
                                        <tspan dx="-5" dy="-10" class="symbol">%</tspan>
                                        <tspan dx="-20" dy="15" class="description">данные</tspan>
                                    </text>
                                </svg>
                            </div>
                            <div class="single-chart west">
                                <svg viewBox="0 0 36 36" width="100%" height="100%">
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#cccccc";
                                            stroke-width="4";
                                            stroke-dasharray="100, 100"></path>
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#86c53c";
                                            stroke-width="4";
                                            stroke-dasharray="75, 100"></path>
                                    <text x="50%" y="59%" class="percentage">
                                        <tspan class="number">50</tspan>
                                        <tspan dx="-5" dy="-10" class="symbol">%</tspan>
                                        <tspan dx="-20" dy="15" class="description">данные</tspan>
                                    </text>
                                </svg>
                            </div>
                            <div class="single-chart east">
                                <svg viewBox="0 0 36 36" width="100%" height="100%">
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#cccccc";
                                            stroke-width="4";
                                            stroke-dasharray="100, 100"></path>
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#86c53c";
                                            stroke-width="4";
                                            stroke-dasharray="75, 100"></path>
                                    <text x="50%" y="59%" class="percentage">
                                        <tspan class="number">50</tspan>
                                        <tspan dx="-5" dy="-10" class="symbol">%</tspan>
                                        <tspan dx="-20" dy="15" class="description">данные</tspan>
                                    </text>
                                </svg>
                            </div>
                            <div class="single-chart south">
                                <svg viewBox="0 0 36 36" width="100%" height="100%">
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#cccccc";
                                            stroke-width="4";
                                            stroke-dasharray="100, 100"></path>
                                    <path
                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                            fill="none"
                                            stroke="#86c53c";
                                            stroke-width="4";
                                            stroke-dasharray="75, 100"></path>
                                    <text x="50%" y="59%" class="percentage">
                                        <tspan class="number">50</tspan>
                                        <tspan dx="-5" dy="-10" class="symbol">%</tspan>
                                        <tspan dx="-20" dy="15" class="description">данные</tspan>
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="south">
                        <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="west">
                        <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="east">
                        <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="center">
                        <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="state">
                        <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="region">
                        <img src="mercurial/images/icons/1.svg" class="responsive-image" alt="img">
                    </div>
                </div>
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