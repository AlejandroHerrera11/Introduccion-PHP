<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LISTA DE TAREAS</title>
        <style>
            html
            {
                height: 100%;
            }
            body
            {
                height: 100%;
            }
            .seccion
            {
                height: 100%;
                border: whitesmoke ;
            }
            .header
            {
                height:20%
            }    
            .footer
            {
                height:10%
            }
             
        </style>
    </head>
    <body background="imagenes/web1.jpg" >
        <div class="header">
            <h1>APP LISTA DE TAREAS</h1>
            <br>
            <p>Aplicacion en la cual vamos a poder crear,eliminar,consultar y actualizar las listas de tareas.</p>
            
        </div>
        <div class="seccion">
            <h3>Registrar listas De Tareas</h3>
            <form action="CrearTarea.php" method="POST">
                <div  class="item-form">
                    <label for=""><h5>Nombre De La Tarea:</h5></label>
                    <input type="text" name="input_nombre" id="" required>
                </div>
                <div class="item-form">
                    <label for=""><h5>Fecha Vencimiento De La Tarea:</h5></label>
                    <input type="date" name="input_fecha" id="" required>
                </div>
                <div class="item-form">
                    <label for=""><h5>Descripcion De La Tarea:</h5></label>
                    <input type="text" name="input_descripcion" id="" required>
                </div>
                <div class="item-form">
                    <label for=""><h5>Prioridad:</h5></label>
                    <input type="radio" name="input_prioridades" value="BAJA" required>BAJA
                    <br>
                    <input type="radio" name="input_prioridades" value="MEDIA" required>MEDIA
                    <br>
                    <input type="radio" name="input_prioridades" value="ALTA" required>ALTA
                </div>
                <div class="item-form">
                    <label for=""><h5>Responsable De La Tarea:</h5></label>
                    <input type="text" name="input_responsable" id="" required>
                </div>
                <br>
                <div class="item-form">
                    <input type="submit" value="CREAR">
                </div> 
                <br>               
            </form>
            <table border="2">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE </th>
                    <th>FECHA</th>
                    <th>DESCRIPCION</th>
                    <th>PRIORIDAD</th>
                    <th>RESPONSABLE</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>
                <br>
                <?php
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
                //crear sentencia sql
                $sql = "SELECT * from tareas";
                $sql = "SELECT * from tareas ORDER BY fecha asc";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);
                while($row=$respuesta->fetch_array())
                {
                ?>
                <tr>
                    <td> <?php echo $row['id_pk']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['fecha']; ?></td>
                    <td> <?php echo $row['descripcion']; ?></td>
                    <td> <?php echo $row['prioridades']; ?></td>
                    <td> <?php echo $row['responsable']; ?></td>
                    <td><a href="VerTareaParaEditar.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></td>
                    <td><a href="EliminarTarea.php?id_para_borrar=<?php echo $row['id_pk']; ?>">Eliminar</a></td>
                </tr>
                <?php
                }
                // cierra la conexión
                $conn->close();
                ?>
            </table>
            
        </div>
        <br>
        <div class="footer">
            Realizado por AHP
        </div>
    </body>
</html>