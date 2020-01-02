@extends('templetes.tampletesDashboard.User.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PAINEL')

@section('menuPrincipal', 'active')

@section('conteudo')
<div class="loader loader-bouncing "></div>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
		<div class="col-lg-9 main-chart">


		<div class="row mt">
		<!--  Blog Panel -->
		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="content-panel pn">
			<div id="blog-bg">

			<div class="badge badge-popular">POPULAR</div>
			<div class="blog-title">Titulo da noticia</div>
			</div>
			<div class="blog-text">
			<p>Uma descrição para a noticia aqui exibida, contendo somente alguns caracteres. Assim sendo redirec... <a href="#">Leia mais</a></p>
			</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="content-panel pn" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('../storage/logo-empresas/{{$empresa[0]->banner}}'); background-size:cover;">
			<div id="spotify">
			<div class="col-xs-4 col-xs-offset-8">
			<button class="btn btn-sm btn-clear-g"><i class="fa fa-heart"></i></button>
			</div>
			<div class="sp-title">
			<a href="#" style="color:white"><h3>{{$empresa[0]->name}}</h3></a>
			</div>
			<div class="play">
			<i class="fa fa-play-circle"></i>
			</div>
			</div>
			<p class="followers" style="color:white; font-weight:bold; "><i class="fa fa-user"></i> 12 PESSOAS GOSTARAM</p>
			</div>
			<!-- /grey-panel -->
		</div>
		<!-- /col-md-4-->
		<div class="col-md-4 col-sm-4 mb">
			<div class="content-panel pn" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/negocio.jpg'); background-size:cover;">
			<div id="profile-01">
			<h3>Possui alguma micro empresa ou vende algum produto?</h3>
			<h6 style="padding-bottom:4px; text-transform:uppercase ">QUER AUMENTAR SUAS VENDAS? <br> Se torne nosso parceiro e anuncie na plataforma</h6>

			</div>
			<div class="profile-01 centered">
			<a href="/contato#contato"><p>ANUNCIAR MEU NEGOCIO</p></a>
			</div>
			<div class="centered">
			<h6 style="color:white;"><i class="fa fa-envelope"></i><br/>SALGUEIROBUSCARAPIDO@GMAIL.COM</h6>
			</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<!-- INSTAGRAM PANEL -->
			<div class="instagram-panel pn">
			<i class="fa fa-calendar fa-4x"></i>
			<p>EVENTO<br/>
			</p>
			<p>No momento não há eventos na cidade!</p>
			</div>
		</div>

		<!-- DIRECT MESSAGE PANEL -->
		<div class="col-md-8 mb">
			<div class="message-p pn">
			<div class="message-header">
			<h5>ALGUMA DÚVIDA?</h5>
			</div>
			<div class="row">
			<div class="col-md-3 centered hidden-sm hidden-xs">
			<img src={{asset("img/logofinal1icon.png")}} class="" width="60">
			</div>
			<div class="col-md-9">
			<p>
			<name>Suporte SBR</name>
			Envie alguma mensagem.
			</p>
			<p class="message">Digite alguma sugestão, melhorias para a plataforma ou crítica construtivas, duvidas iremos te responder por email, depois verifique sua caixa de mensagens</p>
			<form id="form-data" class="form-inline" role="form">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="idUser" value="{{Auth::id()}}">
                    <input type="text" name="message" class="form-control" id="message" placeholder="Digite sua mensagem..." required>
                </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
			</form>
			</div>
			</div>
			</div>
			<!-- /Message Panel-->

		</div>
		<!-- /row -->
		<div class="row">


		<!-- /col-md-4-->

		</div>
		<!-- /col-md-8  -->
		</div>
		<div class="row">

		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="product-panel-1 pn">
			<div class="badge badge-hot">10%</div>
			<img src={{asset("img/product.png")}} width="100" style="margin-top:20px;" alt="">
			<h5 class="mt" style="color: #fff;">Roupas em promoções até 40% OFF</h5>

			<a href="#" class="btn btn-small btn-theme04">Visitar ofertas!</a>
			</div>
			</div>
		<!-- /col-md-4 -->
		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="product-panel-2 pn">
			<div class="badge badge-hot">10%</div>
			<img src={{asset("img/product.png")}} width="100" style="margin-top:20px;" alt="">
			<h5 class="mt" style="color: #fff;">Materiais em até 10% OFF</h5>
			<a href="#" class="btn btn-small btn-theme04">Visitar ofertas!</a>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="product-panel-3 pn">
			<div class="badge badge-hot">10%</div>
			<img src={{asset("img/product.png")}} width="100" style="margin-top:20px;" alt="">
			<h5 class="mt" style="color: #fff;">Movéis em até 50% OFF</h5>
			<a href="#" class="btn btn-small btn-theme04">Visitar ofertas!</a>
			</div>
			</div>
		<!-- /col-md-4 -->
		</div>
		<!-- /row -->
		<div class="row">

		<!-- /col-md-4 -->
		<!--  PROFILE 02 PANEL -->
		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="content-panel pn" >
			<div id="profile-02" style="background: url('{{$insta[0]->images->low_resolution->url}}'); background-size:cover; background-position:center;	">
				<span class="label label-info" >SIGA E CURTA NOSSO INSTAGRAM</span><br>
				<a target="_blank"href="https://www.instagram.com/accounts/login/?next=%2Fsrfrank__%2F&source=follow" class="label label-info">SEGUIR</a>
			</div>
			<div class="pr2-social centered">
			<a target="_blank" href="https://www.instagram.com/srfrank__/" target="_blank" id="seguir" style="font-family: 'Dancing Script', cursive; font-size:17px"><i class="fa fa-instagram"></i> <b style="font-size:23px"> Instagram</b></a>
			</div>
			</div>
			<!-- /panel -->
		</div>
		<!--/ col-md-4 -->
		<!-- WEATHER PANEL -->
		<div class="col-md-4 mb">
			<div class="weather pn">
			<i class="fa fa-cloud fa-4x"></i>
			<h2>{{$dados['results']['temp']}}</h2>
			<h4>SALGUEIRO</h4>
			</div>
		</div>
		<!-- /col-md-4 -->
		</div>
		<!-- /row -->
		</div>
		<!-- /col-lg-9 END SECTION MIDDLE -->
		<!-- **********************************************************************************************************************************************************
		RIGHT SIDEBAR CONTENT
		*********************************************************************************************************************************************************** -->
		<div class="col-lg-3 ds">
		<!--COMPLETED ACTIONS DONUTS CHART-->

		<!--new earning end-->
		<!-- RECENT ACTIVITIES SECTION -->
		<h4 class="centered mt">ATIVIDADES RECENTES</h4>
		<!-- First Activity -->
		<div id="atvRecentes">
            @include('atividades.recentes')
        </div>
		<!-- USERS ONLINE SECTION -->
		<h4 class="centered mt">NOSSA EQUIPE DE APOIO</h4>
		<!-- First Member -->
		<div class="desc">
		<div class="thumb">
			<img class="img-circle" src={{asset("img/ui-danro.jpg")}} width="35px" height="35px" align="">
		</div>
		<div class="details">
			<p>
			<a href="#">MICHAEL FRANK</a><br/>

			</p>
		</div>
		</div>
		<!-- Second Member -->
		<div class="desc">
		<div class="thumb">
			<img class="img-circle" src={{asset("img/handreyson.jpg")}} width="35px" height="35px" align="">
		</div>
		<div class="details">
			<p>
			<a href="#">HANDREYSON FERNANDES</a><br/>

			</p>
		</div>
		</div>
		<!-- Third Member -->
		<div class="desc">
		<div class="thumb">
			<img class="img-circle" src={{asset("img/iago-2.jpg")}} width="35px" height="35px">
		</div>
		<div class="details">
			<p>
			<a href="#" >Iago Benício</a><br/>

			</p>
		</div>

		</div>
		<div class="text-center">
			<h4>NOSSO INSTAGRAM</h4>
			<div class="insta-photos mb" >
				<div class="pr2-social centered" style="background:white; padding:10px; height:60px">
					<div class="img-insta" style="float:left;display:flex;justify-content:center; align-items:center">
						<a target="_blank"href={{$insta[1]->link}}><img id="insta-img" class="img-circle" src={{$insta[0]->user->profile_picture}}></a>
					</div>
					<div class="info-insta" style="margin-bottom:5px;">
						@.{{$insta[0]->user->username}} <br>
						<p style="font-size:11px; ">
						A plataforma de salgueiro mais completa
						</p>
					</div>
				</div>
			<div class="img" style="display:flex;justify-content:center; align-items:center; overflow:hidden; width:100%; height: 200px; background:chartreuse;" >
				<img id="igm-insta-zoom" src={{$insta[1]->images->low_resolution->url}} alt="" >
			</div>
			</div>

		</div>
		</div>

		</div>

		<div>

		</div>
	</section>
