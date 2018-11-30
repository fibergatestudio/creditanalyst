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

                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-inline" method="GET" actions="{{ url('indicator_search') }}">
                                <input type="text" class="form-control" name="search_query" place="Введите поисковый запрос">
                                <button type="submit" class="btn btn-primary"> Поиск</button>

                            </form>
                        </div><!-- /col-md-6 -->
                    </div><!-- /work -->

                    <div class="row">
                        @foreach($results as $result)
                            {{ $result->name }}<br>
                            
                            {{-- Кнопка "Добавить в мониторинг" --}}
                            <a href="{{ url('/add_indicator_to_watch_list'.'/'.$result->id) }}">
                                <div class="btn btn-primary">Добавить в мониторинг</div>
                            </a>
                        @endforeach
                    </div>
                </div><!-- /col-lg-9 -->
            </div><!-- /row -->
        </div><!-- /container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>