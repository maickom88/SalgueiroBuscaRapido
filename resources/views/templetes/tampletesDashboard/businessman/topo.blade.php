<!DOCTYPE html>
<html lang="pt-br">

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
	<script src={{asset("lib/chart-master/Chart.js")}}></script>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
	<link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">

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
                <img src={{asset('img/profilezim.png')}} class="img-circle avatar-menu" width="80">
                @else
                <img id="avatar-menu" src="" class="img-circle avatar-menu" width="80">
                @endif
				</a><img>
				<h5 class="centered">{{Auth::user()->name}}</h5>
				<li class="mt">
					<a class="@yield('menuPrincipal')" href={{route('painel')}}>
						<i class="fa fa-dashboard"></i>
						<span>Painel Empresarial</span>
					</a>
				</li>
				<li class="sub-menu">
					<a  class="@yield('perfil')" href={{route('perfilEmp')}}>
						<i class="fa fa-user"></i>
						<span>Meu perfil</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('empresa')" href={{route('editarEmp')}}>
						<i class="fa fa-briefcase"></i>
						<span>Minha empresa</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('pagamento')" href={{route('pagEmp')}}>
						<i class="fa fa-money"></i>
						<span>Tabela de pagamentos</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('novidade')"  href={{route('postsEmp')}}>
						<i class="fa fa-plus-square"></i>
						<span>Postar Novidades</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('noticias')"  href={{route('noticiasEmp')}}>
						<i class="fa fa-list-alt"></i>
						<span>Notícias</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('eventos')" href={{route('eventEmp')}}>
						<i class="fa fa-star"></i>
						<span>Eventos</span>
					</a>
				</li>

			</ul>
		</div>
	</aside>

