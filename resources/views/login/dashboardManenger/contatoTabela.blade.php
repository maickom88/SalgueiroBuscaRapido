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
		
											<button onclick="excluirMensagens({{$messenge->id}})" " class="delete " style="background:#FE2E2E; color:white; padding:2px; border: none; border-radius:4px; " ><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button>
										</td>
								</tr>									
								@endforeach						
								</tbody>
								
						</table>
{{ $contact->links() }}