<?php
App::setLocale(Auth::user()->preferred_language);
?>

@extends('layouts.mercurial')

@section('content')
<section id="newusers" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">@lang('personal_settings_user_index.Настройки')</h2>
            <a href="{{ url('user_logout') }}" class="exit">@lang('personal_settings_user_index.Выйти')</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="title-block">
                        <nav aria-label="breadcrumb">
                        @lang('personal_settings_user_index.Настройки')
                        </nav>
                        <a href="{{ url('/sources_list') }}" class="text button-back">@lang('personal_settings_user_index.Назад')</a></div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Форма редактирования пользователя --}}
                            <form class="card-form" method="POST" action="{{ url('settings/edit') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="form-group row">
                                    <label class="col-md-12">@lang('personal_settings_user_index.Имя:')</label>
                                    <input name="first_name" type="text" class="form-control col-md-12"  placeholder="" value="{{ $user->first_name }}" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">@lang('personal_settings_user_index.Фамилия:')</label>
                                    <input name="last_name" type="text" class="form-control col-md-12" value="{{ $user->last_name }}" placeholder=""  required>
                                </div>
                                <div class="from-group row">
                                    <a href="#" class="change-password">
                                        <input type="hidden" name="user_email" value="{{ $user->email }}">
                                        <span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span>
                                    </a>
                                </div>
                                <div class="from-group row">
                                    <div class="block-new-user">
                                        <button class="btn btn-success" type="submit">@lang('personal_settings_user_index.Сохранить')</button>
                                        {{-- <span class="icon italic icon-italic done-new-user">пользователь добавлен!</span> --}}
                                    </div>
                                </div>
                            </form>
                            {{-- Конец формы --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection