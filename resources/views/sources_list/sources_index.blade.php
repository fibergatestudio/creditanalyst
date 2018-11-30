<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Info sources</title>
  </head>
  <body>

    @include('basic_bootstrap_template_parts.navbar')

    <div class="container">
        
      <div class="row">
        <div class="col col-lg-3">
          @include('basic_bootstrap_template_parts.sidebar', ['active_sidebar_name' => 'sources'])
          
        </div><!-- /col col-lg-3 -->

        <div class="col col-lg-9">
          <div class="accordion" id="sources_accordion">
            
            @foreach($infosources as $infosource)
                <div class="card">
                  <div class="card-header" id="heading{{ $infosource->id }}">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $infosource->id }}" aria-expanded="true" aria-controls="collapse{{ $infosource->id }}">
                        <!-- Название -->
                        {{ $infosource->name }} 
                      </button>
                    </h5>
                  </div><!-- / card-header -->

                  <div id="collapse{{ $infosource->id }}" class="collapse" aria-labelledby="heading{{ $infosource->id }}" data-parent="#sources_accordion">
                    <div class="card-body">
                      Описание: {{ $infosource->description }}<br>
                      Поставщик: {{ $infosource->procurer }}<br>
                      Макс. частота данных: {{ $infosource->frequency_unit_name }}<br>
                      Макс. география данных: {{ $infosource->geography_unit_name }}<br>
                      
                      <!-- Кнопка "список показателей" -->
                      <a href="{{ url('indicator_list/'.$infosource->id) }}">
                        <div class="btn btn-success">
                          Список показателей
                        </div>
                      </a>

                    </div><!-- / card body -->
                  </div><!-- / collapse -->
                </div><!-- / card -->
              @endforeach
            </div><!-- / accordion -->
          </div> <!-- / col col-lg-9 -->

      </div><!-- / row -->
    </div><!-- / container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- Typeahed -->
    <script src="{{ url('assets/typeahead.bundle.js') }}">
  </body>
</html>