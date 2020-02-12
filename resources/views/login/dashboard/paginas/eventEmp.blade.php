@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: EVENTOS')

@section('eventos', 'active')

@section('conteudo')
<section id="main-content">
<section class="wrapper site-min-height">
<div class="row mt">
<div class="container" >

    @if(!empty($eventos))
    @foreach ($eventos as $evento)
        <div class="card mb-3">
        <div class="imagem text-center">
             @php
            $str = $evento->nome_evento;
            $str2 = str_replace(' ', '-', $str);
        @endphp
        <img src={{asset("storage/eventos/".$evento->banner)}} style="opacity: 0.4"  class="card-img-top" alt={{$evento->nome_evento}}>
        <div class="titulo-post text-center"style="padding:10px;">
        <h4 style="position:relative;z-index:2;color:#fff;font-weight:bold">{{$evento->nome_evento}}</h4>
        </div>
        </div>
        <div class="compatilhamento" style="position:relative;margin-top:-20px;left:10%; display:flex">
        <div class="compa" style="margin-right: 10px; width:40px; height:40px; background:cornflowerblue; border-radius:50%; display:flex; justify-content:center; align-items:center">
            <div class="fb-share-button" data-href="https://www.salgueirobuscarapido.com/eventos/{{$str2.'/'.$evento->id}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.salgueirobuscarapido.com/eventos/{{$str2.'/'.$evento->id}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i style="color:white" class="fa fa-facebook fa-2x"></i></a></div>
        </div>
        <div class="compa" style="width:40px; height:40px; background:yellowgreen; border-radius:50%; display:flex; justify-content:center; align-items:center">
            <a rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?text={{$evento->nome_evento}}"><i class="fa fa-whatsapp fa-2x" style="color:white"></i></a>
        </div>
        </div>
        <div class="card-body" style="margin-top:0;">
        <div class="content">
        <p class="card-text">{!!$evento->descricao_evento!!}<a href="#">Ler mais</a> </p>
        </div>
        <hr>

        <p class="card-text"><i class="fa fa-calendar"></i><small class="text-muted"> 20/02/2019</small></p>
        <p class="card-text"><i class="fa fa-tag"></i><small class="text-muted"> <a href={{route('eventos')}}>Evento</a></small></p>
        <p class="card-text"><i class="fa fa-eye"></i><small class="text-muted"> <a href={{route('eventos').'/'.$str2.'_'.$evento->id}}> Ver com mais detalhes!</a></small></p>

        </div>
        </div>
    @endforeach
    @else
    <div class="container" style="text-align:center">
        <h1>Ainda não há eventos por aqui!</h1>
    </div>
    @endif
</div>
</section>

</section>
@endsection
