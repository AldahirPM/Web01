<?php require_once 'includes/reedirecion.php' ?>
<?php require_once 'includes/cabecera.php' ?>  
<!--Barra lateral-->
<?php require_once 'includes/barralateral.php'?>
<div  id="principal">
    <h1>Crear Categoria</h1>
    <p>
    Añade nuevas categorias al blog para que los usuarios puedan
    usarlas al crear entradas. 
    </p>
    <br>
    <form action="guardarcategoria.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">

        <input type="submit"  value="Guardar">
    </form>
    

</div>

<?php require_once 'includes/footer.php' ?>