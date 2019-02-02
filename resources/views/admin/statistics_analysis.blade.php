@extends('layouts.admin')

@section('content')

    <?php
    App::setLocale(Auth::user()->preferred_language);
    ?>

<style type="text/css">
i.fa.fa-window-close-o, i.fa.fa-caret-square-o-right{
    cursor: pointer;
}
</style>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <h1>{{ $title }}</h1>
            <table class="table" id="chartsGroup">
                @if(isset($files_charts))
                @for($i=0; $i < count($files_charts); $i++)
                <tr>
                    <td class="chart-name">{{ $files_charts[$i] }}</td>
                    <td><i onclick="watchChart(this)" data-id="{{ $i }}" class="fa fa-caret-square-o-right" title="Посмотреть"></i></td>
                    <td onclick="removeChart(this)" data-id="{{ $i }}"><i class="fa fa-window-close-o" title="Удалить"></i></td>
                </tr>
                @endfor
                @endif
            </table>
        </div>
    </div>
</section>

@endsection

<script type="text/javascript">
    var indicatorIdGet = '<?=(isset($_GET['indicator_id']))?$_GET['indicator_id'] : 0 ?>';
    var fromGet = '<?=(isset($_GET['from']))?$_GET['from'] : "2017-01-01" ?>';
    var toGet = '<?=(isset($_GET['to']))?$_GET['to'] : "2018-01-01" ?>';
</script>

<script type="text/javascript">
    var filesCharts = '<?=json_encode($files_charts,JSON_UNESCAPED_UNICODE) ?>';
    filesCharts = JSON.parse(filesCharts);
    var filesChartsFull = '<?=json_encode($files_charts_full,JSON_UNESCAPED_UNICODE) ?>';
    filesChartsFull = JSON.parse(filesChartsFull);
    var months = '<?=json_encode($months,JSON_UNESCAPED_UNICODE) ?>';
    var indicatorsName = '<?=$indicators_name ?>';
    var indicators = '<?=json_encode($indicators_obj,JSON_UNESCAPED_UNICODE) ?>';
    var data = '<?=json_encode($data_obj,JSON_UNESCAPED_UNICODE) ?>';
    var chartLink = "{{ asset('charts') }}";
    var rootSite = '<?=URL::to('/')?>';
</script>
