<?php   
require_once 'conexion.php';

if(!isset($_SESSION['usuario'])){
    header("Location:index.php");
}
?>