@extends('templetes.site')

@section('links')
	<link href={{asset('css/style-empresa.css')}} rel="stylesheet">
	<link rel="stylesheet" href={{asset("css/slick.css")}}>
	<link rel="stylesheet" href={{asset("css/slick-theme.css")}}>
	<link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
@endsection
@section('titulo','SALGUEIRO BUSCA RÁPIDO: CONTATO')

@section('conteudo')
@include('templetes.top-menu')


<section class="header-empresa" style="background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url({{asset("../storage/logo-empresas/".$empresa->banner)}}); background-size:cover; background-position:center; background-repeat:no-repeat">
<div class="container ">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="content-empresa">
                <h3>{{$empresa->name}}<span><i class="fas fa-user-check"></i> </span></h3>
                <div class="star-empresa" style="margin-top:5px !important;">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-empresa-icone">
                <div class="haert">
                    <div class="bloco">
                    <i class="fas fa-eye"></i> 
                    <span>12</span>
                    </div>
                </div>
                <div class="haert">
                    <div  id="sharebloco" onclick="sharepage()" class="bloco">
                    <i class="fas fa-share-alt"></i>
                    Compartilhar
                    <div class="compart" id="sharepage">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></i></a>
                        <a href="#"><i class="fab fa-whatsapp-square"></i></a>
                    </div>
                    </div>
                </div>
                <div class="haert">
                    <div  onclick="likepage()" class="bloco" id="likepage">
                    <i class="fab fa-gratipay"></i>
                        <span>23</span>
                    </div>
                </div> 
            </div>
        </div>
    </div>
        <hr class="style2" style="width:100%">
    <div class="footer-emresa">
        <div class="row">
            <div class="col-md-4">
                <i class="fas fa-phone-volume"></i> + {{$empresa->tel}}
            </div>
            <div class="col-md-4">
                <i class="fas fa-map-marker-alt"></i> {{$empresa->location}}
            </div>
            <div class="col-md-4">
                <i class="fas fa-clock"></i>Hoje <span style="color:green"> Aberto agora</span> 08:00 AM - 18:00 PM
            </div>
        </div>
    </div>

</section>

<nav class="navbar-empresa">
    <a href="#galeria">Galeria</a>
    <a href="#detalhes">Detalhes</a>
    <a href="#reviwes">Feedbaks</a>
    <a href="#contato">Localização</a>
</nav>




<section id="galeria">
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#">Listas</a></li>
        <li class="breadcrumb-item " aria-current="page">Lista individual</li>
    </ol>
    </nav>
</div>
    <div class="container galeria-empresa">
        <!-- Grid row -->
        <div class="row">
        </div>

        <div class="gallery"  id="gallery" >
			@php
				 $email = $empresa->permissions->users->email;
			@endphp
			@if(count($empresa->album) > 0)
				@foreach ($empresa->album as $fotos)
				
				<div class="mb-2 pics animation all 2">
					<img class="img-fluid" src={{asset("storage/album-empresa/".$email."/".$fotos->photo)}} alt="{{$empresa->name}}">
				</div>
				@endforeach		
				<div>
			@else
			<h1 style="color:darkgray;">Não há fotos dessa empresa!</h1>
			@endif
			


			
    </div>
