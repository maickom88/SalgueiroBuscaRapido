@extends('templetes.site')



@section('titulo','SALGUEIRO BUSCA RAPIDO: HOME')
@section('descricao',"Encontre os melhores serviços e empresas de salgueiro, tenha acesso a novidades, promoções, eventos da região e notícias tudo sem sair de casa!")
@section('tags', "guia comercial, empresas de salgueiro, notícias da região, novidades, eventos em salgueiro, salgueiro busca rapido")

@section('links')
<meta property="og:locale" content="pt_BR">

<meta property="og:url" content="https://www.salgueirobuscarapido.com">

<meta property="og:title" content="Home">
<meta property="og:site_name" content="Salgueiro Busca Rápido">

<meta property="og:description" content="Econtre as melhores empresas de salgueiro e seus melhores serviços, tenha acesso a
novidades, eventos e notícias da região.">
<meta property="og:image" content={{asset('img/LOGOSITE.png')}}>
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:type" content="website">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157182219-1"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157182219-1');
</script>
<script>
let deferredPrompt; // Allows to show the install prompt
let setupButton;

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    console.log("beforeinstallprompt fired");
    if (setupButton == undefined) {
        setupButton = document.getElementById("setup_button");
    }
    // Show the setup button
    setupButton.style.display = "inline";
    setupButton.disabled = false;
});
function installApp() {
    // Show the prompt
    deferredPrompt.prompt();
    setupButton.disabled = true;
    // Wait for the user to respond to the prompt
    deferredPrompt.userChoice
        .then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('PWA setup accepted');
                // hide our user interface that shows our A2HS button
                setupButton.style.display = 'none';
            } else {
                console.log('PWA setup rejected');
            }
            deferredPrompt = null;
        });
}
window.addEventListener('appinstalled', (evt) => {
    console.log("appinstalled fired", evt);
});
</script>


@endsection
@section('conteudo')
<!--Start header-->
@include('templetes.top-menu')

