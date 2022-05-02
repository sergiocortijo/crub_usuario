<?php
//function para conectar en este ejercicio (mysql:host=localhost)
require './funcionConectar.php';

//conectamos con el servidor a la base de datos mysql 
//como root, para poder crear una base de datos
$conexion = conectar("mysql", "root", "");
echo"CONECTADO COMO root</br>";

//borramos la base de datos, en caso de que no exista 
//ponemos un mensaje.
try {
//borramos la base de datos usuarios
    $consulta = "drop database usuarios;";
    $conexion->query($consulta);
    echo" se ha borrado la base de datos usuarios</br>";
} catch (PDOException $e) {
    echo"la base de datos usuarios no existia</br>";
}

//crear la base de datos (si  estaba se habrá borrado)
$consulta = "create database usuarios;";
$conexion->query($consulta);
echo" se ha creado la base de datos usuarios</br>";

//le damos permisos a alumno para que pueda acceder a la 
// base de datos
$consulta = " GRANT ALL PRIVILEGES ON usuarios.* TO 'alumno'@'%';";
$conexion->query($consulta);
echo" se ha dado permiso a alumno para manejar la base de datos usuarios</br>";
echo '<hr>';
//conectamos como alumno a mysql (permiso USAGE)
//con esto podemos ejecutar ordenes

$conexion = conectar("usuarios", "alumno", "alumno");
echo"CONECTADO COMO alumno</br>";

//nos ponemos en la base de datos usuarios
$consulta = "use usuarios;";
$conexion->query($consulta);
echo" usando la base de datos usuarios</br>";

//creamos la tabla usuarios
$consulta = "CREATE TABLE `usuarios`.`usuarios` "
        . "( `usuario` VARCHAR(20) NOT NULL , `clave` VARCHAR(40) NOT NULL ); ";
$conexion->query($consulta);
echo" insertando en la tabla usuarios</br>";

//insertamos unas cuantas tuplas
$consulta = "INSERT INTO `usuarios` (`usuario`, `clave`) "
        . "VALUES ('U', md5('1'));";
$conexion->query($consulta);
$consulta = "INSERT INTO `usuarios` (`usuario`, `clave`) "
        . "VALUES ('jaime', md5('12345678'));";
$conexion->query($consulta);
$consulta = "INSERT INTO `usuarios` (`usuario`, `clave`) "
        . "VALUES ('luis', md5('87654321'));";
$conexion->query($consulta);
$consulta = "INSERT INTO usuarios (usuario, clave) "
        . "VALUES ('barman', md5('rovin'));";
$conexion->query($consulta);

//visualizando lista de usuarios insertados
echo"</br>lista de usuarios insertados</br>";
$consulta = "SELECT * FROM usuarios;";
$lista = $conexion->query($consulta);
while ($usuario = $lista->fetch()) {
    echo $usuario['usuario'] . ' / ' . $usuario['clave'] . '</br>';
}
//cerramos la conexion
$conexion = null;


