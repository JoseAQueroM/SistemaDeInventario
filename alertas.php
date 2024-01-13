<?php if(isset($_SESSION['admin'])):

$respuesta = $_SESSION['admin']; ?>

    <script>
        
        Swal.fire(
        'Exito!',
        '<?php echo $respuesta; ?>',
        'success'
        );

    </script>

<?php  unset($_SESSION['admin']); endif; ?>


<?php if(isset($_SESSION['user'])):

$respuesta = $_SESSION['user']; ?>

    <script>
        
        Swal.fire(
        'Exito!',
        '<?php echo $respuesta; ?>',
        'success'
        );

    </script>

<?php  unset($_SESSION['user']); endif; ?>






<?php if (isset($_SESSION['errorLogin'])) { 

    $respuesta = $_SESSION['errorLogin']; ?>

    <script>
        
        Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '<?php echo $respuesta ?>',
        })
    </script>


    <?php unset($_SESSION['errorLogin']); }   ?>





<?php if(isset($_SESSION['insertado'])):

$respuesta = $_SESSION['insertado']; ?>

    <script>
        
        Swal.fire(
        'Exito!',
        '<?php echo $respuesta; ?>',
        'success'
        );

    </script>

<?php unset($_SESSION['insertado']); endif; ?>




<?php if (isset($_SESSION['delete'])) { 

$respuesta = $_SESSION['delete']; ?>

<script>
    
    Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '<?php echo $respuesta ?>',
    })
</script>


<?php unset($_SESSION['delete']); }   ?>

