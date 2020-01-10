@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
	<link rel="stylesheet" href={{asset('css/owl.carousel.min.css')}}>
	<link rel="stylesheet" href={{asset('css/owl.carousel.min.css')}}>
@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: NOTÍCIAS')

@section('conteudo')
@include('templetes.top-menu')


@php
    $var = [1,2,3]
@endphp
<section id="posts" class="posts">
    <div class="container">
        <div class="row">
            <div class="search-blog">
                <h3>Buscar Eventos:</h3>
                <form action="" method="">
                    <input type="text"name="search" id="procurar"placeholder="Procurar Evento..." style="outline:none;">
                    <label for="enviar"><i class="fas fa-search"></i></label>
                    <input type="submit" id="enviar">
                </form>
            </div>

    <div style="width: 100%; display:flex; justify-content:center; align-items:center; margin-bottom:60px">

	<div style="width:750px; height:412px;border-radius:5px; overflow:hidden" >

		<div class="owl-carousel owl-theme owl-loaded">
		<div class="owl-stage-outer">
			<div class="owl-stage">
				<div class="owl-item"><img class="img-fluid" src={{'img/bg-not-2.jpg'}} alt=""></div>
				<div class="owl-item"><img class="img-fluid" src={{'img/banner.jpg'}} alt=""></div>
				<div class="owl-item"><img class="img-fluid" src={{'img/banner2.jpg'}} alt=""></div>
			</div>
		</div>
		<div class="owl-nav">
		</div>
		<div class="owl-dots">
			<div class="owl-dot active"><span></span></div>
			<div class="owl-dot"><span></span></div>
			<div class="owl-dot"><span></span></div>
		</div>
</div>
	</div>
	</div>

    </div>
    <div class="container">
        <div class="row mb-4">

        @foreach ($var as $dado)
            <div class="col-md-4 card-content">
                <div class="card" style="width: 19rem;">
                    <div class="img-card">
                        <div class="gradient">
                            <img class="card-img-top" src={{asset('img/bg-not-2.jpg')}} alt="Card image cap">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href={{route('eventos').'/nome_Do_Evento_1'}} >Titulo do evento</a></h5>
								<h5 class="card-text" style="color:#33414E; font-weight:bold">Instituto do if sertão, 2912, salgueiro-PE</h5>
                        <h4 class="card-text" style="color:#33414E; font-weight:bold"><i class="fa fa-clock-o"></i> 20:00</h4>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="local">
                        <span><i class="fas fa-calendar-alt"></i></span><p style="font-size:16px;">7 Janeiro</p><br><span> <span><i class="fa fa-money"></i></span><p style="font-size:16px;">Gratuito</p><br><span><span><i class="fas fa-tags"></i></span><p>Evento</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

<section class="chamada-usuario-cadastro">
    <div class="container-cadastro">
        <h2>SEJA MEMBRO DA NOSSA COMUNIDADE!</h2>
        <p>Se cadastre no site e tenha as melhores notícias</p>
        <a href={{route('cadastro.site')}}>Entrar <i class="fas fa-sign-in-alt"></i></a>
    </div>
</section>
@endsection
@section('script')
	<script src={{asset('js/owl.carousel.min.js')}}></script>
	<script src={{asset('js/owl.animate.js')}}></script>
	<script src={{asset('js/menu-fixo.js')}}></script>
    <script>
		 var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
    </script>
@endsection

