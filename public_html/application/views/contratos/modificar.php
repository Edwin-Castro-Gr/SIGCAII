<?php
  //echo $id;
  $opciones = array(
    '0'   => 'Vigente',
    '1'   => 'Terminado',
    '2'   => 'Prorogado'
  );
 
?>

    <input type="hidden" name="opc_pag" id="opc_pag" value="modificar">

    <div class="card acard mt-2 mt-lg-3">
      <div class="card-header">
        <h3 class="card-title text-125 text-primary-d2">
          <i class="far fa-edit text-dark-l3 mr-1"></i>
           Modificar Contrato
        </h3>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <div class="card dcard">
            <div class="card-body px-3 pb-1">
              <?= form_open(base_url('a_contratos/actualizar'), array('id'=>'form_actualizar', 'name'=>'form_actualizar', 'class'=>'mt-lg-3', 'autocomplete'=>'off')); ?>
                <?= form_input(array('type'=>'hidden', 'name'=>'idregistro', 'id'=>'idregistro', 'value'=>$c_id_contrato));?>
                <?= form_input(array('type'=>'hidden', 'name'=>'idusuariocreo', 'id'=>'idusuariocreo', 'value'=>'0'));?>
                <div class="form-body " style=" justify-content:flex-start;" >

                  <div class="form-group row" id="div_tipo" >
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Tipo Contrato *','tipocontratos', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_tiposcontratos_tabla('contratos',$c_id_tipocontrato,'form-control');?>
                    </div>
                  
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Funcionario *','empleados_contratos', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_empleados_tabla('contratos',$c_id_funcionario,'select2 form-control ');?>
                    </div>
                  </div>

                  <div class="form-group row" id="div_sesion3">
                      <div class="col-sm-2 col-form-label text-sm-right pr-0">
                        <?= form_label('Cargo *','cargos_contratos', array('class'=>'mb-0')); ?>
                      </div>
                      <div class="col-sm-4">
                      <?= select_cargos_tabla('contratos',$c_id_cargo,'form-control" required="1');?>
                      </div>

                      <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Centro de Costos','centroscostos', array('class'=>'mb-0')); ?>
                      </div>
                      <div class="col-sm-4">
                        <?= select_centroscostos_tabla('contratos',$c_id_centrocosto,'form-control');?>
                      </div>
                  </div>

                  <div class="form-group row" id="div_sesion4">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Departamentos','departamentos', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= select_areas_tabla('contratos',$c_id_departamento,'form-control');?>
                    </div>

                     <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Jefe inmediato *','empleados_jefeinmed', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_empleados_tabla('jefeinm',$c_id_jefeinm,'select2 form-control ');?>
                    </div>
                  </div>

                  <div class="form-group row" id="div_sesion5">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Prorroga Automatica','prorroga', array('class'=>'mb-0', 'id'=>'lblprorrogaAut')); ?>
                    </div>
                    <div class="col-sm-4">
                      <label>
                       No
                      </label>
                        <?= form_input(array('type'=>'hidden', 'name'=>'idprorroga', 'id'=>'idprorroga', 'value'=>$c_prorroga));?>
                        <?= form_input(array('type'=>'checkbox', 'name'=>'prorroga', 'id'=>'prorroga', 'class'=>'ace-switch input-md text-grey-l1 brc-primary-d1','checked'=>''));?>
                        
                      <label>
                        Si 
                      </label>
                    </div>
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Fecha de Inicio *','fechainicio', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_input(array('type'=>'date', 'name'=>'fechainicio', 'id'=>'fechainicio', 'placeholder'=>'Digite la fecha', 'class'=>'form-control', 'required'=>true,'value'=>$c_fecha_inicio));?>
                    </div> 
                  </div>  

                  <div class="form-group row" id="div_sesion6">     
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Estado *','estado', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_dropdown('estado', $opciones, $c_estado, 'class="form-control " id="estado"');?>
                    </div>

                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Fecha final','fechafinal', array('class'=>'mb-0', 'id'=>'lblfechafinal')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_input(array('type'=>'date', 'name'=>'fechafinal', 'id'=>'fechafinal', 'placeholder'=>'Digite la fecha', 'class'=>'form-control', 'required'=>true,'value'=>$c_fecha_final));?>
                    </div>                    
                  </div> 

                  <div class="form-group row" id="div_vigencia_p">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Fecha de Inicio prorroga','fechainicio_p', array('class'=>'mb-0', 'id'=>'lblfechainicio_p')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_input(array('type'=>'date', 'name'=>'fechainicio_p', 'id'=>'fechainicio_p', 'placeholder'=>'Digite la fecha', 'class'=>'form-control', 'required'=>true,'value'=>""));?>
                    </div>                    

                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Fecha final prorroga','fechafinal_p', array('class'=>'mb-0', 'id'=>'lblfechafinal_p')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_input(array('type'=>'date', 'name'=>'fechafinal_p', 'id'=>'fechafinal_p', 'placeholder'=>'Digite la fecha', 'class'=>'form-control', 'required'=>true,'value'=>""));?>
                    </div>
                  </div>

                  <div class="form-group row" id="div_observaciones_prorroga">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Observaciones prorroga','observaciones_p', array('class'=>'mb-0', 'id'=>'lblobservaciones_p')); ?>
                    </div>
                    <div class="col-sm-10">
                      <?= form_textarea(array('rows'=>'2', 'name'=>'observaciones_p', 'id'=>'observaciones_p', 'placeholder'=>'Digite las observaciones de la prorroga', 'class'=>'form-control','value'=>""));?>
                    </div>
                  </div>

                   <div class="form-group row" id="div_anexo_prorroga">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Anexo de la Prorroga','lblprorroga', array('class'=>'mb-0','id'=>'lblprorroga'));?>
                    </div>
                    <div class="col-sm-8">                     
                      <?=form_upload(array('type'=>'file', 'name'=>'anexo_prorroga', 'id'=>'anexo_prorroga', 'placeholder'=>'Cargue el Anexo de la Prorroga', 'class'=>'ace-file-input form-control col-sm-9 col-md-10'));?>
                    </div>
                  </div>

                  <div class="form-group row" id="div_parte7"> 
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Actualizar anexos','actulizaranexosl', array('class'=>'mb-0', 'id'=>'lblactulizaranexos')); ?>
                    </div>
                    <div class="col-sm-4">
                      <label>No</label>                        
                        <?= form_input(array('type'=>'checkbox', 'name'=>'actulizaranexos', 'id'=>'actulizaranexos', 'class'=>'ace-switch input-md text-grey-l1 brc-primary-d1','checked'=>''));?> 
                        <?= form_input(array('type'=>'hidden', 'name'=>'idactulizaranexos', 'id'=>'idactulizaranexos', 'value'=>false));?>                       
                      <label>Si</label>
                    </div>
                  </div>
                  <div class="container " id="div_parte8">                    
                    <div class="col-form-label text-sm-left pr-0">
                       <?= form_label('ANEXOS DEL CONTRATO','anexos', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="card ccard bgc-black-tp10 mt-4 mt-md-0 overflow-hidden">
                      <div class="card-body p-0" id="accordionA">
                        <!--div class="accordion" id="accordionAnexos">                  


                        </div-->
                      </div>
                    </div><!-- /.card -->
                  </div><!-- /.card -->    

                  <div class="container " id="div_parte9">                    
                    <div class="col-form-label text-sm-left pr-0">
                       <?= form_label('PRORROGAS','prorrogas', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="card ccard bgc-black-tp10 mt-4 mt-md-0 overflow-hidden">
                      <div class="card-body p-0" id="accordionProrroga">
                       
                      </div>
                    </div><!-- /.card -->
                  </div><!-- /.card -->            

                  <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                    <div class="offset-md-3 col-md-9 text-nowrap">
                      <?= form_button(array('type'=>'button', 'id'=>'btn_actualizar', 'name'=>'btn_actualizar', 'content'=>'<i class="fa fa-check mr-1"></i>Actualizar', 'class'=>'btn btn-info btn-bold px-4')); ?>

                      <?= anchor(base_url('a_contratos/index'), '<i class="fa fa-undo mr-1"></i> Cancelar', array('class'=>'btn btn-danger btn-rounded m-t-10')); ?>
                    </div>
                  </div>

                </div><!-- /.card-body -->
              <?= form_close(); ?>
            </div><!-- /.card -->
          </div>
        </div><!-- /.card -->
      </div>
    </div><!-- /.card -->