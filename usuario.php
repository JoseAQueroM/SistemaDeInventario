<?php include("./includes/headerUser.php"); ?>
<?php include("./comprobarLogin.php"); ?>


<?php session_start();

if(!isset($_SESSION['rol'])):

  header('location: login.php');

elseif($_SESSION['rol'] != 2):

  header('location: login.php');

endif;


?>

<body>

<h1 class="text-center">Usuario</h1>



<?php include("./insertar.php"); ?>


    <div class="container tools-Container">
        <div class="row">
   
        <div class="col-md-12 mt-4 ml-2 tools-Container-Form p-3">
            
            <table class="table" id="myTable">
              <thead>
                <tr>
                
                  <th class="text-center" scope="col">Nombre</th>
                  <th class="text-center" scope="col">Tipo de Unidad</th>
                  <th class="text-center" scope="col">Cantidad</th>
                  <th class="text-center" scope="col">Fecha</th>
                  
                </tr>
              </thead>
              
              <tbody class="text-center">
                 <tr>

                 <?php 

                     include("./db.php");

                     $sql = "SELECT * FROM herramientas";
                     $mostrar = $conex->prepare($sql); 
                     $mostrar->execute();

                     foreach ($mostrar as $row) { ?>

                  <th> <?php echo $row['articulo'] ?> </th>
                  <td> <?php echo $row['tipo_unidad'] ?></td>
                  <td> <?php echo $row['cantidad'] ?></td>
                  <td> <?php echo $row['fecha'] ?></td>
            
               
                
                </tr>
                <?php } ?>
          
              
              </tbody>
            </table>

          </div>
      </div>
  
  </div>
  

        </div>
    </div>

<script src="./js/botones.js"></script>

<script src="./js/bootstrap.min.js"></script>

<script>



$(document).ready( function () {
    $('#myTable').DataTable();
} );


  
</script>

<?php include("./includes/footer.php") ?>