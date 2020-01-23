@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
    <link href={{asset('css/style-empresa.css')}} rel="stylesheet">
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: NOTÍCIA ')

@section('conteudo')
@include('templetes.top-menu')
<section class="blog" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url({{asset('storage/posts-header/'.$post->banner)}}) no-repeat">
    <div class="container-blog text-center">
            <h1>{{$post->title}}</h1>
        <div class="lis">
            <a href="#" style="color:#d1d1d1">Home</a>
            <a class="ponto">.</a>
            <a href="#" style="color:#d1d1d1">Blog</a>
            <a class="ponto">.</a>
            <a href="#">Blog-pagina</a>
        </div>

        <div class="lestget">
            <a href="#postagem">Ler Postagem</a>
        </div>
        <div class="row">
            <div class="post-detalhes">
                <div class="avatar-blog">
                @if(!empty($post->user->info))
                    @if(!empty($post->user->info->avatar))
                        <img src={{asset('storage/avatar/'.$post->user->info->avatar)}} alt="">
                    @else
                        <img src={{asset('img/profilezim.png')}} alt="">
                    @endif
                @else
                    <img src={{asset('img/profilezim.png')}} alt="">
                @endif
                    <p>{{$post->user->name}}</p>
                </div>
                <div class="horario">
                    @php
                    $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
                    $dataReplace = explode(' ',$post->created_at);
                    $data = explode('-', $dataReplace[0]);
                    $mes = $data[1];
                    $mes = $dataMes[$mes];
                    @endphp
                    <i class="fas fa-clock"></i><p>{{end($data)}} {{$mes}} {{$data[0]}}</p>
                </div>
                <div class="coment">
                    <i class="fas fa-comments"></i><p>3 Comentarios</p>
                </div>
                <div class="share-blog">
                    <div class="dropdown">

                        <button style="background-color:transparent; border:none;"class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-share-alt"></i>
                        </button>

                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="fab fa-facebook-square"style="color:black;"></i></a>
                            <a class="dropdown-item" href="#"><i style="color:black;" class="fab fa-whatsapp-square"></i></a>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="postagem" class="postagem">
    <div class="container">
        <div class="artigo">
            <article>
                {!!$post->conteudo!!}
                <div class="dropdown-divider"></div><br>
                <div class="row">
                    <div class="btn-seta">
                        <div class="prev">
                            <i class="fas fa-chevron-left"></i>
                            <a href="#" style="color:#00A3EE; text-decoration:underline">Meu negocio minha vida</a>
                        </div>
                        <div class="next">
                            <a href="#" style="color:#00A3EE; text-decoration:underline">Meu negocio minha vida</a>
                            <i class="fas fa-chevron-right"></i>

                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<section id="reviwes">
    <div class="container comentarios-empresa">
    <h4>Comentarios</h4>
    <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{asset('img/1.jpg')}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>
        </div>
        <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{'img/1.jpg'}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>
        </div>
        <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{asset('img/1.jpg')}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>

        </div>
    </div>
</section>

<section id="contato">
    <div class="container contato-empresa">
        <h4>Adicionar comentário</h4>
        <form action="" method="GET" enctype="multipart/form-data">

            <div class="mensagem-empresa">
                <div class="tex-input">
                    <label for="nome"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="nome" name="nome">
                </div>
                <div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email">
                </div>
                <div class="text-area">
                    <textarea id="message" name="message" placeholder="Digite seu comentario..."></textarea>
                </div>
            </div>
            <div class="btn-enviar-comentario">
                <label for="enviar">Enviar comentário<i class="fas fa-paper-plane"></i></label>
                <input type="submit" id="enviar" name="enviar">
            </div>
        </form>
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
<script>
document.querySelectorAll( 'oembed[url]' ).forEach( element => {
// Create the <a href="..." class="embedly-card"></a> element that Embedly uses
// to discover the media.
const anchor = document.createElement( 'a' );

anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
anchor.className = 'embedly-card';

element.appendChild( anchor );
} );
</script>
@endsection
