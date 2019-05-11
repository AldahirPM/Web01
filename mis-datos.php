<?php require_once 'includes/reedirecion.php' ?>
<?php require_once 'includes/cabecera.php' ?>

<!--Barra lateral-->
<?php require_once 'includes/barralateral.php'  ?>
<div id="principal">
<h1>Mis Datos</h1>
<br>
<?php if(isset($_SESSION['completado'])):?>
                  
    <div class="alerta alerta-exito"> 
     <?=  $_SESSION['completado'];?>   
    </div>
    <?php elseif(isset($_SESSION['errores']['general'])):?>
        <div class="alerta alerta-error"> 
            <?=  $_SESSION['errores']['general'];?>   
        </div>

    <?php endif;?>
<form action="actualizar.php" method="POST">
    <Label for="nombre">Nombre</Label>
        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'];?>">
        <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'nombre'): '';?>
    <Label for="apellido">Apellido</Label>
        <input type="text" name="apellido" value="<?=$_SESSION['usuario']['apellidos'];?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellido'):'';?>

    <Label for="email">Email</Label>
        <input type="email" name="email" value="<?=$_SESSION['usuario']['email'];?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email'):'';?>

    
        <input type="submit" name="submit" value="Actulizar">
        </form>
    <?php borrarMensaje();?>
</div>
<?php  require_once 'includes/footer.php' ?>