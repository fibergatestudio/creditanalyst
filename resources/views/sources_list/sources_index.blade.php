<?php
App::setLocale(Auth::user()->preferred_language);
?>
@extends('layouts.mercurial')

@section('content')
{{-- 
          <div class="accordion" id="sources_accordion">
            
            @foreach($infosources as $infosource)
                <div class="card">
                  <div class="card-header" id="heading{{ $infosource->id }}">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $infosource->id }}" aria-expanded="true" aria-controls="collapse{{ $infosource->id }}">

                        <!-- Название -->
                        {{ $infosource->localized_name() }} 
                      </button>
                    </h5>
                  </div><!-- / card-header -->

                  <div id="collapse{{ $infosource->id }}" class="collapse" aria-labelledby="heading{{ $infosource->id }}" data-parent="#sources_accordion">
                    <div class="card-body">
                      @lang('sources-index.Описание'): {{ $infosource->localized_description() }}<br>
                      @lang('sources-index.Поставщик'): {{ $infosource->localized_procurer() }}<br>
                      @lang('sources-index.Макс. частота данных'): {{ $infosource->frequency_unit_name }}<br>
                      @lang('sources-index.Макс. география данных'): {{ $infosource->geography_unit_name }}<br>
                      
                      <!-- Кнопка "список показателей" -->
                      <a href="{{ url('indicator_list/'.$infosource->id) }}">
                        <div class="btn btn-success">
                          @lang('sources-index.Список показателей')
                        </div>
                      </a>
                    </div><!-- / card body -->
                  </div><!-- / collapse -->
                </div><!-- / card -->
              @endforeach
            </div><!-- / accordion -->
            --}}
{{-- ВЫШЕ - БЫЛО --}}
<?php
App::setLocale(Auth::user()->preferred_language);
?>

<section id="data-sources" class="section-content">
        <div class="content-title">
            <h2 class="name-menu">@lang('sources-index.Источники данных')</h2>
            <a href="{{ url('user_logout') }}" class="exit">@lang('sources-index.Выйти')</a>
        </div>
        <div class="content-grid">
            <div class="card card-fluid">
                <div class="card-body">
                    <h3 class="title-block">@lang('sources-index.Источники данных')</h3>
                    <div id="accordion">
                      @foreach($infosources as $infosource)
                        <div class="card card-fluid">
                            <div class="card-header-accordion" id="headingOne">
                                <div class="content-row">
                                  <!-- Выбор языка -->
                                    <!-- <img src="{{asset('mercurial/images/icon-logo-data-sources.png')}}" alt=""> -->
                                    <h3 class="text">{{ $infosource->localized_name }}</h3> 
                                </div>
                                    <button class="btn btn-link caret" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fas fa-angle-up"></i>
                                    </button>
                            </div>

                            <div class="row">
                                <div id="collapseOne" class="collapse show col-md-6" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-md-4">@lang('sources-index.Описание'):</dt>
                                            <dd class="col-md-8">{{ $infosource->localized_description }}. </dd>
                                            <dt class="col-md-4">@lang('sources-index.Источник / поставщик'):</dt>
                                            <dd class="col-md-8">{{ $infosource->localized_procurer }}</dd>
                                            <dt class="col-md-4">@lang('sources-index.Частота данных'):</dt>
                                            <dd class="col-md-8">{{ $infosource->frequency_unit_name }}</dd>
                                            <dt class="col-md-4">@lang('sources-index.География данных'):</dt>
                                            <dd class="col-md-8">{{ $infosource->geography_unit_name }}</dd>
                                        </dl>
                                        <a href="{{ url('indicator_list/'.$infosource->id) }}">
                                          <button class="btn btn-success">@lang('sources-index.Список показателей')</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>{{-- /card card fluid --}}
                      @endforeach 
                        
                        
                    </div>{{-- /accordion--}}
                </div>
                {{-- Пагинация --}}

                    {{ $infosources->links() }}
                
                {{-- Конец пагинации --}}
            </div>
        </div>


@endsection