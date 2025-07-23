<?php 
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="organizacion";

    $enlace = mysqli_connect ($servidor, $usuario, $clave, $baseDeDatos);
    if (!$enlace) {
        die("❌ Error de conexión: " . mysqli_connect_error());
    }  
    $enlace = mysqli_connect ($servidor, $usuario, $clave, $baseDeDatos);
    if (!$enlace) {
        die("❌ Error de conexión: " . mysqli_connect_error());
    }  
    $s1 = $enlace->prepare("SELECT * FROM proyecto");
    $s1->execute();
    $result1 = $s1->get_result();
    $datos = $result1->fetch_all(MYSQLI_ASSOC);
    
    
    
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style WebII.css">
    <title>Registrar Donacion </title>
</head>

<body>
    <h1 id="titulo">Registro de donacion</h1>
     <div class="don-cion">
        <form action="S4.php" method="post" name="organizacion" enctype="multipart/form-data">
            
            <label for ="rut">Rut/Id:</label>
            <input type="number" id="rut" name="rut"required><br>

            <div class="form-floating">
            <label for=""> Selecciona un Proyecto</label>
            <select required name="dato"  class="form-select">
                <?php foreach($datos as $dato): ?>
                    <option value="<?= $dato['Id_Proyecto'] ?>"><?= $dato['Id_Proyecto'] ?></option>
                <?php endforeach; ?>     <br> 
            </select>
            
            </div>


            <label for="numtarje">Numero de Tarjeta:</label> 
            <input type="number" id="numtarje" name="numtarje"required><br>

            <label for="codver">Codigo verificador:</label> 
            <input type="number" id="codver" name="codver"required><br>
            <div>
                <label for="monto">Monto $:</label> 
                <input type="number" id="monto"  name="monto" placeholder="$ CLP">
                <input type="submit" id="donar" name= "donar" value="Depositar">
                <ul id="Cashlist"></ul>
            </div> 
        </form>
        <a href="cerrar_sesion.php" ><button>Cerrar Sesion</button></a> <!-- Boton para cerrar la sesion mediante el metodo session_destroy y ademas redirigir a pag principal*/-->
    </div> </div>
    </body>
    </html>
