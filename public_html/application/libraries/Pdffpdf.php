<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdffpdf extends FPDF {
        var $tipo;
        var $hoja;
        var $logo;
        var $dane;
        var $reso;

        function __construct() {
            parent::__construct();
        }

        // El encabezado del PDF
        public function Header() {
            $ci =& get_instance();
            $this->Image('assets/image/logo.png',165,5,20,0,'PNG');
            $this->Image('assets/image/informe-sigca.png',0,0,$this->GetPageWidth(),$this->GetPageHeight()); 
        }

        // Page footer
        public function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial','IB',8);
            $this->SetTextColor(255,255,255);
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'R');
        }
    }
/* application/libraries/Pdf.php */
