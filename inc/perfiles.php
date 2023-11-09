<?php include("header.php"); 
if ($_SESSION['perfil'] <> 1) {
    echo "<script> alert('No puedes ingresar') ;window.location='/'</script>";
} else {
}?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container ">
    <button style="float: left;" type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#nuevoperfil">
    
        Nuevo perfil
    </button>
</div>

<div class="container p-4">

<br>
<table class="table table-bordered ">
    <thead>
        <tr>
            <th>Nombre</th>
            
            <th></th>
        </tr>
    </thead>
    <?php $querytc =  "SELECT *
    from perfiles_user order by idp asc";
    $resultadotc = mysqli_query($conexion, $querytc);
    while ($fila = mysqli_fetch_array($resultadotc)) {
        $datoss = $fila['idp'] . "||" .
        $datoss = $fila['nombre'];
    ?> 
        <tbody>
            <td data-titulo="Nombre: "><?php echo $fila['nombre'] ?></td>
            

            <td><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar</button></td>
           
            <!-- https://fontawesome.com/v5.15/icons/key?style=solid-->
        </tbody>
    <?php } ?>
</table>
</div>




<div class="modal fade bd-example-modal-lg" id="modificart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="act_perfil.php" method="POST">
                    <!--onSubmit="return validarPasswd()" -->
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label" ></label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" readonly>
                    
                    </div>
                 
                    <div class="col-md-6">
                        <label></label>

                        <span id="leyenda"></span>
                    </div>
                    <p>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#resultado" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Permisos
                        </a>
                   
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
                       

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="nuevoperfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="nuevo_perfil.php" method="POST">
                    <!--onSubmit="return validarPasswd()" -->
                    <div class="form-group row"> 

                        <div class="col-md-3 mb-3">
                            <label for="inpEstPre">Perfil</label>
                            <input type="text" class="form-control" id="inpPerfil" name="inpPerfil">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for=""></label>
                            <input type="submit" value="Crear" class="btn btn-primary form-control">
                        </div>
                        <span id="resultadoperfil"></span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
       function agregaform(datoss) {
        d = datoss.split('||');
        // $('#resultadocontrato').html("");
        // $('#resultadocontrato').collapse();
        
        $('#inputNombre').val(d[1]);
      




        var parametros = {
            "valor5": d[0]
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
                   // alert("" + data);
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
                    //alert("" + data);
                }
            });

        }
    }
</script>
<?php include("footer.php") ?>