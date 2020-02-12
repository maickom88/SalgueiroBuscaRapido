 <div class="menu">
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler"style="background-color:  #00a3ee;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i style="color:#fff; font-size: 27px; "class="fas fa-bars"></i></span>
		  </button>
		  <a class="navbar-brand" id="navbarLogo" href="#"><img id="imgNavbarLogo" src={{asset("img/logofinal1.png")}} style="width:130px;" alt="Logo Salgueiro Busca rápido"></a>
        @auth
			<div class="login" id="menuMobileActive" style="display:none;">
				<a id="dropdownMobile" style=" width:40px; height: 40%; cursor:pointer ; display:flex; justify-content:center; align-items:center;"><i class="fas fa-user"></i></a>
			</div>
			@else
			<div class="login" id="loginMobile" style="display:none;" >
				<a href={{route('login.home')}} ><i class="fas fa-sign-in-alt"></i>Entrar</a>
			</div>
		  @endauth

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center">
        <li class="nav-item active">
        <a class="nav-link" href={{route('home')}}>inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href={{route('blog.noticias')}}>Notícias</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href={{route('eventos')}}>Eventos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href={{route('contato.home')}}>Contato</a>
        </li>
        </ul>

		  @auth
          <div class="login-button">
		  @php
				$name = $user->name;
				$name = explode(' ', $name);
		  @endphp
		   <div class="login">
        	 <a id="dropdownUser" style="cursor:pointer"><i class="fas fa-user"></i></a>
		  </div>
		  <div class="balaoUser" id="balao" style="display:none;">
		  <div class="balao10">
			<div ><i id="fecharMenu" style="cursor:pointer;" class="fas fa-times fa-2x"></i></div>
			<div class="row" style="padding:30px;">

				<div class="col-md-6 text-center" style="border-right:1px solid rgba(255,255,255,0.7); ">
					<div class="img-avatar" style="margin-top:18px;">
						@isset($user->info->avatar)
							<img src={{asset('storage/avatar/'.$user->info->avatar)}} class="img-center" alt="" style="width:80px ; border-radius:50%;">
						@else
							<img src={{asset('img/profilezim.png')}} class="img-center" alt="" style="width:80px ; border-radius:50%;">
						@endisset

					</div>
					<p class="mt-4" style="font-size: 24px; margin-bottom:20px; font-weight:bold; ">{{$name[0]}}</p>
					<a style="padding:10px;border-radius:5px; background:#24324F; color:cornsilk; text-decoration:none;" href="/iniciar-sessao">Acessar Conta</a>
				</div>
				<div class="col-md-6 "  style=" padding-left:20px;">
					<ul style="list-style:none;">
						@if ($user->permissions->user == 'sim' and $user->permissions->blogueiro == 'nao')
								<li class="mb-2"><a  href={{route('userPerfil')}} style="text-transform:none">Perfil</a></li>
								<li class="mb-2"><a href={{route('listaEmp')}} style="text-transform:none">Empresas Favoritas</a></li>
								<li class="mb-2"><a href={{route('noticia')}} style="text-transform:none">Notícias da Cidade</a></li>
								<li class="mb-2"><a href={{route('eventosUser')}} style="text-transform:none">Eventos da Cidade</a></li>
								<li class="mb-2"><a href={{route('logoutUser')}} style="text-transform:none">Sair da Conta</a></li>
						@elseif($user->permissions->empresario == 'sim')
								<li class="mb-2"><a  href={{route('perfilEmp')}} style="text-transform:none">Perfil</a></li>
								<li class="mb-2"><a href={{route('editarEmp')}} style="text-transform:none">Pagina da Empresa</a></li>
								<li class="mb-2"><a href={{route('noticiasEmp')}} style="text-transform:none">Notícias da Cidade</a></li>
								<li class="mb-2"><a href={{route('eventoManenger')}} style="text-transform:none">Eventos da Cidade</a></li>
								<li class="mb-2"><a href={{route('logoutEmp')}} style="text-transform:none">Sair da Conta</a></li>
						@elseif($user->permissions->blogueiro == 'sim' and $user->permissions->user == 'sim' )
							<li class="mb-2"><a  href={{route('userPerfil')}} style="text-transform:none">Perfil</a></li>
							<li class="mb-2"><a  href={{route('blogUser')}} style="text-transform:none">Publicar Poste</a></li>
							<li class="mb-2"><a href={{route('listaEmp')}} style="text-transform:none">Empresas Favoritas</a></li>
							<li class="mb-2"><a href={{route('noticia')}} style="text-transform:none">Notícias da Cidade</a></li>
							<li class="mb-2"><a href={{route('eventosUser')}} style="text-transform:none">Eventos da Cidade</a></li>
							<li class="mb-2"><a href={{route('logoutUser')}} style="text-transform:none">Sair da Conta</a></li>
						@elseif($user->permissions->adm == 'sim')
							<li class="mb-2"><a  href={{route('perfilUserManenger')}} style="text-transform:none">Perfil</a></li>
							<li class="mb-2"><a href={{route('empManenger')}} style="text-transform:none">Empresas</a></li>
							<li class="mb-2"><a href={{route('userManenger')}} style="text-transform:none">Usúarios</a></li>
							<li class="mb-2"><a href={{route('contatoManenger')}} style="text-transform:none">Mensagens</a></li>
							<li class="mb-2"><a href={{route('eventoManenger')}} style="text-transform:none">Publicar Evento</a></li>
							<li class="mb-2"><a href={{route('blogManenger')}} style="text-transform:none">Publicar Post</a></li>
							<li class="mb-2"><a href={{route('logoutUser')}} style="text-transform:none">Sair da Conta</a></li>
						@endif

						<div class="dropdown-divider mt-1 mb-2"></div>
						<li class="mb-2"><a rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?text=Já conhece a nova plataforma de Salgueiro?" style="text-transform:none"> <i class="fas fa-user-plus"></i>  Indique um Amigo</a></li>
					</ul>
				</div>
			</div>
			</div>
			</div>
        </div>
		 @else
         <div class="login-button">

		  <div class="login">
        <a href={{route('login.home')}}><i class="fas fa-sign-in-alt"></i>Entrar</a>
		  </div>
         </div>
		  @endauth
        </div>
    </nav>
