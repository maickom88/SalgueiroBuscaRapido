
@extends('templetes.tampletesDashboard.User.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PERFIL')



@section('perfil', 'active')

@section('conteudo')

<section id="main-content">


	<section class="wrapper site-min-height">
			<div class="row mt">
				<div class="col-lg-12">
					<div class="row content-panel">
					<div class="col-md-4 profile-text mt mb centered">
						<div class="right-divider hidden-sm hidden-xs">
							<h4>{{$user->comments->count()}}</h4>
							<h6>COMENTÁRIOS NA PLATAFORMA</h6>
							<h4>{{$user->likes->count()}}</h4>
							<h6>LIKES NA PLATAFORMA</h6>
                            @if($user->permissions->blogueiro == 'sim')
                            <h4>{{$user->posts->count()}}</h4>
							<h6>PUBLICAÇÕES NO BLOG</h6>
                            @endif
						</div>
					</div>
					<div class="col-md-4 profile-text">
						<h3>{{Auth::user()->name}}</h3>
						@if($user->permissions->blogueiro=="nao")
						<p>Permissão de usúario <i class="fa fa-user"></i></p>
						@else
						<p>Permissão de Blogueiro <i class="fa fa-user"></i></p>
						@endif
						<br>


					</div>
					<div class="col-md-4 centered">
							<div class="profile-pic">
								@if(empty($user->info->avatar))
								<p><img id="avatarUser" src={{asset('img/profilezim.png')}} class="img-circle"></p>
								@else
								<p><img src={{asset('storage/avatar/'.$user->info->avatar)}} class="img-circle"></p>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 mt">
					<div class="row content-panel">
						<div class="panel-heading">
							<ul class="nav nav-tabs nav-justified">
								<li>
								<a data-toggle="tab" href="#contact" class="contact-map">Contato</a>
								</li>
							<li>
							<a data-toggle="tab" href="#edit">Editar perfil</a>
							</li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div id="contact" class="tab-pane active">
			<div class="row">
				<div class="col-md-6">

				</div>
				<div class="col-md-6 detailed">
			<h4>Localização</h4>
			<div class="col-md-8 col-md-offset-2 mt">

			@if(!empty($user->info))
				@if(!empty($user->info->endereco))
						<p>
						    Endereço: <br/> {{$user->info->endereco}}
						</p>

				@else
				<p class="endereco enderecotx" >Defina seu endereço</p>
				@endif
			@else
			<p class="endereco enderecotx">Defina seu endereço</p>
			@endif
			<br>

			</div>


			<div class="col-md-8 col-md-offset-2 mt">
				<h4>Contato</h4>
			@if(!empty($user->info))
				@if(!empty($user->info->telefone))
					<p>
						Telefone: {{$user->info->telefone}}
					</p>
				@else
				<p class="tel telefonetx">Defina seu telefone de contato</p>
				@endif
			@else
			<p class="tel telefonetx">Defina seu telefone de contato</p>
			@endif

			<br>


			<p>
				Email: {{Auth::user()->email}}<br/>
			</p>
			</div>
				</div>
				<!-- /col-md-6 -->
			</div>
			<!-- /row -->
			</div>
			<!-- /tab-pane -->
			<div id="edit" class="tab-pane">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 detailed">
			<h4 class="mb">Informações pessoais</h4>
			<form role="form" action={{route('alterar')}} method="POST" class="form-horizontal" enctype="multipart/form-data">
				@csrf
			<div class="form-group">
				<label class="col-lg-2 control-label"> AVATAR</label>
				<div class="col-lg-6">
					<input type="file" id="exampleInputFile" name="imagem" class="file-pos">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">INTERESSES</label>
				<div class="col-lg-6">
			<select name="interesse" class="form-control interesse" id="inter">
				<option value="roupas, lojas, atacados e varejos">ROUPAS, LOJAS, ATACADOS E VAREJOS</option>
				<option value="suplementos e academias">SUPLEMENTOS E ACADEMIAS</option>
				<option value="construções, corretorias e emprestimos">CONSTRUÇÕES, CORRETORIAS E EMPRESTIMOS</option>
				<option value="saúde, clínicas e consultorios médicos">SAÚDE, CLÍNICAS E CONSULTORIOS MÉDICOS</option>
				<option value="comidas, restaurantes e pizzarias">COMIDAS, RESTAURANTES E PIZZARIAS</option>
				<option value="lazer, festas, ornamentações e organizações">LAZER, FESTAS, ORNAMENTAÇÕES E ORGANIZAÇÕES</option>
				<option value="distrubuidoras, fretes e transportadoras">DISTRIBUIDORAS, FRETES E TRANSPORTADORAS</option>
			</select>
				</div>
			</div>

				</div>
				<div class="col-lg-8 col-lg-offset-2 detailed mt">
			<h4 class="mb">Informações para contato</h4>
			<div class="form-horizontal">
			<div class="form-group">
				<label class="col-lg-2 control-label">ENDEREÇO</label>
				<div class="col-lg-6">
			<input type="text" placeholder=" " name="endereco" id="addr2" class="endereco form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label">TELEFONE</label>
				<div class="col-lg-6">
			<input type="text" placeholder=" " id="telefone" name="telefone" class="tel form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label">EMAIl PARA CONTATO</label>
				<div class="col-lg-6">
			<input type="text" placeholder=" " id="email" name="email" class="email form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
			<button class="btn btn-theme" type="submit">Salvar</button>
			<button class="btn btn-theme04" type="reset">Cancelar</button>
			</form>
	<?php
		$camp = session('info_send');
		if($camp=="ok"):
	?>
		<div style="display: none;" aria-details={{$camp}} id="grabMe">Suas informações foram atualizadas com sucesso!</div>
	<?php
			$camp = "";
			\Session::forget('info_send');
			endif;
	?>
	<?php
		$camp = session('info_send_fail');
		if($camp=="falha"):
	?>
	<div style="display: none;" aria-details={{$camp}} id="grabMe">Erro! Tente novamente.</div>
	<?php
			$camp = "";
			\Session::forget('info_send_fail');
			endif;
	?>
				</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
		</div>
	</section>
