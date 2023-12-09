<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API REST de Libros</title>
</head>
<body>
    <h1>API REST de Libros</h1>

    <?php
    // Manejo de Formularios
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validación básica de campos (puedes mejorar esto)
        if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['anio'])) {
            $nuevoLibro = array(
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'anio' => $_POST['anio']
            );
            $resultado = crearLibro($nuevoLibro);
            echo "<p>Nuevo Libro Creado:</p>";
            print_r($resultado);
        } else {
            echo "<p>Por favor, completa todos los campos.</p>";
        }
    }

    // Función para hacer solicitudes POST
    function crearLibro($datos) {
        $url = 'http://api.example.com/libros';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }
    ?>

    <h2>Agregar un Nuevo Libro</h2>
    <form method="POST" action="">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required>

        <label for="anio">Año de Publicación:</label>
        <input type="number" name="anio" required>

        <button type="submit">Agregar Libro</button>
    </form>


</body>
</html>
