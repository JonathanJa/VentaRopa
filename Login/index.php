<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	try{

		


		session_start();
		
		if(isset($_GET["cerrar_seccion"])){

			session_unset();
			session_destroy();
		}

		if(isset($_SESSION['rol'])){

			switch ($_SESSION['rol']) {
				case 1:
					header('location:../../ventas_ci/application/views/layouts/header.php');
				break;
			
				case 2:
					header('location:../index.html');
				break;

				default:
			}
		}

		
if(isset($_POST['user']) && isset($_POST['contra'])){


			$conexion = mysqli_connect("localhost","root","","login");
			

			$username = $_POST['user'];
			$contra = $_POST['contra'];

			$sql = "SELECT * FROM usuario WHERE nombre='$username' AND contraseña='$contra'";
			$resultado = mysqli_query($conexion,$sql);
	
			
			
			$row = mysqli_fetch_array($resultado);
			
		echo $row[2];
			
			
			/*if($row == true){
				
				$rol = $row[3];
				$_SESSION['rol'] = $rol;

				switch ($rol) {
				case 1:
					header('location:../../ventas_ci/application/views/layouts/header.php');
					echo "hola";
				break;
			
				case 2:
					header('location:../index.html');
				break;

				default:
				
			}
				//validar rol
				//session_start();
				//$_SESSION["usuario"] = $_POST["user"];
				
			}else{
		
				//el usuario o contraseña son incorrectos
				echo "<script> alert('El usuario o contraseña son incorrectos');</script>";
			}*/
		}
	
	
}catch(Exception $e){
	
	//die("Error: " . $e->getMessage());
	
	
}

?>
</head>
<body>
<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="#" method="post">
				<img src="img/avatar.svg">
				<h2 class="title">Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" name="user" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Rol</h5>
           		    	<input type="text" class="input" name="contra">
            	   </div>
            	</div>
            	<a class="olvidar-password" href="#">Olvidates tu contraseña?</a>
              <a class="registro" href="#">Registro</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>