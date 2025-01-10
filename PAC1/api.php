<?php
// URL de la API
$url = 'https://jsonplaceholder.typicode.com/users';

// Obtiene los datos de la API
$response = file_get_contents($url);

// Verifica si la respuesta es válida
if ($response !== false) {
    // Decodifica el JSON en un array asociativo
    $usuarios = json_decode($response, true);

    // Verifica si la decodificación fue exitosa
    if (is_array($usuarios)) {
        // Comienza la tabla HTML
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Nombre</th><th>Correo Electrónico</th><th>Ciudad</th></tr>';

        // Recorre los datos y crea filas de la tabla
        foreach ($usuarios as $user) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($user['id']) . '</td>';
            echo '<td>' . htmlspecialchars($user['name']) . '</td>';
            echo '<td>' . htmlspecialchars($user['email']) . '</td>';
            echo '<td>' . htmlspecialchars($user['address']['city']) . '</td>';
            echo '</tr>';
        }

        // Cierra la tabla HTML
        echo '</table>';
    } else {
        echo 'Error al decodificar los datos JSON.';
    }
} else {
    echo 'Error al obtener los datos de la API.';
}
?>
