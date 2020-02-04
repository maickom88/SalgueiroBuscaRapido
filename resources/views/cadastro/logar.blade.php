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

<section class="login">
    <div class="container">
        <div class="login-usuario text-center">
            <div class="avatar-login">
                <div class="avatar-usuario">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <!--<div class="facebook-logar mb-4">
                <a href="#">Crie conta com facebook</a>
            </div>
            -->
            <form action={{route('cadastrar.site')}} method="POST" autocomplete="off">
                @csrf
                <div class="txtb">
                    <input type="text" name="name" id="nome"  required>   
                    <label for="nome" id="nome-label">Digite seu nome Completo</label>
                </div>
                            
                <div class="txtb">
                    <input type="email" name="email" class="email" id="email" required>
                    <label id="email-label" for="email">Digite seu email</label>
                </div>

                <div class="txtb">
                    <input type="password" class="senha" name="password" id="senha" required>
                    <label id="senha-label" for="senha">Digite sua senha</label>
                </div>
                <div class="txtb">
                    <input type="password" class="senha" name="confpass"id="confsenha" required>
                    <label id="senha-label-conf" for="confsenha">Confirme sua senha</label>
                </div>
                
                <?php
                if(\Session::has('senha_in')):
                ?>
                <p class="btn btn-danger" style="font-size:13px;">Senha e confirmar senha não correspondem</p>
                <?php
                \Session::forget('senha_in');
                endif;
                ?>
                <?php
                if(\Session::has('user_exist')):
                ?>
                <p class="btn btn-warning" style="font-size:13px;">Já existe um usuario com esse email.</p>
                <?php
                \Session::forget('user_exist');
                endif;
                ?>
                <?php
                if(\Session::has('user_ok')):
                ?>
                <p class="btn btn-success" style="font-size:13px;">Cadastro realizado com sucesso <a href={{route('login.home')}} style="color:blue"><strong> clique aqui </strong> </a> para iniciar</p>
                <?php
                \Session::forget('user_ok');
                endif;
                ?>
                <?php
                if(\Session::has('error')):
                ?>
                <p class="btn btn-danger" style="font-size:13px;"><strong>Erro!</strong>Recarregue a pagina e tente novamente!</p>
                <?php
                \Session::forget('error');
                endif;
                ?>
                <?php
                if(\Session::has('senha_fraca')):
                ?>
                <p class="btn btn-primary" style="font-size:13px;">Aconselhamos que crie uma senha com no máximo 8 caracteres.</p>
                <?php
                \Session::forget('senha_fraca');
                endif;
                ?>
                
                <div style="font-size:13px;color:red; display:none; transition:all 0.5s;" id="alerta">
                    <p style="transition:all 0.5s;">No mínimo 8 caracteres, com ao menos uma letra e um número.</p>
                </div>
                
                <div class="info">
                    <i class="fas fa-info"></i><span> No mínimo 8 caracteres, com ao menos uma letra e um número.</span>
                </div>

                <div class="termos">
                    <input required type="checkbox" name="check_termo" value="sim" onclick="mostrarsenha(1)" id="termos"><label>Estou ciente dos <a href={{route('condicoes')}}>Termos de Uso</a> e as <a href={{route('privacidade')}}>Política de Privacidade</a> da SBR.</label>
                </div>
                
                <label for="enviar">Continuar</label>
                <input type="submit" id="enviar">
            </form>
            <div class="dropdown-divider"></div>
            
            <span style="color:#818080">Possui uma conta?<a href={{route('login.home')}}> Clique aqui </a> para entrar.
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