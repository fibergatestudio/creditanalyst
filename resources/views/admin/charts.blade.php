<?php
App::setLocale(Auth::user()->preferred_language);
?>

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

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <table class="table" id="indicatorGroup"></table>                                       
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-9">
            @lang('charts.Для теста представлены все показатели, кроме бананов')
            <hr>
            <input type="text" placeholder=@lang('charts.Введите поисковый запрос') id="searchIndicator" name="searchIndicator">
            <i class="fa fa-search"></i> 
            <button id="addIndicator" class="btn btn-success btn-sm">@lang('charts.Добавить индикатор')</button>
        </div>       
    </div>
    <ul id="resultIndicator"></ul>
    <div class="row form-group">
        <div class="col-12 col-md-9">
            <h5>@lang('charts.Период:')</h5>
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
            <button id="makeChart" class="btn btn-primary btn-sm">@lang('charts.Построить график')</button>
        </div>
    </div>
    <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">myChart </h4>
                        <canvas id="myChart" width="1200" height="300"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->

        </div>

    </div><!-- .animated -->
    <div class="col col-md-12">
            <div class="input-group">
                <h5>@lang('charts.Название графика')</h5>
                <input type="text" id="chartName" name="chartName" placeholder=@lang('charts.График 1') class="form-control">
                <div id="save-export" class="input-group-btn">
                    <button id="saveChart" class="btn btn-success btn-sm">@lang('charts.Сохранить')</button>
                    <button id="exportChart" class="btn btn-danger btn-sm">@lang('charts.Экспортировать')</button>
                    <button id="exportToWordChart" class="btn btn-success btn-sm">@lang('charts.Экспорт в Word')</button>
                </div>                    
            </div>
        </div>
    </div>
</div><!-- .content -->

<hr>


@endsection