<?php 





if(isset($_POST['user']) && isset($_POST['contra'])){


			$conexion = mysqli_connect("localhost","root","","login");
			

			$username = $_POST['user'];
			$contra = $_POST['contra'];

			$sql = "SELECT * FROM usuario WHERE nombre='$username' AND contraseña='$contra'";
			$resultado = mysqli_query($conexion,$sql);
	
			
			
			$row = mysqli_fetch_array($resultado);
			
	
			
			if($row == true){
				
				//$contra = $row[3];
				//$_SESSION['contra'] = $contra;
				//validar rol
				//session_start();
				//$_SESSION["usuario"] = $_POST["user"];
				echo "bienvenido";
			}else{
		
				//el usuario o contraseña son incorrectos
				echo "<script> alert('El usuario o contraseña son incorrectos');</script>";
			}
		}
	
	


 ?>