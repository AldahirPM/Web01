<?php
if(isset($_POST)) {
    require_once 'includes/conexion.php';

    $titulo =isset($_POST['titulo'])? mysqli_real_escape_string($con, $_POST['titulo'] ):false;
    $descripcion =isset($_POST['descripcion'])? mysqli_real_escape_string($con, $_POST['descripcion'] ):false;   
    $categoria =isset($_POST['categoria'])? (int)($_POST['categoria']):false;
    $usuario= $_SESSION['usuario']['id'];

    $errores = array();

    if(empty($titulo)){ 
        $errores['titulo'] = 'el titulo no es valido';
    } 
    if(empty($descripcion)){ 
        $errores['descripcion'] = 'la descripcion no es valida ';
    }
    if(empty($categoria) && !is_numeric($categoria)){ 
        $errores['categoria'] = 'La categoria no es valida';
    } 
 
    if(count($errores) == 0){
        $sql = "insert into entradas values(null, $usuario,$categoria,'$titulo','$descripcion',CURDATE());";
        $guardar = mysqli_query($cn , $sql);
        header("Location: index.php");

    }else {
        $_SESSION["errores_entrada"]=$errores;
        header("Location: crear-entradas.php");
    } 

}

?>