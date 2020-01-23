
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
					<th>Nome da empresa</th>
					<th>Descrição</th>
					<th>Whatsaap</th>
					<th>Nicho</th>
					<th>Endereço</th>
					<th>Telefone</th>
					<th>Status</th>
					<th>Ações</th>
			</tr>
		</thead>
		<tbody id="myTable">
			<?php

			$id=0;
			?>
			@foreach ($empresas as $empresa)

			<tr>
			<td>
				<span class="custom-checkbox">
					<input type="checkbox" class="checkDelete" name="check" value={{$empresa->id}}>
					<label for="checkbox1"></label>
				</span>
			</td>
					<td>{{$empresa->id}}</td>
					<td>{{$empresa->permissions->users->email}}</td>
					<td>{{$empresa->name}}</td>
					<td id="modalDescricao{{$id+=1}}" data-description="{{$empresa->description}}">{{substr($empresa->description, 0, 20).'...'}}<div style="color:royalblue; cursor:pointer; text-decoration:underline" onclick="pegaId({{$id}})">Ver mais</div></td>
					<td>{{$empresa->whatsapp}}</td>
					<td>{{$empresa->nincho}}</td>
					<td>{{$empresa->location}}</td>
					<td>{{$empresa->tel}}</td>
					@if ($empresa->status == 'ativa')
					<td>
					<p style="background: rgb(9, 161, 9);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Ativo</p>
					</td>
				@else
					<td>
					<p style="background: #FE2E2E;color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Suspenso</p>
					</td>
					@endif

					<td>
						<button onclick="carregarEmpresa({{$empresa->id}})" style="background:#FFBF00; padding:2px; border: none; border-radius:4px; "><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i style="color: white !important;" class="fa fa-pencil" data-toggle="tooltip" title="Editar"></i></a></button>
						<button  onclick="excluirEmpPorra({{$empresa->id}})" class="delete " style="background:#FE2E2E; color:white; padding:2px; border: none; border-radius:4px; " ><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button>
					</td>
			</tr>

			@endforeach
		</tbody>
	</table>
@if(isset($todas))

@elseif(isset($desativadas))

@else
{{$empresas->links()}}

<div class="clearfix">
		<div class="hint-text">Mostrando <b>{{$empresas->count()}}</b> de <b> {{$empresas->total()}} </b>empresas</div>
	</div>
@endif
