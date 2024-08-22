<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_enviaringresop extends CI_Controller {
	
	//Constructor de la clase
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');
		
	}
	
	public function index()	{

		$this->session->sess_destroy();
		$idcargo = $this->input->get('idcargo');
		$idingreso = $this->input->get('idingreso');
		$usuario = $this->input->get('usuario');

		$data_usua['c_cargo'] = $idcargo;
		$data_usua['c_ingreso'] = $idingreso;
		$data_usua['c_usuario'] = $usuario;		
		$this->load->view('ingresosp/enviar',$data_usua);
	}


	public function cargar_anexos() {	
		
		$cargo = $this->input->post('idcargo'); 
		$datos_session2 = array('C_basedatos'=>'u610593899_sigca'); 
		$this->session->set_userdata($datos_session2); 
		$this->load->database();
		$this->db->query('USE '.$this->session->userdata('C_basedatos').'; ');
		$cargo = $this->input->post('idcargo');
		$count = 0;

		$campos ='ld.id_listado AS "Id", ld.nombre AS "Nombre"';
      
	    $query = $this->general_model->consulta_personalizada($campos, 'ckeklist_contratosp AS cc LEFT JOIN listado_documentos AS ld ON find_in_set(ld.id_listado, cc.listado_documentos)', 'cc.id_cargo='.$cargo.' AND ld.estado = "1"', 'ld.id_listado', 0, 0);
	    
	    $accordion = '<div class="accordion" id="accordionAnexos">';
	    $accordion .= '<div class="card border-0 bgc-green-l5 post-carg" >';
	    $accordion .= '<div class="card-header border-0 bgc-transparent mb-0" id="heading1">';
	    $accordion .= '<h2 class="card-title bgc-transparent text-green-d2 brc-green">';
	    $accordion .= ' <a class="d-style btn btn-white bgc-white btn-brc-tp btn-h-outline-green btn-a-outline-green accordion-toggle border-l-3 radius-0 collapsed" href="#collapse1" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                              
        <!-- the toggle icon -->
         <span class="v-collapsed px-3px radius-round d-inline-block brc-grey-l1 border-1 mr-3 text-center position-rc">
            <i class="fa fa-angle-down toggle-icon w-2 mx-1px text-90"></i>
        </span>
          <span class="v-n-collapsed px-3px radius-round d-inline-block bgc-green mr-3 text-center position-rc">
            <i class="fa fa-angle-down toggle-icon w-2 mx-1px text-white text-90 pt-1px"></i>
        </span>
        </a></h2></div>';
	    $accordion .='<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionAnexos">';

	    foreach ($query->result_array() as $row)
	    {    
	    	$count = $count+1;  
		    $accordion .='<div class="card-body pt-1 text-dark-m1 border-l-3 brc-green bgc-green-l5">
	                    <div class="form-group row" id="div_archivo'.$row['Id'].'">
	                      	<div class="col-sm-4 col-form-label text-sm-right pr-0">'.
	                        	form_label('Archivo '.$row['Nombre'],'archivo', array('class'=>'mb-0')).'
	                      	</div>
	                      	<div class="col-sm-8">'.
	                        	form_input(array('type'=>'hidden', 'name'=>'nomarchivo_'.$row['Id'], 'id'=>'nomarchivo_'.$row['Id'], 'value'=>$row['Nombre'])).
	                        	form_upload(array('type'=>'file', 'name'=>'archivo_'.$row['Id'], 'id'=>'archivo_'.$row['Id'], 'placeholder'=>'Seleccione el Archivo '.$row['Nombre'], 'class'=>'form-control col-sm-9 col-md-10','multiple'=>'multiple')).'
	                      	</div>                                                   
	                    </div>';
		    $accordion .= '</div>';
	    }
	    $accordion .= '<div class="col-sm-4 col-form-label text-sm-right pr-0">'.
	                        	form_input(array('type'=>'hidden', 'name'=>'countdoc', 'id'=>'countdoc', 'value'=>$count)).'                      	</div>';
	    $accordion .= '</div></div></div>';

	    echo $accordion;
		
	}

	public function guardar() {
		if(!$this->input->is_ajax_request()) {
			redirect();
		} else {
			$datos_session2 = array('C_basedatos'=>'u610593899_sigca'); 
				
			$this->session->set_userdata($datos_session2); 
			
			$this->load->database();
			$this->db->query('USE '.$this->session->userdata('C_basedatos').';');
				//echo "ingreso";
				$idingresop = $this->input->post('idingreso');


				$fecha = date('Y-m-d H:i:s');
				$registro=array(

					'anexos_ok'=>'1'
				);
				$query1 = $this->general_model->update('ingreso_personal', 'id_ingreso', $idingresop, $registro);
				
				if($query1 == "OK") {	
					echo '1';
					$dir ='ingreso-'.$idingresop.'';
					if (!file_exists('ingresosp/')) {
						mkdir('ingresosp/', 0777, true);
						if (!file_exists('ingresosp/'.$this->session->userdata('C_basedatos').'/')) {
							mkdir('ingresosp/'.$this->session->userdata('C_basedatos').'/', 0777, true);
							if (!file_exists('ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/')) {
								mkdir('ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/', 0777, true);
							}
						}
					} elseif (!file_exists('ingresosp/'.$this->session->userdata('C_basedatos').'/')) {
						mkdir('ingresosp/'.$this->session->userdata('C_basedatos').'/', 0777, true);
						if (!file_exists('ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/')) {
							mkdir('ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/', 0777, true);
						}
					} else if (!file_exists('ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/')) {
							mkdir('ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/', 0777, true);
					}

					$ruta = './ingresosp/'.$this->session->userdata('C_basedatos').'/'.$dir.'/';

					$this->session->set_userdata('archivo_origen',"");
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
							$nombre = $nombre_img;

							$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
							$Destino = $ruta.$nombre;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
						
							move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada		
							
							$this->session->set_userdata('archivo_origen',$Destino);
							
							
							$mensage .= 'cargado';

							$registro1 = array(
								'id_ingresop'=>$idingresop,
								'id_checklist_contratos'=>$id_check_contrato[1],
								'archivo'=>$Destino,
								'fecha_registro'=>$fecha,								
								'estado'=>'1'
							);
							$query2 = $this->general_model->insert('ingreso_personal_anexos', $registro1);
						}
						
						if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
						{
							$mensage .= '-'.$key['error'].'-';
						}
					}
				}if($query2 >= 1){
					$id_solicitud = $idingresop;
					$tipo_notificacion=9;
					$id_usuario_notifica = $this->session->userdata('C_id_usuario');
					// $id_usuario_notificado= $this->input->post('empleados_jefeinm');
					
					$observacion ="Se cargaron los anexos del ingreso No. ".$id_solicitud;						

					$registro2=array(
						'tipo_notificacion'=>$tipo_notificacion,
						'id_solicitud' =>$id_solicitud,
						'id_usuario_notifica'=>1, 
						'id_usuario_2'=>3, 
						'observacion'=>$observacion, 
						'estado'=>'0',
						'fecha_registro'=>$fecha				
					);

					$query = $this->general_model->insert('notificaciones', $registro2);

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

	
	public function sendEmail($email,$subject,$message)
    {
    	
    	/*CONFIGURACION DE SENMAIL SMTP*/
	    $config = Array(
	    	'protocol'=> 'sendmail',
			'mailpath'=> '/usr/sbin/sendmail',
			'charset'=> 'utf-8',
			'mailtype'  => 'html',
			'wordwrap'=> TRUE
	    );

	    $this->email->initialize($config);


      	$this->load->library('email', $config);
      	$this->email->set_newline("\r\n");
      	$this->email->from('admin@ceciminsigca.com','Administrador del Sistema');
      	$this->email->to($email);
      	$this->email->subject($subject);
     	$this->email->message($message);
      
      	if($this->email->send()){
       		return true;
	    }else{
	     	return false;
	    }
    }

}
	