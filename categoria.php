<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>
         
<?php
    $categoria_actual = mostrarCategorias($cn , $_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location:entrada.php");
    }
?>
<?php require_once 'includes/cabecera.php' ?>
<!--Barra lateral-->
<?php require_once 'includes/barralateral.php'  ?>
<!--Caja Principal-->
            <div id="principal">
           
                <h1> Entradas de <?= $categoria_actual['nombre']?></h1>          
                <?php
                    $entradas = conseguirEntradas($cn , null , $_GET['id']);
                    
                    if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                    while($entrada = mysqli_fetch_assoc($entradas)): 
                ?> 
                        <article class = "entrada"> 
                         
                            <a href="entrada.php?id=<?=$entrada['id']?>">
                                <h2><?=$entrada['titulo']?> </h2>
                                <span class="fecha" ><?= $entrada['nombre']."|". $entrada['fecha'] ?></span>
                                <p>
                                    <?= substr($entrada['descripcion'] , 0 , 200)."..." ?>
                                </p>
                            </a>
                        </article>
                <?php //print_r( var_dump($entrada)); 
                   // die;
                        endwhile;
                    else:
                ?>
                <div class="alerta ">No hay entradas</div>
                <?php endif;?>

               
            </div><!-- fin del contenedor principal-->
<!-- pie de pagina*-->
<?php require_once 'includes/footer.php' ?>