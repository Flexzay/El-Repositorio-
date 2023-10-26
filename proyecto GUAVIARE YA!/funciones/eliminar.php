<?php

/**
 * Elimina un usuario de la base de datos.
 * Autor: Ricardo Rivera - Salvador Pores.
 * @return string Mensaje que indica si la eliminación fue exitosa o no.
 */

// Definición de la función "borrar_usuario" con parámetros de entrada y un valor de retorno.
function borrar_usuario()
{
    $salida = "";  // Variable para almacenar el mensaje de salida
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_guaviareya');  // Conectar a la base de datos

    $Correo = $_GET['Correo'];

    // Verificar si el usuario existe antes de intentar eliminarlo
    $verificar_usuario = "SELECT * FROM tb_Usuarios WHERE Correo = '$Correo'";
    $resultado_verificacion = $conexion->query($verificar_usuario);

    if ($resultado_verificacion->num_rows > 0) {
        // El usuario existe, proceder con la eliminación
        // Construir la consulta SQL para borrar un registro en la tabla 'usuarios'
        $sql = "DELETE FROM tb_Usuarios WHERE Correo = '$Correo'";
        $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

        // Verificar si la consulta fue exitosa
        if ($resultado) {
            $salida = "Usuario eliminado con éxito";  // Mensaje de éxito
        } else {
            $salida = "Error al eliminar, inténtelo de nuevo: ";  // Mensaje de error
        }
    } else {
        // El usuario no existe
        $salida = "Usuario no encontrado";
    }

    $conexion->close();  // Cerrar la conexión a la base de datos
    return $salida;  // Devolver el mensaje de salida
}
