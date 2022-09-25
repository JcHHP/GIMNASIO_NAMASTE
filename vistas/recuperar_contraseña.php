<?php

$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
$clave = "";

for ($i = 0; $i <= 50; $i++) {
    $clave .= $caracteres[rand(0, 62)];
}

// setcookie("token", $clave, time() + 240);

$correo = 'jeancitouno@gmail.com';

$asunto = "Cambio de contraseña";

$headers = "From: support@mynotes28.com" . "\r\n";
$headers .= "CC:" . $correo . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$mensaje = "
    <html>
        <body>
            <p>Hola, recibimos una solicitud para el restablecimiento de tu contraseña en 
            <b>notes 28</b>, si estás de acuerdo:
            <center><button><a href='http://localhost/Proyecto/Vistas/Modulos/cambiarPass.php?token=$clave'>Haz click aquí</a></button></center>
            <br>Si no es así, ignore el correo</p>
        </body>
    </html>

    ";

mail($correo, $asunto, $mensaje, $headers);

echo "works";
?>
