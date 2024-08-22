<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_resultadosDx extends CI_Controller {
	
	//Constructor de la clase
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');

		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="") {
			redirect(base_url());			
		} else {
			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');
		}
	}


	public function listar_tabla() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$usuario=$this->session->userdata('C_id_usuario');
				$this->load->helper('funciones_tabla');
				echo listar_resultadosDx_tabla('WEB',$usuario);
			}
		}
	}

	public function index() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect();			
		} else {
			$this->session->set_userdata('archivo_origen','');
			// $this->session->set_userdata('archivo_visual','');
			$this->session->set_userdata('archivo_origen_tipo','');
			// $this->session->set_userdata('archivo_visual_tipo','');

			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			$data_usua['titulo']="Resultado de Apoyo Diagnostico";
			$data_usua['origen']="Registros";
			$data_usua['contenido']='resultadosDx/index';
			$data_usua['entrada_js']='_js/resultadosDx.js';
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
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="") {
			redirect();			 
		} else {

			$this->session->set_userdata('archivo_origen','');
			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			$data_usua['titulo']="Resultados Diagnosticos";
			$data_usua['origen']="Registros";
			$data_usua['contenido']='resultadosDx/nuevo';
			$data_usua['entrada_js']='_js/resultadosDx.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'">			
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'">

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/select2@4.1.0-rc.0/select2.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('plugins/chosen-js@1.8.7/chosen.min.css').'">
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/combine/npm/tiny-date-picker@3.2.8/tiny-date-picker.min.css,npm/tiny-date-picker@3.2.8/date-range-picker.min.css">

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/css/bootstrap-datetimepicker.min.css">
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
		    <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.11/dist/jquery.knob.min.js"></script>';

			$this->load->view('template',$data_usua);
		}
	}


	public function guardar_paciente() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" )
			redirect(base_url());
		else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				//echo "ingreso";
				$registro=array(

					'id_tipodocumento'=>$this->input->post('Tipo_docidentidad_pacientes'),
					'numero_id'=>$this->input->post('cedula'),
					'nombres'=>$this->input->post('nombres'),
					'apellidos'=>$this->input->post('apellidos'),
					'edad'=> null,
					'fecha_nacimiento'=>  null,
					'id_entidad_salud'=>$this->input->post('eps_pacientes'),
					'otra_entidad_salud'=>$this->input->post('otra_eps'),
					'telefono'=>null,
					'correo'=>$this->input->post('correo'),
					'fecha_registro'=>date('Y-m-d H:i:s'),
					'id_usuario'=>$this->session->userdata('C_id_usuario'),
					'estado'=>'1'
				);

				$query = $this->general_model->insert('pacientes', $registro);
				if($query >= 1)
					echo '1';
				else {
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

	public function modificar_paciente() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			header('Content-Type: application/json');
			$id = $this->input->post('idreg');
			
			//$sql="SELECT nombre, id_responsable, estado  FROM centroscostos WHERE id_centrocosto = '$id' ";
			$query=$this->general_model->select_where('id_paciente, id_tipodocumento, numero_id, nombres, apellidos, fecha_nacimiento, id_entidad_salud, otra_entidad_salud, telefono, correo, estado', 'pacientes', array('id_paciente' => $id));
			$row = $query->row_array();
				
			$arr['pacientes'] = array('id_paciente'=>$row['id_paciente'], 'id_tipodocumento'=>$row['id_tipodocumento'], 'numero_id'=>$row['numero_id'],'nombres'=>$row['nombres'],'apellidos'=>$row['apellidos'], 'fecha_nacimiento'=>$row['fecha_nacimiento'], 'id_entidad_salud'=>$row['id_entidad_salud'], 'otra_entidad_salud'=>$row['otra_entidad_salud'], 'telefono'=>$row['telefono'], 'correo'=>$row['correo'],  'estado'=>$row['estado']);
			echo json_encode( $arr );
		}
	}

	public function actualizar_paciente() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect();
		}else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			}else {
				//echo "ingreso";
				$id=$this->input->post('idregistropa');

				$registro=array(

					'id_tipodocumento'=>$this->input->post('Tipo_docidentidad_pacientes'),
					'numero_id'=>$this->input->post('cedula'), 
					'nombres'=>$this->input->post('nombres'), 
					'apellidos'=>$this->input->post('apellidos'),					
					'id_entidad_salud'=>$this->input->post('eps_pacientes'),
					'otra_entidad_salud'=>$this->input->post('otra_eps'),								
					'correo'=>$this->input->post('correo'),					
					'estado'=>$this->input->post('estado')
				);
				
				$query = $this->general_model->update('pacientes', 'id_paciente', $id, $registro);
				if($query=="OK")
					echo '1';
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


	public function cargar_paciente() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" )
			redirect(base_url());
		else {
			header('Content-Type: application/json');
			$id = $this->input->post('paci');

			$query=$this->general_model->select_where('p.id_paciente AS "Id",IFNULL(CONCAT(p.nombres, " ", p.apellidos),"") AS "Paciente", p.correo AS "Correo"', 'pacientes p', array('p.numero_id' => $id) );
			$row = $query->row_array();

			$arr['pacientes'] = array('id_paciente'=>$row['Id'], 'paciente'=>$row['Paciente'], 'correo' => $row['Correo']);
			echo json_encode( $arr );
		}
	}

	public function guardar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";

				// Areas o Servicios //
				$areas = $this->input->post('examenes_resultados');
				$nombre_paciente = $this->input->post('paciente');
				$correo = $this->input->post('correopaciente');

				$servicio = "";
				switch($areas) {
					case "1": $servicio = "Audiología"; break;
					case "2": $servicio = " Espirometría"; break;
					case "3": $servicio = " Electrocardiograma"; break;
					case "4": $servicio = " Electrodiagnóstico"; break;
				}
				
				//ESTABLECER LA RUTA DONDE SE VA A GUARDAR EL ARCHIVO
				
				$dir = $this->input->post('cedula');
				$filename= '';
				$filename_send= '';

			 	if (!file_exists('archivos/'.$this->session->userdata('C_basedatos'))) {
			 		mkdir('archivos/'.$this->session->userdata('C_basedatos'), 0777, true);
			 		if (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/')) {
				 		mkdir('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/', 0777, true);
				 		if (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/'.$dir.'/')) {
					 		mkdir('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/'.$dir.'/', 0777, true);
					 	}
				 	}
			 	} elseif (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/')) {
				 	mkdir('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/', 0777, true);
			 	}elseif (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/'.$dir.'/')) {
					mkdir('archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/'.$dir.'/', 0777, true);
			 	}

				$ruta = './archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/'.$dir.'/';  
				$rutag ='archivos/'.$this->session->userdata('C_basedatos').'/resultadosdx/'.$dir.'/';

				$config = [
					"upload_path" => $ruta,
					"allowed_types" => "*"
				];


				$this->load->library("upload",$config);
				if ($this->upload->do_upload('archivov')){
					$data = array('upload_data' => $this->upload->data());
					$filename = $rutag.$data['upload_data']['file_name'];
					$filename_send = $ruta.$data['upload_data']['file_name'];
				}else{
					//echo $this->upload->display_errors($ruta);
					$filename ="";
					$filename_send ="";
				}

				$fecha = date('Y-m-d H:i:s');

				$registro=array(
					
					'id_paciente'=>$this->input->post('idpaciente'), 
					'id_examen'=>$this->input->post('examenes_resultados'), 
					'resultado'=>$filename, 						
					'fecha_examen'=>$this->input->post('txtfechaE'), 						
					'fecha_registro'=>$fecha, 
					'estado'=>'0'
				);				

				$query = $this->general_model->insert('resultados_dx', $registro);

				if($query >= 1){ 

					$email = "edwincas_17@hotmail.com";

					$from =  "castonino17@gmail.com";

					$subject = "Resultados del Examen de ".$servicio ." del dia ".$fecha."";

					$message = "<div><font size='3'>Señor(a),</font></div>\r\n";	
					$message .= "<div><font size='3'><b>".$nombre_paciente."</b>,</font></div>\r\n";	
					$message .= "<br>\r\n";
					$message .= "<br>\r\n";
					$message .= "<div><font size='3'>Cordial saludo,</font></div>\r\n";
					$message .= "<br>\r\n";
					$message .= "<br>\r\n";
					$message .= "<div><font size='3'>Adjuntamos al presente los resultados de los examenes de ".$servicio.".</font></div>\r\n";
					$message .= "<br>\r\n";		
				    $message .= "<br>\r\n";				  
				    $message .= "<br>\r\n";					    
				    $message .= "<div><font size='3'><b>Elsa Gomez</b> </font></div>\r\n";
				    $message .= "<div><font size='3'>Ayudas Diagnosticas CECIMIN S.A.S.</font></div>\r\n";
				    $message .= "<div><font size='3'>Avenida Carrera 45 #104-76 piso 3</font></div>\r\n";
				    $message .= "<div><font size='3'>Tel.: 6196253/ 6002555 EXT 158/109</font></div>\r\n";
				    $message .= "<div><img style='display:flex;margin-left:5; width:180px'  src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/></div>\r\n";	
					$message .= "\r\n";


					$msg = $this->sendEmail($email,$from,$subject,$message,$filename_send);
					if($msg=1){
						$query = $query;
					}else{ 
						$query =-999;						
					}
				}	
					
				if($query >= 1){
					echo "1";
				}else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						case "-999": echo "Error:".$msg."; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}

			}
		}
	}


	public function sendEmail($email,$from,$subject,$message,$filename_send){
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="") {
			redirect();
		} else {
			if (!$this->input->is_ajax_request()) {
				redirect();
			} else {
				$msg ="";
				/*CONFIGURACION DE SENMAIL SMTP*/
				$config = array(
					'protocol' => 'sendmail',
					'mailpath' => '/usr/sbin/sendmail',
					'charset'  => 'utf-8',
					'mailtype' => 'html',
					'wordwrap' => true
				);

				$this->email->initialize($config);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($from);
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->attach($filename_send);

				if ($this->email->send()) {
					$msg = "Email enviado con exito";
					return $msg;
				} else {
					$msg = $this->email->print_debugger();
					return $msg;
				}
			}
		}		
	}
}