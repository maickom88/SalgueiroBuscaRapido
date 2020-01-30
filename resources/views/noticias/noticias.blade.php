@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157182219-1"></script>
    <script data-ad-client="ca-pub-1803332419619783" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-157182219-1');
</script>
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
    @include('noticias.noticiasPaginate')
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
        url: '../api/posts?page=' + page,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#posts").empty().html(data);
        location.hash = page;
    }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
    });
}
</script>
@endsection

