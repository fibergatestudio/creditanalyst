@extends('layouts.mercurial')

@section('content')
<section id="newusers" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Новый Кабинет</h2>
            <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="title-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin_user_management/index') }}">Кабинет администратора</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Новый Кабинет</li>
                            </ol>
                        </nav>
                        <a href="{{ url('/admin_user_management/index') }}" class="text button-back">Назад</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Форма добавления кабинета --}}
                            <form class="card-form" method="POST" action="{{ url('admin_user_management/create_room') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-12">Название:</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control col-md-12"  placeholder="" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Домен:</label>
                                    <div class="input-group">
                                        <input name="domain" type="text" class="form-control col-md-12"  placeholder="" required>
                                        
                                    </div>
                                </div>
                                <div class="from-group row">
                                    <div class="block-new-user">
                                        <button class="btn btn-success" type="submit">Добавить</button>
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