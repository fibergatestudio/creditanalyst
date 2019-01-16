<?php
App::setLocale(Auth::user()->preferred_language);
?>

@extends('layouts.admin')

@section('content')

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
i.fa.fa-window-close-o, i.fa.fa-wrench{
    cursor: pointer;
}    
</style>

<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-12">
            <table class="table" id="indicatorGroup"></table>                                       
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-9">
            @lang('charts.Для теста представлены все показатели, кроме бананов')
            <hr>
            <input type="text" placeholder=@lang('charts.Введите поисковый запрос') id="searchIndicator" name="searchIndicator">
            <i class="fa fa-search"></i> 
            <button id="addIndicator" class="btn btn-success btn-sm">@lang('charts.Добавить индикатор')</button>
        </div>       
    </div>
    <ul id="resultIndicator"></ul>
    <div class="row form-group">
        <div class="col-12 col-md-9">
            <h5>@lang('charts.Период:')</h5>
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
            <button id="makeChart" class="btn btn-primary btn-sm">@lang('charts.Построить график')</button>
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
    <div class="col col-md-12">
            <div class="input-group">
                <h5>@lang('charts.Название графика')</h5>
                <input type="text" id="chartName" name="chartName" placeholder=@lang('charts.График 1') class="form-control">
                <div id="save-export" class="input-group-btn">
                    <button id="saveChart" class="btn btn-success btn-sm">@lang('charts.Сохранить')</button>
                    <button id="exportChart" class="btn btn-danger btn-sm">@lang('charts.Экспортировать')</button>
                    <button id="exportToWordChart" class="btn btn-success btn-sm">@lang('charts.Экспорт в Word')</button>
                </div>                    
            </div>
        </div>
    </div>
</div><!-- .content -->

<hr>


@endsection

@section('scripts')
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
    <script src="{{ asset('js/map-charts-3.js') }}"></script>
    <script src="{{ asset('js/map-charts-4.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();

            $('#bootstrap-data-table_length > label > select > option:nth-child(4)').text('Все');

            if ($('.dataTables_empty').text() == 'No data available in table') {
                $('.dataTables_empty').text('Нет данных');
            }

        } );


        //Транслитерация
        function translit(txt){
            // Символ, на который будут заменяться все спецсимволы
            var space = '-';
            // Берем значение из нужного поля и переводим в нижний регистр
            var text = txt.toLowerCase();

            // Массив для транслитерации
            var transl = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
                ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                '(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
                ']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
                '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                '?': space, '<': space, '>': space, '№':space
            }

            var result = '';
            var curent_sim = '';

            for(i=0; i < text.length; i++) {
                // Если символ найден в массиве то меняем его
                if(transl[text[i]] != undefined) {
                   if(curent_sim != transl[text[i]] || curent_sim != space){
                       result += transl[text[i]];
                       curent_sim = transl[text[i]];
                   }
               }
                // Если нет, то оставляем так как есть
                else {
                    result += text[i];
                    curent_sim = text[i];
                }
            }

            result = TrimStr(result);

            // Выводим результат
            return result;

        }

        function TrimStr(s) {
            s = s.replace(/^-/, '');
            return s.replace(/-$/, '');
        }

</script>

