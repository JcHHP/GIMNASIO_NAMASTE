<?php
 require_once('../modelos/entrenador/agregarEjercicioM.php');
 
if(isset($_POST['NombreEjercicio1'])){
           // $adminM = new AdminM();
  
            if(isset($_FILES['Ejercicios1']['name'])){
                switch ($_FILES['Ejercicios1']['type']) {

                      case 'image/jpeg':  $ext = 'jpg'; break;
            //        case 'image/gif':   $ext = 'gif'; break;
                      case 'image/png':   $ext = 'png'; break;
                      case 'image/tiff':  $ext = 'tif'; break;
                      default:            $ext = ''; break;
               }
                if ($ext){
                     $nombre= $_FILES['Ejercicios1']['name'];
                     $Tipo= $_FILES['Ejercicios1']['type'];
                     $tam= $_FILES['Ejercicios1']['size'];
                     $ImageSubida = fopen($_FILES['Ejercicios1']['tmp_name'],'r');    // Abre un fichero o un URL 'r' solo lelctura
                     $binario=fread($ImageSubida,$tam) ;                       // Lectura de un fichero en modo binario seguro
                     $datosC =array();
                    // $datosC['NombreEjer'] = mysql_entities_fix_string($_POST['NombreEjercicio1']);
                    // $datosC['Descripcion'] = mysql_entities_fix_string($_POST['DescripcionEjercicio1']);
                    // $datosC['Nivel'] =mysql_entities_fix_string($_POST['NivelEjercicio1']);

                     $datosC['NombreEjer'] = $_POST['NombreEjercicio1'];
                     $datosC['Descripcion'] = $_POST['DescripcionEjercicio1'];
                     $datosC['Nivel'] =$_POST['NivelEjercicio1'];
                     $datosC['imagenBinario'] =$binario;
                
                      $resultado = insertarEjerM($datosC);
                    // echo $resultado;
               }

           } else{

            echo "imagen";
                    }
          
       }
       else {
           
       }

       

?>

