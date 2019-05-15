<?php require_once 'includes/cabecera.php' ?>
       
<!--Barra lateral-->
<?php require_once 'includes/barralateral.php'  ?>
<!--Caja Principal-->
            <div id="principal">
                <h1>Todas las entradas</h1>
                             
                <?php
                    $entradas = conseguirEntradas($cn , false );
                    if(!empty($entradas)):
                    while($entrada = mysqli_fetch_assoc($entradas)): 
                ?> 
                <article class = "entrada"> 
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=$entrada['titulo']?> </h2>
                            <span class="fecha" ><?= $entrada['nombre']." | ". $entrada['fecha'] ?></span>
                                <p>
                                    <?= substr($entrada['descripcion'] , 0 , 200)."..." ?>
                                </p>
                    </a>
                </article>
                <?php 
                        endwhile;
                    endif;
                ?>

               
            </div><!-- fin del contenedor principal-->
<!-- pie de pagina*-->
<?php require_once 'includes/footer.php' ?>