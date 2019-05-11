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
    //recoger los valores del formulaaaario --- OPERADORES TERNARIOS
    $nombre=isset($_POST['nombre'])  ?  mysqli_real_escape_string($con, $_POST['nombre'] ) : false;
    $apellido=isset($_POST['apellido']) ?  mysqli_real_escape_string($con, $_POST['apellido']) : false ;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($con, trim($_POST['email'])) : false;  
    $password=isset($_POST['pass']) ? mysqli_real_escape_string($con, $_POST['pass']) : false;
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
    if(!empty($password)){
        $password_validado= true;
    }
    else{
        $password_validado = false;
        $errores['pass'] = 'Te falto 1 o mas campos'; 
    } 
    $guardar_usario = false;
    
    if(count($errores) == 0){
        $guardar_usario = true;

        $password_seguro=  password_hash($password , PASSWORD_BCRYPT ,['cost'=>4]);

        //insertar usuario en la tabla usuarios de la BBDD  
        $sql="insert  into  usuarios  values(null,'$nombre' , '$apellido', '$email' ,'$password_seguro', CURDATE());";
        $guardar= mysqli_query($con,$sql);
              //var_dump(mysqli_error($con));
           // die();
        if($guardar)
        {
           $_SESSION['completado']= $completado = "El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = 'fallo al insertar usuario';
        }
    }else{
        
        $_SESSION['errores'] = $errores;
       
    }
}
header('Location: index.php');
?>