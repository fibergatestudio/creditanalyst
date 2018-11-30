<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Indicators</title>
  </head>
  <body>
    @include('basic_bootstrap_template_parts.navbar')
    <div class="container">

        <div class="row">
            <div class="col col-lg-3">
            @include('basic_bootstrap_template_parts.sidebar', ['active_sidebar_name' => 'monitoring'])
            
            </div><!-- /col col-lg-3 -->

            <div class="col col-lg-9">

            <h2>Список индикаторов, отслеживаемых пользователем</h2>
            
            <table class="table">
                @foreach($indicator_watchlist_data as $data_entry)
                    <tr>
                        <td>{{ $data_entry->name }}</td>
                        
                        {{-- Кнопка удалить показатель из мониторинга --}}
                        <td>
                            <a href="{{ url("/remove_indicator_from_watchlist")."/".$data_entry->indicator_id }}">
                                <div class="btn btn-danger">
                                    Удалить из списка
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            </div><!-- /col-lg-3 -->
        </div><!-- /row -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>