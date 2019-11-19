@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - CONTATO ')

@section('contato', 'active')

@section('conteudo')
<section id="main-content">
	<section class="wrapper site-min-height">
	
		<div class="row mt">
			<div class="container">
				<div class="table-wrapper" >
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
						<h2 style="float: left;padding-right: 20px;">LISTAR <b>MENSAGENS DE CONTATO</b></h2>
						<div class="escolhaop" style=" width: 100%; height: 100%;" >
						<select name="" id="filtro" style="width: 90px; height:30px; border: 1px solid #fff; background: #0397D6">
							<option value="todas">FILTRAR</option>
							<option value="todas">POR DATA</option>
						</select>
					</div>
					</div>
					<div class="col-sm-6">
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></a>
						<div class="form-search" style="display:flex; margin-left: 70px">
						
						<input type="text" id="myInput" class="form-control" style="border: 1px solid rgb(139, 139, 139);color: rgb(139, 139, 139); border-radius:50px; width: 180px;" placeholder="Buscar...">
						</div>						
					</div>
					</div>
				</div>
				<div class="table-responsive" id="table_data">
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
										<th>Data</th>
										<th>Nome</th>
										<th>Telefone</th>
										<th>Email</th>
										<th>Mensagem</th>
										<th>Excluir</th>
								</tr>
							</thead>
							<tbody id="myTable">
								@foreach ($contact as $messenge)
								@php
									$data = $messenge->created_at;
									$data = explode(' ', $data);
									$dataBr = explode('-', $data[0]);
									$dataBr = $dataBr[2].'/'.$dataBr[1].'/'.$dataBr[0];
								@endphp 

								<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" class="checkDelete" name="check" value=1>
										<label for="checkbox1"></label>
									</span>
								</td>
										<td>{{$messenge->id}}</td>
										<td>{{$dataBr}}</td>
										<td>{{$messenge->name}}</td>
										<td>{{$messenge->tel}}</td>
										<td>{{$messenge->email}}</td>
										<td>{{$messenge->content}}</td>
										<td>
		
											<button  onclick="excluirEmpPorra(1)" class="delete " style="background:#FE2E2E; color:white; padding:2px; border: none; border-radius:4px; " ><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button>
										</td>
								</tr>									
								@endforeach						
								</tbody>
								
						</table>
{{ $contact->links() }}
					<div class="clearfix">
							<div class="hint-text">Mostrando <b>{{$contact->count()}}</b> de <b> {{$contact->total()}} </b>empresas</div>
						</div>
																</div>

				
		</div>
	</div>
				</div>
			</div>
			<!-- Delete Modal HTML -->
		</div>









		<div class="row mt">
			<div class="container">
				<div class="table-wrapper" >
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
						<h2 style="float: left;padding-right: 20px;">LISTAR <b>PEDIDOS DE PARCERIA</b></h2>
						<div class="escolhaop" style=" width: 100%; height: 100%;" >
					</div>
					</div>
					<div class="col-sm-6">
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></a>
						<div class="form-search" style="display:flex; margin-left: 70px">
						
						<input type="text" id="myInput" class="form-control" style="border: 1px solid rgb(139, 139, 139);color: rgb(139, 139, 139); border-radius:50px; width: 180px;" placeholder="Buscar...">
						</div>						
					</div>
					</div>
				</div>
				<div class="table-responsive" id="table_data">
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
										<th>Data</th>
										<th>Nome</th>
										<th>Email</th>
										<th>Pedido</th>
										<th>Status</th>
										<th>Ação</th>
								</tr>
							</thead>
							<tbody id="myTable">
								@foreach ($parceiro as $pedido)
								@php
									$data = $pedido->created_at;
									$data = explode(' ', $data);
									$dataBr = explode('-', $data[0]);
									$dataBr = $dataBr[2].'/'.$dataBr[1].'/'.$dataBr[0];
								@endphp 
												
										<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" class="checkDelete" name="check" value=1>
										<label for="checkbox1"></label>
									</span>
								</td>
										<td>{{$pedido->id}}</td>
										<td>{{$dataBr}}</td>
										<td>{{$pedido->user->name}}</td>
										<td>{{$pedido->user->email}}</td>
										<td>{{$pedido->pedidos}}</td>
										
																				<td>
										<p style="background:chocolate;color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Pendente</p>
										</td>
																				
										<td>
											<button onclick="carregarEmpresa(1)" style="background:#FFBF00; padding:1px; border: none; border-radius:4px; "><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i style="color: white !important;" class="fa fa-check" data-toggle="tooltip" title="Editar"></i></a></button>
											<button  onclick="excluirEmpPorra(1)" class="delete " style="background:#FE2E2E; color:white; padding:1px; border: none; border-radius:4px; " ><i class="fa fa-times" data-toggle="tooltip" title="Excluir"></i></button>
										</td>
								</tr>
									
							@endforeach
									
															</tbody>
															{{ $parceiro->links() }}
						</table>
											

					<div class="clearfix">
							<div class="hint-text">Mostrando <b>4</b> de <b> 4 </b>empresas</div>
						</div>
																</div>

				
		</div>
	</div>
			</div>
			<!-- Delete Modal HTML -->
		</div>
	</section>
	<!-- /wrapper -->
	</section>

@section('scripts')
<script>
$(function(){
function carregarContato(id){
$.getJSON('../api/administrativo/empresas/mensagens/', function(data){		
	
});				
}
});

</script>
@endsection

@endsection
