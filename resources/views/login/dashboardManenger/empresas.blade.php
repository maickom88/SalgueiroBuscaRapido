@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - EMPRESAS')

@section('empresas', 'active')

@section('links')
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-datepicker/css/datepicker.css")}}/>
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-daterangepicker/daterangepicker.css")}} />
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-timepicker/compiled/timepicker.css")}} />
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-datetimepicker/datertimepicker.css")}} />
@endsection

@section('conteudo')x
<div class="loader loader-bouncing "></div>
<section id="main-content">

<section class="wrapper site-min-height">

	<div class="row mt">
		<div class="container" style="width:100%">
			<div class="table-wrapper" >
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
							<h2 style="float: left;padding-right: 20px;">LISTAR <b>EMPRESAS</b></h2>
							<div class="escolhaop" style=" width: 100%; height: 100%;" >
							<select name="" id="filtro" style="width: 90px; height:30px; border: 1px solid #fff; background: #0397D6">
								<option value="todas">TODAS</option>
								<option value="ativa">ATIVAS</option>
								<option value="desativada">SUSPENSAS</option>
							</select>
						</div>
						</div>
						<div class="col-sm-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Adicionar Empresa</span></a>
							<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Deletar</span></a>
							<div class="form-search" style="display:flex; margin-left: 70px">

							<input type="text" id="myInput" class="form-control" style="border: 1px solid rgb(139, 139, 139);color: rgb(139, 139, 139); border-radius:50px; width: 180px;" placeholder="Buscar...">
							</div>
						</div>
						</div>
					</div>
					<div class="table-responsive" id="table_data">
						@include('login.dashboardManenger.empresasAll')
					</div>


			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="addEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="form-data" enctype="multipart/form-data">
					@csrf
						<div class="modal-header">
							<h4 class="modal-title">Adicionar empresa</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<span id="vincular" class="btn btn-info">Vincular a um usúario existente</span>
							</div>
							<div id="userAccount">
								<div class="form-group">
									<label>Email da empresa</label>
									<input type="email" id="emailEmp" class="form-control" name="emailEmp" required >
								</div>
								<div class="form-group">
									<label>Senha da conta</label>
									<input type="password" id="passEmp" name="password" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Confirmar senha</label>
									<input type="password" id="confPassEmp" name="confSenha" class="form-control" required>
								</div>
							</div>
							<div id="userVincule" style="display:none;">
								<div class="form-group">
									<label>Email do usúario</label>
									<input type="email" id="emailVincule" name="emailVincule" class="form-control">
								</div>

							</div>
							<div class="form-group">
								<label>Proprietário</label>
								<input type="text" id="nameUser" name="name" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="avatarEmp" class="btn btn-warning">Adicionar um logoMarca</label>
								<input type="file" id="avatarEmp" style="display:none" name="imagem" onchange="previewImagam()" class="form-control" >
							</div>
							<div class="form-group" id="previaAvatar">
									<div class="previaImg" id="prevImg" style="left: 10px !important; width: 120px !important;background:black !important; border:none;"><div id="prev"><img class="previa" id="prevAvatar" src={{asset('img/profilezim.png')}} ></div><div id="cancelAvatar" class="cancelarOp"><i id="excluirAvatar" class="fa fa-times fa-2x" style="cursor:pointer"></i></div></div>

							</div>
							<div class="form-group">
								<label for="bannerEmp" class="btn btn-warning">Adicionar um banner</label>
								<input type="file" style="display:none;" id="bannerEmp" onchange="previewBanner()" name="banner" class="form-control" >
							</div>
							<div class="form-group" id="previaBanner">
									<div class="previaImg" id="prevImg" style="left: 10px !important; width: 300px !important;height:120px !important; background:black !important; border:none;"><div id="prev"><img class="previa" id="prevBanner" src={{asset('img/bannerDefault.png')}}  ></div><div class="cancelarOp" id="excluirBanner"><i class="fa fa-times fa-2x" style="cursor:pointer; margin-left: 40px !important;"></i></div></div>
							</div>
							<div class="form-group">
							<label for="albumEmp" class="btn btn-warning">Adicionar fotos ao Album</label><label class="btn btn-info" id="fotoQuant" style="display:none;"></label><label id="resetaAlbum" style="display:none;" class="btn btn-danger"><i class="fa fa-trash-o"></i></label>
								<input type="file" id="albumEmp" style="display:none;" name="album[]" multiple class="form-control" >
							</div>


							<div class="form-group">
								<label>Nome da empresa</label>
								<input type="text" id="nameEmp" name="nameEmp" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Descrição</label>
								<textarea class="form-control" id="descriptionEmp" name="descriptionEmp" maxlength="800"></textarea>
							</div>
							<div class="form-group">
								<label style="display:block;">Tags</label>
								<input type="text" id="tagsEmp" name="tags" class="form-control"  required>
							</div>
							<div class="form-group">
								<label style="display:block">Nicho</label>
								<select  name="nincho" id="selectNincho"  class="form-control"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
									<option value="roupas">ROUPAS</option>
									<option value="suplementos">SUPLEMENTOS</option>
									<option value="construção">CONSTRUÇÃO</option>
									<option value="saúde">SAÚDE</option>
									<option value="academias">ACADEMIAS</option>
									<option value="varejos">VAREJOS</option>
									<option value="comidas">COMIDA</option>
									<option value="lazer">LAZER</option>
									<option value="distrubuidoras">DISTRIBUIDORAS</option>
							</select>
								<button type="button"  class="demo-button" id="addNincho" class="btnAdd"	 style="width: 40px; height: 30px; background:springgreen; color:white; border:none; border-radius:3px; outline:none; "><i class="fa fa-plus" style="margin-left:4px;"></i></button>
								<div id="addNichoOp" class="form-group" style="display:none; margin-top:5px;">
									<label>Novo nincho </label>
									<input type="text" id="ninchoOp" style="height: 30px; border: 1px solid springgreen; border-radius:5px; padding-left:8px;" >
									<button type="button" class="btnAdd" id="addNinchoConfirm" data-jbox-content="Content 1" style="width: 40px; height: 30px; background:springgreen; color:white; border:none; border-radius:3px; outline:none; ">ADD</button>
								</div>
							</div>

							<div class="form-group">
									<label>Endereço</label>
									<input type="text" id="locationEmp" name="location" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Telefone</label>
									<input type="text" id="telEmp" name="tel" class="form-control"  required>
								</div>
								<div class="form-group">
									<label>Whatsaap</label>
									<input type="text" id="whatsappEmp" name="whatsapp" class="form-control" >
								</div>
								<div class="form-group">
									<label>Link para o Facebook</label>
									<input type="text" name="facebook" id="facebookEmp" class="form-control" >
								</div>
								<div class="form-group">
									<label>Link para o Instagram</label>
									<input type="text" name="instagram" id="instagramEmp" class="form-control" >
								</div>
								<div class="form-group">
									<label>Email para contato</label>
									<input type="email" name="emailContato" id="emailContato" class="form-control" >
								</div>

							<div class="form-group">
									<span  id="addCaracteristicas" class="btn btn-info" ><i class="fa fa-plus"></i> Adicionar caracteristicas</span>
								</div>
								<div class="form-group">
									<span  id="addHorarios" class="btn btn-info" ><i class="fa fa-plus"></i> Adicionar horários</span>
								</div>
								<div class="form-group">
								<label style="display:block">Contrato</label>
								<select  name="tipoContrato" id="contratoEmp"  class="form-control"  style="margin-bottom: 5px;;width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
									<option value="mensal">MENSAL</option>
									<option value="trimensal">TRIMENSAL</option>
									<option value="semestral">SEMESTRAL</option>
								</select>
							</div>
							<div class="form-group">
							<label><b>R$</b></label>
								<input type="text" name="valorContrato" id="valorContrato" class="dinheiro" style="">
							</div>
							<div class="form-group">
								<label>Status: </label>
								<select id="statusEmp" name="status">
									<option value="ativa">Ativo</option>
									<option value="desativada">Suspenso</option>
								</select>
							</div>
							<div id="inputsCarateristicas" style="display:none">
								<input type="text" name="climatizado" class="climatizado inputs-caract">
								<input type="text" name="wifi" class="wifi inputs-caract">
								<input type="text" name="estacionamento" class="estacionamento inputs-caract">
								<input type="text" name="orcamento" class="orcamento inputs-caract">
								<input type="text" name="cartao" class="cartao inputs-caract">
								<input type="text" name="delivery" class="delivery inputs-caract">
							</div>
							<div id="inputsHors" style="display:none">
								<div class="segunda">
									<input type="text" name="inicioSegunda" class="inicioSegunda inputs-Hors">
									<input type="text" name="fimSegunda" class="fimSegunda inputs-Hors">
								</div>
								<div class="terça">
									<input type="text" name="inicioTerca" class="inicioTerca inputs-Hors">
									<input type="text" name="fimTerca" class="fimTerca inputs-Hors">
								</div>
								<div class="quarta">
									<input type="text" name="inicioQuarta" class="inicioQuarta inputs-Hors">
									<input type="text" name="fimQuarta" class="fimQuarta inputs-Hors">
								</div>
								<div class="Quinta">
									<input type="text" name="inicioQuinta" class="inicioQuinta inputs-Hors">
									<input type="text" name="fimQuinta" class="fimQuinta inputs-Hors">
								</div>
								<div class="sexta">
									<input type="text" name="inicioSexta" class="inicioSexta inputs-Hors">
									<input type="text" name="fimSexta" class="fimSexta inputs-Hors">
								</div>
								<div class="sabado">
									<input type="text" name="inicioSabado" class="inicioSabado inputs-Hors">
									<input type="text" name="fimSabado" class="fimSabado inputs-Hors">
								</div>
								<div class="domingo">
									<input type="text" name="inicioDomingo" class="inicioDomingo inputs-Hors">
									<input type="text" name="fimDomingo" class="fimDomingo inputs-Hors">
								</div>

							</div>
							<div id="formCaract" style="display:none;">
									<div class="form-group">
									<label style="display:block">Ambiente Climatizado</label>
									<select  name="climatizado" id="climatizadoEmp"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Wifi público</label>
									<select  name="wifi" id="wifiEmp"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Vaga para estacionamentos</label>
									<select  name="estacionamento" id="estacionamentoEmp"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Aceita cartões</label>
									<select  name="cartao" id="cartaoEmp"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Serviço de entrega</label>
									<select  name="delivery" id="deliveryEmp"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Orçamento grátis</label>
									<select  name="orcamento" id="orcamentoEmp"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<span id="btnCancelCaract" class="btn btn-danger">Cancelar</span>
									<span id="btnExit" class="btn btn-success">Salvar</span>
									</div>
							</div>
								<div id="formHors" style="display:none; width:700px;">
									<div class="form-group" >
										<div class="row"  style="margin-bottom:10px;">
											<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
										<label  for="">Segunda</label>
											</div>
											<div class="col-md-6">
												<label for="inicioSegunda">Inicio</label>
												<div class="input-group bootstrap-timepicker">
													<input type="text" name="inicioSegunda" id="inicioSegunda" class="form-control timepicker-24">
													<span class="input-group-btn">
														<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
													</span>
												</div>
											</div>
											<div class="col-md-6">
												<label for="fimSegunda" >Fim</label>
												<div class="input-group bootstrap-timepicker">
													<input type="text" name="fimSegunda" id="fimSegunda" class="form-control timepicker-24">
													<span class="input-group-btn">
														<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">terça</label>
												</div>
												<div class="col-md-6">
													<label for="inicioTerca">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioTerca" id="inicioTerca" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimTerca">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimTerca" id="fimTerca" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">quarta</label>
												</div>
												<div class="col-md-6">
													<label for="inicioQuarta">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioQuarta" id="inicioQuarta" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimQuarta">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimQuarta" id="fimQuarta" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Quinta</label>
												</div>
												<div class="col-md-6">
													<label for="inicioQuinta">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioQuinta" id="inicioQuinta" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimQuinta">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimQuinta" id="fimQuinta" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Sexta</label>
												</div>
												<div class="col-md-6">
													<label for="inicioSexta">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioSexta" id="inicioSexta" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimSexta">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimSexta" id="fimSexta" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Sabado</label>
												</div>
												<div class="col-md-6">
													<label for="inicioSabado">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioSabado" id="inicioSabado" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimSabado">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimSabado" id="fimSabado" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Domingo</label>
												</div>
												<div class="col-md-6">
													<label for="inicioDomingo">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioDomingo" id="inicioDomingo" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimDomingo">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimDomingo" id="fimDomingo" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
									<span id="btnCancelHors" class="btn btn-danger">Cancelar</span>
									<span id="btnExitHors" class="btn btn-success">Salvar</span>
									</div>
							</div>
						</div>
						</div>
						<div class="modal-footer">
							<input type="button" id="modalCloseEdit" class="btn btn-default" data-dismiss="modal" value="Cancelar">
							<input type="reset" onclick="verificaIMG()" class="btn btn-warning" id ="resetEmpEdit" value="Limpar">
							<input type="submit" class="btn btn-success" id ="submitEmpEdit" value="Adicionar">
						</div>
					</form>
				</div>
			</div>
		</div>



		<!-- Edit Modal HTML -->
		<div id="editEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="form-data-edit" enctype="multipart/form-data">
					@csrf
					<input type="hidden" id="inputIdEdit" name="idEmpresa" value="">
						<div class="modal-header">
							<h4 class="modal-title">Editar Informações da Empresa</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Avatar da Empresa</label>
								<input type="file" id="avatarEmpEdit" name="imagem" class="form-control" >
							</div>
							<div class="form-group">
								<label>Banner da Empresa</label>
								<input type="file" id="bannerEmpEdit" name="banner" class="form-control" >
							</div>
							<div class="form-group">
								<label>Nome da empresa</label>
								<input type="text" id="nameEmpEdit" name="nameEmp" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Descrição</label>
								<textarea class="form-control" id="descriptionEmpEdit" name="descriptionEmp" maxlength="800"></textarea>
							</div>
							<div class="form-group">
								<label style="display:block;">Tags</label>
								<input type="text" id="tagsEmpEdit" name="tags" class="form-control"  required>
							</div>
							<div class="form-group">
								<label style="display:block"> Editar nincho</label>
								<select  name="nincho" id="selectNinchoEdit2"  class="form-control"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmpEdit" required>
									<option value="roupas">ROUPAS</option>
									<option value="suplementos">SUPLEMENTOS</option>
									<option value="construção">CONSTRUÇÃO</option>
									<option value="saúde">SAÚDE</option>
									<option value="academias">ACADEMIAS</option>
									<option value="varejos">VAREJOS</option>
									<option value="comidas">COMIDA</option>
									<option value="lazer">LAZER</option>
									<option value="distrubuidoras">DISTRIBUIDORAS</option>
							</select>
								<button type="button"  class="demo-button" id="addNinchoEdit2" class="btnAdd"	 style="width: 40px; height: 30px; background:springgreen; color:white; border:none; border-radius:3px; outline:none; "><i class="fa fa-plus" style="margin-left:4px;"></i></button>
								<div id="addNichoOpEdit2" class="form-group" style="display:none; margin-top:5px;">
									<label>Novo nincho </label>
									<input type="text" id="ninchoOpEdit2" style="height: 30px; border: 1px solid springgreen; border-radius:5px; padding-left:8px;" >
									<button type="button" class="btnAdd" id="addNinchoConfirmEdit2" data-jbox-content="Content 1" style="width: 40px; height: 30px; background:springgreen; color:white; border:none; border-radius:3px; outline:none; ">ADD</button>
								</div>
							</div>

							<div class="form-group">
									<label>Endereço</label>
									<input type="text" id="locationEmpEdit" name="location" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Telefone</label>
									<input type="text" id="telEmpEdit" name="tel" class="form-control"  required>
								</div>
								<div class="form-group">
									<label>Whatsaap</label>
									<input type="text" id="whatsappEmpEdit" name="whatsapp" class="form-control" >
								</div>
								<div class="form-group">
									<label>Link para o Facebook</label>
									<input type="text" name="facebook" id="facebookEmpEdit" class="form-control" >
								</div>
								<div class="form-group">
									<label>Link para o Instagram</label>
									<input type="text" name="instagram" id="instagramEmpEdit" class="form-control" >
								</div>
								<div class="form-group">
									<label>Email para contato</label>
									<input type="email" name="emailContato" id="emailContatoEdit" class="form-control" >
								</div>
								<div class="form-group">
									<span  id="addCaracteristicasEdit" class="btn btn-info" ><i class="fa fa-plus"></i> Editar caracteristicas</span>
								</div>
								<div class="form-group">
									<span  id="addHorariosEdit" class="btn btn-info" ><i class="fa fa-plus"></i> Editar horários</span>
								</div>
							<div class="form-group">
								<label>Status: </label>
								<select id="statusEmpEdit" name="status">
									<option value="ativa">Ativo</option>
									<option value="desativada">Suspenso</option>
								</select>
							</div>
							<div id="inputsCarateristicasEdit" style="display:none">
								<input type="text" name="climatizado" class="climatizadoEdit inputs-caract">
								<input type="text" name="wifi" class="wifiEdit inputs-caract">
								<input type="text" name="estacionamento" class="estacionamentoEdit inputs-caract">
								<input type="text" name="orcamento" class="orcamentoEdit inputs-caract">
								<input type="text" name="cartao" class="cartaoEdit inputs-caract">
								<input type="text" name="delivery" class="deliveryEdit inputs-caract">
							</div>
							<div id="inputsHorsEdit" style="display:none">
								<div class="segunda">
									<input type="text" name="inicioSegunda" class="inicioSegundaEdit inputs-Hors">
									<input type="text" name="fimSegunda" class="fimSegunda inputs-Hors">
								</div>
								<div class="terça">
									<input type="text" name="inicioTerca" class="inicioTercaEdit inputs-Hors">
									<input type="text" name="fimTerca" class="fimTercaEdit inputs-Hors">
								</div>
								<div class="quarta">
									<input type="text" name="inicioQuarta" class="inicioQuartaEdit inputs-Hors">
									<input type="text" name="fimQuarta" class="fimQuartaEdit inputs-Hors">
								</div>
								<div class="Quinta">
									<input type="text" name="inicioQuinta" class="inicioQuintaEdit inputs-Hors">
									<input type="text" name="fimQuinta" class="fimQuintaEdit inputs-Hors">
								</div>
								<div class="sexta">
									<input type="text" name="inicioSexta" class="inicioSextaEdit inputs-Hors">
									<input type="text" name="fimSexta" class="fimSextaEdit inputs-Hors">
								</div>
								<div class="sabado">
									<input type="text" name="inicioSabado" class="inicioSabadoEdit inputs-Hors">
									<input type="text" name="fimSabado" class="fimSabadoEdit inputs-Hors">
								</div>
								<div class="domingo">
									<input type="text" name="inicioDomingo" class="inicioDomingoEdit inputs-Hors">
									<input type="text" name="fimDomingo" class="fimDomingoEdit inputs-Hors">
								</div>

							</div>
							<div id="formCaractEdit" style="display:none;">
									<div class="form-group">
									<label style="display:block">Ambiente Climatizado</label>
									<select  name="climatizado" id="climatizadoEmpEdit"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Wifi público</label>
									<select  name="wifi" id="wifiEmpEdit"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Vaga para estacionamentos</label>
									<select  name="estacionamento" id="estacionamentoEmpEdit"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Aceita cartões</label>
									<select  name="cartao" id="cartaoEmpEdit"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Serviço de entrega</label>
									<select  name="delivery" id="deliveryEmpEdit"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<label style="display:block">Orçamento grátis</label>
									<select  name="orcamento" id="orcamentoEmpEdit"  class="form-control selectCaract"  style="width: 80% !important; display:inline-block; text-transform:uppercase" id="ninchoEmp" required>
										<option value="nao">NÃO</option>
										<option value="sim">SIM</option>
									</select>
									</div>
									<div class="form-group">
									<span id="btnCancelCaractEdit" class="btn btn-danger">Cancelar</span>
									<span id="btnExitEdit" class="btn btn-success">Salvar</span>
									</div>
							</div>
								<div id="formHorsEdit" style="display:none; width:700px;">
									<div class="form-group" >
										<div class="row"  style="margin-bottom:10px;">
											<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
										<label  for="">Segunda</label>
											</div>
											<div class="col-md-6">
												<label for="inicioSegunda">Inicio</label>
												<div class="input-group bootstrap-timepicker">
													<input type="text" name="inicioSegunda" id="inicioSegundaEdit" class="form-control timepicker-24">
													<span class="input-group-btn">
														<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
													</span>
												</div>
											</div>
											<div class="col-md-6">
												<label for="fimSegunda" >Fim</label>
												<div class="input-group bootstrap-timepicker">
													<input type="text" name="fimSegunda" id="fimSegundaEdit" class="form-control timepicker-24">
													<span class="input-group-btn">
														<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">terça</label>
												</div>
												<div class="col-md-6">
													<label for="inicioTerca">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioTerca" id="inicioTercaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimTerca">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimTerca" id="fimTercaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">quarta</label>
												</div>
												<div class="col-md-6">
													<label for="inicioQuarta">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioQuarta" id="inicioQuartaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimQuarta">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimQuarta" id="fimQuartaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Quinta</label>
												</div>
												<div class="col-md-6">
													<label for="inicioQuinta">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioQuinta" id="inicioQuintaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimQuinta">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimQuinta" id="fimQuintaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Sexta</label>
												</div>
												<div class="col-md-6">
													<label for="inicioSexta">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioSexta" id="inicioSextaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimSexta">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimSexta" id="fimSextaEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Sabado</label>
												</div>
												<div class="col-md-6">
													<label for="inicioSabado">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioSabado" id="inicioSabadoEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimSabado">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimSabado" id="fimSabadoEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
											<div class="row"  style="margin-bottom:10px;">
												<div class="semana" style="margin-bottom:5px; display:block; width:100%; height:50px; background:cornsilk; text-align:center; line-height:50px; text-transform:uppercase;font-size:17px; font-weight:900;">
													<label  for="">Domingo</label>
												</div>
												<div class="col-md-6">
													<label for="inicioDomingo">Inicio</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="inicioDomingo" id="inicioDomingoEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<label for="fimDomingo">Fim</label>
													<div class="input-group bootstrap-timepicker">
														<input type="text" name="fimDomingo" id="fimDomingoEdit" class="form-control timepicker-24">
														<span class="input-group-btn">
															<button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
														</span>
													</div>
												</div>
											</div>
									</div>
									<div class="form-group">
									<span id="btnCancelHorsEdit" class="btn btn-danger">Cancelar</span>
									<span id="btnExitHorsEdit" class="btn btn-success">Salvar</span>
									</div>
							</div>
						</div>
						</div>
						<div class="modal-footer">
							<input type="button" id="modalClose" class="btn btn-default" data-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-success" id ="submitEmp" value="Salvar alterações">
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Delete Modal HTML -->

