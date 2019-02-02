<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mercurial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <link href="{{ url('mercurial/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="grid-wrapper">
    @include('mercurial_parts.navbar')

    @include('mercurial_parts.sidebar')

    @yield('content')
</div>

<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
    $(document).ready(function () {
        var menuSwitcher = $('.icon-menu'),
            menuItems = $('.menu-item-description.collapse');

        menuSwitcher.click(function () {
            menuItems.collapse('toggle');
        });
        /*$('.selectpicker').selectpicker({
            width: false,
            noneSelectedText: ''
        });*/
    });
</script>

@yield('scripts')

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
        $( "#searchIndicator.form-control" ).focus(function() {
            $('button.btn.btn-outline-secondary.add-indicator').css('border-color','#3e4550');
        } );
        $( "#searchIndicator.form-control" ).focusout(function() {
            if($('div.input-group.mb-3:hover').length == 0){
                $('button.btn.btn-outline-secondary.add-indicator').css('border-color','#ced4da');
            }            
        } );
        $('div.input-group.mb-3').hover(
            function(){
                $('button.btn.btn-outline-secondary.add-indicator').css('border-color','#3e4550');
            },
            function(){
                if($('#searchIndicator.form-control:focus').length == 0){
                    $('button.btn.btn-outline-secondary.add-indicator').css('border-color','#ced4da');
                }
            });

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
                    var indicatorId = 0;
                    for (var key in indicatorsObjName){
                        if (indicatorsObjName[key] == indicatorsAddArr[0]) {
                            indicatorId = key;
                        }
                    }
                    document.location.href = rootSite+"/map_for_save?indicatorId="+indicatorId+"&fileName="+fileName+"&"+getString;
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
                    var indicatorId = 0;
                    for (var key in indicatorsObjName){
                        if (indicatorsObjName[key] == indicatorsAddArr[0]) {
                            indicatorId = key;
                        }
                    }
                    document.location.href = rootSite+"/map_for_save?indicatorId="+indicatorId+"&fileExport=1&fileName="+fileName+"&"+getString;
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
                    var indicatorId = 0;
                    for (var key in indicatorsObjName){
                        if (indicatorsObjName[key] == indicatorsAddArr[0]) {
                            indicatorId = key;
                        }
                    }
                    document.location.href = rootSite+"/map_for_save?indicatorId="+indicatorId+"&fileExportToWord=1&fileName="+fileName+"&"+getString;
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