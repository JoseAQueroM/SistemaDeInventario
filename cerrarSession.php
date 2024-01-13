<?php session_start(); ?>

<?php include("./includes/headerCerrar.php"); ?>
<script>
        
        Swal.fire(
        'Exito!',
        'Cerrando sesion...',
        'success',
        )
        
</script>


<body>
<script src="./js/botones.js"></script>
</body>

<script src="./js/bootstrap.min.js"></script>

</body>
</html>

<?php  


session_unset();
session_destroy();


header('refresh:1; index.php'); ?>

