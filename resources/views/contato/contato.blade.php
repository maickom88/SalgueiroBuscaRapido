@extends('templetes.site')

@section('links')
<meta property="og:locale" content="pt_BR">

<meta property="og:url" content="https://www.salgueirobuscarapido.com/contato">
<meta property="og:title" content="Contato">
<meta property="og:site_name" content="Salgueiro Busca Rápido">
<meta property="og:description" content="Entre em contato com nossa equipe para saber mais!.">
<meta property="og:image" content={{asset('img/LOGOSITE.png')}}>
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:type" content="website">

<link href={{asset('css/style-empresa.css')}} rel="stylesheet">
<link href={{asset('css/style-contato.css')}} rel="stylesheet">
<link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
<link rel="stylesheet" href={{asset('css/jBox.all.css')}}>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157182219-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-157182219-1');
let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  ...
});
window.addEventListener('beforeinstallprompt', (e) => {
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  // Update UI notify the user they can add to home screen
  showInstallPromotion();
});
btnAdd.addEventListener('click', (e) => {
  // hide our user interface that shows our A2HS button
  btnAdd.style.display = 'none';
  // Show the prompt
  deferredPrompt.prompt();
  // Wait for the user to respond to the prompt
  deferredPrompt.userChoice
    .then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('User accepted the A2HS prompt');
      } else {
        console.log('User dismissed the A2HS prompt');
      }
      deferredPrompt = null;
    });
});

window.addEventListener('appinstalled', (evt) => {
  console.log('a2hs installed');
});
</script>
@endsection
@section('titulo','SALGUEIRO BUSCA RÁPIDO: CONTATO')
@section('descricao',"Saiba mais detalhes de como ser nosso parceiro!")
@section('tags', "guia comercial, empresas de salgueiro, parceria, contrato, aumentar vendas, crescer negócios, internet")

@section('conteudo')
@include('templetes.top-menu')
<div class="loader loader-bouncing "></div>
<section class="intro-area contato" id="intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title">ANUNCIE COM A GENTE</h2>
            <div class="sub-header">
                <p class="paragrafo">Obtenha mais vendas com nosso serviço!
                </p>
            </div>
        </div>
      <div class="row">
            <div class="col-sm-12 col-lg-8 text-center">
                <div class="feature-block">
                    <div class="single-feature feature-circule">
                        <div class="circule"></div>
                        <span class="featured-icon"><i class="fa fa-bolt"></i></span>
                        <h3>RAPIDEZ</h3>
                        <p>Sistema com alta performasse, velocidade e requisições amigáveis!</p>
                    </div>
                    <div class="single-feature">
                        <span class="featured-icon"><i class="fa fa-newspaper"></i></span>
                        <h3>NOTÍÇIAS E EVENTOS</h3>
                        <p>Fique por dentro de todas as notícias, novidades e eventos da região!</p>
                    </div>
                    <div class="single-feature">
                        <span class="featured-icon"><i class="fa fa-mobile"></i></span>
                        <h3>TECNOLOGIA PWA</h3>
                        <p>Baixe o nosso aplicativo em qualquer dispositivo que esteja usando!</p>
                    </div>
                    <div class="single-feature">
                        <span class="featured-icon"><i class="fa fa-search"></i></span>
                        <h3>SISTEMA DE BUSCA RÁPIDA</h3>
                        <p>Tenha acesso a geolocalização, horários e detalhes das empresas e serviços da cidade!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="feature-mockup" style="display:flex; align-items:center; justify-content:center">
                    <img src="img/contato-img.png" class="img-center img-contato" style="width:1000px !important; margin-bottom:20%;margin-right:150px;">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="intro-area more " id="intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">NOSSAS GARANTIAS</h2>
            <div class="sub-header">
                <p class="paragrafo">Veja o que mais!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-7 mb-4">
                <img src="img/11.png" class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="feature-list">
                    <ul>
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            <div class="feature-details">
                                <h3>PAINEL EMPRESARIAL</h3>
                                <p>Tenha acesso a um lindo painel e gerencie seu negócio!</p>
                            </div>
                        </li>
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="feature-details">
                                <h3>ANALISES E RELATÓRIOS</h3>
                                <p>Tenha relatórios mensais de visitas!</p>
                            </div>
                        </li>
                         <li>
                            <div class="feature-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="feature-details">
                                <h3>CONQUISTE CLIENTES</h3>
                                <p>Fidelize clientes através de novidades do seu serviço</p>
                            </div>
                        </li>
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-percentage"></i>
                            </div>
                            <div class="feature-details">
                                <h3>ALCENCE MAIS VENDAS</h3>
                                <p>Poste promoções, detalhe seus produtos e serviços e gere mais vendas</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</section>

