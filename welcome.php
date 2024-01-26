<html>
<body>
<?php
session_start();

// Verifica si el token de sesión está presente
if (!isset($_SESSION["token"])) {
    // Si no hay un token de sesión, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

?>
<h2>Welcome cambiado</h2>
<p>texto nuevo</p>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $_SESSION['consulta']=$_POST['consulta'];
    echo $_SESSION['consulta'];
}
?>
<p>Introduce tu consulta</p>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <input type="text" id="consulta" name="consulta">
    <input type="submit" value="Consultar">
</form>
<a href="logout.php">Cerrar sesión</a>
</body>
</html>