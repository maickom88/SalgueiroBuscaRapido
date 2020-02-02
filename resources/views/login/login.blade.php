<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <title >SALGUEIRO BUSCA RÁPIDO: ENTRAR</title>
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <link rel="stylesheet" href={{asset('css/login-final.css')}}>
</head>

    <!--font-family: 'Open Sans', sans-serif;
font-family: 'Open Sans Condensed', sans-serif;-->

<body>
<div class="marca">
        <a href={{route('home') }}><img src="img/logofinal1.png"></a>
</div>
<section class="login">
        <div class="container">
            <div class="login-usuario text-center">
                <div onclick="getEmpre(1)" id="click"class="get-empresa">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="avatar-login">
                    <div class="avatar-usuario">
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <form action={{route('logar.site')}} method="POST">
                    @csrf
                    <div class="txtb">
                        <input type="text" name="email" id="email" required>
                        <label for="email" id="email-label">Email</span>
                    </div>

                    <div class="txtb">
                        <input type="password" name="password" class="senha" id="senha" required>
                        <label id="senha-label" for="senha">Senha</label>
                    </div>

                    <div class="mostrar-senha">
                        <input type="checkbox" onclick="mostrarsenha(1)" id="mostrar"><label>Mostrar senha</label>
                    </div>
                <?php
                    if(\Session::has('user_notExist')):
                ?>
                    <a id="linkinfo1" href={{route('cadastro.site')}} class="btn btn-info" style="font-size:13px; text-decoration:none; color:#fff;">Esse email não existe faça o seu cadastro agora!</a>

                <?php
                    \Session::forget('user_notExist');
                    endif;
                ?>
                <?php
                if(\Session::has('user_isEmp')):
            ?>
                <a id="linkinfo1" href={{route('cadastro.site')}} class="btn btn-info" style="font-size:13px; text-decoration:none; color:#fff;">Você é um usúario empresário, tente acessar clicando no icone logo acima!</a>

            <?php
                \Session::forget('user_isEmp');
                endif;
            ?>
                <?php
                if(\Session::has('user_errorPass')):
            ?>
                <p id="linkinfo2" class="btn btn-danger" style="font-size:13px; text-decoration:none; color:#fff;">A Senha que você digitou esta incorreta!</p>

            <?php
                \Session::forget('user_errorPass');
                endif;
            ?>
                <label for="enviar">Entrar</label>
                    <input type="submit" id="enviar">
                </form>
                <div class="dropdown-divider"></div>
                <button type="btn">
                <a href={{route('cadastro.site')}} class="link-cadastro">
                    <p>Você ainda não possui uma conta?<br><strong>Crie grátis!</strong></p>
                </a>
                </button>
                <a href={{route('recupera.senha')}}>Esqueceu sua senha?</a>
            </div>
        </div>


        <!--login-empresarial-->
    <div class="bloco"id="bloco">
        <div class="container-empresarial" id="empresa">
            <div class="login-usuario text-center">
                    <div class="get-empresa">
                        <i class="fas fa-user-tie"></i>
                    </div>
                <div class="avatar-login">
                    <div class="avatar-usuario">
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <form action={{route('dashboard_emp')}} method="POST">
                    @csrf
                    <div class="txtb">
                        <input type="text" name="email" id="email-2" required>
                        <label for="email-2" id="email-label-2">Email</span>
                    </div>

                    <div class="txtb">
                        <input type="password" name="password" id="senha-2" required>
                        <label id="senha-label-2" for="senha-2">Senha</label>
                    </div>

                    <div class="mostrar-senha">
                        <input type="checkbox" id="mostrar-2" onclick="mostrarsenha2(1)"><label>Mostrar senha</label>
                    </div>
                    <?php
                    if(\Session::has('user_notEmp')):
                ?>
                    <p class="btn btn-info" style="font-size:13px;">Você não tem permissão pra logar como empresario. Quer ser nosso parceiro?<a style="color:blue;" href={{route('contato.home')}}>Clique aqui!</a></p>
                <?php
                    \Session::forget('user_notEmp');
                    endif;
                ?>
                    <label for="enviar-2">Entrar</label>
                    <input type="submit" id="enviar-2">

                </form>
                <div class="dropdown-divider"></div>
                <button type="btn">
                <a href="#" class="link-cadastro">
                    <p>Você ainda não anunciou com a gente?<br><strong>Anuncie com a gente aqui!</strong></p>
                </a>
                </button>
                <a href="#">Esqueceu sua senha?</a>
            </div>
        </div>
    </div>


</section>




<script src={{asset('js/typed.js')}}></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src{{asset('js/jquery-1.11.0.min.js')}}></script>
<script src={{asset('js/jquery-migrate-1.2.1.min.js')}}></script>
<script src={{asset('js/slick.min.js')}}></script>
<script src={{asset('js/js.login.js')}}></script>

<script>
    $('#linkinfo1').show();

    setTimeout(function(){
        $('#linkinfo1').hide();
        }, 3500);

    $('#linkinfo2').show();

    setTimeout(function(){
        $('#linkinfo2').hide();
        }, 3500);
</script>
</body>
</html>
