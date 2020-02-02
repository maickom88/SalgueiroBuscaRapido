<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <title >SALGUEIRO BUSCA RÁPIDO: CADASTRO</title>
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <link rel="stylesheet" href={{asset('css/cadastro-final.css')}}>
</head>

<body>

<section class="login" style="background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.8)) ,url('../img/password.jpg'); background-size:cover; background-repeat:no-repeat; background-position:center center;">
    <div class="container">
        <div class="login-usuario text-center">
            <div class="avatar-login">
">
                <div class="avatar-usuario">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <!--<div class="facebook-logar mb-4">
                <a href="#">Crie conta com facebook</a>
            </div>
            -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="txtb">
                    <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    <label style="left:-5px !important;" for="email" id="nome-label">Digite seu email de recuperação!</label>
                </div>
                @error('email')<button class="btn">Esse email não consta no nosso banco de dados!</button>@enderror   
                 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            Nós enviamos um link para recuperar sua senha em seu email!
                        </div>
                    @endif
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label for="enviar">Continuar</label>
                <input type="submit" id="enviar">
            </form>
            <div class="dropdown-divider"></div>

            <span style="color:#818080">Possui uma conta?<a href={{route('login.home')}}> Clique aqui </a> para entrar. <br>
            <span style="color:#818080"><a href="/"> Clique aqui </a> para voltar para home!
        </div>
    </div>
</div>


</section>

<script src="js/typed.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/slick.min.js"></script>

<script src={{asset('js/js.cadastro.js')}}></script>
</body>
</html>
