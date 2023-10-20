<?php

/**
 * Realiza una consulta a la base de datos y devuelve los resultados formateados como una cadena de texto.
 * Autor: Cristian Ricardo Rivera Montañez.
 *
 * @param string $u Documento para buscar datos en la tabla usuarios. (Opcional, por defecto es null)
 * @return string Devuelve una cadena con los valores de la tabla 'usuarios' separados por saltos de línea.
 */
function consulta($u = null)
{
    // Se inicializa una variable para acumular los resultados.
    $salida = "";

    // Se establece la conexión a la base de datos con el servidor, nombre de usuario, contraseña y nombre de la base de datos.
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');

    // Se define la consulta SQL para seleccionar todos los registros de la tabla 'usuarios'.
    $sql = "SELECT * FROM usuarios";

    // Si se proporciona un documento, se agrega una condición WHERE a la consulta.
    if ($u != null) {
        $sql .= " WHERE documento='$u'";
    }

    // Se ejecuta la consulta y se obtiene el conjunto de resultados.
    $resultado = $conexion->query($sql);

    // Se recorren las filas de resultados y se concatenan las columnas a la variable de salida.
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= $fila['documento'] . "<br>"; // Concatenación del primer campo
        $salida .= $fila['nombre'] . "<br>"; // Concatenación del segundo campo
        $salida .= $fila['sitio'] . "<br>"; // Concatenación del tercer campo
        $salida .= $fila['bienvenida'] . "<br>"; // Concatenación del cuarto campo
    }

    // Se cierra la conexión a la base de datos.
    $conexion->close();

    // Se devuelve la cadena acumulada con los resultados de la consulta.
    return $salida;
}
