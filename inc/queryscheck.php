<?php
require('../conexion.php');
$idp = $_POST['valor8'];
$registro = mysqli_query($conexion, "SELECT us.id,us.email, us.nombre, pu.nombre as nomperfil 
from users_contratos uc left join users us on us.id = uc.id_user 
left join perfiles_user pu on pu.idp = us.perfil where uc.id_contrato = $idp  ");

?>
<div class='form-check form-check-inline'>
<?php
while ($regoneseg = mysqli_fetch_array($registro)) { 

 echo $regoneseg['nombre']." ".$regoneseg['email']."
 
 <input  class='form-check-input' type='checkbox' name= '".$regoneseg['id']."' id='".$regoneseg['id']."'  onclick='actualizarpermiso(".$regoneseg['id'].");'>"; ?> 

 <br>
<?php	
  } ?> 
</div>

