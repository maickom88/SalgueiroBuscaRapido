@extends('templetes.tampletesDashboard.businessman.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL EMPRESARIAL ')

@section('menuPrincipal', 'active')

@section('conteudo')
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
                      <h2 style="color:#00AFEF">40</h2>
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
                  <p>Abril, 2019</p>
                  <footer>
                    <div class="pull-left">
                      <h5><i class="fas fa-clock"></i>8h</h5>
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
                  <p style="font-size: 20px;" class="text-center mt"><b>R$ 120,00</b><br/>Verificado! <i style="color:#00a3ee"class="fa  fa-check"></i></p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
            <div class="row">
              <div class="col-md-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-bullhorn fa-4x"></i>
                  <p class="user">DESEJA CRIAR ALGUMA PROMOÇÃO?</p>
                  <p >Crie promoções e divulgue no nosso site, aumente suas vendas/demanda atigindo milhares de pessoas</p>
                    <a href="#" class="btn btn-primary ">POSTAR PROMOÇÃO</a>
                </div>
              </div>
              <!-- /col-md-4-->
              <div class="col-md-8 mb">
			<div class="message-p pn">
			<div class="message-header">
			<h5>ALGUMA DÚVIDA?</h5>
			</div>
			<div class="row">
			<div class="col-md-3 centered hidden-sm hidden-xs">
			<img src=http://127.0.0.1:8000/img/logofinal1icon.png class="" width="60">
			</div>
			<div class="col-md-9">
			<p>
			<name>Suporte SBR</name>
			Envie alguma mensagem.
			</p>
			<p class="message">Digite alguma sugestão, melhorias para a plataforma ou crítica construtivas, duvidas iremos te responder por email, depois verifique sua caixa de mensagens</p>
			<form class="form-inline" role="form">
			<div class="form-group">
			<input type="text" class="form-control" id="exampleInputText" placeholder="Digite sua mensagem...">
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
             <div class="col-lg-4 col-md-4 col-sm-4 mb">
			<div class="content-panel pn">
			<div id="blog-bg">
			
			<div class="badge badge-popular">POPULAR</div>
			<div class="blog-title">Titulo da noticia</div>
			</div>
			<div class="blog-text">
			<p>Uma descrição para a noticia aqui exibida, contendo somente alguns caracteres. Assim sendo redirec... <a href="#">Leia mais</a></p>
			</div>
			</div>
		</div>	
              <!-- /col-md-4 -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    <div class="product-panel-2 pn" data-jbox-content="Content 1">
                      <div class="badge badge-hot">0%</div>
                      <img src="img/product.png" width="100" style="margin-top:20px;" alt="">
                      <h5 class="mt">Nenhuma Promoção Pendente</h5>
                      <h6>TOTAL Visitas: 0</h6>
                      <button class="btn btn-small btn-theme04">ANUNCIAR</button>
                    </div>
                  </div>
              <!-- /col-md-4 -->
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
             
					<div class="col-lg-4 col-md-4 col-sm-4 mb">
			
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
		<div class="desc">
		<div class="thumb">
			<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
		</div>
		<div class="details">
			<p>
			<muted>Agora a pouco</muted>
			<br/>
			<a href="#">Salão Beleza</a> Postou no feed<br/>
			</p>
		</div>
		</div>
		<!-- Second Activity -->
		<div class="desc">
		<div class="thumb">
			<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
		</div>
		<div class="details">
			<p>
			<muted>2 minutos agosto</muted>
			<br/>
			<a href="#">Sobreira net</a> Postou no feed<br/>
			</p>
		</div>
		</div>
		<!-- Third Activity -->
		<div class="desc">
		<div class="thumb">
			<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
		</div>
		<div class="details">
			<p>
			<muted>3 horas Agosto</muted>
			<br/>
			<a href="#">Santana movéis</a> Adicionou uma nova promoção<br/>
			</p>
		</div>
		</div>
		<!-- Fourth Activity -->
		<div class="desc">
		<div class="thumb">
			<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
		</div>
		<div class="details">
			<p>
			<muted>7 horas Agosto</muted>
			<br/>
			<a href="#">Eduardo Siqueira</a>Publicou um evento<br/>
			</p>
		</div>
		</div>
		<!-- USERS ONLINE SECTION -->
		<h4 class="centered mt">NOSSA EQUIPE DE APOIO</h4>
		<!-- First Member -->
		<div class="desc">
		<div class="thumb">
			<img class="img-circle" src=http://127.0.0.1:8000/img/ui-danro.jpg width="35px" height="35px" align="">
		</div>
		<div class="details">
			<p>
			<a href="#">MICHAEL FRANK</a><br/>
			
			</p>
		</div>
		</div>
		<!-- Second Member -->
		<div class="desc">
		<div class="thumb">
			<img class="img-circle" src=http://127.0.0.1:8000/img/handreyson.jpg width="35px" height="35px" align="">
		</div>
		<div class="details">
			<p>
			<a href="#">HANDREYSON FERNANDES</a><br/>
			
			</p>
		</div>
		</div>
		<!-- Third Member -->
		<div class="desc">
		<div class="thumb">
			<img class="img-circle" src=http://127.0.0.1:8000/img/iago-2.jpg width="35px" height="35px">
		</div>
		<div class="details">
			<p>
			<a href="#" >Iago Benício</a><br/>
			
			</p>
		</div>
		
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
			<h4>EVENTOS DA CIDADE</h4>
		<div class="instagram-panel pn">
			<i class="fa fa-calendar fa-4x"></i>
			<p>EVENTO<br/> 
			</p>
			<p>No momento não há eventos na cidade!</p>
			</div>
		</div>
		
                <div class="stock card">
                  <div class="stock-chart">
                    <div id="chart"></div>
                  </div>
                  <div class="stock current-price">
                    <div class="row">
                      <div class="info col-sm-6 col-xs-6"><abbr>TOTAL</abbr>
                        <time>Mês</time>
                      </div>
                      <div class="changes col-sm-6 col-xs-6">
                        <div class="value up"><i class="fa fa-caret-up hidden-sm hidden-xs"></i> 220</div>
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

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $charts->script() !!}

<script type="text/javascript">
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