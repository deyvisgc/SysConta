<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			ASIENTOS CONTABLES <small></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= base_url() ?>bienvenida"><i class="fa fa-home"></i> Asientos</a>
			</li>
			<li class="active">Contables</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right" style="background-color: #01ff70">
						<li><a style="color: #0c0c0c" href="#dv_sangría_x_ventas" data-toggle="tab" id="dv_sangría_x_ventas">Asiento 2</a></li>
						<li class="active"><a style="color: #0c0c0c" href="#dv_panel_eleccion" data-toggle="tab" id="a_panel_eleccion">Asiento Aportativo</a></li>
						<li  class="pull-left header " style="color: #0c0c0c"  ><i class="fa fa-area-chart text-black"></i> <span id="sp_etiqueta">Asientos</span></li>
					</ul>
					<div class="tab-content">
						<!-- TAB ELECCION -->
						<div class="tab-pane active" id="dv_panel_eleccion">
							<div class="row">
								<div class="col-md-12">
									<br>
									<div class="row">
										<h4 class="text-capitalize" style="padding-left: 20px;">REGISTRO DE ASIENTOS CONTABLES</h4>
									</div>
									<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#RegistrarAsiento1" id="btn-altas"><i class="fas fa-plus text-white"></i> New Activo</button><br><br>

									<table id="tb_Asiento_Aportativo" class="table table-striped">
										<thead>
										<tr>
											<th>FECHA</th>
											<th>DESCRIPCION</th>
											<th>SOCIO</th>
											<th>DEBE</th>
											<th>HABER</th>
											<th>Opciones</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
									<tr>
										<th colspan="4" class=" alinear_derecha"><i class="fa fa-dollar-sign text-success"> Haber</i></th>
										<th ><span id="total_haber">00.00</span></th>
									</tr>


										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="dv_sangría_x_ventas">
							<br>
							<div class="row">
								<div class="col-md-12">
									<br>
									<div class="row">
										<h4 class="text-capitalize" style="padding-left: 20px;">REGISTRO DE ACTIVO NO CORRIENTES</h4>
									</div>
									<button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#RegistrarActivo_NO_corriente" id="btn-altas"><i class="fas fa-plus text-white"></i> New Activo</button><br><br>

									<table id="" class="table table-striped">
										<thead>
										<tr>
											<th>FECHA</th>
											<th>DESCRIPCION</th>
											<th>DEBE</th>
											<th>HABER</th>
											<th>Opciones</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!--REGISTRO ASIENTO APORTATIVO-->

<div class="modal fade" id="RegistrarAsiento1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Asiento Aportativo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs pull-right">
									<li class="active"><a href="#dv_reporte" data-toggle="tab" id="a_reporte">Aportativo</a></li>

									<li class="pull-left header"><i class="fa fa-money text-primary"></i><strong>Asiento</strong></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="dv_reporte">
										<div class="row">
											<form class="form-horizontal" id="fm_datos_empresa_local">
												<form class="form-horizontal" id="fm_datos_empresa_local">
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">FECHA</label>
															<div class="col-sm-8">
																<input type="date" id="in_fecha" name="in_fecha" class="form-control"  placeholder="Activo">
															</div>
														</div>

														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">DESCRIPCION</label>
															<div class="col-sm-8">
																<textarea class="form-control" placeholder="este aportes es de ...." name="descripcion" rows="2" id="descripcion"></textarea>

															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">DEBE</label>
															<div class="col-sm-8">
																<input type="number"  id="debe" name="debe" class="form-control"  placeholder="0.00">
															</div>
														</div>

														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">SOCIO</label>
															<div class="col-sm-8">
																<input type="text"  id="socio" name="socio" class="form-control"  placeholder="Socio">
																<input type="hidden" readonly id="in_empresa" name="daemlo_ciudad" value="<?= $capital->daemlo_id_datos_empresa_local?>" class="form-control"  >

															</div>
														</div>
													</div>
												</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-md btn-success" onclick="registrarAciento();" id="btn-altas"><i class="fa fa-check-circle"></i>Registrar</button>
				<button type="button" class="btn btn-md btn-danger" onclick="limpirar();" id="btn-altas"><i class="fa fa-remove "></i> Limpiar</button>

			</div>
		</div>
	</div>
</div>
<--Registro Activo no corriente-->

