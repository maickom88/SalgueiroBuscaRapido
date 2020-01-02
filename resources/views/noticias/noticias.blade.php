@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: NOTÍCIAS')

@section('conteudo')
@include('templetes.top-menu')
<section class="blog">
    <div class="container-blog text-center">

            <h1>ÚLTIMOS POSTs</h1>
        <div class="lis">
            <a href="#" style="color:#d1d1d1">Home</a>
            <a class="ponto">.</a>
            <a href="#">Blog</a>
        </div>

    <div class="lestget">
            <a href="#posts">Ler Postagens</a>
    </div>

    </div>
</section>


<section id="posts" class="posts">
        <div class="container">
            <div class="row mb-4">
    @foreach ($dados as $dado)
    <?php


        $str = $dado->titulo;

        $str2 = str_replace(' ', '-', $str);


    ?>

    <div class="col-md-4 card-content">
    <div class="card" style="width: 19rem;">
        <div class="img-card">
            <div class="gradient">
            <img class="card-img-top" src={{asset($dado->imagensblog)}} alt="Card image cap">
            </div>
        </div>
        <div class="avatar">
            <img src={{asset($dado->imagens)}} alt="">
        </div>
        <div class="card-body">
        <h5 class="card-title"><a href={{route('blog.page' ,[$dado->titulo])}} > {{$dado->titulo}}</a></h5>
        <p class="card-text">{{substr($dado->artigo, 0, 200)}}...</p>
            <a class="lermais" href={{route('blog.page' ,[$str2, $dado->id ]) }}>Ler mais <i class="fas fa-eye"></i></a>
        </div>
        <div class="dropdown-divider"></div>
        <div class="local">
            <span><i class="fas fa-calendar-alt"></i></span><p>23 Abril 2019</p><br><span><i class="fas fa-comments"></i></span><p>Comentarios</p><br><span><i class="fas fa-tags"></i></span><p>Blog</p>
        </div>
    </div>
</div>

    @endforeach
    </div>
    </div>

        <div class="pagination text-center">
            <div class="voltar">
                <a href="#"><i class="fas fa-chevron-left"></i></a>
            </div>
            <div class="numeracao active">
                <a href="#">1</a>
            </div>
            <div class="numeracao">
                <a href="#">2</a>
            </div>
            <div class="numeracao">
                <a href="#">3</a>
            </div>

            <div class="next">
                <a href="#"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="search-blog">
                <h3>Buscar no Blog:</h3>
                <form action="" method="">
                    <input type="text"name="search" id="procurar"placeholder="Procurar Post...">
                    <label for="enviar"><i class="fas fa-search"></i></label>
                    <input type="submit" id="enviar">
                </form>
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
@section('script')
	<script src={{asset('js/menu-fixo.js')}}></script>
@endsection

