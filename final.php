<!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=<, initial-scale-1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Captura-Muestra</title>
</head>
<body>
   <script>
    $(document).ready(function(){

        function actualizardatos(){

            $.get("mostrar.php", function(data){
              // esta parte sera util para poner el codigo en css
                $("resultados").html(data);
            });
        }
        //con esto se llama a la funcion para cargar los datos al cargar la pagina
        actualizardatos();
        //manejo del envio del formulario
        $("#formulario").submit(function(event){
            event.preventDefault();
            $.post("insertarnuevo.php", $this.serialize(), function(data));
            $("mensaje").html(data);
            actualizardatos(); //llama la funcion para cargar los datos de la funcion
            $("#formulario")[0].reset; //limpia el formulario
        });
    });
   </script>
   <form id= "formulario">
   <label form "id">Id: </label>
        <input type="text" id="id" name="id" required><br>
        <label form "nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label form "apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" required><br>
        <label form "nacimiento">Nacimiento: </label>
        <input type="text" id="nacimiento" name="nacimiento" required><br>
        <input type="submit" value="Agregar Registro">
</form>
 <div id="mensaje"></div>
 <div id="resultados"></div>
    </body>
</html>