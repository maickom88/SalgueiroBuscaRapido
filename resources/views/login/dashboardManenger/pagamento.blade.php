@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - PAGAMENTOS ')

@section('pag', 'active')

@section('conteudo')
	<section id="main-content">
      <section class="wrapper site-min-height">
		
			<div class="row mt">
				<div class="container">
					<div class="table-wrapper">
						 <div class="table-title">
							<div class="row">
								<div class="col-sm-6">
									 <h2 style="float: left;padding-right: 20px;">TABELA DE PAGAMENTO</b></h2>
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
								<th>Plano</th>
                <th>Inicio</th>
                <th>Expira</th>
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
								<td>Benicio-locaçõs</td>
								<td>R$ 69,99</td>
                <td>26/10/2019</td>
                <td>26/12/2019</td>
                <td><p style="background: rgb(9, 161, 9);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Ativo</p></td>
								<td>
									 <a  class="edit" data-toggle="modal"><i class="fa  fa-thumbs-o-up" data-toggle="tooltip" title="Ok"></i></a>
                </tr>
                <tr>
                  <td>
                    <span class="custom-checkbox">
                      <input type="checkbox" id="checkbox1" name="options[]" value="1">
                      <label for="checkbox1"></label>
                    </span>
                  </td>
                  <td>2</td>
                  <td>iago-celulares</td>
                  <td>R$ 69,99</td>
                  <td>25/08/2019</td>
                  <td>25/10/2019</td>
                  <td><p style="background: rgb(100, 3, 3);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Expirada</p></td>
                  <td>
                     <a  class="edit" data-toggle="modal"><i class="fa fa-mail-reply" data-toggle="tooltip" title="Renovar"></i></a>
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