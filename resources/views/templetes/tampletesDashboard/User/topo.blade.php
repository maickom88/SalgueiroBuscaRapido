<!DOCTYPE html>
<html lang="pt-br">
<?php
$perc = 50;
if(!empty($user->info)){
$avatar = $user->info->avatar;
$interesse = $user->info->interesse;
$endereco = $user->info->endereco;
$telefone = $user->info->telefone;
	if(!empty($avatar)){
		$perc += 20;
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

<div id="loader" class="loader loader-bouncing"></div>
<section id="container">
	<header class="header black-bg">
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>

			<!--logo start-->
			<a href="/" class="logo"><img src={{asset('img/logofinal1.png')}} style="width:120px"alt=""></a>
			<!--logo end-->
			<div class="nav notify-row" id="top_menu">
				<ul class="nav top-menu">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="dashboard#">
							<i class="fa fa-tasks"></i>
							<span class="badge" style="background-color:#00a3ee" >@if($perc==100 && $user->comments->count() >= 5 && $user->likes->count() >=5 )  @elseif($perc==100 && $user->comments->count() >= 5 ) 1 @elseif($perc==100) 3 @else 4 @endif</span>
						</a>
						<ul class="dropdown-menu extended tasks-bar">
							<div class="notify-arrow notify-arrow-green"></div>
							<li>
								<p class="green">Pontue e obtenha descontos exclusivos a qualquer momento</p>
							</li>
							<li>

								<a href="dashboard#">
									<div class="task-info">

										@if($perc==100)
										<div class="desc">Seus dados estão completos</div>
										<div style="display: none;" aria-details="{{$perc}}" id="ativar">Você completou seus dados!</div>
										@else
										<div class="desc">Complete seus dados na aba perfil</div>
										@endif
										<div class="percent" id="percentAtual" aria-details="{{$perc}}">{{$perc}}%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar @if($perc==100)progress-bar-success @else progress-bar-info @endif" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$perc}}%">
											<span class="sr-only">"{{$perc}}"% Complete</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="dashboard#">
									<div class="task-info">
										@if($user->comments->count() >= 5)
											<div class="desc">Você concluiu essa tarefa</div>
										@else
											<div class="desc">Faça cinco comentários</div>
										@endif

										@if (!empty($user->comments))
											@php
											$count = $user->comments->count();
											if($count>=2)
											{
												$color = 'warning';
											}
											if($count>=5){
												$color = 'success';
											}
											else{
												$color = 'danger';
											}
											@endphp
										<div class="percent">{{$count*20}}%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-{{$color}}" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: {{$count*20}}%">
											<span class="sr-only">{{$count*20}}% Complete (Important)</span>
										</div>
									</div>
										@endif
								</a>
							</li>
							<li>
								<a href="dashboard#">
									<div class="task-info">
										@if($user->comments->count() >= 5)
											<div class="desc">Você concluiu essa tarefa</div>
										@else
										<div class="desc">Avalie três empresas</div>
										@endif

										@if (!empty($user->comments))

										@php
											$count = $user->comments->count();
											if($count>=2)
											{
												$color = 'warning';
											}
											if($count>=5){
												$color = 'success';
											}
											else{
												$color = 'danger';
											}
										@endphp
											<div class="percent">{{$count*20}}%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-{{$color}}" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: {{$count*20}}%">
											<span class="sr-only">{{$count*20}}% Complete (Important)</span>
										</div>
									</div>
										@endif
								</a>
							</li>
							<li>
								<a href="dashboard#">
									<div class="task-info">
										@if($user->likes->count()>= 5)
											<div class="desc">Você concluiu essa tarefa</div>
										@else
										<div class="desc">Curta cinco empresas</div>
										@endif


										@if (!empty($user->likes))
											@php
											$count = $user->likes->count();
											if($count>=2)
											{
												$color = 'warning';
											}
											if($count>=5){
												$color = 'success';
											}
											else if ($count<2){
												$color = 'danger';
											}
										@endphp

										<div class="percent">{{$count*20}}%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-{{$color}}" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: {{$count*20}}%">
											<span class="sr-only">{{$count*20}}% Complete (Important)</span>
										</div>
									</div>
										@endif
								</a>
							</li>
						</ul>
					</li>
					<!-- settings end -->
					<!-- notification dropdown start-->
					<li id="header_notification_bar" class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="dashboard#">
							<i class="fa fa-bell-o"></i>

								@if(!empty($user->parceiro))

									@if($user->parceiro->pedidos == 'negado')
									<span class="badge bg-warning">
									1
									</span>
									@elseif($user->parceiro->pedidos == 'Ativo')
									<span class="badge bg-warning">
									1
									</span>
									@else

									@endif

								@endif

						</a>
						<ul class="dropdown-menu extended notification">
							<div class="notify-arrow notify-arrow-yellow"></div>
							<li>
								<p class="yellow">Notificações</p>
							</li>
							@empty(!$user->parceiro)
								@if($user->parceiro->pedidos == 'negado')
								<li>
									<a href="/dashboard/parceiro">
										<span class="label label-danger"><i class="fa fa-ban"></i></span>
										Seu pedido de parceria foi negado!
										<span class="small italic" style="margin-top:4px;">4 mins.</span>
									</a>
								</li>
								@elseif($user->parceiro->pedidos == 'Ativo')
								<li>
									<a href="/dashboard/parceiro">
										<span class="label label-info"><i class="fa fa-check"></i></span>
										Seu pedido de parceria foi aprovado!
										<span class="small italic" style="margin-top:4px;">4 mins.</span>
									</a>
								</li>
								@else

								@endif

							@else
							<li style="padding:5px;">
								<span>Não há Notificações!</span>
							</li>
							@endempty

						</ul>
					</li>
					<!-- notification dropdown end -->
				</ul>
		</div>

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
					<img src={{asset('img/profilezim.png')}} class="img-circle" width="80">
				@else
					<img src={{asset('storage/avatar/'.$user->info->avatar)}} class="img-circle" width="80">
				@endif
				</a><img>
				<h5 class="centered">{{Auth::user()->name}}</h5>
				<li class="mt">
					<a class="@yield('menuPrincipal')" href={{route('dashboard')}}>
						<i class="fa fa-dashboard"></i>
						<span>Painel Infomartivo</span>
					</a>
				</li>
				<li class="sub-menu">
					<a  class="@yield('perfil')" href={{route('userPerfil')}}>
						<i class="fa fa-user"></i>
						<span>Meu perfil</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('listaEmpresas')" href={{route('listaEmp')}}>
						<i class="fa fa-heart"></i>
						<span>Empresas favoritas</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('noticias')"  href={{route('noticia')}}>
						<i class="fa fa-list-alt"></i>
						<span>Notícias</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('eventos')" href={{route('eventosUser')}}>
						<i class="fa fa-star"></i>
						<span>Eventos</span>
					</a>
				</li>
				<li class="sub-menu">
					<a class="@yield('parceiro')"  href={{route('parceiroUser')}}>
						<i class="fa fa-trophy"></i>
						<span>Parceiro</span>
					</a>
				</li>
				@if ($user->permissions->blogueiro == 'sim')
				<li class="sub-menu">
            <a class="@yield('blog')" href="javascript:;">
              <i class="fa fa-plus-square"></i>
              <span>Blog</span>
            </a>
            <ul class="sub" style="background:#D4D4D4 !important;">
                <li><a href={{route('blogUser')}}>Postar</a></li>
                <li><a href={{route('blogUserAnalytics')}}>Estatísticas</a></li>
            </ul>
          </li>
				@endif
			</ul>
		</div>
	</aside>

