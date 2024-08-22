<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_contratost extends CI_Controller {
	 
	//Constructor de la clase
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');

		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());			
		} else {
			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');
			
		}
	} 

	public function index() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect();			
		} else {
			
			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			$data_usua['titulo']="Contratos Terceros";
			$data_usua['origen']="Documentos";
			$data_usua['contenido']='contratost/index';
			$data_usua['entrada_js']='_js/contratost.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'">			
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'">

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/chosen-js@1.8.7/chosen.min.css').'">';

			$data_usua['librerias_js']='<!-- Sweet-Alert  -->
			
    		<script src="'.base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js').'"></script>
    		<script src="'.base_url('plugins/interactjs@1.10.11/dist/interact.min.js').'"></script>
    		<!-- DataTables  -->
    		<script src="'.base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js').'"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/js/star-rating.min.js"></script>
    		<script src="'.base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js').'"></script>
			<script src="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.js').'"></script>
    		<script src="'.base_url('plugins/chosen-js@1.8.7/chosen.jquery.min.js').'"></script>
    		';

			$this->load->view('template',$data_usua);
		}
	}
	
	public function nuevo() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect();			
		} else {
			
			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			$registro=array(					
				'id_usuario_temp '=>$this->session->userdata('C_id_usuario')
			);			
			$query = $this->general_model->delete('contratos_terceros_personal', $registro);

			$data_usua['titulo']="Contratos Terceros";
			$data_usua['origen']="Documentos";
			$data_usua['contenido']='contratost/nuevo';
			$data_usua['entrada_js']='_js/contratost.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<!--link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'" -->
			<!--link rel="stylesheet" type="text/css" href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'" -->

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/free-jqgrid@4.15.5/ui.jqgrid.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/chosen-js@1.8.7/chosen.min.css').'">
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/combine/npm/tiny-date-picker@3.2.8/tiny-date-picker.min.css,npm/tiny-date-picker@3.2.8/date-range-picker.min.css">
			<!-- DateTimePicker  -->
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/css/bootstrap-datetimepicker.min.css">

			
			<!-- ColorPicker  -->
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/css/bootstrap-colorpicker.min.css">

			<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">';

			$data_usua['librerias_js']='<!-- Sweet-Alert  --> 
			
    		<script src="'.base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js').'"></script>
    		<script src="'.base_url('plugins/interactjs@1.10.11/dist/interact.min.js').'"></script>
    		<!-- DataTables  -->
    		<script src="'.base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js').'"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/js/star-rating.min.js"></script>
    		<script src="'.base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js').'"></script>
			<script src="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.js').'"></script>
    		<script src="'.base_url('plugins/chosen-js@1.8.7/chosen.jquery.min.js').'"></script>
			<script src="https://cdn.jsdelivr.net/npm/autosize@4.0.2/dist/autosize.min.js"></script>
			<script src="'.base_url('plugins/free-jqgrid@4.15.5/jquery.jqgrid.src.min.js').'"></script>
			
		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-maxlength@1.10.0/dist/bootstrap-maxlength.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.5/dist/jquery.inputmask.min.js"></script>


		    <script src="https://cdn.jsdelivr.net/npm/nouislider@14.7.0/distribute/nouislider.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/js/ion.rangeSlider.min.js"></script>


		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-touchspin@4.3.0/dist/jquery.bootstrap-touchspin.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/tiny-date-picker@3.2.8/dist/date-range-picker.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/src/js/bootstrap-datetimepicker.min.js"></script>


		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/js/bootstrap-colorpicker.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/es6-object-assign@1.1.0/dist/object-assign-auto.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5.5.1/dist/iro.min.js"></script>


		    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    		';

			$this->load->view('template',$data_usua);
		}
	}

	public function modificar($id) {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			//header('Content-Type: application/json');
			
			$data_usua['c_id_contrato_tercero'] = $id;
			$data_usua['c_numeroint']='';
			$data_usua['c_n_contrato']='';
			$data_usua['c_id_tercero'] = '';
			$data_usua['c_nit_tercero'] = '';			
			$data_usua['c_razon_tercero'] = '';
			$data_usua['c_areas'] = '';			
			$data_usua['c_linea_costo']='';			
			$data_usua['c_concepto'] = '';
			$data_usua['c_objeto_contrato'] = '';
			$data_usua['c_fecha_inicio'] = '';
			$data_usua['c_fecha_final'] = '';
			$data_usua['c_prorroga'] = '';
			$data_usua['c_cobro'] = '';
			$data_usua['c_valor_contrato'] = '';
			$data_usua['c_responsable']='';
			$data_usua['c_maneja_tarifa']='';
			$data_usua['c_keralty']='';
			$data_usua['c_observaciones'] = '';
			$data_usua['c_clausula_sarlaft'] = '';	
			$data_usua['c_maneja_personal']='MPersonal';					
			$data_usua['c_id_usuario'] = '';
			$data_usua['c_estado'] = '';
	
			$campos='ct.id_contrato_tercero AS "Id", ct.numeroint AS "Interno", ct.n_contrato AS "Contrato", ct.id_tercero AS "idTercero", te.numero_id AS "Nit", te.razon_social As "Razon_social", ct.areas AS "Areas", ct.linea_costo AS "Linea", ct.concepto AS "Concepto", ct.objeto_contrato AS "Objeto", ct.fecha_inicio AS "Fechaini", ct.fecha_final AS "Fechafin", ct.prorroga AS "Prorroga", ct.cobro AS "Cobro", ct.valor_contrato AS "Valor", ct.responsable AS "Responsable", ct.maneja_tarifa AS "Tarifa", ct.keralty AS "Keralty", ct.Observaciones AS "Observaciones", ct.clausula_Sarlaft AS "Sarlaft", ct.maneja_pers AS "MPersonal", ct.razon_grupo_k AS "Razon_k", ct.nit_grupo_k AS "Nit_K", ct.id_usuario AS "Usuario", ct.estado AS "Estado"';

			$query = $this->general_model->consulta_personalizada($campos,'contratos_terceros ct INNER JOIN terceros te ON ct.id_tercero = te.id_tercero', 'ct.id_contrato_tercero = "'.$id.'"', '', 0, 0);

			foreach ($query->result_array() as $row){

				
				$data_usua['c_numeroint']=$row['Interno'];
				$data_usua['c_n_contrato']=$row['Contrato'];
				$data_usua['c_id_tercero'] =$row['idTercero'];
				$data_usua['c_nit_tercero'] =$row['Nit'];			
				$data_usua['c_razon_tercero'] =$row['Razon_social'];
				$data_usua['c_areas'] =$row['Areas'];			
				$data_usua['c_linea_costo']=$row['Linea'];			
				$data_usua['c_concepto'] =$row['Concepto'];
				$data_usua['c_objeto_contrato'] =$row['Objeto'];
				$data_usua['c_fecha_inicio'] =$row['Fechaini'];
				$data_usua['c_fecha_final'] =$row['Fechafin'];
				$data_usua['c_prorroga'] =$row['Prorroga'];
				$data_usua['c_cobro'] =$row['Cobro'];
				$data_usua['c_valor_contrato'] =$row['Valor'];
				$data_usua['c_responsable']=$row['Responsable'];
				$data_usua['c_maneja_tarifa']=$row['Tarifa'];
				$data_usua['c_keralty']=$row['Keralty'];
				$data_usua['c_observaciones'] =$row['Observaciones'];
				$data_usua['c_clausula_sarlaft'] =$row['Sarlaft'];	
				$data_usua['c_maneja_personal']=$row['MPersonal'];	
				$data_usua['c_razon_k']=$row['Razon_k'];	
				$data_usua['c_nit_k']=$row['Nit_K'];				
				$data_usua['c_id_usuario'] = $row['Usuario'];
				$data_usua['c_estado'] = $row['Estado'];

			}

			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			// $registro=array(					
			// 	'id_usuario_temp '=>$this->session->userdata('C_id_usuario')
			// );			
			// $query = $this->general_model->delete('contratos_terceros_personal', $registro);

			$data_usua['titulo']="Otro Si Contrato Terceros";
			$data_usua['origen']="Documentos";
			$data_usua['contenido']='contratost/modificar';
			$data_usua['entrada_js']='_js/contratost.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<!--link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'" -->
			<!--link rel="stylesheet" type="text/css" href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'" -->

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/free-jqgrid@4.15.5/ui.jqgrid.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/chosen-js@1.8.7/chosen.min.css').'">
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/combine/npm/tiny-date-picker@3.2.8/tiny-date-picker.min.css,npm/tiny-date-picker@3.2.8/date-range-picker.min.css">
			<!-- DateTimePicker  -->
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/css/bootstrap-datetimepicker.min.css">
			<!-- ColorPicker  -->
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/css/bootstrap-colorpicker.min.css">';

			$data_usua['librerias_js']='<!-- Sweet-Alert  --> 
			
    		<script src="'.base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js').'"></script>
    		<script src="'.base_url('plugins/interactjs@1.10.11/dist/interact.min.js').'"></script>
    		<!-- DataTables  -->
    		<script src="'.base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js').'"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/js/star-rating.min.js"></script>
    		<script src="'.base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js').'"></script>
			<script src="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.js').'"></script>
    		<script src="'.base_url('plugins/chosen-js@1.8.7/chosen.jquery.min.js').'"></script>
			<script src="https://cdn.jsdelivr.net/npm/autosize@4.0.2/dist/autosize.min.js"></script>
			<script src="'.base_url('plugins/free-jqgrid@4.15.5/jquery.jqgrid.src.min.js').'"></script>
		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-maxlength@1.10.0/dist/bootstrap-maxlength.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.5/dist/jquery.inputmask.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/nouislider@14.7.0/distribute/nouislider.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/js/ion.rangeSlider.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-touchspin@4.3.0/dist/jquery.bootstrap-touchspin.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/tiny-date-picker@3.2.8/dist/date-range-picker.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/src/js/bootstrap-datetimepicker.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/js/bootstrap-colorpicker.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/es6-object-assign@1.1.0/dist/object-assign-auto.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5.5.1/dist/iro.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.11/dist/jquery.knob.min.js"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    		';
    		
			$this->load->view('template',$data_usua);
			
		}
	}

	public function otrosi($id) {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			//header('Content-Type: application/json');
			
			$data_usua['c_id_contrato_tercero'] = '$id';
			$data_usua['c_numeroint']='';
			$data_usua['c_n_contrato']='';
			$data_usua['c_id_tercero'] = '';
			$data_usua['c_nit_tercero'] = '';			
			$data_usua['c_razon_tercero'] = '';
			$data_usua['c_areas'] = '';			
			$data_usua['c_linea_costo']='';			
			$data_usua['c_concepto'] = '';
			$data_usua['c_objeto_contrato'] = '';
			$data_usua['c_fecha_inicio'] = '';
			$data_usua['c_fecha_final'] = '';
			$data_usua['c_prorroga'] = '';
			$data_usua['c_cobro'] = '';
			$data_usua['c_valor_contrato'] = '';
			$data_usua['c_responsable']='';
			$data_usua['c_maneja_tarifa']='';
			$data_usua['c_keralty']='';
			$data_usua['c_observaciones'] = '';
			$data_usua['c_clausula_sarlaft'] = '';	
			$data_usua['c_maneja_personal']='MPersonal';					
			$data_usua['c_id_usuario'] = '';
			$data_usua['c_estado'] = '';
	
			$campos='ct.id_contrato_tercero AS "Id", ct.numeroint AS "Interno", ct.n_contrato AS "Contrato", ct.id_tercero AS "idTercero", te.numero_id AS "Nit", te.razon_social As "Razon_social", ct.areas AS "Areas", ct.linea_costo AS "Linea", ct.concepto AS "Concepto", ct.objeto_contrato AS "Objeto", ct.fecha_inicio AS "Fechaini", ct.fecha_final AS "Fechafin", ct.prorroga AS "Prorroga", ct.cobro AS "Cobro", ct.valor_contrato AS "Valor", ct.responsable AS "Responsable", ct.maneja_tarifa AS "Tarifa", ct.keralty AS "Keralty", ct.Observaciones AS "Observaciones", ct.clausula_Sarlaft AS "Sarlaft", ct.maneja_pers AS "MPersonal", ct.razon_grupo_k AS "Razon_k", ct.nit_grupo_k AS "Nit_K", ct.id_usuario AS "Usuario", ct.estado AS "Estado"';

			$query = $this->general_model->consulta_personalizada($campos,'contratos_terceros ct INNER JOIN terceros te ON ct.id_tercero = te.id_tercero', 'ct.id_contrato_tercero = "'.$id.'"', '', 0, 0);

			foreach ($query->result_array() as $row){

				
				$data_usua['c_numeroint']=$row['Interno'];
				$data_usua['c_n_contrato']=$row['Contrato'];
				$data_usua['c_id_tercero'] =$row['idTercero'];
				$data_usua['c_nit_tercero'] =$row['Nit'];			
				$data_usua['c_razon_tercero'] =$row['Razon_social'];
				$data_usua['c_areas'] =$row['Areas'];			
				$data_usua['c_linea_costo']=$row['Linea'];			
				$data_usua['c_concepto'] =$row['Concepto'];
				$data_usua['c_objeto_contrato'] =$row['Objeto'];
				$data_usua['c_fecha_inicio'] =$row['Fechaini'];
				$data_usua['c_fecha_final'] =$row['Fechafin'];
				$data_usua['c_prorroga'] =$row['Prorroga'];
				$data_usua['c_cobro'] =$row['Cobro'];
				$data_usua['c_valor_contrato'] =$row['Valor'];
				$data_usua['c_responsable']=$row['Responsable'];
				$data_usua['c_maneja_tarifa']=$row['Tarifa'];
				$data_usua['c_keralty']=$row['Keralty'];
				$data_usua['c_observaciones'] =$row['Observaciones'];
				$data_usua['c_clausula_sarlaft'] =$row['Sarlaft'];	
				$data_usua['c_maneja_personal']=$row['MPersonal'];	
				$data_usua['c_razon_k']=$row['Razon_k'];	
				$data_usua['c_nit_k']=$row['Nit_K'];				
				$data_usua['c_id_usuario'] = $row['Usuario'];
				$data_usua['c_estado'] = $row['Estado'];

			}

			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			// $registro=array(					
			// 	'id_usuario_temp '=>$this->session->userdata('C_id_usuario')
			// );			
			// $query = $this->general_model->delete('contratos_terceros_personal', $registro);

			$data_usua['titulo']="Contratos Terceros";
			$data_usua['origen']="Documentos";
			$data_usua['contenido']='contratost/otrosi';
			$data_usua['entrada_js']='_js/contratost.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<!--link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'" -->
			<!--link rel="stylesheet" type="text/css" href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'" -->

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/free-jqgrid@4.15.5/ui.jqgrid.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/chosen-js@1.8.7/chosen.min.css').'">
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/combine/npm/tiny-date-picker@3.2.8/tiny-date-picker.min.css,npm/tiny-date-picker@3.2.8/date-range-picker.min.css">
			<!-- DateTimePicker  -->
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/css/bootstrap-datetimepicker.min.css">
			<!-- ColorPicker  -->
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/css/bootstrap-colorpicker.min.css">';

			$data_usua['librerias_js']='<!-- Sweet-Alert  --> 
			
    		<script src="'.base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js').'"></script>
    		<script src="'.base_url('plugins/interactjs@1.10.11/dist/interact.min.js').'"></script>
    		<!-- DataTables  -->
    		<script src="'.base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js').'"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/js/star-rating.min.js"></script>
    		<script src="'.base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js').'"></script>
			<script src="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.js').'"></script>
    		<script src="'.base_url('plugins/chosen-js@1.8.7/chosen.jquery.min.js').'"></script>
			<script src="https://cdn.jsdelivr.net/npm/autosize@4.0.2/dist/autosize.min.js"></script>
			<script src="'.base_url('plugins/free-jqgrid@4.15.5/jquery.jqgrid.src.min.js').'"></script>
		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-maxlength@1.10.0/dist/bootstrap-maxlength.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.5/dist/jquery.inputmask.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/nouislider@14.7.0/distribute/nouislider.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/js/ion.rangeSlider.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-touchspin@4.3.0/dist/jquery.bootstrap-touchspin.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/tiny-date-picker@3.2.8/dist/date-range-picker.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/src/js/bootstrap-datetimepicker.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/js/bootstrap-colorpicker.min.js"></script>

		    <script src="https://cdn.jsdelivr.net/npm/es6-object-assign@1.1.0/dist/object-assign-auto.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5.5.1/dist/iro.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.11/dist/jquery.knob.min.js"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    		';
    		
			$this->load->view('template',$data_usua);
			
		}
	}

	public function listar_tabla() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$this->load->helper('funciones_tabla');
				echo listar_contratost_tabla('WEB');
			}
		}
	}

	//ASIGNACION NUMERO DE CONTRATO
	public function consecutivo() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				// $macro = $this->input->post('macro');				
				// $proce = $this->input->post('proce');
				// $subproce = $this->input->post('subproce');
				// $docrela = $this->input->post('docrelac');
				// $tipod = $this->input->post('tipod');
				

				$campos =' (COUNT(*) + 1) AS "total" ';
		    	$query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros', '', '', 0, 0);
				$row = $query->row_array();
				if($row['total'] < 10)
					echo "00".$row['total'];
				elseif($row['total'] >=10 && $row['total'] < 100)
					echo "0".$row['total'];
				else
					echo $row['total'];
			} //-Valida Envio por ajax
		}//-Valida Inicio de Session
	}

	public function guardar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				$nit = $this->input->post('nit');

				$fecha = date('Y-m-d H:i:s');
				$ncontrato = $this->input->post('ncontrato');

				//AREA
				$areas = $this->input->post('areas');
				$val_area = implode(',', (array) $areas);

				//LINEA DE COSTOS
				$lineacostos_contratost = $this->input->post('lineacostos_contratost');
				$val_costo = implode(',', (array) $lineacostos_contratost);
				
				//OBJETO
				$concepto_contratost = $this->input->post('concepto_contratost');
				$val_concepto = implode(',', (array) $concepto_contratost);

				//RESPONSABLE
				$empleados_contratost = $this->input->post('empleadosM_contratost');
				$val_responsable = implode(',', (array) $empleados_contratost);

				$registro=array(
					'numeroint'=>$this->input->post('numeroint'),		
					'n_contrato'=>$ncontrato,			
					'id_tercero'=>$this->input->post('idtercero'), 
					'areas'=>$val_area, 
					'linea_costo'=>$val_costo,
					'concepto'=>$val_concepto,
					'objeto_contrato'=>$this->input->post('objeto'),  
					'fecha_inicio'=>$this->input->post('fechainicio'), 
					'fecha_final'=>$this->input->post('fechafinal'), 
					'prorroga'=>$this->input->post('prorroga'),
					'cobro'=>$this->input->post('cobro'), 
					'valor_contrato'=>$this->input->post('valor'),
					'responsable'=>$val_responsable,
					'observaciones'=>$this->input->post('observaciones'),
					'maneja_tarifa'=>$this->input->post('maneja_tarifa'),
					'keralty'=>$this->input->post('keralty'),
					'clausula_sarlaft'=>$this->input->post('sarlaft'),
					'fecha_registro'=>$fecha, 
					'id_usuario'=>$this->session->userdata('C_id_usuario'), 
					'estado'=>$this->input->post('estado')
				);
				//echo var_dump($registro);

				$query = $this->general_model->insert('contratos_terceros', $registro);				
						
				if($query >= 1) {
					$contrato = $ncontrato.$query;
					// *************** SECCION PARA EL CARGUE DE ANEXOS *****************************************
					if (!file_exists('contratos_terceros/')) {
				 		mkdir('contratos_terceros/', 0777, true);
				 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/')) {
					 		mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/', 0777, true);
					 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
					 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true);
					 			if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) {
					 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
					 			}
					 		}
					 	}

				 	} elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
					 	mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true); 
					 	if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) 
					 	{
				 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
				 		}	
				 	}elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) 
					 	{
				 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
				 		}

					$ruta = 'contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'; 
							
				
					//$this->session->set_userdata('archivo_origen',"");
					$mensage = '';
					//echo var_dump($_FILES);
					foreach ($_FILES as $key1 => $key) //Iteramos el arreglo de archivos
					{
						//echo ($key1);
						if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
						{
							$id_check_contrato = explode('_',$key1); //Nombre del input file

							$NombreOriginal = $key['name'];//Obtenemos el nombre original del archivo
							//$tipo = $key['type'];

							$foo = explode(".",$key['name']);
							$bar = count($foo);
							$ext = ($bar > 0)? $foo[$bar - 1]:'';
							$nombre_img = date("YmdHis").'-'.$NombreOriginal;
							$nombre = $this->session->userdata('C_id_usuario').'-T-'.$nombre_img;

							$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
							$Destino = $ruta.$nombre;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
						
							move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada		
							
							//$this->session->set_userdata('archivo_origen',$Destino);
							
							
							$mensage .= 'cargado'; 	

							$registro1 = array(					
								'id_contratost'=>$query, 
								'archivo'=>$Destino, 
								'id_checklist_contratot'=>$id_check_contrato[1], 
								'fecha_ini_vigencia'=>$this->input->post('fecha_inicio_'.$id_check_contrato[1]),
								'fecha_fin_vigencia'=>$this->input->post('fecha_final_'.$id_check_contrato[1]),
								'fecha_registro'=>$fecha, 
								'id_usuario'=>$this->session->userdata('C_id_usuario'), 
								'estado'=>1
							);
							//echo print_r($registro1);
							$query1 = $this->general_model->insert('contratost_anexos', $registro1);
						}
					 
						if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
						{
							$mensage .= '-'.$key['error'].'-'; 
						}
						//echo $mensage;
					}
				}
				if($query >= 1) {
						
					if($this->input->post('maneja_personal') == "Si") {
						$registro0 = array(					
							'id_contrato_tercero'=>$query, 
							'id_usuario_temp '=>''
						);							
						$query0 = $this->general_model->update('contratos_terceros_personal', 'id_usuario_temp', $this->session->userdata('C_id_usuario'), $registro0);
																								
						// $query1 = $this->general_model->update('c_tercero_anexos_personal', 'id_usuario_temp', $this->session->userdata('C_id_usuario'), $registro0);
					}

					//GUARDAR NOTIFICACIONES
				}	
				if($query >= 1) {
					$responsable = explode(",", $val_responsable);  
					$tipo_notificacion=5;
					$id_solicitud = "CT-".$query;
					$id_usuario_notifica = $this->session->userdata('C_id_usuario');
					$id_usuario_notificado= $val_responsable;
					
					$observacion ="Contrato con ".$this->input->post('idtercero')."cargado";
					
					if(is_array($responsable)){
						foreach ($responsable as $value) {//ITERA PARA NOTIFICAR A QUIENES REVISAN
						    $usuario2 =	$value;	
							$registro2=array(
								'tipo_notificacion'=>$tipo_notificacion,
								'id_solicitud' =>$id_solicitud,
								'id_usuario_notifica'=>$id_usuario_notifica, 
								'id_usuario_2'=>$usuario2, 
								'observacion'=>$observacion, 
								'estado'=>'0',
								'fecha_registro'=>$fecha				
							);

							$query = $this->general_model->insert('notificaciones', $registro2);
						}
					}else{
				    	//SI SOLO HAY UN RESPONSABLE
				        foreach ((array)$responsable as $value) {
				        	$usuario2 =	$value;	
							$registro2=array(
								'tipo_notificacion'=>$tipo_notificacion,
								'id_solicitud' =>$id_solicitud,
								'id_usuario_notifica'=>$id_usuario_notifica, 
								'id_usuario_2'=>$usuario2, 
								'observacion'=>$observacion, 
								'estado'=>'0',
								'fecha_registro'=>$fecha				
							);

							$query = $this->general_model->insert('notificaciones', $registro2);
						}						
					}
					echo '1';	
				} else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} 
		}
	}
	
	public function guardarotrosi() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				$nit = $this->input->post('nit');

				$fecha = date('Y-m-d H:i:s');
				$ncontrato = $this->input->post('ncontrato');
				$id_contrato = $this->input->post('idreg');

				//RESPONSABLE
				$empleados_contratost = $this->input->post('empleadosM_contratost');
				$val_responsable = implode(',', (array) $empleados_contratost);


				$registro=array(
					'id_contratot'=>$id_contrato,		
					'Observaciones'=>$this->input->post('observaciones'),
					'objeto'=>$this->input->post('objeto'),  					
					'fecha_registro'=>$fecha, 
					'id_usuario'=>$this->session->userdata('C_id_usuario'), 
					'estado'=>'1'
				);
				$query = $this->general_model->insert('otrosi', $registro);
				echo '1';
						
				if($query >= 1) {
					$otrosi = "Otro Si-".$query;
					$contrato = $ncontrato;

					// *************** SECCION PARA EL CARGUE DE ANEXOS *****************************************
					if (!file_exists('contratos_terceros/')) {
				 		mkdir('contratos_terceros/', 0777, true);
				 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/')) {
					 		mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/', 0777, true);
					 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
					 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true);
					 			if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) {
					 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
						 			if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/')) {
						 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/', 0777, true);
						 			}
					 			}
					 		}
					 	}
				 	} elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
					 	mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true); 
					 	if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')){
				 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
				 			if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/')) {
						 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/', 0777, true);
				 			}
				 		}	
				 	}elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')){
				 		mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
				 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/')) {
						 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/', 0777, true);
				 		}
				 	}elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/')) {
						 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/', 0777, true);
				 	}

					$ruta = './contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/'; 
					$rutag='contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'.$otrosi.'/';
					$archivo_otrosi = "";		
					
					$config = [
						"upload_path" => $ruta,
						"allowed_types" => "*"
					];

					$this->load->library('upload', $config); 
          			$this->upload->initialize($config);
					if($this->upload->do_upload('archivo_otrosi1')){
						$data = array('upload_data' => $this->upload->data());
						$archivo= $rutag.$data['upload_data']['file_name'];

						$registro1 = array(					
								'id_otrosi'=>$query, 
								'nombre_anexo'=>"Otro Si", 
								'ruta_archivo'=>$archivo,								
								'fecha_registro'=>$fecha, 
								'id_usuario'=>$this->session->userdata('C_id_usuario')								
							);
							//echo print_r($registro1);
							$query1 = $this->general_model->insert('otrosi_anexos', $registro1);
					}
					echo "1";
				}
				if($query1>=1){
					if(!empty($_FILES['archivo_otrosi2']['name']) && count(array_filter($_FILES['archivo_otrosi2']['name'])) > 0){ 
        				$filesCount = count($_FILES['archivo_otrosi2']['name']); 
        		
		        		for($i = 0; $i < $filesCount; $i++){       			 

		          			$this->load->library('upload', $config); 
		        			$this->upload->initialize($config);

							if($this->upload->do_upload('archivo_otrosi2['.$i.']')){
								$data = array('upload_data' => $this->upload->data());
								$archivo= $rutag.$data['upload_data']['file_name'];
							}
							$registro1 = array(					
								'id_otrosi'=>$query, 
								'nombre_anexo'=>"Otros anexos", 
								'ruta_archivo'=>$archivo,								
								'fecha_registro'=>$fecha, 
								'id_usuario'=>$this->session->userdata('C_id_usuario')								
							);
							//echo print_r($registro1);
							$query1 = $this->general_model->insert('otrosi_anexos', $registro1);																				
						}
					}
					echo "1";
				}
				if($query >= 1) {
					//ACTUALIZAR ESTADO CONTRATOS TERCEROS	
					if($this->input->post('objeto') == "1") {
						$id_prorroga='';
						$estado_contrato = $this->input->post('estado_contrato');
						if($estado_contrato =='1'){
							$campos ='id_prorroga';
							$query = $this->general_model->consulta_personalizada($campos,'prorroga_ct', 'id_contrato_tercero = "'.$id_contrato.'" AND estado = "1"', '', 0, 0);

							foreach ($query->result_array() as $row){
								$id_prorroga = $row['id_prorroga'];
							}
							$registro = array(					
							'estado'=>'0', 							
							);							
							$query0 = $this->general_model->update('prorroga_ct', 'id_prorroga', $id_prorroga, $registro);
						}
						
							$registro0 = array(					
								'estado'=>'1', 							
							);							
							$query1 = $this->general_model->update('contratos_terceros', 'id_contrato_tercero', $id_contrato, $registro0);
						
						if($query1 == "OK") {
							$registro1 = array(
								'id_contrato_tercero'=>$id_contrato,
								'fecha_ini_pro'=>$this->input->post('fechainicio_p'),
								'fecha_fin_pro'=>$this->input->post('fechafinal_p'),
								'fecha_registro'=>$fecha, 								
								'id_usuario'=>$this->session->userdata('C_id_usuario'), 																
								'estado'=>'1'
							);
							$query2 = $this->general_model->insert('contratos_prorroga', $registro1);
						}
						echo "1";
					}
				}	
				//GUARDAR NOTIFICACIONES
				if($query >= 1) {
					$responsable = explode(",", $val_responsable);  
					$tipo_notificacion=5;
					$id_solicitud = "CT-".$query;
					$id_usuario_notifica = $this->session->userdata('C_id_usuario');
					$id_usuario_notificado= $val_responsable;
					
					$observacion ="Otro Si al Contrato N°: ".$ncontrato." cargado";
					
					if(is_array($responsable)){
						foreach ($responsable as $value) {//ITERA PARA NOTIFICAR A QUIENES REVISAN
						  $usuario2 =	$value;	
							$registro2=array(
								'tipo_notificacion'=>$tipo_notificacion,
								'id_solicitud' =>$id_solicitud,
								'id_usuario_notifica'=>$id_usuario_notifica, 
								'id_usuario_2'=>$usuario2, 
								'observacion'=>$observacion, 
								'estado'=>'0',
								'fecha_registro'=>$fecha				
							);

							$query = $this->general_model->insert('notificaciones', $registro2);
						}
					}else{
				    	//SI SOLO HAY UN RESPONSABLE
				    foreach ((array)$responsable as $value) {
				      $usuario2 =	$value;	
							$registro2=array(
								'tipo_notificacion'=>$tipo_notificacion,
								'id_solicitud' =>$id_solicitud,
								'id_usuario_notifica'=>$id_usuario_notifica, 
								'id_usuario_2'=>$usuario2, 
								'observacion'=>$observacion, 
								'estado'=>'0',
								'fecha_registro'=>$fecha				
							);

							$query = $this->general_model->insert('notificaciones', $registro2);
						}						
					}
					echo '1';	
				} else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} 
		}
	}
	public function cargar_anexos() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$accordion='';

				$campos ='id_anexo AS "Id", nombre_documento AS "Documento", estado AS "Estado"';
      
			    $query = $this->general_model->consulta_personalizada($campos, 'checklist_contratost', 'estado = "1"', '', 0, 0);
			    
			    
			    $accordion .='<div class="card-body pt-1 text-dark-m1 border-l-3 brc-green bgc-green-l5">';

			    foreach ($query->result_array() as $row)
			    {      
			    	$accordion .='<div class="form-group row" id="div_archivo'.$row['Id'].'">
		                          <div class="col-sm-3 col-form-label text-sm-right pr-0">'.
		                            form_label('Archivo '.$row['Documento'],'archivo', array('class'=>'mb-0')).'
		                          </div>
		                          <div class="col-sm-9">'.
		                            form_input(array('type'=>'hidden', 'name'=>'nomarchivo_'.$row['Id'], 'id'=>'nomarchivo_'.$row['Id'], 'value'=>$row['Documento'])).
		                            form_upload(array('type'=>'file', 'name'=>'anexo_'.$row['Id'], 'id'=>'anexo_'.$row['Id'], 'placeholder'=>'Seleccione el Archivo '.$row['Documento'], 'class'=>'form-control ace-file-input col-sm-9 col-md-10','multiple'=>'multiple')).'
		                          </div>
		                          <div class="col-sm-3 col-form-label text-sm-right pr-0">'.
		                            form_label('Fecha inicio vigencia ','fecha_inicio_'.$row['Id'], array('class'=>'mb-0')).'
		                          </div>
		                          <div class="col-sm-3">'.
		                            form_input(array('type'=>'date', 'name'=>'fecha_inicio_'.$row['Id'], 'id'=>'fecha_inicio_'.$row['Id'], 'class'=>'form-control')).'
		                          </div>

		                          <div class="col-sm-3 col-form-label text-sm-right pr-0">'.
		                            form_label('Fecha final vigencia ','fecha_final_'.$row['Id'], array('class'=>'mb-0')).'
		                          </div>
		                          <div class="col-sm-3">'.
		                            form_input(array('type'=>'date', 'name'=>'fecha_final_'.$row['Id'], 'id'=>'fecha_final_'.$row['Id'], 'class'=>'form-control')).'
		                          </div>
			                    ';
			    	$accordion .= '</div>';
			    }
			    $accordion .= '</div>';

			    echo $accordion;				
			}
		}
	}

	public function listar_anexos() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$id_contrato = $this->input->post('id_contrato');

				$campos ='ac.id_anexo AS "Id", ck.nombre_documento AS "Documento", ac.archivo AS "ruta", ac.fecha_ini_vigencia AS "Fechaini", ac.fecha_fin_vigencia AS "Fechafin", ac.estado AS "Estado"';
      
			   $query = $this->general_model->consulta_personalizada($campos, 'checklist_contratost ck LEFT JOIN contratost_anexos ac ON ck.id_anexo = ac.id_checklist_contratot', 'ac.id_contratost ="'.$id_contrato.'"', '', 0, 0);	
				
				$encabezado = array();
				$i = 0;
				$tabla='';
				foreach ($query->result_array() as $row)
				{
					$ancla = '<i class="w-3 text-center fa fa-times text-110 text-danger-m2"></i>';
					if($row['ruta'] != "")
						$ancla = anchor(base_url().'/'.$row['ruta'], '<i class="fa fa-file-pdf"></i>', array('class'=>'btn btn-circle btn-outline-success','style'=>'width: 30px; height: 30px; padding: 2px 1px;font-size: 18px;','target'=>'_blank'));

					$tabla .= '<div class="container">
					<div class="row">'.
		            	form_label($row['Documento'].': ','', array('class'=>'control-label text-left col-sm-10 col-md-7'))
		              	.'<div class="col-sm-1 col-md-2 text-primary"><strong>'.$ancla.'</strong></div>
		         </div></div>';
				}
				
		      	echo $tabla;
			}
		}
	}

	public function cargar_anexosf() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {

				$id_contrato = $this->input->post('id_contrato');
				$accordion='';

				$campos ='ac.id_anexo AS "Id", ck.nombre_documento AS "Documento", ac.archivo AS "ruta", ac.fecha_ini_vigencia AS "Fechaini", ac.fecha_fin_vigencia AS "Fechafin", ac.estado AS "Estado"';
      
			    $query = $this->general_model->consulta_personalizada($campos, 'checklist_contratost ck LEFT JOIN contratost_anexos ac ON ck.id_anexo = ac.id_checklist_contratot', 'ac.id_contratost ="'.$id_contrato.'"', '', 0, 0);			    
			    
			    $accordion .='<div class="card-body pt-1 text-dark-m1 border-l-3 brc-green bgc-green-l5">';

			    foreach ($query->result_array() as $row)
			    {      
			    	$accordion .='<div class="form-group row" id="div_archivo'.$row['Id'].'">
		                          <div class="col-sm-3 col-form-label text-sm-right pr-0">'.
		                            form_label('Archivo '.$row['Documento'],'archivo', array('class'=>'mb-0')).'
		                          </div>
		                          <div class="col-sm-7">'.
		                            form_input(array('type'=>'hidden', 'name'=>'nomarchivo_'.$row['Id'], 'id'=>'nomarchivo_'.$row['Id'], 'value'=>$row['Documento'])).
		                            form_upload(array('type'=>'file', 'name'=>'anexo_'.$row['Id'], 'id'=>'anexo_'.$row['Id'], 'placeholder'=>'Seleccione el Archivo '.$row['Documento'], 'class'=>'form-control ace-file-input col-sm-9 col-md-10')).'
		                          </div>
		                          <div class="col-sm-1">
                   					'.anchor(base_url().$row['ruta'], '<i class="fa fa-file-pdf"></i>', array('class'=>'btn btn-circle btn-outline-danger','style'=>'width: 30px; height: 30px; padding: 2px 1px;font-size: 18px;','target'=>'_blank')).'
                  				  </div>
		                          <div class="col-sm-3 col-form-label text-sm-right pr-0">'.
		                            form_label('Fecha inicio vigencia ','fecha_inicio_'.$row['Id'], array('class'=>'mb-0')).'
		                          </div>
		                          <div class="col-sm-3">'.
		                            form_input(array('type'=>'date', 'name'=>'fecha_inicio_'.$row['Id'], 'id'=>'fecha_inicio_'.$row['Id'], 'class'=>'form-control', 'value'=>$row['Fechaini'])).'
		                          </div>

		                          <div class="col-sm-3 col-form-label text-sm-right pr-0">'.
		                            form_label('Fecha final vigencia ','fecha_final_'.$row['Id'], array('class'=>'mb-0')).'
		                          </div>
		                          <div class="col-sm-3">'.
		                            form_input(array('type'=>'date', 'name'=>'fecha_final_'.$row['Id'], 'id'=>'fecha_final_'.$row['Id'], 'class'=>'form-control', 'value'=>$row['Fechafin'])).'
		                          </div>
			                    ';
			    	$accordion .= '</div>';
			    }
			    $accordion .= '</div>';

			    echo $accordion;				
			}
		}
	}

	public function pdf() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			$this->load->library('Pdffpdf');

	        $pdf = new Pdffpdf('P', 'mm', 'LETTER');
	        $pdf->AliasNbPages();
	        
	        $pdf->hoja = 'LETTER';
	        $pdf->SetTitle("SIGCA - Listado de Contratos con Terceros", true);
	        $pdf->SetLeftMargin(7);
	        $pdf->SetRightMargin(3);
	        
	        $pdf->AddPage('P', 'LETTER');
            
            $pdf->Ln(10);
            $pdf->SetFont('helvetica','B',14);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(0,0,utf8_decode('LISTADO GENERAL DE CONTRATOS CON TERCEROS'), 0, 0, 'C', false);
            $pdf->Ln(10);

            $pdf->SetFont('helvetica','B',6);
            $pdf->Cell(195,5,utf8_decode('Fecha de Impresión: ').cargar_fechahora_formateada(),0,0,'R',false);
            $pdf->Cell(7,5,' ', 0, 0, 'C', false);
            $pdf->Ln(5);

            $campos =' ct.id_contrato_tercero AS "id", CASE WHEN te.tipo_tercero="0" THEN "Proveedor" ELSE "Cliente" END AS "Tipotercero", te.razon_social AS "tercero", CASE WHEN ct.area="0" THEN "Asistencial" ELSE "Administrativa" END AS "Area", ct.concepto AS "Concepto", ct.objeto_contrato AS "Objeto", ct.fecha_inicio AS "FechaInicio", ct.fecha_final AS "FechaFinal", CASE WHEN ct.prorroga="0" THEN "No" ELSE "Si" END AS "Prorroga", CASE WHEN c.estado="0" THEN "Vigente" WHEN c.estado="1" THEN "Terminado" ELSE "Prorogado" END AS "Estado" ';
            $query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros ct INNER JOIN terceros te ON ct.id_tercero = te.id_tercero', '', '', 0, 0);

            $encabezados = $query->result();
			
			$x = 1;
			$fill = true;
			$pdf->SetFont('helvetica','B', 10);
			$pdf->SetFillColor(200,220,255);
			$pdf->Cell(4,5,' ',0,0,'C',false);
			$pdf->Cell(15,5,utf8_decode("ID"),'LTRB',0,'C',$fill);
			$pdf->Cell(25,5,utf8_decode("TIPO TERCERO"),'LTRB',0,'C',$fill);
			$pdf->Cell(80,5,utf8_decode("RAZON SOCIAL"),'LTRB',0,'C',$fill);
			$pdf->Cell(25,5,utf8_decode("AREA"),'LTRB',0,'C',$fill);
			$pdf->Cell(100,5,utf8_decode("CONCEPTO"),'LTRB',0,'C',$fill);
			$pdf->Cell(100,5,utf8_decode("OBJETO"),'LTRB',0,'C',$fill);
			$pdf->Cell(15,5,utf8_decode("FECHA INICIO"),'LTRB',0,'C',$fill);
			$pdf->Cell(15,5,utf8_decode("FECHA FINAL"),'LTRB',0,'C',$fill);
			$pdf->Cell(15,5,utf8_decode("PRORROGA"),'LTRB',0,'C',$fill);
			$pdf->Cell(15,5,utf8_decode("ESTADO"),'LTRB',0,'C',$fill);
			$pdf->Cell(4,5,' ',0,0,'C',false);
			$pdf->Ln(5);
			$fill = false;
			$pdf->SetFont('helvetica','', 10);
			$pdf->SetFillColor(255,180,180);
	        foreach ($encabezados as $row) {
	        	$pdf->Cell(4,5,' ',0,0,'C',false);
                $pdf->Cell(15,5,($row->id),'LTRB',0,'C',$fill);
                $pdf->Cell(25,5,utf8_decode($row->Tipotercero),'LTRB',0,'C',$fill);
                $pdf->Cell(80,5,utf8_decode($row->tercero),'LTRB',0,'C',$fill);
                $pdf->Cell(25,5,utf8_decode($row->Area),'LTRB',0,'C',$fill);     
                $pdf->Cell(100,5,utf8_decode($row->Concepto),'LTRB',0,'C',$fill);      
                $pdf->Cell(100,5,utf8_decode($row->Objeto),'LTRB',0,'C',$fill);                      
                $pdf->Cell(15,5,utf8_decode($row->FechaInicio),'LTRB',0,'C',$fill);
                $pdf->Cell(15,5,utf8_decode($row->FechaFinal),'LTRB',0,'C',$fill);
                $pdf->Cell(15,5,utf8_decode($row->Prorroga),'LTRB',0,'C',$fill);
                if($row->Estado == "Activo")
                	$pdf->Cell(15,5,$row->Estado,'LTRB',0,'C',$fill);
                else
                	$pdf->Cell(15,5,$row->Estado,'LTRB',0,'C',!$fill);
                $pdf->Cell(4,5,' ',0,0,'C',false);

	            $pdf->Ln(5);
	        }
	    
	        $pdf->Output('I', "Listado_Contratos_Terceros.pdf");
		}//-Valida Inicio de Session
	}

	public function consulta_listarestrictiva() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			$this->load->library('Pdffpdf');

	        $pdf = new Pdffpdf('P', 'mm', 'LETTER');
	        $pdf->AliasNbPages();
	        
	        $pdf->hoja = 'LETTER';
	        $pdf->SetTitle("SIGCA - Consulta Lista Restrictiva", true);
	        $pdf->SetLeftMargin(7);
	        $pdf->SetRightMargin(3);
	        
	        $pdf->AddPage('P', 'LETTER');
            
            $pdf->Ln(10);
            $pdf->SetFont('helvetica','B',14);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(0,0,utf8_decode('LISTA RESTRICTIVA'), 0, 0, 'C', false);
            $pdf->Ln(10);

            $pdf->SetFont('helvetica','B',6);
            $pdf->Cell(195,5,utf8_decode('Fecha de Impresión: ').cargar_fechahora_formateada(),0,0,'R',false);
            $pdf->Cell(7,5,' ', 0, 0, 'C', false);
            $pdf->Ln(5);

            $campos ='ct.id_contrato_tercero AS "id", te.numero_id AS "NIT", CASE WHEN te.tipo_tercero="0" THEN "Proveedor" ELSE "Cliente" END AS "Tipotercero", te.razon_social AS "tercero"';
            $query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros ct INNER JOIN terceros te ON ct.id_tercero = te.id_tercero LEFT JOIN contratost_anexos ca ON ca.id_contratost=ct.id_contrato_tercero', 'ca.id_checklist_contratot!=10 GROUP BY te.numero_id', '', 0, 0);

            $encabezados = $query->result();
			
			$x = 1;
			$fill = true;
			$pdf->SetFont('helvetica','B', 10);
			$pdf->SetFillColor(200,220,255);
			$pdf->Cell(18,5,' ',0,0,'C',false);
			$pdf->Cell(15,5,utf8_decode("ID"),'LTRB',0,'C',$fill);
			$pdf->Cell(30,5,utf8_decode("NIT"),'LTRB',0,'C',$fill);
			$pdf->Cell(30,5,utf8_decode("TIPO TERCERO"),'LTRB',0,'C',$fill);
			$pdf->Cell(80,5,utf8_decode("RAZON SOCIAL"),'LTRB',0,'C',$fill);
			$pdf->Cell(4,5,' ',0,0,'C',false);
			$pdf->Ln(5);
			$fill = false;
			$pdf->SetFont('helvetica','', 10);
			$pdf->SetFillColor(255,180,180);
	        foreach ($encabezados as $row) {
	        	$pdf->Cell(18,5,' ',0,0,'C',false);
                $pdf->Cell(15,5,($row->id),'LTRB',0,'C',$fill);
                $pdf->Cell(30,5,($row->NIT),'LTRB',0,'C',$fill);
                $pdf->Cell(30,5,utf8_decode($row->Tipotercero),'LTRB',0,'C',$fill);
                $pdf->Cell(80,5,utf8_decode($row->tercero),'LTRB',0,'C',$fill);                
                $pdf->Cell(4,5,' ',0,0,'C',false);

	            $pdf->Ln(5);
	        }
	    
	        $pdf->Output('I', "Lista Restrictiva.pdf");
		}//-Valida Inicio de Session
	}

	public function excel() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			$filename = "Listado_Documentos.xls";
		    header ("Content-Disposition: attachment; filename=".$filename ); 
			header ("Content-Type: application/vnd.ms-excel");
			
			$this->load->helper('funciones_tabla');
			
		    echo utf8_decode('<table border="1"><tr><th colspan="7">LISTADO GENERAL CONTRATOS</th></tr></table><br>');

		    echo '<table border="1">';
            echo utf8_decode(listar_contratost_tabla('EXCEL')); 
            echo '</table>';			
		}//-Valida Inicio de Session
	}

	public function inactivar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			}
			else {
				$registro=array('estado'=>'3');
				$query = $this->general_model->update('contratos_terceros', 'id_contrato_tercero', $this->input->post('idreg'), $registro);
				if($query=="OK")
					echo '1';
				else {
					echo '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} //-Valida Envio por ajax
		}//-Valida Inicio de Session
	}


	public function actualizar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				
				$nit = $this->input->post('nit');
				$ncontrato = $this->input->post('ncontrato');
				$fecha = date('Y-m-d H:i:s');

				//AREA
				$areas = $this->input->post('areas');
				$val_area = implode(',', (array) $areas);

				//LINEA DE COSTOS
				$lineacostos_contratost = $this->input->post('lineacostos_contratost');
				$val_costo = implode(',', (array) $lineacostos_contratost);
				
				//OBJETO
				$concepto_contratost = $this->input->post('concepto_contratost');
				$val_concepto = implode(',', (array) $concepto_contratost);

				//RESPONSABLE
				$empleados_contratost = $this->input->post('empleados_contratost');
				$val_responsable = implode(',', (array) $empleados_contratost);

				$registro=array(					
					'numeroint'=>$this->input->post('numeroint'),		
					'n_contrato'=>$ncontrato,			
					'id_tercero'=>$this->input->post('idtercero'), 
					'areas'=>$val_area, 
					'linea_costo'=>$val_costo,
					'concepto'=>$val_concepto,
					'objeto_contrato'=>$this->input->post('objeto'),  
					'fecha_inicio'=>$this->input->post('fechainicio'), 
					'fecha_final'=>$this->input->post('fechafinal'), 
					'prorroga'=>$this->input->post('prorroga'),
					'cobro'=>$this->input->post('cobro'), 
					'valor_contrato'=>$this->input->post('valor'),
					'responsable'=>$val_responsable,
					'observaciones'=>$this->input->post('observaciones'),
					'maneja_tarifa'=>$this->input->post('maneja_tarifa'),
					'keralty'=>$this->input->post('keralty'),
					'clausula_sarlaft'=>$this->input->post('sarlaft'),
					'fecha_registro'=>$fecha, 
					'id_usuario'=>$this->session->userdata('C_id_usuario'), 
					'estado'=>$this->input->post('estado')
				);
				
				$query = $this->general_model->update('contratos_terceros', 'id_contrato_tercero', $this->input->post('idregistro'), $registro);
				if($query=="OK") {
					// if()
					$contrato = $ncontrato;
					// *************** SECCION PARA EL CARGUE DE ANEXOS *****************************************
					if (!file_exists('contratos_terceros/')) {
				 		mkdir('contratos_terceros/', 0777, true);
				 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/')) {
					 		mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/', 0777, true);
					 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
					 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true);
					 			if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) {
					 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
					 			}
					 		}
					 	}

				 	} elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
					 	mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true); 
					 	if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) 
					 	{
				 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
				 		}	
				 	}elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/')) 
					{
				 		mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/', 0777, true);
				 	}

					$ruta = 'contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$contrato.'/'; 
							
				
					//$this->session->set_userdata('archivo_origen',"");
					$mensage = '';
					//echo var_dump($_FILES);
					foreach ($_FILES as $key1 => $key) //Iteramos el arreglo de archivos
					{
						//echo ($key1);
						if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
						{
							$id_check_contrato = explode('_',$key1); //Nombre del input file

							$NombreOriginal = $key['name'];//Obtenemos el nombre original del archivo
							//$tipo = $key['type'];

							$foo = explode(".",$key['name']);
							$bar = count($foo);
							$ext = ($bar > 0)? $foo[$bar - 1]:'';
							$nombre_img = date("YmdHis").'-'.$NombreOriginal;
							$nombre = $this->session->userdata('C_id_usuario').'-T-'.$nombre_img;

							$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
							$Destino = $ruta.$nombre;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
						
							move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada	

							$mensage .= 'cargado'; 	

							$registro1 = array(					
								'id_contratost'=>$query, 
								'archivo'=>$Destino, 
								'id_checklist_contratot'=>$id_check_contrato[1], 
								'fecha_ini_vigencia'=>$this->input->post('fecha_inicio_'.$id_check_contrato[1]),
								'fecha_fin_vigencia'=>$this->input->post('fecha_final_'.$id_check_contrato[1]),
								'fecha_registro'=>$fecha, 
								'id_usuaio'=>$this->session->userdata('C_id_usuario'), 
								'estado'=>1
							);
							//echo print_r($registro1);
							$query1 = $this->general_model->insert('contratost_anexos', $registro1);
						}
					 
						if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
						{
							$mensage .= '-'.$key['error'].'-'; 
						}
						//echo $mensage;
					}
					echo "1";					
				}				
				else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} //-Valida Envio por ajax
		}//-Valida Inicio de Session
	}

	public function cargar_tercero() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			header('Content-Type: application/json');
			$id = $this->input->post('terce');
			
			$query=$this->general_model->select_where('id_tercero AS "Id", razon_social AS "Razon"', 'terceros', array('numero_id' => $id));
			$row = $query->row_array();
				
			$arr['terceros'] = array('id_tercero'=>$row['Id'], 'razon'=>$row['Razon']);
			echo json_encode($arr);
		}
	}

	public function guardar_tercero() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				$registro=array(
					
					'tipo_tercero'=>$this->input->post('tipo_tercero'),
					'tipo_documento'=>$this->input->post('Tipo_docidentidad_terceros'), 
					'numero_id'=>$this->input->post('numeroid'),
					'razon_social'=>$this->input->post('razonsocial'),
					'nombre_contacto'=>$this->input->post('nombre_contacto'), 
					'telefono_contacto'=>$this->input->post('telefono_contacto'),
					'correo_contacto'=>$this->input->post('correo_contacto'),
					'sigla'=>$this->input->post('sigla'), 
					'proveedor_critico'=>$this->input->post('proveedor_critico'),
					'fecha_registro'=>date('Y-m-d H:i:s'), 
					'id_usuario'=>$this->session->userdata('C_id_usuario'), 
					'estado'=>'1'
				);

				$query = $this->general_model->insert('terceros', $registro);

				if($query >= 1){
					echo '1';
				}else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} 
		}
	}

	public function ver_registro() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				
				$idreg = $this->input->post('idreg');

				$campos ='  ct.id_contrato_tercero AS "id", CASE WHEN te.tipo_tercero="0" THEN "Proveedor" ELSE "Cliente" END AS "Tipotercero", te.razon_social AS "tercero", CASE WHEN ct.areas="0" THEN "Asistencial" WHEN ct.areas="1" THEN "Administrativa" WHEN ct.areas="0,1" THEN "Asistencial, Administrativa" WHEN ct.areas="1,0" THEN "Asistencial, Administrativa" END AS "Area", ct.objeto_contrato AS Objeto, ct.fecha_inicio AS "FechaInicio", ct.fecha_final AS "FechaFinal", CASE WHEN ct.prorroga="0" THEN "No" ELSE "Si" END AS "Prorroga", ct.valor_contrato AS "Valor Contrato", CASE WHEN ct.estado="0" THEN "Vigente" WHEN ct.estado="1" THEN "Terminado" WHEN ct.estado="3" THEN "Inactivo" ELSE "Prorogado" END AS "Estado" ';
            	$query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros ct INNER JOIN terceros te ON ct.id_tercero = te.id_tercero', ' ct.id_contrato_tercero = "'.$idreg.'"', '', 0, 0);
 
		      	//echo $this->db->last_query();
				$encabezado = array();
				$i = 0;
				foreach ($query->list_fields() as $campo)
				{
					$encabezado[$i] = $campo;
					$i++;
				}
				
				$tabla = '';
				$row = $query->row_array();

				$objeto = '';
				$query1 = $this->general_model->consulta_personalizada('nombre', 'conceptos', ' estado = "1" AND id_concepto IN ('.$row['Objeto'].') ', 'nombre', 0, 0);
				foreach ($query1->result_array() as $row1)
				{
					if($objeto != '')
						$objeto .= ', ';
					$objeto .= $row1['nombre'];
				}
				$row['Objeto'] = $objeto;

				for($k=0; $k<$i; $k++) {
					$tabla .= '
					<div class="row">'.
		            	form_label($encabezado[$k].': ','', array('class'=>'control-label text-right col-md-4'))
		              	.'<div class="col-md-8 text-primary"><strong>'.$row[$encabezado[$k]].'</strong></div>
		            </div>';
				}

				$tabla .= '<hr>'; ////////////////////////////////////////////////////

				$campos =' cc.nombre_documento, IFNULL(ca.archivo,"") AS "<i class=ti-files></i>" ';
            	$query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros c LEFT JOIN contratost_anexos ca ON c.id_contrato_tercero  = ca.id_contratost INNER JOIN checklist_contratost cc ON ca.id_checklist_contratot =cc.id_anexo  ', ' c.id_contrato_tercero = "'.$idreg.'" ', 'ca.id_anexo', 0, 0);
		      
				$encabezado = array();
				$i = 0;
				foreach ($query->result_array() as $row)
				{
					$ancla = '<i class="w-3 text-center fa fa-times text-110 text-danger-m2"></i>';
					if($row['<i class=ti-files></i>'] != "")
						$ancla = anchor(base_url().'/'.$row['<i class=ti-files></i>'], '<i class="ti-printer"></i>', array('class'=>'btn btn-circle btn-outline-success','style'=>'width: 30px; height: 30px; padding: 2px 1px;font-size: 18px;','target'=>'_blank'));

					$tabla .= '
					<div class="row">'.
		            	form_label($row['nombre_documento'].': ','', array('class'=>'control-label text-right col-md-10'))
		              	.'<div class="col-md-2 text-primary"><strong>'.$ancla.'</strong></div>
		            </div>';
				}

		      	echo $tabla;
			}
		}
	}

	//**************************** PERSONAL CONTRATADO ******************************************************

	public function cargar_personal_contratado() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				$campos = ' ctp.id_contratot_personal AS "..",  ctp.id_contrato_tercero  AS "ID", td.nombre AS "TIPO DOC.", ctp.nombres_apellidos AS "NOMBRES", ctp.cargo AS "CARGO", ctp.arl AS "ARL", e.nombre AS "EPS", ctp.correo AS "EMAIL", ctp.telefono AS "TELÉFONO" ';
      
			    $query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros_personal ctp INNER JOIN tipo_docidentidad td ON ctp.id_tipdocidentidad = td.Id_tipdocIdentidad LEFT JOIN eps e ON ctp.id_eps = e.id_eps', ' ctp.id_usuario_temp = "'.$this->session->userdata('C_id_usuario').'" ', 'ctp.id_contratot_personal', 0, 0);
			    
			    $tabla = '<thead class="sticky-nav text-secondary-m1 text-uppercase text-85"><tr>';
			    foreach ($query->list_fields() as $campo)
			    {
			    	$tabla .= '<th>'.($campo).'</th>';
			    }
			    $tabla .= '</tr></thead><tbody class="pos-rel">';

			    foreach ($query->result_array() as $row)
			    {
			    	$boton = ''; 
			    	$acciones='<select name="botones_'.$row['..'].'" id="botones_'.$row['..'].'" class="form-control" >
			    				<option value="0">--</option>
			    				<option value="2">Editar</option>
			    				<option value="2">Eliminar</option></select>
			    				'; 

			      	$tabla .= '<tr class="d-style bgc-h-default-l4"><td>'.$boton.'</td><td>'.$row['ID'].'</td><td>'.$row['TIPO DOC.'].'</td><td>'.$row['NOMBRES'].'</td><td>'.$row['CARGO'].'</td> <td>'.$acciones.'</td><</tr>';
			    }
			    $tabla .= '</tbody>';   
			    
			    echo $tabla;
			}
		}
	}

	public function cargar_personal_contratadof() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				$id_contrato = $this->input->post('id_contrato'); 
				$campos = ' ctp.id_contratot_personal AS "..",  ctp.id_contrato_tercero  AS "ID", ctp.doc_identidad AS "CEDULA", ctp.nombres_apellidos AS "NOMBRES", ctp.cargo AS "CARGO","" AS "Acción"';
      
			    $query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros_personal ctp INNER JOIN tipo_docidentidad td ON ctp.id_tipdocidentidad = td.Id_tipdocIdentidad LEFT JOIN eps e ON ctp.id_eps = e.id_eps', ' ctp.id_contrato_tercero = "'.$id_contrato.'" ', '', 0, 0);
			    
			    $tabla = '<thead class="sticky-nav text-secondary-m1 text-uppercase text-85"><tr>';
			    foreach ($query->list_fields() as $campo)
			    {
			    	$tabla .= '<th>'.($campo).'</th>';
			    }
			    $tabla .= '</tr></thead><tbody class="pos-rel">';

			    foreach ($query->result_array() as $row)
			    {
			    	$boton = ''; 
			    	$acciones='<div class="action-buttons">
          <a href="#" class="text-blue mx-1" data-toggle="tooltip" data-original-title="Editar" aria-describedby="tooltip'.$row['..'].'" id="btneditarP_'.$row['..'].'"> <i  id="btneditarP_'.$row['..'].'" class="fa fa-pencil-alt text-105"><input type="hidden" id="nombreP_'.$row['..'].'" name="nombreP_'.$row['..'].'" value="'.$row['NOMBRES'].'" /> </i> </a> 

          <a href="#" class="text-danger-m1 mx-1" data-toggle="tooltip" data-original-title="Inactivar" id="btninactivarP_'.$row['..'].'"> <i id="btninactivarP_'.$row['..'].'" class="fa fa-trash-alt text-105"></i> </a>

          <a href="#" class="text-blue mx-1" data-toggle="tooltip" data-original-title="Ver Registro" aria-describedby="tooltip'.$row['..'].'" id="btndetalleP_'.$row['..'].'"> <i  id="btndetalleP_'.$row['..'].'" class="fa fa-search-plus text-105"></i> </a> 
          </div>';

			      	$tabla .= '<tr class="d-style bgc-h-default-12"><td>'.$boton.'</td><td>'.$row['ID'].'</td><td>'.$row['CEDULA'].'</td><td>'.$row['NOMBRES'].'</td><td>'.$row['CARGO'].'</td><td>'.$acciones.'</td></tr>';
			    }
			    $tabla .= '</tbody>';   
			    
			    echo $tabla;
			}
		}
	}

	public function guardar_personal_contratado() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				$nit = $this->input->post('nittercero');

				$personac = $this->input->post('cedula');
				$archivo_1 ="";
				$archivo_2 ="";
				$archivo_3 ="";
				$archivo_4 ="";
				$archivo_5 ="";
				$archivo_6 ="";
				$archivo_7 ="";

				$registro=array(					
					'id_contrato_tercero'=>$this->session->userdata('C_id_usuario'), 
					'id_tipdocidentidad'=>$this->input->post('Tipo_docidentidad_empleados'), 
					'doc_identidad'=>$this->input->post('cedula'), 
					'nombres_apellidos'=>$this->input->post('nombres'),
					'cargo'=>$this->input->post('cargo'), 
					'correo'=>$this->input->post('email'), 
					'telefono'=>$this->input->post('telefono'), 
					'arl'=>$this->input->post('arl_empleados'), 
					'id_eps'=>$this->input->post('eps_empleados'),
					'fecha_registro'=>date('Y-m-d H:i:s'), 
					'id_usuario'=>$this->session->userdata('C_id_usuario'), 
					'id_usuario_temp'=>$this->session->userdata('C_id_usuario'), 
					'estado'=>'1'
				);
				//echo var_dump($registro);

				$query = $this->general_model->insert('contratos_terceros_personal', $registro);
				echo '1';
				if($query >= 1) {

					// *************** SECCION PARA EL CARGUE DE ANEXOS PERSONAL CONTRATADO ************************
					if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/')) {
				 		mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/', 0777, true);
				 		if (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$personac.'/')) {
				 			mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$personac.'/', 0777, true);
				 		}
					 	
				 	}elseif (!file_exists('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$personac.'/')) {
					 	mkdir('contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$personac.'/', 0777, true);					 		
				 	}

					$ruta = './contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$personac.'/';
					$rutag = 'contratos_terceros/'.$this->session->userdata('C_basedatos').'/'.$nit.'/'.$personac.'/'; 
							
					$config = [
						"upload_path" => $ruta,
						"allowed_types" => "*"
					];
				
					// $this->load->library("upload",$config);					
						
					$this->load->library("upload",$config);

					if ($this->upload->do_upload('archivo1')){
						$data1 = array('upload_data' => $this->upload->data());
						$archivo_1 = $rutag.$data1['upload_data']['file_name'];
						
					}
					
					if($this->upload->do_upload('archivo_2')){
						$data2 = array('upload_data' => $this->upload->data());
						$archivo_2 = $rutag.$data2['upload_data']['file_name'];
					}			
					
					if($this->upload->do_upload('archivo_3')){
						$data3 = array('upload_data' => $this->upload->data());
						$archivo_3 = $rutag.$data3['upload_data']['file_name'];
					}
									
					if($this->upload->do_upload('archivo_4')){
						$data = array('upload_data' => $this->upload->data());
						$archivo_4 = $rutag.$data['upload_data']['file_name'];
					}
										
					if($this->upload->do_upload('archivo_5')){
						$data = array('upload_data' => $this->upload->data());
						$archivo_5 = $rutag.$data['upload_data']['file_name'];
					}
					
					if($this->upload->do_upload('archivo_6')){
						$data = array('upload_data' => $this->upload->data());
						$archivo_6 = $rutag.$data['upload_data']['file_name'];
					}
										
					if($this->upload->do_upload('archivo_7')){
						$data = array('upload_data' => $this->upload->data());
						$archivo_7 = $rutag.$data['upload_data']['file_name'];
					}
												
					

					$registro1=array(
						'id_contratot_personal'=>$this->session->userdata('C_id_usuario'), 
						'cedula_personal'=>$personac,
						'contrato_firmado'=>$archivo_1, 
						'hoja_de_vida'=>$archivo_2,
						'cedula'=>$archivo_3, 
						'carnet_vacuna'=>$archivo_4,
						'cert_altura'=>$archivo_5, 
						'cert_eps'=>$archivo_6,
						'cert_arl'=>$archivo_7,
						'id_usuario_temp'=>$this->session->userdata('C_id_usuario'),							
					);
					$query = $this->general_model->insert('c_tercero_anexos_personal', $registro1);
					// echo 'archivo 1'.$archivo_1;
					// echo 'archivo 2'.$archivo_2;
					echo '1';
				} else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} 
		}
	}

	public function eliminar_personal_contratado() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";

				$registro=array(					
					'id_contratot_personal'=>$this->input->post('idreg')
				);			
				$query = $this->general_model->delete('contratos_terceros_personal', $registro);
			} 
		}
	}
