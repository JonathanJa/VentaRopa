<?php 
//include("plantilla/cabecera.php");
session_start();
$mensaje = "";

if (isset($_POST['btnAccion'])) {
	
	switch ($_POST['btnAccion']) {
		case 'Agregar':
			if (is_numeric($_POST['id'])) {
				
				$ID = $_POST['id'];
				$mensaje .= "Ok ID correcto" . $ID . "<br/>";
			}else{

				$mensaje .= "Upss.. ID incorrecto". $ID;
			}

			if (is_string($_POST['nombre'])) {
				
				$NOMBRE=$_POST['nombre'];
				$mensaje .= "nombre Ok " . $NOMBRE . "<br/>"; 
			}else{

				$mensaje .= "Upss algo pasa con el nombre"; break;
			}

			if (is_numeric($_POST['cantidad'])) {

				$CANTIDAD=$_POST['cantidad'];
				$mensaje .= "cantidad Ok " . $CANTIDAD. "<br/>"; 
			}else{

				$mensaje .= "Upss algo pasa con la cantidad"; break;
			}

			if(is_numeric($_POST['precio'])){

				$PRECIO=$_POST['precio'];
				$mensaje .= "precio Ok " . $PRECIO. "<br/>"; 
			}else{

				$mensaje .= "Upss algo pasa con el precio"; break;
			}


			if (!isset($_SESSION['CARRITO'])) {
				
				$producto = array(
					'ID' => $ID,
					'NOMBRE' => $NOMBRE,
					'CANTIDAD' =>$CANTIDAD,
					'PRECIO' =>$PRECIO
				);

				$_SESSION['CARRITO'][0] = $producto; 
			}else{

				$NumeroProductos = count($_SESSION['CARRITO']);
				$producto = array(
					'ID' => $ID,
					'NOMBRE' => $NOMBRE,
					'CANTIDAD' =>$CANTIDAD,
					'PRECIO' =>$PRECIO
				);

				$_SESSION['CARRITO'][$NumeroProductos] = $producto; 
			}

			break;
			case 'Eliminar':

				if (is_numeric($_POST['id'])) {
				
					$ID = $_POST['id'];
					foreach ($_SESSION['CARRITO'] as $indice => $producto) {
						if ($producto['ID'] == $ID) {
							
						
						unset($_SESSION['CARRITO'][$indice]);
						echo "<script>alert('elemento borrado')</script>";

						}
					}
				}else{

					$mensaje .= "Upss.. ID incorrecto". $ID;
				}
			break;	
		
		
	}
}


 ?>