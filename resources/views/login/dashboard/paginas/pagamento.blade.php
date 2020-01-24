
@extends('templetes.tampletesDashboard.businessman.site')


@section('titulo', 'SALGUEIRO BUSCA RAPIDO: PAGAMENTO')

@section('links')
	<link href={{asset("lib/advanced-datatable/css/demo_table.css")}} rel="stylesheet" />
    <link rel="stylesheet" href={{asset("lib/advanced-datatable/css/DT_bootstrap.css")}} />
@endsection

@section('pagamento', 'active')

@section('conteudo')
<section id="main-content">
     @php
        $inicio = $user->empresas->contratos->inicio_contrato;
        $inicioData = explode('-', $inicio);
        $fim = $user->empresas->contratos->fim_contrato;
        $fimData = explode('-', $fim);
    @endphp
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="container" >
                <h3><i class="fa fa-angle-right"></i>Contratos</h3>
        <div class="row mb">
			<div class="content-panel" style="background:#EAEAEA;">
				<div class="adv-table">
					<table class="table">
						<thead>
							<tr style="background:#4FC1E9; color:white">
								<th scope="col">Inicio do contrato</th>
								<th scope="col">Término do contrato</th>
								<th scope="col">Valor</th>
								<th scope="col">Plano</th>
								<th scope="col">Status</th>
                                <th scope="col">Número para renovação</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{$inicioData[2].'/'.$inicioData[1].'/'.$inicioData[0]}}</td>
								<td>{{$fimData[2].'/'.$fimData[1].'/'.$fimData[0]}}</td>
								<td>{{$user->empresas->contratos->valor}}</td>
								<td>{{$user->empresas->contratos->tipo}}</td>
								@if($user->empresas->contratos->status == 'ativa')
                                    <td><span class="btn btn-success">Ativo</span></td>
                                @else
                                    <td><span class="btn btn-danger">Expirado</span></td>
                                @endif
                                <td class="btn btn-info">55+ 87 98838-2558</td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
            </div>
        </div>
    </section>
</section>

@endsection
