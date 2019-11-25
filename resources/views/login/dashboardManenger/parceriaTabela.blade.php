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
											<button onclick="parceria({{$pedido->id}})" style="background:green; padding:1px; border: none; border-radius:4px; "><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i style="color: white !important;" class="fa fa-check" data-toggle="tooltip" title="Aceitar"></i></a></button>
											<button  onclick="negarParceria({{$pedido->id}})" class="delete " style="background:#FE2E2E; color:white; padding:1px; border: none; border-radius:4px; " ><i class="fa fa-ban" data-toggle="tooltip" title="Rejeitar"></i></button>
										</td>
								</tr>
									
							@endforeach
									
															</tbody>
															
						</table>