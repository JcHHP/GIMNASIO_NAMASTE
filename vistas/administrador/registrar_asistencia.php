<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="../styles/administrador/registrar_asistencia.css">
</head>
<body>
    <div class="titulo-modulo">
        <p>LISTA DE USUARIOS</p>
    </div>

    <div class="contenido_principal">
        <div class="caja-busqueda">
            <span>BUSQUEDA POR DNI</span>
            <input type="text" maxlength=8 placeholder="Ingrese el número de DNI" id="input-busqueda">
        </div>

        <div class="tabla-datos">
            <table id="tabla">
                
                <tr>
                    <?php include('../controladores/administrador/registrar_asistencia_controlador.php');?>
            </table>
        </div>
    </div>

    <script src="../scripts/administrador/registrar_asistencia.js"></script>
</body>
</html>