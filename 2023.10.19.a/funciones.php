<?php
function consulta()
{                                     //se crea una funcion 
    $salida = 0;                                          //se inicializa la variable 
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');  //conectar con una base de datos
    $sql = "select 2+1";
    $sql .= " as suma";                                 // calcula la suma
    $resultado = $conexion->query($sql);               //muestra resultado

    while ($fila = mysqli_fetch_assoc($resultado)) {

        $salida+=$fila['suma'];
    }



    return $salida;                                        //retorna la opreacion
}                                                            // se cierra la funcion 
