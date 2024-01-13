<?php 

include("./db.php");

if(isset($_POST['guardar']) && !empty($_POST['articulo']) && !empty($_POST['cantidad']) && isset($_POST['tipo_unidad']) && isset($_POST['habitacion'])):

    $sql = "INSERT INTO herramientas (articulo, tipo_unidad, cantidad, habitacion) VALUES (:articulo, :tipo_unidad, :cantidad, :habitacion)";
    $insertar = $conex->prepare($sql);
    $insertar->bindParam(':articulo', $_POST['articulo']);
    $insertar->bindParam(':tipo_unidad', $_POST['tipo_unidad']);
    $insertar->bindParam(':cantidad', $_POST['cantidad']);
    $insertar->bindParam(':habitacion', $_POST['habitacion']);
   
    $insertar->execute();

    $_SESSION['insertado'] = "Datos almacenados correctamente"; 

    ?>

    <script>
        history.replaceState(null, null,location.pathname);
    </script>


<?php endif; ?>


