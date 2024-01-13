<?php include("./db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperación de Contraseña</title>
</head>
<body>
    <h2>Recuperación de Contraseña</h2>
    <form method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" required><br><br>

        <label for="respuesta1">Respuesta a Pregunta 1:</label>
        <input type="text" name="respuesta1" required><br><br>

        <label for="respuesta2">Respuesta a Pregunta 2:</label>
        <input type="text" name="respuesta2" required><br><br>

        <label for="respuesta3">Respuesta a Pregunta 3:</label>
        <input type="text" name="respuesta3" required><br><br>

        <label for="nueva_contraseña">Nueva Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Actualizar Contraseña">
    </form>
</body>
</html>

<?php 
if(isset($_POST['username']) && isset($_POST['respuesta1']) && isset($_POST['respuesta2']) && isset($_POST['respuesta3']) && isset($_POST['password'])):
    // Suponiendo que tienes campos para las respuestas de seguridad en tu tabla 'usuarios'
    $sql = "SELECT * FROM usuarios WHERE username = :username AND respuesta1 = :respuesta1 AND respuesta2 = :respuesta2 AND respuesta3 = :respuesta3"; 
    
    $comprobar = $conex->prepare($sql);
    
    // Vinculamos los parámetros de las respuestas
    $comprobar->bindParam(':username', $_POST['username']);
    $comprobar->bindParam(':respuesta1', $_POST['respuesta1']);
    $comprobar->bindParam(':respuesta2', $_POST['respuesta2']);
    $comprobar->bindParam(':respuesta3', $_POST['respuesta3']);
    $comprobar->execute();
    
    $resultado = $comprobar->fetch(PDO::FETCH_ASSOC);

    // Si el resultado no es vacío, las respuestas son correctas
    if($resultado){
        // Actualizamos la contraseña
        $sqlActualizar = "UPDATE usuarios SET password = :password WHERE username = :username";

        $actualizar = $conex->prepare($sqlActualizar);
        $actualizar->bindParam(':password', $_POST['password']); // Aquí debemos usar $actualizar y no $comprobar
        $actualizar->bindParam(':username', $_POST['username']);
        $actualizar->execute();
        
        echo "Contraseña actualizada con éxito.";
    } else {
        echo "Las respuestas de seguridad no son correctas.";
    }
endif;

// ... (el resto de tu código)
?>

?>