@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - CONTATO ')

@section('contato', 'active')

@section('conteudo')
<section id="main-content">
	<section class="wrapper site-min-height">
	
		<div class="row mt">
			<div class="container">
				<div class="table-wrapper" >
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
						<h2 style="float: left;padding-right: 20px;">LISTAR <b>MENSAGENS DE CONTATO</b></h2>
						<div class="escolhaop" style=" width: 100%; height: 100%;" >
						
					</div>
					</div>
					<div class="col-sm-6">
						<a  href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></a>
						<div class="form-search" style="display:flex; margin-left: 70px">
						
						<input type="text" id="myInput" class="form-control" style="border: 1px solid rgb(139, 139, 139);color: rgb(139, 139, 139); border-radius:50px; width: 180px;" placeholder="Buscar...">
						</div>						
					</div>
					</div>
				</div>
				<div class="table-responsive" id="table_data">
					@include('login.dashboardManenger.contatoTabela')
					<div class="clearfix">
							<div class="hint-text">Mostrando <b>{{$contact->count()}}</b> de <b> {{$contact->total()}} </b>empresas</div>
						</div>
																</div>

				
		</div>
	</div>
				</div>
			</div>
			<!-- Delete Modal HTML -->
		</div>









		<div class="row mt">
			<div class="container">
				<div class="table-wrapper" >
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
						<h2 style="float: left;padding-right: 20px;">LISTAR <b>PEDIDOS DE PARCERIA</b></h2>
						<div class="escolhaop" style=" width: 100%; height: 100%;" >
					</div>
					</div>
					<div class="col-sm-6">
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></a>
												
					</div>
					</div>
				</div>
				<div class="table-responsive" id="table_data_parceria">
					@include('login.dashboardManenger.parceriaTabela')
				</div>

				
		</div>
	</div>
			</div>
			<!-- Delete Modal HTML -->
		</div>
	</section>
	<!-- /wrapper -->
	</section>

@section('scripts')
<script>

	$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			if(value){
				$.ajax(
				{
					url: '../api/administrativo/empresas/lista-todas-mensagens',
					type: "get",
					datatype: "html"
				}).done(function(data){
					$("#table_data").empty().html(data);
					$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
					
				}).fail(function(jqXHR, ajaxOptions, thrownError){
						alert('No response from server');
				});
				
			}
			else{
				getData(1)
			}
		});
		


	var successDeleteContato = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
			content: "Mensagem deletada com sucesso!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
			}); 
	var parceriaAtivada = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "Parceria ativada!",
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

	function excluirMensagens(id){
		 
		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		if(confirm('Deseja excluir?')){		
		$.ajax({
				type:"POST",
				url:'../api/administrativo/lista-contato/exlcuir',	
				data: id,
				processData : false,
				beforeSend: function(){
					load('open');
				},
				success: function(Response) {
					console.log(Response);
					
				},
				error: function(error){
					console.log(error);
				},
				complete: function(){
					load('close');
					successDeleteContato.open();
					getData(1);
				}
		});
	}
	}

	function parceria(id){	 
		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		if(confirm('Deseja Aprovar?')){		
		$.ajax({
				type:"POST",
				url:'../api/administrativo/parceria/aprovar',	
				data: id,
				processData : false,
				beforeSend: function(){
					load('open');
				},
				success: function(Response) {
					console.log(Response);
					
				},
				complete: function(){
					load('close');
					parceriaAtivada.open();
					
					getPartner();
				}
		});
	}
	}
	function negarParceria(id){	 
		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		if(confirm('Deseja negar o pedido?')){		
		$.ajax({
				type:"POST",
				url:'../api/administrativo/parceria/negar',	
				data: id,
				processData : false,
				beforeSend: function(){
					load('open');
				},
				success: function(Response) {
					console.log(Response);
					
				},
				complete: function(){
					load('close');
					parceriaAtivada.open();
					
					getPartner();
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
			url: '../api/administrativo/lista-contato?page=' + page,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}
	function getPartner(){
		$.ajax(
		{
			url: '../api/administrativo/lista-parcerias-pendentes',
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data_parceria").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}

$(function(){
	getData(1);
	getPartner();
});

</script>
@endsection

@endsection
