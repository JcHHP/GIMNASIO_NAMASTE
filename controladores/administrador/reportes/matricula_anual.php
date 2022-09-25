<?php
    require("../fpdf/fpdf.php");

    $fecha='25/09/2022';
    $reporte = new FPDF();

    class pdf extends FPDF{
        public function header(){
            $this->SetFont("Arial",'B',10);
            $this->Cell(190,15,'GIMNASIO NAMASTE',0,1);
        }
    }

    $reporte=new pdf();
    $reporte->AddPage();
    $reporte->SetFont('Arial','BU',18);

    $reporte->Cell(190,15,'REPORTE DE MATRICULA',0,1,'C');
    $reporte->Ln(0);
    $reporte->SetFont('Arial','',8);
    $reporte->Cell(190,5,'FECHA: '.$fecha,0,1,'R');
    $reporte->Cell(190,5,'HORA:',0,1,'R');
    $reporte->SetFont('Arial','',12);
    $reporte->Ln(10);
    $reporte->MultiCell(190,8,utf8_decode('El sistema del gimnasio Namaste, muestra a continuación la matrícula que se le hizo al cliente Jean Carlos Ortiz Pezua, con número de DNI 72118318, en el mes de Febrero.'),0,'L');
    $reporte->Ln(5);

    $reporte->SetFont('Arial','b',10);
    $reporte->SetFillColor(255,0,250);
    $reporte->Cell(30,8,'DNI',1,0,'C',true);
    $reporte->Cell(50,8,'NOMBRE Y APELLIDOS',1,0,'C',true);
    $reporte->Cell(30,8,'PLAN',1,0,'C',true);
    $reporte->Cell(25,8,'PAGO',1,0,'C',true);
    $reporte->Cell(27,8,'DESCUENTO',1,0,'C',true);
    $reporte->Cell(28,8,'FECHA',1,1,'C',true);

    for($i=0;$i<10;$i++){
        $reporte->SetFont('Arial','',10);
        $reporte->Cell(30,8,'72118318',1,0,'C');
        $reporte->Cell(50,8,'Jean Carlos Ortiz Pezua',1,0,'C');
        $reporte->Cell(30,8,'Interdiario',1,0,'C');
        $reporte->Cell(25,8,'S/100',1,0,'C');
        $reporte->Cell(27,8,'S/0',1,0,'C');
        $reporte->Cell(28,8,'25/09/2022',1,1,'C');
    }
    
    $reporte->Ln(5);
    $reporte->SetFont('Arial','',12);
    $reporte->MultiCell(190,8,utf8_decode('Si presenta cualquier inconformidad o reclamo sobre los datos detallados, acercarse al administrador de turno.'),0,'L');
    $reporte->OutPut();

?>