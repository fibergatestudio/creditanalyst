@extends('layouts.admin')

@section('content')

<style type="text/css">
#searchIndicator, #resultIndicator{
    width: 500px;
}
#resultIndicator{
    background: #fff;
}
#resultIndicator > li{
    list-style-type: none;
}
#resultIndicator > li:hover{
    background: #87CEEB;
    cursor: pointer;
}
i.fa.fa-window-close-o, i.fa.fa-wrench{
    cursor: pointer;
}    
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Charts</a></li>
                    <li class="active">Chartjs</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <table class="table" id="indicatorGroup"></table>                                       
        </div>
    </div>
</div>

<div class="card-body card-block">
    <div class="row">
        <div class="col-12 col-md-9">
            Для теста представлены все показатели, кроме бананов
            <hr>
            <input type="text" placeholder="Введите поисковый запрос" id="searchIndicator" name="searchIndicator">
            <i class="fa fa-search"></i> 
            <button id="addIndicator" class="btn btn-success btn-sm">Добавить индикатор</button>
        </div>       
    </div>
    <ul id="resultIndicator"></ul>
</div>

<hr>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col-12 col-md-9">
            <button id="makeChartMap" class="btn btn-primary btn-sm">Построить график</button>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">myChartMap </h4>
                        <canvas id="myChartMap" width="1200" height="300"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->

        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <div class="input-group">
                <h5>Название графика</h5>
                <input type="text" id="chartName" name="chartName" placeholder="График 1" class="form-control">
                <div id="save-export" class="input-group-btn">
                    <button id="saveChart" class="btn btn-success btn-sm">Сохранить</button>
                    <button id="exportChart" class="btn btn-danger btn-sm">Экспортировать</button>
                    <button id="exportToWordChart" class="btn btn-success btn-sm">Экспорт в Word</button>
                </div>                    
            </div>
        </div>
    </div>
</div>

@endsection