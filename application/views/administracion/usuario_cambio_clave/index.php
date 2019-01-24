<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Cambio de clave<small></small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url() ?>bienvenida"><i class="fa fa-home"></i> Home</a>
						</li>
						<li class="active">Admin. Usuario.</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
                    <div class="row">
						<div class="col-md-12">
                            <div class="center-block">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="active"><a href="#dv_reporte" data-toggle="tab" id="a_reporte">Cambio</a></li>
                                        <li class="pull-left header"><i class="fa fa-user-lock"></i> Datos.</li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="dv_reporte">
                                            <div class="row">
                                                <p></p>
                                                <form class="form-horizontal" id="fm_usuario">
                                                    <div class="form-group text-center">
                                                        <label for="in_usu_clave" class="col-sm-4 control-label">CLAVE ACTUAL</label>
                                                        <div class="col-sm-5">
                                                            <input type="password" id="in_usu_clave" name="usu_clave" class="form-control" value="" placeholder="Clave actual">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="in_usu_clave_nueva" class="col-sm-4 control-label">CLAVE NUEVA</label>
                                                        <div class="col-sm-5">
                                                            <input type="password" id="in_usu_clave_nueva" name="usu_clave_nueva" class="form-control" value="" placeholder="Clave nueva">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="in_usu_clave_nueva_r" class="col-sm-4 control-label">RE-CLAVE NUEVA</label>
                                                        <div class="col-sm-5">
                                                            <input type="password" id="in_usu_clave_nueva_r" name="usu_clave_nueva_r" class="form-control" value="" placeholder="Re-Clave nueva">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <div class="form-group">
                                                                    <label for="" class="col-md-2 control-label">&nbsp;&nbsp;&nbsp;</label>
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="btn btn-lg btn-facebook" onclick="func_cambiar_clave(event);" id="btn-altas"><i class="fa fa-check-circle"></i> Cambiar clave</button>
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
					</div>
					
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			
			<script>
			function init_usuario() {
				add_mensaje(null, " Cambiar clave. ", ' ingrese datos.', "info");
			}
			function func_cambiar_clave(e) {
				var usu_clave = $("#in_usu_clave").val();
				var usu_clave_nueva = $("#in_usu_clave_nueva").val();
				var usu_clave_nueva_r = $("#in_usu_clave_nueva_r").val();
				if(usu_clave_nueva !== usu_clave_nueva_r) {
					add_mensaje(null, " Claves. ", ' no coinciden.', "info");
					return;
				}
				var data = {};
				data.usu_clave = usu_clave;
				data.usu_clave_nueva = usu_clave_nueva;
				
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>administracion/usuario_cambio_clave/cambiar_clave",
					dataType: 'json',
					data: data,
					success: function(datos) {
						if(datos.hecho == 'SI') {
							add_mensaje(null, " Correcto. ", ' Clave cambiada.', "success");
							$('#in_usu_clave').val('');
							$('#in_usu_clave_nueva').val('');
							$('#in_usu_clave_nueva_r').val('');	
						}
						else {
							add_mensaje(null, " !!! ", datos.msj, "warning");
						}
					}
				});
			}
			</script>
