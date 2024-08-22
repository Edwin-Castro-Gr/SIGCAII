<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rep_suceso_seguridad extends CI_Controller
{

	//Constructor de la clase
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Bogota');
	}

	public function index()
	{

		$this->session->sess_destroy();
		$this->load->view('suceso_seguridad/index');
	}

	//  Funcion formulario ---------------------------------------------------


	public function sucesos()
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect();
		} else {

			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');
		
			$data_usua['titulo'] = "Sucesos de Seguridad";
			$data_usua['origen'] = "Administración";
			$data_usua['contenido'] = 'suceso_seguridad/sucesos';
			$data_usua['entrada_js'] = '_js/rep_suceso_seguridad.js';
			$data_usua['librerias_css'] = '<!-- DataTables -->

			<!-- Animate CSS for the css animation support if needed -->
			<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
			
			<!-- include vendor stylesheets used in "Login" page. see "/views//pages/partials/page-login/@vendor-stylesheets.hbs" -->
			<link href="/dist/css/demo.css" rel="stylesheet" type="text/css" />
			<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
		
			<link rel="stylesheet" type="text/css"  href="' . base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css') . '">			
			<link rel="stylesheet" type="text/css" href="' . base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css') . '">

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="' . base_url('plugins/select2@4.1.0-rc.0/select2.min.css') . '">
			<link rel="stylesheet" type="text/css" href="' . base_url('plugins/chosen-js@1.8.7/chosen.min.css') . '">
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/combine/npm/tiny-date-picker@3.2.8/tiny-date-picker.min.css,npm/tiny-date-picker@3.2.8/date-range-picker.min.css">

    		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/css/bootstrap-datetimepicker.min.css">


    		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/css/bootstrap-colorpicker.min.css">';

			$data_usua['librerias_js'] = '<!-- Sweet-Alert  -->

			 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

			<!-- include vendor scripts used in "Login" page. see "/views//pages/partials/page-login/@vendor-scripts.hbs" -->
			<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
			<!-- <script src="https://unpkg.com/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script> -->
		
			<script src="./dist/js/demo.js"></script>
			<script src="./dist/js/demo.min.js"></script>
			
    		<script src="' . base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js') . '"></script>
    		<script src="' . base_url('plugins/interactjs@1.10.11/dist/interact.min.js') . '"></script>
    		<!-- DataTables  -->
    		<script src="' . base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js') . '"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/js/star-rating.min.js"></script>
    		<script src="' . base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js') . '"></script>
			<script src="' . base_url('plugins/select2@4.1.0-rc.0/select2.min.js') . '"></script>
    		<script src="' . base_url('plugins/chosen-js@1.8.7/chosen.jquery.min.js') . '"></script>
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

			$this->load->view('template', $data_usua);
		}
	}
	// End Function PQRS----------------------------------------------------------------



	public function guardar()
	{
		if (!$this->input->is_ajax_request()) {
			redirect();
		} else {
			$datos_session2 = array('C_basedatos' => 'u610593899_sigca');

			$this->session->set_userdata($datos_session2);

			$this->load->database();
			$this->db->query('USE ' . $this->session->userdata('C_basedatos') . ';');

			$fecha = date('Y-m-d H:i:s');
			$id_empleado = 6;
			$empleado = "";
			$correo_empleado = "";


			$registro = array(
				// confirmado
				// campos autoincremental o id = no se ponen

				'cargo_reportante' => $this->input->post('txtcargoReportante'),
				'servicio' => $this->input->post('txtservicio'),
				'nombre_paciente' => $this->input->post('txtnombrePaciente'),
				'numero_documento' => $this->input->post('txtnumeroDocumento'),
				'novedad_asociada' => $this->input->post('txtcausaNovedad'),
				'descripcion_novedad' => $this->input->post('txtdescripcionNovedad'),
				'manejo_realizado' => $this->input->post('txtmanejoRealizado'),
				'nombre_medicamento' => $this->input->post('txtdatosMedicamento'),
				'lote_medicamento' => $this->input->post('txtloteMedicamento'),
				'registro_sanitario_medicamento' => $this->input->post('txtregistroSanitario'),
				'fecha_vencimiento_medicamento' => $this->input->post('txtfechaVencimiento'),
				'nombre_dispositivo' => $this->input->post('txtdatosdispositivo'),
				'lote_dispositivo' => $this->input->post('txtlotedispositivo'),
				'referencia' => $this->input->post('txtnumReferencia'),
				'fabricante' => $this->input->post('txtfabricante'),
				'registro_sanitario_dispositivo' => $this->input->post('txtregistroSanitarioD'),
				'modelo' => $this->input->post('txtmodelo'),
				'serial' => $this->input->post('txtserial'),
				'distribuidor' => $this->input->post('txtdistibuidor'),
				'informo_jefe' => $this->input->post('txtinformoJ'),

				// Confirmado
				
				'politica_pd' => $this->input->post('txtpolitica'),
				'fecha_registro' => $fecha,
				'estado' => '0'
			);

			$query = $this->general_model->insert('suceso_seguridad', $registro);

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


			//ENVIAR CORREO A CRISTINA
			if ($query >= 1) {
				$qradicado = $query;
				// $de = '' . $contacto . ' - <' . $email . '>';


				// // Envio envio de correo de notificacion para el servidor
				// $Para = 'Contactenos <infocecimin@colsanitas.com>';
				// $Asunto = "'" . $textmotivo . ' de ' . $contacto . ' - fecha: ' . $fecha . "'";

				// $Cabeceras = "From:" . $de . "\r\n";
				// $Cabeceras .= "MIME-Version: 1.0\r\n";
				// $Cabeceras .= "Content-type: text/html; charset=utf-8\n";

				// $cuerpo = "<div><font size='3'>Señores,</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'>CECIMIN S.A.S.,</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'>Atte: Atención al Usuario,</font></div>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<div><font size='4'>" . $textmotivo . "</font></div>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Mensaje:</b>" . $mensaje . "</font></div>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<div><font size='4'><b>Datos</b></font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Nombres y Apellidos:</b> " . $contacto . "</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Cédula:</b> " . $cedula . "</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Correo Electrónico:</b> " . $email . "</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Dirección:</b> " . $direccion . "</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Telefono de Contacto:</b> " . $telefono . "</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Entidad:</b> " . $textentidad . "</font></div>\r\n";
				// $cuerpo .= "<div><font size='3'><b>Servicio:</b> " . $textservicio . "</font></div>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<br>\r\n";
				// $cuerpo .= "<div><font size='2'>Correo enviado desde https://cecimin.com.co</font></div>\r\n";
				// $cuerpo .= "<div><img style='display:flex;margin-left:5; width:180px'  src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/>";
				// $cuerpo .= "<br>\r\n";


				// // Correo para el usuraio
				// $msg = $this->sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras);
				// if ($msg = 1) {
				// 	$query = 1;
				// } else {
				// 	$query = -999;
				// }

				// if ($query >= 1) {
				// 	if ($motivo == "2" || $motivo == "3") {
				// 		$radicado = "Q-00" . $qradicado;
				// 		$de = 'Contactenos <infocecimin@colsanitas.com>';

				// 		$Para = '' . $contacto . '<' . $email . '>';
				// 		$Asunto = "Radicado No" . $radicado . " de " . $textmotivo . " - fecha: " . $fecha . "";

				// 		$Cabeceras = "From:" . $de . "\r\n";
				// 		$Cabeceras .= "MIME-Version: 1.0\r\n";
				// 		$Cabeceras .= "Content-type: text/html; charset=utf-8\n";

				// 		$cuerpo = "<div><font size='3'>Señor(a),</font></div>\r\n";
				// 		$cuerpo .= "<div><font size='3'>" . $contacto . ",</font></div>\r\n";
				// 		$cuerpo .= "<div><font size='3'>" . $direccion . ",</font></div>\r\n";
				// 		$cuerpo .= "<br>\r\n";
				// 		$cuerpo .= "<br>\r\n";
				// 		$cuerpo .= "<br>\r\n";
				// 		$cuerpo .= "<div><font size='4'>Le informamos que su " . $textmotivo . ", fue radicada bajo el consecutivo N°" . $radicado . ".</font></div>\r\n";
				// 		$cuerpo .= "<div><font size='4'>Gracias por contactanos, estaremos dando respuesta a su comunicación dentro de los terminos establecidos por ley. 
				// 		Por este mismo medio le estaremos dando respuesta, o puede comunicarse al 3759000 en Bogotá o al 018000919100 en el resto del país (opción 4) </font></div>\r\n";
				// 		$cuerpo .= "<br>\r\n";
				// 		$cuerpo .= "<br>\r\n";
				// 		$cuerpo .= "<br>\r\n";
				// 		$cuerpo .= "<div><font size='3'style='color:#1C4B62'><b>Nancy Cristina Acevedo Arias</b></font></div>\r\n";
				// 		$cuerpo .= "<div><font size='3'>Coordinadora de Mercadeo y atención al Usuario</font></div>\r\n";
				// 		$cuerpo .= "<div><font size='3'>Avenida Carrera 45 N°104-73 Piso 7</font></div>\r\n";
				// 		$cuerpo .= "<div><font size='2'>(601) 6002555 ext.172 </font></div>\r\n";
				// 		$cuerpo .= "<div><img style='display:flex;margin-left:5; width:180px' src='https://ceciminsigca.com/assets/image/logo-cecimin.png'/>";
				// 		$cuerpo .= "<br>\r\n";

				// 		$msg = $this->sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras);
				// 		if ($msg = 1) {
				// 			$query = 1;
				// 		} else {
				// 			$query = -999;
				// 		}
				// 	}
				// }
				echo $qradicado;
			} else {
				echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>' . $query . '¡Error!</strong><br>';
				switch ($query) {
					case "1062":
						echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!";
						break;
					case "-999":
						echo "Error:" . $msg . "; Por favor verifique los datos!";
						break;
					default:
						echo "Error: " . $query . " => " . $this->db->_error_message();
						break;
				}
				echo '</div>';
			}
		}
	}

	public function reportes()
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect(base_url());
		} else {
			$this->load->database();
			$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');


			$this->load->helper('funciones_select');
			$data_usua['titulo'] = "Sucesos de Seguridad";
			$data_usua['origen'] = "Administración";
			$data_usua['contenido'] = 'suceso_seguridad/listado';
			$data_usua['entrada_js'] = '_js/rep_suceso_seguridad.js';
			$data_usua['librerias_css'] = '<!-- DataTables -->
			<link rel="stylesheet" type="text/css"  href="' . base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css') . '">
			<link rel="stylesheet" type="text/css"  href="' . base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css') . '"> ';

			$data_usua['librerias_js'] = '<!-- Sweet-Alert  -->
    		<script src="' . base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js') . '"></script>
    		<script src="' . base_url('plugins/interactjs@1.10.11/dist/interact.min.js') . '"></script>
    		<!-- DataTables  -->
    		<script src="' . base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js') . '"></script>';

			$this->load->view('template', $data_usua);
		}
	}

	public function listar_tabla()
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect(base_url());
		} else {
			if (!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$this->load->database();
				$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');
				// $usuario_perfil = $this->session->userdata('C_perfil');
				// $usuario = $this->session->userdata('C_id_usuario');

				$tabla = '';

				$campos = ' "..", ss.id_suceso_seguridad AS "Id", s.nombre AS "Servicio", c.nombre AS "Cargo", CASE WHEN `novedad_asociada`="1" THEN "Uso de Medicamentos" WHEN `novedad_asociada`="2" THEN "Uso de Dispositivos/equipos biomedicos" WHEN `novedad_asociada`="3" THEN "Uso de Reactivos" WHEN `novedad_asociada`="4" THEN "Uso de Tejidos" ELSE "Otros" END "Novedad Asociada", ss.fecha_registro AS "Fecha",  CASE WHEN ss.estado ="0" THEN "Recibida" WHEN ss.estado ="1" THEN "En Gestión" WHEN ss.estado ="2" THEN "Gestionada" ELSE "Resuelta" END "Estado"';

				$campos .= ', "" AS "Acción" ';
				$query = $this->general_model->consulta_personalizada($campos, 'suceso_seguridad ss INNER JOIN servicios s ON ss.servicio = s.id_servicio INNER JOIN cargos c ON ss.cargo_reportante = c.id_cargo', '', 'ss.fecha_registro desc', 0, 0);

				$tabla = '<thead class="sticky-nav text-secondary-m1 text-uppercase text-85"><tr>';
				foreach ($query->list_fields() as $campo) {
					if ($campo != ".." && $campo != "Acción")
						$tabla .= '<th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">' . ($campo) . '</th>';
					else
						$tabla .= '<th>' . ($campo) . '</th>';
				}
				$tabla .= '</tr></thead><tbody class="pos-rel">';
				//$tabla = '<tbody class="mt-1">';

				foreach ($query->result_array() as $row) {
					if ($row['Estado'] == "Recibida")
						$estado = '<span class="badge badge-sm bgc-yellow-d1 text-white pb-1 px-25">Recibida</span>';
					elseif ($row['Estado'] == "En Gestión")
						$estado = '<span class="badge badge-sm bgc-primary-d1 text-white pb-1 px-20">En Gestión</span>';
					elseif ($row['Estado'] == "Gestionada")
						$estado = '<span class="badge badge-sm bgc-success-d1 text-white pb-1 px-20">Gestionada</span>';
					elseif ($row['Estado'] == "Resuelta")
						$estado = '<span class="badge badge-sm bgc-danger-d1 text-white pb-1 px-20">Resuelta</span>';

					$tabla .= '<tr class="d-style bgc-h-default-l4"><td>&nbsp;</td><td>' . $row['Id'] . '</td><td>' . $row['Servicio'] . '</td><td>' . $row['Cargo'] . '</td><td>' . $row['Novedad Asociada'] . '</td><td>' . $row['Fecha'] .'</td><td>' . $estado . '</td>';

					$tabla .= '<td class="text-nowrap"><div class="action-buttons">';

					$tabla .= '<a href="#" class="text-success mx-1" data-toggle="tooltip" data-original-title="Gestionar" aria-describedby="tooltip' . $row['Id'] . '" id="btngestionar_' . $row['Id'] . '"> <i  id="btngestionar_' . $row['Id'] . '" class="fa fa-pencil-alt text-105"><input type="hidden" id="nombre_' . $row['Id'] . '" name="nombre_' . $row['Id'] . '" value="' . $row['Novedad Asociada'] . '" /> </i> </a> ';

					$tabla .= '
		          	<!--<a href="#" class="text-danger-m1 mx-1" data-toggle="tooltip" data-original-title="Inactivar" id="btninactivar_' . $row['Id'] . '"> <i id="btninactivar_' . $row['Id'] . '" class="fa fa-trash-alt text-105"></i> </a> -->

		          	<a href="#" class="text-blue mx-1" data-toggle="tooltip" data-original-title="Ver Registro" aria-describedby="tooltip' . $row['Id'] . '" id="btndetalle_' . $row['Id'] . '"> <i  id="btndetalle_' . $row['Id'] . '" class="fa fa-search-plus text-105"></i> </a>
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
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect(base_url());
		} else {

			$this->load->database();
			$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');
			// $fecha =$this->input->get('fecha');
			$idfecha = explode('-', $fecha);
			// var_dump($idfecha);
			$tabla = '';
			$count = 0;
			$radicado = "SS-00";
			$campos = 'ss.id_suceso_seguridad AS "Id", c.nombre AS "Cargo Reportante", s.nombre AS "Servicio", ss.nombre_paciente AS "Paciente", ss.numero_documento AS "Documento Paciente", CASE WHEN ss.novedad_asociada="1" THEN "Uso de Medicamentos" WHEN ss.novedad_asociada="2" THEN "Uso de Dispositivos/equipos biomedicos" WHEN ss.novedad_asociada ="3" THEN "Uso de Reactivos" WHEN ss.novedad_asociada="4" THEN "Uso de Tejidos" ELSE "Otros" END "Novedad Asociada", ss.descripcion_novedad AS "Descripción de la Novedad", ss.manejo_realizado AS "Manejo Realizado", IF(ss.novedad_asociada="1", IFNULL(CONCAT("Nombre Comercial: ",ss.nombre_medicamento, " Registro Sanitario: ", ss.registro_sanitario_medicamento, " Lote: ",ss.lote_medicamento, " Fecha Expiración",ss.fecha_vencimiento_medicamento),""), " ") AS "Datos Medicamentos", IF(ss.novedad_asociada="2", IFNULL(CONCAT("Nombre Comercial: ", ss.nombre_dispositivo , " Registro Sanitario: ", ss.registro_sanitario_dispositivo, " Lote: ",ss.lote_dispositivo, " Fabricante: ", ss.fabricante, "Distribuidor: ",ss.distribuidor, " Modelo: ", ss.modelo, " Serial: ", ss.serial, " Fecha Expiración",ss.registro_sanitario_dispositivo),""), " ") AS "Datos Dispositivo/Equipo Biomedico", ss.fecha_registro AS "Fecha",  CASE WHEN ss.estado ="0" THEN "Recibida" WHEN ss.estado ="1" THEN "En Gestión" WHEN ss.estado ="2" THEN "Gestionada" ELSE "Resuelta" END "Estado"';

			$query = $this->general_model->consulta_personalizada($campos, 'suceso_seguridad ss INNER JOIN servicios s ON ss.servicio = s.id_servicio INNER JOIN cargos c ON ss.cargo_reportante = c.id_cargo', 'YEAR(ss.fecha_registro)="' . $idfecha[0] . '" AND MONTH(ss.fecha_registro) = "' . $idfecha[1] . '"', 'ss.fecha_registro', 0, 0);


			$tabla = '<thead class="sticky-nav text-secondary-m1 text-uppercase text-85"><tr>';
			$td = '<tr class="d-style bgc-h-default-l4">';
			foreach ($query->list_fields() as $campo) {
				$tabla .= '<th>' . ($campo) . '</th>';
			}
			$tabla .= '</tr></thead><tbody class="pos-rel">';

			foreach ($query->result_array() as $row1) {

				$radicado = "Q-00" . $row1['Id'];
				$tabla .= '<tr><td>' . $radicado . '</td><td>' . $row1['Cargo'] . '</td><td>' . $row1['Servicio'] . '</td><td>' . $row1['Paciente'] . '</td><td>' . $row1['Documento Paciente'] . '</td><td>' . $row1['Novedad Asociada'] . '</td><td>' . $row1['Descripción de la Novedad'] . '</td><td>' . $row1['Manejo Realizado'] . '</td><td>' . $row1['Datos Medicamentos'] . '</td><td>' . $row1['Datos Dispositivo/Equipo Biomedico'] . '</td><td>' . $row1['Fecha'] . '</td><td>' . $row1['Estado'] . '</td></tr>';
			}

			$tabla .= '</tbody>';
			$filename = "Listado_de_Sucesos_de_Seguridad.xls";
			$usuario = $this->session->userdata('C_id_usuario');
			header("Content-Disposition: attachment; filename=" . $filename);
			header("Content-Type: application/vnd.ms-excel");

			$this->load->helper('funciones_tabla');

			echo utf8_decode('<table border="1"><tr><th colspan="7">LISTADO GENERAL SUCESOS DE SEGURIDAD</th></tr></table><br>');

			echo '<table border="1">';
			echo utf8_decode($tabla);
			echo '</table>';
		}
	}

	public function gestion($id)
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect();
		} else {

			$this->load->database();
			$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');

			$data_usua['c_id_suceso'] = $id;
			$data_usua['c_cargo'] = '';
			$data_usua['c_servicio'] = '';
			$data_usua['c_paciente'] = '';
			$data_usua['c_identidad_paciente'] = '';
			$data_usua['c_novedad_asociada'] = '';
			$data_usua['c_descripcion_novedad'] = '';
			$data_usua['c_manejo_novedad'] = '';
			$data_usua['c_datos_medicamento'] = '';
			$data_usua['c_datos_dispositivos'] = '';
			$data_usua['c_fecha_registro'] = '';
			$data_usua['c_estado'] = '';
			$data_usua['c_informo_jefe']='';

			$campos = 'c.nombre AS "Cargo", s.nombre AS "Servicio", ss.nombre_paciente AS "Paciente", ss.numero_documento AS "Documento Paciente", CASE WHEN ss.novedad_asociada="1" THEN "Uso de Medicamentos" WHEN ss.novedad_asociada="2" THEN "Uso de Dispositivos/equipos biomedicos" WHEN ss.novedad_asociada ="3" THEN "Uso de Reactivos" WHEN ss.novedad_asociada="4" THEN "Uso de Tejidos" ELSE "Otros" END "Novedad Asociada", ss.descripcion_novedad AS "Descripción de la Novedad", ss.manejo_realizado AS "Manejo Realizado", IF(ss.novedad_asociada="1", IFNULL(CONCAT("Nombre Comercial: ",ss.nombre_medicamento, " Registro Sanitario: ", ss.registro_sanitario_medicamento, " Lote: ",ss.lote_medicamento, " Fecha Expiración",ss.fecha_vencimiento_medicamento),""), " ") AS "Datos Medicamentos", IF(ss.novedad_asociada="2", IFNULL(CONCAT("Nombre Comercial: ", ss.nombre_dispositivo , " Registro Sanitario: ", ss.registro_sanitario_dispositivo, " Lote: ",ss.lote_dispositivo, " Fabricante: ", ss.fabricante, "Distribuidor: ",ss.distribuidor, " Modelo: ", ss.modelo, " Serial: ", ss.serial, " Fecha Expiración",ss.registro_sanitario_dispositivo),""), " ") AS "Datos Dispositivo", ss.informo_jefe AS "Informo Jefe",ss.fecha_registro AS "Fecha",  CASE WHEN ss.estado ="0" THEN "Recibida" WHEN ss.estado ="1" THEN "En Gestión" WHEN ss.estado ="2" THEN "Gestionada" ELSE "Resuelta" END "Estado"';

			$query = $this->general_model->consulta_personalizada($campos, 'suceso_seguridad ss INNER JOIN servicios s ON ss.servicio = s.id_servicio INNER JOIN cargos c ON ss.cargo_reportante = c.id_cargo', 'ss.id_suceso_seguridad ="' . $id . '" ', '', 0, 0);

			foreach ($query->result_array() as $row) {

				$data_usua['c_cargo'] = $row['Cargo'];
				$data_usua['c_servicio'] = $row['Servicio'];
				$data_usua['c_paciente'] = $row['Paciente'];
				$data_usua['c_identidad_paciente'] = $row['Documento Paciente'];
				$data_usua['c_novedad_asociada'] = $row['Novedad Asociada'];
				$data_usua['c_descripcion_novedad'] = $row['Descripción de la Novedad'];
				$data_usua['c_manejo_novedad'] = $row['Manejo Realizado'];
				$data_usua['c_datos_medicamento'] =  $row['Datos Medicamentos'];
				$data_usua['c_datos_dispositivos'] =  $row['Datos Dispositivo'];
				$data_usua['c_informo_jefe']= $row['Informo Jefe'];

				$data_usua['c_fecha_registro'] =  $row['Fecha'];
				$data_usua['c_estado'] = $row['Estado'];

			}
			$this->load->helper('funciones_select');
			$this->load->helper('funciones_chk');

			$data_usua['titulo'] = "Gestión Sucesos de Seguridad";
			$data_usua['origen'] = "Administración";
			$data_usua['contenido'] = 'suceso_seguridad/gestion';
			$data_usua['entrada_js'] = '_js/rep_suceso_seguridad.js';
			$data_usua['librerias_css'] = '<!-- DataTables -->
			<link rel="stylesheet" type="text/css"  href="' . base_url('plugins/datatables.net-bs4@1.10.24/css/dataTables.bootstrap4.min.css') . '">
			<link rel="stylesheet" type="text/css" href="' . base_url('plugins/datatables.net-buttons-bs4@1.7.0/css/buttons.bootstrap4.min.css') . '">

			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/css/star-rating.min.css">
			<link rel="stylesheet" type="text/css" href="' . base_url('plugins/select2@4.1.0-rc.0/select2.min.css') . '">
			<link rel="stylesheet" type="text/css" href="' . base_url('plugins/chosen-js@1.8.7/chosen.min.css') . '">
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/combine/npm/tiny-date-picker@3.2.8/tiny-date-picker.min.css,npm/tiny-date-picker@3.2.8/date-range-picker.min.css">

    		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/css/bootstrap-datetimepicker.min.css">


    		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.2.0/dist/css/bootstrap-colorpicker.min.css">';

			$data_usua['librerias_js'] = '<!-- Sweet-Alert  -->
			
    		<script src="' . base_url('plugins/sweetalert2@10.16.0/dist/sweetalert2.all.min.js') . '"></script>
    		<script src="' . base_url('plugins/interactjs@1.10.11/dist/interact.min.js') . '"></script>
    		<!-- DataTables  -->
    		<script src="' . base_url('plugins/datatables@1.10.18/media/js/jquery.dataTables.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-bs4@1.10.24/js/dataTables.bootstrap4.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-colreorder@1.5.3/js/dataTables.colReorder.min.js') . '"></script>
    		<script src="' . base_url('plugins/datatables.net-select@1.3.3/js/dataTables.select.min.js') . '"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap-star-rating@4.0.6/js/star-rating.min.js"></script>
    		<script src="' . base_url('plugins/datatables.net-responsive@2.2.7/js/dataTables.responsive.min.js') . '"></script>
			<script src="' . base_url('plugins/select2@4.1.0-rc.0/select2.min.js') . '"></script>
    		<script src="' . base_url('plugins/chosen-js@1.8.7/chosen.jquery.min.js') . '"></script>
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

			$this->load->view('template', $data_usua);
		}
	}

	public function ver_registro()
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect(base_url());
		} else {
			if (!$this->input->is_ajax_request()) {
				redirect(base_url());
			} else {
				$this->load->database();
				$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');


				$idreg = $this->input->post('idreg');


				$campos = '"Orden", CASE WHEN c.motivo="0" THEN "Felicitaciones" WHEN c.motivo="1" THEN  "Sugerencia" WHEN c.motivo="2" THEN "Queja" WHEN c.motivo="3" THEN  "Reclamo" ELSE "Petición"  END AS "Motivo", IFNULL(CONCAT(c.nombres, " ",c.apellidos),"") AS "Contacto", c.documento_identidad AS "Cedula", c.email AS "Email", c.telefono AS "Teléfono", c.direccion_residencia AS "Direccion", CASE WHEN c.entidad_EPS = "1" THEN "Colsanitas" WHEN c.entidad_EPS = "2" THEN "Medisanitas" WHEN c.entidad_EPS = "3" THEN "EPS Sanitas" WHEN c.entidad_EPS = "4" THEN "ARL Sura" WHEN c.entidad_EPS = "5" THEN "Seguros Bolívar" WHEN c.entidad_EPS = "6" THEN "Unisalud" WHEN c.entidad_EPS = "7" THEN "Particular" WHEN c.entidad_EPS = "8" THEN c.otra_entidad END AS "Entidad", s.nombre AS "Servicio", c.mensaje AS "Mensaje", c.fecha_hecho AS "Fecha_hecho", c.hora_hecho AS "Hora_hecho", IFNULL(c.accion_mejora,"") AS "Accion de Mejora", IFNULL(c.observaciones_cierre,"") AS "Observaciones", c.fecha_registro AS "Fecha_registro",  CASE WHEN c.estado="1" THEN "Recibida" WHEN c.estado="2" THEN "Gestionada" ELSE "Cerrada" END AS "Estado"';

				$query = $this->general_model->consulta_personalizada($campos, 'contactenos c INNER JOIN servicios s ON c.servicio = s.id_servicio', 'c.id_contacto=' . $idreg . '', '', 0, 0);

				//echo $this->db->last_query();
				$encabezado = array();
				$i = 0;
				foreach ($query->list_fields() as $campo) {
					$encabezado[$i] = $campo;
					$i++;
				}

				$tabla = '';
				$row = $query->row_array();

				for ($k = 0; $k < $i; $k++) {
					$tabla .= '
					<div class="row">' .
						form_label($encabezado[$k] . ': ', '', array('class' => 'control-label text-right col-md-4'))
						. '<div class="col-md-8 text-primary"><strong>' . $row[$encabezado[$k]] . '</strong></div>
		            </div>';
				}

				echo $tabla;
			}
		}
	}

	public function guardar_gestion()
	{
		if (!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario') == "") {
			redirect();
		} else {

			$this->load->database();
			$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');
			$fecha = date('Y-m-d H:i:s');
			$id_suceso = $this->input->post('idregistro');
			

			$registro1 = array(
				'usuario_modifica' => $this->input->post('C_id_usuario'),
				'fecha_modificacion' => $fecha,
				'estado' => '2'
			);

			$query1 = $this->general_model->update('suceso_seguridad', 'id_suceso_seguridad', $id_suceso, $registro1);

			$registro = array(
				'id_suceso_seguridad' =>$id_suceso,
				'clasificacion_inicial' => $this->input->post('clasificacionI'),
				'fecha_analisis' => $this->input->post('fechaA'),
				'investigacion' => $this->input->post('investigacion'),
				'conclusiones' => $this->input->post('conclusiones'),
				'acciones_inseguras' => $this->input->post('accionesI'),
				'faccont_ambiental' => $this->input->post('facContAmb'),
				'faccont_equipo' => $this->input->post('facContEqui'),
				'faccont_individuo' => $this->input->post('facContInd'),
				'faccont_paciente' => $this->input->post('facConPac'),
				'faccont_tecnologia' => $this->input->post('facContTec'),
				'faccont_organizacion' => $this->input->post('facConGer'),
				'faccont_contexto' => $this->input->post('facContOrg'),
				'produjo_danos' => $this->input->post('DanosP'),
				'prevenible' => $this->input->post('prevenible'),
				'usuario_registra' => $this->session->userdata('C_id_usuario'),
			);
			
			$query = $this->general_model->insert('suceso_seguridad_gestion', $registro);

			if($query >= 1){
				echo '1';
			} else {
				echo '<div class="alert alert-danger"><i class="fa fa-ban"></i><strong>¡Error!</strong><br>';
				switch ($query) {
					case "1062":
						echo "la identificacion ingresada, ya se encuentra registrado; Por favor verifique los datos!";
						break;
					default:
						echo "Error: " . $query . " => " . $this->db->_error_message();
						break;
				}
				echo '</div>';
			}
		}
	}

	public function sendEmail2($Para, $Asunto, $cuerpo, $Cabeceras)
	{


		$this->load->database();
		$this->db->query('USE ' . $this->session->userdata('C_basedatos') . '; ');

		if (mail($Para, $Asunto, $cuerpo, $Cabeceras)) {
			$msg = 1;
		} else {
			$msg = $this->email->print_debugger();
		}
		return $msg;
	}
}
