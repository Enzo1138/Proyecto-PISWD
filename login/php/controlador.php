<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","escuelatecnica6","3306");

$consulta="SELECT*FROM usuario where Nombre='$usuario' and Clave='$contrasena'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:sistema.php");
}else{
    ?>
    <?php
    include("login.html");
    ?>
    <h1>ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
