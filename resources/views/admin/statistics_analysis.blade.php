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

<section id="data-sources" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">{{ $title }}</h2>
            <a href="{{ url('user_logout') }}" class="exit">@lang('sources-index.Выйти')</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">Сохраненные документы</h3>
                    <div class="row form-group">
                    <div class="col col-md-12">
                        <a href="{{route('chartsIndex')}}" style="border-color: #84c33d;" class="btn btn-success btn-sm">@lang('statistics_analysis.Создать новый график')</a>
                        <a href="{{route('chartsMapIndex')}}" style="border-color: #84c33d;" class="btn btn-success btn-sm">@lang('statistics_analysis.Создать новую карту')</a>
                    </div>
                </div>
                    <table class="table" id="chartsGroup">
                        @if(isset($files_charts))
                        @for($i=0; $i < count($files_charts); $i++)
                        <tr>
                            <td class="chart-name">{{ $files_charts[$i] }}</td>
                            <td><i onclick="watchChart(this)" data-id="{{ $i }}" class="fa fa-caret-square-o-right" title="Посмотреть"></i></td>
                            <td onclick="removeChart(this)" data-id="{{ $i }}"><i class="fa fa-window-close" title="Удалить"></i></td>         
                        </tr>
                        @endfor
                        @endif
                    </table>                
                </div>
            </div>
        </div>

@endsection