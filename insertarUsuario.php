<?php

require './funcionConectar.php';
//var_dump($_POST);
$nuevoUsuario = $_POST['nuevoUsuario'];
$nuevaClave1 = $_POST['nuevaClave1'];
$nuevaClave2 = $_POST['nuevaClave2'];

if ($nuevaClave1 != $nuevaClave2) {
    echo 'NO COINCIDEN LOS VALORES';
    echo '<br>';
} else {
    $conexion = conectar();
    $consulta = "select * from usuarios where usuario='".$nuevoUsuario."';";
    // echo $consulta.'<br>';
    //pregunta si hay tuplas (en el fecth())
    if ($conexion->query($consulta)->fetch()) {
        echo 'EL USUARIO YA EXISTE';
        echo '<br>';
    } else {
        //inserta el usario
        $conexion->query("insert into usuarios values "
                . "('$nuevoUsuario',md5('$nuevaClave1'));");
        echo 'USUARIO AÑADIDO CORRECTAMENTE';
        echo '<br>';
    }
}
echo '<hr>';
echo '<a href="./gestionaUsuarios.php"><button>VOLVER</button></a>';

