@extends('templetes.site')

@section('links')
@php
    $str = $post->title;
    $str2 = str_replace(' ', '-', $str);
@endphp
<meta property="og:locale" content="pt_BR">

<meta property="og:url" content="{{route('blog.page').'/'.$str2.'/'.$post->id}}">

<meta property="og:title" content="{{$post->title}}">
<meta property="og:site_name" content="{{$post->title}}">

<meta property="og:description" content={{$post->assunto}}>

<meta property="og:image" content="{{asset('storage/posts-header/'.$post->banner)}}">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">

<meta property="og:type" content="article">
<meta property="article:author" content={{$post->user->name}}>
<meta property="article:section" content="postagem">
<meta property="article:tag" content="{{$post->tags}}">
<meta property="article:published_time" content="{{$post->created_at}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
    <link href={{asset('css/style-empresa.css')}} rel="stylesheet">
    <link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
	 <script data-ad-client="ca-pub-1803332419619783" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->

@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: '.$post->title)
@section('descricao',"{{$post->title}}")
@section('tags', "{{$post->tags}}")

@section('conteudo')
@include('templetes.top-menu')
<div class="loader loader-bouncing "></div>
<section class="blog" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url({{asset('storage/posts-header/'.$post->banner)}}) no-repeat">
    <div class="container-blog text-center">
            <h1>{{$post->title}}</h1>
        <div class="lis">
            <a href={{route('home')}} style="color:#d1d1d1">Home</a>
            <a class="#">.</a>
            <a href={{route('blog.noticias')}} style="color:#d1d1d1">Blog</a>
            <a class="#">.</a>
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
                    <i class="fas fa-comments"></i><p>{{$post->comments->count()}} Comentarios</p>
                </div>
                <div class="share-blog">
                    <div class="dropdown">

                        <button style="background-color:transparent; border:none;"class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <?php
                        $str = $post->title;
                        $str2 = str_replace(' ', '-', $str);
                        ?>
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton" style="background:rgba(0, 0, 0, 0.5) !important; padding:4px !important">
                            <div class="fb-share-button" data-href="https://www.salgueirobuscarapido.com/noticias/{{$str2.'/'.$post->id}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.salgueirobuscarapido.com/noticias/{{$str2.'/'.$post->id}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fa fa-facebook"></i></a></div>
                            <a rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?text={{$post->title}}"><i class="fab fa-whatsapp-square"></i></a>
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
                @if(($postRecommend->count() > 1)) <br>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                style="display:block; text-align:center;"
                data-ad-layout="in-article"
                data-ad-format="fluid"
                data-ad-client="ca-pub-1803332419619783"
                data-ad-slot="7439046052"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <div class="dropdown-divider"></div><br>
                <?php
                $str = $postRecommend[0]->title;
                $str2 = str_replace(' ', '-', $str);

                $str3 = $postRecommend[1]->title;
                $str4 = str_replace(' ', '-', $str);
                ?>
                <div class="row">
                    <div class="btn-seta">
                        <div class="prev">
                            <i class="fas fa-chevron-left"></i>
                            <a  href={{route('blog.page').'/'.$str2.'/'.$postRecommend[0]->id}} style="color:#00A3EE; text-decoration:underline">{{$postRecommend[0]->title}}</a>
                        </div>
                        <div class="next">
                            <a href={{route('blog.page').'/'.$str4.'/'.$postRecommend[1]->id}} style="color:#00A3EE; text-decoration:underline">{{$postRecommend[1]->title}}</a>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                @endif
            </article>
        </div>
    </div>
</section>
<section id="reviwes">
   @include('noticias.pageComments')
