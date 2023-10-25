<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Insertar</title>
</head>
<body>
    <h1>Insertar Valores</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nombre">Id: </label>
        <input type="text" id="id" name="id" required><br>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="apellido">Apellido: </label>
        <input type="text" id="apelldio" name="apellido" required><br>
        <label for="nacimiento">Nacimiento: </label>
        <input type="text" id="nacimiento" name="nacimiento" required><br>  
        <input type="submit" value="Agregar registro">
    </form>
    <?php
     // Configuración de la conexión a la base de datos
     $servername = "localhost";
     $username = "root";
     $password = "admin";
     $dbname = "lunes";
 
     // Crear conexión
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Verificar la conexión
     if ($conn->connect_error) {
         die("La conexión a la base de datos falló: " . $conn->connect_error);
     }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nacimiento = $_POST["nacimiento"];
 

    // Consulta SQL para insertar una nueva persona en la tabla
    $sql = "INSERT INTO martes (id, nombre, apellido, nacimiento) VALUES ('$id ', '$nombre', '$apellido', '$nacimiento')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Nueva persona agregada con éxito.";
    } else {
        echo "Error al agregar la persona: " . $conn->error;
    }
}
    ?>
</body>
</html>