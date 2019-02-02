<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/vector-map/jqvmap.min.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>    


</head>
<body>

    <style type="text/css">
    /* Карта */
    .card.map{
        width: 1263px;
        height: 700px;
    }
    #saveChartMap > svg{
        height: 650px;
    }
    .map, .vmap {
        width: 100%;
        height: 650px;
    }  
    .map-content{
        margin-left: 100px;
        margin-top: 100px;
        color: #A62A00;
    }
    .marker-map{
        margin-top: -15px;
    }
    
    /* Индикаторы на карте */
    #save-marker-labels div{
        display: inline-block;
    }
    #save-marker-labels div:nth-child(2n){
        vertical-align: top;
    }
    .marker-color{
        width: 30px;
        height: 15px;
        margin: 5px;
    }
    .marker-color-one{
    width: 1100px;
    height: 25px;
    margin: 5px;
    }
    .marker-color-one div{
    width: 15px;
    height: 15px;
    margin-top: 5px;
    margin-bottom: 5px;
    }
    .marker-color-one div:last-child{
    margin-top: 0;
    width: 700px;
    margin-left: 5px;
    }
    #m-color-1{
        background: #FF0000;
    }
    #m-color-2{
        background: #A62A00;
    }
    #m-color-3{
        background: #008110;
    }
    #m-color-4{
        background: #CCC;
    }
</style>


<div class="card-body card-block">
    <div class="row">
        <div class="col col-md-12">
            <div class="card map">
                <div class="card-header">
                    <h4>@lang('map_for_save.Украина')</h4>
                </div>
                <div class="Vector-map-js">
                    <div id="save-marker-labels">
                        @if(!isset($_GET['indicator']))
                        @if(isset($name_indicator_arr))
                        @for($i=0; $i < count($name_indicator_arr); $i++)
                        <div class="marker-color" id="m-color-{{$i+1}}"></div><div>{{$name_indicator_arr[$i]}}</div>
                        @endfor
                        @endif
                        @else
                        {!! $colors_arr !!}
                        @endif
                    </div>
                    <div id="saveChartMap" class="vmap"></div>
                </div>
            </div>                                      
        </div>
    </div>
</div>

<script type="text/javascript">
    var indicatorIdGet = '<?=(isset($_GET['indicator_id']))?$_GET['indicator_id'] : 0 ?>';
    var fromGet = '<?=(isset($_GET['from']))?$_GET['from'] : "2017-01-01" ?>';
    var toGet = '<?=(isset($_GET['to']))?$_GET['to'] : "2018-01-01" ?>';
    var indicatorsObjName = '<?=$indicators_obj_name ?>';
    indicatorsObjName = JSON.parse(indicatorsObjName);
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
    var datasetsObjNew = '<?=json_encode($datasets_obj,JSON_UNESCAPED_UNICODE) ?>';
    datasetsObjNew = JSON.parse(datasetsObjNew);
    var fileExport = '<?=(isset($_GET['fileExport']))?$_GET['fileExport'] : 0 ?>';
    var fileExportToWord = '<?=(isset($_GET['fileExportToWord']))?$_GET['fileExportToWord'] : 0 ?>';
</script>

<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>      
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<!--  Data table -->
<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>

<!--  Chart js -->
<script src="{{ asset('assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
<script src="{{ asset('js/line-charts.js') }}"></script>

<!-- Vector-map--> 
<script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.ukraine.js') }}"></script>
<script src="{{ asset('js/map-charts-1.js') }}"></script>
<script src="{{ asset('js/map-charts-2.js') }}"></script>
<script src="{{ asset('js/map-charts-4.js') }}"></script>

<script type="text/javascript">
    if(fullMap){
        $(document).ready(function(){

            $.ajax({
                url: "{{ route('chartsMapSave') }}",
                type: "POST",
                data: {fileName:fileName, getString:getString, fileExport:fileExport, fileExportToWord:fileExportToWord},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.indexOf('http') == -1) {
                        alert(data);
                        document.location.href = rootSite+"/admin/statistics-analysis";
                    }
                    else if(data.indexOf('fileExport') + 1 > 0){
                        alert('Файл сохранен в '+ data);
                            var link = document.createElement('a');
                            link.setAttribute('href',data);
                            link.setAttribute('download',fileName +'.png');
                            $('#saveChartMap').after(link);
                            link.click();
                            document.location.href = rootSite+"/admin/statistics-analysis";
                    }
                    else if(data.indexOf('fileWord') + 1 > 0){
                        alert('Файл сохранен в '+ data);
                            var link = document.createElement('a');
                            link.setAttribute('href',data);
                            link.setAttribute('download',fileName +'.docx');
                            $('#saveChartMap').after(link);
                            link.click();
                            document.location.href = rootSite+"/admin/statistics-analysis";
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                    $('.chart-save').prop( "disabled" , false );
                }
            }); 
        });
    }
</script>


</body>
</html>

