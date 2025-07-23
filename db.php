<?php 
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="organizacion";

    $enlace = mysqli_connect ($servidor, $usuario, $clave, $baseDeDatos);
    if (!$enlace) {
        die("❌ Error de conexión: " . mysqli_connect_error());
       
             
    } 
?>    

<?php 
    if(isset($_POST['registro'])){

        $rut= $_POST['rut'];
        $nombre= $_POST ['nombre'];
        $correo= $_POST ['correo'];
        $direccion= $_POST ['direccion'];
        $telefono= $_POST ['telefono'];
        

        $insertDB = "INSERT INTO donante  (Id_Donante,Nombre,Correo, Direccion, Telefono) VALUES('$rut','$nombre','$correo','$direccion','$telefono')";  
        $act = mysqli_query ($enlace,$insertDB);

       /* mysqli_query($enlace, $insertDonante);
        $idDonante = mysqli_insert_id($enlace);*/
        /*header("Location: S6.php");*/
       header("Location: S6.php?id_Donante=$idDonante");
        exit();
    }
    
?>
