 
@extends('templetes.tampletesDashboard.businessman.site')	 

	
@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PAGAMENTO')

@section('links')
	 <link href={{asset("lib/advanced-datatable/css/demo_table.css")}} rel="stylesheet" />
  <link rel="stylesheet" href={{asset("lib/advanced-datatable/css/DT_bootstrap.css")}} />
@endsection

@section('pagamento', 'active')

@section('conteudo')
<section id="main-content">
   <section class="wrapper">
		<h3><i class="fa fa-angle-right"></i>Contratos</h3>
      <div class="row mb">
			<div class="content-panel">
				<div class="adv-table">
					<table class="table table-dark">
						<thead>
							<tr style="background:#4FC1E9; color:white">
								<th scope="col">Dia</th>
								<th scope="col">Mês</th>
								<th scope="col">Ano</th>
								<th scope="col">Termino</th>
								<th scope="col">Plano</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Janeiro</td>
								<td>2019</td>
								<td>21/20/40</td>
								<td>Trimensal</td>
								<td> <span class="btn btn-success">Pago</span></td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		
   </section>
</section>




@endsection