</section>
<!-- /wrapper -->
</section>

@section('scripts')
<script type="text/javascript" src={{asset("lib/bootstrap-datepicker/js/bootstrap-datepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/date.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/daterangepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/moment.min.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-timepicker/js/bootstrap-timepicker.js")}}></script>
<script src={{asset("lib/advanced-form-components.js")}}></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
$('.dinheiro').mask('#.##0,00', {reverse: true}).append('R$');

$('#vincular').click(function(){
	$('#userAccount').toggle(function(){
		$('#emailVincule').val('');

	});

	$('#emailEmp').prop('required',true);
		$('#passEmp').prop('required', true);
		$('#confPassEmp').prop('required',true);

	$('#userVincule').toggle(function(){
		$('#emailEmp').removeAttr('required');
		$('#passEmp').removeAttr('required');
		$('#confPassEmp').removeAttr('required');
		$('#emailEmp').val('');
		$('#passEmp').val('');
		$('#confPassEmp').val('');
	});

});


$('#prevAvatar').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirAvatar').hide();
});
$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});

$('#albumEmp').change(function(){
	var arquivos = $('#albumEmp')[0].files;
	var quantArquivos = arquivos.length;
	$('#fotoQuant').show();
	$('#resetaAlbum').show();
	$('#fotoQuant').text(quantArquivos+' Arquivos');
});

