<?php
// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener la lista de productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar la lista de productos
    echo "<h1>Lista de productos</h1>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<h2>" . $row["nombre"] . "</h2>";
        echo "<p>Precio: $" . $row["precio"] . "</p>";
        echo "<p>Descripción: " . $row["descripcion"] . "</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "No hay productos disponibles";
}

// Cerrar conexión
$conn->close();
?>