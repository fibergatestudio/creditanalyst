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
                            <form class="form-inline" method="POST" action="{{ url('indicator_search_post') }}" >
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control typeahead input-lg" placeholder="{{$search_query}}" name="search_query" style="width: 500px">
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
                                        <span class="search-word">{{ $results_meta[$result->id]['infosource_name'] }}</span>,&nbsp;<a href="#">@lang('indicator_search.подробнее')</a>
                                    </div>
                                    <div class="result-item">
                                        <span class="search-details">{{ $result->name }}</span> <a href="#"> @lang('indicator_search.подробнее')</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                        
                        
                    </div>    
                        
                    

                    {{-- Конец результатов поиска --}}
                    <div class="w-100 search-delimeter row"></div>

                    {{--Возврат на страницу поиска--}}
                    <a href="{{ url('indicator_search') }}" class="btn btn-primary">Вернуться</a>         
                    
                        
                    
                  
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



