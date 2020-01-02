@extends('templetes.site')

@section('links')


    <link href={{asset('css/style-empresa.css')}} rel="stylesheet">
    <link href={{asset('css/style-contato.css')}} rel="stylesheet">
	 <link href={{asset('css/loader-bouncing.css')}} rel="stylesheet">
	 <link rel="stylesheet" href={{asset('css/jBox.all.css')}}>
@endsection
@section('titulo','SALGUEIRO BUSCA RÁPIDO: CONTATO')

@section('conteudo')
@include('templetes.top-menu')
<div class="loader loader-bouncing "></div>
<section class="intro-area contato" id="intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title">ANUNCIE COM A GENTE</h2>
            <div class="sub-header">
                <p class="paragrafo">Obtenha mais vendas com nosso serviço!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-8 text-center">
                <div class="feature-block">
                    <div class="single-feature feature-circule">
                        <div class="circule"></div>
                        <span class="featured-icon"><i class="fa fa-exchange"></i></span>
                        <h3>CUSTOM BLABLA</h3>
                        <p>lorem asir sdjmpoqw osdlask fdfjsdf sdjgfshgd fidsjfgsdifjsdkk   </p>
                    </div>
                    <div class="single-feature">
                        <span class="featured-icon"><i class="fa fa-star-half-o"></i></span>
                        <h3>ROBOTOS TAG</h3>
                        <p>lorem impousaen aidjm poieutt akjdiq eiwehfn jfhdk kdjdjfdfjd</p>
                    </div>
                    <div class="single-feature">
                        <span class="featured-icon"><i class="fa fa-arrows-alt"></i></span>
                        <h3>HE TO USE</h3>
                        <p>lorem impousaen aidjm poieutt akjdiq eiwehfn jfhdk kdjdjfdfjd</p>
                    </div>
                    <div class="single-feature">
                        <span class="featured-icon"><i class="fa fa-cog"></i></span>
                        <h3>JAMAICA</h3>
                        <p>lorem impousaen aidjm poieutt akjdiq eiwehfn jfhdk kdjdjfdfjd</p>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="feature-mockup">
                    <img src="img/contact.png" class="img-center img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="intro-area more " id="intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">NOSSAS GARANTIAS</h2>
            <div class="sub-header">
                <p class="paragrafo">Veja o que mais!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-7 mb-4">
                <img src="img/11.png" class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="feature-list">
                    <ul>
                        <li>
                            <div class="feature-icon">
                                <i class="fa fa-arrows-alt"></i>
                            </div>
                            <div class="feature-details">
                                <h3>Retina Display</h3>
                                <p>Lorem inpusem served ocla me for didie</p>
                            </div>
                        </li>
                         <li>
                            <div class="feature-icon">
                                <i class="fa fa-cog"></i>
                            </div>
                            <div class="feature-details">
                                <h3>Comeck Tirad</h3>
                                <p>Lorem inpusem served ocla me for didie</p>
                            </div>
                        </li>
                         <li>
                            <div class="feature-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="feature-details">
                                <h3>IOS/android</h3>
                                <p>Lorem inpusem served ocla me for didie</p>
                            </div>
                        </li>
                         <li>
                            <div class="feature-icon">
                                <i class="fa fa-undo"></i>
                            </div>
                            <div class="feature-details">
                                <h3>test over</h3>
                                <p>Lorem inpusem served ocla me for didie</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</section>

<section id="contato">
    <div class="container contato-empresa">
        <h4>CONTATO</h4>
        <form  id="form"  >
            @csrf
            <div class="mensagem-empresa">
                <div class="tex-input">
                    <label for="name"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="name" name="name" required>
            </div>
            <div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email" >
            </div>
            <div class="mensagem-empresa">
                <label for="tel"><i class="fas fa-phone"></i></label>
                <input type="text" placeholder="Digite seu telefone" id="tel" name="tel" required>
            </div>
                <div class="text-area">
                    <textarea required id="content" name="content" placeholder="Digite sua mensagem que entraremos em contato..."></textarea>
                </div>
            </div>

            <div class="btn-enviar-comentario">
                <label for="enviar"  id="enviarBTN">Enviar<i class="fas fa-paper-plane"></i></label>
                <div class="checado" id="checado" style="display:none;">
                    <img src={{asset('img/checado.png')}} width="35px" alt="">
                    <span class="btn btn-success" >Enviado com sucesso</span>
                </div>
                <div class="loader" style="display:none;" id="loader">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                </div>
                <input type="submit" id="enviar" name="enviar">
            </div>
        </form>
    </div>
</section>



@endsection

@section('script')


<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<script src={{asset('js/jquery-3.4.1.min.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src={{asset('js/jBox.all.js')}}></script>
<script type="text/javascript" src={{asset('js/demo.js')}}></script>


	<script type="text/javascript">
	$.ajaxSetup({
	headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
	});



	$(function(){
    var numberTelError = new jBox("Tooltip",{
	target:"#enviarBTN",
	theme:"TooltipBorder",
	trigger:"click",adjustTracker:!0,
	closeOnClick:"body",
	closeButton:"box",
	animation:"move",
	position:{x:"left",y:"top"},
	outside:"y",
	pointer:"left:20",
	offset:{x:25},
	content:"Digite apenas números!",
	adjustDistance:{top:55,right:5,bottom:5,left:5},
	zIndex:4e3
	});

	var ModalErrorNumber = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-times fa-3x" style="color: red"></i></div>',
			content: "Seu telefone deve conter apenas números!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
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

	$("#form").submit(function(e){
	e.preventDefault();

	var form = $(this);
	var tel = $('#tel').val();

	dados = {
	nome: $('#name').val(),
	email: $('#email').val(),
	tel: $('#tel').val(),
	content: $('#content').val()
	};

    if($.isNumeric(tel)){
        $.ajax({
        url: 'api/contato/mensagem',
        data:dados,
        type:"POST",
        dataType: "json",

        beforeSend: function(){
        load("open");
        $('#enviarBTN').fadeOut();
        },
        success: function(callback){
        console.log(callback);
        },
        error: function(error){
            console.log(error);
        },
        complete: function(){
        $('#name').val('');
        $('#email').val('');
        $('#tel').val('');
        $('#content').val('');
        load("close");
        $( "#checado" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        $('#enviarBTN').delay( 1500 ).fadeIn( 450 );
        }
        });
    }
    else{
        numberTelError.open();
    }


	});

	});





</script>
<script src={{asset('js/menu-fixo.js')}}></script>
@endsection