</section>
<section id="contato">
    <div class="container contato-empresa">
        <h4>Deixe seu comentario ou sugestão</h4>
        <form role="form" id="form-data" class="form-horizontal" enctype="multipart/form-data">
			@csrf
				<div class="star-contato">
                <p>Sua classificação para esta listagem:</p>
                <input type="radio" id="vazio" name="estrela"value="" checked>
                <label for="estrela_um"><i class="fas"></i></label>
                <input type="radio" id="estrela_um" name="estrela"value="1">
                <label for="estrela_dois"><i class="fas"></i></label>
                <input type="radio" id="estrela_dois" name="estrela"value="2">
                <label for="estrela_tres"><i class="fas"></i></label>
                <input type="radio" id="estrela_tres" name="estrela"value="3">
                <label for="estrela_quatro"><i class="fas"></i></label>
                <input type="radio" id="estrela_quatro" name="estrela"value="4">
                <label for="estrela_cinco"><i class="fas"></i></label>
                <input type="radio" id="estrela_cinco" name="estrela"value="5">
            </div><div class="mensagem-empresa">
				@if(!Auth::check())

                <div class="tex-input">
                    <label for="nome"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="nome" name="nome">
            	</div>
            	<div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email">
                </div>
				@endif
                <div class="text-area">
                    <textarea id="message" style="font-size:23px; color:#6d6d6dFf" name="message" placeholder="Digite seu comentario..."></textarea>
                </div>
					 <input type="hidden" name="idPost" value={{$post->id}}>
					 <input type="hidden" name="idUser" value={{Auth::id()}}>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script>

function getCommentsPage(idPost, idUser){
        idPost = idPost;
        idUser = idUser;
		$.ajax(
		{
			url: '../../api/blog/lista-comments-page/'+idPost+'/'+idUser,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#reviwes").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}


var successDelete = new jBox('Modal', {
        attach: '#test',
        title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
        content: "Comentário deletado com sucesso!",
        animation: 'zoomIn',
        audio: '../audio/bling2',
        volume: 80,
        closeButton: true,
        delayOnHover: true,
        showCountdown: true
    });
@if(Auth::check())
    function deleteComentario(id){
        var idPost = {{$post->id}}
        var idUser = {{Auth::user()->id}}
        var id = {'idComment':id};
		if(confirm('Deseja excluir esse comentário?')){
		$.ajax({
			type:"POST",
			url:'../../api/empresa/comentario/excluir',
			data: id,
			beforeSend: function(){
			load("open");
			},
			success: function(Response) {
				console.log(Response);
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
				load("close");
                successDelete.open();
				getCommentsPage(idPost, idUser);
			}
		});
    }
    }

@endif

@if(Auth::check())
	$("#form-data").submit(function(e){
		var mens = $('#message').val();
        var idPost = {{$post->id}}
        var idUser= {{Auth::user()->id}}
        if(mens){
		$.ajax({
			type:"POST",
			url:'../../api/blog/comentar',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function(){
			load("open");
			},
			success: function(Response) {
				console.log(Response);
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
				$('#vazio').attr('checked', 'checked');
				$('#message').val('');
				load("close");
				getCommentsPage(idPost,idUser);
			}
		});
		}
		else{
			alert('digite uma mensagem');
		}
	e.preventDefault();
});
@endif


document.querySelectorAll( 'oembed[url]' ).forEach( element => {
// Create the <a href="..." class="embedly-card"></a> element that Embedly uses
// to discover the media.
const anchor = document.createElement( 'a' );

anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
anchor.className = 'embedly-card';

element.appendChild( anchor );
} );
</script>
<script>


var modalCommentInfo = new jBox('Modal', {
	attach: '#test',
	title: '<div width="100%" class="text-center"><i class="fa fa-ban fa-3x" style="color: red"></i></div>',
	content: "Para comentar é necessário estar logado na plataforma, caso não possua uma conta <a href='/cadastro'>Clique aqui</a> e cadastre-se, é grátis! ",
	animation: 'zoomIn',
	closeButton: true,
	delayOnHover: true,
	showCountdown: true
});


function load(action){
	var load_div = $(".loader");
	if(action==="open"){
	load_div.addClass("is-active");
	}
	else{
	load_div.removeClass("is-active");
	}
}



@if(!Auth::check())
	$("#form-data").submit(function(e){
    modalCommentInfo.open();
	e.preventDefault();
});
@endif






</script>
@endsection
