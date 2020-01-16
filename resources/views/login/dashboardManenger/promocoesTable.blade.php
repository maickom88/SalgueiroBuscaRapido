
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
            <th>Usúario</th>
			<th>Autor</th>
			<th>Titulo</th>
			<th>Empresa</th>
			<th>Data de fim de promoção</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody id="myTable">
        @foreach ($promotions as $promotion)
            <tr>
			<td>
				<span class="custom-checkbox">
					<input type="checkbox" class="checkDelete" name="check" value=1>
					<label for="checkbox1"></label>
				</span>
			</td>
			<td>{{$promotion->id}}</td>
			<td>{{$promotion->empresa->permissions->users->email}}</td>
			<td>{{$promotion->empresa->permissions->users->name}}</td>
			<td>{{$promotion->title}}</td>
			<td>{{$promotion->empresa->name}}</td>
            <td>{{$promotion->data_fim_promocao}}</td>
            <td><span class="btn btn-success">Ativo</span></td>
            <td><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
		</tr>
        @endforeach
	</tbody>
</table>
<div class="clearfix">
		<div class="hint-text">Mostrando <b>4</b> de <b>3</b> Usúarios</div>
</div>
