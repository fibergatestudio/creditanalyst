@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Вход</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="{{ url('/mercurial/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <section id="page-exit" class="section-content">
        <img src="{{ url('mercurial/images/logo.png') }}" class="logo" alt="logo">
        <div class="card">
            <div class="card-body">
                <h3 class="title-block">Вход</h3>
                <div class="row">
                    <div class="col-md-7 exit-language">
                        <span class="language">Язык интерфейса</span>
                        <label>
                            <select class="form-control" data-placeholder="Choose a Language...">
                                <option value="RU">RU</option>
                                <option value="UKR">UKR</option>
                                <option value="ENG">ENG</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <form class="card-form">
                            <div class="form-group row">
                                <label for="login" class="col">E-mail:</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} col-md-7" id="login" placeholder="" name="email">
                                <span class="col"></span>


                                <!-- версия регистрации через лару-->

                                <!-- <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> -->

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group row">
                                <label for="exampleInputPassword1" class="col">Пароль:</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} col-md-7" id="exampleInputPassword1" placeholder="" name="password">
                                <span class="col"></span>
                            </div>

                            <!-- версия регистрации через лару-->
                            <!-- <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> -->

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                            <div class="form-group row">
                                <div class="col-md-7">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>


                                        <!-- версия регистрации через лару-->
                                        <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> -->

                                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                                    </div>
                                </div>
                            </div>
                            <div class="button-exit row">
                                <button type="submit" class="btn btn-success col-md-7">
                                    {{ __('Вход') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="remind-password text">Забыли пароль?
                                    <!-- версия регистрации через лару-->
                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> -->
                                @endif
                                </a>
                            </div>       
                        </form>   
                    </form>
                </div>       
            </div>
        </div>
    </section>
</body>
@endsection
