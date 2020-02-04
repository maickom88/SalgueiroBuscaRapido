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
<h4>Faça publicações</h4>
<p>Post notícias, artigos e idéias!</p>
</div>
</div>
<!-- end dmbox -->
<div class="col-lg-4 col-md-4 col-sm-12">
<div class="dmbox">
<div class="service-icon">
<a class="" href="faq.html#"><i class="dm-icon fa fa-eye fa-3x"></i></a>
</div>
<h4>Obtenha visualizações</h4>
<p>Seja um blogueiro, tenha seus posts lidos pela comunidade!</p>
</div>
</div>
<!-- end dmbox -->
<div class="col-lg-4 col-md-4 col-sm-12">
<div class="dmbox">
<div class="service-icon">
<a class="" href="faq.html#"><i class="dm-icon fa  fa-trophy fa-3x"></i></a>
</div>
<h4>Ganhe reconhecimento</h4>
<p>Produza conteúdo, fidelize leitores de toda a região</p>
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
<p>Com a parceria, você obtêm acesso a criar postagens no “blog”. As publicações vão de notícias, denúncias, relatos embasados com fatos, artigos, dicas e tutoriais. Conteúdos inapropriados, fatos falsos ou consideradas calúnias, serão imediatamente excluídas.
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
<p>O parceiro sendo ativo, terá controle de suas postagens através de uma página,
contendo informações como comentários e quantidade de visualizações assim também podendo gerencias, excluir e editar.
</p>
</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseThree">
<em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>O reconhecimento
</a>
</div>
<div id="collapseThree" class="accordion-body collapse">
<div class="accordion-inner">
<p>Suas postagens será medida e avaliadas, quanto mais valor do conteúda mais chances de obter um número maior de visitas ao seu post.
Uma publicação com muitas visualizações será recomendada para todos os usuários da plataforma, ficando assim em alta!
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
