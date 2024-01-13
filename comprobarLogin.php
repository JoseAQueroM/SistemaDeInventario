<?php 

if(isset($_POST['username']) && isset($_POST['password'])):

$sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password"; 

$comprobar = $conex->prepare($sql);

$comprobar->bindParam(':username', $_POST['username']);
$comprobar->bindParam(':password', $_POST['password']);
$comprobar->execute();

$resultado = $comprobar->fetch(PDO::FETCH_ASSOC);

        if($resultado == true):

            $sql = "SELECT rol_id FROM usuarios WHERE username = :username";
            $comprobarRol = $conex->prepare($sql);
            $comprobarRol->bindParam(':username', $_POST['username']);
            $comprobarRol->execute();
        
            
            $rol = $comprobarRol->fetchColumn();
        
            switch ($rol) {
                case 1:

                    $_SESSION['admin'] = "Bienvenido administrador!";
                    $_SESSION['rol'] = 1;

                    $sql = "INSERT INTO registro_logeo (rol) VALUES (?)";

                    $registroLogin = $conex->prepare($sql);
                    $rolAdmin = 'Administrador';

                    $registroLogin->bindParam(1, $rolAdmin);
                    $registroLogin->execute();
                    
                    header('refresh:1; admin.php');
                    break;

                case 2:
                    $_SESSION['user'] = "Bienvenido usuario!";
                    $_SESSION['rol'] = 2;

                    $sql = "INSERT INTO registro_logeo (rol) VALUES (?)";
                            
                    $registroLogin = $conex->prepare($sql);
                    $rolAdmin = 'Usuario';

                    $registroLogin->bindParam(1, $rolAdmin);
                    $registroLogin->execute();
                    header('refresh:1; usuario.php');
            
                    break;

                default: 
            } 

         else: ?>

    <?php  $_SESSION['errorLogin'] = "Nombre o Contreña incorrecta"; ?> 

                <script>
                        history.replaceState(null, null,location.pathname);
                </script>

        <?php endif;

endif; ?>