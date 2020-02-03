@extends('templetes.tampletesDashboard.businessman.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL EMPRESARIAL ')

@section('menuPrincipal', 'active')

@section('conteudo')
    <div class="loader loader-bouncing "></div>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div style="width=100% ; height:400px;"> {!! $charts->container() !!}
				</div>
				<div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>QUANTAS PESSOAS GOSTARAM</h5>
                  </div>
                  <img src={{asset('img/like.png')}} style="width:90px;"alt="">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Quantidade<br/>de likes:</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2 style="color:#00AFEF">{{$user->empresas->likes->count()}}</h2>
                    </div>
                  </div>
                </div>

                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>TEMPO ESTIMADO NO SEU ANUNCIO</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#1c9ca7"
                      },
                      {
                        value: 40,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                </script>
                @php
                    $data = date('d/m/Y')
                @endphp

                  <p>{{$data}}</p>
                  <footer>
                    <div class="pull-left">
                      <h5><i class="fas fa-clock"></i>4min</h5>
                    </div>
                    <div class="pull-right">
                      <h5>40% em media</h5>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn" style="background:#444C57">
                  <div class="green-header" style="background:#1C9CA7">
                    <h5>PLANO ATUAL</h5>
                  </div>
                  <img src={{asset('img/money.png')}} width="70px" alt="">
                  <p style="font-size: 20px;" class="text-center mt"><b>R$ {{$user->permissions->empresas->contratos->valor}}</b><br/>@if($user->permissions->empresas->contratos->status == 'ativa')Verificado! <i style="color:#00a3ee"class="fa  fa-check"></i>@else Expirado! <i style="color:red"class="fa fa-ban"></i>@endif</p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
            <div class="row">
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>QUANTAS PESSOAS COMENTARAM</h5>
                  </div>
                  <img src={{asset('img/commentIcon.png')}} style="width:90px;"alt="">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Quantidade<br/>de comentários:</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2 style="color:#00AFEF">{{$user->empresas->comments->count()}}</h2>
                    </div>
                  </div>
                </div>
              </div>
           <div class="col-md-8 mb">
			<div class="message-p pn">
			<div class="message-header">
			<h5>ALGUMA DÚVIDA?</h5>
			</div>
			<div class="row">
			<div class="col-md-3 centered hidden-sm hidden-xs">
			<img src={{asset("img/logofinal1icon.png")}} class="" width="60">
			</div>
			<div class="col-md-9">
			<p>
			<name>Suporte SBR</name>
			Envie alguma mensagem.
			</p>
			<p class="message">Digite alguma sugestão, melhorias para a plataforma ou crítica construtivas, duvidas iremos te responder por email, depois verifique sua caixa de mensagens</p>
			<form id="form-data-message" class="form-inline" role="form">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="idUser" value="{{Auth::id()}}">
                    <input type="text" name="message" class="form-control" id="message" placeholder="Digite sua mensagem..." required>
                </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
			</form>
			</div>
			</div>
			</div>
           </div>
              <!-- /col-md-8  -->
            </div>
            <div class="row">
              <!-- TWITTER PANEL -->
                <!-- WEATHER PANEL -->
              <div class="col-md-4 mb">
                <div class="weather pn">
                  <i class="fa fa-cloud fa-4x"></i>
                  <h2>{{$dados['results']['temp']}}</h2>
                  <h4>SALGUEIRO</h4>
                </div>
              </div>

              <!-- /col-md-4 -->
              @if(!empty($post))
             <div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="content-panel pn" >
			<div id="blog-bg" style="background:url({{asset('storage/posts-header/'.$post->banner)}}); background-size:cover;">

			<div class="badge badge-popular">POPULAR</div>
			<div class="blog-title">{{$post->title}}</div>
			</div>
			<div class="blog-text">
                @php
                    $description = substr($post->conteudo, 0, 110);
                    $description =  strip_tags($description);
                    $str = $post->title;
                    $str2 = str_replace(' ', '-', $str);
                @endphp
			    <p>{!!$description!!}...<a href={{route('blog.page').'/'.$str2.'/'.$post->id}}>Leia mais</a></p>
			</div>
			</div>
		</div> @endif
				<!-- /col-md-4 -->
				<div id="card-promotion" class="col-lg-4 col-md-4 col-sm-4 mb">
                    @include('login.dashboard.paginas.cardPromotion')
                </div>
        </div>

            <!-- /row -->
            <div class="row">

              <!-- /col-md-4 -->
              <!--  PROFILE 02 PANEL -->
		<div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="content-panel pn" >
			<div id="profile-02" style="background: url('https://scontent.cdninstagram.com/vp/1f21c4419622421ee407be1d90a58933/5E24DD9B/t51.2885-15/e35/p320x320/47689688_287224058651439_5941001623868708459_n.jpg?_nc_ht=scontent.cdninstagram.com'); background-size:cover; background-position:center;	">
				<span class="label label-info" >SIGA E CURTA NOSSO INSTAGRAM</span><br>
				<a target="_blank"href="https://www.instagram.com/accounts/login/?next=%2Fsrfrank__%2F&source=follow" class="label label-info">SEGUIR</a>
			</div>
			<div class="pr2-social centered">
			<a target="_blank" href="https://www.instagram.com/srfrank__/" target="_blank" id="seguir" style="font-family: 'Dancing Script', cursive; font-size:17px"><i class="fa fa-instagram"></i> <b style="font-size:23px"> Instagram</b></a>
			</div>
			</div>
			<!-- /panel -->
              </div>
              <!--/ col-md-4 -->

		<div class="col-md-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-bullhorn fa-4x"></i>
                  <p class="user">DESEJA CRIAR ALGUMA PROMOÇÃO?</p>
                  <p>Crie promoções e divulgue no nosso site, aumente suas vendas/demanda atigindo milhares de pessoas. Clique em anunciar no card mais abaixo!</p>
                </div>
              </div>
              <div class="col-md-4 mb">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- Anuncio para painel --> <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1803332419619783" data-ad-slot="5463619402" data-ad-format="auto" data-full-width-responsive="true"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->

          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->

            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">ATIVIDADES RECENTES</h4>
		<!-- First Activity -->
		<div id="atvRecentes">
            @include('atividades.recentesEmp')
        </div>
		<div class="text-center">
			<h4>NOSSO INSTAGRAM</h4>
			<div class="insta-photos mb" >
				<div class="pr2-social centered" style="background:white; padding:10px; height:60px">
					<div class="img-insta" style="float:left;display:flex;justify-content:center; align-items:center">
						<a target="_blank"href=https://www.instagram.com/p/BoE9CjhnLHE/><img id="insta-img" class="img-circle" src=https://scontent.cdninstagram.com/vp/a89b9961ba543c9e0ad50668df298fb9/5E2B1EB4/t51.2885-19/s150x150/41994235_273303863291015_8073893064499789824_n.jpg?_nc_ht=scontent.cdninstagram.com></a>
					</div>
					<div class="info-insta" style="margin-bottom:5px;">
						@.srfrank__ <br>
						<p style="font-size:11px; ">
						A plataforma de salgueiro mais completa
						</p>
					</div>
				</div>
			<div class="img" style="display:flex;justify-content:center; align-items:center; overflow:hidden; width:100%; height: 200px; background:chartreuse;" >
				<img id="igm-insta-zoom" src=https://scontent.cdninstagram.com/vp/b9e996c9e4f534ae5494430995da69ee/5E2CA01F/t51.2885-15/e35/p320x320/40658088_263064664346958_268131613545433157_n.jpg?_nc_ht=scontent.cdninstagram.com alt="" >
			</div>
			</div>

		</div>

		<div class="text-center">
            @if(!empty($evento))
                @php
                $str = $evento->nome_evento;
                $str2 = str_replace(' ', '-', $str);
            @endphp
			<h4>EVENTOS DA CIDADE</h4>
		<div class="instagram-panel pn" style="background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.6)), url({{asset('storage/eventos/'.$evento->banner)}}); background-size:cover; background-repeat:no-repeat">
			<i class="fa fa-calendar fa-4x"></i>
			<h3 style="color:white; font-weight:900">EVENTO</h3>
            <h4 style="color:white">{{$evento->nome_evento}}</h4>
			<h4 style="color:white">{{$evento->inicio_data_evento}} as {{$evento->inicio_hora_evento}}</h4>
            <a style="color:white" href={{route('eventos').'/'.$str2.'_'.$evento->id}} class="mt btn btn-info">Mais informações</a>
            </div>
		</div>
        @else

			<h4>EVENTOS DA CIDADE</h4>
		<div class="instagram-panel pn" style="background: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.6)), url('img/img-15.jpg'); background-size:cover; background-repeat:no-repeat">
			<i class="fa fa-calendar fa-4x"></i>
			<h3 style="color:white">EVENTO</h3>
            <h4 style="color:white; letter-spacing:2px">Não há eventos na cidade! Caso tenha alguma evento contate nosso <a href={{route('contato.home').'#contato'}}>Atedimento!</a></h4>
			</div>
		</div>
        @endif

                <div class="stock card">
                  <div class="stock-chart">
                    <div id="chart"></div>
                  </div>
                  <div class="stock current-price">
                    <div class="row">
                      <div class="info col-sm-6 col-xs-6"><abbr>TOTAL</abbr>
                        <time>Total de pesquisas relacionadas</time>
                      </div>
                      <div class="changes col-sm-6 col-xs-6">
                        <div class="value up"><i class="fa fa-caret-up hidden-sm hidden-xs"></i>{{$buscas}}</div>
                        <div class="change hidden-sm hidden-xs"></div>
                      </div>
                    </div>
                  </div>
                  <div class="summary">
                    <strong></strong> <span>QUANTAS BUSCAS SEU NEGOCIO TEVE</span>
                  </div>
                </div>


		</div>
		</div>

		</div>

		<div>

		</div>
	</section>
</section>


<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="TituloModalCentralizado">Cadastro de promoção</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form id="form-data" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="idEmpresa" value={{$user->empresas->id}}>
        <div class="form-group">
            <label>Nome do produto</label>
            <input type="text" id="nomeProduto" name="nomeProduto" class="form-control" required>
        </div>
         <div class="form-group">
            <label>Descrição do produto</label>
            <textarea placeholder="No maximo 100 caracteres!" maxlength="100" class="form-control" name="descricaoProduto" id="descricaoProduto" cols="30" rows="6" required></textarea>
        </div>
        <div class="form-group">
            <label>Valor do produto</label>
            <input placeholder="Opcional" e="text" id="valorProduto" name="valorProduto" class="dinheiro form-control">
        </div>
        <div class="form-group">
            <label>Desconto da promoção</label>
            <input  maxlength="2" placeholder="Valor de desconto, exemplo: 50(%)"  id="promotion" type="text" id="descontoProduto" name="descontoProduto" class="form-control"  required>
        </div>
        <div class="form-group">
            <label>Data do fim da promoção</label>
            <input   id="data"  type="date" id="fimPromocao" name="fimPromocao" class="form-control" min="2020-02-01" max="2020-12-31" required>
        </div>
        <div class="form-group">
            <label for="bannerEmp" class="btn btn-warning">Adicionar imagem do produto</label>
            <input type="file" style="display:none;" id="bannerEmp" onchange="previewBanner()" name="banner" class="form-control"  required>
        </div>

        <div class="form-group" id="previaBanner">
            <div class="previaImg" id="prevImg" style="left: 10px !important; width: 287px !important;height:183px !important; background:black !important; border:none;"><div id="prev"><img class="previa" id="prevBanner" src={{asset('img/img-red.png')}}  ></div><div class="cancelarOp" id="excluirBanner"><i class="fa fa-times fa-2x" style="cursor:pointer; margin-left: 40px !important; margin-top:60px;"></i></div></div>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <button type="submit" id="saved" class="btn btn-success">Publicar</button>
    </div>
    </form>
</div>
</div>
</div>


@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
{!! $charts->script() !!}


<script type="text/javascript">

function limparInput(){
    $('#message').val('');
}

var successMessage = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Mesagam enviada com sucesso, agradeçemos seu feedback!",
    animation: 'zoomIn',
    audio: '../audio/bling2',
    volume: 80,
    closeButton: true,
    delayOnHover: true,
    showCountdown: true
});

