@extends('layouts.mercurial')

@section('content')
<section id="newusers" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">@lang('user_management.Новый пользователь')</h2>
            <a href="{{ url('user_logout') }}" class="exit">@lang('user_management.Выйти')</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="title-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin_user_management/index') }}">@lang('user_management.Кабинет администратора')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('user_management.Редактировать пользователя')</li>
                            </ol>
                        </nav>
                        <a href="{{ url('/admin_user_management/index') }}" class="text button-back">@lang('user_management.Назад')</a></div>
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Форма редактирования пользователя --}}
                            <form class="card-form" method="POST" action="{{ url('admin_user_management/edit_user') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="form-group row">
                                    <label class="col-md-12">E-mail:</label>
                                    <div class="input-group">
                                        <input name="email" type="email" class="form-control col-md-12"  placeholder="" value="{{ $user->email }}" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">@lang('user_management.Имя:')</label>
                                    <input name="first_name" type="text" class="form-control col-md-12"  placeholder="" value="{{ $user->first_name }}" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">@lang('user_management.Фамилия:')</label>
                                    <input name="last_name" type="text" class="form-control col-md-12" value="{{ $user->last_name }}" placeholder=""  required>
                                </div>
                                <div class="from-group row">
                                    <div class="block-new-user">
                                        <button class="btn btn-success" type="submit">@lang('user_management.Сохранить')</button>
                                        {{-- <span class="icon italic icon-italic done-new-user">@lang('user_management.пользователь добавлен!')</span> --}}
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