@extends('templetes.tampletesDashboard.User.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: LISTA DE EMPRESAS')

@section('listaEmpresas', 'active')

@section('conteudo')
<section id="main-content">
   <section class="wrapper site-min-height">
<!--------------------------------conteudo das empresas---------->
		<div class="row mt" >
			<div class="container">    
				<div class="card mb-3" >
				<div class="imagem">
				<img src={{asset('img/img-empresa.jpg')}} width="100%"  class="card-img-top" alt="...">
				<div class="likes" >  
				<p style="display:flex; align-items: center; justify-content: center;">
				<i id="like" style="color:#00a3ee" class="fa fa-heart fa-2x tooltips" data-placement="right" data-original-title="Descurtir"></i>
				</p>                   
				<a href="#" style="display: block">Visitar página</a>
				</div>       
				</div>
				<div class="card-body" >
				<div class="avatar">
				<img src={{asset('img/1.jpg')}} alt="">
				</div>
				<h5 style="font-size: 15px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-transform: uppercase;color:rgb(78, 78, 78);"class="card-title">Nome da Empresa</h5>
				<p style="color:#c4c4c4">Postou <i class="fa fa-pencil fa-1  x"></i></p>
				<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam eligendi quas, fugit aspernatur ducimus quisquam quam officia, molestias ea doloremque inventore dolorem voluptas? Eveniet provident numquam, sunt odit totam culpa, harum impedit architecto quasi, deserunt cum. Commodi quidem repellendus maxime accusantium, eaque ad culpa dolor atque in, vitae nemo. Cumque nostrum ea mollitia amet ab deleniti quam, blanditiis enim qui.</p>
				<div class="cont" style="">
				<div class="page-head">
				<div class="demo-gallery">
				<ul id="lightgallery">
				<li  class="visi" data-src={{asset("img/bg-not-1.jpg")}}>
				<a href="">
				<img class="img-responsive" src={{asset("img/bg-not-1.jpg")}}>
				<div class="demo-gallery-poster">
				<img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
				</div>
				</a>
				</li>
				<li data-src={{asset("img/bg-not-2.jpg")}}>
				<a href="">
				<img class="img-responsive" src={{asset("img/bg-not-2.jpg")}}>
				<div class="demo-gallery-poster">
				<img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
				</div>
				</a>
				</li>
				<li data-src={{asset('img/negocio.jpg')}}>
				<a href="">
				<img class="img-responsive" src={{asset('img/negocio.jpg')}}>
				<div class="demo-gallery-poster">
				<img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
				</div>
				</a>
				</li>
				</ul>
				</div>
				</div>
				</div>

				<!--------------------Fim do post empresa---------------------->
				<hr>

				<!-----------------------comentarios da postagem--------------->
				<div class="comentarios mb">
				<div class="comentar">
				<div class="row">
				<div class="col-md-12">
				<button id="btn-comentar" class="btn btn-primary">Comentar</button>
				</div>
				</div>
				<div id="comentario" class="comentario" style="display:none	; transition: all linear 0.5s">
				<form class="form-text" style="margin-left:30px; margin-top: 10px;" >
				<textarea class="form-control" name="texto" id="form" cols="100" rows="4" placeholder="Digite um comentário..."></textarea>
				<input style="margin-top: 10px;" type="submit" class="btn btn-success" id="enviar-comment"value="Enviar">
				</form>
				</div>
				</div>

				<hr style="visibility:hidden">
				<button id="mostrarComments1" class=" btn btn-toolbar mb"><em>Mostrar Comentarios aqui!</em></button>
				<div class="allComments mb mt"  style="display:none;width: auto; height:auto; margin-top: 10px;">	
				<div style="background: #eeeeee;width: auto; height:auto; padding: 10px; border-radius: 5px;" class="comments-all mt">
				<div class="row mt">
				<div class="col-md-2">
				<div class="avata mb text-center" style="width: 100%; height:100%" >

				<div class="img-avatar"  style=" width: 50px; height:50px; margin-left: 10px; margin-left: 30%;">
				<img src={{asset('img/3.jpg')}} alt="" style="width: 50px; height: 50px; border-radius: 50%;">
				</div>
				<h6><b>Michael Frank</b></h6 class="bt">
				</div>
				</div>
				<div class="col-md-10">
				<div class="comment-user mb" style="background: #4FC1E9; padding: 10px; border-radius: 5px; margin-top: 10px;">
				<p style="color: white; padding:10px;">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ipsa reprehenderit ratione eos temporibus animi amet accusamus earum dolorum voluptate.
				</p>
				</div>
				</div>
				</div>				
				</div>
				<div style="background: #eeeeee;width: auto; height:auto; padding: 10px; border-radius: 5px;" class="comments-all mt">
				<div class="row mt">
				<div class="col-md-2">
				<div class="avata mb text-center" style="width: 100%; height:100%" >

				<div class="img-avatar"  style=" width: 50px; height:50px; margin-left: 10px; margin-left: 30%;">
				<img src={{asset('img/5.jpg')}} alt="" style="width: 50px; height: 50px; border-radius: 50%;">
				</div>
				<h6>Rodrigo Figueredo</h6>
				</div>
				</div>
				<div class="col-md-10">
				<div class="comment-user mb" style="background: #4FC1E9; padding: 10px; border-radius: 5px; margin-top: 10px;">
				<p style="color: white; padding:10px;">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ipsa reprehenderit ratione eos temporibus animi amet accusamus earum dolorum voluptate.
				</p>
				</div>
				</div>
				</div>				
				</div>
				</div>
				</div>
				<hr>
				<p class="card-text"><i class="fa fa-calendar"></i><small class="text-muted"> Postado 14/02/2019</small> </p>
				</div>
				</div>
			</div>
		</div>
<!--------------fim dos comentarios ------->
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

