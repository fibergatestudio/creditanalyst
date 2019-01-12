@extends('layouts.admin')

@section('content')

    <?php
    App::setLocale(Auth::user()->preferred_language);
    ?>

<style type="text/css">
i.fa.fa-window-close-o, i.fa.fa-caret-square-o-right{
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
            <h1>{{ $title }}</h1>
            <table class="table" id="chartsGroup">
                @if(isset($files_charts))
                @for($i=0; $i < count($files_charts); $i++)
                <tr>
                    <td class="chart-name">{{ $files_charts[$i] }}</td>
                    <td><i onclick="watchChart(this)" data-id="{{ $i }}" class="fa fa-caret-square-o-right" title="Посмотреть"></i></td>
                    <td onclick="removeChart(this)" data-id="{{ $i }}"><i class="fa fa-window-close-o" title="Удалить"></i></td>         
                </tr>
                @endfor
                @endif
            </table>                                       
        </div>
    </div>
</div>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <a href="{{route('chartsIndex')}}" class="btn btn-success btn-sm">@lang('statistics_analysis.Создать новый график')</a>
            <a href="{{route('chartsMapIndex')}}" class="btn btn-success btn-sm">@lang('statistics_analysis.Создать новую карту')</a>
        </div>
    </div>
</div>

@endsection