<?php
    session_start();

    if(!isset($_SESSION['perfil-usuario']) || $_SESSION['perfil-usuario']!=='administrador'){
        header('location:../index.php');
    }

    $cliente=$_SESSION["DNI-usuario"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GIMNASIO NAMASTE</title>

    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="shortcut icon" href="../icons/namaste.png" type="image/x-icon">

    <script src="../scripts/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/84156eae16.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor_general">
        <div class="barra_menu">
            <div class="encabezado">
                <img src="../icons/namaste_index.png">
                <h1>GIMNASIO <label>NAMASTE</label></h1>
            </div>

            <div class="opciones_menu">
                
                <div class="opcion">
                    <i class="fa-regular fa-calendar-days"></i>
                    <a href="administrador.php?modulo=asistencia">REGISTRAR ASISTENCIA</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-file-pen"></i>
                    <a href="administrador.php?modulo=matricula">NUEVA MATRICULA</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-handshake"></i>
                    <a href="administrador.php?modulo=contrato">NUEVO CONTRATO</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-user-plus"></i>
                    <a href="administrador.php?modulo=nuevocliente">NUEVO CLIENTE</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-user-plus"></i>
                    <a href="administrador.php?modulo=nuevoentrenador">NUEVO ENTRENADOR</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-chart-line"></i>
                    <a href="administrador.php?modulo=estadocuentas">ESTADO DE CUENTAS</a>
                </div>

                <div class="opcion">
                <i class="fa-solid fa-file-lines"></i>
                    <a href="administrador.php?modulo=reportes">REPORTES</a>
                </div>
            </div>
        </div>

        <div class="contenido">
            <div class="cabecera">
                <?php include('../controladores/nombre_usuario_controlador.php');?>
                <i class="fa-solid fa-circle-user"></i>

                <div class="boton_salir">
                    <a href="../controladores/cerrar_sesion.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </div>
            </div>
            
            
            <div class="contenido-modulo">
                <?php include('../controladores/administrador/modulos_administrador.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>