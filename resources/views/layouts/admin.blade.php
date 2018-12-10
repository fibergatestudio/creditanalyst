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
                    <li class="active">
                        <a href="{{route('adminIndex')}}"> <i class="menu-icon fa fa-dashboard"></i>Панель управления </a>
                    </li>                                                                     
                    <li>
                        <a href="{{route('chartsIndex')}}"><i class="menu-icon fa fa-address-card "></i> Статистика и анализ </a>
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

    <script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>      
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!--  Data table -->
    <script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/datatables-init.js') }}"></script>

    <!--  Chart js -->
    <script src="{{ asset('assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('js/line-charts.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();

            $('#bootstrap-data-table_length > label > select > option:nth-child(4)').text('Все');

            if ($('.dataTables_empty').text() == 'No data available in table') {
                $('.dataTables_empty').text('Нет данных');
            }

        } );
    </script>

    <script type="text/javascript">
        /*
        * Сохранение графика
        */

        $('#saveChart').click(function (){ 
            var fileName = $('#chartName').val();
            if (fileName) {
                if (filesCharts.indexOf(fileName) !== -1){
                    alert("Файл с таким именем уже существует!");
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
                        },
                        error: function (msg) {
                            alert('Ошибка');
                        }
                    }); 
                }
                else{
                    alert("Постройте график!");
                }
            }
            else{
                alert("Введите название графика!");
            }
        });


        /*
        * Экспорт графика
        */

        $('#exportChart').click(function (){
            var fileName = $('#chartName').val();
            var fileExport = true;
            if (fileName) {
                if (filesCharts.indexOf(fileName) !== -1){
                    alert("Файл с таким именем уже существует!");
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
                        },
                        error: function (msg) {
                            alert('Ошибка');
                        }
                    }); 
                }
                else{
                    alert("Постройте график!");
                }
            }
            else{
                alert("Введите название графика!");
            }
        });
    </script>

</body>
</html>

