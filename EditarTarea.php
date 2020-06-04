<?php
$id= $_POST['input_id'];
$nombre = $_POST['input_nombre'];
$fecha = $_POST['input_fecha'];
$descripcion = $_POST['input_descripcion'];
$prioridades = $_POST['input_prioridades'];
$responsable = $_POST['input_responsable'];

echo $id;
echo "</br>";
echo $nombre;
echo "</br>";
echo $fecha;
echo "</br>";
echo $descripcion;
echo "</br>";
echo $prioridades;
echo "</br>";
echo $responsable;
echo "</br>";

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

$sql = "UPDATE tareas SET nombre='{$nombre}', fecha='{$fecha}', descripcion='{$descripcion}',prioridades ='{$prioridades}', responsable='{$responsable}' WHERE id_pk='{$id}'";

 //se lanza la consulta en la base de datos
$respuesta = $conn->query($sql);

//3. procesa la respuesta
if($respuesta === TRUE) {
    echo "Registro actualizado correctamente";
} else {
    echo "el error al actualizar es: " . $conn->error;
}

//4. cierra la conexión
$conn->close();
header("Location: index.php");




?>