<div class="loader loader-bouncing "></div>
    <div class="listar-homebannerslider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src={{asset('img/img-05.jpg')}} alt="Primeiro Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src={{asset('img/img-02.jpg')}} alt="Primeiro Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src={{asset('img/img-04.jpg')}} alt="Primeiro Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src={{asset('img/img-01.jpg')}} alt="Segundo Slide">
                </div>
            </div>
        </div>
        <div class="listar-homebanner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="listar-bannercontent">
                            <h1 data-aos="zoom-in">Salgueiro busca rápido!</h1>
                            <div class="listar-description">
                            <p data-aos="zoom-in">Encontre tudo o que precisa aqui com apenas poucos cliques!</p>
                            </div>
                            <form method="POST" action={{route('resultSearch')}} class="listar-formtheme listar-formsearchlisting">
                                @csrf
                                <span><i class="fas fa-street-view"></i></span>
                                <input type="text" name="search-item" placeholder="Digite o que precisa encontrar aqui!" name="" id="">
                                <select name="select-option">
                                    <option value="todos">&#xf0ac  Todos</option>
                                    <option value="Lojas" >&#xf290  Lojas</option>
                                    <option value="Mercados">&#xf07a  Mercados</option>
                                    <option value="Clinicas">&#xf0f0  Clínicas</option>
                                    <option value="Advogados">&#xf0e3  Advogados</option>
                                    <option value="Hoteis">&#xf236  Hotéis</option>
                                    <option value="Farmacias">&#xf1fb  Farmácias</option>
                                    <option value="Oficinas">&#xf0ad  Oficinas</option>
                                    <option value="Academias">&#xf21e  Academias</option>
                                </select>
                                <label for="btn-enviar"class="btn-label-enviar"><i class="fas fa-search-location"></i>Buscar</label>
                                <input type="submit" name="btn-enviar" id="btn-enviar" >
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
                <!--************************************
                        Home Slider End
                *************************************-->

    <!--Exit header-->

    <!--Chamada-usuario-->
    <section class="intro-area white" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center" data-aos="fade-right">
                    <h2>Encontre Tudo aqui!</h2>
                <div class="sub-header">
                    <p>Tenha acesso a um conteúdo exclusivo, com ofertas promocionais e notícias da cidade
                        basta se cadastra no site e você encontrará...
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" data-aos="zoom-in">
                <div class="intro-block">
                    <span class="intro-icon"><i class="fas fa-location-arrow"></i></span>
                    <h3>Melhores empresas</h3>
                    <p >Encontre as melhores empresas na cidade de salgueiro, veja fotos, localização, contato e comentários dos usurários!
                    </p>
                </div>
            </div>
            <div class="col-sm-4" data-aos="zoom-in">
                <div class="intro-block">
                    <span class="intro-icon"><i class="fas fa-percentage"></i></span>
                    <h3>Descontos e vales</h3>
                    <p>
                    Se cadastre e fique por dentro das melhores ofertas, ganhe descontos exclusivos e saiba das principais promoções nas lojas.
                    </p>
                </div>
            </div>
            <div class="col-sm-4" data-aos="zoom-in">
                <div class="intro-block">
                    <span class="intro-icon"><i class="fas far fa-newspaper"></i></span>
                    <h3>Notícias e eventos</h3>
                    <p>
                   Fique por dentro de todas as notícias de salgueiro e região, novidades das empresas, serviços e eventuais eventos da cidade.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center cadastre">
                <a href={{route('cadastro.site')}}>Cadastre-se!</a>
            </div>
        </div>

    </div>
    </section>
    <!--Fim Chamada-->
    <section class="content-services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center ">
                        <h2>Empresas e Serviços</h2>
                        <div class="sub-header">
                            <p>
                                Confira as empresas, sua popularidade, e seus melhores serviços
                            </p>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row card-slide">
                    @foreach ($empresa as $emp)
								<div class="col-md-4 card-content " style="outline:none !important;" data-aos="fade-right"D>
                        <div class="likes">
                            <span>{{$emp->likes->count()}} <i class="fas fa-heart"></i></span>
                        </div>
                        <div class="card" style="width: 19rem;">
                            <div class="img-card">
                                <div class="gradient">
                                    <img class="card-img-top" src={{asset('storage/logo-empresas/'.$emp->banner)}} alt="Banner da empresa, {{$emp->name}}">
                                </div>
                            </div>
                            <div class="avatar">
                                <img src={{asset('storage/logo-empresas/'.$emp->logoMarca)}} alt="Logo marca da empresa, {{$emp->name}}">
                            </div>
                            <div class="tag text-center">
                                <h6 style="text-transform:capitalize">{{$emp->nincho}}</h6>
                            </div>
                            <div class="card-body">
                                @php
                                    $str = $emp->name;
                                    $str2 = str_replace(' ', '-', $str);
                                @endphp
                                <h5 class="card-title"><a href="pagina/{{$str2}}/{{$emp->id}}" >{{$emp->name}}</a></h5>
                                <p class="card-text">{{substr($emp->description, 0 , 140).'...'}}<a href="pagina/{{$str2}}/{{$emp->id}}" style="color:blue;">Ler mais</a></p>
                            </div>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i><span>({{$emp->views->views}} Visitas)<span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="local">
                                <span><i class="fas fa-map-marker-alt"></i></span><p>{{$emp->location}}</p>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
    </section>
    <!--End contedo cards slide-->


    <section class="chamada-app">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-app">
                        <h3>BAIXE TAMBÉM O NOSSO <span>APLICATIVO!</span></h3>
                        <p>Tenha vantagens com o nosso aplicativo, receba notificações sobre promoções <br>
                            ofertas exclusivas, saiba sobre eventos noticias da cidade e vagas de emprego!
                        </p>
                        <span class="android"><i class="fab fa-android"></i></span>
                        <span class="android"><i class="fab fa-windows"></i></span>
                        <span class="ios"><i class="fab fa-apple"></i></span>
                    </div>
                </div>
            </div>
			<div class="row">
					<div class="col-md-12 content-app-2">
						<button data-aos="zoom-in" data-aos-delay="50" type="button" class="btn" onclick="installApp()"><a>Download</a></button>
						<button data-aos="zoom-in" data-aos-duration="100" id="modalNews" type="button" class="btn orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Newslatter</button>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-newsletter" role="document">
							<div class="modal-content">
							<form id="form-data">
                                @csrf
								<div class="modal-header">
									<div class="icon-box text-center	">
										<i class="fa fa-envelope fa-3x"></i>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
								</div>
								<div class="modal-body text-center">
									<h4>Inscreva-se</h4>
									<p>Inscreva-se para receber as novidades das empresas, descontos, noticias da cidade, eventos e vagas de emprego em primeira mão</p>
									<div class="form-group">
										<input id="nomeNews" name="name" type="text" class="mb-4 form-control" placeholder="Digite seu nome..." required>
										<input id="emailNews" name="email" type="email" class="form-control" placeholder="Digite seu email..." required>
										<input type="submit" class="btn btn-primary" value="SE-INSCREVER">
									</div>
							</div>
							</form>
                     </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-----------start news------->
    <!--Promoçoes-->
    @if($promotions->isNotEmpty())
    <section class="promo">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <h2>Promoções</h2>
                <div class="sub-header">
                <p>Veja as promoções e ofertas desse mês adquira!
                </p>
                </div>
            </div>
        </div>
		  @if($promotions->count() > 2)
        <div class="container" style="outline:none;">
            <div class="row card-promo">

                @foreach ($promotions as $promotion)
                    @php
                        $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
                        $data1 = $promotion->data_fim_promocao;
                        $data1 = explode('-', $data1);
                        $mes = $data1[1];
                        $mes = $dataMes[$mes];
                    @endphp
                    <div class="col-md-4 card-conteudo" data-aos="flip-left" style="outline:none">
                        <div class="promo-atual">
                                <a style="outline:none">{{$promotion->desconto}}%</a>
                            </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src={{asset('storage/promocoes/'.$promotion->photo)}} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$promotion->title}}</h5>
                            <p class="card-text">{{$promotion->description}}</p>
                            @if (!empty($promotion->valor))
                                <p>{{$promotion->valor}}R$</p>
                            @endif
                            <p style="padding:5px;text-align:center; background:#00A3EE; border-radius:5px; color:white; box-shadow: 0px 0px 4px rgba(0,0,0,0.4)">Até<b> {{$data1[2]}} de {{$mes}} de {{$data1[0]}}</b></p>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
		  @else
		  <div class="container">
            <div class="row">
					@foreach ($promotions as $promotion)
               <div class="col-md-6">
						 @php
                        $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
                        $data1 = $promotion->data_fim_promocao;
                        $data1 = explode('-', $data1);
                        $mes = $data1[1];
                        $mes = $dataMes[$mes];
                    @endphp
                    <div class="col-md-4 card-conteudo" data-aos="flip-left" style="outline:none">
                        <div class="promo-atual" style="z-index:1 !important">
                                <a style="outline:none">{{$promotion->desconto}}%</a>
                            </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src={{asset('storage/promocoes/'.$promotion->photo)}} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$promotion->title}}</h5>
                            <p class="card-text">{{$promotion->description}}</p>
                            @if (!empty($promotion->valor))
                                <p>{{$promotion->valor}}R$</p>
                            @endif
                            <p style="padding:5px;text-align:center; background:#00A3EE; border-radius:5px; color:white; box-shadow: 0px 0px 4px rgba(0,0,0,0.4)">Até<b> {{$data1[2]}} de {{$mes}} de {{$data1[0]}}</b></p>
                        </div>
                        </div>
                    </div>
					</div>
					@endforeach
            </div>
        </div>
		  @endif
    </section>
    @endif
    <!--Fim de promoções-->
    @if($posts->isNotEmpty())
    <section class="noticias">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <h2>Notícias e Blog</h2>
                <div class="sub-header">
                    <p>Veja as últimas postagens!
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
    <?php
    $str = $post->title;
    $str2 = str_replace(' ', '-', $str);
    ?>

    <div class="col-md-4 card-content" data-aos="flip-left">
    <div class="card" style="width: 19rem;">
        <div class="img-card">
            <div class="gradient">
            <img class="card-img-top" height="182px" src={{asset('storage/posts-header/'.$post->banner)}} alt="Card image cap">
            </div>
        </div>
        <div class="avatar">
            @if(!empty($post->user->info))
                @if(!empty($post->user->info->avatar))
                    <img src={{asset('storage/avatar/'.$post->user->info->avatar)}} alt="">
                @else
                    <img src={{asset('img/profilezim.png')}} alt="">
                @endif
            @else
                <img src={{asset('img/profilezim.png')}} alt="">
            @endif
        </div>
        <div class="card-body">
        <h5 class="card-title"><a href={{route('blog.page').'/'.$str2.'/'.$post->id}} > {{$post->title}}</a></h5>
        @php
            $description = substr($post->conteudo, 0, 200);
            $description =  strip_tags($description);
            $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
            $dataReplace = explode(' ',$post->created_at);
            $data = explode('-', $dataReplace[0]);
            $mes = $data[1];
            $mes = $dataMes[$mes];
        @endphp
        <p class="card-text">{!!$description!!}...</p>
            <a class="lermais" style="padding:5px; border:1px solid #007BFF; border-radius:5px; color:#3e3e3e; outline:none; " href={{route('blog.page').'/'.$str2.'/'.$post->id}}> Ler mais <i class="fas fa-eye"></i></a>
        </div>
        <div class="dropdown-divider"></div>
        <div class="local">
            <span><i class="fas fa-calendar-alt"></i></span> <p>{{end($data)}} de {{$mes}} de {{$data[0]}}</p><br><span><i class="fas fa-comments"></i></span><p>Comentarios</p><br><span><i class="fas fa-tags"></i></span><p>Blog</p>
        </div>
    </div>
