<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Пользователь Ivan_Ivanov@mail.ru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <link href="{{asset('mercurial/css/style.css')}}" rel="stylesheet">
</head>
<body>
<div class="grid-wrapper">
    <header class="header">
        <img src="{{asset('mercurial/images/logo.png')}}" class="logo" alt="logo">
        <form class="form-inline form-search">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Введите поисковый запрос">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><span class="icon icon-search"></span></button>
                </div>
            </div>
        </form>
        <ul class="block-right">
            <li class="icon icon-alarm-active">
                <a href="#" class="active">3</a>
            </li>
            <li class="icon icon-admin">
                <a href="#" class="top-icon-admin">Админ</a>
            </li>
            <li class="icon icon-user">
                <a href="#">Ivan_Ivanov@mail.ru</a>
            </li>
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

    <section id="profile" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Пользователь Ivan_Ivanov@mail.ru</h2>
            <a href="#" class="exit">Выйти</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="title-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Кабинет администратора</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Пользователь Ivan_Ivanov@mail.ru</li>
                            </ol>
                        </nav>
                        <a href="#" class="text button-back">Назад</a></div>

                        <form class="card-form">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="email" class="h6 col-sm-12">Электронная почта</label>
                                        <div class="col">
                                            <input id="email" type="text" class="form-control col" value="support@mining.net.ua" disabled>
                                        </div>
                                    </div>

                                    <h6>Персональные данные</h6>
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
                                    <div class="form-group row datetime-inputs">
                                        <label class="col-sm-4 col-form-label text-align-right">Дата рождения:</label>
                                        <div class="col inputs">
                                            <input type="text" class="form-control"  placeholder="">
                                            <input type="text" class="form-control"  placeholder="">
                                            <select id="year" class="form-control selectpicker">
                                                <option></option>
                                                <option>2018</option>
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
                                    <div class="account-status form-group row">
                                        <span class="text-align-right col-sm-4 ">Статус:</span>
                                        <div class="col">
                                            <a href="#" class="account-activate active">Активен</a>
                                            <button class="btn btn-danger">
                                                <a href="#" class="account-deactivate">Деактивировать</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row block-password-deactivate">
                                <div class="col-sm-12">
                                    <div class="password-deactivate">
                                        <span class="icon icon-change-password">Сбросить пароль пользователя</span>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            <a href="#">Сбросить</a>
                                        </button>
                                        <div class="modal modal-profile fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span class="icon icon-close"></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>
                                                            Вы планируете сбросить пароль
                                                            пользователя User Name!
                                                        </span>
                                                        <span class="text-bold">Вы уверены?</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oтмена</button>
                                                        <button type="button" class="btn btn-primary btn-success">Сбросить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Отключить все уведомления</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <button class="btn btn-success" type="submit">Сохранить и вернуться</button>
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