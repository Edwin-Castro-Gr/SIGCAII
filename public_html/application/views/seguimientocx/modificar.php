<?php
  //echo $id;
  $opciones = array(
    '0'  => 'Sin Confirmar',
    '1'  => 'Confirmada',
    '2'  => 'Cancelada'
  );
  $opcestado = array(
    '0'  => 'Sin Confirmar',
    '1'  => 'Confirmada',
    '2'  => 'Cancelada'
  );
  
  $opcmat = array(
    '0'   => 'Seleccione una opción',
    '1'   => 'No',
    '2'   => 'Si',
    '3'   => 'Si y RX',
    '4'   => 'Si/RX'
  );

  $opcsala = array(
    '' => 'Seleccione una Sala',
    '1' => 'Sala 1',
    '2' => 'Sala 2',
    '3' => 'Sala 3'
  );

   $opcllamada = array(
    '' => 'Seleccione una opción',
    '1' => 'Primera Llamada',
    '2' => 'Segunda Llamada',
    '3' => 'Tercera Llamada'
  );

  $opcubicacion_paciente = array(
    '' => 'Seleccione una Opcción',
    '1' => 'Cirugia Cancelada',
    '2' => 'En Casa',
    '3' => 'En Sala de Cirugia',
    '4' => 'En Zona de Preparación',    
    '5' => 'En Sala de Recuperación'
  );

  $opcentidad = array(
    '0' => 'Seleccione una Entidad',
    '1' => 'ASISDERMA',
    '2' => 'BANCO REPUBLICA',
    '3' => 'COLSANITAS',
    '4' => 'COLSANITAS BANCO DE LA REPUBLICA',
    '5' => 'COLSANITAS BANCO REPUBLICA',
    '6' => 'COLSANITAS BAVARIA',
    '7' => 'COLSANITAS CERREJON',
    '8' => 'COLSANITAS MINTIC',
    '9' => 'COLSANITAS MODULAR',
    '10' => 'COLSANITAS PLAN MODULAR',
    '11' => 'EPS SANITAS',
    '12' => 'MEDISANITAS',
    '13' => 'PANAMERICAN LIFE',
    '14' => 'PARTICULAR',
    '15' => 'SEGUROS BOLIVAR',
    '16' => 'SEGUROS BOLIVAR POLIZA DE SALUD',
    '17' => 'SEGUROS BOLIVAR POLIZA SALUD',
    '18' => 'UNISALUD'
  );

  $opcgenero = array(
    '0' => 'Seleccione el Genero',
    '1' => 'MASCULINO',
    '2' => 'FEMENINO',
    '3' => 'OTRO'
  ); 

  $opcespecialidad = array(
    '' => 'Seleccione el Genero',
    '1' => 'CIRUGIA DE SENO',
    '2' => 'CIRUGIA GENERAL',
    '3' => 'CIRUGIA ONCOLOGICA',
    '3' => 'CIRUGIA PLASTICA',
    '4' => 'CIRUGIA VASCULAR',
    '5' => 'COLOPROCTOLOGIA',
    '6' => 'ORTOPEDIA GENERAL',
    '7' => 'DERMATOLOGIA',
    '8' => 'MAXILOFACIAL',
    '9' => 'ODONTOLOGIA',
    '10' => 'ORL',
    '11' => 'UROLOGIA',
    '12' => 'HOMBRO',
    '13' => 'MANO',
    '14' => 'CODO',
    '15' => 'PUÑO',
    '16' => 'RADIO',
    '17' => 'RODILLA',
    '18' => 'TOBILLO',
    '29' => 'PIE'
  );  

  $opctipoanestesia = array(
    '' => 'Seleccione el Tipo de Anestesia',
    '1' => 'GENERAL BALANCEADA',
    '2' => 'GENERAL INTRAVENOSA',
    '3' => 'GENERAL INHALATORIA',    
    '4' => 'GENERAL MAS BLOQUEO NERVIO',
    '5' => 'ESPINAL',
    '6' => 'EPIDURAL',
    '7' => 'LOCAL',
    '7' => 'SEDACION MAS BLOQUEO'
  ); 
    
  $opcsino = array(
    '' => 'Si/No',
    '1' => 'SI',
    '2' => 'NO'
  ); 

  $opcretraso = array(
  '' => 'Seleccione una opción',
  '0' => 'ANESTESIOLOGO TARDE',
  '1' => 'ASEO CASALIMPIA',
  '2' => 'ASEO TERMINA',
  '3' => 'CIRUJANO TARDE',
  '4' => 'CIRUJANO TARDE / CONSENTIMIENTO SIN FIRMAR',
  '5' => 'ECOGRAFO OCUPADO',
  '6' => 'ENTREGA DE CANASTA EN FARMACIA',
  '7' => 'EXAMEN DE PTE PRE OPERATORIO',
  '8' => 'FALLA DE EQUIPO',
  '9' => 'INSTRUMENTAL',
  '10' => 'MARCACION SITIO QUIRURGICO',
  '11' => 'PACIENTE SIN VALORACION DE ANESTESIA',
  '12' => 'PACIENTE TARDE',
  '13' => 'POR BAJA PRESION DE OXIGENO',
  '14' => 'PROCEDIMIENTO RESECCION DE NEUROMA DE MORTON TERCER Y SEGUNDO ESPACIO BILATERAL',
  '15' => 'RETRASO CX ANTERIOR',
  '16' => 'SIN ACCESO VENOSO',
  '17' => 'SIN AYUNO',
  '18' => 'SIN FIRMA CONSENTIMIENTO ANESTESIA',
  '19' => 'SIN FIRMA CONSENTIMIENTO CIRUJANO',
  '20' => 'SIN PERSONAL DE CASA LIMPIA PARA DESINFECCION',
  '21' => 'TRAMITE ADMINISTRATIVO',
  '21' => 'OTRO'  
  );

  $opcantibiotico = array(
    '' => 'Seleccione una opción',
    '0' => 'CLINDAMICINA',
    '1' => 'CEFAZOLINA',
    '2' => 'CEFAZOLINA MAS METRONIDAZOL',
    '3' => 'VANCOMICINA'
  );

