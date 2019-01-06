<?php
App::setLocale(Auth::user()->preferred_language);
?>
@extends('layouts.mercurial')

@section('content')
    <section style="padding: 10px">
        <h2>@lang('help_index.Страница помощи')</h2>
    </section>
@endsection