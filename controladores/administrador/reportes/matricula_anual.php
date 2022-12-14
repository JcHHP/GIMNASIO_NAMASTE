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

    if(isset($_GET['usuario1']) && isset($_GET['nombre1']) && isset($_GET['fecha1']) && isset($_GET['plan1']) && isset($_GET['pago1']) && isset($_GET['tamaño'])){

        $año= substr($_GET['fecha1'],0,4);

        $reporte=new pdf();
        $reporte->AddPage();

        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,5,'FECHA: '.$fecha,0,1,'R');
        $reporte->Cell(190,5,'HORA: '.$hora,0,1,'R');

        $reporte->SetFont('Arial','BU',18);
        $reporte->Cell(190,15,'REPORTE DE MATRICULA',0,1,'C');
        
        $reporte->SetFont('Arial','',12);
        $reporte->Ln(4);
        $reporte->MultiCell(190,8,utf8_decode('A continuación se muestran los detalles de las matrículas que tuvo '. $_GET['nombre1'] .', que se identifica con DNI número '. $_GET['usuario1'] .', usuario/a del gimnasio Namaste, dichas matrículas se dieron en el transcurso del año '. $año.'.'),0,'L');

        $reporte->Ln(5);

        $reporte->SetFont('Arial','b',10);
        $reporte->SetFillColor(255,255,0);
        $reporte->Cell(26,8,'MES',1,0,'C',true);
        $reporte->Cell(61,8,'NOMBRE Y APELLIDOS',1,0,'C',true);
        $reporte->Cell(30,8,'PLAN',1,0,'C',true);
        $reporte->Cell(18,8,'PAGO',1,0,'C',true);
        $reporte->Cell(27,8,'DESCUENTO',1,0,'C',true);
        $reporte->Cell(28,8,'F. MATRICULA',1,1,'C',true);

        $reporte->SetFont('Arial','',10);

        for($i=1;$i<=$_GET['tamaño'];$i++){
            $reporte->Cell(26,8,$meses[substr($_GET['fecha'.$i],5,2)-1],1,0,'C');
            $reporte->Cell(61,8, utf8_decode($_GET['nombre'.$i]),1,0,'C');
            $reporte->Cell(30,8,$_GET['plan'.$i],1,0,'C');
            $reporte->Cell(18,8,'S/'.$_GET['pago'.$i],1,0,'C');

            if($_GET['plan'.$i]=='INTERDIARIO'){
                $reporte->Cell(27,8,'S/'.(60-$_GET['pago'.$i]),1,0,'C');

            }else{
                $reporte->Cell(27,8,'S/'.(100-$_GET['pago'.$i]),1,0,'C');
            }
            
            $reporte->Cell(28,8,$_GET['fecha'.$i],1,1,'C');
        }

        $reporte->Ln(8);
        $reporte->SetFont('Arial','I',7);
        $reporte->MultiCell(190,8,utf8_decode('*Si presenta cualquier inconformidad o reclamo sobre los datos detallados en la tabla, comunicarse con el administrador de turno.'),0,'L');
        $reporte->Ln(50);
        $reporte->Cell(190,8,'-------------------------------------------------------------------',0,1,'C');
        $reporte->SetFont('Arial','',8);
        $reporte->Cell(190,8,'FIRMA DEL ADMINISTRADOR',0,0,'C');

        $reporte->OutPut('D','Matriculas '. utf8_decode($_GET['nombre1']) . utf8_decode(' - Año '). $año.'.pdf');
    }
    
?>