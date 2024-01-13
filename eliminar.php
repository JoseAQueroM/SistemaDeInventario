<?php include("./includes/headerCerrar.php"); ?>
<?php include("./db.php"); ?>

<?php 

if(isset($_GET['id'])):
    $id = $_GET['id'];
    $sql = "DELETE FROM herramientas WHERE id = $id";
    $eliminar = $conex->prepare($sql);
    $eliminar->execute();

    if($eliminar->rowCount() > 0) {
        $_SESSION['eliminado'] = true;
    } else {
        $_SESSION['eliminado'] = false;
    }

    header('location: admin.php');

endif;



?>