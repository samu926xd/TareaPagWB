<?php 

session_start();
$_SESION =[]; /* para reiniciar la sesión y eliminar todos los datos de sesión */

session_destroy(); /* parar cerrar la sesion */
header("Location: S3 Web II.html"); /* para redirigir al usuario a la página de inicio */
exit(); /* para asegurarse de que no se ejecute más código después de redirigir */