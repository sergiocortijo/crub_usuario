<?php

function conectar( $baseDeDatos='usuarios',$usuario='alumno',$contraseña='alumno') {
    try {
        $dsn = "mysql:host=localhost;dbname=".$baseDeDatos.";"; //;charset=utf8
        $conexion = new PDO($dsn, $usuario, $contraseña);
    } catch (PDOException $e) {
        //mostramos el mensaje de error
        echo 'Falló la conexión: ' . $e->getMessage();
        exit();
    }
    //activamos para que los errores en las query lancen una exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
}
