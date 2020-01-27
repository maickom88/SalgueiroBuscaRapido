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
                    <div class="container text-center" style="margin-top:60px;">
                        <a href="http://www.freepik.com">
                        <img  width="700px" class="img-fluid" src={{asset('img/404.png')}} alt="">
                        </a>
                        <div>
                            <a class="btn btn-info" href="">Voltar para home</a>
                        </div>
                    </div>
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
