<?php

require_once 'includes/conexion.php';
//recoger datos del login
if(isset($_POST)){
    $email = trim($_POST['email']) ;
    $password= $_POST['pass'];
    //cobnsulta para comprobar las credenciales  del usuario    
    $sql= "select * from usuarios  where  email = '$email'";
    $login = mysqli_query($con, $sql);
    if($login && mysqli_num_rows($login) == 1 ){
        $usuario = mysqli_fetch_assoc($login);
   
        //comprobar  la contraseña 
           
        $verify = password_verify($password , $usuario['password']);
           
        if($verify){

            //ulizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario']=$usuario;
            
            if(isset($_SESSION['error_login'])){
                unset($_SESSION['error_login']);
             //para poder vaciar las variables usar unset  / en vez de session unset 
            }
 
        }else{

            //si  algo falla enviar una sesion con el fallo
            $_SESSION['error_login']="login incorrecto!!";


        }

    }else{
        
       
        //mesaje error
        $_SESSION['error_login']= "login incorrecto!!";
         
    }

}
header('Location: index.php')
//referiri indexs


?>
