
<?php
require 'header.php';

if($_SESSION['permisos'] != 1){
    if($_SESSION['permisos'] == 1){
    echo "<script> alert('No puedes ingresar') ;window.location='cobranza.php'</script>";
}else { echo "<script> alert('No puedes ingresar') ;window.location='dashboard.php'</script>";}
 }else{ }
?>