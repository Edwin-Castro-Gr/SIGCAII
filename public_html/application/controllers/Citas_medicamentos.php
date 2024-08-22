<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas_medicamentos extends CI_Controller {
	
	//Constructor de la clase
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');		
	}
	
	public function index()	
	{

		$this->session->sess_destroy();
		$this->load->view('citas_medicamentos/index');
	}
	
	public function guardar()
	{
		if(!$this->input->is_ajax_request()) {
			redirect();
		} else {
			$datos_session2 = array('C_basedatos'=>'u610593899_sigca'); 
				
			$this->session->set_userdata($datos_session2); 
			
			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').';');


			$fecha = date('Y-m-d H:i:s');
			$dirfecha = date('Y-m-d');
			$poli_protdatos = '0';
			$id_empleado = 6;
			$empleado = "";
			$correo_empleado = "";			
			$tipo = $this->input->post('txttipod');
			$cedula = $this->input->post('txtcedula');			
			$paciente = $this->input->post('txtnombres');
			$telefono = $this->input->post('txttelefono');
			$email=$this->input->post('txtemail');
			$file = $this->input->post('txtorden_medica');
			$fecha1 = $this->input->post('txtfecha1');
			$jornada1 = $this->input->post('txtjornada1');
			$fecha2 = $this->input->post('txtfecha2');
			$jornada2 = $this->input->post('txtjornada2');
			$fecha3 = $this->input->post('txtfecha3');
			$jornada3 = $this->input->post('txtjornada3');
			$condicion = $this->input->post('txtcondicion');
			$valjornada1 ='';
			$valjornada2 ='';
			$valjornada3 ='';
			$valcondicion = '';

			if($this->input->post('txtjornada1')=="0"){
				$valjornada1 ='Mañana';
			}else{
				$valjornada1 ='Tarde';
			}

			if($this->input->post('txtjornada2')=="0"){
				$valjornada2 ='Mañana';
			}else{
				$valjornada2 ='Tarde';
			}

			if($this->input->post('txtjornada3')=="0"){
				$valjornada3 ='Mañana';
			}else{
				$valjornada3 ='Tarde';
			}

			if($this->input->post('poli_protdatos')=='on'){
				$poli_protdatos = '1';
			}
			

			switch ($condicion) {
				case '0':
					$valcondicion = 'Ninguna';
					break;
				case '1':
					$valcondicion = 'Discapacidad Física';
					break;
				case '2':
					$valcondicion = 'Discapacidad Visual';
					break;
				case '3':
					$valcondicion = 'Discapacidad Auditiva';
					break;
				case '4':
					$valcondicion = 'Discapacidad Cognitiva';
					break;
				case '5':
					$valcondicion = 'Embarazo';
					break;
			}
			
			$radicado = "SAM-";

				// $campos1='IFNULL(CONCAT(nombres, " ", apellidos)," ") AS "Empleado", email AS "Correo"';
				// $query11 = $this->general_model->consulta_personalizada($campos1,'empleados', 'id_empleado = "'.$id_empleado.'"', '', 0, 0);
				// foreach ($query11->result_array() as $row1)
				// {
				// 	$empleado = $row1['Empleado'];
				// 	$correo_empleado = $row1['Empleado'];
				// }	
				
				//ESTABLECER LA RUTA DONDE SE VA A GUARDAR EL ARCHIVO
					
			$dir = $cedula;

			if (!file_exists('archivos/'.$this->session->userdata('C_basedatos'))) {
			 	mkdir('archivos/'.$this->session->userdata('C_basedatos'), 0777, true);
		 		if (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/')) {
			 		mkdir('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/', 0777, true);
			 		if (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/')) {
				 		mkdir('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/', 0777, true);
				 		if (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/'.$dirfecha.'/')) {
				 			mkdir('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/'.$dirfecha.'/', 0777, true);
				 		}
				 	}
			 	}
		 	}elseif (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/')) {
			 	mkdir('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/', 0777, true);
		 	}elseif (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/')) {
		 		mkdir('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/', 0777, true);
		 		if (!file_exists('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/'.$dirfecha.'/')) {
				 	mkdir('archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/'.$dirfecha.'/', 0777, true);
				}
		 	}

			$ruta = './archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/'.$dirfecha.'/';  
			$rutag ='archivos/'.$this->session->userdata('C_basedatos').'/ordenes/'.$dir.'/'.$dirfecha.'/';
			
			//CARGAR ARCHIVO VISUAL
			$config = [
				"upload_path" => $ruta,
				"allowed_types" => "*"
			];
			
			$filename ="";
			$this->load->library("upload",$config);
			if ($this->upload->do_upload('orden_medica')){
				$data = array('upload_data' => $this->upload->data());
				$filename = $rutag.$data['upload_data']['file_name'];
			}else{
				//echo $this->upload->display_errors($ruta);
				$filename ="";
			}		

			$registro=array(
				'tipo_documento'=>$tipo, 
				'cedula'=>$cedula,
				'nombre_paciente'=>$paciente,
				'telefono'=>$telefono,					
				'correo'=>$email,				
				'archivo_orden'=>$filename,
				'fecha_sugerida1'=>$fecha1,
				'jornada_sugerida1'=>$jornada1,	
				'fecha_sugerida2'=>$fecha2,
				'jornada_sugerida2'=>$jornada2,
				'fecha_sugerida3'=>$fecha3,
				'discapacidad'=>$condicion,	
				'proteccion_datos'=>$poli_protdatos,	
				'fecha_registro'=>$fecha,			
				'estado'=>'1'
			);				

			$query = $this->general_model->insert('administracion_medicamentos', $registro);
			
			// if($query >= 1) { // NOTIFICACIONES
			// 	$motivo = $this->input->post('motivo');
				
			// 	$id_solicitud = $query;
			// 	$tipo_notificacion="9";
			// 	$id_usuario_notifica = $this->session->userdata('C_id_usuario');
			// 	$id_usuario_2 = 6;
			// 	$observacion ="".$textmotivo." del Señor(a) ".$contacto." del ".$fecha."";
				
			// 	$registro2=array(
			// 		'tipo_notificacion'=>$tipo_notificacion,
			// 		'id_solicitud' =>$id_solicitud,
			// 		'id_usuario_notifica'=>$id_usuario_notifica, 
			// 		'id_usuario_2'=>$id_usuario_2, 
			// 		'observacion'=>$observacion, 
			// 		'estado'=>'0',
			// 		'fecha_registro'=>$fecha				
			// 	);

			// 	$query2 = $this->general_model->insert('notificaciones', $registro2);
			// 	 //Guardar Tarea
			// }
			

			if($query >= 1) { //ENVIAR CORREO A CRISTINA 
				$qradicado = $radicado.$query;
				$de =''.$paciente.' - <'.$email.'>';
			    
				$Para ='Citas Medicamentos  <citasmedicamentos@saludinteligente.com>';
				//$Para ='castonino17@gmail.com';
				$Asunto ="Solicitud Administración Medicamentos - ".$cedula."";

				$Cabeceras = "From:".$de."\r\n"; 
				$Cabeceras .= "MIME-Version: 1.0\r\n";					
				$Cabeceras .= "Content-type: text/html; charset=utf-8\n"; 
					
				$cuerpo = "<div><font size='3'>Señores,</font></div>\r\n";				
				$cuerpo .= "<div><font size='3'>CECIMIN S.A.S.,</font></div>\r\n";				
				$cuerpo .= "<div><font size='3'>Atte: Citas medicamentos,</font></div>\r\n";
				$cuerpo .= "<br>\r\n";
				$cuerpo .= "<br>\r\n";
				$cuerpo .= "<br>\r\n";
				$cuerpo .= "<div><h4>DATOS DE LA SOLICITUD PARA LA ADMINISTRACION DE MEDICAMENTOS</h4></div>\r\n";
				$cuerpo .= "<br>\r\n";
			    $cuerpo .= "<div><font size='3'><b>Nombre del paciente:</b> ".$paciente."</font></div>\r\n";			   
			    $cuerpo .= "<div><font size='3'><b>Documento de Identidad:</b> ".$cedula."</font></div>\r\n";
			    $cuerpo .= "<div><font size='3'><b>Correo Electrónico:</b> ".$email."</font></div>\r\n";
			    $cuerpo .= "<div><font size='3'><b>Telefono de Contacto:</b> ".$telefono."</font></div>\r\n";			    
			    $cuerpo .= "<div><font size='3'><b>Fecha Sugerida 1:</b> ".$fecha1." - ".$valjornada1."</font></div>\r\n";	
			    $cuerpo .= "<div><font size='3'><b>Fecha Sugerida 2:</b> ".$fecha2." - ".$valjornada2."</font></div>\r\n";		
			    $cuerpo .= "<div><font size='3'><b>Fecha Sugerida 3:</b> ".$fecha3." - ".$valjornada3."</font></div>\r\n";				    
			    $cuerpo .= "<div><font size='3'><b>Condición:</b> ".$valcondicion."</font></div>\r\n";
			    $cuerpo .= "<br>\r\n";		
			    $cuerpo .= "<br>\r\n";
			    $cuerpo .= "<br>\r\n";		    
			    $cuerpo .= "<div><font size='2'>Correo enviado desde https://cecimin.com.co</font></div>\r\n";
			    $cuerpo .= "<div><img style='display:flex;margin-left:5; width:180px'  src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/>";					
				$cuerpo .= "<br>\r\n";
				
				$msg = $this->sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras);
				if($msg=1){
					$query = 1;
				}else{
					$query =-999;						
				}
			
				if($query >= 1) {
					
					// $de ='Citas Medicamentos  <citasmedicamentos@saludinteligente.com>';
				    $de ='Citas Medicamentos  <citasmedicamentos@saludinteligente.com>';
					$Para =''.$paciente.' - <'.$email.'>';
					$Asunto ="Solicitud Administración Medicamentos - ".$cedula."";

					$Cabeceras = "From:".$de."\r\n"; 
					$Cabeceras .= "MIME-Version: 1.0\r\n";					
					$Cabeceras .= "Content-type: text/html; charset=utf-8\n"; 
						
					$cuerpo = "<div><font size='3'>Señor(a),</font></div>\r\n";				
					$cuerpo .= "<div><font size='3'>".$paciente.",</font></div>\r\n";				
					$cuerpo .= "<div><font size='3'>La ciudad</font></div>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";
				    $cuerpo .= "<div><font size='3'>Su solicitud fue recibida bajo el radicado N° ".$qradicado.", una vez verifiquemos que sus datos y archivos adjuntos,le estaremos dando respuesta a su solicitud a este mismo correo dentro de los siguientes tres(3) días hábiles (lunes a viernes) a partir de la fecha de la sulicitud</font></div>\r\n";	
				    $cuerpo .= "<br>\r\n";		
				    $cuerpo .= "<br>\r\n";

				    $cuerpo .= "<div><font size='3'>Cordialmente,</font></div>\r\n";
				    $cuerpo .= "<br>\r\n";		    
				   	$cuerpo .= "<br>\r\n";	
				    $cuerpo .= "<div><font size='3'>Administracion de Medicamentos</font></div>\r\n";
				    $cuerpo .= "<div><font size='3'>Avenida Carrera 45 No. 104-76 piso 3</font></div>\r\n";
				    $cuerpo .= "<div><font size='3'> (601) 6002555 Ext.236 </font></div>\r\n";	

				    $cuerpo .= "<div><font size='2'>Correo enviado desde https://cecimin.com.co</font></div>\r\n";					
				    $cuerpo .= "<div><img style='display:flex;margin-left:5; width:180px'  src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/>";					
					$cuerpo .= "<br>\r\n";
					
					$msg = $this->sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras);
					if($msg=1){
						$query = 1;
					}else{
						$query =-999;						
					}					
				}
				echo "1";
			}else {
				echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>'.$query.'¡Error!</strong><br>';
				switch($query) {
					case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
					case "-999": echo "Error:".$msg."; Por favor verifique los datos!"; break;
					default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
				}
				echo '</div>';
			}
			
		}
	}

	public function listado()
	{
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());
		} else {
			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');


			$this->load->helper('funciones_select');
			$data_usua['titulo']="Administración de Medicamentos ";
			$data_usua['origen']="Atención al Usuario";
			$data_usua['contenido']='citas_medicamentos/listado';
			$data_usua['entrada_js']='_js/a_medicamentos.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'">
			<link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'"> ';

			$data_usua['librerias_js']='<!-- Sweet-Alert  -->
    		<script src="'.base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js').'"></script>
    		<script src="'.base_url('plugins/interactjs@1.10.11/dist/interact.min.js').'"></script>
    		<!-- DataTables  -->
    		<script src="'.base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js').'"></script>
    		<script src="'.base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js').'"></script>';

			$this->load->view('template',$data_usua);
		}
	}

	public function listar_tabla() 
	{
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$this->load->database();
				$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');
				// $usuario_perfil = $this->session->userdata('C_perfil');
				// $usuario = $this->session->userdata('C_id_usuario');
				
				$tabla = '';
    
			    $campos = ' "..", id_solicitud AS "Id", CASE WHEN tipo_documento="CC" THEN "Cédula de Ciudadanía" WHEN tipo_documento="CE" THEN  "Cédula de Extranjería" WHEN tipo_documento="TI" THEN "Tarjeta de Identidad" WHEN tipo_documento="RC" THEN  "Registro Civil" ELSE "Pasaporte" END AS "Tipo Identificación", cedula AS "Cedula", nombre_paciente AS "Paciente", DATE_FORMAT(fecha_registro, "%d/%m/%Y") AS "Fecha Solicitud", archivo_orden AS "Orden", CASE WHEN estado="1" THEN "Recibida" WHEN estado="2" THEN "Gestionada" ELSE "Cerrada" END AS "Estado", "" AS "Acción" ';
			      
			    			    
			    $query = $this->general_model->consulta_personalizada($campos, 'administracion_medicamentos', '', 'Id', 0, 0);
			    
			    $tabla = '<thead class="sticky-nav text-secondary-m1 text-uppercase text-85"><tr>';
			    foreach ($query->list_fields() as $campo)
			    {
			      if($campo != ".." && $campo != "Acción")
			        $tabla .= '<th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">'.($campo).'</th>';
			      else
			        $tabla .= '<th>'.($campo).'</th>';
			    }
			    $tabla .= '</tr></thead><tbody class="pos-rel">';
			    //$tabla = '<tbody class="mt-1">';

			    foreach ($query->result_array() as $row)
			    {
				    if($row['Estado'] == "Recibida")
				        $estado = '<span class="badge badge-sm bgc-danger-d1 text-white pb-1 px-25">Recibida</span>';
				    elseif($row['Estado'] == "Gestionada")
       					 $estado = '<span class="badge badge-sm bgc-primary-d1 text-white pb-1 px-20">Gestionada</span>'; 
      				elseif($row['Estado'] == "Cerrada")
        				$estado = '<span class="badge badge-sm bgc-success-d1 text-white pb-1 px-20">Cerrada</span>'; 		

				    $tabla .= '<tr class="d-style bgc-h-default-l4"><td>&nbsp;</td><td>'.$row['Id'].'</td><td>'.$row['Tipo Identificación'].'</td><td>'.$row['Cedula'].'</td><td>'.$row['Paciente'].'</td><td>'.$row['Fecha Solicitud'].'</td><td>'.anchor(base_url().$row['Orden'], '<i class="fa fa-print"></i>', array('class'=>'btn btn-circle btn-outline-success','style'=>'width: 30px; height: 30px; padding: 2px 1px;font-size: 18px;','target'=>'_blank')).'</td><td>'.$estado.'</td>';

		        	$tabla .= '<td class="text-nowrap"><div class="action-buttons">';
		          	
	          		$tabla .= '<a href="#" class="text-success mx-1" data-toggle="tooltip" data-original-title="Gestionar" aria-describedby="tooltip'.$row['Id'].'" id="btngestionar_'.$row['Id'].'"> <i  id="btngestionar_'.$row['Id'].'" class="fa fa-pencil-alt text-105"><input type="hidden" id="nombre_'.$row['Id'].'" name="nombre_'.$row['Id'].'" value="'.$row['Paciente'].'" /> </i> </a> ';
		          	
		          	$tabla .= '
		          	<!--<a href="#" class="text-danger-m1 mx-1" data-toggle="tooltip" data-original-title="Inactivar" id="btninactivar_'.$row['Id'].'"> <i id="btninactivar_'.$row['Id'].'" class="fa fa-trash-alt text-105"></i> </a> -->

		          	<a href="#" class="text-blue mx-1" data-toggle="tooltip" data-original-title="Ver Registro" aria-describedby="tooltip'.$row['Id'].'" id="btndetalle_'.$row['Id'].'"> <i  id="btndetalle_'.$row['Id'].'" class="fa fa-search-plus text-105"></i> </a> 
		          	</div></td>';

			     	$tabla .= '</tr>';        
			    }
			    $tabla .= '</tbody>';   
			    
			    echo $tabla;
			}
		}
	}

	public function excel($fecha) 
	{
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
		redirect(base_url());
		} else {				

			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');

			$tabla = '';
			$count = 0;
			$campos = 'am.id_solicitud as "Id", am.tipo_documento as "Tipo Documento", am.cedula AS "Identificación", am.nombre_paciente AS "Paciente", am.telefono AS "Telefono", am.correo AS "Correo", am.discapacidad AS "Condición", amg.fecha_programada AS "Fecha Programada", amg.hora_programada AS "Hora Programada", amg.observaciones_gestion AS "Observaciones", CASE WHEN am.estado="1" THEN "Recibida" WHEN am.estado="2" THEN "Gestionada" ELSE "Cerrada" END AS "Estado"';

			$query = $this->general_model->consulta_personalizada($campos, 'administracion_medicamentos am INNER JOIN administracion_medicamentos_gestion amg ON am.id_solicitud = amg.id_solicitud_medicamentos', 'amg.fecha_programada =' . $fecha. ' AND am.estado = 2', 'am.id_solicitud', 0, 0);


			$tabla = '<thead class="sticky-nav text-secondary-m1 text-uppercase text-85"><tr>';
			$td = '<tr class="d-style bgc-h-default-l4">';
		    foreach ($query->list_fields() as $campo)
		    {				      
		        $tabla .= '<th>'.($campo).'</th>';	
		        		    
			}
			$tabla .= '</tr></thead><tbody class="pos-rel">';
			
			foreach ($query->result_array() as $row1)
			{
				$radicado .= $row1['Id'];
				$tabla .= '<tr><td>' . $radicado . '</td><td>' . $row1['Tipo Documento'] . '</td><td>' . $row1['Identificación'] . '</td><td>' . $row1['Paciente'] . '</td><td>' . $row1['Telefono'] . '</td><td>' . $row1['Correo'] . '</td><td>' . $row1['Condición'] . '</td><td>' . $row1['Fecha Programada'] . '</td><td>' . $row1['Hora Programada'] . '</td><td>' . $row1['Observaciones'] . '</td><td>' . $row1['Estado'] . '</td></tr>';  					
									
			}						
			
			$tabla .= '</tbody>'; 
			$filename = "Listado_de_Solicitudes_Medicamentos.xls";
			$usuario = $this->session->userdata('C_id_usuario');
		    header ("Content-Disposition: attachment; filename=".$filename );
			header ("Content-Type: application/vnd.ms-excel");

			$this->load->helper('funciones_tabla');

		    echo utf8_decode('<table border="1"><tr><th colspan="7">LISTADO GENERAL SOLICITUD DE APLIACION DE MEDICAMENTOS</th></tr></table><br>');

		    echo '<table border="1">';
            echo utf8_decode($tabla);
            echo '</table>';		
		}
	}

	public function gestion($id)
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="") {
			redirect();
		} else {
			
			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');

			$data_usua['c_id_cita'] = $id;
			$data_usua['c_tipo'] = '';
			$data_usua['c_cedula'] = '';
			$data_usua['c_nombres'] = '';
			$data_usua['c_telefono'] = '';
			$data_usua['c_correo'] = '';
			$data_usua['c_archivo_orden'] = '';
			$data_usua['c_fecha1'] = '';
			$data_usua['c_jornada1'] = '';
			$data_usua['c_fecha2'] = '';
			$data_usua['c_jornada2'] = '';
			$data_usua['c_fecha3'] = '';			
			$data_usua['c_jornada3'] = '';
			$data_usua['c_condicion'] = '';					
			$data_usua['c_protecion_datos'] = '';
			$data_usua['c_estado'] = '';


			$campos='tipo_documento AS "tipo", cedula AS "Cedula", nombre_paciente AS "Paciente", telefono AS "Telefono", correo AS "Email", archivo_orden AS "Orden", fecha_sugerida1 AS "Fecha1", jornada_sugerida1 AS "Jornada1", fecha_sugerida2 AS "Fecha2", jornada_sugerida2 AS "Jornada2", fecha_sugerida3 AS "Fecha3", jornada_sugerida3 AS "Jornada3", discapacidad AS "Condicion", proteccion_datos AS "Protecion", fecha_registro AS "Fecha_reg", estado AS "Estado"';

			$query = $this->general_model->consulta_personalizada($campos,'administracion_medicamentos', 'id_solicitud ="'.$id.'" ', '', 0, 0);
			
			foreach ($query->result_array() as $row)
			{
				
				$data_usua['c_tipo'] = $row['tipo'];
				$data_usua['c_cedula'] = $row['Cedula'];
				$data_usua['c_nombres'] = $row['Paciente'];
				$data_usua['c_telefono'] = $row['Telefono'];
				$data_usua['c_correo'] = $row['Email'];
				$data_usua['c_archivo_orden'] = $row['Orden'];
				$data_usua['c_fecha1'] = $row['Fecha1'];
				$data_usua['c_jornada1'] = $row['Jornada1'];
				$data_usua['c_fecha2'] = $row['Fecha2'];
				$data_usua['c_jornada2'] = $row['Jornada2'];
				$data_usua['c_fecha3'] = $row['Fecha3'];			
				$data_usua['c_jornada3'] = $row['Jornada3'];
				$data_usua['c_condicion'] = $row['Condicion'];					
				$data_usua['c_protecion_datos'] = $row['Protecion'];			
				$data_usua['c_fecha_reg'] = $row['Fecha_reg'];
				$data_usua['c_estado'] = $row['Estado'];

			}
			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			$data_usua['titulo']="Gestión Citas ";
			$data_usua['origen']="Atención al Usuario";
			$data_usua['contenido']='citas_medicamentos/gestion';
			$data_usua['entrada_js']='_js/a_medicamentos.js';
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

	public function ver_registro() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$this->load->database();
				$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');

				
				$idreg = $this->input->post('idreg');


				$campos = '"Orden", CASE WHEN c.motivo="0" THEN "Felicitaciones" WHEN c.motivo="1" THEN  "Sugerencia" WHEN c.motivo="2" THEN "Queja" WHEN c.motivo="3" THEN  "Reclamo" ELSE "Petición"  END AS "Motivo", IFNULL(CONCAT(c.nombres, " ",c.apellidos),"") AS "Contacto", c.documento_identidad AS "Cedula", c.email AS "Email", c.telefono AS "Teléfono", c.direccion_residencia AS "Direccion", CASE WHEN c.entidad_EPS = "1" THEN "Colsanitas" WHEN c.entidad_EPS = "2" THEN "Medisanitas" WHEN c.entidad_EPS = "3" THEN "EPS Sanitas" WHEN c.entidad_EPS = "4" THEN "ARL Sura" WHEN c.entidad_EPS = "5" THEN "Seguros Bolívar" WHEN c.entidad_EPS = "6" THEN "Unisalud" WHEN c.entidad_EPS = "7" THEN "Particular" WHEN c.entidad_EPS = "8" THEN c.otra_entidad END AS "Entidad", s.nombre AS "Servicio", c.mensaje AS "Mensaje", c.fecha_hecho AS "Fecha_hecho", c.hora_hecho AS "Hora_hecho", IFNULL(c.accion_mejora,"") AS "Accion de Mejora", IFNULL(c.observaciones_cierre,"") AS "Observaciones", c.fecha_registro AS "Fecha_registro",  CASE WHEN c.estado="1" THEN "Recibida" WHEN c.estado="2" THEN "Gestionada" ELSE "Cerrada" END AS "Estado"';
			
				$query = $this->general_model->consulta_personalizada($campos, 'contactenos c INNER JOIN servicios s ON c.servicio = s.id_servicio', 'c.id_contacto='.$idreg.'', '', 0, 0);
			
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

				for($k=0; $k<$i; $k++) {
					$tabla .= '
					<div class="row">'.
		            	form_label($encabezado[$k].': ','', array('class'=>'control-label text-right col-md-4'))
		              	.'<div class="col-md-8 text-primary"><strong>'.$row[$encabezado[$k]].'</strong></div>
		            </div>';
				}

		      	echo $tabla;
			}
		}
	}

	public function guardar_gestion() {
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="") {
			redirect();
		} else {

			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');
			$fecha = date('Y-m-d H:i:s');
			$id_solicitud = $this->input->post('idregistro');
			$estado = $this->input->post('estado');
			$fechap = $this->input->post('fechap');
			$horap = $this->input->post('horap');

			$hora_llegada = strtotime('-30 minute', strtotime ($horap));
			$hora_llegada = date('H:i:s', $hora_llegada);

			$cedula = $this->input->post('cedula');
			$paciente = $this->input->post('nombres');
			$telefono = $this->input->post('telefono');

			$email=$this->input->post('email');
			$observaciones = $this->input->post('observaciones');

			$qradicado = "SAM - 00".$id_solicitud."";
			$respuesta ='';

			$registro1 =array(
					'estado'=>$estado
				);
			$query1 = $this->general_model->update('administracion_medicamentos', 'id_solicitud',$id_solicitud, $registro1);

			if($estado == "2"){
				$registro=array(
					'id_solicitud_medicamentos'=>$id_solicitud,
					'fecha_programada'=>$this->input->post('fechap'),
					'hora_programada'=>$this->input->post('horap'),
					'fecha_gestion'	=>$fecha,
					'observaciones_gestion'=>$this->input->post('observaciones'),
					'id_usuario_registra'=>$this->session->userdata('C_id_usuario'),
				);
				$respuesta ='Programada';
			}else if($estado == "0"){

				$registro=array(
					'id_solicitud_medicamentos'=>$id_solicitud, 
					'fecha_gestion'	=>$fecha,
					'observaciones_gestion'=>$this->input->post('observaciones'),
					'id_usuario_registra'=>$this->session->userdata('C_id_usuario'),
				);
				$respuesta ='Cerrada';
			}

			$query = $this->general_model->insert('administracion_medicamentos_gestion', $registro);

			if($query1 =="OK"){

					$de ='Citas Medicamentos  <citasmedicamentos@saludinteligente.com>';
				    //$de ='catonino17@gmail.com';
					$Para =''.$paciente.' - <'.$email.'>';
					$Asunto ="Solicitud Administración Medicamentos - ".$cedula."";

					$Cabeceras = "From:".$de."\r\n";
					$Cabeceras .= "MIME-Version: 1.0\r\n";
					$Cabeceras .= "Content-type: text/html; charset=utf-8\n";

					$cuerpo = "<div><font size='3'>Señor(a),</font></div>\r\n";
					$cuerpo .= "<div><font size='3'>".$paciente.",</font></div>\r\n";
					$cuerpo .= "<div><font size='3'>La ciudad</font></div>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";

					if($respuesta == "Programada"){
						$cuerpo .= "<div><font size='3'>Su solicitud bajo el radicado N° ".$qradicado." fue ".$respuesta." para el dia ".$fechap." a las ".$horap.", por lo que debe presentarse en recepción de la clínica a las ".$hora_llegada.", siguiendo las recomendiones dadas.</font></div>\r\n";
					}else{
						$cuerpo .= "<div><font size='3'>Su solicitud bajo el radicado N° ".$qradicado." fue ".$respuesta." debido a ".$observaciones.".</font></div>\r\n";
					}

				    $cuerpo .= "<br>\r\n";
				    $cuerpo .= "<br>\r\n";

				    $cuerpo .= "<div><font size='3'>Cordialmente,</font></div>\r\n";
				    $cuerpo .= "<br>\r\n";
				   	$cuerpo .= "<br>\r\n";
				    $cuerpo .= "<div><font size='3'>Administracion de Medicamentos</font></div>\r\n";
				    $cuerpo .= "<div><font size='3'>Avenida Carrera 45 No. 104-76 piso 3</font></div>\r\n";
				    $cuerpo .= "<div><font size='3'> (601) 6002555 Ext.236 </font></div>\r\n";

				    $cuerpo .= "<div><font size='2'>Correo enviado desde https://cecimin.com.co</font></div>\r\n";
				    $cuerpo .= "<div><img style='display:flex;margin-left:5; width:180px'  src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/>";
					$cuerpo .= "<br>\r\n";

					$msg = $this->sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras);
					if($msg=1){
						$query = 1;
					}else{
						$query =-999;
					}
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

	public function sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras){

		$this->load->database();
		$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');

		if(mail($Para, $Asunto, $cuerpo, $Cabeceras)){
			$msg = 1;
		}else{
			$msg = $this->email->print_debugger();
		}
		return $msg;

	}
}
