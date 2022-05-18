<?php 

include("carrito.php");
//$conexion = mysqli_connect("localhost","c2410397_tienda","seNUze52re","c2410397_tienda");
$descripcion="";
//session_start();

$conexion = new PDO("mysql:host=localhost; dbname=tienda","root","");
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");

    $total_pagina = 4;
    if(isset($_GET['pagina'])){

        if($_GET['pagina'] == 1){

            header("Location:index.php");
        }else{

            $situado = $_GET['pagina']; // situado tiene que crear otra pagina
        }

    }else{


        $situado = 1;


    }
    $empesar_desde=($situado-1) * $total_pagina;

    $sql = "SELECT * FROM productos";
    $resultado = $conexion->prepare($sql);
    $resultado->execute(array());
    $num_reg = $resultado->rowCount();//cuenta el numero de registro por fila
    $calculo = ceil($num_reg / $total_pagina); //ceil<-redondea el numero 


    $resultado->closeCursor();
    $sql_limit = "SELECT * FROM `productos` WHERE estado = 1 LIMIT $empesar_desde,$total_pagina ";
    $resultado = $conexion->prepare($sql_limit);
    $resultado->execute(array());






?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>

    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script-->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
   
       <!-- Bootstrap CSS -->
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"-->

     <style type="text/css">

        



         .c{
                
                position: relative;
                left: 420px;
                font-size: 20px;
                margin-left: 10px;
                padding: 20px;
                border-radius:20px; 
                float:left;  
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
                text-decoration: none;
                text-transform: uppercase;
            }

            .c a{

                text-decoration: none;

            }
          .c:hover{
                background: #008CBA;
                color: white;
            }

            .c a:hover{

                color:#EAEDED;
            }

        @media screen and (min-width: 480px){

            .c{ 
                left: 180px;
              }
            
            .container{
                position: relative;
                left: 25%;
                width: 100%;
            }
           

        }

        @media screen and (min-width: 1024px){

            .c{
                left: 400px;
              }
            .container{

               width: 180%; 
               position: relative;
                left: 0%;
                
            }
              
            
        }



        .container{

           
            width: 180%;
            margin: auto;

        }
        .col-3{
            
            float: left;
           padding-left: 1%;
           padding-top: 3%;
           padding-bottom: 3%;
           text-align: left;
           font-family: Luminari;
           font-size: 18px;
            
        }
       .btn {


            background-color: #1566B3; /* Green */

            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            font-family: Luminari;
            cursor: pointer;
            border-radius: 3%;

       }

       .btn:hover{

            background-color: #008CBA;

       }

       .card img{

                border-radius: 3%;
       }

       .card{
        padding: 3%;
        border-radius: 3%;
       }

       .card-body h5{

            font-size: 20px;
            margin-bottom: 5%;
            font-family: Comic Sans MS;
       }
       

     </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="#">Login</a>
            <a href="https://clothesyohy.com.ar/ventas_ci/dashboard/index">Sistema</a>
            <a  href="mostrarCarrito.php">Carrito(<?php echo (empty($_SESSION['CARRITO']))? 0 :count($_SESSION['CARRITO']); ?>)</a>
            <a href="#">Contacto</a>
        </nav>
        <section class="textos-header">
            <h1>Si no dejas de pensar en ellos... "COMPRALOS !!"</h1>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestro producto</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="img/ropaventa300.jpg" alt="" class="imagen-about-us"  data-aos="flip-left"
                    data-aos-easing="ease-out-cubic" data-aos-duration="2000"/>
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt veniam eius aspernatur ad
                        consequuntur aperiam minima sed dicta odit numquam sapiente quam eum, architecto animi pariatur,
                        velit doloribus laboriosam ut.</p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <!--form class="buscar">
                    
                        <input class="buscar-texto" type="text" name="">
                        <a class="boton" href=""><i class="icon-buscar"></i></a>
                    
                </form-->
                <h2 class="titulo">Portafolio</h2>
                <div  class="galeria-port" >
					<!--?php 
					foreach ($sql_cons as $fila) {
						echo "<div class='imagen-port' >";
                    ?>
                    <img  src="/intranet/carga/<?php echo $fila['imagenes']; ?>" alt="Imagen del primer articulo" width="25%"/>
                    <div class='hover-galeria' >
                        <?php echo "Talle: " . $fila['talle'] . "<br>";?>
                        <?php echo "Precio: $" . $fila['precio'];?>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                    </div>  
                    <?php
                    ?>--> 
                    <div class="container" >  
                        <div class="row">
                            <?php 

                            while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){

                            ?>
                            <div class="col-3">
                                <div class="card" data-aos="zoom-in-left">

                                    <?php 

                                        echo "<img src='data:image/jpeg; base64,". base64_encode($fila['foto'])."' width='100%' height='317px'>";
                                     ?>
                                    <!--img  src="/intranet/carga/<?php echo $fila['imagenes']; ?>" 
                                        title="<?php echo $fila['nombre']; ?>"
                                        alt="<?php echo $fila['nombre']; ?>"
                                        width="100%"
                                        data-toggle="popover"
                                        data-trigger="hover"
                                        data-content="<?php $fila['detalle']; ?>"
                                        height="317px" 
                                    /-->
                                    <div class="card-body">
                                        <h5 class="card-title">$<?php echo $fila['precio']; ?></h5>
                                        <p class="card-text"><?php echo $fila['nombre']; ?></p>
                                        <p class="card-text"><?php echo $fila['talle']; ?></p>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" id="id" value="<?php echo  $fila['id']; ?>">
                                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
                                            <input type="hidden" name="precio" id="precio" value="<?php echo $fila['precio']; ?>">
                                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1 ;?>">
                                
                                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit"> Agregar al Carrito</button>
                                        </form>
                                    </div>
                                </div>   
                            </div>
                            <?php } ?>
                        </div> 	
                    </div>  
                </div>
                <br>
                <div class="imagen-port">
                    <img src="img/modelo8.jpeg" alt="">
                    <div class="hover-galeria">
                        <p>Rebellions t-shirt</p>
                        <p>XS-S-M-L-XL</p>
                    </div>
                </div>
                <?php 
                   for ($i=1; $i<=$calculo ; $i++) { 
        
                        echo "<div class='c'><a href='?pagina=" . $i . "'>" . $i . "</a></div>" ; // se crea el link de la paginacion
                    }
                ?>


            </div>
        </section>
        <!--section class="clientes contenedor">
            <h2 class="titulo" data-aos="fade-up" data-aos-anchor-placement="top-center">Productos Disponibles</h2><canvas data-aos="fade-up" data-aos-anchor-placement="top-center" id="canvas" height="450" width="600"></canvas>
        </section-->
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Telefono</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>E-mail</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Redes Sociales</h4>
                <div class="social-media">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
            </div>
            </div>
        </div>
        <h2 class="titulo-final">&copy;  | </h2>
    </footer>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://kit.fontawesome.com/8e53eed422.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    AOS.init();
</script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
<script src="js/hover.js"></script>
<script>
$(function () {
    imagesLoaded( document.querySelectorAll('img'), () => {
        document.body.classList.remove('loading');
    });
    Array.from(document.querySelectorAll('.grid__item-img')).forEach((el) => {
        const imgs = Array.from(el.querySelectorAll('img'));
            new hoverEffect
            ({
                parent: el,
                intensity: el.dataset.intensity || undefined,
                speedIn: el.dataset.speedin || undefined,
                speedOut: el.dataset.speedout || undefined,
                easing: el.dataset.easing || undefined,
                hover: el.dataset.hover || undefined,
                image1: imgs[0].getAttribute('src'),
                image2: imgs[1].getAttribute('src'),
                displacementImage: el.dataset.displacement
            });
    });

    $('.example-popover').popover({
        container: 'body';                
    });
})
</script>

<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script-->
</body>
</html>