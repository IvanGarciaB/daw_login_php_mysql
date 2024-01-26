<?php
$nombre=$_POST['nombre'];
$contraseña=$_POST['contraseña'];
//echo $nombre;
//echo $contraseña;
$conexion=new PDO("mysql:host=localhost;dbname=test","root", "");
$consulta=$conexion->query("select * from usuarios where nombre='".$nombre."' and contraseña='".$contraseña."'");
//echo(var_dump($consulta));
//while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
//    echo $fila['nombre'];
//}
if ($consulta->rowCount()>0){
    session_start();
    $token = bin2hex(random_bytes(32)); // Genera un token aleatorio de 64 caracteres hexadecimales

    // Almacena el token en la sesión
    $_SESSION["token"] = $token;
    $_SESSION["nombre"]=$nombre;
    header("Location:welcome.php");
}

else{
    header("Location:registro.php");
}