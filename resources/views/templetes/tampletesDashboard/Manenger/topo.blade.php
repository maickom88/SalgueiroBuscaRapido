<!DOCTYPE html>
<html lang="pt-br">
<?php
$perc = 50;
if(!empty($user->info)){

$idade = $user->info->idade;
$avatar = $user->info->avatar;
$interesse = $user->info->interesse;
$endereco = $user->info->endereco;
$telefone = $user->info->telefone;
	if(!empty($idade)){
		$perc += 10;
	}
	if(!empty($avatar)){
		$perc += 10;
	}
	if(!empty($interesse)){
		$perc += 10;
	}
	if(!empty($endereco)){
		$perc += 10;
	}
	if(!empty($telefone)){
		$perc += 10;
	}
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>@yield('titulo')</title>

	<link href={{asset('img/favicon.ico')}} rel="icon">
	<link href={{asset('lib/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
	<link href={{asset('lib/font-awesome/css/font-awesome.css')}} rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href={{asset('lib/gritter/css/jquery.gritter.css')}} />
	<link href={{asset('css/style-painel.css')}} rel="stylesheet">
	<link href={{asset('css/style-responsive.css')}} rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href={{asset('css/style.css')}}>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.css">
	<link rel="stylesheet" href={{asset('css/painel.css')}}>
	<link rel="stylesheet" href={{asset('css/loader-bouncing.css')}}>
	<link rel="stylesheet" href={{asset('css/jBox.all.css')}}>
	<link rel="stylesheet" href={{asset('css/style-empresa.css')}}>
	<link rel="stylesheet" href={{asset('css/jquery.tagsinput.min.css')}}>
	<script src={{asset("lib/chart-master/Chart.js")}}></script>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

	@yield('links')
</head>

<body>
	<div class="loader loader-bouncing"></div>
<section id="container">
	<header class="header black-bg">
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>

			<!--logo start-->
			<a href="/" class="logo"><img src={{asset('img/logofinal1.png')}} style="width:120px"alt=""></a>
			<!--logo end-->


		<div class="top-menu">
			<ul class="nav pull-right top-menu">
				<li><a class="logout" href={{route('logoutUser')}}>Sair <i class="fa fa-sign-out"></i></a></li>
			</ul>
		</div>
	</header>
	<aside>
		<div id="sidebar" class="nav-collapse ">
			<ul class="sidebar-menu" id="nav-accordion">
				<p class="centered"><a href={{route('userPerfil')}}>
				@if(empty($user->info->avatar))
					<img src={{asset('img/profilezim.png')}} class="img-circle avatarImg" width="80">
				@else
				<img id="avatar-menu" src="" class="img-circle avatarImg" width="80">
				@endif
				</a><img>
				<h5 class="centered">{{Auth::user()->name}}</h5>
				<li class="sub-menu">
					<a  class="@yield('perfilUser')" href={{route('perfilUserManenger')}}>
						<i class="fa fa-user-circle"></i>
						<span>Perfil do Administrador</span>
					</a>
				</li>
				<li class="sub-menu">
					<a  class="@yield('empresas')" href={{route('empManenger')}}>
						<i class="fa fa-briefcase"></i>
						<span>Empresas</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('user')" href={{route('userManenger')}}>
						<i class="fa fa-user"></i>
						<span>Usúarios</span>@if($userNotif > 0)<span class="badge bg-warning" style="margin-left:20px">{{$userNotif}}</span>@endif
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('contato')" href={{route('contatoManenger')}}>
						<i class="fa fa-envelope-o"></i>
						<span>Contato</span>@if($contactNotif > 0)<span class="badge bg-warning" style="margin-left:20px">{{$contactNotif}}</span>@endif
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('parceria')"  href={{route('parceriaManenger')}}>
						<i class="fa fa-star"></i>
						<span>Parceirias</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('pag')" href={{route('pagamentoManenger')}}>
						<i class="fa fa-money"></i>
						<span>Tabela de Pagamentos</span>
					</a>
				</li>
                <li class="sub-menu">
                    <a class="@yield('eventos')" href="javascript:;">
                    <i class="fa fa-plus-square"></i>
                    <span>Eventos</span>
                    </a>
                    <ul class="sub" style="background:#D4D4D4 !important;">
                    <li><a href={{route('eventoManenger')}}>Publicar Evento</a></li>
                    <li><a href={{route('eventosPublicados')}}>Eventos publicados</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="@yield('blog')" href="javascript:;">
                    <i class="fa fa-plus-square"></i>
                    <span>Blog</span>
                    </a>
                    <ul class="sub" style="background:#D4D4D4 !important;">
                    <li><a href={{route('blogManenger')}}>Publicar post</a></li>
                    <li><a href={{route('blogTableManenger')}}>Posts publicados</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a class="@yield('promocoes')"   href="javascript:;">
                    <i class="fa fa-plus-square"></i>
                    <span>Promoções</span>@if($promotionNotif > 0)<span class="badge bg-warning" style="margin-left:20px">{{$promotionNotif}}</span>@endif
                    </a>
                    <ul class="sub" style="background:#D4D4D4 !important;">
                    <li><a href={{route('promocaoManenger')}}>Lista de promoções</a></li>
                    </ul>
                </li>
			</ul>
		</div>
	</aside>

