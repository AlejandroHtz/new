<?php
require('../conexion.php');
//'activado': activado,'uuid': uuid
$idp = "";
$activado = "";
if(isset($_POST["uuid"]) && isset($_POST["activado"])){
$idp = $_POST["uuid"];
$activado = $_POST["activado"];
$sql="UPDATE perfiles SET act = '".$activado."' WHERE  id = ".$idp.";";
mysqli_query($conexion, $sql) or die ("Error UPDT PER" . mysqli_error($conexion));
if ($activado=="1") { echo"Permiso activado: "; }
if ($activado=="0") { echo"Permiso revocado: "; }
}
?>