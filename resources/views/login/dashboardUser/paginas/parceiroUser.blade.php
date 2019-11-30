@extends('templetes.tampletesDashboard.User.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PARCEIRIA')

@section('parceiro', 'active')

@section('conteudo')
<section id="main-content">
<section class="wrapper site-min-height">
<div class="row mt mb">
<div class="col-lg-12">
<h3><i class="fa fa-angle-right"></i> Quer ser nosso parceiro ?</h3>
<br>
<div class="col-lg-4 col-md-4 col-sm-12">
<div class="dmbox">
<div class="service-icon">
<a class="" href="faq.html#"><i class="dm-icon fa  fa-pencil-square fa-3x"></i></a>
</div>
<h4>Post no blog</h4>
<p>Faça postagens de notícias no blog</p>
</div>
</div>
<!-- end dmbox -->
<div class="col-lg-4 col-md-4 col-sm-12">
<div class="dmbox">
<div class="service-icon">
<a class="" href="faq.html#"><i class="dm-icon fa fa-eye fa-3x"></i></a>
</div>
<h4>Obtenha visualizações</h4>
<p>Seja bem visualizado com as postagens</p>
</div>
</div>
<!-- end dmbox -->
<div class="col-lg-4 col-md-4 col-sm-12">
<div class="dmbox">
<div class="service-icon">
<a class="" href="faq.html#"><i class="dm-icon fa  fa-usd fa-3x"></i></a>
</div>
<h4>Ganhe rendimento</h4>
<p>Seja recompensado com as suas postagens</p>
</div>
</div>
<!-- end dmbox -->
</div>
<!--  /col-lg-12 -->
</div>
<!-- /row -->
<div class="row content-panel">
<h2 class="centered">Sobre a parceria</h2>
<div class="col-md-10 col-md-offset-1 mt mb">
<div class="accordion" id="accordion2">
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseOne">
<em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>As postagens
</a>
</div>
<div id="collapseOne" class="accordion-body collapse">
<div class="accordion-inner">
<p>Com a parceria, você obtem o acesso de postagens no blog. As postagens são de notícias 
válidas, sem conteúdos inapropriados. 
</p>
</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseTwo">
<em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>As visualizações
</a>
</div>
<div id="collapseTwo" class="accordion-body collapse">
<div class="accordion-inner">
<p>De acordo com as postagens que fizer, você obtem as visualizações de quem acessa ao seu conteúdo.
Os totais de visualizações que obtiver, dirão o seu nível de confiabilidade.
</p>
</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseThree">
<em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>O rendimento
</a>
</div>
<div id="collapseThree" class="accordion-body collapse">
<div class="accordion-inner">
<p>O seu rendimento sera atribuido de acordo com os totatis de visualizações que obter, seu nível 
de confiabilidade e as quantidades de postagens feitas. 
</p>
</div>
</div>
</div>
</div>
<!-- end accordion -->
</div>
<div style="width: 100%; text-align: center">
<form id="form" action={{route('parceria.send')}} method="POST">
	@csrf
	@if(empty($isParceiro))
		<label  class="btn-primary btn-lg mb" for="parceria">Me tornar parceiro</label>
	@elseif($user->parceiro->pedidos == 'negado')
		<label  class=" btn-lg mb"> <i class="fa fa-times"></i> Seu pedido para se tornar blogueiro foi negado, tente novamente em 30 a 60 dias</label>
	@elseif($user->parceiro->pedidos == 'Ativo')
	<label style="padding:10px; background:#3e3e3e; color:white" class="btn-lg mb"> <i class="fa fa-check"></i> Parábens seu pedido foi aprovado! <a href="">Click aqui</a> e faça seu primeiro post!</label>
	@else
		<label  class="btn-success btn-lg mb"> <i class="fa fa-check"></i> Aguardando aprovação</label>
	@endif
		<input type="submit" style="display:none;"id="parceria" name="pedido" id="pedido" value="Desejo ser Parceiro do site!">
</form>
</div>
<!-- col-md-10 -->
</div>
<br>


<!--  /row -->
</section>
<!-- /wrapper -->
</section>


@endsection