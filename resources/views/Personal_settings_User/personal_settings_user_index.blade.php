@extends('layouts.mercurial')

@section('content')
<section id="newusers" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Настройки</h2>
            <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="title-block">
                        <nav aria-label="breadcrumb">
                            {{-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/settings/edit') }}">Кабинет администратора</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Редактировать пользователя</li>
                            </ol> --}}
                            Настройки
                        </nav>
                        <a href="{{ url('/sources_list') }}" class="text button-back">Назад</a></div>
                        
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Форма редактирования пользователя --}}
                            <form class="card-form" method="POST" action="{{ url('settings/edit') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="form-group row">
                                    <label class="col-md-12">E-mail:</label>
                                    <div class="input-group">
                                        <input name="email" type="email" class="form-control col-md-12"  placeholder="" value="{{ $user->email }}" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Имя:</label>
                                    <input name="first_name" type="text" class="form-control col-md-12"  placeholder="" value="{{ $user->first_name }}" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Фамилия:</label>
                                    <input name="last_name" type="text" class="form-control col-md-12" value="{{ $user->last_name }}" placeholder=""  required>
                                </div>
                                <div class="from-group row">
                                    <div class="block-new-user">
                                        <button class="btn btn-success" type="submit">Сохранить</button>
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