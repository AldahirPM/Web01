<?php 

 /*try{
 	
 	//echo 'ok';
 }catch(Exception $e)
 {
 	die('error:'. $e->GetMessage());
 }*/
 $cn = new mysqli('localhost','root','','blog');
 if($cn->connect_error==""){
	$con=$cn;
 }else{
	 $con="";
	 echo  "error : " . $cn->connect_error;
 }
 //print_r($cn); 
 
 session_start();


 ?>