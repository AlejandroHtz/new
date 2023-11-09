<?php include("header.php"); 
	$id =$_SESSION['id']
?>


<div class="container p-4">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>email</th>
                <th>Perfil</th> 
                <th></th>
            </tr>
        </thead>
        <?php $querytc =  "SELECT u.id,u.nombre, u.email, pu.nombre as nomperfil from users u
        left join perfiles_user pu on pu.idp = u.perfil where u.id = $id ";
        $resultadotc = mysqli_query($conexion, $querytc);
        $fila = mysqli_fetch_array($resultadotc);
         
        ?>
            <tbody>
                <td data-titulo="Nombre: "><?php echo $fila['nombre'] ?></td>
                <td data-titulo="Email: "><?php echo $fila['email'] ?></td>
                <td data-titulo="Perfil: "><?php echo $fila['nomperfil'] ?></td>
                <!-- <td><button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar.</button></td> -->
                <td><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart">Modificar.</button></td>
            </tbody>
     
    </table>
</div>

 
<div class="modal fade bd-example-modal-lg" id="modificart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
 
                <form class="row g-3" action="act_perfil.php" onSubmit="return validarPasswd()" method="POST"> 
                    <!-- <div class="col-md-6"> -->
                        <!-- <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="<?php echo $fila['nombre'] ?>"> -->
                        <input type="hidden" class="form-control" id="inputidp" name="inputidp" value="<?php echo $fila['idp'];  ?>">
                        <input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>">
                    <!-- </div> -->
                    <!-- <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $fila['email'];  ?>">
                    </div>
                 
                    <div class="col-md-6">
                        <label for="inputPerfil" class="form-label">Perfil</label>

                        <select name="inputPerfil" id="inputPerfil" class="form-control">
                            <option  value="">Selecciona</option>
                            <?PHP $registro = mysqli_query($conexion, "SELECT * from perfiles_user");

                            while ($regoneseg = mysqli_fetch_array($registro)) { ?>

                                <option value='<?php echo $regoneseg['idp']; ?>'> <?php echo $regoneseg['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div> -->
                    <div class="col-md-10">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                       
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label"></label>
                    <svg id=clickme width=28 height=25 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M569.354 231.631C512.97 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-102.556 0-192.091-54.701-240-136 44.157-74.933 123.677-127.27 216.162-135.007C273.958 131.078 280 144.83 280 160c0 30.928-25.072 56-56 56s-56-25.072-56-56l.001-.042C157.794 179.043 152 200.844 152 224c0 75.111 60.889 136 136 136s136-60.889 136-136c0-31.031-10.4-59.629-27.895-82.515C451.704 164.638 498.009 205.106 528 256c-47.908 81.299-137.444 136-240 136z" />
                        </svg>
                    </div>
                    <div class="col-md-10">
                        <label for="inputPasswordos" class="form-label">Confirma la contraseña</label>
                        <input type="password" class="form-control" id="inputPasswordos" name="inputPasswordos">
                       
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label"></label>
                    <svg id=clickmedos width=28 height=25 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M569.354 231.631C512.97 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-102.556 0-192.091-54.701-240-136 44.157-74.933 123.677-127.27 216.162-135.007C273.958 131.078 280 144.83 280 160c0 30.928-25.072 56-56 56s-56-25.072-56-56l.001-.042C157.794 179.043 152 200.844 152 224c0 75.111 60.889 136 136 136s136-60.889 136-136c0-31.031-10.4-59.629-27.895-82.515C451.704 164.638 498.009 205.106 528 256c-47.908 81.299-137.444 136-240 136z" />
                        </svg>
                    </div>
                    <!-- <div class="col-md-6">
            <label for="inputCv_Modelo" class="form-label">Contrato</label>
            <input type="text" class="form-control" id="inpcontrato" name="inpcontrato" value="<?php echo $fila['id_contrato'];  ?>">
          </div> -->

                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $usuario; ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnactualizar" name="btnactualizar" value="password" class="btn btn-primary ">Actualizar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    #clickme {
        cursor: pointer
    }
</style>
<script>
      jQuery('#clickme').on('click', function() {
        jQuery('#inputPassword').attr('type', function(index, attr) {
            return attr == 'text' ? 'password' : 'text';
        })
    })

    jQuery('#clickmedos').on('click', function() {
        jQuery('#inputPasswordos').attr('type', function(index, attr) {
            return attr == 'text' ? 'password' : 'text';
        })
    })


    function validarPasswd () {
   
   var p1 = document.getElementById("inputPassword").value;
   var p2 = document.getElementById("inputPasswordos").value;
   var espacios = false;
   var cont = 0;
 
   // Este bucle recorre la cadena para comprobar
   // que no todo son espacios
     while (!espacios && (cont < p1.length)) {
         if (p1.charAt(cont) == " ")
             espacios = true;
         cont++;
     }
    
   if (espacios) {
    alert ("La contraseña no puede contener espacios en blanco");
    return false;
   }
    
   if (p1.length == 0 || p2.length == 0) {
    alert("Los campos de la password no pueden quedar vacios");
    return false;
   }
    
   if (p1 != p2) {
    alert("Las passwords deben de coincidir");
    return false;
   } else {
    // alert("Todo esta correcto");
    return true; 
   }
  } 
</script>

<?php include("footer.php") ?>