<?php
if(isset($_POST))
{   
    //conexion a la base de datos
    require_once 'includes/conexion.php'; 
    //inicio de sesion
 
    if(!isset($_SESSION))
    {
       session_start();
    }
    //actualizar los valores del formulaaaario --- OPERADORES TERNARIOS
    $nombre=isset($_POST['nombre'])  ?  mysqli_real_escape_string($con, $_POST['nombre'] ) : false;
    $apellido=isset($_POST['apellido']) ?  mysqli_real_escape_string($con, $_POST['apellido']) : false ;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($con, trim($_POST['email'])) : false;  
    
    //array de errores 
     $errores = array();

    //validando los datos del formulario

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado= true; 
    }
    else{
        $nombre_validado=false;
        $errores['nombre']="Escribe bien tu nombre";
    } 
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/" , $apellido)){
        $apellido_validado= true;
    }
    else{
        $apellido_validado=false;
        $errores['apellido']="Escribe bien tu apellido";    
    }
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL )){
        $email_validado= true;
    }
    else{
        $email_validado=false;
        $errores['email']="Escribe tu email";
    }
    $guardar_usario = false;
    
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario']['id'];
        $guardar_usario = true;
        
        //comprobar si email existe
        $sql = "select id , email from usuarios where email ='$email'"; 
        $isset_email= mysqli_query($con,$sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if($isset_user['id'] ==  $usuario['usuario']['id'] || empty($isset_user) ){
           
        //insertar usuario en la tabla usuarios de la BBDD  
        
        $sql="update usuarios set nombre='$nombre',apellidos= '$apellido',email='$email' WHERE id = $usuario";
        //var_dump($sql);
        //die();
        $guardar= mysqli_query($con,$sql);
    
            if($guardar)
            {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellido;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado']= $completado = "Se actualizo con exito";
            }else{
                $_SESSION['errores']['general'] = 'fallo al insertar usuario';
            }
        
        }else{

            $_SESSION['errores']['general'] = 'El usuario ya existe';
        }

        
    }else{
        
        $_SESSION['errores'] = $errores;    
       
    }
}
header('Location: mis-datos.php');
?>