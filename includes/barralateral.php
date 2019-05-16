<?php require_once 'includes/helpers.php';?>

<aside id="sidebar">
<div id="buscador" class="blok">
    <h3>Buscar</h3>
    <form action="buscar.php" method="POST">
        <input type="text" name="busqueda">            
        <input type="submit"   value="Buscar">
    </form>
</div>
        <?php if(isset($_SESSION['usuario'])):?>
            <div id="usuario-logueado" class="blok">
                <strong>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></strong>
                <!--botones--> 
                
                <a href="crear-categoria.php" class="boton boton-rojo">Crear categorias</a>
                <a href="crear-entradas.php" class="boton boton-naranja">Crear entradas</a>
                <a href="mis-datos.php" class="boton boton-verde">Mis datos</a>              
                <a href="cerrar.php" class="boton">Cerrar Sesion</a>
               
            </div>         
        <?php endif;?>
        
<?php if(!isset($_SESSION['usuario'])):?>   
                <div id="login" class="blok">
                    <h3>Identificarse</h3>
                        <?php if(isset($_SESSION['error_login'])):?>
                            <div  class='alerta alerta-error'>
                                <?php  echo $_SESSION['error_login'];?>
                            </div>            
                        <?php endif;?>
                    <form action="login.php" method="POST">
                        <Label for="email">Email</Label>
                        <input type="email" name="email">

                        <Label for="pass">Contraseña</Label>
                        <input type="password" name="pass">
                        
                        <input type="submit"   value="Entrar">
                    </form>

                </div>
                <div id="register" class="blok">
                   
                    <h3>Registrate</h3>
                    <?php if(isset($_SESSION['completado'])):?>
                  
                        <div class="alerta alerta-exito"> 
                            <?=  $_SESSION['completado'];?>   
                        </div>
                    <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div class="alerta alerta-exito"> 
                            <?=  $_SESSION['errores']['general'];?>   
                        </div>

                    <?php endif;?>
            
                    <form action="registro.php" method="POST">
                        <Label for="nombre">Nombre</Label>
                        <input type="text" name="nombre">
                        <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'nombre'): '';?>
                        <Label for="apellido">Apellido</Label>
                        <input type="text" name="apellido">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellido'):'';?>

                        <Label for="email">Email</Label>
                        <input type="email" name="email">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email'):'';?>

                        <Label for="pass">Contraseña</Label>
                        <input type="password" name="pass">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'pass'):'' ;?>
                        
                        <input type="submit" name="submit" value="Registrar">
                    </form>
                <?php borrarMensaje();?>
                </div>
<?php endif;?>
            </aside>