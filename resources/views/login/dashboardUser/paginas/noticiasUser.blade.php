@extends('templetes.tampletesDashboard.User.site')

@section('noticias', 'active')

@section('titulo', 'SALGUEIRO BUSCA RAPIDO: NOTICIAS')

@section('conteudo')
<section id="main-content">
<section class="wrapper site-min-height">
<div class="row mt">
<div class="container" >
@if(!empty($post))

<div class="card mb-3">
<div class="imagem text-center">

<img src={{asset("storage/posts-header/".$post->banner)}} style="opacity: 0.4"  class="card-img-top" alt="...">
<div class="titulo-post text-center"style="padding:10px;">
<h4 style="position: relative; z-index:2;color: #fff; font-weight: bold">{{$post->title}}</h4>
</div>
</div>
<div class="card-body">
<div class="avatar">
    @if (!empty($post->user->info))
        <img src={{asset("storage/avatar/".$post->user->info->avatar)}} alt={{$post->user->name}}>
    @else
        <img src={{asset("img/profilezim.png")}} alt="">
    @endif
    </div>
<h5 style="font-size: 15px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-transform: uppercase;color:rgb(78, 78, 78);"class="card-title">{{$post->user->name}}</h5>
<p style="color:#c4c4c4">Postou<i class="fa fa-pencil-square"></i></p>
<div class="content">
    @php
        $description = substr($post->conteudo, 0, 1100);
        $description =  strip_tags($description);
        $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
        $dataReplace = explode(' ',$post->created_at);
        $data = explode('-', $dataReplace[0]);
        $mes = $data[1];
        $mes = $dataMes[$mes];
        $str = $post->title;
        $str2 = str_replace(' ', '-', $str);

    @endphp
<p class="card-text">{{$description}} ...<a href={{route('blog.page').'/'.$str2.'/'.$post->id}} >Ler mais</a> </p>
</div>
<hr>
<p class="card-text"><i class="fa fa-calendar"></i><small class="text-muted">{{end($data)}} de {{$mes}} de {{$data[0]}}</small></p>
<p class="card-text"><i class="fa fa-comment"></i><small class="text-muted"><a href="#ss"> Comentar</a></small></p>
<p class="card-text"><i class="fa fa-tag"></i><small class="text-muted"> <a href="#">{{$post->assunto}}</a></small></p>
<p class="card-text"><i class="fa fa-eye"></i><small class="text-muted"> <a href="/noticias"> Ver mais notícias</a></small></p>

</div>
@else
<div class="row" style="text-align:center">
<h1>
Ainda não há notícias por aqui!</h1>
</div>
@endif

</div>
</div>
</section>
<!-- /wrapper -->
</section>
@endsection
