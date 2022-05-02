<?php
require './funcionConectar.php';
// recogemos los datos del fomulario
$claveAnterior = $_POST["claveAnterior"];
$claveNueva1 = $_POST["claveNueva1"];
$claveNueva2 = $_POST["claveNueva2"];
$usuario = $_POST["usuario"];
/* Paso 1: Comprobar que la contraseña nueva es correcta
 * Paso 2: Comprobar que la contraseña antigua es del usuario
 * Paso 3: Modificar la contraseña en la base de datos
 */

if ($claveNueva1 !== $claveNueva2) {
    echo "No coinciden las claves";
    echo '<br>';
} else {
    // Hacemos una conexion con la base de datos

    $conexion = conectar();
    //Recogemos la clave actual del usuario
    $consulta = "select clave from usuarios where usuario ='$usuario';";
    $resultado = $conexion->query($consulta);
    //recogemos la que hay ahora en la base de datos (md5)
    $claveActual = $resultado->fetch()["clave"];
    //Comprobamos la clave anterior  (la del formulario)con la clave actual
    if (md5($claveAnterior) !== $claveActual) {
        echo "La clave anterior es erronea";
        echo '<br>';
    } else {
        //modificamos la clave
        $consulta = "update usuarios set clave='" . md5($claveNueva1) . "';";
        $conexion->query($consulta);
        echo "CLAVE MODIFICADA CORRECTAMENTE";
        echo '<br>';
    }
}    
 echo '<a href="gestionaUsuarios.php"><button>VOLVER</button></a>';

