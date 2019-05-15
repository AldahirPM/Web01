<?php
function  mostrarError($errores, $campo){
    $alerta ='';
    if(isset($errores[$campo]) && !empty($campo)){
      $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }  
    return $alerta;
  }
/**/ 
function borrarMensaje(){
  $borrar=false;
  $_SESSION['completado']=null;
 
    if(isset($_SESSION['errores']))
    {
      $_SESSION['errores'] = null;
       $borrar = true;
    }
    if(isset($_SESSION['errores_entrada']))
    {
      $_SESSION['errores_entrada'] = null;
      $borrar = true;
    }

    if(isset($_SESSION['errores']))
    {
      $_SESSION['completado'] = null;
      $borrar = true;
    }
 // $borrar = session_unset($_SESSION['errores']);
  
  return $borrar;
}
function conseguirCategorias($cone){
  $sql ="select * from categorias order by id asc";
  $result = array();
  $categorias= mysqli_query($cone, $sql);
  if ($categorias && mysqli_num_rows($categorias) >=1) {
    $result = $categorias;
  
  }
  return $result;
}
function conseguirEntrada($cone , $id){
  $sql ="select e.* , c.nombre as 'categoria', CONCAT(u.nombre ,' ', u.apellidos) as usuario from entradas e INNER JOIN  categorias c ON e.categoria_id = c.id inner join usuarios u on e.usuario_id = u.id WHERE e.id=  $id";
  $entrada = mysqli_query($cone , $sql);
  $resultado = array();
  if($entrada && mysqli_num_rows($entrada)){
    $resultado = mysqli_fetch_assoc($entrada);
  }
  return $resultado;
}
function conseguirEntradas($cone , $limit= null , $categorias = null){
  $sql="select e.* , c.nombre from entradas e INNER JOIN  categorias c ON e.categoria_id = c.id  ";
  if(!empty($categorias)){
    $sql.="where c.id = $categorias";
  }
  $sql.=" ORDER BY e.id DESC "; 

  if($limit){
    $sql.="LIMIT 4 ";
  }
  $entradas = mysqli_query($cone,$sql);
  $resultado = array();
  if($entradas && mysqli_num_rows($entradas) >= 1 ){
    $resultado = $entradas;
  }
 
  return $resultado;

}
function mostrarCategorias($cone , $id  ){
  $sql ="select * from categorias   where id = $id ;";
  $categorias= mysqli_query($cone, $sql); 
  $result = array();
  if ($categorias && mysqli_num_rows($categorias) >=1) {
    $result =  mysqli_fetch_assoc($categorias);
  }
  return $result;
}




?>