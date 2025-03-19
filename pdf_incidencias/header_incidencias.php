<?php
//__NM____NM__FUNCTION__NM__//
setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include_once($this->Ini->path_third .'/tcpdf/tcpdf.php');
class UNPDF extends TCPDF{
//////////////////////////////////////////////////////////////////////////////////////////////
  
  //Configuracion de tabla
   var $widths;
   var $aligns;
   
   function SetWidths($w){
     //Set the array of column widths
     $this->widths=$w;
   }
 
   function SetAligns($a){
     //Set the array of column alignments
     $this->aligns=$a;
   }

    public function Dados_Header($titulo, $array_label, $array_widht){
        $this->titulo=$titulo[0];
		$this->caseta=$titulo[1];
		$this->fecha=$titulo[2];
        $this->array_label=$array_label;
        $this->array_widht=$array_widht;
    }
    
//////////////////////////////////////////////////////////////////////////////////////////////
//Page header
function Header()
{
    //Logo

    //$this->SetFont('times','B',10);
    //$this->SetTextColor(25,25,112); 
    //$this-> image('../_lib/report/img/logo.jpg',10,6,30,'');
    //$this-> image('http://localhost:8090/images/tkz_portada.png',10,6,30,'');
	$this->Sety(6);
    $this->SetX(20);
    $this->SetFont('times','B',18); 
    $this->Cell(0,6,utf8_encode($this->titulo),0,1,'C','');
	//$this->Ln(1);
	
	$this->Sety(15);
    $this->SetX(10);
    $this->SetFont('times','B',10);
    $this->Cell(0,6,"Caseta: ".$this->caseta,0,1,'L','');
	$this->Sety(19);
	//$this->Ln();
	$this->Cell(0,6,"Fecha: ".$this->fecha,0,1,'L','');

	// Encabezado de tabla
    $this->Sety(25);
    //$this->Ln(2);
	$this->SetFillColor(246,246,246);
    $this->SetFont('times','B',10); 
    //$this->Line(10, 22, 287, 22);
    //$this->Ln();

    for($i = 0; $i < count($this->array_label); $i++){
        $this->Cell($this->array_widht[$i],5,($this->array_label[$i]),1,0,'C', $fill = true);
    }
    $this->Ln();
    
    
}

//Page footer
function Footer()
{   
	// Position at 15 mm from bottom 
		$this->SetY(-15); 
		// Set font 
		$this->SetFont('times', '', 10); 
		// Page number 
		$this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M'); 
    } 
 	/*
    //Position at 1.5 cm from bottom
    $this->SetY(-15);   
    $this->SetY(-6);
    $this->SetTextColor(205,205,205);
    $this->SetFont('times','B',8);
    //Page number
    $this->Cell(0,6,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
	}
	*/
}
?>