@extends('templetes.site')

@section('links')
    <link href={{asset('css/style-empresa.css')}} rel="stylesheet">
    <link href={{asset('css/style-contato.css')}} rel="stylesheet">
    <link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
    <link rel="stylesheet" href={{asset('css/jBox.all.css')}}>
    <link rel="stylesheet" href={{asset('css/eventos.css')}}>
    <style>
    /*.cabecalho::after{
        background:url({{asset('img/img-04.jpg')}})
    }*/
    </style>
@endsection
@section('titulo','SALGUEIRO BUSCA RÁPIDO: CONTATO')

@section('conteudo')

@include('templetes.top-menu')
<sec    tion id="header">
    <div class="loader loader-bouncing "></div>
    <div class="cabecalho" >
        <div class="banner-corte">
            <div class="img-banner" style="background:url({{asset('img/img-04.jpg')}})">
            </div>
        </div>
        <div class="banner-center">
            <div class="banner">
                <img src={{asset('img/img-04.jpg')}} class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<section id="conteudo">
    <div class="container">
        <div class="row">
            <div class="titulo">
                <h2>Você já deu o primeiro passo?</h2>
                <div class="endereco">
                    <i class="fa fa-location-arrow"></i> Caboclo Eduardo, 120 Petroline-PE<br>
                    <i class="fa fa-clock-o"></i> 11 de janeiro de 2020, <hora>14h-18h</hora><br>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="descricao">
    <div class="container">
        <div class="row">
            <div class="descricao">
                <h4>DESCRIÇÃO DO EVENTO</h4>
                <div class="descEvent">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur provident maxime nemo fuga, enim ullam deleniti magnam neque, soluta nulla eaque dolore modi eius consectetur officiis quas eveniet iusto velit impedit exercitationem. Iusto inventore ad, provident fuga cupiditate voluptas consequatur beatae veniam illum esse, dolores tempora assumenda aperiam harum accusamus ab iure quo quas repellendus quasi. Necessitatibus, itaque enim cumque sunt dolores quisquam reiciendis modi. Perspiciatis eaque, accusamus quasi, ullam animi pariatur, asperiores iusto corrupti labore enim incidunt veritatis deserunt eveniet voluptate aut soluta! Ullam aut fugit qui sunt error quasi voluptatibus itaque! Nulla, nostrum blanditiis explicabo in non porro dolorem totam dolores praesentium eligendi debitis voluptas saepe aliquid laboriosam quis accusantium necessitatibus aliquam eos odio! Debitis, quae consequuntur! Eaque repellendus ipsum, voluptate dolores quibusdam aliquid iste recusandae, eos tempora odit ab rem? Totam aut ad facilis excepturi non, et architecto voluptas dolorem at earum officia, impedit vel perspiciatis debitis provident qui ullam eveniet voluptatum molestias atque natus laboriosam commodi. Harum, maiores natus. Vitae ipsa ex reprehenderit asperiores laudantium. Architecto, iusto impedit quidem ab tempora rem perferendis quam facere delectus quaerat explicabo nulla natus odit culpa inventore necessitatibus laudantium at harum optio cupiditate. Provident obcaecati ducimus dolorum laborum! Nostrum, reiciendis.</div>
            </div>
        </div>
    </div>
</section>
<section id="organizador">
    <div class="container">
            <h4>SOBRE O ORGANIZADOR</h4>
            <div class="sobre">Emagrecimento <br>Clinica de estetica</div>
            <a href="" class="btn btnOrg"><i class="fa fa-envelope-o"></i> FALE COM O ORGNIZADOR</a>
    </div>
</section>

<section id="comments">
    <div class="container">
        <h4>COMENTÁRIOS</h4>
<div class="fb-comments" data-href="http://127.0.0.1:8000/eventosIndividuais" data-width="" data-numposts="5"></div>
    </div>
</section>

@section('script')

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>
@endsection
@endsection
