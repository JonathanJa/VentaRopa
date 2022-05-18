<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
   
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"-->





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
            .c:hover{

            background: #008CBA;
            color: white;
            }

            @media screen and (min-width: 480px){

               .c{ left: 180px;}

                

                .table{

                    width:10%;
                    font-size: 5px;
                }

                .table th{

                    font-size: 5px;

                }

                .table td{

                    font-size: 5px
                }

                .table .btn{

                    font-size: 5px;
                    width: 10px;

                }
            }

            @media screen and (min-width: 1080px){

                .c{left: 400px;}

                .table{

                    width:100%;
                    font-size: 12px;

                    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                
                   
                    text-align: left;    
                    border-collapse: collapse; 
                }

                .table th{

                    
                    font-size: 22px;    
                font-weight:bold;     
                padding: 8px;     
                background: white;
                border-top: 4px solid black;    
                border-bottom: 1px solid black; 

                }

                .table td{
                    padding: 8px;     
                    background: white;    
                    border-bottom: 1px solid black;
                    color: black;    
                    border-top: 1px solid transparent; font-size: 18px;
                    font-family: Comic Sans MS;
                }

                .table .btn{

                    
                    width: 130px;


                    background-color: #F90A1C; 
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
                border-radius: 5%;

                }
            }

           

            .container .list{

                background: white;
                
            }

            .btn {
                background-color: #F90A1C; 
                border: none;
                color: white;
                padding: 5px 12px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                
                margin: 2px 2px;
                font-family: Luminari;
                cursor: pointer;
                border-radius: 5%;
            }

            .btn:hover{

                background-color: #F12736;
            }


            .table{

                   
                    

                    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                
                     
                    text-align: left;    
                    border-collapse: collapse; 
                }

                .table th{

                    
                       
                font-weight:bold;     
                padding: 8px;     
                background: white;
                border-top: 4px solid black;    
                border-bottom: 1px solid black; 

                }

                .table td{
                    padding: 8px;     
                    background: white;    
                    border-bottom: 1px solid black;
                    color: black;    
                    border-top: 1px solid transparent; 
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