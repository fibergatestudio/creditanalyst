<?php
App::setLocale(Auth::user()->preferred_language);
?>

@extends('layouts.mercurial')

@section('content')

    @if($indicator_watchlist_data->count() == 0)
        <section id="page-monitoring" class="section-content">
            <div class="content-title">
                <h2 class="name-menu">@lang('monitoring_index.Мониторинг')</h2>
                <a href="#" class="exit">@lang('monitoring_index.Выйти')</a>
            </div>
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">@lang('monitoring_index.Мониторинг')</h3>
                    <section class="monitoring-content row">
                        <div class="text-page-monitoring col-md-12">
                            <p>@lang('monitoring_index.Ни  один  показатель не  был  добавлен,') <a href="{{ url('sources_list') }}" class="">@lang('monitoring_index.добавьте')</a>  @lang('monitoring_index.данные!')</p>
                            <a href="{{ url('indicator_search') }}">
                                <button class="btn btn-success" type="submit">
                                    @lang('monitoring_index.Поиск данных')
                                </button>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    @else
        <section id="page-monitoring" class="section-content">
            <div class="content-title">
                <h2 class="name-menu">@lang('monitoring_index.Мониторинг')</h2>
                <a href="{{ url('user_logout') }}" class="exit">@lang('monitoring_index.Выйти')</a>
            </div>
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">@lang('monitoring_index.Мониторинг')</h3>
                    <table class="table">
                    @foreach($indicator_watchlist_data as $data_entry)
                        <tr>
                            <td>{{ $data_entry->name }}</td>

                            {{-- Кнопка удалить показатель из мониторинга --}}
                            <td>
                                <a href="{{ url("/remove_indicator_from_watchlist")."/".$data_entry->indicator_id }}">
                                    <div class="btn btn-danger">
                                        @lang('monitoring_index.Удалить из списка')
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </section>




    @endif




@endsection