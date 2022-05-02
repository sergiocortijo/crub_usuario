<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>BORRANDO : <?php echo $_POST['borrar']; ?></h3><br>
        <form action='borrarUsuario.php' method="POST">
            <button name='usuario' value='<?php echo $_POST['borrar']; ?>'>
                CONFIRMAR 
            </button>
        </form>
        <hr>
        <a href="./gestionaUsuarios.php"><button>VOLVER</button></a>
    </body>
</html>


