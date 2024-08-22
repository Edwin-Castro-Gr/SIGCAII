<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
 * Helper que carga todoas las listas desplegables segun el perfil
 **/
if ( ! function_exists('cargar_menu_principal')){
	function cargar_menu_principal($perfil) {
		
    //echo $_SERVER['REQUEST_URI'];
    $url = explode("/", $_SERVER['REQUEST_URI']);
    
    if($url[1] != "index.php") {
      $pag = $url[1];
      $pag2 = $url[2];
    } else {
      $pag = $url[2];
      $pag2 = $url[3];
    }
    //echo '>>>>>>'.$pag;

    $men_pri = array(0=>'', 1=>'', 2=>'', 3=>'', 4=>'', 5=>'', 6=>'', 7=>'', 8=>'', 9=>'', 10=>'');
    $men_sub = array(0=>'', 1=>'', 2=>'', 3=>'', 4=>'', 5=>'', 6=>'', 7=>'', 8=>'', 9=>'', 10=>'', 11=>'', 12=>'', 13=>'', 14=>'', 15=>'',16=>'',17=>'',18=>'', 19=>'',20=>'',21=>'',22=>'', 23=>'',24=>'',25=>'',26=>'',27=>'',28=>'',29=>'', 30=>'',31=>'',32=>'',33=>'',34=>'',35=>'',36=>'',37=>'',38=>'',39=>'',40=>'');
    $men_ter = array(0=>'', 1=>'', 2=>'', 3=>'', 4=>'', 5=>'', 6=>'', 7=>'', 8=>'', 9=>'', 10=>'');
    $men_cua = array(0=>' collapsed', 1=>' collapsed', 2=>' collapsed', 3=>' collapsed', 4=>' collapsed', 5=>' collapsed', 6=>' collapsed', 7=>' collapsed', 8=>' collapsed', 9=>' collapsed', 10=>' collapsed');
    switch($pag) {
      case 'a_empresa': $men_pri[0] = ' active open'; $men_sub[0] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_areas': $men_pri[0] = ' active open'; $men_sub[1] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_centros': $men_pri[0] = ' active open'; $men_sub[2] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_cargos': $men_pri[0] = ' active open'; $men_sub[3] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_empleados': $men_pri[0] = ' active open'; $men_sub[4] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_procesos': $men_pri[0] = ' active open'; $men_sub[5] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_subprocesos': $men_pri[0] = ' active open'; $men_sub[6] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;     
      case 'a_lineacostos': $men_pri[0] = ' active open'; $men_sub[7] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_usuarios': $men_pri[0] = ' active open'; $men_sub[8] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_politicas': $men_pri[0] = ' active open'; $men_sub[9] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_terceros': $men_pri[0] = ' active open'; $men_sub[10] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_paciente': $men_pri[0] = ' active open'; $men_sub[11] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_eps': $men_pri[0] = ' active open'; $men_sub[12] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;
      case 'a_arl': $men_pri[0] = ' active open'; $men_sub[13] = ' active'; $men_ter[0] = ' show'; $men_cua[0] = ''; break;

      case 'a_contratos': $men_pri[1] = ' active open'; $men_sub[14] = ' active'; $men_ter[1] = ' show'; $men_cua[1] = ''; break;
      case 'd_contratost': $men_pri[1] = ' active open'; $men_sub[15] = ' active'; $men_ter[1] = ' show'; $men_cua[1] = ''; break;
      case 'd_conceptos': $men_pri[1] = ' active open'; $men_sub[16] = ' active'; $men_ter[1] = ' show'; $men_cua[1] = ''; break;
      case 'a_consultasct': $men_pri[1] = ' active open'; $men_sub[35] = ' active'; $men_ter[1] = ' show'; $men_cua[1] = ''; break;
      
      case 'd_solicitud': $men_pri[2] = ' active open'; $men_sub[17] = ' active'; $men_ter[2] = ' show'; $men_cua[2] = ''; break;
      case 'a_documentos': $men_pri[2] = ' active open'; $men_sub[18] = ' active'; $men_ter[2] = ' show'; $men_cua[2] = ''; break;
      case 'd_doc_institucionales': $men_pri[2] = ' active open'; $men_sub[35] = ' active'; $men_ter[2] = ' show'; $men_cua[2] = ''; break;
      case 'd_consultas': $men_pri[2] = ' active open'; $men_sub[19] = ' active'; $men_ter[2] = ' show'; $men_cua[2] = ''; break;
      
      case 'c_procedimientos': $men_pri[3] = ' active open'; $men_sub[20] = ' active'; $men_ter[3] = ' show'; $men_cua[3] = ''; break;
      case 'c_materiales': $men_pri[3] = ' active open'; $men_sub[21] = ' active'; $men_ter[3] = ' show'; $men_cua[3] = ''; break;
      case 'c_programacion': $men_pri[3] = ' active open'; $men_sub[22] = ' active'; $men_ter[3] = ' show'; $men_cua[3] = ''; break;
      case 'reportes': $men_pri[3] = ' active open'; $men_sub[33] = ' active'; $men_ter[3] = ' show'; $men_cua[3] = ''; break;


      case 'cc_cirugias': $men_pri[4] = ' active open'; $men_sub[23] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;
      case 'cc_suministros': $men_pri[4] = ' active open'; $men_sub[24] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;
      case 'cc_insumosm': $men_pri[4] = ' active open'; $men_sub[25] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;
      case 'cc_manoobraplanta': $men_pri[4] = ' active open'; $men_sub[26] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break; 
      case 'cc_manoobraprestacion': $men_pri[4] = ' active open'; $men_sub[27] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;        
      case 'cc_costosg': $men_pri[4] = ' active open'; $men_sub[28] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;
      case 'cc_gastosg': $men_pri[4] = ' active open'; $men_sub[29] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;
      case 'cc_consolidados': $men_pri[4] = ' active open'; $men_sub[30] = ' active'; $men_ter[4] = ' show'; $men_cua[4] = ''; break;     
      
      // case 'costos':  $men_pri[4] = ' active'; break;
      case 'registros':  $men_pri[5] = ' active'; break;
        switch($pag2) {
          case 'Capacitaciones': $men_sub[31] = ' active'; $men_ter[5] = ' show'; $men_cua[0] = ''; break; 
          case 'Evaluaciones': $men_sub[32] = ' active'; $men_ter[5] = ' show'; $men_cua[0] = ''; break;                  
        }
        break;

      case 'indicadores':  $men_pri[6] = ' active'; break;
      case 'eventos':  $men_pri[7] = ' active'; break;
    

      case 'informes':  $men_pri[8] = ' active open'; 
          switch($pag2) {
            case 'inf1': $men_sub[33] = ' active'; $men_ter[8] = ' show'; $men_cua[0] = ''; break;
            case 'inf2': $men_sub[34] = ' active'; $men_ter[8] = ' show'; $men_cua[0] = ''; break;
            
          }
          break;

    }
  
		$salida='<li class="nav-item-caption"><span class="fadeable pl-3">Principal</span><span class="fadeinable mt-n2 text-125">&hellip;</span></li>';
    
    if($perfil == 0 || $perfil == 1) {
      $salida .= '
        <li class="nav-item '.$men_pri[0].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[0].'">
            <i class="nav-icon fa fa-tachometer-alt"></i>
            <span class="nav-text fadeable"><span>Administración</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[0].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[0].'">'.anchor(('a_empresa/index'),'<span class="nav-text"><span>Empresa</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[1].'">'.anchor(('a_areas/index'),'<span class="nav-text"><span>Departamentos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[2].'">'.anchor(('a_centros/index'),'<span class="nav-text"><span>Centros de costos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[3].'">'.anchor(('a_cargos/index'),'<span class="nav-text"><span>Cargos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[4].'">'.anchor(('a_empleados/index'),'<span class="nav-text"><span>Empleados</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[5].'">'.anchor(('a_procesos/index'),'<span class="nav-text"><span>Procesos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[6].'">'.anchor(('a_subprocesos/index'),'<span class="nav-text"><span>Subprocesos</span></span>','class="nav-link"').'</li>              
              <li class="nav-item '.$men_sub[7].'">'.anchor(('a_lineacostos/index'),'<span class="nav-text"><span>Linea de Costos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[8].'">'.anchor(('a_usuarios/index'),'<span class="nav-text"><span>Usuarios</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[9].'">'.anchor(('a_politicas/index'),'<span class="nav-text"><span>Politicas</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[10].'">'.anchor(('a_terceros/index'),'<span class="nav-text"><span>Terceros</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[11].'">'.anchor(('a_pacientes/index'),'<span class="nav-text"><span>Pacientes</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[12].'">'.anchor(('a_eps/index'),'<span class="nav-text"><span>Entidades Pagadoras</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[13].'">'.anchor(('a_arl/index'),'<span class="nav-text"><span>Administradoras de Riesgos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[16].'">'.anchor(('d_conceptos/index'),'<span class="nav-text"><span>Conceptos de Contratos</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[1].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[1].'">
            <i class="nav-icon far fa-id-card"></i>
            <span class="nav-text fadeable"><span>Contratos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[1].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[14].'">'.anchor(('a_contratos/index'),'<span class="nav-text"><span>Contratos Personal</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[15].'">'.anchor(('d_contratost/index'),'<span class="nav-text"><span>Contratos Terceros</span></span>','class="nav-link"').'</li>              
              <li class="nav-item '.$men_sub[35].'">'.anchor(('a_consultasct/index'),'<span class="nav-text"><span>Consultas de Contratos</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">
           
            <i class="nav-icon fas fa-file-medical"></i>

            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[17].'">'.anchor(('d_solicitud/index'),'<span class="nav-text"><span>Solicitud</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[18].'">'.anchor(('a_documentos/index'),'<span class="nav-text"><span>Documentos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documentos Institucionales</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[3].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[3].'">
            <i class="nav-icon fas fa-briefcase-medical"></i>
            <span class="nav-text fadeable"><span>Cirugias</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[3].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[20].'">'.anchor(('c_procedimientos/index'),'<span class="nav-text"><span>Procedimientos CX</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[21].'">'.anchor(('c_materiales/index'),'<span class="nav-text"><span>Materiales e Insumos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[22].'">'.anchor(('c_programacion/index'),'<span class="nav-text"><span>Agendamiento Sala Qx</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[33].'">'.anchor(('c_programacion/reporte'),'<span class="nav-text"><span>Reporte</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[4].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[4].'">
            <i class="nav-icon fas fa-tasks"></i>
            <span class="nav-text fadeable"><span>Costos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[4].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[23].'">'.anchor(('cc_cirugias/index'),'<span class="nav-text"><span>Procedimientos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[24].'">'.anchor(('cc_suministros/index'),'<span class="nav-text"><span>Suministros</span></span>','class="nav-link"').'</li>
               <li class="nav-item '.$men_sub[25].'">'.anchor(('cc_insumosm/index'),'<span class="nav-text"><span>Insumos Médico Qx</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[26].'">'.anchor(('cc_manoobraplanta/index'),'<span class="nav-text"><span>Mano de Obra Planta</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[27].'">'.anchor(('cc_manoobraprestacion/index'),'<span class="nav-text"><span>Mano de Obra Prestación</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[28].'">'.anchor(('cc_costosg/index'),'<span class="nav-text"><span>Costos Generales</span></span>','class="nav-link"').'</li>
               <li class="nav-item '.$men_sub[29].'">'.anchor(('cc_gastosg/index'),'<span class="nav-text"><span>Gastos Generales</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[30].'">'.anchor(('cc_consolidados/index'),'<span class="nav-text"><span>Informes</span></span>','class="nav-link"').'</li>             
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
      <li class="nav-item '.$men_pri[5].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[5].'">
            <i class="nav-icon fas fa-edit"></i>
            <span class="nav-text fadeable"><span>Registros</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[5].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[31].'">'.anchor(('capacitaciones/index'),'<span class="nav-text"><span>Capacitaciones</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[32].'">'.anchor(('evaluaciones/index'),'<span class="nav-text"><span>Evaluaciones</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
        <b class="sub-arrow"></b>
      </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[6].'">
          '.anchor(('indicadores/index'),'<i class="nav-icon fa fa-flask"></i><span class="nav-text fadeable"><span>Indicadores</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[7].'">
          '.anchor(('e_eventos/index'),'<i class="nav-icon far fa-calendar-alt"></i><span class="nav-text fadeable"><span>Eventos</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[8].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[0].'">
            <i class="nav-icon fa fa-table"></i>
            <span class="nav-text fadeable"><span>Informes</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[31].'">'.anchor(('inf1/index'),'<span class="nav-text"><span>Informe 1</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[32].'">'.anchor(('inf2/index'),'<span class="nav-text"><span>Informe 2</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';      
    }

    if($perfil == 2) {
      $salida .= '
        <li class="nav-item '.$men_pri[0].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[0].'">
            <i class="nav-icon fa fa-tachometer-alt"></i>
            <span class="nav-text fadeable"><span>Administración</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[0].'">
            <ul class="submenu-inner">
              
              <li class="nav-item '.$men_sub[5].'">'.anchor(('a_procesos/index'),'<span class="nav-text"><span>Procesos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[6].'">'.anchor(('a_subprocesos/index'),'<span class="nav-text"><span>Subprocesos</span></span>','class="nav-link"').'</li>              
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[1].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[1].'">
            <i class="nav-icon far fa-id-card"></i>
            <span class="nav-text fadeable"><span>Contratos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[1].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[35].'">'.anchor(('a_consultasct/index'),'<span class="nav-text"><span>Consultas de Contratos</span></span>','class="nav-link"').'</li>              
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">
            <i class="nav-icon fa fa-cube"></i>
            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[17].'">'.anchor(('d_solicitud/index'),'<span class="nav-text"><span>Solicitud</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documentos Institucionales</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[5].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[5].'">
            <i class="nav-icon fas fa-edit"></i>
            <span class="nav-text fadeable"><span>Registros</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[5].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[31].'">'.anchor(('capacitaciones/index'),'<span class="nav-text"><span>Capacitaciones</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[32].'">'.anchor(('evaluaciones/index'),'<span class="nav-text"><span>Evaluaciones</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
        <b class="sub-arrow"></b>
      </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[6].'">'.anchor(('indicadores/index'),'<i class="nav-icon fa fa-flask"></i><span class="nav-text fadeable"><span>Indicadores</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[7].'">'.anchor(('eventos/index'),'<i class="nav-icon far fa-calendar-alt"></i><span class="nav-text fadeable"><span>Eventos</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[8].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[8].'">
            <i class="nav-icon fa fa-table"></i>
            <span class="nav-text fadeable"><span>Informes</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[28].'">'.anchor(('inf1/index'),'<span class="nav-text"><span>Informe 1</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[29].'">'.anchor(('inf2/index'),'<span class="nav-text"><span>Informe 2</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';      
    }

    if($perfil == 3) {      

      $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">           
            <i class="nav-icon fas fa-file-medical"></i>
            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">         
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documentos Institucionales</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';
      $salida .= '
        <li class="nav-item '.$men_pri[3].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[3].'">
            <i class="nav-icon fas fa-briefcase-medical"></i>
            <span class="nav-text fadeable"><span>Cirugias</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[3].'">
            <ul class="submenu-inner">              
              <li class="nav-item '.$men_sub[22].'">'.anchor(('c_programacion/index'),'<span class="nav-text"><span>Agendamiento Sala Qx</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';
 
    }

    if($perfil == 4) {

       $salida .= '
        <li class="nav-item '.$men_pri[1].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[1].'">
            <i class="nav-icon far fa-id-card"></i>
            <span class="nav-text fadeable"><span>Contratos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[1].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[14].'">'.anchor(('a_contratos/index'),'<span class="nav-text"><span>Contratos Personal</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[15].'">'.anchor(('d_contratost/index'),'<span class="nav-text"><span>Contratos Terceros</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[16].'">'.anchor(('d_conceptos/index'),'<span class="nav-text"><span>Conceptos de Contratos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[35].'">'.anchor(('a_consultasct/index'),'<span class="nav-text"><span>Consultas de Contratos</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

       $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">
           
            <i class="nav-icon fas fa-file-medical"></i>

            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">              
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documenetos Institucionales</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

        $salida .= '
        <li class="nav-item '.$men_pri[4].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[4].'">
            <i class="nav-icon fas fa-tasks"></i>
            <span class="nav-text fadeable"><span>Costos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[4].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[23].'">'.anchor(('cc_cirugias/index'),'<span class="nav-text"><span>Procedimientos</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[24].'">'.anchor(('cc_suministros/index'),'<span class="nav-text"><span>Suministros</span></span>','class="nav-link"').'</li>
               <li class="nav-item '.$men_sub[25].'">'.anchor(('cc_insumosm/index'),'<span class="nav-text"><span>Insumos Médico Qx</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[26].'">'.anchor(('cc_manoobraplanta/index'),'<span class="nav-text"><span>Mano de Obra Planta</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[27].'">'.anchor(('cc_manoobraprestacion/index'),'<span class="nav-text"><span>Mano de Obra Prestación</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[28].'">'.anchor(('cc_costosg/index'),'<span class="nav-text"><span>Costos Generales</span></span>','class="nav-link"').'</li>
               <li class="nav-item '.$men_sub[29].'">'.anchor(('cc_gastosg/index'),'<span class="nav-text"><span>Gastos Generales</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[30].'">'.anchor(('cc_consolidados/index'),'<span class="nav-text"><span>Informes</span></span>','class="nav-link"').'</li>             
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[5].'">
            <a href="#" class="nav-link dropdown-toggle '.$men_cua[5].'">
              <i class="nav-icon fas fa-edit"></i>
              <span class="nav-text fadeable"><span>Registros</span></span>
              <b class="caret fa fa-angle-left rt-n90"></b>
            </a>
            <div class="hideable submenu collapse '.$men_ter[5].'">
              <ul class="submenu-inner">
                <li class="nav-item '.$men_sub[31].'">'.anchor(('capacitaciones/index'),'<span class="nav-text"><span>Capacitaciones</span></span>','class="nav-link"').'</li>
                <li class="nav-item '.$men_sub[32].'">'.anchor(('evaluaciones/index'),'<span class="nav-text"><span>Evaluaciones</span></span>','class="nav-link"').'</li>
              </ul>
            </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[6].'">
          '.anchor(('indicadores/index'),'<i class="nav-icon fa fa-flask"></i><span class="nav-text fadeable"><span>Indicadores</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[7].'">
          '.anchor(('eventos/index'),'<i class="nav-icon far fa-calendar-alt"></i><span class="nav-text fadeable"><span>Eventos</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[8].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[8].'">
            <i class="nav-icon fa fa-table"></i>
            <span class="nav-text fadeable"><span>Informes</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[28].'">'.anchor(('inf1/index'),'<span class="nav-text"><span>Informe 1</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[29].'">'.anchor(('inf2/index'),'<span class="nav-text"><span>Informe 2</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>'; 
    }


    if($perfil == 5) {      

      $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">
           
            <i class="nav-icon fas fa-file-medical"></i>

            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">             
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documentos Institucionales</span></span>','class="nav-link"').'</li>             
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[5].'">
            <a href="#" class="nav-link dropdown-toggle '.$men_cua[5].'">
              <i class="nav-icon fas fa-edit"></i>
              <span class="nav-text fadeable"><span>Registros</span></span>
              <b class="caret fa fa-angle-left rt-n90"></b>
            </a>
            <div class="hideable submenu collapse '.$men_ter[5].'">
              <ul class="submenu-inner">
                <li class="nav-item '.$men_sub[31].'">'.anchor(('capacitaciones/index'),'<span class="nav-text"><span>Capacitaciones</span></span>','class="nav-link"').'</li>
                <li class="nav-item '.$men_sub[32].'">'.anchor(('evaluaciones/index'),'<span class="nav-text"><span>Evaluaciones</span></span>','class="nav-link"').'</li>
              </ul>
            </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[6].'">
          '.anchor(('indicadores/index'),'<i class="nav-icon fa fa-flask"></i><span class="nav-text fadeable"><span>Indicadores</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[7].'">
          '.anchor(('eventos/index'),'<i class="nav-icon far fa-calendar-alt"></i><span class="nav-text fadeable"><span>Eventos</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[8].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[8].'">
            <i class="nav-icon fa fa-table"></i>
            <span class="nav-text fadeable"><span>Informes</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[28].'">'.anchor(('inf1/index'),'<span class="nav-text"><span>Informe 1</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[29].'">'.anchor(('inf2/index'),'<span class="nav-text"><span>Informe 2</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>'; 
    }
    if($perfil == 6 || $perfil == 8) {      

      $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">           
            <i class="nav-icon fas fa-file-medical"></i>
            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">         
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documentos Institucionales</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';
      $salida .= '
        <li class="nav-item '.$men_pri[3].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[3].'">
            <i class="nav-icon fas fa-briefcase-medical"></i>
            <span class="nav-text fadeable"><span>Cirugias</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[3].'">
            <ul class="submenu-inner">              
              <li class="nav-item '.$men_sub[22].'">'.anchor(('c_programacion/index'),'<span class="nav-text"><span>Agendamiento Sala Qx</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[33].'">'.anchor(('c_programacion/reporte'),'<span class="nav-text"><span>Reporte</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
      <li class="nav-item '.$men_pri[5].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[5].'">
            <i class="nav-icon fas fa-edit"></i>
            <span class="nav-text fadeable"><span>Registros</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[5].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[31].'">'.anchor(('capacitaciones/index'),'<span class="nav-text"><span>Capacitaciones</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[32].'">'.anchor(('evaluaciones/index'),'<span class="nav-text"><span>Evaluaciones</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
        <b class="sub-arrow"></b>
      </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[6].'">
          '.anchor(('indicadores/index'),'<i class="nav-icon fa fa-flask"></i><span class="nav-text fadeable"><span>Indicadores</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[7].'">
          '.anchor(('eventos/index'),'<i class="nav-icon far fa-calendar-alt"></i><span class="nav-text fadeable"><span>Eventos</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[8].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[8].'">
            <i class="nav-icon fa fa-table"></i>
            <span class="nav-text fadeable"><span>Informes</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[28].'">'.anchor(('inf1/index'),'<span class="nav-text"><span>Informe 1</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[29].'">'.anchor(('inf2/index'),'<span class="nav-text"><span>Informe 2</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>'; 
    }

    if($perfil == 7) {      

      $salida .= '
        <li class="nav-item '.$men_pri[2].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[2].'">
           
            <i class="nav-icon fas fa-file-medical"></i>

            <span class="nav-text fadeable"><span>Documentos</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">             
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_doc_institucionales/index'),'<span class="nav-text"><span>Documentos Institucionales</span></span>','class="nav-link"').'</li>             
              <li class="nav-item '.$men_sub[19].'">'.anchor(('d_consultas/index'),'<span class="nav-text"><span>Consultas</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[5].'">
            <a href="#" class="nav-link dropdown-toggle '.$men_cua[5].'">
              <i class="nav-icon fas fa-edit"></i>
              <span class="nav-text fadeable"><span>Registros</span></span>
              <b class="caret fa fa-angle-left rt-n90"></b>
            </a>
            <div class="hideable submenu collapse '.$men_ter[5].'">
              <ul class="submenu-inner">
                <li class="nav-item '.$men_sub[31].'">'.anchor(('capacitaciones/index'),'<span class="nav-text"><span>Capacitaciones</span></span>','class="nav-link"').'</li>
                <li class="nav-item '.$men_sub[32].'">'.anchor(('evaluaciones/index'),'<span class="nav-text"><span>Evaluaciones</span></span>','class="nav-link"').'</li>
              </ul>
            </div>
          <b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[6].'">
          '.anchor(('indicadores/index'),'<i class="nav-icon fa fa-flask"></i><span class="nav-text fadeable"><span>Indicadores</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[7].'">
          '.anchor(('eventos/index'),'<i class="nav-icon far fa-calendar-alt"></i><span class="nav-text fadeable"><span>Eventos</span></span>','class="nav-link"').'<b class="sub-arrow"></b>
        </li>';

      $salida .= '
        <li class="nav-item '.$men_pri[8].'">
          <a href="#" class="nav-link dropdown-toggle '.$men_cua[8].'">
            <i class="nav-icon fa fa-table"></i>
            <span class="nav-text fadeable"><span>Informes</span></span>
            <b class="caret fa fa-angle-left rt-n90"></b>
          </a>
          <div class="hideable submenu collapse '.$men_ter[2].'">
            <ul class="submenu-inner">
              <li class="nav-item '.$men_sub[28].'">'.anchor(('inf1/index'),'<span class="nav-text"><span>Informe 1</span></span>','class="nav-link"').'</li>
              <li class="nav-item '.$men_sub[29].'">'.anchor(('inf2/index'),'<span class="nav-text"><span>Informe 2</span></span>','class="nav-link"').'</li>
            </ul>
          </div>
          <b class="sub-arrow"></b>
        </li>'; 
    }
    
    $salida .= '<li class="nav-devider"></li>';	
    
		return $salida;
	}
}

if ( ! function_exists('cargar_fecha_formateada')){
  function cargar_fecha_formateada() {
    
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
               
    $salida = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');

    return utf8_decode($salida);
  }
}

if ( ! function_exists('cargar_fechahora_formateada')){
  function cargar_fechahora_formateada() {
    
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
               
    $salida = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'). " a las ".date('g:i A');

    return utf8_decode($salida);
  }
}
