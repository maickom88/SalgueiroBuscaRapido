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
				<th>Proprietario</th>
				<th>Empresa</th>
				<th>Telefone</th>
				<th>Contrato</th>
				<th>Valor</th>
				<th>Inicio do contrato</th>
				<th>Expiração do contrato</th>
				<th>Status</th>
				<th>Renovação do contrato</th>
		</tr>
	</thead>
	<tbody id="myTable">
        @foreach ($contratos as $contrato)
        @php
            $inicio = $contrato->inicio_contrato;
            $inicioData = explode('-', $inicio);
            $fim = $contrato->fim_contrato;
            $fimData = explode('-', $fim);
        @endphp
            <tr>
		<td>
			<span class="custom-checkbox">
				<input type="checkbox" class="checkDelete" name="check" value=1>
				<label for="checkbox1"></label>
			</span>
		</td>
            <td>{{$contrato->id}}</td>
            <td>{{$contrato->empresas->permissions->users->name}}</td>
            <td>{{$contrato->empresas->name}}</td>
            <td>{{$contrato->empresas->tel}}</td>
            <td>{{$contrato->tipo}}</td>
            <td>{{$contrato->valor}} <b>R$</b></td>
            <td>{{$inicioData[2].'/'.$inicioData[1].'/'.$inicioData[0]}}</td>
            <td>{{$fimData[2].'/'.$fimData[1].'/'.$fimData[0]}}</td>
            @if($contrato->status == 'ativa')
                <td><span class="btn btn-success">Ativo</span></td>
            @else
                <td><span class="btn btn-danger">Expirado</span></td>
            @endif
            <td>
                <button onclick='updatePermission({{$contrato->id}})' class="btn btn-warning bt-sm" ><i class="fa fa-gears" data-toggle="tooltip" title="Renovar"></i></button>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>
@if(isset($todas))

@elseif(isset($desativadas))

@else
{{$contratos->links()}}

<div class="clearfix">
    <div class="hint-text">Mostrando <b>{{$contratos->count()}}</b> de <b> {{$contratos->total()}} </b>Contratos</div>
</div>
@endif