$('#resetaAlbum').click(function(){
	$('#albumEmp').val('');
	$('#fotoQuant').hide();
	$('#resetaAlbum').hide();
});

function verificaIMG(){
	$('#previewImg').attr('src', '');

}

$('#excluirAvatar').click(function(){
	$('#prevAvatar').attr('src', "{!!asset('img/profilezim.png')!!}");
	$('#avatarEmp').val('');
	$('#prevAvatar').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirAvatar').hide();
});
});

$('#excluirBanner').click(function(){
	$('#prevBanner').attr('src', "{!!asset('img/bannerDefault.png')!!}");
	$('#bannerEmp').val('');
	$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});
});

function previewImagam(){
	$('#prevAvatar').hover(function(){
		$(this).css('opacity', '0.6');
		$('#excluirAvatar').show();
	},
	function(){
		$(this).css('opacity', '1');
	});
	$('#excluirAvatar').hover(function(){
		$('#prevAvatar').css('opacity', '0.6');
		$('#excluirAvatar').show();
	},
	function(){
		$('#prevAvatar').css('opacity', '1');
	});

	var imagem = document.querySelector('input[name=imagem]').files[0];
	var preview = document.getElementById('prevAvatar');
	var reader = new FileReader();

	reader.onload = function(){
		preview.src = reader.result;
	}

	if(preview){
		reader.readAsDataURL(imagem);
	}else{
		preview.src = '';
	}
}




