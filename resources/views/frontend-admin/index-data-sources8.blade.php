<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Источники данных</title>
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
                <a href="#" class="active">03</a>
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

    <section id="data-sources" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Источники данных</h2>
            <a href="#" class="exit">Выйти</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">Источники данных</h3>
                    <div id="accordion">
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne">
                                <div class="content-row">
                                    <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}">
                                    <h3 class="text">Название источника</h3>
                                </div>

                                    <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fas fa-angle-up"></i>
                                    </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">Описание:</dt>
                                            <dd class="col-md-8">Lorem ipsum dolor sit amet. Erat sit aliquyam clita. Eu dolor justo et ea ad. Ipsum dolor quis nonumy eos nonumy. Eos dolor tempor. </dd>
                                            <dt class="col-md-4">Источник / поставщик:</dt>
                                            <dd class="col-md-8">Госкомстат</dd>
                                            <dt class="col-md-4">Частота данных:</dt>
                                            <dd class="col-md-8">Квартальная</dd>
                                            <dt class="col-md-4">География данных:</dt>
                                            <dd class="col-md-8">Вся Украина</dd>
                                        </dl>
                                        <button class="btn btn-success">Список пользователей</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne1">
                                <div class="content-row">
                                    <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}" >
                                    <h3 class="text">Название источника</h3>
                                </div>

                                <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne1" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">Описание:</dt>
                                            <dd class="col-md-8">Lorem ipsum dolor sit amet. Erat sit aliquyam clita. Eu dolor justo et ea ad. Ipsum dolor quis nonumy eos nonumy. Eos dolor tempor. </dd>
                                            <dt class="col-md-4">Источник/поставщик:</dt>
                                            <dd class="col-md-8">Госкомстат</dd>
                                            <dt class="col-md-4">Частота данных:</dt>
                                            <dd class="col-md-8">Квартальная</dd>
                                            <dt class="col-md-4">География данных:</dt>
                                            <dd class="col-md-8">Вся Украина</dd>
                                        </dl>
                                        <button class="btn btn-success">Список пользователей</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne3">
                                <div class="content-row">
                                    <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}">
                                    <h3 class="text">Название источника</h3>
                                </div>

                                <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne3" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">Описание:</dt>
                                            <dd class="col-md-8">Lorem ipsum dolor sit amet. Erat sit aliquyam clita. Eu dolor justo et ea ad. Ipsum dolor quis nonumy eos nonumy. Eos dolor tempor. </dd>
                                            <dt class="col-md-4">Источник / поставщик:</dt>
                                            <dd class="col-md-8">Госкомстат</dd>
                                            <dt class="col-md-4">Частота данных:</dt>
                                            <dd class="col-md-8">Квартальная</dd>
                                            <dt class="col-md-4">География данных:</dt>
                                            <dd class="col-md-8">Вся Украина</dd>
                                        </dl>
                                        <button class="btn btn-success">Список пользователей</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne4">
                                <div class="content-row">
                                    <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}">
                                    <h3 class="text">Название источника</h3>
                                </div>

                                <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne4" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">Описание:</dt>
                                            <dd class="col-md-8">Lorem ipsum dolor sit amet. Erat sit aliquyam clita. Eu dolor justo et ea ad. Ipsum dolor quis nonumy eos nonumy. Eos dolor tempor. </dd>
                                            <dt class="col-md-4">Источник / поставщик:</dt>
                                            <dd class="col-md-8">Госкомстат</dd>
                                            <dt class="col-md-4">Частота данных:</dt>
                                            <dd class="col-md-8">Квартальная</dd>
                                            <dt class="col-md-4">География данных:</dt>
                                            <dd class="col-md-8">Вся Украина</dd>
                                        </dl>
                                        <button class="btn btn-success">Список пользователей</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne5">
                                <div class="content-row">
                                    <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}">
                                    <h3 class="text">Название источника</h3>
                                </div>

                                <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne5" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">Описание:</dt>
                                            <dd class="col-md-8">Lorem ipsum dolor sit amet. Erat sit aliquyam clita. Eu dolor justo et ea ad. Ipsum dolor quis nonumy eos nonumy. Eos dolor tempor. </dd>
                                            <dt class="col-md-4">Источник / поставщик:</dt>
                                            <dd class="col-md-8">Госкомстат</dd>
                                            <dt class="col-md-4">Частота данных:</dt>
                                            <dd class="col-md-8">Квартальная</dd>
                                            <dt class="col-md-4">География данных:</dt>
                                            <dd class="col-md-8">Вся Украина</dd>
                                        </dl>
                                        <button class="btn btn-success">Список пользователей</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne6">
                                <div class="content-row">
                                    <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}">
                                    <h3 class="text">Название источника</h3>
                                </div>

                                <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne6" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">Описание:</dt>
                                            <dd class="col-md-8">Lorem ipsum dolor sit amet. Erat sit aliquyam clita. Eu dolor justo et ea ad. Ipsum dolor quis nonumy eos nonumy. Eos dolor tempor. </dd>
                                            <dt class="col-md-4">Источник / поставщик:</dt>
                                            <dd class="col-md-8">Госкомстат</dd>
                                            <dt class="col-md-4">Частота данных:</dt>
                                            <dd class="col-md-8">Квартальная</dd>
                                            <dt class="col-md-4">География данных:</dt>
                                            <dd class="col-md-8">Вся Украина</dd>
                                        </dl>
                                        <button class="btn btn-success">Список пользователей</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link not-active" href="#"><i class="fas fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link " href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
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