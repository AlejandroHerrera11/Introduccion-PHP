<?php

$nombre = $_POST['input_nombre'];
$fecha = $_POST['input_fecha'];
$descripcion = $_POST['input_descripcion'];
$prioridades = $_POST['input_prioridades'];
$responsable = $_POST['input_responsable'];



//1. conexión entre nuestra app(php) y el servidor de bases de datos(mysql)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listatareas_bd";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
    echo "mi conexión con la bd falló";
    die("la conexión falló " . $conn->connect_error);
}
else
{
    echo "conexión establecida entre php y mysql</br>";
}

//2. sentencia sql (CRUD: Create, Read, Update, Delete)

$sql = "INSERT INTO tareas (nombre, fecha, descripcion, prioridades, responsable) VALUES ('{$nombre}', '{$fecha}', '{$descripcion}', '{$prioridades}', '{$responsable}')";

 //se lanza la consulta en la base de datos
 $respuesta = $conn->query($sql);

//3. procesa la respuesta
if($respuesta === TRUE) {
    echo "Registro creado correctamente";
} else {
    echo "el error es: " . $conn->error;
}

//4. cierra la conexión
$conn->close();
header("Location: index.php");

 

?>