</section>
<section id="detalhes">
    <div class="container sobre-empresa">
        <div class="sobre">
            <h4>Sobre a Churrascaria</h4>
            <p>{{$empresa->description}}</p>
				@if(!empty($empresa->whatsapp))
				<a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$empresa->whatsapp}}" target="blank">Entrar em contato</a>
				@elseif(!empty($empresa->instagram))
				<a href={{$empresa->instagram}} target="blank">Entrar em contato</a>
				@elseif(!empty($empresa->facebook))
				<a href={{$empresa->facebook}} target="blank">Entrar em contato</a>
				@else
				
				@endempty
            
        </div>
        <div class="facilidades">
            <h4>Facilidades</h4>
            <div class="row">       
                <div class="col-md-6">
						 	@if($empresa->facilities->climatizado == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-snowflake"></i>
                        <p>Área climatizada</p>
                    </div>
						  @endif
						  @if($empresa->facilities->wifi == 'sim')
							<div class="conteudo-facilidades">
                        <i class="fas fa-wifi"></i>
                        <p>Wifi grátis</p>
                    </div>
						  @endif
						  @if($empresa->facilities->estacionamento == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-car"></i>
                        <p>Espaço para estacionemnto</p>
                    </div>
						  @endif
                </div>
                <div class="col-md-6">
						 @if($empresa->facilities->cartao == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-credit-card"></i>
                        <p>Aceita todos tipos de cartões de credito</p>
                    </div>
						  @endif
						  @if($empresa->facilities->delivery == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-truck"></i>
                        <p>Serviço de entrega</p>
                    </div>
						  @endif
						  @if($empresa->facilities->orcamento == 'sim')
                    <div class="conteudo-facilidades">
                        <i class="fas fa-comments-dollar"></i>
                        <p>Orçamento grátis</p>
                    </div>
						  @endif
                </div>
            </div>
        </div>
        <div class="container tags">
        <h4>Tags</h4>
            <div class="row">
					@empty(!$empresa->tags)
						@foreach ($tags as $tag)
							<a href="#">{{$tag}}</a>
						@endforeach
					@endempty
					
				</div>
        </div>
    </div>
</section>
<section id="reviwes">
    <div class="container comentarios-empresa">
    <h4>Feedback</h4>
    <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{asset("img/1.jpg")}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
                <div class="col-md-3">
                    <div class="star-comentarios">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                </div>  
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>    
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>
        </div>
        <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{asset("img/1.jpg")}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
                <div class="col-md-3">
                    <div class="star-comentarios">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                </div>  
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>    
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>

        </div>
    </div>
</section>
<section id="contato">
    <div class="container contato-empresa">
        <h4>Deixe seu comentario ou sugestão</h4>
        <form action="" method="GET" enctype="multipart/form-data">
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
            </div>
            <div class="mensagem-empresa">
                <div class="tex-input">
                    <label for="nome"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="nome" name="nome">
                </div>
                <div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email">
                </div>
                <div class="text-area">
                    <textarea id="message" name="message" placeholder="Digite seu comentario..."></textarea>
                </div>
            </div>
            <div class="btn-enviar-comentario">
                <label for="enviar">Enviar comentário<i class="fas fa-paper-plane"></i></label>
                <input type="submit" id="enviar" name="enviar">    
            </div>
        </form>
    </div>
</section>

<section id="horario-endereco">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="horario">
                    <div class="aberto-fechado text-center">
                        <i class="fas fa-clock"></i><h5>Aberto Agora</h5>
                    </div>
                    <div class="horario-empresa">
                        <div class="hora-aberto">
								@if($array['segunda']=='Fechado')
								<p>Segunda</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
									<p>Segunda</p><span><p>{{substr($array['segunda']->Inicio, 0 , 2)}}h - {{substr($array['segunda']->Fim, 0 , 2)}}h</p></span>
								@endif
                        </div>
								<div class="hora-aberto">
								@if($array['terca']=='Fechado')
								<p>Terça</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
								<p>Terça</p><span><p>{{substr($array['terca']->Inicio, 0 , 2)}}h - {{substr($array['terca']->Fim, 0 , 2)}}h</p></span>
								@endif
                        </div>
                        <div class="hora-aberto">
								@if($array['quarta']=='Fechado')
								<p>Quarta</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Quarta</p><span><p>{{substr($array['quarta']->Inicio, 0 , 2)}}h - {{substr($array['quarta']->Fim, 0 , 2)}}h</p></span>
                        @endif
								</div>
                        <div class="hora-aberto">
								@if($array['quinta']=='Fechado')
								<p>Quinta</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Quinta</p><span><p>{{substr($array['quinta']->Inicio, 0 , 2)}}h - {{substr($array['quinta']->Fim, 0 , 2)}}h</p></span>
                        @endif
								</div>
                        <div class="hora-aberto">
                        @if($array['sexta']=='Fechado')
								<p>Sexta</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
								<p>Sexta</p><span><p>{{substr($array['sexta']->Inicio, 0 , 2)}}h - {{substr($array['sexta']->Fim, 0 , 2)}}h</p></span>
								@endif
								</div>
                        <div class="hora-aberto">
								@if($array['sabado']=='Fechado')
								<p>Sabádo</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Sabádo</p><span><p>{{substr($array['sabado']->Inicio, 0 , 2)}}h - {{substr($array['sabado']->Fim, 0 , 2)}}h</p></span>
                        @endif
								</div>
                        <div class="hora-aberto">
								@if($array['domingo']=='Fechado')
								<p>Domingo</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@else
                        <p>Domingo</p><span><p style="color:rgb(255, 92, 92)">Fechado</p></span>
								@endif
								</div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="mapa-empresa">
                    <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.317439943632!2d-39.13086058682755!3d-8.06906879419024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7a0918c2225e1b9%3A0x6475b4e4b50d38ce!2sAv.+Elisa+Patriota%2C+102-142+-+Nossa+Sra.+de+Gracas%2C+Salgueiro+-+PE%2C+56000-000!5e0!3m2!1spt-BR!2sbr!4v1563834380526!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="endereco">
                        <div class="localizacao-empresa">
									@empty(!$empresa->location)
									 <div class="lo">
                            <i class="fas fa-compass"></i><p>Endereço:</p><span><p>{{$empresa->location}}</p></span>
                            </div>
									@endempty
									 @empty(!$empresa->tel)
                            <div class="lo">
                            <i class="fas fa-tty"></i><p>Telefone:</p><span><p>{{$empresa->tel}}</p></span>
                            </div>
									 @endempty
									 @empty(!$empresa->email)
										<div class="lo">
										<i class="fas fa-envelope"></i><p>Email:</p><span><p>{{$empresa->email}}</p></span>
										</div>
									 @endempty
									 @empty(!$empresa->site)
                            <div class="lo">
                            <i class="fas fa-globe"></i><p>Website:</p><span><p>www.seusite.com</p></span>
                            </div>
									 @endempty
                        </div>
                        <div class="redes">
										@empty(!$empresa->facebook)
											<a href="{{$empresa->facebook}}" target="blank"><i class="fab fa-facebook-f"></i></a>
										@endempty
										@empty(!$empresa->whatsapp)
                                <a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$empresa->whatsapp}}" target="blank"><i class="fab fa-whatsapp"></i></a>
										@endempty
										@empty(!$empresa->instagram)
											<a href="{{$empresa->instagram}}" target="blank"><i class="fab fa-instagram"></i></a>
										@endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="vejamais">
	<div class="container">
			<div class="row card-empresas" >
				@foreach ($empresas as $emp)
					 <div class="col-md-4" style="outline:none !important">
                    <div class="empresa-content">    
                        <img src={{asset("storage/logo-empresas/$emp->banner")}} class="img-fluid">
                        
                        <div class="name-empresa">
                            <h4>{{$emp->name}}</h4>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="rodape">
                            <button ID="btn-modal" style="display:none;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">                          </button>

                            <label for="btn-modal"><i class="fas fa-window-restore"></i></label>
                            <i onclick="blue(1)" id="like1"  class="coracao-1 fas fa-heart"></i>
                            <i onclick="share(1)"  class="fas fa-share-alt"></i>
                            <div id="share1" class="share2">
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></i></a>
                                <a href="#"><i class="fab fa-whatsapp-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
				@endforeach
					
					
					
					
					
			</div>
	</div>
</section>


@section('script')

<script>
    $(function()
    {
        var nav = $('.navbar-empresa');
        $(window).scroll(function()
        {
            if($(this).scrollTop()>400){
                nav.addClass("navbar-empresa-fixo");
            }
            else
            {
                nav.removeClass("navbar-empresa-fixo");
            }
        });
    });
</script>
<script>
$(function () {
$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});
$(function()
{
var nav = $('.menu');
$(window).scroll(function()
{
		if($(this).scrollTop()>410){
			nav.addClass("menu-fixo");
		}
		else
		{
			nav.removeClass("menu-fixo");
		}
});
});


</script>

<script>
    $('.card-empresas').slick({
        dots: true,
        infinite: true,
        autoplay:true,
        autoplaySpeed:1700,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
            }
            },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            },
        {
            breakpoint: 320,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }
        ]
        });
        </script>
