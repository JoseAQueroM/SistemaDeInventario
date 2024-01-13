<?php

include("./db.php");

if(isset($_POST['reporte']) && isset($_POST['articulo']) && !empty($_POST['id_articulo']) &&!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['accion']) && !empty($_POST['lugar'])):

    $sql = "INSERT INTO movimientos (nombre, apellido, articulo, id_articulo, accion, lugar) VALUES (:nombre, :apellido, :articulo, :id_articulo, :accion, :lugar)";
    $reporte = $conex->prepare($sql);
    $reporte->bindParam(':nombre', $_POST['nombre']);
    $reporte->bindParam(':apellido', $_POST['apellido']);
    $reporte->bindParam(':articulo', $_POST['articulo']);
    $reporte->bindParam(':id_articulo', $_POST['id_articulo']);
    $reporte->bindParam(':accion' , $_POST['accion']);
    $reporte->bindParam(':lugar', $_POST['lugar']);

    $reporte->execute();
?>

    <script>
        
    Swal.fire(
    'Exito!',
    '<?php echo $respuesta; ?>',
    'success'
    );


    history.replaceState(null, null,location.pathname);
    </script>

<?php 

header('location: admin.php');

endif; ?>