<?php
    require("../fpdf/fpdf.php");

    date_default_timezone_set('America/Lima');
    $fecha=date('d-m-Y');
    $hora=date("H:i:s");
    $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];

    $reporte = new FPDF();

    class pdf extends FPDF{
        public function header(){
            $this->SetFont("Arial",'B',10);
            $this->Cell(190,15,'GIMNASIO NAMASTE',0,1);
        }
    }

    if(isset($_GET['entrenador']) && isset($_GET['nombre']) && isset($_GET['fecha']) && isset($_GET['tiempo']) && isset($_GET['sueldo'])){
        $mes= substr($_GET['fecha'],5,2);
        $mes = (int)$mes;

        $reporte=new pdf();
        $reporte->AddPage();
        
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,5,'FECHA: '.$fecha,0,1,'R');
        $reporte->Cell(190,5,'HORA: '.$hora,0,1,'R');

        $reporte->SetFont('Arial','BU',18);
        $reporte->Cell(190,15,'REPORTE DE CONTRATO',0,1,'C');
                
        $reporte->SetFont('Arial','',12);
        $reporte->Ln(4);
        $reporte->MultiCell(190,8,utf8_decode('Se muestra a continuación los detalles del contrato que se tiene/tuvo con '. $_GET['nombre'] .', que se identifica con DNI número '. $_GET['entrenador'] .', quien presta/prestó sus servicios de entrenador(a) en la empresa durante el mes de '. $meses[$mes-1] .'.'),0,'L');
        $reporte->MultiCell(190,8,utf8_decode('El tiempo de contrato es de un mes a partir de la fecha de consolidación del contrato, el sueldo se entregará una vez cumplido el contrato, no antes ni después.'),0,'L');

        $reporte->Ln(5);

        $reporte->SetFont('Arial','b',10);
        $reporte->SetFillColor(255,255,0);
        $reporte->Cell(26,8,'DNI',1,0,'C',true);
        $reporte->Cell(61,8,'NOMBRE Y APELLIDOS',1,0,'C',true);
        $reporte->Cell(35,8,'T. TRABAJO',1,0,'C',true);
        $reporte->Cell(18,8,'SUELDO',1,0,'C',true);
        $reporte->Cell(22,8,'AUMENTO',1,0,'C',true);
        $reporte->Cell(28,8,'F. CONTRATO',1,1,'C',true);

        $reporte->SetFont('Arial','',10);
        $reporte->Cell(26,8,$_GET['entrenador'],1,0,'C');
        $reporte->Cell(61,8,utf8_decode($_GET['nombre']),1,0,'C');
        $reporte->Cell(35,8,$_GET['tiempo'],1,0,'C');
        $reporte->Cell(18,8,'S/'.$_GET['sueldo'],1,0,'C');

        if($_GET['tiempo']=='MEDIO TIEMPO'){
            $reporte->Cell(22,8,'S/'.($_GET['sueldo']-450),1,0,'C');
        }else{
            $reporte->Cell(22,8,'S/'.($_GET['sueldo']-900),1,0,'C');
        }
        
        $reporte->Cell(28,8,$_GET['fecha'],1,1,'C');
        
        $reporte->Ln(8);
        $reporte->SetFont('Arial','I',7);
        $reporte->MultiCell(190,8,utf8_decode('*Si presenta cualquier inconformidad o reclamo sobre los datos detallados en la tabla, comunicarse con el administrador de turno.'),0,'L');
        $reporte->Ln(50);
        $reporte->Cell(190,8,'-------------------------------------------------------------------',0,1,'C');
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,8,'FIRMA DEL ADMINISTRADOR',0,0,'C');

        $reporte->OutPut('D','Contrato '. utf8_decode($_GET['nombre']) . ' - '. $meses[$mes-1].'.pdf');
    
    }
?>