// GENERANDO EL CONSECUTIVO DE CONTRATO
	// public function consecutivo() {
	// 	if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
	// 		redirect(base_url());
	// 	} else {
	// 		if(!$this->input->is_ajax_request()) {
	// 			redirect(base_url());
	// 		} else {

	// 			$concepto = '';
 //      			$query1 = $CI->general_model->consulta_personalizada('prefijo', 'conceptos_contratost', ' estado = "1" AND id_concepto IN ('.$cons') ', 'prefijo', 0, 0);
	// 			      foreach ($query1->result_array() as $row1)
	// 			      {
	// 			        if($concepto != '')
	// 			          	$concepto .= '-';
	// 			        $concepto .= $row1['prefijo'];
	// 			      }
	// 			if($this->input->post('numeroin')!=""){
	// 				$numeroin = $this->input->post('numeroin');
	// 				$campos =' (COUNT(*) + 1) AS "total" ';
	// 	    		$query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros', 'concepto="'.$cons.'" AND numeroint = "'.$numeroin.'"', '', 0, 0);
	// 				$row = $query->row_array();
	// 				if($row['total'] < 10)
	// 					echo "00".$row['total'];
	// 				elseif($row['total'] >=10 && $row['total'] < 100)
	// 					echo "0".$row['total'];
	// 				else
	// 					echo $row['total'];
	// 			}else{ 
				
	// 			$campos =' (COUNT(*) + 1) AS "total" ';
	// 	    	$query = $this->general_model->consulta_personalizada($campos, 'contratos_terceros', 'concepto ="'.$cons.'"', '', 0, 0);
	// 			$row = $query->row_array();
	// 			if($row['total'] < 10)
	// 				echo "00".$row['total'];
	// 			elseif($row['total'] >=10 && $row['total'] < 100)
	// 				echo "0".$row['total'];
	// 			else
	// 				echo $row['total'];
	// 			}
	// 		} //-Valida Envio por ajax
	// 	}//-Valida Inicio de Session
	// }

}