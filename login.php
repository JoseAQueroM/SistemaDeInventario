<?php session_start(); ?>

<?php include('includes/header.php') ?>
<?php include("./db.php"); ?> 
<?php include("./comprobarLogin.php"); ?>
<?php include("./alertas.php"); ?>


	

<!DOCTYPE html>
<html>

	<body>

		<main>
			

			<div class="container login-Container col-8 col-md-4 d-flex justify-content-center align-items-center" style="height: 75vh;">
				<div class="row col-9">
					
					<h3 class="login-Title">Login</h3>				
				
					<form action="#" method="POST">

					<div class="mb-3">
					<label class="form-label label-Form">Usuario</label> 
					<input type="text" name="username" class="form-control input-Login" placeholder= "Ingrese su Usuario" required>
					</div>

					<div class="mb-3">
					<label class="form-label label-Form">Contraseña</label>
					<input type="password" name="password" class="form-control input-Login" placeholder= "Ingrese su contraseña" required>
					</div>

					<input type="submit" name="ingresar" class="btn btn-Login mt-3"></input>
					
					<a class="forget-Login" href="recuperar.php">¿Olvidaste tu contraseña?</a>
					</form>

				</div>
			</div>


		</main>
	



<!--FOOTER-->


		<script src="./js/botones.js"></script>
	
		
	</body>
</html>