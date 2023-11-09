<?php
require ('conexion.php');
 session_start(); 
 $_SESSION['email'];
 $us=$_SESSION['email'];

 $fecsalir= mysqli_query ($conexion, " UPDATE bitacora set 
 fechafin = current_date, horafin = current_timestamp where idbitacora =
 (select max(idbitacora) from bitacora where usuario = '$us') " );
if ($fecsalir) {
	session_destroy();
	clearstatcache();
	header('location: /'); 
 
}
?>