$.ajaxSetup({
    headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
    });
$('#form-data-message').submit(function(e){
    $.ajax({
        type:"POST",
        url:'../api/mensagem',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
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
            limparInput();
            successMessage.open();
        }
    });
    e.preventDefault();
});

var modalConfirmPromotion = new jBox('Modal', {
    attach: '#test',
    title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
    content: "Promoção publicada com sucesso! <h4>OBS: Você só poderar publicar outra promoção quando expirar a data a qual você digitou!</h4>",
    animation: 'zoomIn',
    audio: '../audio/bling2',
    volume: 80,
    closeButton: true,
    delayOnHover: true,
    showCountdown: true
});

function limparInputs(){
    $('#nomeProduto').val('');
    $('#descricaoProduto').val('');
    $('#valorProduto').val('');
    $('#banner').val('');
    $('#descontoProduto').val('');
    $('#fimPromocao').val('');
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







$.ajaxSetup({
    headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
});

$("#form-data").submit(function(e){
    var id = {{Auth::user()->id}}
    $.ajax({
        type:"POST",
        url:'../api/empresario/promocao/add',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            load("open");
        },
        success: function(Response) {
            console.log(Response);
        },
        error: function(error){
            console.log(error);
        },
        complete: function(){
            load("close");
            $('#ExemploModalCentralizado').modal('hide');
            modalConfirmPromotion.open();
            getData(id);
        }
    });
    e.preventDefault();
});

