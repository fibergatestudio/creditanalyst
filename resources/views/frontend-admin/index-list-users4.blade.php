<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Кабинет администратора</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
            <li><a href="#"><span class="icon icon-alarm-active"></span> 3</a></li>
            <li><a href="#"><span class="icon icon-admin"></span> Админ</a></li>
            <li><a href="#"><span class="icon icon-user"></span> Ivan_Ivanov@mail.ru</a></li>
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

    <section id="page-list-users" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Администрирование</h2>
            <a href="#" class="exit">Выйти</a>
        </div>


        <div class="card card-fluid">
            <div class="card-body">
                <h3 class="title-block">Кабинет администратора</h3>
                <div class="content-title">
                    <span>Список пользователей</span>
                    <a href="#" class="done-new-user"><i class="fas fa-plus"></i> Добавить нового пользователя</a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>E-mail:</th>
                            <th>Имя:</th>
                            <th>Фамилия:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#" class="active"><span class="icon icon-admin "></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alex@NameCompany.ua</td>
                            <td>Александр</td>
                            <td>Длиннофамильный</td>
                            <td>
                                <div class="actions">
                                    <a href="#">
                                        <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                    </a>
                                    <a href="#"><span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span></a>
                                    <a href="#"><span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span></a>
                                    <a href="#"><span class="icon icon-admin"></span>Админ</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul class="pagination">
                <li class="page-item"><a class="page-link not-active" href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li class="page-item active"><a class="page-link " href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
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