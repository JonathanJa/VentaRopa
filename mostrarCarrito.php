<?php 


//include("carrito.php");

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

include("plantilla/cabecera.php");
 ?>


		<div class="container">
						
				<h3 class="list">Lista Carrito</h3>
				<?php if (!empty($_SESSION['CARRITO'])) {?>
				<table class="table">
					
					<tbody>
						
						<tr>
							
							<th width="40%">Descripcion</th>
							<th width="15%" class="text-center">Cantidad</th>
							<th width="20%" class="text-center">Precio</th>
							<th width="20%" class="text-center">Total</th>
							<th width="5%">--</th>

						</tr>
						<?php $total =0; ?>
						<?php foreach ($_SESSION['CARRITO'] as $indice => $producto) {?>
							
						
						<tr>
							
							<td width="40%"><?php echo $producto['NOMBRE'];?></td>
							<td width="15%" class="text-center"><?php echo $producto['CANTIDAD'];?></td>
							<td width="20%" class="text-center">$<?php echo $producto['PRECIO'];?></td>
							<td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2);?></td>

							<form action=" " method="post">
								<input type="hidden" name="id" value="<?php echo  $producto['ID']; ?>">
							<td width="5%"><button class="btn" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
							</form>
						</tr>
						<?php $total = $total +($producto['PRECIO'] * $producto['CANTIDAD']) ?>
						<?php } ?>
						</td>
						<tr>
							<td colspan="3" align="right"><h3>Total</h3></td>
							<td align=""><h3>$<?php echo number_format($total,2); ?></h3></td>
							<td></td>
						</tr>

					</tbody>
					
				</table>

		</div>
<?php }else{ ?>
<div class="alert alert-succes">
	No hay productos en el carrito...
</div>
<?php } ?>
</header>
</body>
</html>