<body background="imagenes/web2.jpg">
<?php

    $id_tareas_para_editar = $_GET['id_para_editar'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "listatareas_bd";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error)
    {
        //echo "mi conexión con la bd falló";
        die("la conexión falló " . $conn->connect_error);
    }
    else
    {
        //echo "conexión establecida entre php y mysql</br>";
    }
    //crear sentencia sql
    $sql = "SELECT * from tareas where id_pk={$id_tareas_para_editar}";
    //lanzar la sentencia sql
    $respuesta = $conn->query($sql);
    //die($respuesta);
    while($row=$respuesta->fetch_array())
    {
        //echo $row['lugar']."/".$row['placa'];
        $nombre= $row['nombre'];
        $fecha= $row['fecha'];
        $descripcion= $row['descripcion'];
        $prioridades= $row['prioridades'];
        $responsable= $row['responsable'];
       
    }

?>
<form action="EditarTarea.php" method="POST">
    <input type="hidden" name="input_id" value="<?php echo $id_tareas_para_editar ?>">
    <div class="item-form">
        <label for=""><h5>Nombre De La Tarea:</h5></label>
        <input value="<?php echo $nombre; ?>" type="text" name="input_nombre" id="" required>
    </div>
    <br>
    <div class="item-form">
        <label for=""><h5>Fecha Vencimiento De La Tarea:</h5></label>
        <input value="<?php echo $fecha; ?>" type="date" name="input_fecha" id="" required>
    </div>
    <br>
    <div class="item-form">
        <label for=""><h5>Descripcion De La Tarea:</h5></label>
        <input value="<?php echo $descripcion; ?>" type="text" name="input_descripcion" id="" required>
    </div>
    <br>
    <div class="item-form">
        <label for=""><h5>Prioridad:</h5></label>
        <input type="radio" name="input_prioridades" value="BAJA" checked>BAJA
        <br>
        <input type="radio" name="input_prioridades" value="MEDIA" checked>MEDIA
        <br>
        <input type="radio" name="input_prioridades" value="ALTA" checked>ALTA
    </div>
    <br>
    <div class="item-form">
        <label for=""><h5>Responsable De La Tarea:</h5></label>
        <input value="<?php echo $responsable; ?>" type="text" name="input_responsable" id="" required>
    </div>
    <br>
    
    <div class="item-form">
        <input type="submit" value="ACTUALIZAR">
    </div>                
</form>