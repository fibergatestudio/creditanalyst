<?php
/*
* Блок функций, который отвечает за форматирование даты
*/
function dataset_format_date($date_format, $date){
  $ru_months = ['Январь', 'Ферваль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
  
  if($date_format == 'month'){
    $d = date_parse_from_format("Y-m-d", $date);
    $month_number =  $d["month"];
    $year_number = $d["year"];

    $formatted_date = $ru_months[$month_number - 1].' '.$year_number;
  }

  if($date_format == 'year'){
    $d = date_parse_from_format("Y-m-d", $date);
    $year_number = $d["year"];
    $formatted_date = $year_number;
  }

  return $formatted_date;
}

App::setLocale(Auth::user()->preferred_language);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>@lang('notifications_index.Уведомления')</title>
  </head>
  <body>
    @include('basic_bootstrap_template_parts.navbar')
        <div class="container">
            <div class="row">
                <div class="col col-lg-3">
                @include('basic_bootstrap_template_parts.sidebar', ['active_sidebar_name' => 'notifications'])
                
                </div><!-- /col col-lg-3 -->

                <div class="col col-lg-9">
                <h2>@lang('notifications_index.Уведомления')</h2>

                <table class="table">
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{ dataset_format_date('month', $notification->period_start_date) }}</td>
                            <td>{{ $notification->indicator_name }}</td>
                            <td>{{ $notification->koatuu_name }}</td>
                            <td>{{ $notification->data_value }}</td>
                            <td>{{ $notification->measurement_unit_name }}</td>
                        </tr>
                    @endforeach
                </table>

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

    
  </body>
</html>