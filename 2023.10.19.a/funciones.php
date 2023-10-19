<?php
function consulta()
{
    $salida = 0;  // Inicializa la variable para almacenar el resultado de la consulta
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar con la base de datos

    // Construir la consulta SQL para obtener la suma de 2+1
    $sql = "select 2+1";
    $sql .= " as suma";  // Alias 'suma' para el resultado de 2+1
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    while ($fila = mysqli_fetch_assoc($resultado)) {  // Recorre el conjunto de resultados
        $salida += $fila['suma'];  // Almacena el valor de 'suma' en la variable de salida
    }

    $conexion->close();  // Cierra la conexión a la base de datos
    return $salida;  // Retorna el resultado de la operación
}


function calcular()
{
    $salida = 0;  // Inicializa la variable para almacenar el resultado de la consulta
    $mayor = "puedes pasar, tienes una edad de:";  // Inicializa la variable para el mensaje mayor de edad
    $menor = "no puedes pasar, tienes una edad de:";  // Inicializa la variable para el mensaje menor de edad
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar con la base de datos

    // Construir la consulta SQL para obtener la edad 17
    $sql = "select 17 as edad";
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    while ($fila = mysqli_fetch_assoc($resultado)) {  // Recorre el conjunto de resultados
        $edad = $fila['edad'];  // Almacena el valor de 'edad' en la variable $edad
        $salida = $edad;

        if ($salida >= 18) {  // Toma una decisión basada en la edad
            $salida = $mayor . $salida;
        } else {
            $salida = $menor . $salida;
        };
    }

    $conexion->close();  // Cierra la conexión a la base de datos
    return $salida;  // Retorna el resultado de la operación
}


function contar_usuario()
{
    $salida = 0;  // Inicializa la variable para almacenar el resultado de la consulta
    $me = "EN LA ACTUALIDAD CUENTA CON: ";  // Inicializa la variable para el mensaje
    $me1 = " USUARIOS";  // Inicializa la variable para el mensaje
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar con la base de datos

    // Construir la consulta SQL para contar los usuarios en la tabla 'usuarios'
    $sql = "select count(*) as conteo_usuarios from usuarios";
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    while ($fila = mysqli_fetch_assoc($resultado)) {  // Recorre el conjunto de resultados
        $salida = $me . $fila['conteo_usuarios'] . $me1;  // Construye el mensaje con el conteo de usuarios
    }

    return $salida;  // Retorna el resultado de la operación
}


// Función para insertar un nuevo usuario en la tabla 'usuarios'
function insertar($documento, $nombre)
{
    $salida = "";  // Variable para almacenar el mensaje de salida
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar a la base de datos

    // Construir la consulta SQL para insertar un nuevo registro en la tabla 'usuarios'
    $sql = "insert into usuarios (documento, nombre) values ('$documento', '$nombre')";
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        $salida = "Registro exitoso";  // Mensaje de éxito
    } else {
        $salida = "Registro denegado: " . $conexion->error;  // Mensaje de error
    }

    $conexion->close();  // Cerrar la conexión a la base de datos
    return $salida;  // Devolver el mensaje de salida
}

// Función para borrar un usuario de la tabla 'usuarios' por su documento
function borrar_usuario($documento)
{
    $salida = "";  // Variable para almacenar el mensaje de salida
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar a la base de datos

    // Construir la consulta SQL para borrar un registro en la tabla 'usuarios'
    $sql = "delete from usuarios where documento = '$documento'";
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        $salida = "Usuario eliminado con éxito";  // Mensaje de éxito
    } else {
        $salida = "Error al eliminar, inténtelo de nuevo: " . $conexion->error;  // Mensaje de error
    }

    $conexion->close();  // Cerrar la conexión a la base de datos
    return $salida;  // Devolver el mensaje de salida
}


function actualizar_sitio($sitio, $documento)
{
    $salida = "";  // Variable para almacenar el mensaje de salida
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar a la base de datos

    // Construir la consulta SQL para actualizar el campo 'sitio' en la tabla 'usuarios'
    $sql = "UPDATE usuarios SET sitio = '$sitio' WHERE documento = '$documento'";
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        $salida = "Actualizaste tu sitio con éxito";  // Mensaje de éxito
    } else {
        $salida = "Error al actualizar, inténtelo de nuevo: " . $conexion->error;  // Mensaje de error
    }

    $conexion->close();  // Cerrar la conexión a la base de datos
    return $salida;  // Devolver el mensaje de salida
}


function mostrar_sitio($documento,$frase)
{
    $salida = "";  // Variable para almacenar el resultado de la consulta
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  // Conectar a la base de datos

    // Construir la consulta SQL para obtener el campo 'sitio' de la tabla 'usuarios'
    $sql = "SELECT sitio FROM usuarios WHERE documento='$documento'";
    $resultado = $conexion->query($sql);  // Ejecutar la consulta SQL

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= "<a href='" . $fila['sitio'] . "'>";  // Construye un enlace con el valor de 'sitio'
        $salida .= "$frase";  // Texto del enlace
        $salida .= "</a>";  // Cierra el enlace
    }

    $conexion->close();  // Cerrar la conexión a la base de datos
    return $salida;  // Devolver el resultado de la operación
}