$('#bannerEmp').change(function(){

	$('#prevBanner').hover(function(){
		$(this).css('opacity', '0.6');
		$('#excluirBanner').show();
	},
	function(){
		$(this).css('opacity', '1');
	});
	$('#excluirBanner').hover(function(){
		$('#prevbanner').css('opacity', '0.6');
		$('#excluirBanner').show();
	},
	function(){
		$('#prevBanner').css('opacity', '1');
	});

	var imagem = document.querySelector('input[name=banner]').files[0];
	var preview = document.getElementById('prevBanner');
	var reader = new FileReader();

	reader.onload = function(){
		preview.src = reader.result;
	}

	if(preview){
		reader.readAsDataURL(imagem);
	}else{
		preview.src = '';
	}
});



function carregarEmpresa(id){
	idEmpresa = id
	$.getJSON('../api/administrativo/empresas/buscar/'+id , function(data){
		$('#nameEmpEdit').val(data[0].name);
		$('#descriptionEmpEdit').val(data[0].description);
		$('#tagsEmpEdit').val(data[0].tags);
		$('#selectNinchoEdit').val(data[0].nincho);
		$('#locationEmpEdit').val(data[0].location);
		$('#telEmpEdit').val(data[0].tel);
		$('#whatsappEmpEdit').val(data[0].whatsapp);
		$('#facebookEmpEdit').val(data[0].facebook);
		$('#instagramEmpEdit').val(data[0].instagram);
		$('#emailContatoEdit').val(data[0].email);
		$('#statusEmpEdit').val(data[0].status);
		$('#climatizadoEmpEdit').val(data[0].facilities.climatizado);
		$('#wifiEmpEdit').val(data[0].facilities.wifi);
		$('#estacionamentoEmpEdit').val(data[0].facilities.estacionamento);
		$('#cartaoEmpEdit').val(data[0].facilities.cartao);
		$('#deliveryEmpEdit').val(data[0].facilities.delivery);
		$('#orcamentoEmpEdit').val(data[0].facilities.orcamento);
	});
}