?>
<input type="hidden" name="opc_pag" id="opc_pag" value="modificar">
  <div class="card acard mt-2 mt-lg-3">
    <div class="card-header">
      <h3 class="card-title text-125 text-primary-d2">
        <i class="far fa-edit text-dark-l3 mr-1"></i>
        Seguimiento a cirugias programadas
      </h3>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <div class="card dcard">
          <div class="card-body px-3 pb-1">
            <?= form_open('', array('id'=>'form_modificar', 'name'=>'form_modificar', 'class'=>'mt-lg-3', 'autocomplete'=>'on')); ?>
              <?= form_input(array('type'=>'hidden', 'name'=>'id_cirugia', 'id'=>'id_cirugia', 'value'=>$c_id_cirugia));?>
            <div class="form-body " style=" justify-content:flex-start;" >
              <div class="card dcard">
                <div class="card-header">
                  <h3 class="card-title text-125 text-primary-d2">
                    Datos del Paciente
                  </h3>
                </div>
                <div class="card-body px-2 pb-1">  
                  <div class="form-group row" id="div_paciente" >
                    <?= form_input(array('type'=>'hidden', 'name'=>'idpaciente', 'id'=>'idpaciente', 'value'=>'0'));?>
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Cedula Paciente ','cedula', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= form_input(array('type'=>'text', 'name'=>'cedula', 'id'=>'cedula', 'placeholder'=>'Digite la cedula', 'class'=>'form-control col-sm-11 col-md-12', 'value'=>$c_idpaciente, 'Readonly'=>true));?>
                    </div>                        
                    <div class="col-sm-5">
                      <?= form_input(array('type'=>'text', 'name'=>'paciente', 'id'=>'paciente', 'placeholder'=>'', 'class'=>'form-control col-sm-9 col-md-12 UpperCase', 'value'=>$c_paciente, 'Readonly'=>true));?>
                    </div>
                    <div class="col-sm-1 col-form-label text-sm-right pr-0">
                      <?= form_label('Edad ','edad', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-1">
                      <?= form_input(array('type'=>'text', 'name'=>'edad', 'id'=>'edad', 'class'=>'form-control col-sm-9 col-md-12 UpperCase', 'value'=>$c_edad, 'Readonly'=>true));?>
                    </div>                   
                  </div>
                  <div class="form-group row" id="div_datospaciente" >
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Dirección ','direccion', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_input(array('type'=>'text', 'name'=>'direccion', 'id'=>'direccion', 'placeholder'=>'Digite la Dirección', 'maxlength'=>'70', 'class'=>'form-control col-sm-11 col-md-12 UpperCase', 'value'=>$c_direccion, 'Readonly'=>true));?>
                    </div>
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Teléfono','telefono', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_input(array('type'=>'text', 'name'=>'telefono', 'id'=>'telefono', 'placeholder'=>'Digite el Teléfono', 'maxlength'=>'15', 'class'=>'form-control col-sm-11 col-md-12', 'value'=>$c_telefono, 'Readonly'=>true));?>
                    </div>
                  </div>  
                  <div class="form-group row" id="div_datosIIpaciente" >
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Entidad de Salud ','eps_pacientes', array('class'=>'mb-0',)); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_eps_tabla('pacientes',$c_id_eps,'form-control col-sm-11 col-md-12');?>
                    </div>
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Entidad ','entidad', array('class'=>'mb-0',)); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_dropdown('entidad', $opcentidad,$c_id_entidad,'class="form-control" id="entidad" Readonly="true"');?>
                    </div>
                  </div>
                  <div class="form-group row" id="div_datosIIIpaciente" >
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Genero ','genero', array('class'=>'mb-0',)); ?>
                    </div>
                    <div class="col-sm-2">
                      <?= form_dropdown('genero', $opcgenero,$c_genero,'class="form-control" id="genero" Readonly="true"');?>
                    </div>
                  </div>
                </div>  
              </div><!-- /.card-body -->
            </div><!-- /.card -->
              <br>
            <div class="card dcard">
              <div class="card-header">
                <h3 class="card-title text-125 text-primary-d2">
                  Datos de la Cirugia
                </h3>
              </div>
                <div class="card-body px-2 pb-1">  
                  <div class="form-group row" id="div_seccion2">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Fecha de Cirugia ','fechaprogramacion', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="pos-rel col-sm-2">
                      <?= form_input(array('type'=>'date', 'name'=>'fechaprogramacion', 'id'=>'fechaprogramacion', 'class'=>'form-control ', 'value'=>$c_fecha_Cx, 'Readonly'=>true));?>  
                          
                    </div>
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                        <?= form_label('Hora ','horaprogramacion', array('class'=>'mb-0'));?>
                    </div>
                    <div class="col-sm-2">
                        <?= form_input(array('type'=>'time', 'name'=>'horaprogramacion', 'id'=>'horaprogramacion', 'class'=>'form-control ', 'min'=>'07:00', 'max'=>'18:00', 'value'=>'07:00', 'value'=>$c_hora_Cx, 'Readonly'=>true));?>
                    </div> 
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Sala ','sala', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-2">
                        <?= form_dropdown('sala', $opcsala, $c_sala, 'class="form-control" id="sala" Readonly="true"');?>
                    </div>                   
                  </div>

                  <div class="form-group row" id="div_procedimiento">                    
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Procedimiento ','procedimientos_seguimiento', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-10">
                      <?= select_procedimientos_tabla('seguimiento',$c_procedimiento,'select2 form-control');?>
                    </div>                  
                  </div>
                  
                  <div class="form-group row" id="div_cirujano" >
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Cirujano ','cirujano_programacion', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_cirujanos_tabla('programacion',$c_id_cirujano,'select2 form-control style="width: 100%"');?>
                    </div>
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Anestesiologo ','anestesiologo_programacion', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_anestesiologo_tabla('programacion',$c_id_anest,'select2 form-control');?>
                    </div>                    
                  </div>

                  <div class="form-group row" id="div_tiempo">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Ayudante ','ayudantes_programacion', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= select_ayudantes_tabla('programacion',$c_ayudante,'select2 form-control');?>
                    </div> 
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Tiempo ','tiempohoras', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-1 col-xs-1">                      
                    <?= form_input(array('type'=>'text', 'name'=>'tiempohoras', 'id'=>'tiempohoras', 'placeholder'=>'HH:MM', 'class'=>'form-control', 'min'=>"0", 'max'=>"6", 'value'=>$c_tiempo, 'Readonly'=>true));?>                    
                    </div>
                    <div class="col-sm-1 col-form-label text-sm-right pr-0">
                      <?= form_label('MAT ','mat', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-1">
                      <?= form_dropdown('mat', $opcmat, $c_mat, 'class="form-control" id="mat" Readonly="true"');?>
                    </div> 
                  </div>                  
                </div>
              </div>

              <div class="card dcard">
                <div class="card-header">
                  <h3 class="card-title text-125 text-primary-d2">
                   Ubicación del paciente
                  </h3>
                </div>
                <div class="card-body px-2 pb-1">  
                  <div class="form-group row" id="div_tiempo">
                    <div class="col-sm-1 col-form-label text-sm-right pr-0">
                      <?= form_label('Ubicación Paciente ','ubicacion', array('class'=>'mb-0')); ?>
                    </div>
                    <div class="col-sm-4">
                      <?= form_dropdown('ubicacion', $opcubicacion_paciente, $c_ubicacion_paciente, 'class="form-control" id="ubicacion"');?>
                    </div> 
                  </div> 
                </div>
              </div>
              <br>  

              <div class="card dcard">
                <div class="card-header card-header-sm bgc-primary-d1 border-0 py-2">
                  <h5 class="card-title text-115 text-white pb-2px">Seguimientos</h5>
                </div>
                <div class="card-body px-2 pb-1"> 
                  <div class="row d-flex mx-1 mx-lg-0 btn-group">
                    <div class="col-12 col-sm-4 px-2">
                      <button type="button" class="d-style btn btn-lighter-secondary btn-h-outline-purple btn-a-outline-purple btn-a-bgc-white w-100 border-t-3 my-1 py-3" id="cancelacionQx">
                        <span  class="d-flex flex-column align-items-center" id="cancelacionQx">

                          <div class="mb-2">
                            <i class="v-n-active fas fa-window-close text-160 text-grey-m3 mr-n35"></i>
                            <i class="v-active fas fa-window-close text-200 text-purple ml-n2"></i>
                          </div>

                          <div class="font-bolder text-105 text-secondary flex-grow-1">
                            Cancelación de Cirugia                                
                          </div>
                        </span>
                      </button>
                    </div>

                    <div class="col-12 col-sm-4 px-2">                      
                      <button type="button" class="d-style btn btn-lighter-secondary btn-h-outline-purple btn-a-outline-purple btn-a-bgc-white w-100 border-t-3 my-1 py-3" id= "cursoQx">
                        <span class="d-flex flex-column align-items-center" id="cursoQx">
                          <div class="mb-2">
                            <i class="v-n-active fas fa-tasks text-160 text-grey-m3 mr-n35"></i>
                            <i class="v-active fas fa-tasks text-200 text-purple ml-n2"></i>
                          </div>
                          <div class="font-bolder text-105 text-secondary flex-grow-1">
                            Curso Quirurgico                                
                          </div>
                        </span>
                      </button>                     
                    </div>

                    <div class="col-12 col-sm-4 px-2">                      
                      <button type="button" class="d-style btn btn-lighter-secondary btn-h-outline-purple btn-a-outline-purple btn-a-bgc-white w-100 border-t-3 my-1 py-3" id= "seguimientoP" >
                        <span class="d-flex flex-column align-items-center" id="seguimientoP">
                          <div class="mb-2">
                            <i class="v-n-active fas fa-sync-alt text-160 text-grey-m3 mr-n35"></i>
                            <i class="v-active fas fa-sync-alt text-200 text-purple ml-n2"></i>
                          </div>
                          <div class="font-bolder text-105 text-secondary flex-grow-1">
                            Seguimiento a pacientes                                
                          </div>
                        </span>
                      </button>                     
                    </div>
                  </div>

                  <div class="row d-flex mx-1 mx-lg-0 btn-group">
                    <div class="col-12 col-sm-4 px-2">                      
                      <button type="button" class="d-style btn btn-lighter-secondary btn-h-outline-purple btn-a-outline-purple btn-a-bgc-white w-100 border-t-3 my-1 py-3" id="profilaxisA" >
                        <span class="d-flex flex-column align-items-center" id="profilaxisA">
                          <div class="mb-2">
                            <i class="v-n-active fas fa-solid fa-receipt text-160 text-grey-m3 mr-n35"></i>
                            <i class="v-active fas fa-solid fa-receipt text-200 text-purple ml-n2"></i>
                          </div>
                          <div class="font-bolder text-105 text-secondary flex-grow-1">
                            Profilaxis Antibiótica                                 
                          </div>
                        </span>
                      </button>                     
                    </div>

                    <div class="col-12 col-sm-4 px-2">                      
                      <button role="button" class="d-style btn btn-lighter-secondary btn-h-outline-purple btn-a-outline-purple btn-a-bgc-white w-100 border-t-3 my-1 py-3" id="medicamentosC" >
                        <span class="d-flex flex-column align-items-center" id="medicamentosC">
                          <div class="mb-2">
                            <i class="v-n-active fas fa-solid fa-receipt text-160 text-grey-m3 mr-n35"></i>
                            <i class="v-active fas fa-solid fa-receipt text-200 text-purple ml-n2"></i>
                          </div>
                          <div class="font-bolder text-105 text-secondary flex-grow-1">
                            Medicamentos de Control                                 
                          </div>
                        </span>
                      </button>                      
                    </div>

                    <div class="col-12 col-sm-4 px-2">                      
                      <button role="button" class="d-style btn btn-lighter-secondary btn-h-outline-purple btn-a-outline-purple btn-a-bgc-white w-100 border-t-3 my-1 py-3" id="cambiosCA" >
                        <span class="d-flex flex-column align-items-center" id="cambiosCA">
                          <div class="mb-2">
                            <i class="v-n-active fas fa-solid fa-receipt text-160 text-grey-m3 mr-n35"></i>
                            <i class="v-active fas fa-solid fa-receipt text-200 text-purple ml-n2"></i>
                          </div>
                          <div class="font-bolder text-105 text-secondary flex-grow-1">
                            Cambios de Código y Ayudantía                                
                          </div>
                        </span>
                      </button>
                    </div>
                  </div>
                </div> <!-- /.card-body --> 
              </div><!-- /.card -->
              <br>             

              <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                <div class="d-flex flex-column align-items-center">   
                  
                  <?= form_button(array('type'=>'button', 'id'=>'btn_actualizar', 'name'=>'btn_actualizar', 'content'=>'<i class="fa fa-check mr-1"></i>Actualizar', 'class'=>'btn btn-info btn-bold align-items-center')); ?>               
                 <br>  
                  <?= anchor(base_url('c_seguimientocx/index'), '<i class="fa fa-undo mr-1"></i> Cancelar', array('class'=>'btn btn-danger btn-rounded ')); ?>
                  
                </div>
              </div>
            </div><!-- /.card-body -->
            <?= form_close(); ?>
          </div><!-- /.card -->
        </div>
      </div>
    

    <div id="view-modal" class="modal fade modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    </div>

 <!-- **************************************** CURSO QUIRURGICO **************************************** -->
    <div id="modal-curso" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bgc-primary-m1 brc-white">
          <h5 class="modal-title text-white" id="newModalLabel">
            Curso Quirúrgico 
          </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <?= form_open(base_url('c_seguimientocx/guardar_actualizarqx'), array('id'=>'form_actualizarqx', 'name'=>'form_actualizarqx', 'class'=>'', 'autocomplete'=>'off')); ?>
            <?= form_input(array('type'=>'hidden', 'name'=>'idregistro', 'id'=>'idregistro', 'value'=>'0'));?>
            <div class="card-body px-2 pb-1">
              <div class="form-body">  
                
                <div class="form-group row" id="div_sesion7">
                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Especialidad ','especialista', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-4">
                    <?= form_dropdown('especialista', $opcespecialidad,'', 'class="form-control" id="especialista"');?>
                  </div><!-- /.input--> 

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Tipo Anestesia','anestecia', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-4">
                    <?= form_dropdown('anestecia', $opctipoanestesia,'', 'class="form-control" id="anestecia"');?>
                  </div><!-- /.input--> 
                </div><!-- /.form-group row-->

                <div class="form-group row" id="div_sesion8">
                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Uso de Artroscopio ','artroscopio', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-2">
                    <?= form_dropdown('artroscopio', $opcsino,'', 'class="form-control" id="artroscopio"');?>
                  </div><!-- /.input--> 

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Instrumentadora','intrumentadora', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-2">
                    <?= form_dropdown('intrumentadora', $opcsino,'', 'class="form-control" id="intrumentadora"');?>
                  </div><!-- /.input--> 

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Cx Inicio a Tiempo ','iniciosino', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-2">
                    <?= form_dropdown('iniciosino', $opcsino,'', 'class="form-control" id="iniciosino"');?>
                  </div><!-- /.input--> 
                </div><!-- /.form-group row-->

                <div class="form-group row" id="div_sesion9">                  
                  <div class="col-sm-2 col-form-label text-sm-right pr-0" id="lblretraso">
                      <?= form_label('Retraso por','retraso', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-4" id="inpretraso">
                    <?= form_dropdown('retraso', $opcretraso,'', 'class="form-control" id="retraso"');?>
                  </div><!-- /.input--> 

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                    <?= form_label('Tiempo Qx en minutos','tiempoQx', array('class'=>'mb-0')); ?>
                  </div>
                  <div class="col-sm-1 col-xs-1">                      
                    <?= form_input(array('type'=>'text', 'name'=>'tiempoQx', 'id'=>'tiempoQx', 'placeholder'=>'000', 'class'=>'form-control', 'min'=>"0", 'max'=>"3"));?>                    
                  </div>

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                    <?= form_label('Tiempo en minutos Anestesia','tanestesia', array('class'=>'mb-0')); ?>
                  </div>
                  <div class="col-sm-1 col-xs-1">                      
                    <?= form_input(array('type'=>'text', 'name'=>'tanestesia', 'id'=>'tanestesia', 'placeholder'=>'000', 'class'=>'form-control', 'min'=>"0", 'max'=>"3"));?>                    
                  </div>
                </div><!-- /.form-group row-->

                <div class="form-group row" id="div_cual"> 
                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                    <?= form_label('Cual?','retrasoCual', array('class'=>'mb-0')); ?>
                  </div>
                  <div class="col-sm-10 col-xs-10">                      
                    <?= form_input(array('type'=>'text', 'name'=>'retrasoCual', 'id'=>'retrasoCual', 'placeholder'=>'Cual el Motivo del retraso', 'class'=>'form-control'));?>                    
                  </div>
                </div><!-- /.form-group row--> 

                <div class="form-group row" id="div_sesion10">
                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                    <?= form_label('# Procedimientos','nprocedimientos', array('class'=>'mb-0')); ?>
                  </div>
                  <div class="col-sm-1 col-xs-1">                      
                    <?= form_input(array('type'=>'text', 'name'=>'nprocedimientos', 'id'=>'nprocedimientos', 'placeholder'=>'00', 'class'=>'form-control', 'min'=>"1", 'max'=>"2"));?>                    
                  </div>

                  <div class="col-sm-1 col-form-label text-sm-right pr-0">
                    <?= form_label('Antibiotico','antibiotico', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-4">
                    <?= form_dropdown('antibiotico', $opcantibiotico,'', 'class="form-control" id="antibiotico"');?>
                  </div><!-- /.input--> 

                  <div class="col-sm-1 col-form-label text-sm-right pr-0" id="lblIantibiotico">
                    <?= form_label('Inicio Antibiotico','iniantibiotico', array('class'=>'mb-0'));?>
                  </div>
                  <div class="col-sm-2" id="inpIantibiotico">
                    <?= form_input(array('type'=>'time', 'name'=>'iniantibiotico', 'id'=>'iniantibiotico', 'class'=>'form-control ', 'min'=>'06:30', 'max'=>'18:00', 'value'=>'06:30'));?>
                  </div> 
                </div><!-- /.form-group row-->

                <div class="form-group row" id="div_sesion11">
                  <div class="col-sm-2 col-form-label text-sm-right pr-0" id="lblfantibiotico">
                    <?= form_label('Final Antibiotico','finantibiotico', array('class'=>'mb-0'));?>
                  </div>
                  <div class="col-sm-2" id="inpfantibiotico">
                    <?= form_input(array('type'=>'time', 'name'=>'finantibiotico', 'id'=>'finantibiotico', 'class'=>'form-control ', 'min'=>'06:30', 'max'=>'18:00', 'value'=>'06:30'));?>
                  </div> 

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                    <?= form_label('Inicio Cirugia','inicirugia', array('class'=>'mb-0'));?>
                  </div>
                  <div class="col-sm-2">
                    <?= form_input(array('type'=>'time', 'name'=>'inicirugia', 'id'=>'inicirugia', 'class'=>'form-control ', 'min'=>'06:30', 'max'=>'18:00', 'value'=>'06:30'));?>
                  </div>

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Muestra Patológica ','muestrasino', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-2">
                    <?= form_dropdown('muestrasino', $opcsino,'', 'class="form-control" id="muestrasino"');?>
                  </div><!-- /.input--> 
                </div><!-- /.form-group row-->


              </div><!-- /.Form-body Modal-->
            </div><!-- /.card-body Modal-->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " id="btn_guardarcurso" name="btn_guardarcurso">
                Guardar
              </button>                 
              <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
                Cerrar
              </button>
            </div>
            <?= form_close(); ?>
          </div><!-- /.Modal-body -->
        </div> <!-- /.modal-content -->
      </div>
    </div>  <!-- /.Modal --> 

  <!-- **************************************** SEGUIMIENTO A PACIENTES **************************************** -->
    <div id="modal-seguimiento" class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bgc-primary-m1 brc-white">
          <h5 class="modal-title text-white" id="newModalLabel">
            Seguimiento a Pacientes 
          </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <?= form_open(base_url('c_seguimientocx/guardar_seguimientoqx'), array('id'=>'form_seguimientorqx', 'name'=>'form_actualizarqx', 'class'=>'', 'autocomplete'=>'off')); ?>
            <?= form_input(array('type'=>'hidden', 'name'=>'idregistro', 'id'=>'idregistro', 'value'=>'0'));?>
            <div class="card-body px-2 pb-1">
              <div class="form-body">  
                
                <div class="form-group row" id="div_sesion1">
                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Numero de Llamada ','numllamada', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-4">
                    <?= form_dropdown('numllamada', $opcllamada,'', 'class="form-control" id="numllamada"');?>
                  </div><!-- /.input--> 

                  <div class="col-sm-2 col-form-label text-sm-right pr-0">
                      <?= form_label('Responde?','responde', array('class'=>'mb-0')); ?>
                  </div><!-- /.label-->
                  <div class="col-sm-4">
                    <?= form_dropdown('responde', $opcsino,'', 'class="form-control" id="responde"');?>
                  </div><!-- /.input--> 
                </div><!-- /.form-group row-->
                <div class="card dcard">
                  <div class="card-header">
                    <h3 class="card-title text-125 text-primary-d2">
                      Primera Llamada
                    </h3>
                  </div>
                  <section class="form-group row pt-2" id="div_sesion2">
                    <div class="col-sm-2 col-form-label text-sm-right pr-0">
                        <?= form_label('Escala del Dolor ','escalaDolor', array('class'=>'mb-0')); ?>
                    </div><!-- /.label-->
                    <div class="col-sm-2">
                      <?= form_input(array('type'=>'text', 'name'=>'escalaDolor', 'id'=>'escalaDolor', 'class'=>'form-control col-sm-3 text-center','value'=>'1',  'Readonly'=>true));?>    
                    </div><!-- /.input--> 

                    <div class="col-sm-1 col-form-label text-sm-right pr-0">
                        <?= form_label('Sangrado','sangrado', array('class'=>'mb-0')); ?>
                    </div><!-- /.label-->
                    <div class="col-sm-1">
                      <?= form_dropdown('sangrado', $opcsino,'', 'class="form-control" id="sangrado"');?>
                    </div><!-- /.input--> 
                  </section><!-- /.form-group row-->

                  <div class="card ">
                    <div class="card-header">
                      <h3 class="card-title text-100 text-primary-d2">
                        Medicamentos
                      </h3>
                    </div>
                      <section class="form-group row pt-2" id="div_sesion3">   
                        <div class="col-sm-2 col-form-label text-sm-right pr-0">
                          <?= form_label('Anticuagulante ','anticuagulante', array('class'=>'mb-0')); ?>
                        </div><!-- /.label-->
                        <div class="col-sm-1">
                          <?= form_dropdown('anticuagulante', $opcsino,'', 'class="form-control" id="anticuagulante"');?>
                        </div><!-- /.input--> 
                        <div class="col-sm-3">
                          <?= form_input(array('type'=>'text', 'name'=>'nomanticuagulante', 'id'=>'nomanticuagulante', 'placeholder'=>'Cual?','class'=>'form-control'));?>   
                        </div><!-- /.input--> 

                        <div class="col-sm-2 col-form-label text-sm-right pr-0" id="lblretraso">
                          <?= form_label('Antibiotico','antibiotico', array('class'=>'mb-0')); ?>
                        </div><!-- /.label-->
                        <div class="col-sm-1" id="div_lblantibiotico">
                          <?= form_dropdown('antibiotico', $opcsino,'', 'class="form-control" id="amtibiotico"');?>
                        </div><!-- /.input--> 

                        <div class="col-sm-3" id="div_antibiotico">
                          <?= form_input(array('type'=>'text', 'name'=>'nomantibiotico', 'id'=>'nomantibiotico', 'placeholder'=>'Cual?','class'=>'form-control'));?> 
                        </div><!-- /.input-->
                      </section><!-- /.form-group row-->

                        <div class="form-group row pt-2" id="div_sesion4">        
                          <div class="col-sm-2 col-form-label text-sm-right pr-0" id="lblretraso">
                            <?= form_label('Analgesico','analgesico', array('class'=>'mb-0')); ?>
                          </div><!-- /.label-->
                          <div class="col-sm-2" id="div_analgesico">
                            <?= form_dropdown('analgesico', $opcsino,'', 'class="form-control" id="analgesico"');?>
                          </div><!-- /.input--> 

                          <div class="col-sm-3">
                            <?= form_input(array('type'=>'text', 'name'=>'nomanalgesico', 'id'=>'nomanalgesico', 'placeholder'=>'Cual?','class'=>'form-control'));?>
                          </div><!-- /.input-->  
                        </div><!-- /.form-group row-->                       
                    </div><!-- /.card--> 
                                                       
                    <div class="form-group row" id="div_sesion5"> 
                      <div class="col-sm-2 col-form-label text-sm-right pr-0">
                        <?= form_label('Medidas Antiembolicas','medidasEmbo', array('class'=>'mb-0')); ?>
                      </div>
                      <div class="col-sm-1" id="div_medidasEmbo">
                        <?= form_dropdown('medidasEmbo', $opcsino,'', 'class="form-control" id="medidasEmbo"');?>
                      </div><!-- /.input-->

                      <div class="col-sm-2 col-form-label text-sm-right pr-0">
                        <?= form_label('Otros sintomas','otrosintomas', array('class'=>'mb-0')); ?>
                      </div>
                      <div class="col-sm-6">
                        <?= form_input(array('type'=>'text', 'name'=>'otrosintomas', 'id'=>'otrosintomas', 'placeholder'=>'Cual?','class'=>'form-control'));?>
                      </div><!-- /.input-->  
                    </div><!-- /.form-group row-->

                    <div class="card ">
                      <div class="card-header">
                        <h3 class="card-title text-100 text-primary-d2">
                          Actividad Física
                        </h3>
                      </div>
                      <div class="form-group row pt-2" id="div_Deambulación"> 
                        <div class="col-sm-2 col-form-label text-sm-right pr-0">
                          <?= form_label('Deambulación con Apoyo','con_apoyo', array('class'=>'mb-0')); ?>
                        </div>
                        <div class="col-sm-2" id="div_con_apoyo">
                          <?= form_dropdown('con_apoyo', $opcsino,'', 'class="form-control" id="con_apoyo"');?>
                        </div><!-- /.input--> 

                        <div class="col-sm-2 col-form-label text-sm-right pr-0">
                          <?= form_label('Deambulación sin Apoyo','sin_apoyo', array('class'=>'mb-0')); ?>
                        </div>
                        <div class="col-sm-2" id="div_con_apoyo">
                          <?= form_dropdown('sin_apoyo', $opcsino,'', 'class="form-control" id="sin_apoyo"');?>
                        </div><!-- /.input--> 
                      </div><!-- /.form-group row--> 
                    </div><!-- /.card-->                   

                    <div class="card ">
                      <div class="card-header">
                        <h3 class="card-title text-100 text-primary-d2">
                          Sencibilidad por Bloqueo 
                        </h3>
                      </div>
                      <div class="form-group row pt-2" id="div_Deambulación"> 
                        <div class="col-sm-2 col-form-label text-sm-right pr-0">
                          <?= form_label('Parcial','sen_parcial', array('class'=>'mb-0')); ?>
                        </div>
                        <div class="col-sm-2" id="div_con_apoyo">
                          <?= form_dropdown('sen_parcial', $opcsino,'', 'class="form-control" id="sen_parcial"');?>
                        </div><!-- /.input--> 

                        <div class="col-sm-2 col-form-label text-sm-right pr-0">
                          <?= form_label('Deambulación sin Apoyo','sin_apoyo', array('class'=>'mb-0')); ?>
                        </div>
                        <div class="col-sm-2" id="div_con_apoyo">
                          <?= form_dropdown('sin_apoyo', $opcsino,'', 'class="form-control" id="sin_apoyo"');?>
                        </div><!-- /.input--> 
                      </div><!-- /.form-group row--> 
                    </div><!-- /.card-->
                  

                  
                </div><!-- /.card-->
                <div class="card dcard">
                  <div class="card-header">
                    <h3 class="card-title text-125 text-primary-d2">
                      Segunda Llamada
                    </h3>
                  </div>
                </div><!-- /.card-->
                 <div class="card dcard">
                  <div class="card-header">
                    <h3 class="card-title text-125 text-primary-d2">
                      Tercera Llamada
                    </h3>
                  </div>
                </div><!-- /.card-->
              </div><!-- /.Form-body Modal-->
            </div><!-- /.card-body Modal-->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " id="btn_guardarcurso" name="btn_guardarcurso">
                Guardar
              </button>                 
              <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
                Cerrar
              </button>
            </div>
            <?= form_close(); ?>
          </div><!-- /.Modal-body -->
        </div> <!-- /.modal-content -->
      </div>
    </div>  <!-- /.Modal --> 


  </div><!-- /.card -->
