<?php require_once 'includes/reedirecion.php' ?>
<?php require_once 'includes/cabecera.php' ?>  
<!--Barra lateral-->
<?php require_once 'includes/barralateral.php'?>
<div  id="principal">
    <h1>Crear Entradas</h1>
    <p>
    Añade nuevas entradas al blog para que los usuarios puedan
   |leerlas y disfrutarlas de nuetro contenido.
    </p>
    <br>
    <form action="guardarentrada.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" id="nombre" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarError($_SESSION['errores_entrada'],'titulo'): '';?>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="" cols="56" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarError($_SESSION['errores_entrada'],'descripcion'): '';?>
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="">
            <?php
                $categorias = conseguirCategorias($cn);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>">
                    <?= $categoria['nombre'] ?>
                </option>
            <?php 
                endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarError($_SESSION['errores_entrada'],'categoria'): '';?>

        <input type="submit"  value="Guardar">
    </form>
    <?php  borrarMensaje(); ?>
    

</div>

<?php require_once 'includes/footer.php' ?>