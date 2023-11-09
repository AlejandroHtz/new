<?php
require '../conexion.php';
if (isset($_POST['inpPerfil'])) {
    //echo $_POST['inpPerfil'];
    $nom = $_POST['inpPerfil'];

    $query = "INSERT INTO perfiles (nom,nomper,act,texto,idp)
        select distinct '$nom',pp.nomper,0,pp.texto,(aa.idp+1) as idp from perfiles pp
            JOIN (SELECT MAX(idp) as idp from perfiles_user) aa
            order by pp.nomper asc,pp.texto ASC";
    $result = mysqli_query($conexion, $query);
    $querypp = "INSERT INTO perfiles_user (nombre)values ('$nom')";
    $resultpp = mysqli_query($conexion, $querypp);
    if ($result || $resultpp) {
        echo "<script> alert('Creado el perfil ;$nom') ;window.location='perfiles.php'</script>";
    } else {
        echo "<script> alert('No se creo el perfil; $nom') ;window.location='perfiles.php'</script>";
    }
}
if (isset($_POST['uuid'])) {
    $id =  $_POST['uuid'];

?>
    <select name="addcont" id="addcont" style="width: 50%;">
<?PHP $registro = mysqli_query($conexion, "SELECT id_contrato,num_contrato from contrato 
                                where length(num_contrato)>2 
                                and id_contrato not in (SELECT uc.id_contrato 
                                from users_contratos uc
            left join contrato c on c.id_contrato = uc.id_contrato
            where uc.id_user = $id) order by num_contrato desc");

        while ($regoneseg = mysqli_fetch_array($registro)) { ?>

            <option value='<?php echo $regoneseg['id_contrato']; ?>'> <?php echo $regoneseg['num_contrato']; ?></option>
        <?php } ?>
    </select>
    <input type="button" onclick="addcontra();" value="Agregar">
    <div id="divcontratos">
    <select name="contracts" size="10" id="contracts" style="width: 100%; ">
        <?php
$registroa = mysqli_query($conexion, "SELECT uc.id,uc.id_user,c.id_contrato,c.num_contrato 
from users_contratos uc
left join contrato c on c.id_contrato = uc.id_contrato
where uc.id_user = $id");

        while ($regonesega = mysqli_fetch_array($registroa)) { ?>

            <option value='<?php echo $regonesega['id_contrato']; ?>'> <?php echo $regonesega['num_contrato']; ?></option>


        <?php } ?>
    </select>


    </div>

    <input type="button" onclick="delcontra();" value="Eliminar Contrato">

<?php }

if(isset($_POST['contid'])){
    $contid = $_POST['contid'];
    $userid = $_POST['userid'];
    $registroa = mysqli_query($conexion, "SELECT count(id) as cuantos
    from users_contratos     
    where id_user = $userid and id_contrato = $contid");
    
$rcuenta = mysqli_fetch_array($registroa); 
if($rcuenta['cuantos'] == 0 ){

 
   $query= "INSERT INTO users_contratos(id_user,id_contrato )
values ('$userid','$contid')" ;
$result = mysqli_query($conexion, $query);
// if($result){
//      		echo "1";
//      	}
}
}


if(isset($_POST['contidel'])){
    $contidel = $_POST['contidel'];
    $userid = $_POST['userid'];
   

 
   $querydel= "DELETE FROM users_contratos 
   WHERE id_user = '$userid' AND id_contrato = '$contidel'";

$resultdel = mysqli_query($conexion, $querydel);
// if($result){
//      		echo "1";
//      	}

}




?>