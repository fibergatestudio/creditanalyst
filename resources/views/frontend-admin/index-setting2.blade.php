<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Настройки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
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
            <li class="icon icon-alarm"><a href="#" class="">0</a></li>
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
            <li>
                <a href="#">
                    <span class="icon icon-statist"></span>
                    <span class="menu-item-description collapse show">Статистика и анализ</span>
                </a>
            </li>
            <li class="active">
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

    <section id="page-settings" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Настройки</h2>
            <a href="#" class="exit">Выйти</a>
        </div>
        <div class="content-grid">
            <div class="card odd">
                <div class="card-body">
                    <h3 class="title-block">Мои персональные данные</h3>
                    <h6>Электронная почта</h6>
                    <div class="alert alert-dark" role="alert">
                        support@mining.net.ua
                    </div>
                    <p>Если Вы хотите изменить адрес Вашей электронной почты, пожалуйста
                        обратитесь в <a href="#">службу поддержки</a> </p>
                    <form class="card-form">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Имя:</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Ivan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Фамилия:</label>
                            <div class="col">
                                <input type="text" class="form-control"  placeholder="Ivanov">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Дата рождения:</label>
                            <div class="col inputs">
                                <input type="text" class="form-control"  placeholder="">
                                <input type="text" class="form-control"  placeholder="">
                                <select id="" data-hidden="true" class="form-control selectpicker" title=" ">
                                    <option selected></option>
                                    <option >2000</option>
                                    <option>2001</option>
                                    <option>2002</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Город:</label>
                            <div class="col">
                                <input type="text" class="form-control"  placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Страна:</label>
                            <div class="col">
                                <input type="text" class="form-control"  placeholder="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card even new-password">
                <div class="card-body">
                    <h3 class="title-block">Смена пароля</h3>
                    <form class="card-form">
                        <div class="form-group">
                            <label>Ведите старый пароль:</label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="icon-after done-check-circle"></span>
                        </div>
                        <div class="form-group">
                            <label>Повторите старый пароль:</label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="icon-after error"></span>
                        </div>
                        <div class="form-group">
                            <label>Ведите новый пароль:</label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="icon-after check-circle"></span>
                        </div>
                        <div class="form-group">
                            <label>Повторите новый пароль:</label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="icon-after check-circle"></span>
                        </div>
                        <div class="block-save-password form-group">
                            <button class="btn btn-success" type="submit">Сменить</button>
                            <span class="icon italic icon-italic save-password">Новый пароль сохранен!</span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card odd">
                <div class="card-body">
                    <h3 class="title-block">Настройка уведомлений</h3>
                    <form class="card-form">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label for="exampleCheck2">Отправлять сводку по показателям, добавленным в мониторинг</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label for="exampleCheck1">Отключить все уведомления</label>
                        </div>
                        <div class="form-group form-time">
                            <input type="time" id="appt" name="appt" class="form-control">
                            <label for="appt">Выбрать время уведомления</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card even">
                <div class="card-body">
                    <h3 class="title-block">Другие настройки</h3>
                    <form class="card-form">
                        <div class="form-group row">
                            <div class="col sm-lang">
                                <select id="inputState" class="form-control selectpicker">
                                    <option selected>Ru</option>
                                    <option>Eng</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputState">Выбор языка</label>
                            </div>
                        </div>

                        <div class="form-group radio-groups">
                            <div class="form-radio form-radio-settings">
                                <input type="radio" class="radio" id="exampleRadio1" name="delimiter" checked/>
                                <label for="exampleRadio1" class="form-control"><span class="radio-settings">.</span></label>
                            </div>
                            <div class="form-radio form-radio-settings">
                                <input type="radio" class="radio" id="exampleRadio2" name="delimiter" />
                                <label for="exampleRadio2" class="form-control"><span class="radio-settings">,</span></label>
                            </div>
                            <label class="col-form-label radio-title">Разделитель дробной части</label>
                        </div>

                        <div class="form-group radio-groups">
                            <div class="form-radio form-radio-settings">
                                <input type="radio" class="radio" id="exampleRadio3" name="dec-delimiter" checked/>
                                <label for="exampleRadio3" class="form-control">1000</label>
                            </div>
                            <div class="form-radio form-radio-settings">
                                <input type="radio" class="radio" id="exampleRadio4" name="dec-delimiter" />
                                <label for="exampleRadio4" class="form-control">1 000</label>
                            </div>
                            <label class="col-form-label radio-title">Десятичный разделитель</label>
                        </div>
                    </form>
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