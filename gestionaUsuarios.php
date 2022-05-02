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
        <style>
            table{
                border: solid black 2px;
            }
            
            td{
                border: solid black 1px;
            }
        </style>
    </head>
    <body>
        <?php
        //tenemos la funcion conectar
        require './funcionConectar.php';
        $conexion = conectar();

        $consulta = "select * from usuarios";

        $resultado = $conexion->query($consulta);
        ?>
        <table>
            <h1>GESTIÓN DE USUARIOS</h1>
            <tr>
                <td style="text-align: center;">Nombre</td>
                <td colspan="2" style="text-align: center;">Acción</td>
            </tr>
            <?php
            //un tr por cada tupla  de $resultado
            //abrimos while y lo dejamos abierto
            while ($tupla = $resultado->fetch()) {
                ?>
                <tr>
                    <td>
                        <?php echo $tupla['usuario']; ?>
                    </td>
                    <td>
                        <form action="FormModificarClave.php" method="POST">
                            <button name="editar" 
                                    value="<?php echo $tupla['usuario']; ?>">
                                <img width="15" height="15" 
                                     src="imagenes/modificar.png" 
                                     title="Cambiar clave"/>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="FormBorrarUsuario.php" method="POST">
                            <button name="borrar" 
                                    value="<?php echo $tupla['usuario']; ?>">
                                <img width="15" height="15" 
                                     src="imagenes/delete.jpg" 
                                     title="Borrar usuario"/>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                //cerramos el while
            }
            ?>
                <tr>
                    <td colspan="3">
                        <form action="FormInsertarUsuario.php" method="POST"> 
                            <button name="nuevo"> <!--no le hace falta value -->
                                <img width="15" height="15" 
                                     src="imagenes/insertar.png" 
                                     title="Nuevo usuario"/>
                                NUEVO USUARIO
                            </button>
                        </form>
                    </td>
                </tr>

        </table>
    </body>
</html>
