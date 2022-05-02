<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>INTRODUZCA USUARIO Y CONTRASEÑA></h3>
        <form action='insertarUsuario.php' method="POST">
            USUARIO:<br>
            <input type ='text' name='nuevoUsuario'>
            <br>CLAVE <br>
            <input type ='password' name='nuevaClave1'>
            <br>REPITA LA  CLAVE<br>
            <input type ='password' name='nuevaClave2'>
            <br>
            <input type="submit" value="AÑADIR USUARIO">
        </form>
        <hr>
        <a href="./gestionaUsuarios.php"><button>VOLVER</button></a>
    </body>
</html>


