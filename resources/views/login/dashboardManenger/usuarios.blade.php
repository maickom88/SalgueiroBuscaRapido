@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - USÚARIOS ')

@section('user', 'active')

@section('conteudo')
<div class="loader loader-bouncing "></div>
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div class="container">
				<div class="table-wrapper" >
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
						<h2 style="float: left;padding-right: 20px;">LISTAR <b>USÚARIOS</b></h2>
						<div class="escolhaop" style=" width: 100%; height: 100%;" >
					</div>
					</div>
					<div class="col-sm-6">
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></a>
						<div class="form-search" style="display:flex; margin-left: 70px">
						<input type="text" id="myInput" class="form-control" style="border: 1px solid rgb(139, 139, 139);color: rgb(139, 139, 139); border-radius:50px; width: 180px;" placeholder="Buscar...">
						</div>
					</div>
					</div>
				</div>
				<div class="table-responsive" id="table_data">
					@include('login.dashboardManenger.usuariosAll')
				</div>
		</div>
	</section>
</section>

<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Alterar permissões</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select name="permission" id="permission" class="form-control"  style="width: 80% !important; display:inline-block; text-transform:uppercase" required>
			  <option value="Administrador" >Administrador</option>
			  <option value="Blogueiro" >Blogueiro</option>
			  <option value="Empresarial" >Empresarial</option>
			  <option value="Usúario" >User</option>
		  </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button onclick="" id="saved" type="button" class="btn btn-success">Salvar e Alterar</button>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script>
	var modalUpdate = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "Permissão atualizada com sucesso!",
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
	});
	var modalDelete = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: "Usúario deletado com sucesso!",
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
	});
		new jBox("Confirm",{
		content:"Deseja realmente excluir esse usúario?",
		cancelButton:"Não",confirmButton:"Sim",
		blockScrollAdjust:["header"]
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
$("#myInput").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	if(value){
		$.ajax(
		{
			url: '../api/administrativo/usuarios/lista-todos-usuarios',
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);
			$("#myTable tr").filter(function(){
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
			url: '../api/administrativo/usuarios/lista-usuarios?page=' + page,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}
	function updatePermission(id, permission){
		$('#ExemploModalCentralizado').modal('toggle');
		$('#permission').val(permission);
		$('#saved').attr('onclick', 'savedUpdate('+id+', "'+permission+'")');
	}
	function savedUpdate(id){
		permission = $('#permission').val();
		user = {
			idUser: id,
			permissionUser: permission
		}

		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		$.ajax({
			type:"POST",
			url:'../api/administrativo/usuarios/editar',
			data: user,
			beforeSend: function(){
				load('open');
			},
			success: function(Response){
				console.log(Response);
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
				load('close');
				$('#ExemploModalCentralizado').modal('hide');
				modalUpdate.open();
				getData(1);
				}
		});
	}
	function deleteUser(id, permission){
		user = {
			idUser: id,
			idPermission: permission
		}

		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		$.ajax({
			type:"POST",
			url:'../api/administrativo/usuarios/excluir',
			data: user,
			beforeSend: function(){
				load('open');
			},
			success: function(Response){
				console.log(Response);
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
				load('close');
				$('#ExemploModalCentralizado').modal('hide');
				modalDelete.open();
				getData(1);
				}
		});
	}

</script>
@endsection
@endsection