<div class="modal fade" id="RegistrarActivo_NO_corriente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Asientos </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs pull-right">
									<li class="active"><a href="#dv_reporte" data-toggle="tab" id="a_reporte">Activos</a></li>

									<li class="pull-left header"><i class="fa fa-building text-primary"></i><strong> Registrar Activo no corriente</strong></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="dv_reporte">
										<div class="row">
											<form class="form-horizontal" id="fm_datos_empresa_local">
												<form class="form-horizontal" id="fm_datos_empresa_local">
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">ACTIVO</label>
															<div class="col-sm-8">
																<input type="text" id="in_Activo_no_corriente" name="daemlo_ruc" class="form-control"  placeholder="ACTIVO">
															</div>
														</div>

														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">PRECIO</label>
															<div class="col-sm-8">
																<input type="text" id="in_Precio_no_corriente" name="daemlo_nombre_empresa_fantasia" class="form-control"  placeholder="0.00">

															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CANTIDAD</label>
															<div class="col-sm-8">
																<input type="text" id="in_cantidad_no_corriente" onkeyup="calcularsaldo1();" name="daemlo_direccion" class="form-control"  placeholder="0">
															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CODIGO</label>
															<div class="col-sm-8">
																<input type="text" id="in_codigo_no_corriente" name="daemlo_ciudad" class="form-control"  placeholder="CODIGO">
																<input type="hidden" readonly id="in_date_no_corriente" name="daemlo_ciudad"  class="form-control"  >

															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CAPITAL</label>
															<div class="col-sm-8">
																<input type="number" readonly id="capital1" name="daemlo_ciudad" value="<?= $capital->capital?>" class="form-control"  placeholder="0.00">
																<input type="hidden" readonly id="in_empresas_1" name="daemlo_ciudad" value="<?= $capital->daemlo_id_datos_empresa_local?>" class="form-control"  >

															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">SUBTOTAL</label>
															<div class="col-sm-8">
																<input type="number" readonly id="in_subtotal" name="daemlo_ciudad" class="form-control"  placeholder="Ciudad">
															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">SALDO </label>
															<div class="col-sm-8">
																<input type="number" readonly id="in_saldo" name="daemlo_ciudad" class="form-control"  placeholder="Ciudad">
															</div>
														</div>
													</div>
												</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-md btn-success" onclick="registrarActivoNocorriente();" id="btn-altas"><i class="fa fa-check-circle"></i>Registrar</button>
				<button type="button" class="btn btn-md btn-danger" onclick="Limpiar();" id="btn-altas"><i class="fa fa-remove "></i> Limpiar</button>

			</div>
		</div>
	</div>
</div>
<script>
	function init_Asientos_Contables() {
		$('#tb_Asiento_Aportativo').dataTable({
			ajax:{
				url:BASE_URL+'Cuentas/Asientos/ListarAsiento1',
				type:'post',
				dataType:'json',
				dataSrc:function(res){
					$('#total_haber').text(res.totales_haber.haber);
					return res.data;

				}
			},
			"language": {
				"decimal": "",
				"emptyTable": "Tabla vacia.",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ entradas.",
				"infoEmpty": "Mostrando 0 a 0 de 0 entradas.",
				"infoFiltered": "(filtrado de _MAX_ entradas totales)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Activos",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar",
				"zeroRecords": "No se encontraron registros coincidentes.",
				"paginate": {
					"first": "Primero",
					"last": "Final",
					"next": "Siguiente",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": activar para ordenar la columna ascendente.",
					"sortDescending": ": activar para ordenar la columna descendente."
				}
			},
			destroy:true,
			"ordering": false

		});

		var fecha_actual_hoy = get_fhoy();
		fecha=	$('#in_fecha').val(fecha_actual_hoy);
		fecha1=	$('#in_date_no_corriente').val(fecha_actual_hoy);
		
	}
	function tablanAsiento1() {
		$('#tb_Asiento_Aportativo').DataTable().ajax.reload();

	}
	function registrarAciento() {
		var data={};
		data.idempresa =$('#in_empresa').val();
		data.fecha=$("#in_fecha").val();
		data.debe =$('#debe').val();
		data.socio=$("#socio").val();
		data.descripcion=$('#descripcion').val();
		$.ajax({
			url: '<?php echo base_url()?>Cuentas/Asientos/RegistrarAsiento1',
			type: 'POST',
			dataType: 'JSON',
			data: data,
			success:function (data) {
				if (data.hecho==='SI'){
					$('#RegistrarAsiento1').modal('hide');
					swal({
						position: 'center',
						type: 'success',
						title: 'Registrado Correctamente',
						showConfirmButton: false,
						timer: 1500
					});
				limpirar();
					tablanAsiento1();
				} else {
					alert('errr0r');
				}

			}
		});

		
	}
	function limpirar() {
		$("#in_fecha").val("");
		$('#debe').val("");
		$("#socio").val("");
		$('#descripcion').val("");
	}
</script>
