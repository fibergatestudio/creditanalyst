<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
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
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/vector-map/jqvmap.min.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>    
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">Кредитная аналитика</a>
                <a class="navbar-brand hidden" href="/">КА</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li class="active">
                        <a href="{{route('adminIndex')}}"> <i class="menu-icon fa fa-dashboard"></i>Панель управления </a>
                    </li> -->                                                                     
                    <li class="active">
                        <a href="{{route('statisticsAnalysisIndex')}}"><i class="menu-icon fa fa-address-card "></i> Статистика и анализ </a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}"><i class="menu-icon fa fa-address-card "></i> Вернуться </a>
                    </li>                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-10">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-2">

                </div>

            </div>

        </header><!-- /header -->
        <!-- Header-->

        @yield('content')

    </div><!-- /#right-panel -->

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

</body>
</html>

