<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Поиск</title>
  </head>
  <body>
    @include('basic_bootstrap_template_parts.navbar')
        <div class="container">

            <div class="row">
                <div class="col col-lg-3">
                @include('basic_bootstrap_template_parts.sidebar', ['active_sidebar_name' => 'search'])
                
                </div><!-- /col col-lg-3 -->

                <div class="col col-lg-9">
                    <h2>Поиск</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-inline" method="GET" actions="{{ url('indicator_search') }}">
                                <input type="text" class="form-control typeahead" name="search_query" place="Введите поисковый запрос">
                                <button type="submit" class="btn btn-primary"> Поиск</button>

                            </form>
                        </div><!-- /col-md-6 -->
                    </div><!-- /work -->

                    <div class="row" style="margin-top: 10px">
                        <table class="table">
                            @foreach($results as $result)
                                <tr>
                                    <td>    
                                        <b>{{ $result->name }}</b><br>
                                        <i>Источник данных:</i> {{ $results_meta[$result->id]['infosource_name'] }}<br>
                                        <i>Поставщик данных:</i> {{ $results_meta[$result->id]['procurer'] }}
                                    </td>
                                    
                                    {{-- Кнопка "Просмотр" --}}
                                    <td>
                                        <a href="{{ url('/dataset_view_indicator'.'/'.$result->id) }}">
                                            <div class="btn btn-success">Просмотр</div>
                                        </a>
                                    </td>                            

                                    {{-- Кнопка "Добавить в мониторинг" --}}
                                    <td>
                                        <a href="{{ url('/add_indicator_to_watch_list'.'/'.$result->id) }}">
                                            <div class="btn btn-primary">Добавить в мониторинг</div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div><!-- /col-lg-9 -->
            </div><!-- /row -->
        </div><!-- /container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    {{-- Typeahead JS --}}
    <script src="{{ url('assets/typeahead.bundle.js') }}"></script>

    <script>
        var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
            if (substrRegex.test(str)) {
                matches.push(str);
            }
            });

            cb(matches);
        };
        };

        // Сделать прогрузку по API

        var hints = [];
        $( document ).ready(function() {
            
            $.getJSON("{{ url('ajax/indicator_hints') }}", function(data){
                for (var i = 0, len = data.length; i < len; i++) {
                    //console.log(data[i]);
                    hints.push(data[i]);
                }
            });
            
        });

        

        //var states = ['Объёмы производства картошки в Украине'];

        $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'hints',
            source: substringMatcher(hints)
        });
    </script>

    <style>
        .tt-menu{
            background-color: white;
            border: 1px solid grey;
        }
    </style>
  </body>
</html>