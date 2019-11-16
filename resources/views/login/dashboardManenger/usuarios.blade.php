@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - USÚARIOS ')

@section('user', 'active')

@section('conteudo')
	 <section id="main-content">
      <section class="wrapper site-min-height">
		
			<div class="row mt">
				<div class="container">
					<div class="table-wrapper">
						 <div class="table-title">
							<div class="row">
								<div class="col-sm-6">
                                     <h2 style="float: left;padding-right: 20px;">Usuários</h2>
                                     <div class="escolhaop" style=" width: 100%; height: 100%;" >
                                        <select name="" id="" style="width: 90px; height:30px; border: 1px solid #fff; background: #0397D6">
                                            <option value="">TODOS</option>
                                            <option value="">ATIVOS</option>
                                            <option value="">A-Z</option>
                                            <option value="">Z-A</option>
                                        </select>
                                       </div>
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
                                <th>Email</th>  
                                <th>Permissões</th>
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
								<td>Orlando</td>
                                <td>orlando@.com</td>
                                <td>Permissão: Usuario</td>
                                
								<td>	
									<p style="background: rgb(9, 161, 9);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Ativo</p>
								</td>
									<td>
										 <a  class="edit" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" title="Editar"></i></a>
										 <a  class="delete" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></a>
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