<?php 
include("./includes/headerUser.php");
include("db.php"); 
include("./insertarReporte.php");
?>

<?php

session_start();

if(isset($_GET['id'])):

$id = $_GET['id'];


    if(isset($_POST['editar']) && !empty($_POST['articulo']) && !empty($_POST['cantidad']) && !empty($_POST['tipo_unidad']) && !empty($_POST['habitacion'])):
        $sql = "UPDATE herramientas SET articulo = :articulo, cantidad = :cantidad, tipo_unidad = :tipo_unidad, habitacion = :habitacion WHERE  id = $id";
        $editar = $conex->prepare($sql);
        $editar->bindParam(':articulo',$_POST['articulo']);
        $editar->bindParam(':cantidad', $_POST['cantidad']);
        $editar->bindParam(':tipo_unidad', $_POST['tipo_unidad']);
        $editar->bindParam(':habitacion', $_POST['habitacion']);
        $editar->execute();

          if($editar->rowCount() > 0) {
              $_SESSION['success'] = true;
          } else {
              $_SESSION['success'] = false;
          }

        header('location: admin.php');

    endif;

endif;

  
  ?>


<body>

      <!--BOTON REGRESAR-->

      <div class="container d-flex">
          <div class="row text-center">
            
            
             <a href="admin.php" class="button-Back col-md-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>Regresar</a>
            
          </div>
      </div>

        <!--CONTAINER EDITAR-->

      <div class="container">
				<div class="row justify-content-around">
					
    <div class="edit-Container col-5">

					<h3 class="login-Title">¿Deseas editar el dato seleccionado?</h3>				
                        <!-- Button trigger modal -->
                        <button type="button" class="btn button-Add d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Editar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                        
                        <form method="POST">

                        <?php 
                        
                        $sql = "SELECT * FROM herramientas WHERE id = $id";
                        $selectEditar = $conex->prepare($sql);
                        $selectEditar->execute();
                        
                        foreach ($selectEditar as $row) { ?>
                  

                    <div class="mb-3">
                      <label class="form-label label-Form">Articulo</label>
                      <input name="articulo" type="text" value="<?php echo $row['articulo']?>" class="form-control input-Login" placeholder = "Ingrese el nombre del articulo" required>
                      
                    </div>

                    <div class="mb-3">

                      <label class="form-label label-Form">Tipo de Unidad: </label>
                 
                       <input class="form-control input-Login" name ="tipo_unidad" type="text" value="<?php  echo $row['tipo_unidad'] ?>"  placeholder="Ingrese el tipo de Unidad" required>
                      
                     
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label label-Form">Cantidad</label>
                      <input name="cantidad" type="number" value="<?php  echo $row['cantidad'] ?>" class="form-control input-Login" placeholder="Ingrese la cantidad" required>
                    </div>

                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label label-Form">Habitacion</label>
                      <input name="habitacion" type="number" value="<?php  echo $row['habitacion'] ?>" class="form-control input-Login" placeholder="Ingrese el numero de habitacion" required>
                    </div>


              </div>
                    <div class="modal-footer">
                      <button name="editar" type="submit" class="btn button-Add">Guardar</button>
                    </div>
              </form>

              
              <?php } ?>
                        </div>
                        
                        </div>
                        </div>
                        </div>

    <!--CERRANDO CONTAINER EDITAR-->
                      
                        
    <!--ABRIENDO CONTAINER REPORTE-->
                        
				<div class="edit-Container col-5">
					<h3 class="login-Title">¿Deseas generar un reporte?</h3>				
                        <!-- Button trigger modal -->
                        <button type="button" class="btn button-Add d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        Generar Reporte
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                        
                        <form method="POST">

                        <?php 
                        
                        $sql = "SELECT * FROM herramientas WHERE id = $id";
                        $selectEditar = $conex->prepare($sql);
                        $selectEditar->execute();
                        
                        foreach ($selectEditar as $row) { ?>

                    <div class="mb-3">
                      <label class="form-label label-Form">Articulo</label>
                      <input name="articulo" type="text" value="<?php echo $row['articulo']?>" class="form-control input-Login" readonly>
                      
                    </div>   

                  
                    <div class="mb-3">
                      <label class="form-label label-Form">Nombre</label>
                      <input name="nombre" type="text" class="form-control input-Login" placeholder = "Ingrese el nombre" required>
                      
                    </div>

                    <div class="mb-3">
                      <label class="form-label label-Form">Apellido</label>
                      <input name="apellido" type="text" class="form-control input-Login" placeholder = "Ingrese el apellido" required>
                      
                    </div>
                  

                    <div class="mb-3">
                      <label class="form-label label-Form">Accion</label>
                      <input name="accion" type="text" class="form-control input-Login" placeholder = "Ingrese la accion que se realizó" required>
                      
                    </div>

                    <div class="mb-3">
                      <label class="form-label label-Form">Lugar</label>
                      <input name="lugar" type="text" class="form-control input-Login" placeholder = "Ingrese el lugar al que se movio" required>
                      
                    </div>

                    <div class="mb-3">
                      <label class="form-label label-Form">ID Articulo</label>
                      <input name="id_articulo" type="text" value="<?php echo $row['id']?>" class="form-control input-Login" readonly>
                      
                    </div>
                
              </div>
                    <div class="modal-footer">
                      <button name="reporte" id="btn_reporte" type="submit" class="btn button-Add">Guardar</button>
                    </div>
              </form>

              
              <?php } ?>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                    

				</div>
        </div>

				</div>
     <!--CERRANDO CONTAINER REPORTE-->
        

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/botones.js"></script>
</body>