$('#promotion').keyup(function(){
    var number = $(this).val();
    if($.isNumeric(number)){
    }
    else{
        $(this).val('');
    }
});

function getData(id){
    $.ajax(
    {
        url: '../api/empresario/verifica-promocao/'+id,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#card-promotion").empty().html(data);
    }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('No response from server');
    });
}


$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});


$('#excluirBanner').click(function(){
	$('#prevBanner').attr('src', "{!!asset('img/img-red.png')!!}");
	$('#bannerEmp').val('');
	$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});
});


$('#bannerEmp').change(function(){

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


$('.dinheiro').mask('#.##0,00', {reverse: true}).append('R$');


$('#clickModel').click(function(){
    $('#ExemploModalCentralizado').modal('show')
});

$(document).ready(function() {
	var unique_id = $.gritter.add({
	// (string | mandatory) the heading of the notification
	title: 'Bem vindo ao seu painel empresarial',
	// (string | mandatory) the text inside the notification
	text: 'Obtenha os resultados de seu anincio suas visitas e credibilidade perante aos usuarios!',
	// (string | optional) the image to display on the left
	image: 'img/logofinal1icon.png',
	// (bool | optional) if you want it to fade out on its own or just sit there
	sticky: false,
	// (int | optional) the time you want it to be alive for before fading out
	time: 8000,
	// (string | optional) the class name you want to apply to that specific message
	class_name: 'my-sticky-class'
	});

	return false;
});



</script>
@endsection
