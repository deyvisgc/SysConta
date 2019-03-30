<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Datos de Empresa<small></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= base_url() ?>bienvenida"><i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Mant Datos de Empresa.</li>
		</ol>
	</section>
	<!-- actualizar empresa -->
	<section class="content">
		<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#RegistrarEmpresa" id="btn-altas"><i class="fas fa-plus text-white"></i> New Empresa</button>

		<button type="button" class="btn btn-md btn-warning " title="PERFIL DE LA NUEVA EMPRESA"  onclick="Mostrar();" id="btn-altas"><i class="fa fa-eye "></i> Mostrar</button><br><br>

		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right">
						<li class="active"><a href="#dv_reporte" data-toggle="tab" id="a_reporte">Empresa</a></li>
						<li class="pull-left header"><i class="fa fa-building"></i> Datos de Empresa.</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="dv_reporte">
							<div class="row">
								<form class="form-horizontal" id="fm_datos_empresa_local">
									<div class="row">
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">RUC</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_ruc" name="daemlo_ruc" class="form-control" value="<?= $datos_empresa_local->daemlo_ruc ?>" placeholder="RUC">
											</div>
										</div>

										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">NOMBRE EMPRESA</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_nombre_empresa_fantasia" name="daemlo_nombre_empresa_fantasia" class="form-control" value="<?= $datos_empresa_local->daemlo_nombre_empresa_fantasia ?>" placeholder="Nombre Empresa(fantasia)">
												<input type="hidden" id="ind_empresa" name="daemlo_nombre_empresa_fantasia" class="form-control"  placeholder="Nombre Empresa">

											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">DIRECCION</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_direccion" name="daemlo_direccion" class="form-control" value="<?= $datos_empresa_local->daemlo_direccion ?>" placeholder="Direccion">
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">CIUDAD</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_ciudad" name="daemlo_ciudad" class="form-control" value="<?= $datos_empresa_local->daemlo_ciudad ?>" placeholder="Ciudad">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">DEPARTAMENTO</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_departamento" name="daemlo_estado" class="form-control" value="<?= $datos_empresa_local->daemlo_departamento?>" placeholder="Estado(departamento)">
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">TELEFONO</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_telefono" name="daemlo_telefono" class="form-control" value="<?= $datos_empresa_local->daemlo_telefono ?>" placeholder="Telefono">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">FACEBOOK</label>
											<div class="col-sm-8">
												<input type="text" id="in_daemlo_facebook" name="daemlo_facebook" class="form-control" value="<?= $datos_empresa_local->daemlo_facebook ?>" placeholder="Facebook">
											</div>
										</div>

										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">TELEFONO FIGO</label>
											<div class="col-sm-8">
												<input type="text" id="in_telefono_figo" name="daemlo_facebook" class="form-control" value="<?= $datos_empresa_local->daemlo_telefono_figo?>" placeholder="Facebook">
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="" class="col-sm-4 control-label">$.CAPITAL</label>
											<div class="col-sm-8">
												<input type="number" id="in_capital" name="daemlo_facebook" value="<?= $datos_empresa_local->capital?>"  class="form-control"  placeholder="Facebook">
											</div>
										</div>
									</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="text-center">
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">&nbsp;&nbsp;&nbsp;</label>
													<div class="col-sm-12">
														<input type="hidden" id="in_daemlo_id_datos_empresa_local" name="daemlo_id_datos_empresa_local" value="<?= $datos_empresa_local->daemlo_id_datos_empresa_local ?>">
														<button type="button" class="btn btn-md btn-info" onclick="guardar();" id="btn-altas"><i class="fa fa-check-circle"></i>Actualizar</button>
													</div>
												</div>
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
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- Registrar empresa -->
<div class="modal fade" id="RegistrarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
									<li class="active"><a href="#dv_reporte" data-toggle="tab" id="a_reporte">Empresa</a></li>

									<li class="pull-left header"><i class="fa fa-building text-primary"></i><strong>Registrar Empresa</strong></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="dv_reporte">
										<div class="row">
											<form class="form-horizontal" id="fm_datos_empresa_local">
												<form class="form-horizontal" id="fm_datos_empresa_local">
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">RUC</label>
															<div class="col-sm-8">
																<input type="text" id="in_ruc" name="daemlo_ruc" class="form-control"  placeholder="RUC">
															</div>
														</div>

														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">NOMBRE EMPRESA</label>
															<div class="col-sm-8">
																<input type="text" id="in_nombre" name="daemlo_nombre_empresa_fantasia" class="form-control"  placeholder="Nombre Empresa">

															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">DIRECCION</label>
															<div class="col-sm-8">
																<input type="text" id="in_direccion" name="daemlo_direccion" class="form-control"  placeholder="Direccion">
															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CIUDAD</label>
															<div class="col-sm-8">
																<input type="text" id="in_ciudad" name="daemlo_ciudad" class="form-control"  placeholder="Ciudad">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">DEPARTAMENTO</label>
															<div class="col-sm-8">
																<input type="text" id="in_departamento" name="daemlo_estado" class="form-control"  placeholder="departamento">
															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">TELEFONO</label>
															<div class="col-sm-8">
																<input type="text" id="in_telefono" name="daemlo_telefono" class="form-control"  placeholder="Telefono">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">FACEBOOK</label>
															<div class="col-sm-8">
																<input type="text" id="in_facebook" name="daemlo_facebook" class="form-control"  placeholder="Facebook">
															</div>
														</div>

														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">TELEFONO FIJO</label>
															<div class="col-sm-8">
																<input type="text" id="in_figo" name="daemlo_facebook" class="form-control"  placeholder="Facebook">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label"><i class="fa fa-dollar-sign text-success"></i> CAPITAL</label>
															<div class="col-sm-8">
																<input type="number" id="in_capital1" name="daemlo_facebook" class="form-control"  placeholder="00.00">
															</div>
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

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-md btn-success" onclick="registrarEmpresa();" id="btn-altas"><i class="fa fa-check-circle"></i>Registrar</button>
				<button type="button" class="btn btn-md btn-danger" onclick="Limpiar();" id="btn-altas"><i class="fa fa-remove "></i> Limpiar</button>

			</div>
		</div>
	</div>
