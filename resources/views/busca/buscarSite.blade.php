@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
	<link rel="stylesheet" href={{asset('css/owl.carousel.min.css')}}>
@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: NOTÍCIAS')

@section('conteudo')
@include('templetes.top-menu')

 <section class="content-services" >
            @if($empresas->isNotEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center "  style="margin-top:38px;">
                        <h2>Resultado</h2>
                        <div class="sub-header">
                            <p>
                                Esses são os nossos parceiros que oferecem o serviço ideal para o que busca!
                            </p>
                        </div>
                    </div>
                </div>
            <div class="container">
                    <div class="row card-slide">
                    @foreach ($empresas as $emp)
								<div class="col-md-4 card-content " style="outline:none !important;">
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
                                <h5 class="card-title"><a href="/empresa/{{$str2}}/{{$emp->id}}" >{{$emp->name}}</a></h5>
                                <p class="card-text">{{substr($emp->description, 0 , 140).'...'}}<a href="/empresa/{{$str2}}/{{$emp->id}}" style="color:blue;">Ler mais</a></p>
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
                @else
                    <div class="container text-center" style="margin-top:60px;">
                        <a href="http://www.freepik.com">
                        <img  width="700px" class="img-fluid" src={{asset('img/404.png')}} alt="">
                        </a>
                        <div>
                            <a class="btn btn-info" href="">Voltar para home</a>
                        </div>
                    </div>
                @endif
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

