@extends('layouts.mercurial')

@section('content')

<?php
App::setLocale(Auth::user()->preferred_language);
?>


<script src="{{ asset('js/app.js') }}" defer></script>

<section id="data-sources" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">@lang('monitoring_index.Мониторинг')</h2>
            <a href="{{ url('user_logout') }}" class="exit">@lang('monitoring_index.Выйти')</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">@lang('monitoring_index.Мониторинг')</h3>

                    <div style="margin-left: 0;" class="container" id="app">
                        <user-indicator-list />
                    </div>
                </div>
            </div>
        </div>

@endsection
