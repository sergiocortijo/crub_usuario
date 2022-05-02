<?php

require './funcionConectar.php';
//var_dump($_POST);
//echo '<BR>';

$usuario = $_POST['usuario'];
//echo $usuario.'<br>';
$conexion = conectar();
$consulta = "delete from usuarios where usuario='" . $usuario . "';";
//echo $consulta.'<br>';
$clave = $conexion->query($consulta);
echo 'USUARIO BORRADO CORRECTAMENTE';
echo '<hr>';
echo '<a href="./gestionaUsuarios.php"><button>VOLVER</button></a>';

