<!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=<, initial-scale-1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
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
    <h1>DATOS DE LA TABLA</h1>

    <?php
    $servername=  "localhost";
    $username= "root";
    $password= "admin";
    $dbname=  "lunes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn -> connect_error){
        die("La conexion de la base de datos fallo:".$conn->connect_error);
    }
    $sql = "SELECT * FROM martes";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo "<table>";
        echo "<tr><th>id</th><th>nombre</th><th>apellido</th><th>nacimiento</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" .  $row["id"] . "</td><td>" . $row ["nombre"] . "</td><td>" . $row ["apellido"] . "</td><td>" . $row ["nacimiento"] . "</td><td>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron registros en la agenda";
    }
    ?>
    </body>
</html>