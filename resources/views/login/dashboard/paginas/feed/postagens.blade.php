@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: EVENTOS')

@section('eventos', 'active')

@section('conteudo')
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row" style="padding:50px;">
			<div>
				
				
				<form role="form" id="form-data" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<textarea name="editor1" id="editor1" rows="10" cols="80">
					
					</textarea>
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
			success: function(Response) {
				console.log(Response);
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
				alert('enviado');
			}
		});
		e.preventDefault();
	});
</script>
@endsection
@endsection