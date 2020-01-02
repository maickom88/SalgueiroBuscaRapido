@extends('templetes.site')



@section('titulo','SALGUEIRO BUSCA RAPIDO: HOME')

@section('conteudo')
<!--Start header-->
@include('templetes.top-menu')
            <!--************************************
               Home Slider Start
            *************************************-->
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
                            <h1>Salgueiro busca rápido!</h1>
                            <div class="listar-description">
                            <p>Encontre tudo o que precisa aqui com apenas poucos cliques!</p>
                            </div>
                            <form class="listar-formtheme listar-formsearchlisting">
                                <span><i class="fas fa-street-view"></i></span>
                                <input type="text" name="search-item" placeholder="Digite o que precisa encontrar aqui!" name="" id="">
                                <select name="select-option">
                                    <option value="">&#xf0ac  Buscar por</option>
                                    <option value="" >&#xf290  Lojas</option>
                                    <option value="">&#xf07a  Mercados</option>
                                    <option value="">&#xf0f0  Clínicas</option>
                                    <option value="">&#xf0e3  Advogados</option>
                                    <option value="">&#xf236  Hotéis</option>
                                    <option value="">&#xf1fb  Farmáçias</option>
                                    <option value="">&#xf0ad  Oficinas</option>
                                    <option value="">&#xf21e  Academias</option>
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
                <div class="col-sm-12 text-center ">
                    <h2>Encontre Tudo aqui!</h2>
                <div class="sub-header">
                    <p>Tenha acesso a um conteudo excluivo, com ofertas promocionais e noticas da cidade<br>
                    basta se cadastra no site e você encontrarar...
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="intro-block">
                    <span class="intro-icon"><i class="fas fa-location-arrow"></i></span>
                    <h3>Melhores empresas</h3>
                    <p >Encontre as melhores empresas na cidade de salgueiro, veja fotos, localização, contato e comentarios dos usurarios!
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="intro-block">
                    <span class="intro-icon"><i class="fas fa-percentage"></i></span>
                    <h3>Descontos e vales</h3>
                    <p>
                    Se cadastre e fique por dentro das melhores ofertas, ganhe descontos exclusivos e saiba das principais promoções nas lojas.
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="intro-block">
                    <span class="intro-icon"><i class="fas far fa-handshake"></i></span>
                    <h3>Compras e vendas</h3>
                    <p>
                    Anucie na aba de compras e vendas salgueiro, venda ou alugue imovéis, carros e qualqueis outros objeto.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center cadastre">
                <a href="cadastro.html">Cadastre-se!</a>
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
                                <p class="card-text">{{substr($emp->description, 0 , 140).'...'}}<a href="#" style="color:blue;">Ler mais</a></p>
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
                        <p>Tenha vantangens com o nosso aplicativo, receba notificaçoes sobre promoções<br>
                        e ofertas exclusivas, saiba sobre eventos noticias da cidade e vagas de emprego!
                        </p>
                        <span class="android"><i class="fab fa-android"></i></span>
                        <span class="ios"><i class="fab fa-apple"></i></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 content-app-2">
                    <button type="button" class="btn"><a href="#">Download</a></button>
                    <button type="button" class="btn orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Newslatter</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  	<div class="modal-dialog modal-newsletter" role="document">
                        <div class="modal-content">
                        			<form action="/examples/actions/confirmation.php" method="post">
				<div class="modal-header">
					<div class="icon-box text-center	">
						<i class="fa fa-envelope fa-3x"></i>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
				</div>
				<div class="modal-body text-center">
					<h4>Inscreva-se</h4>
					<p>Inscreva-se para receber as novidades das empresas, descontos, noticias da cidade e eventos</p>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Digite seu email..." required>
						<input type="submit" class="btn btn-primary" value="Subscribe">
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
        <div class="container">

            <div class="row card-promo">
                <div class="col-md-4 card-conteudo">
                        <div class="promo-atual">
                                <a href="#">%50</a>
                            </div>
                        <div class="card" style="width: 18rem;">

                            <img class="card-img-top" src={{asset('img/img-promo.png')}} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Carne Assada</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Adquirir cupom!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-content">
                        <div class="promo-atual">
                                <a href="#">%70</a>
                            </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src={{asset('img/img-promo-1.png')}} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Adquirir cupom</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-content">
                        <div class="promo-atual">
                                <a href="#">%30</a>
                            </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src={{asset('img/img-promo-3.png')}} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Adquirir cupom!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-content">
                        <div class="promo-atual">
                                <a href="#">%10</a>
                            </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src={{asset('img/img-promo-3.png')}} alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Adquirir cupom</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Fim de promoções-->
    <section class="noticias">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <h2>Notícias e Blog</h2>
                <div class="sub-header">
                    <p>Veja as ultimas postagens!
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 card-content">
                    <div class="card" style="width: 19rem;">
                        <div class="img-card">
                            <div class="gradient">
                                <img class="card-img-top" src={{asset('img/bg-not-3.jpg')}} alt="Card image cap">
                            </div>
                        </div>
                        <div class="avatar">
                            <img src={{asset('img/1.jpg')}} alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Notícias 1</a></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="local">
                            <span><i class="fas fa-calendar-alt"></i></span><p>23 Abril 2019</p><br><span><i class="fas fa-comments"></i></span><p>Comentarios</p><br><span><i class="fas fa-tags"></i></span><p>Blog</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-content">
                    <div class="card" style="width: 19rem;">
                        <div class="img-card">
                            <div class="gradient">
                                <img class="card-img-top" src={{asset('img/bg-not-1.jpg')}} alt="Card image cap">
                            </div>
                        </div>
                        <div class="avatar">
                            <img src={{asset('img/2.jpg')}} alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Notícias 2</a></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="local">
                            <span><i class="fas fa-calendar-alt"></i></span><p>23 Abril 2019</p><br><span><i class="fas fa-comments"></i></span><p>Comentarios</p><br><span><i class="fas fa-tags"></i></span><p>Blog</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-content">
                    <div class="card" style="width: 19rem;">
                        <div class="img-card">
                            <div class="gradient">
                                <img class="card-img-top" src={{asset('img/bg-not-2.jpg')}} alt="Card image cap">
                            </div>
                        </div>
                        <div class="avatar">
                            <img src={{asset('img/3.jpg')}} alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Notícias 3</a></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="local">
                            <span><i class="fas fa-calendar-alt"></i></span><p>23 Abril 2019</p><br><span><i class="fas fa-comments"></i></span><p>Comentarios</p><br><span><i class="fas fa-tags"></i></span><p>Blog</p>
                        </div>
                    </div>
                </div>
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
    <!--End News-->
    <!--buy and sell-->

    <section class="compras">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Anuncie no nosso site e obtenha <span class="type"></span></h1>
                    <p>Tenha uma equipe de markingt gerando seu conteudo<br>
                    Aumente sua venda investindo em camapanhas, tenha tambem relatorios<br>
                    Siaba o que as pessoas pensam sobre sua empresa/serviço!.
                    </p>
                    <div class="btn-empresa">
                        <a href="/contato#contato">Quero anunciar! <i class="fas fa-bullhorn"></i></a>
                        <a href="/contato" class="a-r">Quero detalhes! <i class="fas fa-chart-line"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img">
                        <img src={{asset('img/praosite.png')}} class="img-fluid">
                    </div>
                </div>
            <div>
        </div>
    </section>

    <!--end Buy and sell-->




@endsection





@section('script')

<!--efeito no mouse scroll-->

<!--Slid card-->
<script>



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
