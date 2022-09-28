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

    if(isset($_GET['usuario1']) && isset($_GET['nombre1']) && isset($_GET['fecha1']) && isset($_GET['hora1']) && isset($_GET['tamaño']) && isset($_GET['perfil'])){
        $mes= substr($_GET['fecha1'],5,2);
        $mes = (int)$mes;
        $año= substr($_GET['fecha1'],0,4);

        $reporte=new pdf();
        $reporte->AddPage();

        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,5,'FECHA: '.$fecha,0,1,'R');
        $reporte->Cell(190,5,'HORA: '.$hora,0,1,'R');

        $reporte->SetFont('Arial','BU',18);
        $reporte->Cell(190,15,'REPORTE DE ASISTENCIAS',0,1,'C');
        
        $reporte->SetFont('Arial','',12);
        $reporte->Ln(4);
        $reporte->MultiCell(190,8,utf8_decode('Se muestra a continuación los detalles de las asistencias que tuvo el/la '.$_GET['perfil'].'/a '. utf8_decode($_GET['nombre1']) .', que se identifica con DNI número '. $_GET['usuario1'] .', los datos mostrados en la parte inferior corresponden al mes de '. $meses[$mes-1].' del año ' .$año.'.'),0,'L');
        $reporte->MultiCell(190,8,utf8_decode('Todas las asistencias que se muestran, fueron registradas por el administrador de turno, estas se registraron cada vez que el/la '.$_GET['perfil'].'/a ingresó al gimnasio.'),0,'L');

        $reporte->Ln(5);

        $reporte->SetFont('Arial','b',10);
        $reporte->SetFillColor(255,255,0);
        $reporte->Cell(35,8,'DNI',1,0,'C',true);
        $reporte->Cell(85,8,'NOMBRE Y APELLIDOS',1,0,'C',true);
        $reporte->Cell(35,8,'FECHA',1,0,'C',true);
        $reporte->Cell(35,8,'HORA',1,1,'C',true);

        $reporte->SetFont('Arial','',10);

        for($i=1;$i<=$_GET['tamaño'];$i++){
            $reporte->Cell(35,8,$_GET['usuario'.$i],1,0,'C');
            $reporte->Cell(85,8,utf8_decode($_GET['nombre'.$i]),1,0,'C');
            $reporte->Cell(35,8,$_GET['fecha'.$i],1,0,'C');
            $reporte->Cell(35,8,$_GET['hora'.$i],1,1,'C');
        }

        $reporte->SetFont('Arial','B',9);
        $reporte->Cell(155,8,"CANTIDAD DE ASISTENCIAS EN EL MES",1,0,'C');

        $reporte->SetFont('Arial','B',10);
        $reporte->SetFillColor(236,155,255);
        $reporte->Cell(35,8,$_GET['tamaño'],1,0,'C',true);

        $reporte->Ln(8);
        $reporte->SetFont('Arial','I',7);
        $reporte->MultiCell(190,8,utf8_decode('*Si presenta cualquier inconformidad o reclamo sobre los datos detallados en la tabla, comunicarse con el administrador de turno.'),0,'L');
        $reporte->Ln(50);
        $reporte->Cell(190,8,'-------------------------------------------------------------------',0,1,'C');
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,8,'FIRMA DEL ADMINISTRADOR',0,0,'C');

        $reporte->OutPut('D','Asistencias '. utf8_decode($_GET['nombre1']) .' - '.$meses[$mes-1] .' '. $año.'.pdf');

    }    
?>