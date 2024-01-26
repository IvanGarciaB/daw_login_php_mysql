<?php
session_start();

//guardar en la base de datos
$conexion=new PDO("mysql:host=localhost;dbname=test","root","");
$consulta=$conexion->prepare("update usuarios set info=:info where nombre=:nombre");
$consulta->bindParam(":info",$_SESSION['consulta']);
$consulta->bindParam(":nombre",$_SESSION['nombre']);
$consulta->execute();
// Destruye todas las variables de sesión
session_unset();
session_destroy();

// Redirige a la página de inicio
header("Location: index.php");
exit();