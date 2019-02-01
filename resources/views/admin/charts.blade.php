<?php
App::setLocale(Auth::user()->preferred_language);
?>

@extends('layouts.mercurial')

@section('content')

<style type="text/css">
#searchIndicator, #resultIndicator{
    width: 600px;
}
#indicatorGroup tr th:nth-child(1){
    width: 20px;
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
table#indicatorGroup tr td:nth-child(4){
    border-top-right-radius:  10px;
    border-bottom-right-radius:  10px;
    background: #f2f2f2;
}
table#indicatorGroup tr td:nth-child(3){
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
                        <li class="breadcrumb-item active" aria-current="page">Создать новый график</li>
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
                    @lang('charts.Для теста представлены все показатели, кроме бананов')
                    <hr>

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
                <h5>@lang('charts.Период:')</h5>
                <div class="col-6 col-md-4">
                    <h5>от</h5>
                    <select name="fromMonth" id="fromMonth" class="form-control-sm form-control">
                        @if(isset($months))
                        @for($i=0; $i < count($months); $i++)
                        <option value="{{$i}}">{{ $months[$i] }}</option>
                        @endfor
                        @endif
                    </select>
                    <select name="fromYear" id="fromYear" class="form-control-sm form-control">
                        @if(isset($years))
                        @for($i=0; $i < count($years); $i++)
                        <option value="{{$years[$i]}}">{{ $years[$i] }}</option>
                        @endfor
                        @endif
                    </select>
                </div>
                <div class="col-6 col-md-4">
                    <h5>до</h5>
                    <select name="untilMonth" id="untilMonth" class="form-control-sm form-control">
                        @if(isset($months))
                        @for($i=0; $i < count($months); $i++)
                        <option value="{{$i}}">{{ $months[$i] }}</option>
                        @endfor
                        @endif
                    </select>
                    <select name="untilYear" id="untilYear" class="form-control-sm form-control">
                        @if(isset($years))
                        @for($i=0; $i < count($years); $i++)
                        <option value="{{$years[$i]}}">{{ $years[$i] }}</option>
                        @endfor
                        @endif
                    </select>
                </div>    
                <button id="makeChart" class="btn btn-primary btn-sm">@lang('charts.Построить график')</button>
            </div>
            <div class="content mt-3">
                <div class="col col-md-12">
                    <div class="input-group">
                        <input type="text" id="chartName" name="chartName" placeholder="Название графика" class="form-control">
                        <div id="save-export" class="input-group-btn">
                            <button id="saveChart" class="btn btn-success btn-sm">@lang('charts.Сохранить')</button>
                            <button id="exportChart" class="btn btn-danger btn-sm">@lang('charts.Экспортировать')</button>
                            <button id="exportToWordChart" class="btn btn-success btn-sm">@lang('charts.Экспорт в Word')</button>
                        </div>                    
                    </div>
                </div>
                
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <canvas id="myChart" width="1100" height="300"></canvas>
                        </div><!-- /# column -->
                    </div>
                </div><!-- .animated -->
            
            </div>
        </div>
    </div>
</section>

@endsection

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