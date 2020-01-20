@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - PUBLICAR EVENTO')

@section('links')
<meta  name = "csrf-token"  content = "{{csrf_token ()}}">
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-datepicker/css/datepicker.css")}}/>
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-daterangepicker/daterangepicker.css")}} />
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-timepicker/compiled/timepicker.css")}} />
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-datetimepicker/datertimepicker.css")}} />
<style>
.month {
    cursor: pointer !important;
}
.prev, .next{
    cursor: pointer;
}
.day{
    cursor: pointer;
}
.ck-content p{
    padding-left: 20px;
}
</style>
@endsection

@section('blog', 'active')

@section('conteudo')
<?php
    if(\Session::has('status')):
?>
<div id="status" style="display:none;">
    {{ session('status') }}
</div>
<?php
    \Session::forget('status');
endif;
?>

<div class="loader loader-bouncing "></div>
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div class="container">
				<h2>1. Titulo da postagem</h2>
				<p style="margin-left:20px">Defina um titulo para seu post</p>
				<form id="form-data" method="POST" action={{route('publicarEventos')}} style="margin-bottom:29px;" enctype="multipart/form-data">
                @csrf
					<div class="form-group" style="width:60%;">
							<label>Titulo</label>
						<input type="text" id="nomeEvento" name="nomeEvento" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="banner" class="btn btn-info">Adicionar foto principal</label>
						<input type="file" style="display:none;" id="banner" onchange="previewBanner()" name="banner" class="form-control" >
					</div>
					<div class="infoBanner" style="width:220px; letter-spacing:1px; font-size:14px; float:left">
								<p>A dimensão recomendada é de <b>900 x 600.</b>
									Formato <b>JPEG, GIF ou PNG de no máximo 20MB.</b>
									Imagens com dimensões diferentes serão redimensionadas.
								</p>
						</div>
					<div class="form-group" id="previaBanner">
						<div class="previaImg" id="prevImg" style="left: 10px !important; width: 300px !important;height:120px !important; background:black !important; border:none;"><div id="prev" ><img class="previa" id="prevBanner" src={{asset('img/bannerDefault.png')}}  ></div><div class="cancelarOp" id="excluirBanner"><i class="fa fa-times fa-2x" style="cursor:pointer; margin-left: 40px !important;"></i></div></div>
					</div>

					<h2>2. Informe as tags</h2>
                    <p style="margin-left:20px">Escreva as tags(palavras-chave) separadas por virgula, é por essas palavras que seu post será encontrado nas buscas</p>
					        <div id="form-locale" class="form-group" style="width:60%;">
							<label>Tags</label>
							<input type="text" name="opEndereco" id="opEndereco" class="form-control" >
					</div>
					<h2>3. Post</h2>
					<p style="margin-left:20px">Escreva o conteudo do post, obedecendo as regras do site dita nos termos de uso.</p>
					<div class="container" style="width:100%; margin-bottom:50px;">
							<textarea name="content" id="editor">
                                &lt;p&gt;Seu post.&lt;/p&gt;
                            </textarea>

					</div>
                    <h2>4. Assunto</h2>

					<p style="margin-left:20px">Escolha o assunto a qual sua postagem está relacionada.</p>
                    <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Assunto</label>
									<select  name="categoria" id="categoria" class="form-control"  style="margin-bottom: 5px;;width: 80% !important; text-transform:uppercase" id="ninchoEmp" required>
											<option disabled selected value="">Selecione uma assunto</option>
											<option value="Congresso, seminário">Política</option>
											<option value="Esportivo">Tutorial, Vlog, lazer</option>
											<option value="Encontro, network">Curso, workshop</option>
											<option value="Filme, cinema e teatro">Acidente, denûncia</option>
											<option value="Religioso, espiritual">Religião</option>
											<option value="Show, música e festa">Show, música e festa</option>
                                            <option value="Show, música e festa">Artigo, Revista, Coluna</option>
                                            <option value="Show, música e festa">Educação, saúde, segurança</option>
									</select>
								</div>
					</div>

					</div>
					<button type="submit" class="btn btn-info">Publicar postagem</button>
					<button id="resetEvento" type="reset" class="btn btn-dark">Resetar postagem</button>
				</form>
			</div>
		</div>
	</section>
</section>

@section('scripts')

<script type="text/javascript" src={{asset("lib/bootstrap-datepicker/js/bootstrap-datepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/date.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/daterangepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/moment.min.js")}}></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src={{asset("lib/bootstrap-timepicker/js/bootstrap-timepicker.js")}}></script>
<script src={{asset("lib/advanced-form-components.js")}}></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/translations/pt.js"></script>

<script>

var modalEvent = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Evento publicado com sucesso!",
    animation: 'zoomIn',
    audio: '../audio/bling2',
    volume: 80,
    closeButton: true,
    delayOnHover: true,
    showCountdown: true
});

if( $( "#status" ).length ) {
    modalEvent.open();
}


ClassicEditor.create( document.querySelector( '#editor' ), {
        language: 'pt',
        ckfinder: {
            uploadUrl: 'http://127.0.0.1:8000/api/post/upload',
        }
    } ).then( editor => {
    console.log( 'Editor was initialized', editor );
    myEditor = editor;
} )
.catch( err => {
    console.error( err.stack );
} );

$('#form-data').submit(function(){

    $('#descEvento').val()
});

$('#resetEvento').click(function(){
    location.reload();
});


$('#opEvento').change(function(){
    var op = $('#opEvento').val();
    if(op == 'online'){
        $('#form-locale').slideUp();
    }
    else{
        $('#form-locale').slideDown();
    }
});
$('.dinheiro').mask('#.##0,00', {reverse: true}).append('R$');


$('#ingressoGratuito').click(function(){
    $('#ingressoPago').text('Ingresso pago');
    $('#ingressoGratuito').attr('class', 'btn btn-success');
    $('#ingressoGratuito').html('Ingresso gratuito <i class="fa fa-check"></i>');
    $('#ingressoPago').attr('class', 'btn btn-info');
	 $('#dinheiroIngresso').slideUp();
});

$('#ingressoPago').click(function(){
    $('#ingressoGratuito').text('Ingresso gratuito');
    $('#ingressoPago').html('Ingresso pago <i class="fa fa-check"></i>');
	$('#ingressoGratuito').attr('class', 'btn btn-info');
	$('#ingressoPago').attr('class', 'btn btn-success');
	$('#dinheiroIngresso').slideDown();
});

    $(".dpd1").datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt'
});
    $(".dpd2").datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt'
});
$('#excluirBanner').click(function(){
	$('#prevBanner').attr('src', "{!!asset('img/bannerDefault.png')!!}");
	$('#banner').val('');
	$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});
});
$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});



$('#banner').change(function(){
;
	$('#prevBanner').hover(function(){
		$(this).css('opacity', '0.6');
		$('#excluirBanner').show();
	},
	function(){
		$(this).css('opacity', '1');
	});
	$('#excluirBanner').hover(function(){
		$('#prevbanner').css('opacity', '0.6');
		$('#excluirBanner').show();
	},
	function(){

		$('#prevBanner').css('opacity', '1');
	});

	var imagem = document.querySelector('input[name=banner]').files[0];
	var preview = document.getElementById('prevBanner');
	var reader = new FileReader();

	reader.onload = function(){
		preview.src = reader.result;
	}

	if(preview){
		reader.readAsDataURL(imagem);
	}else{
		preview.src = '';
	}
});

</script>
@endsection
@endsection

