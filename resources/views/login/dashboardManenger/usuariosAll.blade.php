
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
			<th>Permissão</th>
			<th>Usúario desde</th>
			<th>Último sessão</th>
			<th>Endereço</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody id="myTable">
		@foreach ($users as $user)
		@php
			if($user->permissions->adm == 'sim'){
				$permission = 'Administrador';
				$color = '#0397D6';
			}
			else if($user->permissions->blogueiro == 'sim' ){
				$permission = 'Blogueiro';
				$color = '#A0D197';
			}
			else if($user->permissions->empresario == 'sim' ){
				$permission = 'Empresarial';
				$color = '#797979';
			}
			else if($user->permissions->user == 'sim' and $user->permissions->blogueiro == 'nao'){
				$permission = 'Usúario';
				$color = '#FCB322';
			}
			$dateHors = $user->created_at;
			$date = explode(' ', $dateHors);
			$date = explode('-', $date[0]);
			$dateCreat = $date[2].'/'.$date[1].'/'.$date[0];
		@endphp
			<tr>
			<td>
				<span class="custom-checkbox">
					<input type="checkbox" class="checkDelete" name="check" value=1>
					<label for="checkbox1"></label>
				</span>
			</td>
			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td><button class="btn" style="background:{{$color}}; color:white">{{$permission}}</button></td>
			<td>{{$dateCreat}}</td>
			<td>12/02/2019 - as 18:20</td>
			@empty(!$user->info)
				@empty(!$user->info->endereco)
					<td>{{$user->info->endereco}}</td>
				@else
					<td>Localidade indefinida!</td>
				@endempty
			@else
			<td>Localidade indefinida!</td>
			@endempty
			<td>
				<button onclick='updatePermission({!!$user->id!!}, "{{$permission}}")' class="delete" style="background:orange; color:white; padding:2px; border: none; border-radius:4px; " ><i class="fa fa-pencil" data-toggle="tooltip" title="Editar Permissão"></i></button>
				<button data-confirm onclick='deleteUser({{$user->id}}, "{{$permission}}")' class="delete" style="background:#FE2E2E; color:white; padding:2px; border: none; border-radius:4px; " ><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@empty($todas)
{{$users->links()}}

<div class="clearfix">
		<div class="hint-text">Mostrando <b>{{$users->count()}}</b> de <b>{{$users->total()}} </b>Usúarios</div>
</div>
@endempty
