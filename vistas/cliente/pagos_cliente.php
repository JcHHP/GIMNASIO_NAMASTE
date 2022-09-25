<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/cliente/pagos_cliente.css">

</head>
<body>
    <div class="titulo-modulo">
        <p>TABLA DE PAGOS</p>
    </div>

    <div class="contenedor-principal">
        <div class="crud-pagos">
            <table class='tabla-pagos'>
                <thead>
                    <th>MES</th>
                    <th>FECHA DE PAGO</th>
                    <th>MONTO</th>
                    <th>TIPO DE PLAN</th>
                    <th>CANTIDAD DE SESIONES</th>
                    <th>DETALLES</th>
                </thead>

                <tr>
                    <?php include('../controladores/cliente/pagos_cliente_controlador.php');?>
            </table>
        </div>
    </div>
</body>
</html>