<section id="contato">
    <div class="container contato-empresa">
        <h4>CONTATO</h4>
        <form  id="form"  >
            @csrf
            <div class="mensagem-empresa">
                <div class="tex-input">
                    <label for="name"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="name" name="name" required>
            </div>
            <div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email" >
            </div>
            <div class="mensagem-empresa">
                <label for="tel"><i class="fas fa-phone"></i></label>
                <input type="text" placeholder="Digite seu telefone" id="tel" name="tel" required>
            </div>
                <div class="text-area">
                    <textarea required id="content" name="content" placeholder="Digite sua mensagem que entraremos em contato..."></textarea>
                </div>
            </div>

            <div class="btn-enviar-comentario">
                <label for="enviar"  id="enviarBTN">Enviar<i class="fas fa-paper-plane"></i></label>
                <div class="checado" id="checado" style="display:none;">
                    <img src={{asset('img/checado.png')}} width="35px" alt="">
                    <span class="btn btn-success" >Enviado com sucesso</span>
                </div>
                <div class="loader" style="display:none;" id="loader">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                </div>
                <input type="submit" id="enviar" name="enviar">
            </div>
        </form>
    </div>
</section>



@endsection

@section('script')


<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<script src={{asset('js/jquery-3.4.1.min.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src={{asset('js/jBox.all.js')}}></script>
<script type="text/javascript" src={{asset('js/demo.js')}}></script>


	<script type="text/javascript">
	$.ajaxSetup({
	headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
	});



	$(function(){
    var numberTelError = new jBox("Tooltip",{
	target:"#enviarBTN",
	theme:"TooltipBorder",
	trigger:"click",adjustTracker:!0,
	closeOnClick:"body",
	closeButton:"box",
	animation:"move",
	position:{x:"left",y:"top"},
	outside:"y",
	pointer:"left:20",
	offset:{x:25},
	content:"Digite apenas números!",
	adjustDistance:{top:55,right:5,bottom:5,left:5},
	zIndex:4e3
	});

	var ModalErrorNumber = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-times fa-3x" style="color: red"></i></div>',
			content: "Seu telefone deve conter apenas números!",
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

	$("#form").submit(function(e){
	e.preventDefault();

	var form = $(this);
	var tel = $('#tel').val();

	dados = {
	nome: $('#name').val(),
	email: $('#email').val(),
	tel: $('#tel').val(),
	content: $('#content').val()
	};

    if($.isNumeric(tel)){
        $.ajax({
        url: 'api/contato/mensagem',
        data:dados,
        type:"POST",
        dataType: "json",

        beforeSend: function(){
        load("open");
        $('#enviarBTN').fadeOut();
        },
        success: function(callback){
        console.log(callback);
        },
        error: function(error){
            console.log(error);
        },
        complete: function(){
        $('#name').val('');
        $('#email').val('');
        $('#tel').val('');
        $('#content').val('');
        load("close");
        $( "#checado" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        $('#enviarBTN').delay( 1500 ).fadeIn( 450 );
        }
        });
    }
    else{
        numberTelError.open();
    }


	});

	});





</script>
<script src={{asset('js/menu-fixo.js')}}></script>
@endsection
