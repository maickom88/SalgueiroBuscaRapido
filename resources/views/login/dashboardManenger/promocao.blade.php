@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - PROMOÇÕES ')

@section('promocao', 'active')

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
							<h2 style="float: left;padding-right: 20px;">LISTA DE <b>CONTRATOS</b></h2>
                            <select name="" id="filtro" style="width: 90px; height:30px; border: 1px solid #fff; background: #0397D6">
								<option value="todas">TODAS</option>
								<option value="expiradas">EXPIRADAS</option>
							</select>
                            </div>
							<div class="col-sm-6">
								<button onclick="excluirEmpCheck()" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></button>
							<div class="form-search" style="display:flex; margin-left: 70px">
								<input type="text" id="myInput" class="form-control" style="border: 1px solid rgb(139, 139, 139);color: rgb(139, 139, 139); border-radius:50px; width: 180px;" placeholder="Buscar...">
							</div>
                        </div>
                        </div>
                        </div>
                        <div class="table-responsive" id="table_data">
                @include('login.dashboardManenger.promocoesTabela')
                </div>
            </div>
            <!-- Delete Modal HTML -->
        </div>
    </section>
    <!-- /wrapper -->
</section>

@section('scripts')
<script>
function checkAll(){
    var listaemp = document.querySelectorAll("[name=check]");
    if(document.getElementById("selectAll").checked){
        for(var i = 0;i<listaemp.length;i++){
            listaemp[i].checked = true;
        }
    }else{
        for(var i=0;i<listaemp.length;i++){
            listaemp[i].checked = false;
        }
    }
}
function excluirEmpCheck(){
    var listaemp = document.querySelectorAll("[name=check]");
    var valores = [];
    for(var i = 0; i < listaemp.length; i++){
        if(listaemp[i].checked){
            valores.push(listaemp[i].value);
        }
    }
    for(var i=0; i<valores.length;i++){
        var id =  valores[i];
            excluirPromocao(id);
        }
    }
}

function excluirPromocao(id){
    var id = {"idPromotion": id}
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
    });

    if(confirm('Deseja excluir?')){
    $.ajax({
            type:"POST",
            url:'../api/administrativo/promocoes/excluir',
            data: id,
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
                promotionDelete.open();
                getData(1);
            }
    });
}
}


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


function load(action){
        var load_div = $(".loader");
        if(action==="open"){
        load_div.addClass("is-active");
        }
        else{
        load_div.removeClass("is-active");
        }
}

var promotionDelete = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Promoção excluida com sucesso!",
    animation: 'zoomIn',
    audio: '../audio/bling2',
    volume: 80,
    closeButton: true,
    delayOnHover: true,
    showCountdown: true
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
        url: '../api/administrativo/promocoes?page=' + page,
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
            url: '../api/administrativo/promocoes/listar-promocoes',
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

