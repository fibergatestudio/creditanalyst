@extends('layouts.mercurial')

@section('content')
<section id="page-list-users" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">Администрирование</h2>
            <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
        </div>


        <div class="card card-fluid">
            <div class="card-body">
                <h3 class="title-block">Кабинет администратора</h3>
                <div class="content-title">
                    <span>Список пользователей</span>
                    <a href="{{ url('/admin_user_management/create_user') }}" class="done-new-user"><i class="fas fa-plus"></i> Добавить нового пользователя</a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>E-mail:</th>
                            <th>Имя:</th>
                            <th>Фамилия:</th>
                            <th>Статус:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                {{-- E-mail --}}
                                <td>{{ $user->email }}</td>
                                
                                {{-- Имя --}}
                                <td>{{ $user->first_name }}</td>

                                {{-- Фамилия --}}
                                <td>{{ $user->last_name }}</td>
                                
                                {{-- Статус --}}
                                <td>
                                    {{ $user->getStatus() }}
                                </td>
                                
                                {{-- Колонка с кнопками управления --}}
                                <td>
                                    <div class="actions">
                                        <a href="#">
                                            <span class="icon icon-edit" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Редактировать"></span>
                                        </a>

                                        {{-- Сброс пароля -- TBD --}}
                                        {{-- 
                                        <a href="#">
                                            <span class="icon icon-change-password" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сброс пароля"></span>
                                        </a>
                                        --}}
                                        
                                        {{-- Деактивировать / Активировать --}}
                                        @if($user->isActive())
                                            {{-- Деактивировать --}}
                                            <a href="{{ url('/admin_user_management/suspend_user/'.$user->id) }}">
                                                <span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Деактивировать"></span>
                                            </a>
                                        @else
                                            {{-- Активировать --}}
                                            <a href="{{ url('/admin_user_management/activate_user/'.$user->id) }}">
                                                <span class="icon icon-delete" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Активировать"></span>
                                            </a>
                                        @endif

                                        {{-- Сделать админом / забрать права администратора --}}
                                        @if(!$user->isAdmin())
                                            {{-- Сделать админом --}}
                                            <a href="{{ url('/admin_user_management/grant_admin_privileges/'.$user->id) }}" class="active">
                                                <span class="icon icon-admin" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Сделать администратором"></span>
                                            </a>
                                        @else
                                            {{-- Забрать права администратора --}}
                                            <a href="{{ url('/admin_user_management/remove_admin_privileges/'.$user->id)}}" class="active">
                                                <span class="icon icon-admin" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Забрать права администратора"></span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            
            {{-- Начало пагинации --}}
                {{ $users->links() }}
            {{-- Конец пагинации --}}

        </div>
    </section>
@endsection