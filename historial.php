<?php include("./includes/headerUser.php") ?>;

<div class="container tools-Container">
        <div class="row">

        <h1 class="text-center">Historial de Logeos</h1>

        <div class="container d-flex">
          <div class="row text-center">
            
            
             <a href="admin.php" class="button-Back col-md-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>Regresar</a>
            
          </div>
      </div>
   
        <div class="col-md-12 mt-4 mb-4 ml-2 tools-Container-Form p-3">
            
            <table class="table" id="myTable">
              <thead>
                <tr class="text-center">
                
                  <th class="text-center"  scope="col">ID</th>
                  <th class="text-center"  scope="col">Rol</th>
                  <th class="text-center"  scope="col">Fecha</th>
                </tr>
              </thead>
              
              <tbody class="text-center">
                 <tr>

                 <?php 

                     include("./db.php");

                     $sql = "SELECT * FROM registro_logeo";
                     $mostrar = $conex->prepare($sql); 
                     $mostrar->execute();

                     foreach ($mostrar as $row) { ?>

                  <th> <?php echo $row['id'] ?> </th>
                  <td> <?php echo $row['rol'] ?></td>
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



</body>



<?php
