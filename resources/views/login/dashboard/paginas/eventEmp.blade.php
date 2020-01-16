@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: EVENTOS')

@section('eventos', 'active')

@section('conteudo')
<section id="main-content">
<section class="wrapper site-min-height">
<div class="row mt">
<div class="container" >
    @foreach ($eventos as $evento)
        <div class="card mb-3">
        <div class="imagem text-center">

        <img src={{asset("storage/eventos/".$evento->banner)}} style="opacity: 0.4"  class="card-img-top" alt="...">
        <div class="titulo-post text-center"style="padding:10px;">
        <h4 style="position: relative; z-index:2;color: #fff; font-weight: bold">{{$evento->nome_evento}}</h4>
        </div>

        </div>
        <div class="compatilhamento" style="position:relative;margin-top:-20px;left:10%; display:flex">
        <div class="compa" style="margin-right: 10px; width:40px; height:40px; background:cornflowerblue; border-radius:50%; display:flex; justify-content:center; align-items:center">
            <i class="fa fa-facebook fa-2x" style="color:white"></i>
        </div>
        <div class="compa" style="width:40px; height:40px; background:yellowgreen; border-radius:50%; display:flex; justify-content:center; align-items:center">
            <i class="fa fa-whatsapp fa-2x" style="color:white"></i>
        </div>
        </div>
        <div class="card-body" style="margin-top:0;">
        <div class="content">
        <p class="card-text">{!!$evento->descricao_evento!!}<a href="#">Ler mais</a> </p>
        </div>
        <hr>
        <p class="card-text"><i class="fa fa-calendar"></i><small class="text-muted"> 20/02/2019</small></p>
        <p class="card-text"><i class="fa fa-tag"></i><small class="text-muted"> <a href="#">Evento</a></small></p>
        <p class="card-text"><i class="fa fa-eye"></i><small class="text-muted"> <a href="#"> Ver mais eventos</a></small></p>

        </div>
        </div>
    @endforeach

</div>
</section>

</section>
@endsection
