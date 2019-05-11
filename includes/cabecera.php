<?php require_once 'conexion.php' ?>
<?php require_once 'helpers.php' ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>

        <meta charset="utf-8"/>
        <title>Blog de video juegos</title>
        <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    </head>
    <body>
        <!--Cabecera-->
        <header id="cabecera">
            <!--logo-->
            <div id="logo">
                <a href="index.php">
                    Blog de Peliculas
                </a>
            </div>  
             <!--menu-->
            <nav id="menu">
    
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li> 
                    <?php
                        $categoria = conseguirCategorias($cn); 
                        while($categorias = mysqli_fetch_assoc($categoria)):
                    ?>
                            <li>
                                <a href="categoria.php?id=<?=$categorias['id'] ?>"><?=$categorias['nombre']?></a>
                            </li>
                            <?php endwhile;?>
                        <li>
                            <a href="index.php">Sobre mi </a>
                        </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            
            </nav>
            <div class="clearfix"></div>
        </header>
        <div id="contenedor">