</div>
<script>
	function init_datos_empresa_local() {
	}
	function guardar() {
		var data = {};
		data.daemlo_ruc = $("#in_daemlo_ruc").val();
		data.daemlo_nombre_empresa_fantasia = $("#in_daemlo_nombre_empresa_fantasia").val();
		data.in_telefono_figo = $("#in_telefono_figo").val();
		data.daemlo_direccion = $("#in_daemlo_direccion").val();
		data.daemlo_ciudad = $("#in_daemlo_ciudad").val();
		data.in_daemlo_departamento = $("#in_daemlo_departamento").val();
		data.daemlo_telefono = $("#in_daemlo_telefono").val();
		data.daemlo_facebook = $("#in_daemlo_facebook").val();
		data.capital = $("#in_capital").val();
		data.daemlo_id_datos_empresa_local = $("#in_daemlo_id_datos_empresa_local").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "mantenimiento/datos_empresa_local/actualizar",
			dataType: 'json',
			data: data,
			success: function(datos) {
				if(datos.hecho == 'SI') {
					add_mensaje(null, '<i class="fa fa-check"></i> ', "Cambios guardados.", 'success ');
				}
				else {
					add_mensaje(null, '<i class="fa fa-warning"></i> ', "ERROR!!!", 'warning ');
				}
			}
		});
	}
	function registrarEmpresa() {
		var data = {};
		data.daemlo_ruc = $("#in_ruc").val();
		data.daemlo_nombre_empresa_fantasia = $("#in_nombre").val();
		data.daemlo_direccion = $("#in_direccion").val();
		data.daemlo_ciudad = $("#in_ciudad").val();
		data.daemlo_telefono = $("#in_telefono").val();
		data.daemlo_facebook = $("#in_facebook").val();
		data.daemlo_departamentos = $("#in_departamento").val();
		data.daemlo_telefonofigo = $("#in_figo").val();
		data.capital1 = $("#in_capital1").val();

		if (data.daemlo_ruc===''){
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'Ruc requerido!',
				timer: 1500


			});
		}if (data.daemlo_nombre_empresa_fantasia==='') {
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'Empresa requerido!',
				timer: 1500

			});
		}if (data.daemlo_direccion===''){

			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'Direccion requerido!',
				timer: 1500

			});
		}if (data.daemlo_ciudad===''){
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'ciudad requerido!',
				timer: 1500

			});
		}

		if (data.daemlo_telefono==='') {
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'telefono requerido!',
				timer: 1500

			});
		}
			if (data.capital1===''){
				Swal.fire({
					type: 'error',
					title: 'Oops...',
					text: 'capital requerido!',
					timer: 1500

				});
		}else {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "mantenimiento/datos_empresa_local/Registrar",
				dataType: 'json',
				data: data,
				success: function(datos) {

					Swal.fire({
						position: 'top-end',
						type: 'success',
						title: 'Registrao Exitoso',
						showConfirmButton: false,
						timer: 1500
					});
					$('#ind_empresa').val(datos.id_empresa);
						Limpiar();



				}
			});
		}
	}


	function Mostrar() {
		var id=$('#ind_empresa').val();
   alert(id);
	}

	function Limpiar() {
		$("#in_ruc").val("");
		$("#in_nombre").val("");
		$("#in_direccion").val("");
		$("#in_ciudad").val("");
		$("#in_telefono").val("");
		$("#in_facebook").val("");
		$("#in_departamento").val("");
		$("#in_figo").val("");
		$("#in_capital1").val("");
	}
</script>
