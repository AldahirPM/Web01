<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>
         
<?php
    $entrada_actual = conseguirEntrada($cn , $_GET['id']);
   
    if(!isset($entrada_actual['id'])){
        header("Location:index.php");
    }
    
?>
<?php require_once 'includes/cabecera.php' ?>
<!--Barra lateral-->
<?php require_once 'includes/barralateral.php'  ?>
<!--Caja Principal-->
            <div id="principal">
           
                <h1><?= $entrada_actual['nombre']?></h1>          
                <h2><?= $entrada_actual['categoria']?></h2>
                <h4><?= $entrada_actual['fecha']?></h4>
                <p><?= $entrada_actual['descripcion']?></p>
            </div><!-- fin del contenedor principal-->
<!-- pie de pagina*-->
<?php require_once 'includes/footer.php' ?>