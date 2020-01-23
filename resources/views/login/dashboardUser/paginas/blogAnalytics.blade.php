@extends('templetes.tampletesDashboard.User.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: BLOG')

@section('blog', 'active')

@section('conteudo')
<div class="loader loader-bouncing "></div>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt mb">
            <div class="col-md-7" >
                <a href={{route('blogUser')}} class="btn btn-info">Nova postagem</a><br><br>
                <div class="col-md-4" style="display:flex; align-items:center">
        <span class="custom-checkbox" style="margin-top:10px;">
                <input  style="width:18px !important; height:18px !important;" type="checkbox" class="checkDelete" name="check" value="">
                <label for="checkbox1"></label>
        </span>
        <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
            </div>
        </div>
        <div id="userTablePosts" style="padding:20px; background-color:#D4D4D4; border-radius:10px">
            @include('login.dashboardUser.paginas.tableUserPosts')
        </div>
    </section>
</section>


@section('scripts')
<script>

var postExcluido = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Postagem excluido com sucesso!",
    animation: 'zoomIn',
    audio: '/../audio/bling2',
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
    var id = {{Auth::user()->id}}
    $.ajax(
    {
        url: '/../api/dashboard/post/'+id+'?page=' + page,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#userTablePosts").empty().html(data);
        location.hash = page;
    }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
    });
}

function excluirPost(id){
    var id = { 'IdUser' : id }
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
    });

    if(confirm('Deseja realmente excluir esse evento?')){
    $.ajax({
        type:"POST",
        url:'/../api/administrativo/post/excluir',
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
            postExcluido.open();
            getData(1);
        }
    });
}
}
</script>
@endsection
@endsection
