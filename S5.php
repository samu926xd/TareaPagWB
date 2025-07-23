<?php  
session_set_cookie_params([ /* para eliminar las cookies al cerrar el navegador ademas, tiene cifrado para cambiar el dominio y no permite el acceso a los datos mediante javaScript */
    "lifetime" => 0, 
    "path" => '/',
    "domain" => 'Semana5_WebII.org', 
    "secure" => true, 
    "httponly" => true, 
    "samesite" => 'Strict' 
]);

session_start(); /* metodo para iniciar sesion usuario predifinido por mi */
if ($_POST["Usuario"] =="Admin" && $_POST["Contraseña"] =="1234"){
    session_regenerate_id(true); /* para regenerar el ID de sesión y prevenir ataques de fijación de sesión */
    $_SESSION["Usuario"]="Admin";
    $_SESSION["Titulo"]="Bienvenido al sistema de eventos y Donaciones";
    header("Location: S5_1.php");/*para redirigir al usuario a la pagina de donacion */
} else {
    echo"Acceso no valido, vuelve a intentarlo";
    
}