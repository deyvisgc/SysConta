<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Movimiento de caja<small></small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url() ?>bienvenida"><i class="fa fa-home"></i> Home</a>
						</li>
						<li class="active">Apertura.</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs pull-right">
									<li class="active"><a href="#dv_apertura" data-toggle="tab" id="a_apertura">Apertura</a></li>
									<li class="pull-left header"><i class="fa fa-lock-open"></i> Apertura Caja.</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="dv_apertura">
										<div class="row">
											<p></p>
											<form class="form-horizontal" id="fm_apertura">
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">CAJA LIBRE</label>
													<div class="col-sm-3">
														<select class="form-control" id="sl_caj_id_caja" name="caj_id_caja">
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">CODIGO</label>
													<div class="col-sm-3">
														<span id="sp_caj_codigo" class="form-control" disabled></span>
													</div>
												</div>
												<hr>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">&nbsp;&nbsp;&nbsp;</label>
													<div class="col-sm-3">
														<button type="button" class="btn btn-primary" onclick="aperturar();" id="bt_apertura"><i class="fa fa-check-circle"></i> Aperturar Caja </button>
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
			<script>
			function init_apertura() {
				reload();
			}
			function reload() {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>movimiento/caja/apertura/reload",
					dataType: 'json',
					success: function(datos) {
						if(datos.hecho == 'SI') {
							var select = $('#sl_caj_id_caja');
							select.empty();
							if(datos.list_caja.length > 0) {
								datos.list_caja.forEach(function(caja) {
									select.append('<option value="'+caja.caj_id_caja+'">'+caja.caj_descripcion+'</option>');
								});
								add_mensaje(null, '<i class="fa fa-check"></i> ', _msj_system['0CAJ0001'], 'info');
							}
							else {
								$("#sl_caj_id_caja").prop('disabled', true);
								$("#bt_apertura").prop('disabled', true);
								add_mensaje(null, '<i class="fa fa-warning"></i> ', _msj_system['0CAJ0002'], 'warning');
							}
						}
						else if(datos.hecho == 'NO') {
							var select = $('#sl_caj_id_caja');
							select.empty();
							select.append('<option value="">'+datos.caja.caj_descripcion+'</option>');
							$("#sl_caj_id_caja").prop('disabled', true);
							$("#sp_caj_codigo").text(datos.caja.caj_codigo);
							$("#bt_apertura").prop('disabled', true);
							add_mensaje(null, '<i class="fa fa-warning"></i> ', _msj_system['0CAJ0003'], 'info');
						}
					}
				});
			}
			function aperturar() {
				var data = {};
				data.caj_id_caja = $("#sl_caj_id_caja").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>movimiento/caja/apertura/aperturar",
					dataType: 'json',
					data: data,
					success: function(datos) {
						if(datos.hecho == 'SI') {
							$("#sl_caj_id_caja").prop('disabled', true);
							$("#sp_caj_codigo").text(datos.caj_codigo);
							$("#bt_apertura").prop('disabled', true);
							add_mensaje(null, '<i class="fa fa-check"></i> Exito', _msj_system[datos.estado], 'success');
						}
						else {
							add_mensaje(null, '<i class="fa fa-warning"></i> Error', _msj_system[datos.estado], 'danger');
						}
					}
				});
			}
			</script>
