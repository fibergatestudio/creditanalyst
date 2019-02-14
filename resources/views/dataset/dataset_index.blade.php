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

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Просмотр данных</title>
  </head>
  <body>
    @include('basic_bootstrap_template_parts.navbar')
        <div class="container">

            <div class="row">
                <div class="col col-lg-3">
                @include('basic_bootstrap_template_parts.sidebar', ['active_sidebar_name' => '  '])
                
                </div><!-- /col col-lg-3 -->

                <div class="col col-lg-9">
                  <h2>{{ $indicator->name }} </h2>
                  Единицы измерения: {{ $indicator->measurement_unit_name }}
                  <table class="table">
                    @foreach($dataset as $data_entry)
                      <tr>
                        <td>{{ dataset_format_date('month', $data_entry->date) }} </td>
                        <td>{{ $data_entry->koatuu_name }} </td>
                        <td>{{ $data_entry->value }} </td>
                      </tr>

                    @endforeach
                  </table>
                    
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