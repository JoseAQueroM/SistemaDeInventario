<?php include("./includes/headerUser.php"); ?>

<div class="container">


<h1 class="text-center">Reportes</h1>

      <div class="container d-flex">
          <div class="row text-center">
            
            
             <a href="admin.php" class="button-Back col-md-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>Regresar</a>
            
          </div>
      </div>

<div class="col-md-12 mt-4 mb-4 ml-2 tools-Container-Form">
            
            <table class="table">
              <thead>
                <tr class="text-center">
                
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Accion</th>
                  <th scope="col">Articulo</th>
                  <th scope="col">Lugar</th>
                  <th scope="col">Fecha</th>
                  
                </tr>
              </thead>
              
              <tbody class="text-center">


<?php

include("./db.php");

$sql = "SELECT * FROM herramientas INNER JOIN movimientos ON movimientos.id_articulo = herramientas.id";
$select = $conex->prepare($sql);
$select->execute();

foreach ($select as $row) { ?>
  
                 <tr>

                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['apellido'] ?></td>
                  <td><?php echo $row['accion'] ?></td>
                  <td><?php echo $row['articulo'] ?></td>
                  <td><?php echo $row['lugar'] ?></td>
                  <td><?php echo $row['fecha'] ?></td>
               
  
                </tr>
              
          <?php } ?>
              
              </tbody>
            </table>

          </div>

          </div>