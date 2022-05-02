<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>MODIFICANDO CLAVE DE: <?php echo $_POST['editar']; ?></h1>
        <form action="modificarClave.php" method="POST">
            CLAVE ANTERIOR <br/>
            <input type ="password" name="claveAnterior"/> <br/>
            CLAVE NUEVA <br/>
            <input type ="password" name="claveNueva1"/> <br/>
            REPITA LA NUEVA CLAVE <br/>
            <input type ="password" name="claveNueva2"/> <br/>
            <button name="usuario" value="<?php echo $_POST['editar']; ?>">
                MODIFICAR
            </button>
        </form>
        <a href="gestionaUsuarios.php">
            <button>VOLVER</button>
        </a>
    </body>
</html>
