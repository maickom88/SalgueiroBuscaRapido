@extends('templetes.site')

@section('links')
	<link href={{asset('css/style-empresa.css')}} rel="stylesheet">
	<link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.css">
    <link href={{asset('css/style-painel.css')}} rel="stylesheet">
    <script data-ad-client="ca-pub-1803332419619783" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157182219-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-157182219-1');
    </script>

    <style>
    body{
        background: #353124; !important;
    }
    </style>
@endsection
@section('titulo','SALGUEIRO BUSCA RÁPIDO:'.$empresa->name.'_'.$empresa->id);

@section('conteudo')
@include('templetes.top-menu')


<div class="loader loader-bouncing "></div>
<section class="header-empresa" style="background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url({{asset("../storage/logo-empresas/".$empresa->banner)}}); background-size:cover; background-position:center; background-repeat:no-repeat">
<div class="container ">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="content-empresa">
                <h3>{{$empresa->name}}<span><i class="fas fa-user-check"></i> </span></h3>
                <div class="star-empresa" style="margin-top:5px !important;">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-empresa-icone">
                <div class="haert">
                    <div class="bloco">
                    <i class="fas fa-eye"></i>
                    <span>{{$empresa->views->views}}</span>
                    </div>
                </div>
                <div class="haert">
                    <div  id="sharebloco" onclick="sharepage()" class="bloco">
                    <i class="fas fa-share-alt"></i>
                    Compartilhar
                    <div class="compart" id="sharepage">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></i></a>
                        <a href="#"><i class="fab fa-whatsapp-square"></i></a>
                    </div>
                    </div>
                </div>
                <div class="haert">
                    <div  onclick="likepage({{$empresa->id}})" class="bloco" id="likepage">
                    <i class="fab fa-gratipay"></i>
                        <span id="likesCount">{{$empresa->likes->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <hr class="style2" style="width:100%">
    <div class="footer-emresa">
        <div class="row">
            <div class="col-md-4">
                <i class="fas fa-phone-volume"></i> + {{$empresa->tel}}
            </div>
            <div class="col-md-4">
                <i class="fas fa-map-marker-alt"></i> {{$empresa->location}}
            </div>
            <div class="col-md-4">
                <i class="fas fa-clock"></i>Hoje <span style="color:green"> Aberto agora</span> 08:00 AM - 18:00 PM
            </div>
        </div>
    </div>

</section>

<nav class="navbar-empresa">
    <a href="#galeria">Galeria</a>
    <a href="#detalhes">Detalhes</a>
    <a href="#reviwes">Feedbaks</a>
    <a href="#contato">Localização</a>
</nav>




<section id="galeria">
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#">Listas</a></li>
        <li class="breadcrumb-item " aria-current="page">Lista individual</li>
    </ol>
    </nav>
</div>
    <div class="container galeria-empresa">
        <!-- Grid row -->
        <div class="row">
        </div>

        <div class="gallery"  id="gallery" >
			@php
				 $email = $empresa->permissions->users->email;
			@endphp
			@if(count($empresa->album) > 0)
				@foreach ($empresa->album as $fotos)

				<div class="mb-2 pics animation all 2">
					<img class="img-fluid" src={{asset("storage/album-empresa/".$email."/".$fotos->photo)}} alt="{{$empresa->name}}">
				</div>
				@endforeach
				<div>
			@else
			<h1 style="color:darkgray;">Não há fotos dessa empresa!</h1>
			@endif




    </div>
</section>
<section id="detalhes">
    <div class="container sobre-empresa">
        <div class="sobre">
            <h4>Sobre a Churrascaria</h4>
            <p>{{$empresa->description}}</p>
				@if(!empty($empresa->whatsapp))
				<a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$empresa->whatsapp}}" target="blank">Entrar em contato</a>
				@elseif(!empty($empresa->instagram))
				<a href={{$empresa->instagram}} target="blank">Entrar em contato</a>
				@elseif(!empty($empresa->facebook))
				<a href={{$empresa->facebook}} target="blank">Entrar em contato</a>
				@else

				@endempty

        </div>
        <div class="facilidades">
            <h4>Facilidades</h4>
            <div class="row">
                <div class="col-md-6">
						@if($empresa->facilities->climatizado == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-snowflake"></i>
                        <p>Área climatizada</p>
                    </div>
						@endif
						@if($empresa->facilities->wifi == 'sim')
							<div class="conteudo-facilidades">
                        <i class="fas fa-wifi"></i>
                        <p>Wifi grátis</p>
                    </div>
						@endif
						@if($empresa->facilities->estacionamento == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-car"></i>
                        <p>Espaço para estacionemnto</p>
                    </div>
						@endif
                </div>
                <div class="col-md-6">
						@if($empresa->facilities->cartao == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-credit-card"></i>
                        <p>Aceita todos tipos de cartões de credito</p>
                    </div>
						@endif
						@if($empresa->facilities->delivery == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-truck"></i>
                        <p>Serviço de entrega</p>
                    </div>
						@endif
						@if($empresa->facilities->orcamento == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-comments-dollar"></i>
                        <p>Orçamento grátis</p>
                    </div>
						@endif
                </div>
            </div>
        </div>
        <div class="container tags">
        <h4>Tags</h4>
            <div class="row">
					@empty(!$empresa->tags)
						@foreach ($tags as $tag)
							<a href="#">{{$tag}}</a>
						@endforeach
					@endempty

				</div>
        </div>
    </div>
</section>

<section id="reviwes">
   @include('paginaIndividual.pageComments')
</section>
<section id="contato">
    <div class="container contato-empresa">
        <h4>Deixe seu comentario ou sugestão</h4>
        <form role="form" id="form-data" class="form-horizontal" enctype="multipart/form-data">
					@csrf
				<div class="star-contato">
                <p>Sua classificação para esta listagem:</p>
                <input type="radio" id="vazio" name="estrela"value="" checked>
                <label for="estrela_um"><i class="fas"></i></label>
                <input type="radio" id="estrela_um" name="estrela"value="1">
                <label for="estrela_dois"><i class="fas"></i></label>
                <input type="radio" id="estrela_dois" name="estrela"value="2">
                <label for="estrela_tres"><i class="fas"></i></label>
                <input type="radio" id="estrela_tres" name="estrela"value="3">
                <label for="estrela_quatro"><i class="fas"></i></label>
                <input type="radio" id="estrela_quatro" name="estrela"value="4">
                <label for="estrela_cinco"><i class="fas"></i></label>
                <input type="radio" id="estrela_cinco" name="estrela"value="5">
            </div><div class="mensagem-empresa">
				@if(!Auth::check())

                <div class="tex-input">
                    <label for="nome"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="nome" name="nome">
            	</div>
            	<div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email">
                </div>
				@endif
                <div class="text-area">
                    <textarea id="message" style="font-size:23px; color:#6d6d6dFf" name="message" placeholder="Digite seu comentario..."></textarea>
                </div>
					 <input type="hidden" name="idEmp" value={{$empresa->id}}>
					 <input type="hidden" name="idUser" value={{Auth::id()}}>
            </div>
            <div class="btn-enviar-comentario">
                <label for="enviar">Enviar comentário<i class="fas fa-paper-plane"></i></label>
                <input type="submit" id="enviar" name="enviar">
            </div>
        </form>
    </div>
</section>

@if($empresa->novidades->count() > 0)
<section id="novidades" style="background:#F9F9F9">
@include('paginaIndividual.pageNovidades')
</section>
@endif

<section id="horario-endereco">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="horario">
                    <div class="aberto-fechado text-center">
                        <i class="fas fa-clock"></i><h5>Aberto Agora</h5>
                    </div>
                    <div class="horario-empresa">
                        <div class="hora-aberto">
								@if($array['segunda']=='Fechado')
								<p>Segunda</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
									<p>Segunda</p><span><p>{{substr($array['segunda']->Inicio, 0 , 2)}}h - {{substr($array['segunda']->Fim, 0 , 2)}}h</p></span>
								@endif
                        </div>
								<div class="hora-aberto">
								@if($array['terca']=='Fechado')
								<p>Terça</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
								<p>Terça</p><span><p>{{substr($array['terca']->Inicio, 0 , 2)}}h - {{substr($array['terca']->Fim, 0 , 2)}}h</p></span>
								@endif
                        </div>
                        <div class="hora-aberto">
								@if($array['quarta']=='Fechado')
								<p>Quarta</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Quarta</p><span><p>{{substr($array['quarta']->Inicio, 0 , 2)}}h - {{substr($array['quarta']->Fim, 0 , 2)}}h</p></span>
                        @endif
								</div>
                        <div class="hora-aberto">
								@if($array['quinta']=='Fechado')
								<p>Quinta</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Quinta</p><span><p>{{substr($array['quinta']->Inicio, 0 , 2)}}h - {{substr($array['quinta']->Fim, 0 , 2)}}h</p></span>
                        @endif
								</div>
                        <div class="hora-aberto">
                        @if($array['sexta']=='Fechado')
								<p>Sexta</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
								<p>Sexta</p><span><p>{{substr($array['sexta']->Inicio, 0 , 2)}}h - {{substr($array['sexta']->Fim, 0 , 2)}}h</p></span>
								@endif
								</div>
                        <div class="hora-aberto">
								@if($array['sabado']=='Fechado')
								<p>Sabádo</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Sabádo</p><span><p>{{substr($array['sabado']->Inicio, 0 , 2)}}h - {{substr($array['sabado']->Fim, 0 , 2)}}h</p></span>
                        @endif
								</div>
                        <div class="hora-aberto">
								@if($array['domingo']=='Fechado')
								<p>Domingo</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Domingo</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@endif
								</div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="mapa-empresa">
                    <div class="mapa">
                        <div style="width:100%; height:500px;">
                        {!!$map->render()!!}
                        </div>
                    </div>
                    <div class="endereco">
                        <div class="localizacao-empresa">
									@empty(!$empresa->location)
									 <div class="lo">
                            <i class="fas fa-compass"></i><p>Endereço:</p><span><p>{{$empresa->location}}</p></span>
                            </div>
									@endempty
									 @empty(!$empresa->tel)
                            <div class="lo">
                            <i class="fas fa-tty"></i><p>Telefone:</p><span><p>{{$empresa->tel}}</p></span>
                            </div>
									 @endempty
									 @empty(!$empresa->email)
										<div class="lo">
										<i class="fas fa-envelope"></i><p>Email:</p><span><p>{{$empresa->email}}</p></span>
										</div>
									 @endempty
									 @empty(!$empresa->site)
                            <div class="lo">
                            <i class="fas fa-globe"></i><p>Website:</p><span><p>www.seusite.com</p></span>
                            </div>
									 @endempty
                        </div>
                        <div class="redes">
										@empty(!$empresa->facebook)
											<a href="{{$empresa->facebook}}" target="blank"><i class="fab fa-facebook-f"></i></a>
										@endempty
										@empty(!$empresa->whatsapp)
                                <a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$empresa->whatsapp}}" target="blank"><i class="fab fa-whatsapp"></i></a>
										@endempty
										@empty(!$empresa->instagram)
											<a href="{{$empresa->instagram}}" target="blank"><i class="fab fa-instagram"></i></a>
										@endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="vejamais">
	<div class="container">
			<div class="row card-empresas" >
				@foreach ($empresas as $emp)
					 <div class="col-md-4" style="outline:none !important">
                    <div class="empresa-content">
                        <img src={{asset("storage/logo-empresas/$emp->banner")}} class="img-fluid">

                        <div class="name-empresa">
                            <h4>{{$emp->name}}</h4>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="rodape">
                            <button ID="btn-modal" style="display:none;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">                          </button>

                            <label for="btn-modal"><i class="fas fa-window-restore"></i></label>
                            <i onclick="blue(1)" id="like1"  class="coracao-1 fas fa-heart"></i>
                            <i onclick="share(1)"  class="fas fa-share-alt"></i>
                            <div id="share1" class="share2">
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></i></a>
                                <a href="#"><i class="fab fa-whatsapp-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
				@endforeach





			</div>
	</div>
</section>


@section('script')
<script src="js/picturefill.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.min.js"></script>

@if(!Auth::check())
<script type="text/javascript" src={{asset('js/jBox.all.js')}}></script>
<script type="text/javascript" src={{asset('js/demo.js')}}></script>
@endif

<script>


var successDelete = new jBox('Modal', {
        attach: '#test',
        title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
        content: "Comentário deletado com sucesso!",
        animation: 'zoomIn',
        audio: '../audio/bling2',
        volume: 80,
        closeButton: true,
        delayOnHover: true,
        showCountdown: true
    });
@if(Auth::check())
    function deleteComentario(id){
        var idEmp = {{$empresa->id}}
        var idUser = {{Auth::user()->id}}
        var id = {'idComment':id};
		if(confirm('Deseja excluir esse comentário?')){
		$.ajax({
			type:"POST",
			url:'../../api/empresa/comentario/excluir',
			data: id,
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
                successDelete.open();
				getCommentsPage(idEmp, idUser);
			}
		});
    }
    }

@endif

	$('#lightgallery').lightGallery({
	pager: true
	});
	$(window).on('hashchange', function() {
		if (window.location.hash) {
			var page = window.location.hash.replace('#', '');
			if (page == Number.NaN || page <= 0) {
					return false;
			}else{
					getData(page);
			}
		}
	});
		$(document).on('click', '.pagination a',function(event)
		{
			event.preventDefault();
			$('li').removeClass('active');
			$(this).parent('li').addClass('active');
			var myurl = $(this).attr('href');
			var page=$(this).attr('href').split('page=')[1];
			getData(page);
		});
	function getData(page){
		var id = {{$empresa->id}};
		$.ajax(
		{
			url: '../../api/page-novidades/'+id+'?page=' + page,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#novidades").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}
$(function(){
	getData(1);
	IsLike();
@if(Auth::check())
	$("#form-data").submit(function(e){
		var idEmp = {{$empresa->id}}
        var idUser = {{Auth::user()->id}}
		var mens = $('#message').val();
		if(mens){
		$.ajax({
			type:"POST",
			url:'../../api/empresa/comentar',
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
				$('#vazio').attr('checked', 'checked');
				$('#message').val('');
				load("close");
				getCommentsPage(idEmp, idUser);
			}
		});
		}
		else{
			alert('digite uma mensagem');
		}
	e.preventDefault();
});
@endif
});
$('.card-empresas').slick({
	dots: true,
	infinite: true,
	autoplay:true,
	autoplaySpeed:1700,
	speed: 300,
	slidesToShow: 3,
	slidesToScroll: 3,
	responsive: [
	{
		breakpoint: 1024,
		settings: {
		slidesToShow: 3,
		slidesToScroll: 3,
		infinite: true,
		dots: true
		}
		},
	{
		breakpoint: 600,
		settings: {
				slidesToShow: 2,
				slidesToScroll: 2
		}
		},
	{
		breakpoint: 480,
		settings: {
				slidesToShow: 1,
				slidesToScroll: 1
		}
		},
	{
		breakpoint: 320,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1
		}
	}
	]
	});
</script>
<script>
var modalCommentInfo = new jBox('Modal', {
	attach: '#test',
	title: '<div width="100%" class="text-center"><i class="fa fa-ban fa-3x" style="color: red"></i></div>',
	content: "Para comentar é necessário estar logado na plataforma, caso não possua uma conta <a href='/cadastro'>Clique aqui</a> e cadastre-se, é grátis! ",
	animation: 'zoomIn',
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
@if(!Auth::check()	)
var likeIsLogin = new jBox('Modal', {
	attach: '#test',
	title: '<div width="100%" class="text-center"><h3>Ops</h3></div>',
	content: "Para avaliar é necessário estar logado ou ter um conta na plataforma, se não tiver uma conta <a href='/cadastro'><b>Clique Aqui</b></a> e cadastre-se é grátis!",
	animation: 'pulse',
	audio: '../audio/bling2',
	volume: 80,
	closeButton: true,
	delayOnHover: true,
	showCountdown: true
});
@endif
function IsLike(){
	@if(Auth::check())
	var idUser = {{Auth::user()->id}}
	var idEmp = {{$empresa->id}}
	if(idUser){
	$.get('../../api/likeEmp/'+idEmp+'/'+idUser+'').done(function(data){
		console.log(data);
		if(data[0]>0){
			document.getElementById('likepage').style.background="#00a3ee";
		}
		else{
			document.getElementById('likepage').style.background="rgba(255, 255, 255, 0.2)";
		}
		$('#likesCount').text(data[1]);
	});
	}
	@endif
}
@if(!Auth::check())
	$("#form-data").submit(function(e){
	modalCommentInfo.open();
	e.preventDefault();
});
@endif
var controller = 0;
var aux = 0;
function likepage(idEmp){
	@if(Auth::check())
	var idUser = {{Auth::user()->id}}
		$.get('../../api/empresa/like/'+idEmp+'/'+idUser+'').done(function(data){
			IsLike();
	});
	@else
		likeIsLogin.open();
	@endif
	}

function getCommentsPage(idEmp, idUser){
		$.ajax(
		{
			url: '../../api/empresa/lista-comments-page/'+idEmp+'/'+idUser,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#reviwes").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}
</script>

@endsection
@endsection