</section>

@section('scripts')
<script>

function carregarPerfil(){
		var idUser = {{Auth::id()}};

		$.getJSON('../api/painel/info/user/'+idUser , function(data){

		$('.idade').val(data.idade);
		$('#inter').val(data.interesse);
		$('.endereco').val(data.endereco);
		$('.tel').val(data.telefone);
		$('.email').val(data.email);
		if(data.avatar){
			$('#avatarUser').attr('src', "{!!asset('storage/avatar/"+data.avatar+"')!!}");
		}
		$('.idadetx').text(data.idade);
		$('.enderecotx').html('Endereço: <br/>'+data.endereco);
		$('.telefonetx').html('Telefone: '+data.telefone);
		});
}

$( function(){

carregarPerfil();


var modalInfo = new jBox('Modal', {
attach: '#test',
title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
content: "As informações de sua conta foram salvas com sucesso!",
animation: 'zoomIn',
audio: '../audio/bling2',
volume: 80,
closeButton: true,
delayOnHover: true,
showCountdown: true
});
var modalErroNumber = new jBox('Modal', {
attach: '#test',
title: '<div width="100%" class="text-center"><i class="fa fa-times-circle fa-3x" style="color: red"></i></div>',
content: "Sua idade ou telefone só pode conter numeros!",
animation: 'zoomIn',
audio: '../audio/bling2',
volume: 80,
closeButton: true,
delayOnHover: true,
showCountdown: true
});

function load(action){
	var load_div = $(".loader");
	if(action==="open"){
	load_div.addClass("is-active");
	}
	else{
	load_div.removeClass("is-active");
	}
}


$.ajaxSetup({
	headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
});


$("#form-data").submit(function(e){
	var valid = $('#idade').val()
	var validtel = $('#telefone').val();

	if($.isNumeric(valid) && $.isNumeric(validtel)){
		$.ajax({
		type:"POST",
		url:'../api/painel/info/alterar',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		beforeSend: function(){
			load("open");
		},
		success: function(Response) {
			console.log(Response);

		},
		complete: function(){
			load("close");
			modalInfo.open();
			carregarPerfil();
			carregarInfo();
		}
	});
	}
	else{
		modalErroNumber.open();
	}


	e.preventDefault();


});

});
</script>
@endsection
@endsection
