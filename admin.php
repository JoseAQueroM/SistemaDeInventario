<?php include("./includes/headerUser.php");

session_start();

if(!$_SESSION['rol']):

  header('location: login.php');

elseif($_SESSION['rol'] != 1):

  header('location: login.php');

endif;

if(isset($_SESSION['success']) && $_SESSION['success'] == true):
  echo '
  <script>
  
     Swal.fire(
         "Exito!",
         "Se editó correctamente",
         "success"
     )

  </script>
  ';
  unset($_SESSION['success']);
 endif;
 
 ?>

<?php

if(isset($_SESSION['eliminado']) && $_SESSION['eliminado'] == true):
  echo '
  <script>
  
     Swal.fire(
         "Exito!",
         "Se eliminó correctamente",
         "success"
     )

  </script>
  ';
  unset($_SESSION['success']);
 endif;
 
 ?>


<body>

<h1 class="text-center">Administrador</h1>



<?php include("./insertar.php"); ?>
<?php include("./alertas.php"); ?>
    
      

    <div class="container mt-3">
      <div class="row align-items-center">

      <button type="button" class="btn button-Add col-md-1" data-bs-toggle="modal" data-bs-target="#exampleModal">

        + Añadir

       </button>

       <a href="reportes.php" class="btn button-Add col-md-1">

        Reportes

      </a>

      <a href="pdf.php" class="btn button-Add col-md-1 ms-auto pt-1 text-center">

        PDF

      </a>

      <a href="historial.php" class="btn button-Add col-md-1 ms-auto">

       Historial

      </a>


          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body col">
                

              <form method="POST">

                    <div class="mb-3">
                      <label class="form-label label-Form">Articulo</label>
                      <input name="articulo" type="text"  class="form-control input-Login" placeholder = "Ingrese el nombre del articulo" required>
                      
                    </div>

                    <div class="mb-3">

                      <label class="form-label label-Form">Tipo de Unidad: </label>
                 
                       <input class="form-control input-Login" type="text" name ="tipo_unidad" placeholder="Ingrese el tipo de Unidad" required>
                      
                     
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label label-Form">Cantidad</label>
                      <input name="cantidad" type="number" class="form-control input-Login" placeholder="Ingrese la cantidad" required>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label label-Form">Habitación</label>
                      <input name="habitacion" type="number" class="form-control input-Login" placeholder="Ingrese el numero de habitacion" required>
                    </div>

              </div>
                    <div class="modal-footer">
                      <button name="guardar" type="submit" class="btn button-Add">Guardar</button>
                    </div>
              </form>

            </div>
          </div>
          </div>
      </div>
    </div>


    <div class="container tools-Container">
        <div class="row">
   
        <div class="col-12 col-md-12 mt-4 mb-4 ml-2 tools-Container-Form p-3">
            
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
                <tr class="text-center">
                
                  <th class="text-center"  scope="col">Nombre</th>
                  <th class="text-center"  scope="col">Tipo de Unidad</th>
                  <th class="text-center"  scope="col">Cantidad</th>
                  <th class="text-center"  scope="col">Fecha</th>
                  <th class="text-center"  scope="col">Habitacion</th>
                  <th class="text-center"  scope="col">Opciones</th>
                  
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
                  <td> <?php echo $row['habitacion'] ?></td>

                  <th> 
                
                      <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn button-Add mx-1 options-container">
                      <i><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></i>
                      </a>


                      <button type="button" class="btn button-Add" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>                  
                      </button>

                   
                            <div class="modal fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                              <div  class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel2">Borrar Datos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <p class="p-Modal-Delete">¿Seguro que quieres borrar datos? No podras recuperar una vez hayas dado click 
                                      en "Eliminar"
                                      </p>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                    <a type="button" id="btn_eliminado" class="btn btn-danger" href="./eliminar.php?id= <?php echo $row['id'] ?>">Eliminar</a>
                                  </div>
                                </div>
                              </div>
                            </div>
          
                  </th>
                
                </tr>
                <?php } ?>
          
              
              </tbody>
            </table>

          </div>
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

