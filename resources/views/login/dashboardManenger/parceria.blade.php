@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - PARCERIA ')

@section('parceria', 'active')

@section('conteudo')
<div class="loader loader-bouncing "></div>
	<section id="main-content">
      <section class="wrapper site-min-height">
		
			<div class="row mt">
				<div class="container">
					<div class="table-wrapper">
						 <div class="table-title">
							<div class="row">
								<div class="col-sm-6">
									 <h2 style="float: left;padding-right: 20px;">PARCEIRIAS <b>ATIVAS</b></h2>
							 	</div>
							</div>
						 </div>
						 <div class="table-responsive" id="table_data">
					@include('login.dashboardManenger.parceriaAtivas')
					</div>
			  </div>
			 <!-- Delete Modal HTML -->
			</div>
      </section>
      <!-- /wrapper -->
    </section>

@section('scripts')
<script>
	function load(action){
			var load_div = $(".loader");
			if(action==="open"){
			load_div.addClass("is-active");
			}
			else{
			load_div.removeClass("is-active");
			}
		}
	var successUpdatePartner = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "Permissão do usúario atualizada com sucesso!",
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
	}); 

	var permirssaoUser = new jBox('Modal',{
		attach: '#test',
		title: 'EDITAR PERMISSÃO DESSE USÚARIO',
		content: "<h4>Deseja desativar a permissão de blogueiro dessa conta?</h4>",
		footer: '<div class="form-group"><span onclick="btnCancel()" id="btn-cancel-partner" class="btn btn-danger" style="margin-right:5px;">Não</span><span id="btn-save-partner" onclick class="btn btn-success">Sim</span></div>',
		animation: 'zoomIn',
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
	}); 

	function editPartner(id){
		
		permirssaoUser.open();
		$('#btn-save-partner').attr('onclick', 'savePartner('+id+')');
	}
	
	function btnCancel(){
		permirssaoUser.close();
		$('#permissaoUser').val('op');
	}
	function savePartner(id){
		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		if(confirm('Deseja aplicar essa alteração?')){		
		$.ajax({
				type:"POST",
				url:'../api/administrativo/empresas/parceria/update',	
				data: id,
				processData : false,
				beforeSend: function(){
					permirssaoUser.close();
					load('open');
				},
				success: function(Response) {
					console.log(Response);
				},
				error:function(error){
					console.log(error);
				},
				complete: function(){
					load('close');
					successUpdatePartner.open();
					getData(1);

				}
		});
	}
	}
	$(window).on('hashchange', function() {
		if (window.location.hash) {
			var page = window.location.hash.replace('#', '');
			if (page == Number.NaN || page <= 0) {
					return false;
			}else{
					getData(page);
			}
		}
	});
	
	$(document).ready(function()
	{
		$(document).on('click', '.pagination a',function(event)
		{
			event.preventDefault();

			$('li').removeClass('active');
			$(this).parent('li').addClass('active');

			var myurl = $(this).attr('href');
			var page=$(this).attr('href').split('page=')[1];

			getData(page);
		});

	});

	function getData(page){
		$.ajax(
		{
			url: '../api/administrativo/lista-parcerias-ativas?page=' + page,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}

$(function(){
	getData(1);
	
});

</script>
@endsection	
@endsection

