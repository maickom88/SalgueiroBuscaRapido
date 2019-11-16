@extends('templetes.tampletesDashboard.businessman.site')

@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PERFIL DA EMPRESA')

@section('links')
	  <link
      rel="stylesheet"
      href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"
    />
	 <link rel="stylesheet" href={{asset("css/jquery.fileupload.css")}} />
    <link rel="stylesheet" href={{asset("css/jquery.fileupload-ui.css")}} />
	  <noscript
      ><link rel="stylesheet" href={{asset("css/jquery.fileupload-noscript.css")}}
    /></noscript>
    <noscript
      ><link rel="stylesheet" href={{asset("css/jquery.fileupload-ui-noscript.css")}}
    /></noscript>
@endsection

@section('empresa', 'active')

@section('conteudo')
<div class="loader loader-bouncing "></div>
<section id="main-content">

		<div style="display: none;" id="attoK">Suas informações foram atualizadas com sucesso!</div>
<section class="wrapper site-min-height">
		<div class="row mt">
			<div class="col-lg-12">
				<div class="row content-panel">
				<div class="col-md-4 profile-text mt mb centered">
					<div class="right-divider hidden-sm hidden-xs">
						<h4>13</h4>
						<h6>TOTAL DE COMENTÁRIOS</h6>
						<h4>30</h4>
						<h6>TOTAL DE BUSCAS NA PLATAFORMA</h6>
						<h4>234</h4>
						<h6>TOTAL DE VISUALIZAÇÃO GERAIS</h6>
					</div>
				</div>
				<div class="col-md-4 profile-text">
					<h3>Nome da Empresa</h3>
					<h6 id="descricaoEmp"></h6>
				</div>
				<div class="col-md-4 centered">
						<div class="profile-pic">
							@if(empty($user->empresas->logoMarca))
							<p><img src={{asset('storage/avatar/212511201910055d990a37ee653.jpeg')}} class="img-circle"></p>
							@else
							<p><img  id="avatarImg" src="" class="img-circle"></p>
							<P style="color:#3333">SUA LOGO MARCA</P>
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
							<a data-toggle="tab" href="#contact" class="contact-map">Contato geral da empresa</a>
							</li>
							<li>
							<a data-toggle="tab" href="#album" class="album-map">Album de fotos</a>
							</li>
						<li>
						<a data-toggle="tab" href="#edit">Editar perfil da empresa</a>
						</li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="tab-content">
						<div id="contact" class="tab-pane active">
		<div class="row">
			<div class="col-md-6">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7900.564772948206!2d-39.12842366967682!3d-8.072654217625908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7a09192ada1492f%3A0xeb36df8a71bcc9bf!2sPosto%20Ipiranga!5e0!3m2!1spt-BR!2sbr!4v1569011505394!5m2!1spt-BR!2sbr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
				<p>
					Telefone: {{$user->info->telefone}}
				</p>
			@else
			<p>Defina seu telefone de contato</p>
			@endif
		@else
		<p>Defina seu telefone de contato</p>
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
		<div id="album" class="tab-pane">
			<div class="container galeria-empresa">

				
			<div class="img-unploud mb ">
				<form id="album" enctype="multipart/form-data">
					<label for="carregar-img" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i><span> Adicionar fotos</span></label>
					<input type="file" data="" id="carregar-img" name="imagem[]" multiple="multiple">
					<button type="submit" class="btn btn-theme start">
						<i class="glyphicon glyphicon-upload"></i>
						<span>Fazer upload</span>
						</button>
						<button type="reset" class="btn btn-theme02 cancel">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Cancel upload</span>
						</button>
					
			</div>
			
			<div id="previewAlbum" style="display:none;border: 2px dotted #999 ;background:#D4D4D4; padding:10px; margin-bottom:15px;">
				
				<div class="previaImg" >
					<div id="carregando" style="display:none">
							<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
						</div>
					<label for="carregar-img"><i class="fa fa-plus fa-2x" style="cursor:pointer"></i></label>
					
				</div>
				
			</div>
	</form>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="gallery" id="gallery">
			  	<div class="mb-3 pics animation all 2" style="margin-bottom:10px; position:relative;">
				<div class="fundo-imagem"> 
					<div class="targets-wrapper">
   					 <a class="demo-img" href={{asset("img-empresa/img-1.jpeg")}} data-jbox-image="gallery1"><img width="100%" src={{asset("img-empresa/img-1.jpeg")}} alt=""></a>
					</div>
				</div>
					<button class="btn button button-1" onclick="excluir()" style="position:absolute;">Excluir</button>
					<button class="btn button button-2" style="position:absolute;"><a href=""  class="linkhover" style="color:white">Visualizar</a></button>
			</div>	


			  	<div class="mb-3 pics animation all 2" style="margin-bottom:10px; position:relative;">
				<div class="fundo-imagem"> 
					<div class="targets-wrapper">
   					 <a class="demo-img" href={{asset("img-empresa/img-1.jpeg")}} data-jbox-image="gallery1"><img width="100%" src={{asset("img-empresa/img-1.jpeg")}} alt=""></a>
					</div>
				</div>
					<button class="btn button button-1" onclick="excluir()" style="position:absolute;">Excluir</button>
					<button class="btn button button-2" style="position:absolute;"><a href=""  class="linkhover" style="color:white">Visualizar</a></button>
			</div>	


			  	<div class="mb-3 pics animation all 2" style="margin-bottom:10px; position:relative;">
				<div class="fundo-imagem"> 
					<div class="targets-wrapper">
   					 <a class="demo-img" href={{asset("img-empresa/img-1.jpeg")}} data-jbox-image="gallery1"><img width="100%" src={{asset("img-empresa/img-1.jpeg")}} alt=""></a>
					</div>
				</div>
					<button class="btn button button-1" onclick="excluir()" style="position:absolute;">Excluir</button>
					<button class="btn button button-2" style="position:absolute;"><a href=""  class="linkhover" style="color:white">Visualizar</a></button>
			</div>	


			  	<div class="mb-3 pics animation all 2" style="margin-bottom:10px; position:relative;">
				<div class="fundo-imagem"> 
					<div class="targets-wrapper">
   					 <a class="demo-img" href={{asset("img-empresa/img-1.jpeg")}} data-jbox-image="gallery1"><img width="100%" src={{asset("img-empresa/img-1.jpeg")}} alt=""></a>
					</div>
				</div>
					<button class="btn button button-1" onclick="excluir()" style="position:absolute;">Excluir</button>
					<button class="btn button button-2" style="position:absolute;"><a href=""  class="linkhover" style="color:white">Visualizar</a></button>
			</div>	


			  	<div class="mb-3 pics animation all 2" style="margin-bottom:10px; position:relative;">
				<div class="fundo-imagem"> 
					<div class="targets-wrapper">
   					 <a class="demo-img" href={{asset("img-empresa/img-1.jpeg")}} data-jbox-image="gallery1"><img width="100%" src={{asset("img-empresa/img-1.jpeg")}} alt=""></a>
					</div>
				</div>
					<button class="btn button button-1" onclick="excluir()" style="position:absolute;">Excluir</button>
					<button class="btn button button-2" style="position:absolute;"><a href=""  class="linkhover" style="color:white">Visualizar</a></button>
			</div>	


			  	<div class="mb-3 pics animation all 2" style="margin-bottom:10px; position:relative;">
				<div class="fundo-imagem"> 
					<div class="targets-wrapper">
   					 <a class="demo-img" href={{asset("img-empresa/img-1.jpeg")}} data-jbox-image="gallery1"><img width="100%" src={{asset("img-empresa/img-1.jpeg")}} alt=""></a>
					</div>
				</div>
					<button class="btn button button-1" onclick="excluir()" style="position:absolute;">Excluir</button>
					<button class="btn button button-2" style="position:absolute;"><a href=""  class="linkhover" style="color:white">Visualizar</a></button>
			</div>	







        </div>
		<!-- Grid row -->
	</div>
		</div>		<!-- /tab-pane -->
		<div id="edit" class="tab-pane">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 detailed">
		<h4 class="mb">Informações  da empresa</h4>
		<form role="form" id="form-data" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			
			<input type="hidden" name="idUser" id="idUser" value={{Auth::id()}}>
		<div class="form-group">
			<label class="col-lg-2 control-label">LOGO MARCA</label>
				<div class="col-lg-6">
					<input type="file" id="imagem" name="imagem" class="file-pos">
				</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">NOME</label>
			<div class="col-lg-6">
				<input type="text" id="name" name="name" class="form-control"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">DESCRIÇÃO</label>
			<div class="col-lg-6">
		<textarea type="text"  " id="descricao" name="description" class="form-control"></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-lg-2 control-label">CATEGORIA</label>
			<div class="col-lg-6">
		<select name="tags" class="form-control" id="tags">
			<option value="roupas">ROUPAS</option>
			<option value="suplementos">SUPLEMENTOS</option>
			<option value="construção">CONSTRUÇÃO</option>
			<option value="saúde">SAÚDE</option>
			<option value="academias">ACADEMIAS</option>
			<option value="varejos">VAREJOS</option>
			<option value="comidas">COMIDA</option>
			<option value="lazer">LAZER</option>
			<option value="distrubuidoras">DISTRIBUIDORAS</option>  
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
			<input type="text" placeholder=" " name="location" id="location" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">TELEFONE</label>
			<div class="col-lg-6">
		<input type="text" placeholder=" " id="tel" name="tel" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">WHATSAAP</label>
			<div class="col-lg-6">
		<input type="text" placeholder=" " id="whatsapp" name="whatsapp" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">EMAIl</label>
			<div class="col-lg-6">
		<input type="text" placeholder=" " id="email" name="email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">LINK DO FACEBOOK</label>
			<div class="col-lg-6">
		<input type="text" placeholder=" " id="facebook" name="facebook" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">LINK DO INSTAGRAM</label>
			<div class="col-lg-6">
		<input type="text" placeholder=" " id="instagram" name="instagram" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
		<button class="btn btn-theme" type="submit">Salvar</button>
		<button class="btn btn-theme04" type="reset">Cancelar</button>
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

	<script src="js/picturefill.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.min.js"></script>

