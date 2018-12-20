@extends('layouts.mercurial')

@section('content')

    @if($indicator_watchlist_data->count() == 0)
        <section id="page-monitoring" class="section-content">
            <div class="content-title">
                <h2 class="name-menu">Мониторинг</h2>
                <a href="#" class="exit">Выйти</a>
            </div>
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">Мониторинг</h3>
                    <section class="monitoring-content row">
                        <div class="text-page-monitoring col-md-12">
                            <p>Ни  один  показатель не  был  добавлен, <a href="{{ url('sources_list') }}" class="">добавьте</a>  данные!</p>
                            <a href="{{ url('indicator_search') }}">
                                <button class="btn btn-success" type="submit">
                                    Поиск данных
                                </button>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    @else 
        <section id="page-monitoring" class="section-content">
            <div class="content-title">
                <h2 class="name-menu">Мониторинг</h2>
                <a href="{{ url('user_logout') }}" class="exit">Выйти</a>
            </div>
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">Мониторинг</h3>
                    <table class="table">
                    @foreach($indicator_watchlist_data as $data_entry)
                        <tr>
                            <td>{{ $data_entry->name }}</td>
                            
                            {{-- Кнопка удалить показатель из мониторинга --}}
                            <td>
                                <a href="{{ url("/remove_indicator_from_watchlist")."/".$data_entry->indicator_id }}">
                                    <div class="btn btn-danger">
                                        Удалить из списка
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </section>


      

    @endif
        
    

    
@endsection