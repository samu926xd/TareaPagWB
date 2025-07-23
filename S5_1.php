<?php
session_start(); /* para iniciar la sesión acorde al archivo "S5.php" */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style WebII.css">
    <title>Bienvenido S5 / Inicio De Sesion </title>
</head>

<body>
    <h1 id="titulo">Bienvenido al sistema de eventos y Donaciones</h1>
     <div class="don-cion">
        <form action="db.php" method="post" name="organizacion" enctype="multipart/form-data">
            <label for ="rut">Rut/Id:</label>
            <input type="number" id="rut" name="rut"required><br>
        
            <label for ="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"required><br>
            <label for ="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido"required><br>
            <label for="correo">Email:</label>
            <input type="email" id="correo" name="correo"required><br>
            <label for="direccion">Direccion:</label>
            <input type="texto" id="Direccion" name="direccion"required><br>
            <label for="telefono">Numero de Telefono:</label> 
            <input type="number" id="telefono" name="telefono"required><br>
                
            <input type="submit"  id="registro" name= "registro" value="Registrar"> 
            
        </form>    
            
        </div> 
    </body>
    </html>
