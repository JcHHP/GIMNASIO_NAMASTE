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

    if(isset($_GET['fecha1']) && isset($_GET['nombre1']) && isset($_GET['monto1']) && isset($_GET['tamaño'])){

        $año= substr($_GET['fecha1'],0,4);
        $mes= substr($_GET['fecha1'],5,2);
        $mes = (int)$mes;
        $suma=0;

        $reporte=new pdf();
        $reporte->AddPage();

        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,5,'FECHA: '.$fecha,0,1,'R');
        $reporte->Cell(190,5,'HORA: '.$hora,0,1,'R');

        $reporte->SetFont('Arial','BU',18);
        $reporte->Cell(190,15,'REPORTE DE EGRESOS',0,1,'C');
        
        $reporte->SetFont('Arial','',12);
        $reporte->Ln(4);
        $reporte->MultiCell(190,8,utf8_decode('A continuación se muestran los detalles de los egresos que se tuvieron en la empresa en el transcurso del mes de '.$meses[$mes-1].' del año '.$año.', todos los egresos mostrados en la parte inferior se obtuvieron de los detalles de los contratos (sueldos pagados) que tuvieron los entrenadores de la empresa durante ese lapso de tiempo.'),0,'L');

        $reporte->Ln(5);

        $reporte->SetFont('Arial','b',10);
        $reporte->SetFillColor(255,255,0);
        $reporte->Cell(30,8,'FECHA',1,0,'C',true);
        $reporte->Cell(130,8,'DESCRIPCION',1,0,'C',true);
        $reporte->Cell(30,8,'MONTO',1,1,'C',true);

        $reporte->SetFont('Arial','',10);

        for($i=1;$i<=$_GET['tamaño'];$i++){
            $reporte->Cell(30,8,$_GET['fecha'.$i],1,0,'C');
            $reporte->Cell(130,8,utf8_decode('     Nuevo contrato con ').utf8_decode($_GET['nombre'.$i]),1,0,'L');
            $reporte->Cell(30,8,'S/'. $_GET['monto'.$i] .'.00',1,1,'C');
            
            $suma+=$_GET['monto'.$i];
        }

        $reporte->SetFont('Arial','B',9);
        $reporte->Cell(160,8,"EGRESO TOTAL DEL MES",1,0,'C');

        $reporte->SetFont('Arial','B',10);
        $reporte->SetFillColor(236,155,255);
        $reporte->Cell(30,8,'S/'.$suma.'.00',1,0,'C',true);

        $reporte->Ln(8);
        $reporte->SetFont('Arial','I',7);
        $reporte->MultiCell(190,8,utf8_decode('*Todos los detalles mostrados son íntegros, ya que estos fueron extraídos de la base de datos de la empresa.'),0,'L');
        $reporte->Ln(50);
        $reporte->Cell(190,8,'-------------------------------------------------------------------',0,1,'C');
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,8,'FIRMA DEL ADMINISTRADOR',0,0,'C');

        $reporte->OutPut('D','Egresos - '. $meses[$mes-1] .' '. $año.'.pdf');
        $reporte->OutPut();

    }
    
?>