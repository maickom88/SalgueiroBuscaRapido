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
                                <th>Quantidade de posts</th>
								<th>Status</th>
								<th>Ação</th>
								</tr>
							  	</thead>
							  	<tbody>
								@foreach ($userPer as $user)
									<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td>{{$user->users->id}}</td>
								<td>{{$user->users->name}}</td>
								<td>{{$user->users->email}}</td>
                                <td>{{$user->users->posts->count()}}</td>
								<td>
									<p style="background: rgb(9, 161, 9);color:#fff; text-align:center; border-radius: 2px; padding: 5px;">Blogueiro</p>
								</td>
									<td>
										<button onclick="editPartner({{$user->users->id}})" id="btnParceria" style="background:#FFBF00; padding:2px; border: none; border-radius:4px; "><i style="color: white !important;" class="fa fa-pencil" data-toggle="tooltip" title="Editar"></i></button>
									</td>
								</tr>

								@endforeach
							  </tbody>
						 </table>