</div>

@auth
@php
	$name = $user->name;
	$name = explode(' ', $name);
@endphp
<div class="balaoUser" id="balaoMobile" style="display:none;position:absolute;">
<div class="balao10" id="balaoMob">
<div style="padding-left:15px;"><i id="fecharMenuMenu" style="cursor:pointer; "  class="fas fa-times fa-2x"></i></div>
<div class="row" style="padding: 20px;">

	<div class="col-md-6 mb-4 text-center" style="width: 100%;  border-bottom:1px solid rgba(255,255,255,0.7); padding:30px; ">
		<div class="img-avatar">
		@isset($user->info->avatar)
			<img src={{asset('storage/avatar/'.$user->info->avatar)}} class="img-center" alt="" style="width:80px ; border-radius:50%;">
		@else
			<img src={{asset('img/profilezim.png')}} class="img-center" alt="" style="width:80px ; border-radius:50%;">
		@endisset
		</div>
		<p class="mt-4" style="font-size: 24px; margin-bottom:20px; font-weight:bold; ">{{$name[0]}}</p>
		<a style="padding:10px;border-radius:5px; background:#24324F; color:cornsilk; text-decoration:none;" href="">Acessar Conta</a>
	</div>
	<div class="col-md-6 text-center ">
		<ul style="list-style:none;">
			@if ($user->permissions->user == 'sim')
				<li class="mb-2"><a  href={{route('userPerfil')}} style="text-transform:none">Perfil</a></li>
				<li class="mb-2"><a href={{route('listaEmp')}} style="text-transform:none">Empresas Favoritas</a></li>
				<li class="mb-2"><a href={{route('noticia')}} style="text-transform:none">Notícias da Cidade</a></li>
				<li class="mb-2"><a href={{route('eventosUser')}} style="text-transform:none">Eventos da Cidade</a></li>
				<li class="mb-2"><a href={{route('logoutUser')}} style="text-transform:none">Sair da Conta</a></li>
			@elseif($user->permissions->empresario == 'sim')
				<li class="mb-2"><a  href={{route('perfilEmp')}} style="text-transform:none">Perfil</a></li>
				<li class="mb-2"><a href={{route('editarEmp')}} style="text-transform:none">Pagina da Empresa</a></li>
				<li class="mb-2"><a href={{route('noticiasEmp')}} style="text-transform:none">Notícias da Cidade</a></li>
				<li class="mb-2"><a href={{route('eventEmp')}} style="text-transform:none">Eventos da Cidade</a></li>
				<li class="mb-2"><a href={{route('logoutEmp')}} style="text-transform:none">Sair da Conta</a></li>
			@elseif($user->permissions->blogueiro == 'sim')
				<li class="mb-2"><a  href={{route('userPerfil')}} style="text-transform:none">Perfil</a></li>
				<li class="mb-2"><a  href={{route('')}} style="text-transform:none">Publicar Poste</a></li>
				<li class="mb-2"><a href={{route('listaEmp')}} style="text-transform:none">Empresas Favoritas</a></li>
				<li class="mb-2"><a href={{route('noticia')}} style="text-transform:none">Notícias da Cidade</a></li>
				<li class="mb-2"><a href={{route('eventosUser')}} style="text-transform:none">Eventos da Cidade</a></li>
				<li class="mb-2"><a href={{route('logoutUser')}} style="text-transform:none">Sair da Conta</a></li>
			@elseif($user->permissions->adm == 'sim')
				<li class="mb-2"><a  href={{route('perfilUserManenger')}} style="text-transform:none">Perfil</a></li>
				<li class="mb-2"><a href={{route('empManenger')}} style="text-transform:none">Empresas</a></li>
				<li class="mb-2"><a href={{route('userManenger')}} style="text-transform:none">Usúarios</a></li>
				<li class="mb-2"><a href={{route('contatoManenger')}} style="text-transform:none">Mensagens</a></li>
				<li class="mb-2"><a href="" style="text-transform:none">Publicar Evento</a></li>
				<li class="mb-2"><a href="" style="text-transform:none">Publicar Poste</a></li>
				<li class="mb-2"><a href={{route('logoutUser')}} style="text-transform:none">Sair da Conta</a></li>
			@endif
			<div class="dropdown-divider mt-1 mb-2"></div>
			<li class="mb-2"><a href="" style="text-transform:none"> <i class="fas fa-user-plus"></i>  Indique um Amigo</a></li>
		</ul>
	</div>
</div>
</div>
</div>
@endauth
