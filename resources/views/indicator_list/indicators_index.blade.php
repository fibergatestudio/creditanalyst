@extends('layouts.mercurial')

@section('content')

              
{{-- 
  Ссылки:
  КНОПКА ПРОСМОТР ДАННЫХ В ПОКАЗАТЕЛЕ
  url('/dataset_view_indicator/'.$indicator->id)

  КНОПКА ДОБАВИТЬ ПОКАЗАТЕЛЬ В МОНИТОРИНГ
  {{ url("/add_indicator_to_watch_list/")."/".$indicator->id }}

--}}
{{-- Выше - было --}}

{{-- Ниже - стало --}}
<?php
App::setLocale(Auth::user()->preferred_language);
?>

<section id="page-source-name" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">{{ $infosource->name }}</h2>
            {{-- Logout --}}
            <a href="{{ url('user_logout') }}" class="exit">@lang('indicators_index.Выйти')</a>
        </div>
        <div class="card card-fluid">
            <div class="card-body">
                <div class="title-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('sources_list') }}">@lang('indicators_index.Источники данных')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $infosource->name }}</li>
                        </ol>
                    </nav>
                    <a href="{{ url('sources_list') }}" class="text button-back">@lang('indicators_index.Назад')</a>
                </div>
                <div class="content-row">
                    <a href="#" class="btn btn-outline-secondary">@lang('indicators_index.Добавить все показатели в мониторинг')</a>
                    <a href="#" class="btn btn-outline-secondary">@lang('indicators_index.Удалить все показатели из мониторинга')</a>
                    <a href="#link-on-export-page" class="btn btn-success" >
                        @lang('indicators_index.Экспорт всех данных в Excel')
                    </a>
                    {{-- Верхняя пагинация --}}
                    {{ $indicators->links() }}

                    {{-- Конец верхней пагинации --}}
                </div>
                <table class="table table-striped">
                    <thead></thead>
                    <tbody>
                      @foreach($indicators as $indicator)
                        <tr>
                            <td>{{ $indicator->name }}</td>
                            <td>
                                <div class="actions">
                                    <a href=" {{ url("/add_indicator_to_watch_list/")."/".$indicator->id }}">
                                        <span class="icon icon-added-monitoring" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content=@lang('indicators_index.Добавить показатель в мониторинг')></span>
                                    </a>
                                    <a href="{{ url("admin/statistics-analysis/charts?indicator_id=" .$indicator->id. "&from=2019-01-01&to=2019-12-31") }}" class="icon icon-stat"></a>
                                    <a href="#" class="icon icon-open"  data-toggle="modal" data-target="#exampleModal2"> </a>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                <div class="content-row">
                    <a href="#" class="btn btn-outline-secondary">@lang('indicators_index.Добавить все показатели в мониторинг')</a>
                    <a href="#" class="btn btn-outline-secondary">@lang('indicators_index.Удалить все показатели из мониторинга')</a>
                    <a href="#link-on-export-page" class="btn btn-success">@lang('indicators_index.Экспорт всех данных в Excel')</a>
                    {{-- Нижняя пагинация --}}

                        {{ $indicators->links() }}

                    {{-- Конец нижней пагинации --}}
                </div>
            </div>
        </div>

        {{-- Модальное окно : Общий экспорт в эксель --}}
        <div class="modal modal-export fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>@lang('indicators_index.Экспорт в Excel')</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="icon icon-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label for="exampleCheck2"></label>
                                        </div>
                                    </td>
                                    <td>@lang('indicators_index.Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов')</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                            <label for="exampleCheck3"></label>
                                        </div>
                                    </td>
                                    <td>@lang('indicators_index.Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов')</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                            <label for="exampleCheck4"></label>
                                        </div>
                                    </td>
                                    <td>@lang('indicators_index.Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов')</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                            <label for="exampleCheck5"></label>
                                        </div>
                                    </td>
                                    <td>@lang('indicators_index.Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов')</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck7">
                                            <label for="exampleCheck7"></label>
                                        </div>
                                    </td>
                                    <td>@lang('indicators_index.Показатель 1, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов')</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                            <label for="exampleCheck6"></label>
                                        </div>
                                    </td>
                                    <td>@lang('indicators_index.Показатель 6, Рыбным текстом называется текст, служащий для временного наполнения макета в публикациях или производстве веб-сайтов,
                                        пока финальный текст еще не создан. Рыбный текст также известен как текст-заполнитель или же текст-наполнитель. Иногда текст-«рыба»
                                        также используется композиторами при написании музыки.')</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">@lang('indicators_index.Экспорт в Excel')</button>
                            {{-- Пагинация --}}
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link not-active" href="#"><i class="fas fa-chevron-left"></i></a></li>
                                <li class="page-item active"><a class="page-link " href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                            {{-- Конец пагинации --}}
                        </div>
                    </div>
                </div>
            </form>

        </div>
        {{-- Конец модального окна --}}

        {{-- Модальное окно : Показатель --}}
        <div class="modal modal-more fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="icon icon-close"></span>
                        </button>
                    </div>
                    <div class="text-align-left modal-body">
                        <span class="text text-bold">@lang('indicators_index.Название Показателя')</span>
                        <span class="modal-size-small">
                    Lorem ipsum dolor sit amet. Duo duis ipsum diam. Te erat clita et eos est hendrerit amet.
                    Ipsum soluta nonummy eros consequat. Iriure in eirmod consequat sit rebum consequat.
                    Ullamcorper dolores dolor augue wisi ea et duis. Assum nobis et in stet takimata dolores quis.
                    Takimata no sed amet
                </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">@lang('indicators_index.В мониторинг')</button>
                        <button type="button" class="btn btn-success ">@lang('indicators_index.Экспорт в Excel')</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Конец модального окна --}}

    </section>

@endsection