</div>

    @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary"><a href={{route('blog.noticias')}}  style="color:white;text-decoration:none;">Ler mais <i class="fas fa-eye"></i></a></button>
                </div>
            </div>
        </div>

    </section>
    @endif
    <!--End News-->
    <!--buy and sell-->

    <section class="compras">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Anuncie no nosso site e obtenha <span class="type"></span></h1>
                    <p data-aos="fade-up">Tenha uma equipe de marketing gerando seu conteúdo
                        Aumente suas vendas investindo em campanhas, tenha também relatórios
                        Saiba o que as pessoas pensam sobre sua empresa/serviço!
                    </p>
                    <div class="btn-empresa">
                        <a href="/contato#contato">Quero anunciar! <i class="fas fa-bullhorn"></i></a>
                        <a href="/contato" class="a-r">Quero detalhes! <i class="fas fa-chart-line"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img" data-aos="fade-up-left">
                        <img src={{asset('img/praosite.png')}} class="img-fluid">
                    </div>
                </div>
            <div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
@endsection





@section('script')

<script>


var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/offline.css',
    '/js/app.js',
    '/images/icons/offlines.png'
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
    '/images/icons/splash-640x1136.png',
    '/images/icons/splash-750x1334.png',
    '/images/icons/splash-1242x2208.png',
    '/images/icons/splash-1125x2436.png',
    '/images/icons/splash-828x1792.png',
    '/images/icons/splash-1242x2688.png',
    '/images/icons/splash-1536x2048.png',
    '/images/icons/splash-1668x2224.png',
    '/images/icons/splash-1668x2388.png',
    '/images/icons/splash-2048x2732.png'
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});



var successNewslatter = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Você está inscrito para receber mais informações!",
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
	$.ajax({
	type:"POST",
	url:'../api/newslatter',
	data: new FormData(this),
	contentType: false,
	cache: false,
	processData: false,
	beforeSend: function(){
		load('open');
	},
	success: function(Response) {
		console.log(Response);
    },
    error: function(error){
        console.log(error);
    },
	complete: function(){
		load('close');
		successNewslatter.open();
        limparNews();
	}
});
    e.preventDefault();
});

function limparNews(){
    $('#nomeNews').val('');
    $('#emailNews').val('');
}

    $('.card-slide').slick({
        dots: true,
        infinite: false,
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
        $('.card-promo').slick({
            dots: true,
            infinite: false,
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
var typed = new Typed(".type", {
  strings: ["mais vendas",
   "mais credibilidade","e mais sucesso!"
        ],
    typeSpeed: 60,
    typeSpeed: 60,
    loop:true
});
</script>
@endsection
