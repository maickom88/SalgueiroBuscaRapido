@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: NOTICIAS')

@section('noticias', 'active')

@section('conteudo')
<section id="main-content">
<section class="wrapper site-min-height">
<div class="row mt">
<div class="container" >    
<div class="card mb-3">
<div class="imagem text-center">

<img src={{asset("img/lendo1.jpg")}} style="opacity: 0.4"  class="card-img-top" alt="...">
<div class="titulo-post text-center"style="padding:10px;">
<h4 style="position: relative; z-index:2;color: #fff; font-weight: bold">Titulo do assunto da postagem da pagina</h4>
</div>
</div>
<div class="card-body">
<div class="avatar">
<img src={{asset("img/3.jpg")}} alt="">
</div>
<h5 style="font-size: 15px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-transform: uppercase;color:rgb(78, 78, 78);"class="card-title">Michael frank</h5>
<p style="color:#c4c4c4">Postou <i class="fa fa-pencil-square"></i></p>
<div class="content">
<p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo nihil dolore earum autem, minima ullam cupiditate esse eligendi suscipit dicta similique incidunt consectetur culpa facere, sequi, dignissimos laborum impedit quia quidem praesentium molestiae! Beatae sequi vel, quibusdam tempora architecto explicabo necessitatibus nesciunt, blanditiis in culpa aliquid esse amet ipsa asperiores voluptatum. Hic molestias quidem dolorum sed sint, provident totam explicabo molestiae accusamus praesentium voluptates consequatur quae esse est nulla non, iste exercitationem! Iusto ipsam itaque modi suscipit delectus perspiciatis beatae!... <a href="#">Ler mais</a> </p>

</div>
<hr>
<p class="card-text"><i class="fa fa-calendar"></i><small class="text-muted"> 20/02/2019</small></p>
<p class="card-text"><i class="fa fa-comment"></i><small class="text-muted"><a href="#ss"> Comentar</a></small></p>
<p class="card-text"><i class="fa fa-tag"></i><small class="text-muted"> <a href="#"> Assunto</a></small></p>
<p class="card-text"><i class="fa fa-eye"></i><small class="text-muted"> <a href="#"> Ver mais notícias</a></small></p>

</div>
</div>
</div>
</section>
<!-- /wrapper -->
</section>
@endsection