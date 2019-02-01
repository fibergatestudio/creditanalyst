<?php
App::setLocale(Auth::user()->preferred_language);
?>

@extends('layouts.admin')

@section('content')

<style type="text/css">
/* Индикаторы */
#searchIndicator, #resultIndicator{
    max-width: 600px;
}
#indicatorGroup tr th:nth-child(1){
    width: 20px;
}
#indicatorGroup tr th img{
    max-width: none;
}
#indicatorGroup tr th:nth-child(2){
    width: 30px;
    background: #3e4550;
    color: #fff;
    text-align:center;
    vertical-align: middle;
}
table#indicatorGroup{
    border-spacing: 0px 11px;
    border-collapse: separate;
}
table#indicatorGroup th{
    border-top-left-radius:  10px;
    border-bottom-left-radius:  10px;
    border-top:none;
}
table#indicatorGroup tr td:nth-child(3){
    border-top-right-radius:  10px;
    border-bottom-right-radius:  10px;
    background: #f2f2f2;
}
table#indicatorGroup tr td{
    border-top:none;
}
#addIndicator{
    margin-left: 50px;
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
i.fa.fa-wrench{
    cursor: pointer;
}
div.input-group.mb-3>div.input-group-append>button.btn.btn-outline-secondary{
    border-left: none;
    border-top-right-radius:  5px;
    border-bottom-right-radius:  5px;
    min-width: 50px;
}
#searchIndicator.form-control:focus, #searchIndicator.form-control{
    box-shadow: none;
    border-right: none;    
}
div.input-group.mb-3:hover button.btn.btn-outline-secondary.add-indicator, div.input-group.mb-3:hover #searchIndicator{
    border-color: #3e4550;
}
#chartName{
    border-top-right-radius:  5px;
    border-bottom-right-radius:  5px;
}
#saveChart{
    margin-left: 10px;
}
div.animated.fadeIn{
    margin-top: 20px;
}
/* Карта */
#myChartMap > svg{
    height: 650px;
}
.map, .vmap {
    width: 100%;
    height: 650px;
}  
.map-content{
    margin-left: 100px;
    margin-top: 100px;
    color: #A62A00;
}
.marker-map{
    margin-top: -15px;
}
/* Индикаторы на карте */
#marker-labels div{
    display: inline-block;
}
#marker-labels .marker-color-one div{
    vertical-align: top;
}
#marker-labels div:nth-child(2n){
    vertical-align: top;
}
.marker-color{
    width: 30px;
    height: 15px;
    margin: 5px;
}
.marker-color-one{
    width: 1100px;
    height: 25px;
    margin: 5px;
}
.marker-color-one div{
    width: 15px;
    height: 15px;
    margin-top: 5px;
    margin-bottom: 5px;
}
.marker-color-one div:last-child{
    margin-top: 0;
    width: 700px;
    margin-left: 5px;
}
#m-color-1{
    background: #FF0000;
}
#m-color-2{
    background: #A62A00;
}
#m-color-3{
    background: #008110;
}
#m-color-4{
    background: #CCC;
}
</style>

<section class="section-content">
    <div class="content-title">
        <h2 class="name-menu">Статистика и анализ</h2>
        <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
    </div>

    <div class="card card-fluid">
        <div class="card-body">

            <div class="title-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/statistics-analysis') }}">Сохраненные документы</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Создать новую карту</li>
                    </ol>
                </nav>
                <a href="{{ url('/admin/statistics-analysis') }}" class="text button-back">Назад</a>
            </div>
        
            <div class="row form-group">
                <div class="col col-md-12">
                    <table class="table" id="indicatorGroup"></table>                                       
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Введите поисковый запрос" id="searchIndicator" name="searchIndicator">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary add-indicator" type="button"><span class="icon icon-search"></span></button>
                        </div>
                        <button id="addIndicator" class="btn btn-success btn-sm">@lang('charts.Добавить индикатор')</button>
                    </div>
                </div>       
            </div>
            
            <ul id="resultIndicator"></ul>
            <div class="row form-group">
                <div class="col-12 col-md-9">
                    <button id="makeChartMap" class="btn btn-primary btn-sm">@lang('charts_map.Построить график')</button>
                </div>
            </div>

            <div class="col col-md-12">
                <div class="input-group">
                    <input type="text" id="chartName" name="chartName" placeholder="Название графика" class="form-control">
                    <div id="save-export" class="input-group-btn">
                        <button id="saveChart" class="btn btn-success btn-sm chart-save">@lang('charts_map.Сохранить')</button>
                        <button id="exportChart" class="btn btn-danger btn-sm chart-save">@lang('charts_map.Экспортировать')</button>
                        <button id="exportToWordChart" class="btn btn-success btn-sm chart-save">@lang('charts_map.Экспорт в Word')</button>
                    </div>                    
                </div>
            </div>
            
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <h4>Ukraine</h4>
                            </div>
                            <div class="Vector-map-js">
                                <div id="marker-labels">
                                    {!! $colors_arr !!}
                                </div>
                                <div id="myChartMap" class="vmap"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
        
        </div><!-- card-body -->
    </div><!-- card card-fluid -->

</section>

@endsection


<script type="text/javascript">
    var koatuu = '<?=json_encode($koatuu_obj,JSON_UNESCAPED_UNICODE) ?>';
    koatuu = JSON.parse(koatuu);
    var indicatorsObjName = '<?=$indicators_obj_name ?>';
    indicatorsObjName = JSON.parse(indicatorsObjName);
</script>

<script type="text/javascript">
    var indicatorIdGet = '<?=(isset($_GET['indicator_id']))?$_GET['indicator_id'] : 0 ?>';
    var fromGet = '<?=(isset($_GET['from']))?$_GET['from'] : "2017-01-01" ?>';
    var toGet = '<?=(isset($_GET['to']))?$_GET['to'] : "2018-01-01" ?>';
</script>

<script type="text/javascript">
    var filesCharts = '<?=json_encode($files_charts,JSON_UNESCAPED_UNICODE) ?>';
    filesCharts = JSON.parse(filesCharts);
    var filesChartsFull = '<?=json_encode($files_charts_full,JSON_UNESCAPED_UNICODE) ?>';
    filesChartsFull = JSON.parse(filesChartsFull);
    var months = '<?=json_encode($months,JSON_UNESCAPED_UNICODE) ?>';
    var indicatorsName = '<?=$indicators_name ?>';
    var indicators = '<?=json_encode($indicators_obj,JSON_UNESCAPED_UNICODE) ?>';
    var data = '<?=json_encode($data_obj,JSON_UNESCAPED_UNICODE) ?>';
    var chartLink = "{{ asset('charts') }}";
    var rootSite = '<?=URL::to('/')?>';
</script>