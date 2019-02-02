@extends('layouts.mercurial')

@section('content')
<section id="newusers" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Новый пользователь</h2>
            <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="title-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin_user_management/index') }}">Кабинет администратора</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Новый пользователь</li>
                            </ol>
                        </nav>
                        @role('app-admin')
                        <a href="{{ url('/admin_user_management/show_room/'.$room_id) }}" class="text button-back">Назад</a>
                        @endrole
                        @role('admin')
                        <a href="{{ url('/admin_user_management/index') }}" class="text button-back">Назад</a>
                        @endrole
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Форма добавления пользователя --}}
                            <form class="card-form" method="POST" action="{{ url('admin_user_management/create_user/'.$room_id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-12">E-mail:</label>
                                    <div class="input-group">
                                        <input name="login" type="text" class="form-control col-md-6"  placeholder="" required>
                                        <input name="email" type="text" class="form-control col-md-6"  placeholder="" required value="{{ $domain }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Пароль:</label>
                                    <div class="input-group">
                                        <input name="password" type="password" class="form-control col-md-12"  placeholder="" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Имя:</label>
                                    <input name="first_name" type="text" class="form-control col-md-12"  placeholder=""  required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Фамилия:</label>
                                    <input name="last_name" type="text" class="form-control col-md-12"  placeholder=""  required>
                                </div>
                                <div class="from-group row">
                                    <div class="block-new-user">
                                        <button class="btn btn-success" type="submit">Добавить</button>
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