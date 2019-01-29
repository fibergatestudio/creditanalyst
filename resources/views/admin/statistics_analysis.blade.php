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

<section class="section-content">
    <div class="content-title">
        <h2 class="name-menu">{{ $title }}</h2>
        <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
    </div>

    <div class="card card-fluid">
        <div class="card-body">
            <h3 class="title-block">Сохраненные документы</h3>
            
            <div class="row form-group">
                <div class="col col-md-12">
                    <a href="{{route('chartsIndex')}}" class="btn btn-success btn-sm">@lang('statistics_analysis.Создать новый график')</a>
                    <a href="{{route('chartsMapIndex')}}" class="btn btn-success btn-sm">@lang('statistics_analysis.Создать новую карту')</a>
                </div>
            </div>
            
            <table class="table table-striped" id="chartsGroup">
                @if(isset($files_charts))
                @for($i=0; $i < count($files_charts); $i++)
                <tr>
                    <td class="chart-name">{{ $type_file_arr[$i] }}. {{ $files_charts[$i] }}</td>
                    <td><img onclick="watchChart(this)" data-id="{{ $i }}" src="/mercurial/images/icon-open.png" title="Посмотреть" style="cursor: pointer;"></td>
                    <td onclick="removeChart(this)" data-id="{{ $i }}"><img  title="Удалить" src="/mercurial/images/icon-delet-red.png" style="cursor: pointer;"></td>       
                </tr>
                @endfor
                @endif
            </table>                                       

        </div>

    </div>
</section>
@endsection