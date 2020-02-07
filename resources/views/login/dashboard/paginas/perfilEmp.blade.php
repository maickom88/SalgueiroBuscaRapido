
@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PERFIL')



@section('perfil', 'active')

@section('conteudo')

<section id="main-content">


<div class="loader loader-bouncing "></div>
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
                            <h4>{{$user->empresas->novidades->count()}}</h4>
							<h6>NOVIDADES PUBLICADAS</h6>

						</div>
					</div>
					<div class="col-md-4 profile-text">
						<h3>{{Auth::user()->name}}</h3>
						<p>Permissão de Empresário<i class="fa fa-user"></i></p>
					</div>
					<div class="col-md-4 centered">
							<div class="profile-pic">
								@if(empty($user->info->avatar))
								<p><img class="avatarImg" src={{asset('img/profilezim.png')}} class="img-circle"></p>
								@else
								<p><img  class="avatarImg" src="" class="img-circle"></p>
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
						<p id="enderecoShow">
						</p>

				@else
				<p>Defina seu endereço</p>
				@endif
			@else
			<p>Defina seu endereço</p>
			@endif
			<br>

			</div>


			<div class="col-md-8 col-md-offset-2 mt">
				<h4>Contato</h4>
			@if(!empty($user->info))
				@if(!empty($user->info->telefone))
					<p id="telefoneShow">

					</p>
				@else
				<p>Defina seu telefone de contato</p>
				@endif
			@else
			<p>Defina seu telefone de contato</p>
			@endif

			<br>


			<p id="emailShow">
				Email: {{Auth::user()->email}}
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
			<form role="form" id="form-data" class="form-horizontal" enctype="multipart/form-data">
				@csrf
			<input type="hidden" name="idUser" id="idUser" value={{Auth::id()}}>
			<div class="form-group">
				<label class="col-lg-2 control-label"> AVATAR</label>
				<div class="col-lg-6">
					<input type="file" id="avatar" name="imagem" class="file-pos">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">INTERESSE</label>
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
			<h4 class="mb">Informações pra contato</h4>
			<div class="form-horizontal">
			<div class="form-group">
				<label class="col-lg-2 control-label">ENDEREÇO</label>
				<div class="col-lg-6">
			<input type="text" placeholder=" " name="endereco" id="endereco" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label">TELEFONE</label>
				<div class="col-lg-6">
			<input type="text" placeholder=" " id="telefone" name="telefone" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
			<button class="btn btn-theme" type="submit">Salvar</button>
			<button class="btn btn-theme04" type="reset">Cancelar</button>
			</form>
			<form id="form-data-senha">
				<div class="col-lg-8 col-lg-offset-2 detailed mt">
				<div class="form-group">
					<span id="mudarSenha" class="btn btn-info">Alterar senha</span>
				</div>
				<div id="inputMudarSenha" class="form-group" style="display:none">
						<input id="password" type="password" placeholder="Nova senha" name="senha" class="form-control"><button class="btn btn-success">Alterar</button>
                        <input type="hidden" name="user" value={{Auth::user()->id}}>
                </div>
			</div>
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
		$('#mudarSenha').click(function(){
			$('#inputMudarSenha').css('display', 'flex');
		});

        function limparInputSenha(){
            $('#password').val('');
            $('#inputMudarSenha').slideUp();
        }


		function carregarEmpresa(){
				var idUser = {{Auth::id()}};

				$.getJSON('../api/painel/info/user/'+idUser , function(data){


				$('#interesse').val(data.interesse);
				$('#endereco').val(data.endereco);
				$('#telefone').val(data.telefone);
				$('#email').val(data.email);
				if(data.avatar){
					$('.avatarImg').attr('src', "{!!asset('storage/avatar/"+data.avatar+"')!!}");
					$('.avatar-menu').attr('src', "{!!asset('storage/avatar/"+data.avatar+"')!!}");
				}
				else{
					$('.avatarImg').attr('src', "{!!asset('img/profilezim.png')!!}");
				}
				$('#enderecoShow').html('Endereço: <br/>'+data.endereco);
				$('#telefoneShow').html('Telefone: '+data.telefone);
				});
		}

	$(function(){
		carregarEmpresa();


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
	var modalSenha = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "A sua senha foi alterada com sucesso!",
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
		content: "Seu telefone só pode conter numeros!",
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
		});
var modalErroSenha = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-times-circle fa-3x" style="color: red"></i></div>',
		content: "Sua senha precisa ser no mínimo 8 caracteres!",
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
			var validtel = $('#telefone').val();

			if($.isNumeric(validtel)){
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
					carregarEmpresa();
					carregarInfo();
				}
			});
			}
			else{
				modalErroNumber.open();
			}


			e.preventDefault();


		});


            $("#form-data-senha").submit(function(e){
            var validpass = $('#password').val();
            if(validpass.length > 7){
                $.ajax({
                type:"POST",
                url:'../api/painel/alterar/senha',
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
                error: function(error){
                    console.log(error);
                },
                complete: function(){
                    load("close");
                    modalSenha.open();
                    carregarEmpresa();
                    carregarInfo();
                    limparInputSenha();
                }
            });
            }
            else{
                modalErroSenha.open();
            }
            e.preventDefault();
        });

});
	</script>
@endsection

@endsection
