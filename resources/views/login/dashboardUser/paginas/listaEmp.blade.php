@extends('templetes.tampletesDashboard.User.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: EMPRESAS FAVORITAS')

@section('listaEmpresas', 'active')

@section('conteudo')
<section id="main-content">
   <section class="wrapper site-min-height">
<!--------------------------------conteudo das empresa---------->
		<div class="row mt" >
            @if(!empty($novidades[0]))
                @foreach($novidades as $novidade)
                <div class="container">
                    <div class="card mb-3" >
                    <div class="imagem">
                    <img src={{asset('storage/logo-empresas/'.$novidade->empresa->banner)}} width="100%"  class="card-img-top" alt={{$novidade->empresa->name}}>
                    </div>
                    <div class="card-body" >
                    <div class="avatar">
                    <img src={{asset('storage/logo-empresas/'.$novidade->empresa->logoMarca)}} alt="Logo marca">
                    </div>
                    <h5 style="font-size: 15px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-transform: uppercase;color:rgb(78, 78, 78);"class="card-title">{{$novidade->empresa->name}}</h5>
                    <p style="color:#c4c4c4">Postou <i class="fa fa-pencil fa-1  x"></i></p>
                    <p class="card-text">{!!$novidade->content!!}</p>
                    <div class="cont" style="">
                    <div class="page-head">
                    <div class="demo-gallery">
                    <ul id="lightgallery">
                    @php
                        $photos = $novidade->photos;
                    @endphp
                    @foreach ($photos as $photo)
                    <li  class="visi" data-src={{asset("storage/album-novidades/".$novidade->empresa->permissions->users->email.'/'.$photo->album)}}>
                        <a href="">
                        <img class="img-responsive" src={{asset("storage/album-novidades/".$novidade->empresa->permissions->users->email.'/'.$photo->album)}}>
                        <div class="demo-gallery-poster">
                        <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
                        </div>
                        </a>
                    </li>
                    @endforeach
                    </ul>
                    </div>
                    </div>
                    </div>
                    <hr>
                    @php
                    $data = $novidade->created_at;
                    $data = explode(' ', $data);
                    $dataBr = explode('-', $data[0]);
                    $dataBr = $dataBr[2].'/'.$dataBr[1].'/'.$dataBr[0];
                    @endphp
                    <p class="card-text"><i class="fa fa-calendar"></i><small class="text-muted"> Postado {{$dataBr}}</small> </p>
                    </div>
                    </div>
                </div>
            @endforeach
            <div class="row" style="display:flex; align-items:center; justify-content:center">
            {{$novidades->links()}}
        </div>
        @else
        <div class="container" style="padding:5px;">
            <div class="row" style="text-align:center">
            <h3>Você ainda não favoritou uma empresa. Basta clicar no botão de gostei na pagina da empresa e você receberá todas as novidades!</h3>
        </div>

        </div>
        @endif

        </div>
	</section>
</section>

@section('scripts')
	<script src="js/picturefill.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.min.js"></script>
<script>
	$(document).ready(function() {
	$('#lightgallery').lightGallery({
	pager: true
	});
});</script>

<script>
$(document).ready(function(){
	$("#btn-comentar").click(function(){
   $("#comentario").toggle(100);
})
});
$(document).ready(function(){
	$("#mostrarComments").click(function(){
   $(".allComments").toggle(100);
})
});
$(document).ready(function(){
	$("#mostrarComments1").click(function(){
   $(".allComments").toggle(100);
})
});
$(document).ready(function(){
	$('#enviar-comment').click(function(){
		setTimeout(function() {
		$('#enviar-comment').hide()}, 9000);
	})
});
</script>
@endsection

@endsection

