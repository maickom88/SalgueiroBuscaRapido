@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - CONTATO ')

@section('contato', 'active')

@section('conteudo')
	<section id="main-content">
      <section class="wrapper site-min-height">
		
			<div class="row mt">
				<div class="container">
					<div class="table-wrapper">
						 <div class="table-title">
							<div class="row">
								<div class="col-sm-6">
									 <h2 style="float: left;padding-right: 20px;">EMPRESAS <b>PENDENTES</b></h2>
							 	</div>
							</div>
						 </div>
						 <table class="table table-striped table-hover">
							  <thead>
									<tr>
								 <th>
									 <span class="custom-checkbox">
										 <input type="checkbox" id="selectAll">
										 <label for="selectAll"></label>
									 </span>
								 </th>
								<th>Id</th>
								<th>Nome</th>
								<th>Telefone</th>
								<th>Assunto</th>
								<th>Status</th>
								</tr>
							  	</thead>
							  	<tbody>
								<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td>1</td>
								<td>Orlando Silva</td>
								<td>999999999</td>
								<td>Mensagem</td>
								<td>	
									<p style="background: rgb(175, 73, 6);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Pendente</p>
								</td>
									<td>
										 <a  class="edit" data-toggle="modal"><i class="fa fa-check" data-toggle="tooltip" title="Aceitar"></i></a>
										 <a  class="delete" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Recusar"></i></a>
									 </td>
								</tr>
									 
							  </tbody>
						 </table>
					 <div class="clearfix">
							  <div class="hint-text">Mostrando <b>5</b> de <b>25 </b>empresas pendentes</div>
							  <ul class="pagination">
									<li class="page-item disabled"><a href="#">Anterior</a></li>
									<li class="page-item"><a href="#" class="page-link">1</a></li>
									<li class="page-item"><a href="#" class="page-link">2</a></li>
									<li class="page-item active"><a href="#" class="page-link">3</a></li>
									<li class="page-item"><a href="#" class="page-link">4</a></li>
									<li class="page-item"><a href="#" class="page-link">5</a></li>
									<li class="page-item"><a href="#" class="page-link">Próximo</a></li>
							  </ul>
						 </div>
					</div>
			  </div>
			 <!-- Delete Modal HTML -->
			</div>









			<div class="row mt">
				<div class="container">
					<div class="table-wrapper">
						 <div class="table-title">
							<div class="row">
								<div class="col-sm-6">
									 <h2 style="float: left;padding-right: 20px;">PARCEIRIAS <b>PENDENTES</b></h2>
							 	</div>
							</div>
						 </div>
						 <table class="table table-striped table-hover">
							  <thead>
									<tr>
								 <th>
									 <span class="custom-checkbox">
										 <input type="checkbox" id="selectAll">
										 <label for="selectAll"></label>
									 </span>
								 </th>
								<th>Id</th>
								<th>Email</th>
								<th>Pedido</th>
								<th>Status</th>
								</tr>
							  	</thead>
							  	<tbody>
								<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td>1</td>
								<td>orlando@silva.com</td>
								<td>Quero me tornar parceiro</td>
								<td>	
									<p style="background: rgb(175, 73, 6);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Pendente</p>
								</td>
									<td>
										 <a  class="edit" data-toggle="modal"><i class="fa fa-check" data-toggle="tooltip" title="Aceitar"></i></a>
										 <a  class="delete" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Recusar"></i></a>
									 </td>
								</tr>
									 
							  </tbody>
						 </table>
					 <div class="clearfix">
							  <div class="hint-text">Mostrando <b>5</b> de <b>25 </b>empresas pendentes</div>
							  <ul class="pagination">
									<li class="page-item disabled"><a href="#">Anterior</a></li>
									<li class="page-item"><a href="#" class="page-link">1</a></li>
									<li class="page-item"><a href="#" class="page-link">2</a></li>
									<li class="page-item active"><a href="#" class="page-link">3</a></li>
									<li class="page-item"><a href="#" class="page-link">4</a></li>
									<li class="page-item"><a href="#" class="page-link">5</a></li>
									<li class="page-item"><a href="#" class="page-link">Próximo</a></li>
							  </ul>
						 </div>
					</div>
			  </div>
			 <!-- Delete Modal HTML -->
			</div>
      </section>
      <!-- /wrapper -->
    </section>
@endsection
