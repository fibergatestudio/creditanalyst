<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Вход</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <link href="mercurial/css/style.css" rel="stylesheet">
</head>
<body>
<section id="page-exit" class="section-content">
    <img src="mercurial/images/logo.png" class="logo" alt="logo">
    <div class="card">
        <div class="card-body">
            <h3 class="title-block">Вход</h3>
            <div class="row">
                <div class="col-md-7 exit-language">
                    <span class="language">Язык интерфейса</span>
                    <label>
                        <select class="selectpicker form-control lang" data-placeholder="Choose a Language...">
                            <option value="RU">RU</option>
                            <option value="UKR">UKR</option>
                            <option value="ENG">ENG</option>
                        </select>
                    </label>
                </div>
            </div>

            <form class="card-form">
                <div class="form-group row">
                    <label for="login" class="col">Login:</label>
                    <input type="text" class="form-control col-md-7" id="login" placeholder="">
                    <span class="col"></span>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col">Пароль:</label>
                    <input type="password" class="form-control col-md-7" id="exampleInputPassword1" placeholder="">
                    <span class="col"></span>
                </div>
                <div class="form-group row">
                    <div class="col-md-7">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                        </div>
                    </div>
                </div>
                <div class="button-exit row">
                    <button type="submit" class="btn btn-success col-md-7">Вход</button>
                    <a href="#" class="remind-password text">Забыли пароль?</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker({
        width: false,
        noneSelectedText: ''
    });
</script>
</body>
</html>
