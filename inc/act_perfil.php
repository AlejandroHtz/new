<?php
require '../conexion.php'; 
$inputuser = $_SESSION['nombre'];
 
//contraseñas
if(isset($_POST['btnactualizarpass'])){ 
   $inputPassword = $_POST['inputPassword'];
   $id = $_POST['inputidppass'];
//   
    $sqlpass = "UPDATE users SET 
    users.password = password ('$inputPassword'),
    fecha_modificacion = current_date,
 hora_modificacion = current_time,
 usuario_modificacion = '$inputuser'
   where id = $id ";
   $resultp = mysqli_query($conexion, $sqlpass);
   if($resultp){
         
    echo "<script> alert('Actualizado') ;window.location='cuentas.php'</script>";
         }

}


if(isset($_POST['btnactualizar'])){ 
 $inputNombre = $_POST['inputNombre'];
 $inputEmail = $_POST['inputEmail'];
 $inputPerfil = $_POST['inputPerfil'];
 $inputidp = $_POST['inputidp'];
//  $inputPassword = $_POST['inputPassword'];

   

 $sql = "UPDATE users SET 
 nombre = '$inputNombre',
 email = '$inputEmail',
 perfil = '$inputPerfil',
 fecha_modificacion = current_date,
 hora_modificacion = current_time,
 usuario_modificacion = '$inputuser'

where id = $inputidp";
$result = mysqli_query($conexion, $sql);


if($result){
         
 echo "<script> alert('Actualizado') ;window.location='cuentas.php'</script>";
      }
    }

if(isset($_POST['btnagregar'])){

  $inputNombre = $_POST['inputNombre'];
 $inputEmail = $_POST['inputEmail'];
 $inputPerfil = $_POST['inputPerfil'];
 $inputPassword = $_POST['inputPasswordnuevo'];

  $sql = "INSERT INTO users (nombre,email,perfil,users.password,fecha_creacion,hora_creacion,usuario_creacion)
  values
  ('$inputNombre','$inputEmail','$inputPerfil',password ('$inputPassword'),current_date,current_time,'$inputuser') ";
 
$result = mysqli_query($conexion, $sql);
if($result){
         
  echo "<script> alert('Agregado') ;window.location='cuentas.php'</script>";
       }
}

?>