<script>
    var controller = 0
    var aux = 0
    function blue(one){
        if(one==1)
        {
            controller++
            if(controller==1 & aux==0){
                document.getElementById('like1').style.backgroundColor="rgba(255, 255, 255, 0.2)"
                document.getElementById('like1').style.color="#00a3ee"
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById('like1').style.backgroundColor="transparent"
                document.getElementById('like1').style.color="white"
                controller=0 
                aux=0
            }
        }
        if(one==2)
        {
            controller++
            if(controller==1 & aux==0){
                document.getElementById('like2').style.backgroundColor="rgba(255, 255, 255, 0.2)"
                document.getElementById('like2').style.color="#00a3ee"
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById('like2').style.backgroundColor="transparent"
                document.getElementById('like2').style.color="white"
                controller=0 
                aux=0
            }
        }
        if(one==3)
        {
            controller++
            if(controller==1 & aux==0){
                document.getElementById('like3').style.backgroundColor="rgba(255, 255, 255, 0.2)"
                document.getElementById('like3').style.color="#00a3ee"
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById('like3').style.backgroundColor="transparent"
                document.getElementById('like3').style.color="white"
                controller=0 
                aux=0
            }
        }
        if(one==4)
        {
            controller++
            if(controller==1 & aux==0){
                document.getElementById('like4').style.backgroundColor="rgba(255, 255, 255, 0.2)"
                document.getElementById('like4').style.color="#00a3ee"
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById('like4').style.backgroundColor="transparent"
                document.getElementById('like4').style.color="white"
                controller=0 
                aux=0
            }
        }
        if(one==5)
        {
            controller++
            if(controller==1 & aux==0){
                document.getElementById('like5').style.backgroundColor="rgba(255, 255, 255, 0.2)"
                document.getElementById('like5').style.color="#00a3ee"
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById('like5').style.backgroundColor="transparent"
                document.getElementById('like5').style.color="white"
                controller=0 
                aux=0
            }
        }       
}
</script>
<script>
    var controller = 0
    var aux = 0
    function share(one){
    if(one==1)
    {
       controller++
        if(controller==1 & aux==0){
            document.getElementById('share1').style.opacity="1"
            document.getElementById('share1').style.transform="translateY(0px)"
            document.getElementById('share1').style.zIndex="1"
            aux++
        }
        else if(controller==2 & aux!=0){
            document.getElementById('share1').style.opacity="0"
            document.getElementById('share1').style.transform="translateY(20px)"
            document.getElementById('share1').style.zIndex="-1"
            controller=0 
            aux=0
        }
    }
    if(one==2)
    {
        controller++
        if(controller==1 & aux==0){
            document.getElementById('share2').style.opacity="1"
            document.getElementById('share2').style.transform="translateY(0px)"
            document.getElementById('share2').style.zIndex="1"
            aux++
        }
        else if(controller==2 & aux!=0){
            document.getElementById('share2').style.opacity="0"
            document.getElementById('share2').style.transform="translateY(20px)"
            document.getElementById('share2').style.zIndex="-1"
            controller=0 
            aux=0
        }
    }
    if(one==3)
    {
       controller++
        if(controller==1 & aux==0){
            document.getElementById('share3').style.opacity="1"
            document.getElementById('share3').style.transform="translateY(0px)"
            document.getElementById('share3').style.zIndex="1"
            aux++
        }
        else if(controller==2 & aux!=0){
            document.getElementById('share3').style.opacity="0"
            document.getElementById('share3').style.transform="translateY(20px)"
            document.getElementById('share3').style.zIndex="-1"
            controller=0 
            aux=0
        }
    }
    if(one==4)
    {
        controller++
        if(controller==1 & aux==0){
            document.getElementById('share4').style.opacity="1"
            document.getElementById('share4').style.transform="translateY(0px)"
            document.getElementById('share4').style.zIndex="1"
            aux++
        }
        else if(controller==2 & aux!=0){
            document.getElementById('share4').style.opacity="0"
            document.getElementById('share4').style.transform="translateY(20px)"
            document.getElementById('share4').style.zIndex="-1"
            controller=0 
            aux=0
        }
    }
    if(one==5)
    {
        controller++
        if(controller==1 & aux==0){
            document.getElementById('share5').style.opacity="1"
            document.getElementById('share5').style.transform="translateY(0px)"
            document.getElementById('share5').style.zIndex="1"
            aux++
        }
        else if(controller==2 & aux!=0){
            document.getElementById('share5').style.opacity="0"
            document.getElementById('share5').style.transform="translateY(20px)"
            document.getElementById('share5').style.zIndex="-1"
            controller=0 
            aux=0
        }
    }
}       
</script>
    
<script>
    var controller = 0
    var aux = 0
    function likepage(){
            controller++
            if(controller==1 & aux==0){
                document.getElementById('likepage').style.background="#00a3ee"
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById('likepage').style.background="rgba(255, 255, 255, 0.2)"
                controller=0 
                aux=0
            }
        }
</script>
<script>
    var controller = 0
    var aux = 0
    function sharepage(){
            controller++
            if(controller==1 & aux==0){
                var ol = $('#sharebloco')
                ol.addClass("blocoshare")
                document.getElementById('sharepage').style.opacity="1"
                document.getElementById('sharepage').style.transform="translateY(0)"
                document.getElementById('sharepage').style.zIndex="1"
                aux++
            }
            else if(controller==2 & aux!=0){
                var ol = $('#sharebloco')
                ol.removeClass("blocoshare")
                document.getElementById('sharepage').style.opacity="0"
                document.getElementById('sharepage').style.transform="translateY(-100px)"
                document.getElementById('sharepage').style.zIndex="-1"
                controller=0 
                aux=0
            }
        }
</script>
@endsection
@endsection