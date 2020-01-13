@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - EVENTOS PUBLICADOS ')

@section('eventos', 'active')

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
							<h2 style="float: left;padding-right: 20px;">LISTA DE <b>EVENTOS</b></h2>
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
							@include('login.dashboardManenger.eventosTabela')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>



@section('scripts')
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
$('.dinheiro').mask('#.##0,00', {reverse: true}).append('R$');


var EventoExcluido = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Evento excluido com sucesso!",
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
        url: '../api/administrativo/eventos/publicados?page=' + page,
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
            url: '../api/administrativo/eventos/buscar',
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

function excluirEvento(id){
    var id = { 'IdUser' : id }
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
    });

    if(confirm('Deseja realmente excluir esse evento?')){
    $.ajax({
        type:"POST",
        url:'../api/administrativo/eventos/excluir',
        data: id,
        beforeSend: function(){
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
            EventoExcluido.open();
            getData(1);
        }
    });
}
}
</script>
@endsection
@endsection
