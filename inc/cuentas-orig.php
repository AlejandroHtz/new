<?php include("header.php");
if ($_SESSION['perfil'] <> 1) {
    echo "<script> alert('No puedes ingresar') ;window.location='main.php'</script>";
} else {
}
?>
<div class="container ">
    <button style="float: right;" type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#nuevo">
        Nuevo usuario
    </button>
</div>
<div class="container ">

         <a href="perfiles.php"><button class="btn btn-primary float-right">Perfiles</button></a> 
    </button> 
</div>



<div class="container p-4">

    <br>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>email</th>
                <th>Perfil</th>
                <th></th>
            </tr>
        </thead>
        <?php $querytc =  "SELECT u.id,u.nombre, u.email, pu.nombre as nomperfil,pu.idp
        from users u
        left join perfiles_user pu on pu.idp = u.perfil ";
        $resultadotc = mysqli_query($conexion, $querytc);
        while ($fila = mysqli_fetch_array($resultadotc)) {
            $datoss = $fila['nombre'] . "||" .
                $datoss = $fila['email'] . "||" .
                $datoss = $fila['nomperfil'] . "||" .
                $datoss = $fila['id'] . "||" .
                $datoss = $fila['idp'];
                $datosspss = $fila['id'];
        ?>
            <tbody>
                <td data-titulo="Nombre: "><?php echo $fila['nombre'] ?></td>
                <td data-titulo="Email: "><?php echo $fila['email'] ?></td>
                <td data-titulo="Perfil: "><?php echo $fila['nomperfil'] ?></td>

                <td><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar</button></td>
                <td><button style=" color: 2E2D29;" type="button" class="fas fa-key fa-1x" data-bs-toggle="modal" data-bs-target="#modificartpass" onclick="agregaformpass('<?php echo $datosspss; ?>')"></button></td>
                <!-- https://fontawesome.com/v5.15/icons/key?style=solid-->
            </tbody>
        <?php } ?>
    </table>
</div>



<div class="modal fade bd-example-modal-lg" id="modificart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="act_perfil.php" method="POST">
                    <!--onSubmit="return validarPasswd()" -->
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" ">
                        <input type="hidden" class="form-control" id="inputidp" name="inputidp" readonly>
                        <input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $fila['email'];  ?>">
                    </div>
                    <input type="hidden" name="inppert" id="inppert">

                    <div class="col-md-6">
                        <label for="inputPerfil" class="form-label">Perfil</label>

                        <select name="inputPerfil" id="inputPerfil" class="form-control">
                            <option value="">Selecciona</option>
                            <?PHP $registro = mysqli_query($conexion, "SELECT * from perfiles_user order by nombre asc;");

                            while ($regoneseg = mysqli_fetch_array($registro)) { ?>

                                <option value='<?php echo $regoneseg['idp']; ?>'> <?php echo $regoneseg['nombre']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                  
                    <p>
                      
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#resultadocontrato" aria-expanded="false" aria-controls="collapseExample" onclick="cargacontratos()">
                            Contratos
                        </button>
                    </p>


                    <!-- <div class="col-md-3">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                    </div>
                    <div class="col-md-3">
                        <label for="inputPasswordos" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="inputPasswordos" name="inputPasswordos">
                    </div> -->

                    <div class="collapse" style="width: 100%; height: 500px; overflow-y: scroll;" id="resultado">
                    </div>
                    <div class="collapse" style="width: 100%; height: 500px; overflow-y: scroll;" id="resultadocontrato">
                    
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnactualizar" name="btnactualizar" value="actualizar" class="btn btn-primary ">Actualizar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modificartpass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="act_perfil.php" onSubmit="return validarPasswd()" method="POST">
                    <input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>">
                    <input type="hidden" class="form-control" id="inputidppass" name="inputidppass" ">
                    <div class=" col-md-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword">
            </div>
            <div class="col-md-3">
                <label for="inputPasswordos" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="inputPasswordos" name="inputPasswordos">
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btnactualizarpass" name="btnactualizarpass" value="actualizarpass" class="btn btn-primary ">Actualizar</button>

            </div>
            </form>
        </div>
    </div>
</div>
</div>


<div class="modal fade bd-example-modal-lg" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="act_perfil.php" onSubmit="return validarPasswdnuevo()" method="POST">
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" required>

                        <input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPerfil" class="form-label">Perfil</label>

                        <select name="inputPerfil" id="inputPerfil" class="form-control">

                            <?PHP $registro = mysqli_query($conexion, "SELECT * from perfiles_user order by idp desc");

                            while ($regoneseg = mysqli_fetch_array($registro)) { ?>

                                <option value='<?php echo $regoneseg['idp']; ?>'> <?php echo $regoneseg['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="inputPasswordnuevo" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPasswordnuevo" name="inputPasswordnuevo" required>
                    </div>
                    <div class="col-md-3">
                        <label for="inputPasswordosnuevo" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="inputPasswordosnuevo" name="inputPasswordosnuevo" required>
                    </div>
                    <!-- <div class="col-md-6">
            <label for="inputCv_Modelo" class="form-label">Contrato</label>
            <input type="text" class="form-control" id="inpcontrato" name="inpcontrato" value="<?php echo $fila['id_contrato'];  ?>">
          </div> -->




                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnagregar" name="btnagregar" value="agregar" class="btn btn-primary ">Crear</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

function addcontra() {
        var text = "" + $("#addcont option:selected").text();
        var contid = $("#addcont").val();
        var userid = $("#inputidp").val();
        $("#addcont option[value='" + contid + "']").remove();
        $("#contracts").append("<option value='" + contid + "'>" + text + "</option>");
      
    $.ajax({
        data: {
                  
                    'contid': contid,
                    'userid': userid,
                },
           
            url: 'nuevo_perfil.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
               
            },
            success: function(responsedos) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(responsedos != ''){
                    alert(responsedos);
                }

            }

        });
    }


    function delcontra() {
        var idselect = "";
        idselect = "" + $("#contracts").val();
        var text = "" + $("#contracts option:selected").text();
        var userid = $("#inputidp").val();
        let option = confirm('¿Deseas eliminar este contrato: ' + text + '?');
        if (option) {
            //ELIMINAR EL CONTRATO
            $("#contracts option[value='" + idselect + "']").remove();
            $("#addcont").append("<option value='" + idselect + "'>" + text + "</option>");
            $.ajax({
        data: {
                  
                    'contidel': idselect,
                    'userid': userid,
                },
           
            url: 'nuevo_perfil.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
               
            },
            success: function(responsedos) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(responsedos != ''){
                    alert(responsedos);
                }

            }

        });
        }
    }


