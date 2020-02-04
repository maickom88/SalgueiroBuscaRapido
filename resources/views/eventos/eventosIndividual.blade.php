@extends('templetes.site')

@section('links')
    <link href={{asset('css/style-empresa.css')}} rel="stylesheet">
    <link href={{asset('css/style-contato.css')}} rel="stylesheet">
    <link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
    <link rel="stylesheet" href={{asset('css/jBox.all.css')}}>
    <link rel="stylesheet" href={{asset('css/eventos.css')}}>
    <script data-ad-client="ca-pub-1803332419619783" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <style>
    /*.cabecalho::after{
        background:url({{asset('img/img-04.jpg')}})
    }*/
    </style>
@endsection
@section('titulo','SALGUEIRO BUSCA RÁPIDO: '.$evento->nome_evento)

@section('conteudo')

@include('templetes.top-menu')

@php
    $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
    $data1 = $evento->inicio_data_evento;
    $data2 = $evento->fim_data_evento;
    $hora1 = $evento->inicio_hora_evento;
    $hora2 = $evento->fim_hora_evento;

    $hora1 = explode(':', $hora1);
    $hora2 = explode(':', $hora2);

    if($data1 == $data2){
        $data1 = explode('/', $data1);
        $mes = $data1[1];
        $mes = $dataMes[$mes];
        $dataIgual = 'true';
    }
    else{
        $data1 = explode('/', $data1);
        $mes1 = $data1[1];
        $mes1 = $dataMes[$mes1];

        $data2 = explode('/', $data2);
        $mes2 = $data2[1];
        $mes2 = $dataMes[$mes2];
    }
    $str = $evento->nome_evento;
$str2 = str_replace(' ', '-', $str);
@endphp



<section id="header">
    <div class="loader loader-bouncing "></div>
    <div class="cabecalho" >
        <div class="banner-corte">
            <div class="img-banner" style="background:url({{asset('storage/eventos/'.$evento->banner)}})">
            </div>
        </div>
        <div class="banner-center">
            <div class="banner" >
                <img src="{{asset('storage/eventos/'.$evento->banner)}}" style="width:100%; height:100%" alt={{$evento->nome_evento}}>
            </div>
        </div>
    </div>
</section>
<section id="conteudo">
    <div class="container">
        <div class="row">
            <div class="titulo">
                <h2>{{$evento->nome_evento}}</h2>
                <div class="endereco">
                    <i class="fa fa-location-arrow"></i>{{$evento->endereco}}<br>
                    @if(!empty($dataIgual))
                    <i class="fa fa-clock-o"></i> {{$data1[0]}} de {{$mes}} de {{end($data1)}}, <hora>{{$hora1[0]}}-{{$hora2[0]}}</hora><br>
                    @else
                    <i class="fa fa-clock-o"></i> {{$data1[0]}} de {{$mes1}} de {{end($data1)}} - {{$data2[0]}} de {{$mes2}} de {{end($data2)}} , <hora>{{$hora1[0]}}h-{{$hora2[0]}}h</hora><br>
                    @endif
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
                    {!!$evento->descricao_evento!!}
                </div>
            </div>
        </div>
    </div>
</section>
<section id="organizador">
    <div class="container">
            <h4>SOBRE O ORGANIZADOR</h4>
            <div class="sobre">{{$evento->nome_org}} <br>{{$evento->descricao_org}}</div>
            <a href="" class="btn btnOrg"><i class="fa fa-envelope-o"></i> FALE COM O ORGNIZADOR</a>
            <h4 style="text-transform:uppercase; margin-top:20px">{{$evento->nomeclatura}}</h4>
            <div class="sobre">Evento: {{$evento->ingresso}}</div>
    </div>
</section>

<section id="comments">
    <div class="container">
        <h4>COMENTÁRIOS</h4>
        <div class="fb-comments" data-href="http://127.0.0.1:8000/eventos/{{$str2}}_{{$evento->id}}" data-width="" data-numposts="5"></div>
    </div>
</section>

@section('script')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>
@endsection
@endsection
