@extends('layouts.admin')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Charts</a></li>
                    <li class="active">Chartjs</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <table class="table" id="indicatorGroup"></table>                                       
        </div>
    </div>
</div>

@if(isset($indicators_obj))
@foreach($indicators_obj as $k=>$indicator)


@endforeach
@endif

<style type="text/css">
#searchIndicator, #resultIndicator{
    width: 500px;
}
#resultIndicator{
    background: #fff;
}
#resultIndicator > li{
    list-style-type: none;
}
#resultIndicator > li:hover{
    background: #87CEEB;
    cursor: pointer;
}
i.fa.fa-window-close-o{
    cursor: pointer;
}    
</style>

<div class="card-body card-block">
    <div class="row">
        <div class="col-12 col-md-9">
            <input type="text" placeholder="Введите поисковый запрос" id="searchIndicator" name="searchIndicator">
            <i class="fa fa-search"></i> 
            <button id="addIndicator" class="btn btn-success btn-sm">Добавить индикатор</button>
        </div>       
    </div>
    <ul id="resultIndicator"></ul>
</div>

<hr>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col-12 col-md-9">
            <h5>Период:</h5>
            <h5>от</h5>
            <select name="fromMonth" id="fromMonth" class="form-control-sm form-control">
                @if(isset($months))
                @for($i=0; $i < count($months); $i++)
                <option value="{{$i}}">{{ $months[$i] }}</option>
                @endfor
                @endif
            </select>
            <select name="fromYear" id="fromYear" class="form-control-sm form-control">
                @if(isset($years))
                @for($i=0; $i < count($years); $i++)
                <option value="{{$years[$i]}}">{{ $years[$i] }}</option>
                @endfor
                @endif
            </select>
            <h5>до</h5>
            <select name="untilMonth" id="untilMonth" class="form-control-sm form-control">
                @if(isset($months))
                @for($i=0; $i < count($months); $i++)
                <option value="{{$i}}">{{ $months[$i] }}</option>
                @endfor
                @endif
            </select>
            <select name="untilYear" id="untilYear" class="form-control-sm form-control">
                @if(isset($years))
                @for($i=0; $i < count($years); $i++)
                <option value="{{$years[$i]}}">{{ $years[$i] }}</option>
                @endfor
                @endif
            </select>
            <button id="makeChart" class="btn btn-primary btn-sm">Построить график</button>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">myChart </h4>
                        <canvas id="myChart" width="1200" height="300"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->

        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <div class="input-group">
                <h5>Название графика</h5>
                <input type="text" id="chartName" name="chartName" placeholder="График 1" class="form-control">
                <div class="input-group-btn">
                    <button id="saveChart" class="btn btn-success btn-sm">Сохранить</button>
                    <button class="btn btn-danger btn-sm">Экспортировать</button>
                    <button class="btn btn-success btn-sm">Экспорт в Word</button>
                </div>                    
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var indicatorsName = '<?=$indicators_name ?>';
    var indicators = '<?=json_encode($indicators_obj,JSON_UNESCAPED_UNICODE) ?>';
    var data = '<?=json_encode($data_obj,JSON_UNESCAPED_UNICODE) ?>';
</script>

@endsection