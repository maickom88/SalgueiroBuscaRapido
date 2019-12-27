@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: EVENTOS')

@section('novidade', 'active')

@section('conteudo')
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row" style="padding:50px;">
			<div>
				
				
				<form role="form" id="form-data" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<textarea name="editor1" id="editor1" rows="10" cols="80">Digite suas novidades aqui!</textarea>
					<input type="hidden" value={{$user->empresas->id}} name="empresa">
					<label class="btn btn-theme04 btn-lg" id="photosLabel" style="margin-top:20px;" for="photos">Enviar fotos</label>
					<label class="btn btn-theme02 btn-lg"style="margin-top:20px;display:none;" id="cancelImg" for=""  data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i></label>
					<input type="file" name="photos[]" multiple id="photos" style="display:none" >
					<button type="submit" id="enviar" class="btn btn-theme03 btn-lg" style="margin-top:20px;">Publicar Novidade</button><br>
					
				</form>
				</div>
		</div>
	</section>
</section>
@section('scripts')
<script src="//cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
<script>

	$(function(){
		
		
	});
	$('#photos').change(function(){
		var arquivos = $('#photos')[0].files;
		var quantArquivos = arquivos.length;
		if(quantArquivos==1){
			$('#photosLabel').text(quantArquivos+' Arquivo');
			$('#cancelImg').show();
		} 
		else{
			$('#photosLabel').text(quantArquivos+' Arquivos');
			$('#cancelImg').show();			
		}
	});
	
	$('#cancelImg').click(function(){
		$('#photos').val();
		$('#photosLabel').text('Enviar fotos');
		$('#cancelImg').hide();
	});

	CKEDITOR.replace('editor1');

	var modalNovidadeError = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-times fa-3x" style="color: red"></i></div>',
		content: "Error ao publicar novidade, tente novamente!",
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
		}); 

	var modalNovidade = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "Novidade publicada com sucesso!",
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
	function limparInput(){
			$('#photos').val();
			$('#photosLabel').text('Enviar fotos');
			$('#cancelImg').hide();
			$('#editor1').text('');
		};


	$.ajaxSetup({
		headers: {"X-CSRF-TOKEN":"{{csrf_token()}}"}
	});
	
	$("#form-data").submit(function(e){	 
		var data = CKEDITOR.instances.editor1.getData();
		$('#editor1').val(data);
		$.ajax({
			type:"POST",
			url:'../api/painel/postar',	
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			async: true,
			beforeSend: function(){
				load('open');
			},
			success: function(Response) {
				console.log(Response);
			},
			error: function(){
				modalNovidadeError.open();
			},
			complete: function(){
				load('close')
				modalNovidade.open();
				limparInput();
			}
		});
		e.preventDefault();
		
	});
</script>
@endsection
@endsection