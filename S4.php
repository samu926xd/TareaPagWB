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
    $stmt = $enlace->prepare("SELECT * FROM donante");
    $stmt->execute();
    $result = $stmt->get_result();
    $datos = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close(); 
    
    $stmtProyecto = $enlace->prepare("SELECT * FROM proyecto"); // Usa mayúscula si la tabla tiene mayúscula
    $stmtProyecto->execute();
    $resultProyecto = $stmtProyecto->get_result();
    $datosProyecto = $resultProyecto->fetch_all(MYSQLI_ASSOC);
    $stmtProyecto->close();
?>    
<?php

?> 

<?php 
    if(isset($_POST['donar'])){
        $monto= $_POST['monto'];
        $rut= $_POST['rut'];
        $dato= $_POST['dato']; /* es id_Proyecto*/

        $verificarDonante = $enlace->prepare("SELECT Id_Donante FROM donante WHERE Id_Donante = ?");
        $verificarDonante->bind_param("i", $rut);
        $verificarDonante->execute();
        $resDonante = $verificarDonante->get_result();

        // Validar que el proyecto existe
        $verificarProyecto = $enlace->prepare("SELECT Id_Proyecto FROM proyecto WHERE Id_Proyecto = ?");
        $verificarProyecto->bind_param("s", $dato);
        $verificarProyecto->execute();
        $resProyecto = $verificarProyecto->get_result();

        if ($resDonante->num_rows > 0 && $resProyecto->num_rows > 0) {
            $insertar = $enlace->prepare("INSERT INTO donacion (Monto,Fecha, Id_Proyecto, Id_Donante) VALUES (?,NOW(), ?, ?)");
            $insertar->bind_param("dsi", $monto, $dato, $rut);
            $insertar->execute();
            echo "✅ Donación registrada con éxito.";
            header("Location: S3 Web II.html");
            exit();
            $insertar->close();
        } else {
            echo "⚠️ El ID del Donante o el Proyecto no existe.";
        }
        $verificarDonante->close();
        $verificarProyecto->close();
}
$enlace->close();
?>