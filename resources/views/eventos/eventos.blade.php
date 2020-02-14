@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
	<link rel="stylesheet" href={{asset('css/owl.carousel.min.css')}}>
	<link rel="stylesheet" href={{asset('css/owl.carousel.min.css')}}>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157182219-1"></script>
<script data-ad-client="ca-pub-1803332419619783" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-157182219-1');
</script>

@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: EVENTOS')
@section('descricao',"Encotre os melhores eventos da cidade aqui!")
@section('tags', "eventos, salgueiro, 2020, 2021, região, melhores, novos, salgueiro busca rapido, festas, novidades")

@section('conteudo')
@include('templetes.top-menu')


@php
    $var = [1,2,3]
@endphp
<section id="posts" class="posts">
    <div class="container">
        <div class="row">


    <div style="width: 100%; display:flex; justify-content:center; align-items:center; margin-bottom:60px">

	<div style="width:750px; height:412px;border-radius:5px; overflow:hidden" >

		<div class="owl-carousel owl-theme owl-loaded" style="padding:10px;">
		<div class="owl-stage-outer">
			<div class="owl-stage">
				<div class="owl-item"><img class="img-fluid"  src={{'img/eventos1.jpg'}} alt="Eventos de salgueiro, salgueiro busca rapido"></div>
				<div class="owl-item"><img class="img-fluid"  src={{'img/eventos2.jpg'}} alt="Econtre os melhores eventos de salgueiro"></div>
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
    <div  id="eventoPaginate" class="container">
        @include('eventos.eventoPaginate')
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

	$(document).ready(function()
	{
		$(document).on('click', '.pagination a',function(event)
		{
			event.preventDefault();

			$('li').removeClass('active');
			$(this).parent('li').addClass('active');

			var myurl = $(this).attr('href');
			var page=$(this).attr('href').split('page=')[1];

			getData(page);
		});

	});

	function getData(page){
		$.ajax(
		{
			url: '../api/evento/eventos?page=' + page,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#eventoPaginate").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}
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
});

</script>
@endsection

