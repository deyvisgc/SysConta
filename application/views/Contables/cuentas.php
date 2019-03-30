<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
	#in_fecha_Soap::placeholder{
		text-align: center;
		padding-top: 30px;
	}
	toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": false,
	"progressBar": false,
	"positionClass": "toast-top-",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "1000",
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
	}
</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Registro de ACTIVOS <small></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= base_url() ?>bienvenida"><i class="fa fa-home"></i> Movimiento</a>
			</li>
			<li class="active">Sangría de caja</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right">
						<li><a href="#dv_sangría_x_ventas" data-toggle="tab" id="dv_sangría_x_ventas">Activos no Corrientes</a></li>
						<li class="active"><a href="#dv_panel_eleccion" data-toggle="tab" id="a_panel_eleccion">Activos Corrientes</a></li>
						<li class="pull-left header"><i class="fa fa-area-chart"></i> <span id="sp_etiqueta">Activos</span></li>
					</ul>
					<div class="tab-content">
						<!-- TAB ELECCION -->
						<div class="tab-pane active" id="dv_panel_eleccion">
							<div class="row">
								<div class="col-md-12">
									<br>
									<div class="row">
										<h4 class="text-capitalize" style="padding-left: 20px;">REGISTRO DE ACTIVO CORRIENTES</h4>
									</div>
									<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#RegistrarActivo" id="btn-altas"><i class="fas fa-plus text-white"></i> New Activo</button><br><br>

									<table id="tb_Activo_corriente" class="table table-striped">
										<thead>
										<tr>
											<th>ACTIVO</th>
											<th>PRECIO</th>
											<th>CANTIDAD</th>
											<th>CODIGO</th>
											<th>FECHA REGISTRO</th>
											<th>SALDO</th>
											<th>Subtotal</th>
											<th>Opciones</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
										<tr>
											<th colspan="6" class=" alinear_derecha">&nbsp;debe</th>
											<th class=" alinear_derecha"><span id="total_debe_corriente">00.00</span></th>
										<tr>
											<th colspan="6" class=" alinear_derecha">&nbsp;Haber</th>
											<th class=" alinear_derecha"><span id="total_haber_corriente">00.00</span></th>
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

									<table id="tb_Activo_no_corriente" class="table table-striped">
										<thead>
										<tr>
											<th>ACTIVO</th>
											<th>PRECIO</th>
											<th>CANTIDAD</th>
											<th>CODIGO</th>
											<th>FECHA REGISTRO</th>
											<th>SALDO</th>
											<th>Subtotal</th>
											<th>Opciones</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
										<tr>
											<th colspan="6" class=" alinear_derecha">&nbsp;debe</th>
											<th class=" alinear_derecha"><span id="total_debe">00.00</span></th>
										<tr>
											<th colspan="6" class=" alinear_derecha">&nbsp;Haber</th>
											<th class=" alinear_derecha"><span id="total_haber">00.00</span></th>
										</tfoot>
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




<!--REGISTRO ACTIVO CORRIENTE-->

<div class="modal fade" id="RegistrarActivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
															<label for="" class="col-sm-4 control-label">ACTIVO</label>
															<div class="col-sm-8">
																<input type="text" id="in_Activo" name="daemlo_ruc" class="form-control"  placeholder="Activo">
															</div>
														</div>

														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">PRECIO</label>
															<div class="col-sm-8">
																<input type="text" id="in_Precio" name="daemlo_nombre_empresa_fantasia" class="form-control"  placeholder="0.00">

															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CANTIDAD</label>
															<div class="col-sm-8">
																<input type="text" onkeyup="calcularsaldo();" id="in_cantidad" name="daemlo_direccion" class="form-control"  placeholder="0">
															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CODIGO</label>
															<div class="col-sm-8">
																<input type="text" id="in_codigo" name="daemlo_ciudad" class="form-control"  placeholder="Codigo">
																<input type="hidden" id="in_date" name="daemlo_ciudad" class="form-control"  placeholder="Ciudad">

															</div>
														</div>

													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">CAPITAL</label>
															<div class="col-sm-8">
																<input type="number" readonly id="in_capital" name="daemlo_ciudad" value="<?= $capital->capital?>" class="form-control"  >
																<input type="hidden" readonly id="in_empresa" name="daemlo_ciudad" value="<?= $capital->daemlo_id_datos_empresa_local?>" class="form-control"  >


															</div>
														</div>
														<div class="form-group col-md-6">
															<label for="" class="col-sm-4 control-label">PRECIO TOTAL</label>
															<div class="col-sm-8">
																<input type="number" readonly id="in_precio_total" name="daemlo_ciudad" placeholder="0.00"  class="form-control"  >


															</div>
														</div>
														<div class="form-group col-md-6">

															<div class="col-sm-8">
																<input type="hidden"  readonly id="in_saldo_afavor" name="daemlo_ciudad"  class="form-control"  placeholder="0.00">


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
				<button type="button" class="btn btn-md btn-success" onclick="registrarActivo();" id="btn-altas"><i class="fa fa-check-circle"></i>Registrar</button>
				<button type="button" class="btn btn-md btn-danger" onclick="Limpiar();" id="btn-altas"><i class="fa fa-remove "></i> Limpiar</button>

			</div>
		</div>
	</div>
</div>
<--Registro Activo no corriente-->

