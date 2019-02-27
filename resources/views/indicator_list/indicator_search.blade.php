<?php
App::setLocale(Auth::user()->preferred_language);
?>
@extends('layouts.mercurial')

@section('content')


{{-- 
    Ссылки:
    Просмотр
    url('/dataset_view_indicator'.'/'.$result->id)
    Добавить в мониторинг
    url('/add_indicator_to_watch_list'.'/'.$result->id)

--}}

{{-- Выше - было --}}

{{-- Ниже - стало --}}

                <section id="page-search-results" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">@lang('indicator_search.Поиск данных')</h2>
            <a href="{{ url('user_logout') }}" class="exit">@lang('indicator_search.Выйти')</a>
        </div>
        <div class="card card-fluid">
            <div class="card-body">
                {{-- Хлебные крошки --}}
                <div class="title-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if(isset($_POST['search_query']) && !empty($_POST['search_query']))
                                <li class="breadcrumb-item"><a href="{{ url('indicator_search_post') }}">@lang('indicator_search.Введите поисковый запрос')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('indicator_search.Результат поиска')</li>
                            @else
                                <li class="breadcrumb-item"><a href="#">@lang('indicator_search.Введите поисковый запрос')</a></li>
                            @endif
                            
                        </ol>
                    </nav>
                </div>
                {{-- Конец хлебных крошек --}}

                <section class="search-content row justify-content-center">
                    <div class="col-sm-8 align-self-center">
                        <div class="input-group">
                            {{-- Форма поиска --}}
                            <form class="form-inline" method="POST" action="{{ url('indicator_search_post') }} ">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control typeahead input-lg" placeholder="@lang('indicator_search.Введите поисковый запрос')" name="search_query" style="width: 500px">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit"><span class="icon icon-search"></span></button>
                                    </div>
                                </div>

                            </form>

                            {{-- Конец формы --}}

                        </div>
                    </div>
                    <div class="w-100 search-delimeter row"></div>
                    {{-- Результаты поиска  --}}
                    <div class="mb-3 col-md-8">
                        <ul class="list-results">
                        
                            @foreach($results as $result)
                                <li>
                                    <div class="result-item">                                        
                                        <span class="search-word">{{ $results_meta[$result->id]['infosource_name'] }}</span>,&nbsp;<a href="{{ url ('/sources_list') }}">@lang('indicator_search.подробнее')</a>
                                    </div>
                                    <div class="result-item">
                                        <span class="search-details">{{ $result->name }}</span> <a href="{{ url ('/sources_list') }}"> @lang('indicator_search.подробнее')</a>
                                    </div>
                                </li>
                                {{--Сколько показателей показывать на странице--}}
                                @if ($loop->iteration == $need_number) 
                                    @break
                                @endif
                            @endforeach

                        </ul>
                        
                        @if( count($results) == 0 && empty($_POST['search_query']))
                            @lang('indicator_search.Пожалуйста, введите поисковый запрос.')
                        @endif

                        @if( count($results) == 0 && !empty($_POST['search_query']))
                            @lang('indicator_search.По вашему запросу, к сожалению, ничего не найдено') 
                        <div class="content-row results-bottom col-md-12">    
                            <div class="content-row col-md-6">
                                <a href="#" class="not-result"  data-toggle="modal" data-target="#notFoundModal2">
                                    Не нашли то, что искали? 
                                </a>
                            </div>
                        </div>
                        @elseif (count($results) < $need_number && !empty($_POST['search_query']))
                        <div class="content-row results-bottom col-md-12">
                            <div class="content-row col-md-6">
                                    <a href="{{url('/sources_list')}}" class="not-result">
                                        Не нашли то, что искали? 
                                    </a>
                            </div>
                        </div>
                        @endif
                    </div>    
                        
                    

                    {{-- Конец результатов поиска --}}

                    {{-- Добавить заход денег : Форма и модальное окно --}}
                    <form action="{{ url('/indicator_search/send_message') }}" method="POST">
                        @csrf
                        
                        <div class="modal fade" id="notFoundModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input  type="hidden" name="name" value="{{ Auth::user()->name }}">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" rows="3" placeholder="" require>Привет! Поиск "{{$search_query}}" не дал результатов!</textarea>
                                        </div>
                                        <div class="form-group form-radio">
                                            <input class="form-check-input" type="radio" name="email" id="exampleRadios1" value="Анонимно" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Отправить анонимно
                                            </label>
                                        </div>
                                        <div class="form-group form-radio">
                                            <input class="form-check-input" type="radio" name="email" id="exampleRadios2" value="{{ Auth::user()->email }}">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Со мной можно связаться для уточнения*
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                    <p>*Будет использован текущий email</p>
                                    </div>
                                    <div style="justify-content:left;" class="modal-footer">
                                        <button type="submit" class="btn btn-success">Отправить</button>
                                    </div>

                                    <a href="#" class="all-results">{{-- Отобразить все результаты --}}</a>
                                </div>{{-- /modal-content --}}
                            </div>{{-- /modal-dialog --}}
                        </div>{{-- /modal fade --}}
                    </form>

                    <div class="w-100 search-delimeter row"></div>

                        {{-- Отобразить все результаты --}}
                        <div class="content-row results-bottom col-md-12">
                            @if (count($results) >= $need_number)
                            <div class="input-group">
                            {{-- Форма поиска --}}
                            <form class="form-inline" method="POST" action="{{ url('indicator_search_all') }} ">
                                @csrf
                                <div class="input-group">
                                    <input type="hidden" class="form-control typeahead input-lg" value="{{$search_query}}" name="search_query" style="width: 500px">
                                    <div class="input-group-append">
                                        <button class="btn btn-link" type="submit">Отобразить все результаты</button>
                                    </div>
                                </div>

                            </form>

                            {{-- Конец формы --}}

                        </div>
                            
                            @endif
                        </div>
                        <!-- <div class="content-row results-bottom col-md-12">
                            {{-- Не нашли что искали с модальным окном  --}}  
                            <div class="content-row col-md-6">
                                

                                    {{-- Модальное окно : не нашли --}}
                                    <div class="modal modal-search fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="icon icon-close"></span>
                                                    </button>
                                                </div>
                                                <div class="text-align-left modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1"></label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Привет! Поиск {{$search_query}} не дал результатов!"></textarea>
                                                        </div>
                                                    </form>
                                                    <div class="form-group form-radio">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Отправить анонимно
                                                        </label>
                                                    </div>
                                                    <div class="form-group form-radio">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Со мной можно связаться для уточнения
                                                        </label>
                                                    </div>
                                                </form>
                                                <div class="form-group form-radio">
                                                    <input class="form-check-input" type="radio" name="email" id="exampleRadios1" value="anon" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Отправить анонимно
                                                    </label>
                                                </div>
                                                <div class="form-group form-radio">
                                                    <input class="form-check-input" type="radio" name="email" id="exampleRadios2" value="nonanon">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Со мной можно связаться для уточнения
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" data-dismiss="modal">Отправить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- /modal --}}
                            </form>
                                {{-- Конец модального окна --}}

                            <a href="#" class="all-results">{{-- Отобразить все результаты --}}</a>
                        </div> -->

                            </div>
                    
                    
                    
                            {{--    <a href="#" class="all-results">Отобразить все результаты</a>
                        
                            <ul class="pagination col-md-2">
                                <li class="page-item"><a class="page-link not-active" href="#"><i class="fas fa-chevron-left"></i></a></li>
                                <li class="page-item active"><a class="page-link " href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                            </ul> --}}
                        
                    </div>
                
                </section>
            </div>
        </div>
      
    </section>
    
    @endsection


@section('scripts')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    {{-- Typeahead JS --}}
    <script src="{{ url('assets/typeahead.bundle.js') }}"></script>

    <script>
        var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
            if (substrRegex.test(str)) {
                matches.push(str);
            }
            });

            cb(matches);
        };
        };

        // Сделать прогрузку по API

        var hints = [];
        $( document ).ready(function() {

            $.getJSON("{{ url('ajax/indicator_hints') }}", function(data){
                for (var i = 0, len = data.length; i < len; i++) {
                    //console.log(data[i]);
                    hints.push(data[i]);
                }
            });

        });



        //var states = ['Объёмы производства картошки в Украине'];

        $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'hints',
            source: substringMatcher(hints)
        });
    </script>

    <style>
        .tt-menu{
            background-color: white;
            border: 1px solid grey;
        }
    </style>
@endsection