function cargacontratos(){
    var uuid= ""+$("#inputidp").val();
    $.ajax({
        data: {
                  
                    'uuid': uuid
                },
           
            url: 'nuevo_perfil.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resultadocontrato").html("Procesando, espere por favor...");
            },
            success: function(responsedos) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resultadocontrato").html(responsedos);

            }

        });
}


    function leyenda() {

        $("#leyenda").html("Si cambiaste el perfil, aun no modifiques los permisos, guarda los cambios y abre nuevamente para modificarlos ");

    }

    function agregaform(datoss) {
        d = datoss.split('||');
        $('#resultadocontrato').html("");
        // $('#resultadocontrato').collapse();
        
        $('#inputNombre').val(d[0]);
        $('#inputEmail').val(d[1]);
        $('#inppert').val(d[2]);
        $('#inputidp').val(d[3]);
        $('#inppert').val(d[4]);




        var parametros = {
            "valor5": d[4]
        };


        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'querys.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function(responsedos) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resultado").html(responsedos);

            }

        });
        //alert("" + d[2]);
        $('#inputPerfil').val(d[4]).change();
    }

    function agregaformpass(datosspss) {
        d = datosspss.split('||');


        $('#inputidppass').val(d[0]);



    }

    function validarPasswd() {

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
            alert("La contraseña no puede contener espacios en blanco");
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

    function validarPasswdnuevo() {

        var p1 = document.getElementById("inputPasswordnuevo").value;
        var p2 = document.getElementById("inputPasswordosnuevo").value;
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
            alert("La contraseña no puede contener espacios en blanco");
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


    function actualizarpermiso(uuid) {
        var chk = document.getElementById("" + uuid).checked;
        var activado = 0;

        if (chk == true) {
            activado = 1;
            $.ajax({
                type: "POST",
                data: {
                    'activado': activado,
                    'uuid': uuid
                },
                url: 'updateper.php', 
                cache: false,
                success: function(data) {
                    alert("" + data);
                }
            });

        }
        if (chk == false) {
            activado = 0;
            $.ajax({
                type: "POST",
                data: {
                    'activado': activado,
                    'uuid': uuid
                },
                url: 'updateper.php',
                cache: false,
                success: function(data) {
                    alert("" + data);
                }
            });

        }
    }

</script>




<?php include("footer.php") ?>