var addNinchoIsset = new jBox("Tooltip",{
	target:"#ninchoOp",
	theme:"TooltipBorder",
	trigger:"click",adjustTracker:!0,
	closeOnClick:"body",
	closeButton:"box",
	animation:"move",
	position:{x:"left",y:"top"},
	outside:"y",
	pointer:"left:20",
	offset:{x:25},
	content:"Digite um nincho que seja valido",
	adjustDistance:{top:55,right:5,bottom:5,left:5},
	zIndex:4e3
	});

new jBox("Mouse",{
	attach:"#addNincho",
	position:{x:"right",y:"bottom"},
	offset:{x:-5,y:5},
	content:"Adicionar outro nincho",
	zIndex:4e3
	});

var addNinchoIsset2 = new jBox("Tooltip",{
	target:"#ninchoOpEdit2",
	theme:"TooltipBorder",
	trigger:"click",adjustTracker:!0,
	closeOnClick:"body",
	closeButton:"box",
	animation:"move",
	position:{x:"left",y:"top"},
	outside:"y",
	pointer:"left:20",
	offset:{x:25},
	content:"Digite um nincho que seja valido",
	adjustDistance:{top:55,right:5,bottom:5,left:5},
	zIndex:4e3
	});

new jBox("Mouse",{
	attach:"#addNinchoEdit2",
	position:{x:"right",y:"bottom"},
	offset:{x:-5,y:5},
	content:"Adicionar outro nincho",
	zIndex:4e3
	});

	new jBox('Tooltip', {
		attach: '.tooltip',
		getTitle: 'data-jbox-title',
		getContent: 'data-jbox-content'
		});

	$( "#addNincho" ).click(function() {
		$( "#addNichoOp" ).slideToggle();
	});

	$("#addNinchoConfirm").click(function(){
		var nincho = $('#ninchoOp').val().toLowerCase();
		if(nincho && $.isNumeric(nincho)==false){
		$('#selectNincho').prepend('<option style="text-transform:uppercase;" value="'+nincho+'">'+nincho+'</option>').val(nincho);
		$("#addNichoOp").slideUp(200);
		$('#ninchoOp').val('');
		}
		else{
			addNinchoIsset.open();
		}
	});

	$( "#addNinchoEdit2" ).click(function() {
		$( "#addNichoOpEdit2" ).slideToggle();
	});

	$("#addNinchoConfirmEdit2").click(function(){
		var nincho = $('#ninchoOpEdit2').val().toLowerCase();
		if(nincho && $.isNumeric(nincho)==false){
		$('#selectNinchoEdit2').prepend('<option style="text-transform:uppercase;" value="'+nincho+'">'+nincho+'</option>').val(nincho);
		$("#addNichoOpEdit2").slideUp(200);
		$('#ninchoOpEdit2').val('');
		}
		else{
			addNinchoIsset2.open();
		}
	});


	function pegaId(id){
		var myModal = new jBox('Modal', {
		content: $('#modalDescricao'+id).data('description'),
		});
		myModal.open();
	  }

	  function load(action){
			var load_div = $(".loader");
			if(action==="open"){
			load_div.addClass("is-active");
			}
			else{
			load_div.removeClass("is-active");
			}
		}
		var successDelete = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
			content: "Empresa deletada com sucesso!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
			});

				var confirDelete = new jBox('Confirm', {
				attach: '.button-1',
				content: 'Deseja excluir essa foto?',
				cancelButton: 'Não',
				confirmButton: 'Sim agora!'
			});


			function excluir() {
				open(confirDelete);
			}
