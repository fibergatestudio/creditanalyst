<?php
App::setLocale(Auth::user()->preferred_language);
?>

@extends('layouts.admin')

@section('content')

<style type="text/css">
/* Индикаторы */
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
#marker-labels div:nth-child(2n){
    vertical-align: top;
}
.marker-color{
    width: 30px;
    height: 15px;
    margin: 5px;
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

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <table class="table" id="indicatorGroup"></table>                                       
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-9">
            <hr>
            <input type="text" placeholder=@lang('charts_map.Введите поисковый запрос') id="searchIndicator" name="searchIndicator">
            <i class="fa fa-search"></i> 
            <button id="addIndicator" class="btn btn-success btn-sm">@lang('charts_map.Добавить индикатор')</button>
        </div>       
    </div>
    <ul id="resultIndicator"></ul>
    <div class="row form-group">
        <div class="col-12 col-md-9">
            <button id="makeChartMap" class="btn btn-primary btn-sm">@lang('charts_map.Построить график')</button>
        </div>
    </div>
        <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ukraine</h4>
                        </div>
                        <div class="Vector-map-js">
                            <div id="marker-labels"></div>
                            <div id="myChartMap" class="vmap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
        <div class="col col-md-12">
            <div class="input-group">
                <h5>@lang('charts_map.Название графика')</h5>
                <input type="text" id="chartName" name="chartName" placeholder=@lang('charts_map.График 1') class="form-control">
                <div id="save-export" class="input-group-btn">
                    <button id="saveChart" class="btn btn-success btn-sm chart-save">@lang('charts_map.Сохранить')</button>
                    <button id="exportChart" class="btn btn-danger btn-sm chart-save">@lang('charts_map.Экспортировать')</button>
                    <button id="exportToWordChart" class="btn btn-success btn-sm chart-save">@lang('charts_map.Экспорт в Word')</button>
                </div>                    
            </div>
        </div>
</div>

<hr>

<script type="text/javascript">
    var koatuu = '<?=json_encode($koatuu_obj,JSON_UNESCAPED_UNICODE) ?>';
    koatuu = JSON.parse(koatuu);
</script>

@endsection