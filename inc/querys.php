<?php
require('../conexion.php');
$idp = $_POST['valor5'];
$registro = mysqli_query($conexion, "SELECT * from perfiles where idp = $idp  order by texto asc");

?>
<div class='form-check form-check-inline'>
<?php
while ($regoneseg = mysqli_fetch_array($registro)) { 
if($regoneseg['act']== 1){
  echo $regoneseg['texto']." 
 <input  class='form-check-input' type='checkbox' name= '".$regoneseg['id']."' id='".$regoneseg['id']."' checked onclick='actualizarpermiso(".$regoneseg['id'].");'>"; ?> 

 <br>
<?php	}	else {
echo $regoneseg['texto']."
<input class='form-check-input' type='checkbox' name= '".$regoneseg['id']."' id='".$regoneseg['id']."' onclick='actualizarpermiso(".$regoneseg['id'].");'>"; ?> <br>
<?php	}
  } ?> 

</div>