<script>
	$(document).ready(function() {
	$('#lightgallery').lightGallery({
	pager: true,
	height:'100%',
	width:'100%',

	});
});

</script>
<script>
var confirm = new jBox('Confirm', {
	attach: '.button-1',
    content: 'Deseja excluir essa foto?',
    cancelButton: 'Não',
    confirmButton: 'Sim agora!'
  });


function excluir() {
	open(confirm);

}
</script>

	<script type="text/javascript">

	function carregarEmpresa(){
			var idUser = {{Auth::id()}};

			$.getJSON('../api/painel/empresa/editar/'+idUser , function(data){
				
			$('#name').val(data.name);
			$('#descricao').val(data.description);
			$('#tags').val(data.nincho);
			$('#location').val(data.location);
			$('#tel').val(data.tel);
			$('#email').val(data.email);
			$('#whatsapp').val(data.whatsapp);
			$('#facebook').val(data.facebook);
			$('#instagram').val(data.instagram);
			$('#avatarImg').attr('src', "{!!asset('storage/logo-empresas/"+data.logoMarca+"')!!}");
			$('#descricaoEmp').append(data.description);
			});
		
				
		}

	$(function(){
		
		
		$('#carregar-img').change(function() {
			$('#previewAlbum').show();
			const file = $(this)[0].files;
			var vali = $('#carregar-img').data("des");
			var array = file.length;
			if(vali == 1 ){
				var files = [];
			}
			
			for(i= 0; i<= array; i++){
				var fileImg = $(this)[0].files[i];
				
				files.push(fileImg);
				console.log(files);
				const fileReader = new FileReader();
				fileReader.onloadend = function(){
					$('#previewAlbum').prepend(
					'<div class="previaImg" id="prevImg" style="background:black !important; border:none;"><div id="prev"><img class="previa" src="'+fileReader.result+'"></div><div class="cancelarOp"><i class="fa fa-times fa-2x" style="cursor:pointer"></i></div></div>'
				);
				}
				fileReader.readAsDataURL(fileImg);	
			
			}
		});

		var modalEmp = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "As informações da sua empresa foram salvas com sucesso",
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
		}); 
		

		carregarEmpresa();
		

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
			
			$.ajax({
				type:"POST",
				url:'../api/painel/empresa/editar/alterar',	
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
					modalEmp.open();
					carregarEmpresa();
				}
			});

			e.preventDefault();


		});

	});

		
	



</script>


@endsection

@endsection