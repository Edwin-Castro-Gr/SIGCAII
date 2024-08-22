<?php
//echo $id;
    $opciones = array(
        ''   => 'Seleccione una Opción',
        '0'   => 'Sin Iniciar',
        '1'   => 'En Desarrollo',
        '2'   => 'Finalizada',
        '3'   => 'Cerrrada'
    );

    $opctipf = array(
        '' => 'Seleccione un tipo',
        '0' => 'Rondas',
        '1' => 'Quejas',
        '2' => 'Incidentes',
        '3' => 'Eventos Adversos',
        '4' => 'Actos Inseguros',
        '5' => 'Por Auditrias',
        '6' => 'Por Indicadores',
        '7' => 'Por Comités',
        '8' => 'Analisis de Riesgo',
        '9' => 'Accidente de Trabajo'
    );

    $opctipo = array(
        '' => 'Seleccione una Opción',
        '1' => 'Acción correctiva',
        '2' => 'Acción Preventiva',
        '3' => 'Oportunidad de mejora'
    );

?>

<input type="hidden" name="opc_pag" id="opc_pag" value="gestionar">

<div class="card acard mt-2 mt-lg-3">
    <div class="card-header">
        <h3 class="card-title text-125 text-primary-d2">
            <i class="far fa-edit text-dark-l3 mr-1"></i>
            Gestión Acción de Mejora
        </h3>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card dcard">
                <div class="card-body px-3 pb-1">
                    <?= form_open(base_url('plan_mejora/guardar_gestion'), array('id' => 'form_guardar_gestion', 'name' => 'form_guardar_gestion', 'class' => 'mt-lg-3', 'autocomplete' => 'off')); ?>

                    <div class="form-body " style=" justify-content:flex-start;">
                        <?= form_input(array('type' => 'hidden', 'name' => 'idreg', 'id' => 'idreg', 'value' => $c_id_mejora)); ?>
                        <?= form_input(array('type' => 'hidden', 'name' => 'idFuente', 'id' => 'idFuente', 'value' => $c_IdFuente)); ?>
                        <?= form_input(array('type' => 'hidden', 'name' => 'nomservicio', 'id' => 'nomservicio', 'value' => $c_nom_servicio)); ?>
                        <?= form_input(array('type' => 'hidden', 'name' => 'idresponsable', 'id' => 'idresponsable', 'value' => $c_id_responsable)); ?>
                        <?= form_input(array('type' => 'hidden', 'name' => 'estadoactual', 'id' => 'estadoactual', 'value' => $c_estado)); ?>

                        <div class="form-group row" id="div_servicio">
                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Ronda *', 'ronda', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-10">
                                <?= form_input(array('type' => 'text', 'name' => 'txtronda', 'id' => 'txtronda',  'class' => 'form-control col-sm-12 col-md-10', 'value' => $c_nom_ronda)); ?>

                            </div>
                        </div>

                        <div class="form-group row" id="div_otro">
                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Items *', 'item', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-10">
                                <?= form_input(array('type' => 'text', 'name' => 'item', 'id' => 'item', 'class' => 'form-control col-sm-12 col-md-10', 'value' => $c_nom_pregunta)); ?>
                            </div>
                        </div>

                        <div class="form-group row" id="div_servicio">
                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Servicio *', 'servicio', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= form_input(array('type' => 'text', 'name' => 'nombreservicio', 'id' => 'nombreservicio',  'class' => 'form-control col-sm-12 col-md-10', 'value' => $c_nom_servicio)); ?>
                            </div>
                            <div class="col-sm-1 col-form-label text-sm-right pr-0">
                                <?= form_label('Responsable Area*', 'empleados_plan_mejora', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= form_input(array('type' => 'text', 'name' => 'responsable', 'id' => 'responsable',  'class' => 'form-control col-sm-12 col-md-10', 'value' => $c_nom_responsable)); ?>
                            </div>
                        </div>

                        <div class="form-group row" id="div_empleado">
                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Hallazgos  *', 'hallazgos', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-10">
                                <?= form_textarea(array('rows' => '2', 'name' => 'hallazgos', 'id' => 'hallazgos',  'class' => 'form-control col-sm-12 col-md-10 UpperCase', 'value' => $c_hallazgos)); ?>
                            </div>
                        </div>

                        <div class="form-group row" id="div_tipoFuente">
                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Tipo de Fuente*', 'tipo_fuente', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= form_dropdown('tipo_fuente', $opctipf, $c_idtipoF, 'class="form-control col-sm-12 col-md-10 " id="tipo_fuente"'); ?>
                            </div>

                            <div class="col-sm-1 col-form-label text-sm-right pr-0">
                                <?= form_label('TipoAccion*', 'tipo_accion', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= form_dropdown('tipo_accion', $opctipo, $c_idtipoAccion, 'class="form-control col-sm-12 col-md-10" id="tipo_accion"'); ?>
                            </div>
                        </div>

                        <div class="form-group row " id="div_accionMejora">
                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Accion de Mejora *', 'accionM', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-10">
                                <?= form_textarea(array('rows' => '4', 'name' => 'accionM', 'id' => 'accionM',  'class' => 'form-control col-sm-12 col-md-10 UpperCase', 'value' => $c_accion)); ?>
                            </div>
                        </div>

                        <div class="card dcard">

                            <div class="form-group row " id="div_accionRealizada">
                                <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                    <?= form_label('Acciones realizadas *', 'accionR', array('class' => 'mb-0')); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?= form_textarea(array('rows' => '4', 'name' => 'accionR', 'id' => 'accionR',  'class' => 'form-control col-sm-12 col-md-10 UpperCase', 'value' => '')); ?>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-sm-2 col-form-label text-sm-right pr-0"></div>
                                <div class="col-sm-8 text-center">
                                    <input type="file" class="form-control ace-file-input" id="evidencia2"  name ="evidencia2[] "multiple />
                                </div>
                            </div>

                        </div><!-- /.card -->

                        <div class="card dcard ">
                            <div class="row">
                                <div class="col-12">
                                    <table id="acciones-table" class="table border-0 table-bordered brc-black-tp11 bgc-white" style="width:80%">
                                        <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
                                            <tr>
                                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Fecha</th>
                                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Acción Realizada</th>
                                                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Evidencia</th>
                                            </tr>
                                        </thead>

                                        <tbody class="pos-rel">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.card -->
                        <br>

                        <div class="form-group row " id="div_estado">

                            <div class="col-sm-2 col-form-label text-sm-right pr-0">
                                <?= form_label('Estado', 'estado', array('class' => 'mb-0')); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= form_dropdown('estado', $opciones, $c_estado, 'class="form-control " id="estado"'); ?>
                            </div>
                        </div>

                        <div class="mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 mx-n25">
                            <div class="offset-md-3 col-md-9 text-nowrap">
                                <?= form_button(array('type' => 'button', 'id' => 'btn_guardar_gest', 'name' => 'btn_guardar_gest', 'content' => '<i class="fa fa-check mr-1"></i>Guardar', 'class' => 'btn btn-info btn-bold px-4')); ?>

                                <?= anchor(base_url('plan_mejora/index'), '<i class="fa fa-undo mr-1"></i> Cancelar', array('class' => 'btn btn-danger btn-rounded m-t-10')); ?>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card -->
        </div><!-- /.card -->