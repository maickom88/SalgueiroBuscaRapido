<table class="table table-striped table-hover">
	<thead>
		<tr>
		<th>
			<span class="custom-checkbox">
				<input type="checkbox" id="selectAll" onclick="checkAll()">
				<label for="selectAll"></label>
			</span>
		</th>
            <th>Id</th>
            <th>Autor do evento</th>
            <th>Nome do evento</th>
            <th>Endereço</th>
            <th>data do evento</th>
            <th>data de término</th>
            <th>data de expiração</th>
            <th>Ação</th>
        </tr>
	</thead>
	<tbody id="myTable">
        @foreach ($eventos as $evento)
        @php
            date_default_timezone_set("Brazil/East");
            $dataAtual = date("Y/m/d");
            $data = $evento->fim_data_evento;
            $data = explode('/', $data);
            $data = end($data).'/'.$data[1].'/'.$data[0];
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P30D')); // 30 dias
            $fim = $data->format('Y/m/d');
            $fimDate = date("Y/m/d", strtotime($fim));
            $dataBr = explode('/',$fimDate);
            $dateExpirade = strtotime($dataAtual) >= strtotime($fimDate) ? true : false;
        @endphp
            <tr>
		<td>
			<span class="custom-checkbox">
				<input type="checkbox" class="checkDelete" name="check" value={{$evento->id}}>
				<label for="checkbox1"></label>
			</span>
		</td>
        @php
            $str = $evento->nome_evento;
            $str2 = str_replace(' ', '-', $str);
        @endphp
            <td>{{$evento->id}}</td>
            <td>{{$evento->user->name}}</td>
            <td>{{$evento->nome_evento}}</td>
            <td>{{$evento->endereco}}</td>
            <td>{{$evento->inicio_data_evento}}</td>
            <td>{{$evento->fim_data_evento}}</td>
            <td>{{end($dataBr).'/'.$dataBr[1].'/'.$dataBr[0] }} @if ($dateExpirade) <span style="padding:5px; background:#DF0101; color:white"> Expirado</span></td> @endif
            <td style="display:flex">
                <button onclick='excluirEvento({{$evento->id}})' class="btn btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button>
                <a target="_blank" href={{route('eventos').'/'.$str2.'_'.$evento->id}} style="margin-left:5px; color:white" class="btn btn-info">Visualizar</a>
            </td>
		</tr>
        @endforeach
    </tbody>

</table>
@if(empty($todas))
{{$eventos->links()}}
<div class="clearfix">
    <div class="hint-text">Mostrando <b>{{$eventos->count()}}</b> de <b>{{$eventos->total()}}</b> Eventos</div>
</div>
@endif
