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
    <form action="" method="post" class="form-horizontal">
        <div class="row form-group">
            <div class="col col-md-12">
                <div class="input-group">
                    <input type="text" id="searchIndicator" name="searchIndicator" placeholder="Введите поисковый запрос" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn">
                            <i class="fa fa-search"></i> 
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">Добавить индикатор</button>
                    </div>                    
                </div>
            </div>
        </div>
    </form>
</div>

<hr>

<div class="card-body card-block">
    <form action="" method="post" class="form-horizontal">
        <div class="row form-group">
            <div class="col-12 col-md-9">
                <h5>Период:</h5>
                <h5>от</h5>
                <select name="fromMonth" id="fromMonth" class="form-control-sm form-control">
                    <option value="0">месяц</option>
                    <option value="1">Option #1</option>
                </select>
                <select name="fromYear" id="fromYear" class="form-control-sm form-control">
                    <option value="0">год</option>
                    <option value="1">Option #1</option>
                </select>
                <h5>до</h5>
                <select name="untilMonth" id="untilMonth" class="form-control-sm form-control">
                    <option value="0">месяц</option>
                    <option value="1">Option #1</option>
                </select>
                <select name="untilYear" id="untilYear" class="form-control-sm form-control">
                    <option value="0">год</option>
                    <option value="1">Option #1</option>
                </select>
            </div>
        </div>
    </form>
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
    <form action="" method="post" class="form-horizontal">
        <div class="row form-group">
            <div class="col col-md-12">
                <div class="input-group">
                    <h5>Название графика</h5>
                    <input type="text" id="chartName" name="chartName" placeholder="График 1" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-success btn-sm">Сохранить</button>
                        <button class="btn btn-danger btn-sm">Экспортировать</button>
                        <button class="btn btn-success btn-sm">Экспорт в Word</button>
                    </div>                    
                </div>
            </div>
        </div>
    </form>
</div>

@endsection