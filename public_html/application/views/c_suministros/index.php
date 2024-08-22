	<?php
  //echo $id;
  $opciones = array(
    '0'   => 'Inactivo',
    '1'   => 'Activo'
  );

  $opccate = array(
  	'0' => 'Suturas',
  	'1' => 'Especiales',
  	'2' => 'Materiales',
  	'3' => 'Medicamentos',
  	'4' => 'Otros'
  );
?>
<input type="hidden" name="opc_pag" id="opc_pag" value="listado">
<div class="card acard mt-2 mt-lg-3">
	<div class="card-header">
        <h3 class="card-title text-125 text-primary-d2">
          <i class="fas fa-chart-pie text-dark-l3 mr-1"></i>
          Costos de Suministros
        </h3>
    </div>
	<div class="row mt-3">
		<div class="col-12">
			<div class="card dcard">
			  	<div class="card-body px-1 px-md-3">
			    <!--form autocomplete="off"-->
				    <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
				        <h3 class="text-125 pl-1 mb-3 mb-sm-0 text-secondary-d4">
				          listado de Insumos Médico Quirurgícos
				        </h3>

				        <div class="mb-2 mb-sm-0">
				        	<div class="row mr-1">			       	
						        <button type="button" class="btn btn-green px-3 d-block text-95 radius-round border-2 brc-black-tp10 mr-1" id="btn_excel">
						        	<i class="fa fa-database mr-1"></i>
						            <span class="d-sm-none d-md-inline" id="btn_excel">Excel</span>
						        </button>
						        <button type="button" class="btn btn-blue px-3 d-block text-95 radius-round border-2 brc-black-tp10" data-toggle="modal" data-target="#newModal" id="btn_nuevo_suministro">
						        	<i class="fa fa-plus mr-1"></i>
						        	<span class="d-sm-none d-md-inline" id="btn_nuevo_suministro">Nuevo</span>
						        </button>
				          	</div>
				        </div>
				    </div>
				    <div class="row">
				      	<div class="col-12">
						    <table id="simple-table" class="table border-0 table-bordered brc-black-tp11 bgc-white" style="width:100%">
						        <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
						        	<tr>
								        <th>.</th>
								        <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Id</th>
					                    <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Código</th>
					                    <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Nombre</th>
					                    <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Categoria</th>
					                    <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Precio</th>
					                    <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Estado</th>
					                    <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Acción</th>
				                  	</tr>
						        </thead>
						        <tbody class="pos-rel">
						          
						        </tbody>
						    </table>
					  	</div>
					</div><!--/form-->
			    <!-- Modal Nuevo -->
					<div class="modal fade modal-" id="newModal" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
					
						<div class="modal-dialog" role="document">
						    <div class="modal-content">
							    <div class="modal-header bgc-primary-m1 brc-white">
							        <h5 class="modal-title text-white" id="newModalLabel">
							          Nuevo Insumo
							        </h5>

							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							    </div>

							    <div class="modal-body">
							      	<?= form_open(base_url('Cc_suministros/guardar'), array('id'=>'form_guardar', 'name'=>'form_guardar', 'class'=>'', 'autocomplete'=>'off')); ?>
							      		<?= form_input(array('type'=>'hidden', 'name'=>'idregistro', 'id'=>'idregistro', 'value'=>'0'));?>
								        <div class="card-body px-3 pb-1">
				                			<div class="form-body">
							                    
												<div class="form-group row" id="div_codigo">
							                      	<div class="col-sm-3 col-form-label text-sm-right pr-0">
							                        	<?= form_label('Código *','codigo', array('class'=>'mb-0')); ?>
							                      	</div>
							                      	<div class="col-sm-6">
							                        	<?= form_input(array('type'=>'text', 'name'=>'codigo', 'id'=>'codigo', 'maxlength'=>'25', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
							                      	</div>
						                    	</div>

							                    <div class="form-group row" id="div_nombre">
							                      	<div class="col-sm-3 col-form-label text-sm-right pr-0">
							                        	<?= form_label('Nombre*','nombre', array('class'=>'mb-0')); ?>
							                      	</div>
							                      	<div class="col-sm-8">
			                        					<?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'maxlength'=>'100', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
			                      					</div>
							                    </div>

							                    <div class="form-group row" id="div_categoria">
							                      	<div class="col-sm-3 col-form-label text-sm-right pr-0">
							                        	<?= form_label('Categoria*','categoria', array('class'=>'mb-0')); ?>
							                      	</div>
							                      	<div class="col-sm-4">
							                        	<?= form_dropdown('categoria', $opccate, '', 'class="form-control col-sm-9 col-md-10" id="categoria"');?>
							                      	</div>
							                    </div>

							                     <div class="form-group row" id="div_precio">
							                      	<div class="col-sm-3 col-form-label text-sm-right pr-0">
							                        	<?= form_label('Precio *','precio', array('class'=>'mb-0')); ?>
							                      	</div>
							                      	<div class="col-sm-4">
							                        	<?= form_input(array('type'=>'number', 'name'=>'precio', 'id'=>'precio', 'placeholder'=>'Digite el precio', 'maxlength'=>'12', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
							                      	</div>
							                    </div>

						                    	<div class="form-group row" id="div_estado">
							                      	<div class="col-sm-3 col-form-label text-sm-right pr-0">
							                        	<?= form_label('Estado *','estado', array('class'=>'mb-0')); ?>
							                      	</div>
							                      	<div class="col-sm-8">
							                        	<?= form_dropdown('estado', $opciones, '1', 'class="form-control col-sm-9 col-md-10" id="estado"');?>
							                      	</div>
						                    	</div>
						                  	</div><!-- /.Form-body Modal-->
										</div><!-- /.card-body Modal-->

									    <div class="modal-footer">
									        <button type="submit" class="btn btn-primary " id="btn_guardar" name="btn_guardar">
									          Guardar
									        </button>
									        <button type="submit" class="btn btn-primary " id="btn_actualizar" name="btn_actualizar">
									          Actualizar
									        </button>
									        <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
									          Cerrar
									        </button>
										</div>
									<?= form_close(); ?>
							    </div><!-- /.Modal-body -->
							</div> <!-- /.modal-content -->
						</div>
	        		</div>	<!-- /.Modal -->

	            	<div id="view-registro" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header card-success">
			                        <h4 class="modal-title text-blue" id="myModalLabel">Datos del Registro</h4>
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
			                    </div>
			                    <div class="modal-body" id="modalFormBody">
			                        <form class="form-horizontal m-t-20" id="modalForm1">
			                        </form>
			                    </div>
			                    <div class="modal-footer">
			                      	<button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="btn_cancelar_modal">Cerrar</button>
			                    </div>
			                </div>
			                <!-- /.modal-content -->
			            </div>
			            <!-- /.modal-dialog -->
			        </div>
			  	</div><!-- /.card-body -->
			</div><!-- /.card -->
		</div><!-- /.col -->
	</div>
</div><!-- /.card -->



