<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/entrenador/sueldo_entrenador.css">

</head>
<body>
    <div class="titulo-modulo">
        <p>TABLA DE PAGOS</p>
    </div>

    <div class="contenido-principal">
        <table class='table'>
            <thead>                  
                <th>Tiempo de contrato(meses)</th>
                <th>Fecha de Pago</th>
                <th>Monto</th>
                <th>Detalle</th>
            </thead>

            <tbody>
                <tr>
                    <?php include('../controladores/Entrenador/pagos_entrenador.php'); ?>
            </tbody>
                
        </table>
    </div>
</body>
</html>