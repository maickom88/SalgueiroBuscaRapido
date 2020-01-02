@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - PAGAMENTOS ')

@section('pag', 'active')

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
							<h2 style="float: left;padding-right: 20px;">LISTA DE <b>CONTRATOS</b></h2>
                            <select name="" id="filtro" style="width: 90px; height:30px; border: 1px solid #fff; background: #0397D6">
								<option value="todas">TODAS</option>
								<option value="expiradas">EXPIRADAS</option>
							</select>
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
							@include('login.dashboardManenger.pagamentosTabela')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>

<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Renovar contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="form-data">
        <select name="contrato" id="contrato" class="form-control" style="width: 80% !important; display:inline-block; text-transform:uppercase" required>
			  <option value="mensal">Mensal</option>
			  <option value="trimensal" >Trimensal</option>
			  <option value="semestral">Semestral</option>
		</select>
        <input type="hidden" name="idContrato" id="idContrato" value="">
          <div class="form-group" style="margin-top:5px">
            <label><b>R$</b></label>
                <input style="border-radius:3px; border:1px solid rgba(0,0,0,0.1); padding:5px; " class="dinheiro" type="text" name="valorContrato" id="valorContrato" required >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="saved" class="btn btn-success">Renovar</button>
      </div>
      </form>
    </div>
  </div>
</div>


@section('scripts')
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
$('.dinheiro').mask('#.##0,00', {reverse: true}).append('R$');

function updatePermission(id){
    $('#ExemploModalCentralizado').modal('toggle');
    $('#permission').val();
    $('#idContrato').attr('value', id);
}

var successContrato = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Contrato renovado com sucesso!",
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

$('#form-data').submit(function(e){
$('#ExemploModalCentralizado').modal('toggle');
$.ajax({
    type:"POST",
    url:'../api/administrativo/empresas/contrato/update',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
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
        getData(1);
        load('close');
        successContrato.open();
    }
});
    e.preventDefault();

});


$('#filtro').change(function(){
    var op = $('#filtro').val();
    if(op == 'expiradas'){
        getExpiradas();
    }
    else{
        getData(1);
    }
});

function getExpiradas(){
    $.ajax(
    {
        url: '../api/administrativo/empresas/contratos-expirados',
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#table_data").empty().html(data);

    }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
    });
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
        url: '../api/administrativo/empresas/contratos?page=' + page,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#table_data").empty().html(data);
        location.hash = page;
    }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
    });
}

$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    if(value){
        $.ajax(
        {
            url: '../api/administrativo/empresas/listar-contratos',
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
</script>
@endsection
@endsection