<script type="text/javascript">
        /*
        * Сохранение графика
        */

        $('#saveChart').click(function (){
            $('.chart-save').prop( "disabled" , true );
            var fileName = translit($('#chartName').val());
            if (fileName) {
                if (filesCharts.indexOf(fileName) !== -1){
                    alert("Файл с таким именем уже существует!");
                    $('.chart-save').prop( "disabled" , false );
                    return 0;
                }
                if (fileName.indexOf('.') !== -1){
                    alert('Недопустимый символ "." в имени файла!');
                    $('.chart-save').prop( "disabled" , false );
                    return 0;
                }
                if (fullChart) {
                    var canvas = document.getElementById('myChart');
                    var img = canvas.toDataURL();
                    $.ajax({
                        url: "{{ route('chartsSave') }}",
                        type: "POST",
                        data: {img:img, fileName:fileName},
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            alert(data);
                            filesCharts.push(fileName);
                            $('.chart-save').prop( "disabled" , false );
                        },
                        error: function (msg) {
                            alert('Ошибка');
                            $('.chart-save').prop( "disabled" , false );
                        }
                    });
                }
                else if(fullMap){
                    if (indicatorsAddArr.length == 1) {
                        document.location.href = rootSite+"/map_for_save?fileName="+fileName+"&"+getString;
                    }
                    else{
                        $.ajax({
                            url: "{{ route('mapForSave') }}",
                            type: "POST",
                            data: {getString:getString, fileName:fileName},
                            headers: {
                                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                console.log(data);
                                document.location.href = rootSite+"/map_for_save?fileName="+fileName+"&"+getString;
                            },
                            error: function (msg) {
                                alert('Ошибка admin');
                                $('.chart-save').prop( "disabled" , false );
                            }
                        });
                    }
                }
                else{
                    alert("Постройте график!");
                    $('.chart-save').prop( "disabled" , false );
                }
            }
            else{
                alert("Введите название графика!");
                $('.chart-save').prop( "disabled" , false );
            }
        });


        /*
        * Экспорт графика
        */

        $('#exportChart').click(function (){
            $('.chart-save').prop( "disabled" , true );
            var fileName = translit($('#chartName').val());
            var fileExport = true;
            if (fileName) {
                if (filesCharts.indexOf(fileName) !== -1){
                    alert("Файл с таким именем уже существует!");
                    $('.chart-save').prop( "disabled" , false );
                    return 0;
                }
                if (fileName.indexOf('.') !== -1){
                    alert('Недопустимый символ "." в имени файла!');
                    $('.chart-save').prop( "disabled" , false );
                    return 0;
                }
                if (fullChart) {
                    var canvas = document.getElementById('myChart');
                    var img = canvas.toDataURL();
                    $.ajax({
                        url: "{{ route('chartsSave') }}",
                        type: "POST",
                        data: {img:img, fileName:fileName, fileExport:fileExport},
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            alert('Файл сохранен в '+ data);
                            var link = document.createElement('a');
                            link.setAttribute('href',data);
                            link.setAttribute('download',fileName +'.png');
                            $('#exportChart').after(link);
                            link.click();
                            filesCharts.push(fileName);
                            $('.chart-save').prop( "disabled" , false );
                        },
                        error: function (msg) {
                            alert('Ошибка');
                            $('.chart-save').prop( "disabled" , false );
                        }
                    });
                }
                else if(fullMap){
                    if (indicatorsAddArr.length == 1) {
                        document.location.href = rootSite+"/map_for_save?fileExport=1&fileName="+fileName+"&"+getString;
                    }
                    else{
                        $.ajax({
                            url: "{{ route('mapForSave') }}",
                            type: "POST",
                            data: {getString:getString, fileName:fileName},
                            headers: {
                                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                console.log(data);
                                document.location.href = rootSite+"/map_for_save?fileExport=1&fileName="+fileName+"&"+getString;
                            },
                            error: function (msg) {
                                alert('Ошибка admin');
                                $('.chart-save').prop( "disabled" , false );
                            }
                        });
                    }
                }
                else{
                    alert("Постройте график!");
                    $('.chart-save').prop( "disabled" , false );
                }
            }
            else{
                alert("Введите название графика!");
                $('.chart-save').prop( "disabled" , false );
            }
        });


        /*
        * Экспорт графика в Word
        */

        $('#exportToWordChart').click(function (){
            $('.chart-save').prop( "disabled" , true );
            var fileName = translit($('#chartName').val());
            var fileExportToWord = true;
            if (fileName) {
                if (filesCharts.indexOf(fileName) !== -1){
                    alert("Файл с таким именем уже существует!");
                    $('.chart-save').prop( "disabled" , false );
                    return 0;
                }
                if (fileName.indexOf('.') !== -1){
                    alert('Недопустимый символ "." в имени файла!');
                    $('.chart-save').prop( "disabled" , false );
                    return 0;
                }
                if (fullChart) {
                    var canvas = document.getElementById('myChart');
                    var img = canvas.toDataURL();
                    $.ajax({
                        url: "{{ route('chartsSave') }}",
                        type: "POST",
                        data: {img:img, fileName:fileName, fileExportToWord:fileExportToWord},
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            alert('Файл сохранен в '+ data);
                            var link = document.createElement('a');
                            link.setAttribute('href',data);
                            link.setAttribute('download',fileName +'.docx');
                            $('#exportToWordChart').after(link);
                            link.click();
                            filesCharts.push(fileName);
                            $('.chart-save').prop( "disabled" , false );
                        },
                        error: function (msg) {
                            alert('Ошибка');
                            $('.chart-save').prop( "disabled" , false );
                        }
                    });
                }
                else if(fullMap){
                    if (indicatorsAddArr.length == 1) {
                        document.location.href = rootSite+"/map_for_save?fileExportToWord=1&fileName="+fileName+"&"+getString;
                    }
                    else{
                        $.ajax({
                            url: "{{ route('mapForSave') }}",
                            type: "POST",
                            data: {getString:getString, fileName:fileName},
                            headers: {
                                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                console.log(data);
                                document.location.href = rootSite+"/map_for_save?fileExportToWord=1&fileName="+fileName+"&"+getString;
                            },
                            error: function (msg) {
                                alert('Ошибка admin');
                                $('.chart-save').prop( "disabled" , false );
                            }
                        });
                    }
                }
                else{
                    alert("Постройте график!");
                    $('.chart-save').prop( "disabled" , false );
                }
            }
            else{
                alert("Введите название графика!");
                $('.chart-save').prop( "disabled" , false );
            }
        });


        /*
        * Удаление сохраненных графиков
        */

        function removeChart(element) {
            if (confirm("Вы действительно хотите удалить эти данные ?")){
                var fileName = filesChartsFull[element.getAttribute('data-id')];
                $.ajax({
                    url: "{{ route('statisticsAnalysisDestroy') }}",
                    type: "POST",
                    data: {fileName:fileName},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        alert('Файл "'+data+'" успешно удален !');
                        element.parentElement.remove();
                    },
                    error: function (msg) {
                        alert('Ошибка');
                    }
                });
            }
        }

    </script>



    <script type="text/javascript">
    //Посмотреть график
    function watchChart(element) {
        var fileName = filesChartsFull[element.getAttribute('data-id')];
        document.location.href = chartLink + '/' + fileName;
    }

</script>
@endsection