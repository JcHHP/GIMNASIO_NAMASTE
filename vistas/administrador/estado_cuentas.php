<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="../styles/administrador/estado_cuentas.css">
</head>
<body>
    <div class="titulo-modulo">
        <p>ESTADO DE CUENTAS</p>
    </div>

    <div class="contenido_principal">
        <div class="titulo-mes">
            <h3>ESTADO DE CUENTAS DEL MES DE<span id="mes-resumen"></span></h3>
        </div>
    
        <div class="secciones-estados">
            <div class="ingresos">
                <div class="detalles">
                    <h1 id="monto-ingresos">S/0</h1>
                    <h3>INGRESOS</h3>
                </div>
                <div class="icono-modulo">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                </div>
            </div>

            <div class="egresos">
                <div class="detalles">
                    <h1 id="monto-egresos">S/0</h1>
                    <h3>EGRESOS</h3>
                </div>
                <div class="icono-modulo">
                <i class="fa-sharp fa-solid fa-circle-down"></i>
            </div>
            </div>

            <div class="utilidad">
                <div class="detalles">
                    <h1 id="monto-utilidad">S/0</h1>
                    <h3>UTILIDAD</h3>
                </div>
                <div class="icono-modulo">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
            </div>
        </div>

        <div class="titulo-año">
            <h3>ESTADO DE CUENTAS DEL AÑO<span id="año-resumen"></span></h3>
        </div>

        <div class="contenedor-canvas">
            <canvas id="estadisticas-canvas">

            </canvas>
        </div>
        
    </div>
    
    <script src="../scripts/administrador/chart.min.js"></script>
    <script src="../scripts/administrador/estado_cuentas.js"></script>
</body>
</html>