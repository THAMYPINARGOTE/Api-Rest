<?php

// Función para hacer solicitudes GET
function obtenerLibros() {
    $url = 'http://api.example.com/libros';
    $ch = curl_init($url);

    // Configuración de opciones de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);

    // Verificar errores en la solicitud
    if (curl_errno($ch)) {
        echo 'Error al hacer la solicitud: ' . curl_error($ch);
    }

    // Cerrar la sesión cURL
    curl_close($ch);

    // Decodificar la respuesta JSON
    $result = json_decode($response, true);

    // Verificar si la decodificación fue exitosa
    if ($result === null && json_last_error() !== JSON_ERROR_NONE) {
        echo 'Error al decodificar la respuesta JSON';
    }

    return $result;
}

// Uso de la función para obtener libros
$libros = obtenerLibros();

// Imprimir los resultados
print_r($libros);

// Función para hacer solicitudes GET por ID
function obtenerLibroPorId($id) {
    $url = 'http://api.example.com/libros/' . $id;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

// Función para hacer solicitudes PUT
function actualizarLibro($id, $datos) {
    $url = 'http://api.example.com/libros/' . $id;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

// Función para hacer solicitudes DELETE
function eliminarLibro($id) {
    $url = 'http://api.example.com/libros/' . $id;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}
?>