$(window).on('hashchange', function() {
		if (window.location.hash) {
			var page = window.location.hash.replace('#', '');
			if (page == Number.NaN || page <= 0) {
					return false;
			}else{
					getData(page);
			}
		}
	});

	$(document).ready(function()
	{
		$(document).on('click', '.pagination a',function(event)
		{
			event.preventDefault();

			$('li').removeClass('active');
			$(this).parent('li').addClass('active');

			var myurl = $(this).attr('href');
			var page=$(this).attr('href').split('page=')[1];

			getData(page);
		});

	});

	function getData(page){
		$.ajax(
		{
			url: '../api/administrativo/empresas?page=' + page,
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);
			location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}

	function getDesativada(){
		$.ajax(
		{
			url: '../api/administrativo/empresas/desativadas',
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);

		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}

	function getAtivas(){
		$.ajax(
		{
			url: '../api/administrativo/empresas/ativas',
			type: "get",
			datatype: "html"
		}).done(function(data){
			$("#table_data").empty().html(data);

		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}

	function excluirEmpPorra(id){
		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		if(confirm('Deseja excluir?')){
		$.ajax({
				type:"POST",
				url:'../api/administrativo/empresas/excluir',
				data: id,
				processData : false,
				beforeSend: function(){
					load('open');
				},
				success: function(Response) {
					console.log(Response);

				},
				complete: function(){
					load('close');
					successDelete.open();
					getData(1);
				}
		});
	}
	}


	$(function(){
		verificaIMG();

		$('#filtro').change(function(){
			var op = $('#filtro').val();
			if(op == 'desativada'){
				getDesativada();
			}
			else if(op == 'ativa'){
				getAtivas();
			}
			else{
				getData(1);
			}
		});

		getData(1);
		var modalHors = new jBox('Modal', {
		title: 'Adicionar Horarios de atendimento',
		content: $('#formHors'),
		});


		var modalCaract = new jBox('Modal', {
		title: 'Adicionar caracteristicas da Empresa',
		content: $('#formCaract'),
		});

		$('#addHorarios').click(function(){
			modalHors.open();
		});
		$('#btnExitHors').click(function(){
			modalHors.toggle();
			$('.inicioSegunda').val($('#inicioSegunda').val());
			$('.fimSegunda').val($('#fimSegunda').val());
			$('.inicioTerca').val($('#inicioTerca').val());
			$('.fimTerca').val($('#fimTerca').val());
			$('.inicioQuarta').val($('#inicioQuarta').val());
			$('.fimQuarta').val($('#fimQuarta').val());
			$('.inicioQuinta').val($('#inicioQuinta').val());
			$('.fimQuinta').val($('#fimQuinta').val());
			$('.inicioSexta').val($('#inicioSexta').val());
			$('.fimSexta').val($('#fimSexta').val());
			$('.inicioSabado').val($('#inicioSabado').val());
			$('.fimSabado').val($('#fimSabado').val());
			$('.inicioDomingo').val($('#inicioDomingo').val());
			$('.fimDomingo').val($('#fimDomingo').val());
		});
		$('#btnCancelHors').click(function(){
			modalHors.toggle();
			$('.timepicker-24').val('');
			$('.inputs-Hors').val('');
		});

		$('#addCaracteristicas').click(function(){
			modalCaract.toggle();
		});
		$('#btnExit').click(function(){
			modalCaract.toggle();
			$('.climatizado').val($('#climatizadoEmp').val());
			$('.wifi').val($('#wifiEmp').val());
			$('.delivery').val($('#deliveryEmp').val());
			$('.orcamento').val($('#orcamentoEmp').val());
			$('.estacionamento').val($('#orcamentoEmp').val());
			$('.cartao').val($('#cartaoEmp').val());
		});
		$('#btnCancelCaract').click(function(){
			modalCaract.toggle();
			$('.selectCaract').val('nao');
			$('.inputs-caract').val('nao');

		});
		/*funcoes do editar empresa*/

		var modalHorsEdit = new jBox('Modal', {
		title: 'Editar Horarios de atendimento',
		content: $('#formHorsEdit'),
		});


		var modalCaractEdit = new jBox('Modal', {
		title: 'Editar caracteristicas da empresa',
		content: $('#formCaractEdit'),
		});

		$('#addHorariosEdit').click(function(){
			modalHorsEdit.open();
		});
		$('#btnExitHorsEdit').click(function(){
			modalHorsEdit.toggle();
			$('.inicioSegundaEdit').val($('#inicioSegundaEdit').val());
			$('.fimSegundaEdit').val($('#fimSegundaEdit').val());
			$('.inicioTercaEdit').val($('#inicioTercaEdit').val());
			$('.fimTercaEdit').val($('#fimTercaEdit').val());
			$('.inicioQuartaEdit').val($('#inicioQuartaEdit').val());
			$('.fimQuartaEdit').val($('#fimQuartaEdit').val());
			$('.inicioQuintaEdit').val($('#inicioQuintaEdit').val());
			$('.fimQuintaEdit').val($('#fimQuintaEdit').val());
			$('.inicioSextaEdit').val($('#inicioSextaEdit').val());
			$('.fimSextaEdit').val($('#fimSextaEdit').val());
			$('.inicioSabadoEdit').val($('#inicioSabadoEdit').val());
			$('.fimSabadoEdit').val($('#fimSabadoEdit').val());
			$('.inicioDomingoEdit').val($('#inicioDomingoEdit').val());
			$('.fimDomingoEdit').val($('#fimDomingoEdit').val());
		});
		$('#btnCancelHorsEdit').click(function(){
			modalHorsEdit.toggle();
			$('.timepicker-24').val('');
			$('.inputs-Hors').val('');
		});

		$('#addCaracteristicasEdit').click(function(){
			modalCaractEdit.toggle();
		});
		$('#btnExitEdit').click(function(){
			modalCaractEdit.toggle();
			$('.climatizadoEdit').val($('#climatizadoEmpEdit').val());
			$('.wifiEdit').val($('#wifiEmpEdit').val());
			$('.deliveryEdit').val($('#deliveryEmpEdit').val());
			$('.orcamentoEdit').val($('#orcamentoEmpEdit').val());
			$('.estacionamentoEdit').val($('#orcamentoEmpEdit').val());
			$('.cartaoEdit').val($('#cartaoEmpEdit').val());
		});

		$('#btnCancelCaractEdit').click(function(){
			modalCaractEdit.toggle();
			carregarEmpresa(idEmpresa);
		});


		/*		$('.pagination a').click(function(e){
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];

			getEmpresa(page);
		});

		function getEmpresa(page){
			$.ajax({
				url: '../api/administrativo/empresas?page='+page,
			}).done(function(data){
				$('.content').html(data);

				location.hash = page;
			});

		}
*/
		/*$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
		*/

		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			if(value){
				$.ajax(
				{
					url: '../api/administrativo/empresas/lista',
					type: "get",
					datatype: "html"
				}).done(function(data){
					$("#table_data").empty().html(data);
					$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});

				}).fail(function(jqXHR, ajaxOptions, thrownError){
						alert('No response from server');
				});

			}
			else{
				getData(1)
			}
		});


		validation = '';
		function load(action){
			var load_div = $(".loader");
			if(action==="open"){
			load_div.addClass("is-active");
			}
			else{
			load_div.removeClass("is-active");
			}
		}


		var successDelete = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
			content: "Empresa deletada com sucesso!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
			});

		var modalEmpCadastro = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
			content: "Empresa cadastrada com sucesso!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
			});
		var modalEmpEmailExist = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-times fa-3x" style="color: red"></i></div>',
			content: "Esse email já existe! Tente outro.",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
		});
		var modalEmailNotExist = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-times fa-3x" style="color: red"></i></div>',
			content: "O email a qual você atribuiu a empresa não existe! Tente outro.",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
		});
		var modalSenhaError = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-times fa-3x" style="color: red"></i></div>',
			content: "Senha e confirmar Senha não correspondem!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
		});
		var modalEditConfirm = new jBox('Modal', {
			attach: '#test',
			title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
			content: "Informações atualizadas com sucesso!",
			animation: 'zoomIn',
			audio: '../audio/bling2',
			volume: 80,
			closeButton: true,
			delayOnHover: true,
			showCountdown: true
		});

		function limparInputs(){
			$('#emailUser').val('');
			$('#nameUser').val('');
			$('#locationEmp').val('');
			$('#ninchoEmp').val('');
			$('#tagsEmp').val('');
			$('#nameEmp').val('');
			$('#emailEmp').val('');
			$('#descriptionEmp').val('');
			$('#instagramEmp').val('');
			$('#facebookEmp').val('');
			$('#whatsappEmp').val('');
			$('#confPassEmp').val('');
			$('#avatarEmp').val('');
			$('#passEmp').val('');
			$('#bannerEmp').val('');
			$('#telEmp').val('');
			$('#statusEmp').val('ativa');
			$('#emailContato').val('');
			$('#selectNincho').val('');


		}

		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": "{{csrf_token()}}" }
		});

		$("#form-data-edit").submit(function(e){
			$('#inputIdEdit').attr('value', idEmpresa);
			$.ajax({
				type:"POST",
				url:'../api/administrativo/empresas/editar',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,

				beforeSend: function(){
					load("open");
				},
				success: function(Response) {
					let valid = Response;
					validation = valid;
					console.log(Response);
				},
				error: function(error){
					console.log(error);
				},
				complete: function(){
					load("close");
					$('#editEmployeeModal').modal('hide');
					modalEditConfirm.open();
					getData(1);
					}
			});
			e.preventDefault();
		});

		$("#form-data").submit(function(e){
			var valid = $('#emailVincule').val();
			if(valid.length <= 0){
				var tamPass = $('#passEmp').val().length;
				var tamConfPass = $('#confPassEmp').val().length;
			}
			else{
				var tamPass = 9;
				var tamConfPass = 9;
			}
			if(tamPass < 8 && tamConfPass < 8 ){
				var errorSenhaFraca = new jBox("Tooltip",{
					target:"#submitEmp",
					theme:"TooltipBorder",
					trigger:"click",adjustTracker:!0,
					closeOnClick:"body",
					closeButton:"box",
					animation:"move",
					position:{x:"left",y:"top"},
					outside:"y",
					pointer:"left:20",
					offset:{x:25},
					content:"A senha precisa ser no minimo 8 caracteres",
					adjustDistance:{top:55,right:5,bottom:5,left:5},
					zIndex:4e3
				});
				errorSenhaFraca.open();
			}
			else{


			if($('#passEmp').val() === $('#confPassEmp').val()){

			$.ajax({
				type:"POST",
				url:'../api/administrativo/empresas/cadastro',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,

				beforeSend: function(){
					load("open");
				},
				success: function(Response) {
					let valid = Response;
					validation = valid;
					console.log(Response);
				},
				error: function(error){
					console.log(error);
				},
				complete: function(){
					load("close");
					if(validation == 'emailNotExist'){
						modalEmailNotExist.open();
					}
					else if(validation== 'emailExist'){
						modalEmpEmailExist.open();

					}else{
						$('#addEmployeeModal').modal('hide');
						modalEmpCadastro.open();
						limparInputs();
						$('.selectCaract').val('nao');
						$('.inputs-caract').val('nao');
						$('.timepicker-24').val('');
						$('.inputs-Hors').val('');
						$('#albumEmp').val('');
						$('#fotoQuant').hide();
						$('#resetaAlbum').hide();
						$('#prevAvatar').attr('src', "{!!asset('img/profilezim.png')!!}");
						$('#avatarEmp').val('');
						$('#prevAvatar').hover(function(){
							$(this).css('opacity', '1');
							$('#excluirAvatar').hide();
						});
						$('#prevBanner').attr('src', "{!!asset('img/bannerDefault.png')!!}");
						$('#bannerEmp').val('');
						$('#prevBanner').hover(function(){
						$(this).css('opacity', '1');
						$('#excluirBanner').hide();
						});
						getData(1);
					}
				}
			});
			}
			else{
				console.log(tamPass);
				modalSenhaError.open();
			}
			}
			e.preventDefault();


		});
	});
</script>
@endsection

@endsection
