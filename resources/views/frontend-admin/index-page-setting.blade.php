<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Настройки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="{{asset("mercurial/css/style.css")}}" rel="stylesheet">
</head>
<body>
<div class="grid-wrapper">
    <header class="header">
        <img src="{{asset("mercurial/images/logo.png")}}" class="logo" alt="logo">
        <form class="form-inline form-search">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Введите поисковый запрос">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><span class="icon icon-search"></span></button>
                </div>
            </div>
        </form>
        <div class="block-right">
            <span class="icon-alarm">0</span>
            <span class="icon-user">Ivan_Ivanov@mail.ru</span>
        </div>
    </header>
    <section class="section-sidebar">
        <h3>Meню</h3>
        <ul class="list-menu">
            <li class="icon icon-data-sources">Источники данных</li>
            <li class="icon icon-search-list">Поиск данных</li>
            <li class="icon icon-monitoring">Мониторинг данных</li>
            <li class="icon icon-statist">Статистика и анализ</li>
            <li class="icon icon-setup active">Настройки</li>
            <li class="icon icon-help">Помощь</li>
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
                    <h6 class="text">Электронная почта</h6>
                    <div class="alert alert-dark" role="alert">
                        support@mining.net.ua
                    </div>
                    <p>Если Вы хотите изменить адрес Вашей электронной почты, пожалуйста
                        обратитесь в <a href="#">службу поддержки</a> </p>
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Имя:</label>
                            <input type="text" class="form-control col-sm-8" placeholder="Ivan">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Фамилия:</label>
                            <input type="text" class="form-control col-sm-8"  placeholder="Ivanov">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Дата рождения:</label>
                            <input type="text" class="form-control col-sm-2 "  placeholder="">
                            <input type="text" class="form-control col-sm-2 offset"  placeholder="">
                            <label for=""></label>
                            <select id="" class="form-control col-sm-3 offset">
                                <option selected></option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Город:</label>
                            <input type="text" class="form-control col-sm-8"  placeholder="">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-align-right">Страна:</label>
                            <input type="text" class="form-control col-sm-8"  placeholder="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card even new-password">
                <div class="card-body">
                    <h3 class="title-block">Смена пароля</h3>
                    <form>
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
                        <div class="block-save-password">
                            <button class="btn btn-primary" type="submit">Сменить</button>
                            <span class="icon italic save-password">Новый пароль сохранен!</span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card odd">
                <div class="card-body">
                    <h3 class="title-block">Настройка уведомлений</h3>
                    <form>
                        <div class="form-group">
                            <label class="checkbox-label">
                                Отправлять сводку по показателям, добавленным в мониторинг
                                <span class="checkmark"></span>
                                <input type="checkbox" checked="checked">
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label for="exampleCheck1">Отключить все уведомления</label>
                        </div>
                        <div class="form-group row">
                            <input type="time" id="appt" name="appt" class="form-control col">
                            <label class="col-sm-9">Выбрать время уведомления</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card even">
                <div class="card-body">
                    <h3 class="title-block">Другие настройки</h3>
                    <div class="form-group row">
                        <select id="inputState" class="form-control col-sm-1">
                            <option selected>Ru</option>
                            <option>Eng</option>
                        </select>
                        <label for="inputState" class="col-sm-11">Выбор языка</label>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-check row">
                                    <input class="form-check-input col-sm-2" type="text" placeholder="." value="" checked>
                                    <label></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input col-sm-2" type="text" placeholder="," value="" checked>
                                    <label></label>
                                </div>
                            </div>
                            <label class="col-form-label col-sm-8 pt-0">Разделитель дробной части</label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>