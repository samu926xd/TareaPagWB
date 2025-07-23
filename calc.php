<?php
$conexion = new mysqli("localhost", "root", "", "organizacion");
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

$sql = "
SELECT 
    proyecto.Nombre,
    COUNT(donacion.Id_Proyecto) AS Cantidad_Donaciones,
    SUM(donacion.Monto) AS Total_Recaudado
FROM 
    donacion
JOIN 
    proyecto ON donacion.Id_Proyecto = proyecto.Id_Proyecto
GROUP BY 
    donacion.Id_Proyecto
HAVING 
    COUNT(donacion.Id_Proyecto) > 1
";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>🔍 Reporte de Proyectos con Donaciones</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; }
        h2 { text-align: center; margin-top: 40px; }
        table { width: 70%; margin: 20px auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>📋 Proyectos con  Donaciones</h2>

<?php if ($resultado->num_rows > 0): ?>
    <table>
        <tr>
            <th>Nombre del Proyecto</th>
            <th>Número de Donaciones</th>
            <th>Total Recaudado ($)</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($fila['Nombre']) ?></td>
            <td><?= $fila['Cantidad_Donaciones'] ?></td>
            <td><?= number_format($fila['Total_Recaudado'], 0, ',', '.') ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p style="text-align:center;">🔎 No hay proyectos con más de 2 donaciones registradas.</p>
<?php endif; ?>

</body>
</html>