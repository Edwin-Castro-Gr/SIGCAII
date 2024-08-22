<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_empleados extends CI_Controller {
	
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
			$data_usua['titulo']="Empleados";
			$data_usua['origen']="Administración";
			$data_usua['contenido']='empleados/index';
			$data_usua['entrada_js']='_js/empleados.js';
			$data_usua['librerias_css']='<!-- DataTables -->
			<link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css').'">
			<link rel="stylesheet" type="text/css"  href="'.base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css').'">';

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

	public function listar_tabla() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$this->load->helper('funciones_tabla');
				echo listar_empleados_tabla('WEB');
			}
		}
	}

	public function guardar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else{
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				$fecha = date('Y-m-d H:i:s');
				$perfil = $this->input->post('perfil');
				$usuario = $this->input->post('cedula');
				$clave_cod = 'AES_ENCRYPT('.$this->db->escape($this->input->post('cedula')).', "-Qsc.725943!")';

				$registro=array(
					
					'Id_tipdocIdentidad'=>$this->input->post('Tipo_docidentidad_empleados'),
					'cedula'=>$this->input->post('cedula'), 
					'nombres'=>$this->input->post('nombres'), 
					'apellidos'=>$this->input->post('apellidos'),
					'fecha_nacimiento'=>$this->input->post('fecha_nacimiento'),
					'direccion'=>$this->input->post('direccion'),
					'telefono'=>$this->input->post('telefono'),
					'email'=>$this->input->post('email'),
					'id_cargo'=>$this->input->post('cargos_empleados'),
					'id_eps'=>$this->input->post('eps_empleados'),
					'arl'=>$this->input->post('arl_empleados'),
					'grupo_sanguineo'=>$this->input->post('gruposanguineo'),
					'nivel_riesgo'=>$this->input->post('nivel_riesgo'),
					'fecha_registro'=>date('Y-m-d H:i:s'),  
					'id_usuario'=>$this->session->userdata('C_id_usuario'),  
					'estado'=>'1'
				);

				$query = $this->general_model->insert('empleados', $registro);
				
				if($this->input->post('crea_usuario')){

					$sql_inser="INSERT INTO usuarios VALUES ('".$query."','".$usuario."',$clave_cod,'".$this->input->post('nombres')."','".$this->input->post('apellidos')."','".$this->input->post('telefono')."','".$this->input->post('email')."','".$query."','".$perfil."',NULL,NULL,NULL,'0','0','".$fecha."', '1')";
				
					$query = $this->general_model->consulta_select($sql_inser);

					$msg='';
					$usuario = '';

					$funcionario = $this->input->post('nombres')." ".$this->input->post('apellidos') ;
					$correo_funcionario = $this->input->post('email');

					$de="Calidad CECIMIN <calidad.cecimin@saludinteligente.com>";
				    
					$Para ="".$funcionario." <".$correo_funcionario.">";
					// $Para ="Edwin Castro <edwincas_17@hotmail.com>";
					$Asunto ="Socialización de acceso a SIGCA";

					$Cabeceras = "From:".$de."\r\n"; 
					$Cabeceras = "CC:Ana samantha Rodriguez pacheco <asrodriguez@saludinteligente.com>\r\n";
					$Cabeceras .= "MIME-Version: 1.0\r\n";					
					$Cabeceras .= "Content-type: text/html; charset=utf-8\n"; 
						
					$cuerpo = "<div><font size='3'>Estimado(a) Funcionario,</font></div>\r\n";				
					$cuerpo .= "<div><font size='3'>".$funcionario.",</font></div>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<div><font size='3'>Cordial saludo,</font></div>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<div><font size='3'>La presente es con el fin de socializar Usuario y Contraseña de Acceso a SIGCA:</font></div>\r\n";									
				    $cuerpo .= "<br>\r\n";	
				    $cuerpo .= "<div><font size='3'>Usuario y Contraseña es su documento de identidad:".$this->input->post('cedula')."</font></div>\r\n";	
				    $cuerpo .= "<br>\r\n";
				    $cuerpo .= "<br>\r\n";
				    $cuerpo .= "<div><font size='3'>Agradeciendo su atención, </font></div>\r\n";
				    $cuerpo .= "<br>\r\n";		
				    $cuerpo .= "<br>\r\n";
				    $cuerpo .= "<div><font size='3'>Atentamente, </font></div>\r\n";
				    $cuerpo .= "<br>\r\n";		
				    $cuerpo .= "<br>\r\n";
				    $cuerpo .= "<div><font size='3'>Samantha Rodriguez Pacheco</font></div>\r\n";
				    $cuerpo .= "<div><font size='3'>Coordinadora de Calidad</font></div>\r\n";
				    $cuerpo .= "<div><img style='display:flex;margin-left:5; width:180px'  src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/>";				
					$cuerpo .= "<br>\r\n";
					$cuerpo .= "<br>\r\n";		
				    $cuerpo .= "<br>\r\n";
				    $cuerpo .= "<div><font size='1' color:'#20A491' >MEDIO AMBIENTE: ¿Necesita realmente imprimir este correo? CONFIDENCIALIDAD: La información transmitida a través de este correo electrónico es confidencial y dirigida única y exclusivamente para uso de su destinatario. </font></div>\r\n";									
					
					$msg = $this->sendEmail($Para, $Asunto, $cuerpo, $Cabeceras);
					if($msg=1){
						$query = 1;
					}else{
						$query =-999;						
					}
				}
				if($query >= 1){
					echo '1';
				}else {
					echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
					switch($query) {
						case "1062": echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!"; break;
						case "-999": echo "El correo no pudo ser enviado; Por favor verifique los datos!"; break;
						default: echo "Error: ".$query." => ".$this->db->_error_message(); break;	
					}
					echo '</div>';
				}
			} 
		}
	}
	
	public function pdf() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			$this->load->library('Pdffpdf');

	        $pdf = new Pdffpdf('L', 'mm', 'LETTER');
	        $pdf->AliasNbPages();
	        
	        $pdf->hoja = 'LETTER';
	        $pdf->SetTitle("SIGFAC - Informe Empleados", true);
	        $pdf->SetLeftMargin(7);
	        $pdf->SetRightMargin(3);
	        
	        $pdf->AddPage('L', 'LETTER');
            
            $pdf->Ln(32);
            $pdf->SetFont('helvetica','B',14);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(0,0,utf8_decode('LISTADO GENERAL EMPLEADOS            '), 0, 0, 'C', false);
            $pdf->Ln(13);

            $pdf->SetFont('helvetica','B',6);
            $pdf->Cell(263,5,utf8_decode('Fecha de Impresión: ').cargar_fechahora_formateada(),0,0,'R',false);
            $pdf->Cell(7,5,' ', 0, 0, 'C', false);
            $pdf->Ln(13);

            $campos ='e.id_empleado AS "Id", e.cedula AS "Cedula",IFNULL(CONCAT(e.nombres, " ", e.apellidos),"") AS "Empleado", c.nombre AS "Cargo",CASE WHEN e.estado="1" THEN "Activo" ELSE "Inactivo" END AS "Estado" ';
			$query=$this->general_model->consulta_personalizada($campos, 'empleados e INNER JOIN cargos c ON e.id_cargo = c.id_cargo', '', 'e.apellidos', 0, 0);
			$encabezados = $query->result();
			
			$x = 1;
			$fill = true;
			$pdf->SetFont('helvetica','B', 11);
			$pdf->SetFillColor(200,220,255);
			$pdf->Cell(7,5,' ',0,0,'C',false);
			$pdf->Cell(10,5,utf8_decode("ID"),'LTRB',0,'C',$fill);
			$pdf->Cell(26,5,utf8_decode("CEDULA"),'LTRB',0,'C',$fill);
			$pdf->Cell(85,5,utf8_decode("NOMBRE DEL EMPLEADO"),'LTRB',0,'C',$fill);
			$pdf->Cell(118,5,utf8_decode("CARGO"),'LTRB',0,'C',$fill);
			$pdf->Cell(18,5,utf8_decode("ESTADO"),'LTRB',0,'C',$fill);
			$pdf->Cell(7,5,' ',0,0,'C',false);
			$pdf->Ln(5);
			$fill = false;
			$pdf->SetFont('helvetica','', 10);
			$pdf->SetFillColor(255,180,180);
	        foreach ($encabezados as $row) {
	        	$pdf->Cell(7,5,' ',0,0,'C',false);
                $pdf->Cell(10,5,($row->Id),'LTRB',0,'C',$fill);
                $pdf->Cell(26,5,($row->Cedula),'LTRB',0,'C',$fill);
                $pdf->Cell(85,5,utf8_decode($row->Empleado),'LTRB',0,'C',$fill);
                $pdf->Cell(118 ,5,utf8_decode($row->Cargo),'LTRB',0,'C',$fill);
                if($row->Estado == "Activo")
                	$pdf->Cell(18,5,$row->Estado,'LTRB',0,'C',$fill);
                else
                	$pdf->Cell(18,5,$row->Estado,'LTRB',0,'C',!$fill);
                $pdf->Cell(7,5,' ',0,0,'C',false);

	            $pdf->Ln(5);
	        }
	    
	        $pdf->Output('I', "Listado_Empleados.pdf");
		}//-Valida Inicio de Session
	}

	public function excel() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			$filename = "Listado_Empleados.xls";
		    header ("Content-Disposition: attachment; filename=".$filename ); 
			header ("Content-Type: application/vnd.ms-excel");
			
			$this->load->helper('funciones_tabla');
			
		    echo utf8_decode('<table border="1"><tr><th colspan="5">LISTADO GENERAL DE EMPLEADOS</th></tr></table><br>');

		    echo '<table border="1">';
            echo utf8_decode(listar_empleadosex_tabla('EXCEL')); 
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
				$registro=array('estado'=>'0');
				$query = $this->general_model->update('empleados', 'id_empleado', $this->input->post('idreg'), $registro);

				$registro1=array('estado'=>'0');
				$query1 = $this->general_model->update('usuarios', 'id_usuario', $this->input->post('idreg'), $registro1);
				
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

	public function modificar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect(base_url());
		else {
			header('Content-Type: application/json');
			$id = $this->input->post('idreg');
			
			//$sql="SELECT nombre, id_responsable, estado  FROM centroscostos WHERE id_centrocosto = '$id' ";
			$query=$this->general_model->select_where('id_empleado, Id_tipdocIdentidad, cedula, nombres, apellidos, fecha_nacimiento, direccion, telefono, email, id_cargo, id_eps, arl, grupo_sanguineo, nivel_riesgo, estado', 'empleados', array('id_empleado' => $id));
			$row = $query->row_array();
				
			$arr['empleados'] = array('id_empleado'=>$row['id_empleado'], 'Id_tipdocIdentidad'=>$row['Id_tipdocIdentidad'], 'cedula'=>$row['cedula'],'nombres'=>$row['nombres'],'apellidos'=>$row['apellidos'], 'fecha_nacimiento'=>$row['fecha_nacimiento'], 'direccion'=>$row['direccion'], 'telefono'=>$row['telefono'],'email'=>$row['email'], 'id_cargo'=>$row['id_cargo'], 'id_eps'=> $row['id_eps'], 'arl'=>$row['arl'], 'grupo_sanguineo'=>$row['grupo_sanguineo'], 'nivel_riesgo'=>$row['nivel_riesgo'],'estado'=>$row['estado']);
			echo json_encode( $arr );
		}
	}

	public function actualizar() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {
				//echo "ingreso";
				$registro=array(
					'Id_tipdocIdentidad'=>$this->input->post('Tipo_docidentidad_empleados'), 
					'cedula'=>$this->input->post('cedula'), 
					'nombres'=>$this->input->post('nombres'),
					'apellidos'=>$this->input->post('apellidos'),
					'fecha_nacimiento'=>$this->input->post('fecha_nacimiento'),
					'direccion'=>$this->input->post('direccion'),
					'telefono'=>$this->input->post('telefono'),
					'email'=>$this->input->post('email'),
					'id_cargo'=>$this->input->post('cargos_empleados'),
					'id_eps'=>$this->input->post('eps_empleados'),
					'arl'=>$this->input->post('arl_empleados'),
					'grupo_sanguineo'=>$this->input->post('gruposanguineo'),
					'nivel_riesgo'=>$this->input->post('nivel_riesgo'),
					'estado'=>$this->input->post('estado')
				);
				
				$query = $this->general_model->update('empleados', 'id_empleado', $this->input->post('idregistro'), $registro);
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

	public function ver_registro() {
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());		
		} else {
			if(!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$idreg = $this->input->post('idreg');

				$campos = 'e.id_empleado AS "Id", te.cod_tipodocumento AS "Tipo Identificación", e.cedula AS "Documento Identidad", IFNULL(CONCAT(e.nombres, " ", e.apellidos),"") AS "Nombre del Empleado",  e.email AS "Email", c.nombre AS "Cargo", CASE WHEN e.estado = "1" THEN "Activo" ELSE "Inactivo" END AS "Estado"';
      
		    	$query = $this->general_model->consulta_personalizada($campos, 'empleados e LEFT JOIN tipo_docidentidad te ON te.id_tipdocidentidad = e.Id_tipdocIdentidad LEFT JOIN cargos c ON c.id_cargo = e.id_cargo', 'e.id_empleado = "'.$idreg.'" ', '', 0, 0);
		      
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
		            	form_label($encabezado[$k].': ','', array('class'=>'control-label text-right col-md-5'))
		              	.'<div class="col-md-7 text-primary"><strong>'.$row[$encabezado[$k]].'</strong></div>
		            </div>';
				}

		      	echo $tabla;
			}
		}
	}

	public function consultar_empleado(){
		if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) 
			redirect();
		else {
			if(!$this->input->is_ajax_request()) {
				redirect();
			} else {

				$idreg = $this->input->post('cedula');

				$query = $this->general_model->select_verificar('empleados', 'cedula = '.$idreg);
				
				if($query != false){
					echo '1';
				}else {
					echo '0';
				}
			} 
		}
	}

	public function sendEmail($Para, $Asunto, $cuerpo, $Cabeceras){
		if(mail($Para, $Asunto, $cuerpo, $Cabeceras)){
			$msg = 1;				
		}else{
			$msg = $this->email->print_debugger();	
		}
		return $msg;
	}
}