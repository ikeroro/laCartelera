<?php
require '../conexion.php';

$sql = "SELECT nombre FROM generos";
$resultado = $conexion->query($sql);
$generos = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($generos);   
?>