</section>
@endsection

@section('scripts')



<script type="text/javascript">
function limparInput(){
    $('#message').val('');
}
function load(action){
    var load_div = $(".loader");
    if(action==="open"){
    load_div.addClass("is-active");
    }
    else{
    load_div.removeClass("is-active");
    }
}
var successMessage = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
			content: "Mesagam enviada com sucesso, agradeçemos seu feedback!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
			});

$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});
    $('#form-data').submit(function(e){
        $.ajax({
            type:"POST",
            url:'../api/mensagem',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                load('open');
            },
            success: function(Response){
                console.log(Response);
            },
            error: function(error){
                console.log(error);
            },
            complete: function(){
                load('close');
                limparInput();
                successMessage.open();
            }
        });
        e.preventDefault();
    });


	$(document).ready(function() {
	var unique_id = $.gritter.add({
	// (string | mandatory) the heading of the notification
	title: 'Bem vindo ao seu Painel informativo!',
	// (string | mandatory) the text inside the notification
	text: 'Obtenha todas as promoções, notícias e eventos de salgueiro aqui!',
	// (string | optional) the image to display on the left
	image: 'img/logofinal1icon.png',
	// (bool | optional) if you want it to fade out on its own or just sit there
	sticky: false,
	// (int | optional) the time you want it to be alive for before fading out
	time: 8000,
	// (string | optional) the class name you want to apply to that specific message
	class_name: 'my-sticky-class'
	});

	return false;
});
</script>


@endsection
