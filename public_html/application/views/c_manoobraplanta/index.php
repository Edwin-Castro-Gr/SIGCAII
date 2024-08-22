	<?php
  //echo $id;
  $opciones = array(
    '0'   => 'Inactivo',
    '1'   => 'Activo'
  );
?>
<input type="hidden" name="opc_pag" id="opc_pag" value="listado">
<div class="card acard mt-2 mt-lg-3">
	<div class="card-header">
        <h3 class="card-title text-125 text-primary-d2">
          <i class="fas fa-chart-pie text-dark-l3 mr-1"></i>
          Costo Mano de Obra Planta
        </h3>
    </div>
	<div class="row mt-3">
		<div class="col-12">
			<div class="card dcard">
			  <div class="card-body px-1 px-md-3">

			    <!--form autocomplete="off"-->
			      <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
			        <h3 class="text-125 pl-1 mb-3 mb-sm-0 text-secondary-d4">
			          listado de Costo Mano Obra Planta
			        </h3>

			        <div class="mb-2 mb-sm-0">
			        	<div class="row mr-1">
			       		
			          <button type="button" class="btn btn-green px-3 d-block text-95 radius-round border-2 brc-black-tp10 mr-1" id="btn_excel">
			            <i class="fa fa-database mr-1"></i>
			            <span class="d-sm-none d-md-inline" id="btn_excel">Excel</span>
			          </button>
			          <button type="button" class="btn btn-blue px-3 d-block text-95 radius-round border-2 brc-black-tp10" data-toggle="modal" data-target="#newModal" id="btn_nueva_manoobra">
			            <i class="fa fa-plus mr-1"></i>
			            <span class="d-sm-none d-md-inline" id="btn_nueva_manoobra">Nuevo</span>
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
		                      <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Periodo</th>
		                      <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Cargo</th>
		                      <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Total</th>
		                      <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Estado</th>
		                      <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Acción</th>
		                  </tr>
				        </thead>

				        <tbody class="pos-rel">
				          
				        </tbody>
				      </table>
				  	</div>
				  </div>
			    <!--/form-->

			    <!-- Modal Nuevo -->
				<div class="modal fade modal-" id="newModal" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
					
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header bgc-primary-m1 brc-white">
				        <h5 class="modal-title text-white" id="newModalLabel">
				          Nuevo Cargo Mano de Obra
				        </h5>

				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">
				      	<?= form_open(base_url('Cc_manoobraplanta/guardar'), array('id'=>'form_guardar', 'name'=>'form_guardar', 'class'=>'', 'autocomplete'=>'off')); ?>
				      		<?= form_input(array('type'=>'hidden', 'name'=>'idregistro', 'id'=>'idregistro', 'value'=>'0'));?>
					        <div class="card-body px-3 pb-1">
	                			<div class="form-body">
				                    
									<div class="form-group row" id="div_periodo">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Periodo *','periodo', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-6">
				                        <?= form_input(array('type'=>'month', 'name'=>'periodo', 'id'=>'periodo', 'maxlength'=>'25', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
			                    	</div>

				                    <div class="form-group row" id="div_cargo">
				                      	<div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        	<?= form_label('Cargo *','cargo', array('class'=>'mb-0')); ?>
				                      	</div>
				                      	<div class="col-sm-8">
                        					<?= select_cargos_tabla('costos','','form-control select " required="1');?>
                      					</div>
				                    </div>

				                    <div class="form-group row" id="div_numero_cargos">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Numero de Cargos *','numero_cargos', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'numero_cargos', 'id'=>'numero_cargos', 'placeholder'=>'Digite la cantidad de cargos', 'maxlength'=>'3', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_salario">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Valor Salario*','valorsalario', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_salario', 'id'=>'valor_salario', 'placeholder'=>'Digite el valor salario', 'maxlength'=>'12', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_parafiscales">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Valor Paraficales *','valor_parafiscales', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_parafiscales', 'id'=>'valor_parafiscales', 'placeholder'=>'Digite el valor parafiscales', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_pension">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Valor Pension*','valor_pension', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_pension', 'id'=>'valor_pension', 'placeholder'=>'Digite el valor pension', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_salud">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Valor Salud*','valor_salud', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_salud', 'id'=>'valor_salud', 'placeholder'=>'Digite el valor salud', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_arl">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Valor ARL*','valor_arl', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_arl', 'id'=>'valor_arl', 'placeholder'=>'Digite el valor ARL', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_cesantias">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Cesantias *','valor_cesantias', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_cesantias', 'id'=>'valor_cesantias', 'placeholder'=>'Digite el valor cesantias', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_prima">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Prima*','valor_prima', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_prima', 'id'=>'valor_prima', 'placeholder'=>'Digite el valor prima', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_vacaciones">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Vacaciones*','valor_vacaciones', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_vacaciones', 'id'=>'valor_vacaciones', 'placeholder'=>'Digite el valor vacaciones', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_icesantias">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Intereses Cesantias*','valor_icesantias', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_icesantias', 'id'=>'valor_icesantias', 'placeholder'=>'Digite el valor intereses cesantias', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_auxtrasporte">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Auxilio de Transporte*','valor_auxtrasporte', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_auxtrasporte', 'id'=>'valor_auxtrasporte', 'placeholder'=>'Digite El valor de Auxilio de Transporte', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
				                    <div class="form-group row" id="div_valor_dotacion">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
				                        <?= form_label('Dotación*','valor_dotacion', array('class'=>'mb-0')); ?>
				                      </div>
				                      <div class="col-sm-8">
				                        <?= form_input(array('type'=>'number', 'name'=>'valor_dotacion', 'id'=>'valor_dotacion', 'placeholder'=>'Digite El valor dotacion', 'maxlength'=>'10', 'class'=>'form-control col-sm-9 col-md-10', 'required'=>true));?>
				                      </div>
				                    </div>
			                    	<div class="form-group row" id="div_estado">
				                      <div class="col-sm-4 col-form-label text-sm-right pr-0">
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
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> </div>
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



