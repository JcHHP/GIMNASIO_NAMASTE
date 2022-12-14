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

    if(isset($_GET['usuario']) && isset($_GET['nombre']) && isset($_GET['fecha']) && isset($_GET['plan']) && isset($_GET['pago'])){
        $mes= substr($_GET['fecha'],5,2);
        $año= substr($_GET['fecha'],0,4);
        $mes = (int)$mes;

        $reporte=new pdf();
        $reporte->AddPage();
        
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,5,'FECHA: '.$fecha,0,1,'R');
        $reporte->Cell(190,5,'HORA: '.$hora,0,1,'R');

        $reporte->SetFont('Arial','BU',18);
        $reporte->Cell(190,15,'REPORTE DE MATRICULA',0,1,'C');
                
        $reporte->SetFont('Arial','',12);
        $reporte->Ln(4);
        $reporte->MultiCell(190,8,utf8_decode('A continuación se muestran los detalles de la matrícula que tiene/tuvo '. $_GET['nombre'] .', que se identifica con DNI número '. $_GET['usuario'] .', usuario/a del gimnasio Namaste, dicha matrícula se dió en el mes de '. $meses[$mes-1] .' del año '. $año.'.'),0,'L');
        
        $reporte->Ln(5);

        $reporte->SetFont('Arial','b',10);
        $reporte->SetFillColor(255,255,0);
        $reporte->Cell(26,8,'DNI',1,0,'C',true);
        $reporte->Cell(61,8,'NOMBRE Y APELLIDOS',1,0,'C',true);
        $reporte->Cell(30,8,'PLAN',1,0,'C',true);
        $reporte->Cell(18,8,'PAGO',1,0,'C',true);
        $reporte->Cell(27,8,'DESCUENTO',1,0,'C',true);
        $reporte->Cell(28,8,'F. MATRICULA',1,1,'C',true);

        $reporte->SetFont('Arial','',10);
        $reporte->Cell(26,8,$_GET['usuario'],1,0,'C');
        $reporte->Cell(61,8, utf8_decode($_GET['nombre']),1,0,'C');
        $reporte->Cell(30,8,$_GET['plan'],1,0,'C');
        $reporte->Cell(18,8,'S/'.$_GET['pago'],1,0,'C');

        if($_GET['plan']=='INTERDIARIO'){
            $reporte->Cell(27,8,'S/'.(60-$_GET['pago']),1,0,'C');
        }else{
            $reporte->Cell(27,8,'S/'.(100-$_GET['pago']),1,0,'C');
        }
        
        $reporte->Cell(28,8,$_GET['fecha'],1,1,'C');
        
        $reporte->Ln(8);
        $reporte->SetFont('Arial','I',7);
        $reporte->MultiCell(190,8,utf8_decode('*Si presenta cualquier inconformidad o reclamo sobre los datos detallados en la tabla, comunicarse con el administrador de turno.'),0,'L');
        $reporte->Ln(50);
        $reporte->Cell(190,8,'-------------------------------------------------------------------',0,1,'C');
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,8,'FIRMA DEL ADMINISTRADOR',0,0,'C');

        $reporte->OutPut('D','Matricula '. utf8_decode($_GET['nombre']) . ' - '. $meses[$mes-1].'.pdf');
    }
?>