<div class="modal fade" id="RegistrarActivo_NO_corriente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

	function init_cuentas_contables() {
		$('#tb_Activo_corriente').dataTable({
			ajax:{
				url:BASE_URL+'Cuentas/contables/ListarActivos',
				type:'post',
				dataType:'json',
				dataSrc:function(res){
					$('#total_debe_corriente').text(res.totales_debe.debe);
					$('#total_haber_corriente').text(res.totales_debe.debe);
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
		$('#tb_Activo_no_corriente').dataTable({
			ajax:{
				url:BASE_URL+'Cuentas/contables/ListarActivosNoCorrientes',
				type:'post',
				dataType:'json',
				dataSrc:function(res){
					$('#total_debe').text(res.totales_debe.debe);
					$('#total_haber').text(res.totales_debe.debe);
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
		fecha=	$('#in_date').val(fecha_actual_hoy);
		fecha1=	$('#in_date_no_corriente').val(fecha_actual_hoy);

	}
	function registrarActivo() {
		if (validaCampos()===false){
		}else {
			var data = {};
			data.activo = $('#in_Activo').val();
			data.cantidad = $('#in_cantidad').val();
			data.precio = $('#in_Precio').val();
			data.codigo = $('#in_codigo').val();
			data.fecha = $('#in_date').val();
			data.saldo=$('#in_saldo_afavor').val();
			data.idempresa=$("#in_empresa").val();
			data.subtotal=$('#in_precio_total').val();

			$.ajax({
				url: '<?php echo base_url()?>Cuentas/contables/RegistrarActivoCorriente',
				type: 'POST',
				dataType: 'JSON',
				data: data,
				success: function (data) {
					if (data.hecho==='SI'){
						$('#RegistrarActivo').modal('hide');
						swal({
							position: 'center',
							type: 'success',
							title: 'Activo Registrado Correctamente',
							showConfirmButton: false,
							timer: 1500
						});
					limpirar();
						tablaactivos();
					}else {
						alert('error');
					}

		}
	});
		}
	}
	function tablaactivos() {
		$('#tb_Activo_corriente').DataTable().ajax.reload();

	}



	function registrarActivoNocorriente() {
		if (validarCampos()===false){
		}else {
			var data = {};
			data.activo = $('#in_Activo_no_corriente').val();
			data.cantidad = $('#in_cantidad_no_corriente').val();
			data.precio = $('#in_Precio_no_corriente').val();
			data.codigo = $('#in_codigo_no_corriente').val();
			data.fechass = $('#in_date_no_corriente').val();
			data.subotal=$('#in_subtotal').val();
			data.saldo=$('#in_saldo').val();
			data.idempresas=$('#in_empresas_1').val();
			$.ajax({
				url: '<?php echo base_url()?>Cuentas/contables/RegistrarActivoNoCorriente',
				type: 'POST',
				dataType: 'JSON',
				data: data,
				success: function (data) {
					if (data.hecho==='SI'){
						$('#RegistrarActivo_NO_corriente').modal('hide');
						swal({
							position: 'center',
							type: 'success',
							title: 'Registrado Correctamente',
							showConfirmButton: false,
							timer: 1500
						});
						limpirar1();
						tablanoActivos();
					}else {
						alert('error');
					}

				}
			});
		}
	}
	function tablanoActivos() {
		$('#tb_Activo_no_corriente').DataTable().ajax.reload();

	}

	function validaCampos(){
		var activo = $('#in_Activo').val();
		var cantidad = $('#in_cantidad').val();
		var precio = $('#in_Precio').val();
		var codigo = $('#in_codigo').val();
//validamos campos
		if($.trim(activo) == ""){
		alert("xzxz");
			return false;
		}
		if($.trim(cantidad) == ""){
			alert("xzxz");			return false;
		}
		if($.trim(precio)==""){
			alert("xzxz");			return false;
		}
		if($.trim(codigo) == ""){
			alert("xzxz");			return false;
		}
	}
	function validarCampos(){
		var activo  = $('#in_Activo_no_corriente').val();
		var cantidad = $('#in_cantidad_no_corriente').val();
		var precio = $('#in_Precio_no_corriente').val();
		var codigo = $('#in_codigo_no_corriente').val();

//validamos campos
		if($.trim(activo) == ""){
			alert("xzxz");
			return false;
		}
		if($.trim(cantidad) == ""){
			alert("xzxz");			return false;
		}
		if($.trim(precio)==""){
			alert("xzxz");			return false;
		}
		if($.trim(codigo) == ""){
			alert("xzxz");			return false;
		}
	}
	function calcularsaldo() {
		var precio=$('#in_Precio').val();
		var cantidad=$('#in_cantidad').val();
		var capital=$('#in_capital').val();
		var subtotal=parseFloat(precio)*parseFloat(cantidad);
		$('#in_precio_total').val(subtotal.toFixed(2));
		var total=parseFloat(capital)-parseFloat(subtotal);
		$('#in_saldo_afavor').val(total.toFixed(2));

	}

	function calcularsaldo1() {
		var precio=$('#in_Precio_no_corriente').val();
		var cantidad=$('#in_cantidad_no_corriente').val();
		var capital=$('#capital1').val();
		var subtotal=parseFloat(precio)*parseFloat(cantidad);
		$('#in_subtotal').val(subtotal.toFixed(2));
		var total=parseFloat(capital)-parseFloat(subtotal);
		$('#in_saldo').val(total.toFixed(2));

	}
	function limpirar() {

	$('#in_Activo').val("");
	$('#in_cantidad').val("");
	$('#in_Precio').val("");
	$('#in_codigo').val("");
	$('#in_date').val("");
	$('#in_saldo_afavor').val("");

	}
	function limpirar1() {

		$('#in_Activo_no_corriente').val("");
		$('#in_cantidad_no_corriente').val("");
		$('#in_Precio_no_corriente').val("");
		$('#in_codigo_no_corriente').val("");
		$('#in_date_no_corriente').val("");
		$('#in_saldo').val("");
		$('#in_subtotal').val("");


	}
</script>


