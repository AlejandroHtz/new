<?php
include("header.php"); 

require ('perfilloader.php');

$usuario = $_SESSION['nombre'];
$uuid_usr = $_SESSION['id'];

?> 

<link rel="stylesheet" href="../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../../js/jquery.js"></script>
<script src="../../js/jquery-ui.js"></script>

<body onload="BuscarOperador();"></body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>Clientes</strong></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card mb-3 ">
      <h5 class="card-header"><strong>Buscar</strong></h5>
      <div class="card-body">

        <div class="row ">
          <div class="form-group col-sm-3">
            <input class="form-control" type="text" name="buscar" id="buscar" onkeyup="BuscarOperador()">
          </div>
          <div class="form-group col-sm-2">
            <?PHP if ($_SESSION['add_cobranza'] == "1") { ?>

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo">Nuevo cliente</button>
            <?php } ?>
          </div>
        </div>

      </div>
    </div>


  </section>

  <section class="content">
    <div class="card text-dark bg-light mb-3">
      <!--<h5 class="card-header border-warning mb-2 text-center" ><strong>Solicitudes en proceso</strong></h5>-->
      <div class="card-body">


        <span id="resultado"></span>


      </div>
    </div>

    <style>
      ul.pagination li a {
        margin: 0 2px;
        /* 0 is for top and bottom. Feel free to change it */
      }
    </style>


    <div class="container">
      <ul class="pagination pagination-lg" id="myPager"></ul>
    </div>

      <!-- Modal modificar usuario -->

      <div class="modal fade bd-example-modal-lg" id="modificart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar cliente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form class="row g-3" id="actcliente">
                <!--onSubmit="return validarPasswd()" -->
                <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" required>
                        <input type="hidden" class="form-control" id="InputIdop" name="InputIdop" >

                        <!--<input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>"> -->
                      </div>
      
                      <div class="col-md-6">
                        <label for="inputRfc" class="form-label">Rfc</label>
                        <input type="text" class="form-control" id="inputRfc" name="inputRfc" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputDireccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" required>
                      </div>
                      
                      <div class="col-md-6">
                        <label for="inputColonia" class="form-label">Colonia</label>
                        <input type="text" class="form-control" id="inputColonia" name="inputColonia" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCiudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="inputCiudad" name="inputCiudad" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputMunicipio" class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="inputMunicipio" name="inputMunicipio" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCp" class="form-label">Codigo postal</label>
                        <input type="text" class="form-control" id="inputCp" name="inputCp" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputTelefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" required>
                      </div>
                      <input type="hidden" name="crud" id="crud" value="actualizar">
                


                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnactualizar" onclick="actcliente()" name="btnactualizar" value="actualizar" class="btn btn-primary ">Actualizar</button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Modal modificar usuario --> 
  <!-- modal nuevo usuario -->

  <div class="modal fade bd-example-modal-lg" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <form class="row g-3" id="inscliente" >
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" required>
                       
                      </div>
                      <div class="col-md-6">
                        <label for="inputRfc" class="form-label">Rfc</label>
                        <input type="text" class="form-control" id="inputRfc" name="inputRfc" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputDireccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputColonia" class="form-label">Colonia</label>
                        <input type="text" class="form-control" id="inputColonia" name="inputColonia" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCiudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="inputCiudad" name="inputCiudad" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputMunicipio" class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="inputMunicipio" name="inputMunicipio" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCp" class="form-label">Codigo postal</label>
                        <input type="text" class="form-control" id="inputCp" name="inputCp" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputTelefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" required>
                      </div>
                      <input type="hidden" name="crud" id="crud" value="insertar">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="btnagregar" name="btnagregar" onclick="inscliente()" value="agregar" class="btn btn-primary ">Crear</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /modal nuevo usuario -->
    <script>
      function BuscarOperador() {
        inpTodo = document.getElementById('buscar').value;

        if (inpTodo == '') {
          var inpTodo = 0;

        } else {
          var aux = 0;
        } 
        var parametros = {
          "inpTodo": inpTodo,
          "aux": aux
        };


        $.ajax({
          data: parametros, //datos que se envian a traves de ajax
          url: 'catalogos/clientes_query.php', //archivo que recibe la peticion
          type: 'post', //método de envio
          beforeSend: function() {
            $("#resultado").html("Procesando, espere por favor...");
          },
          success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
            console.log(response);
            

          }
        });
      }

      function agregaform(datoss) {
        d = datoss.split('||');
        $('#resultadocontrato').html("");
        // $('#resultadocontrato').collapse();
        
        $('#inputNombre').val(d[0]);
        $('#inputRfc').val(d[1]);
        $('#inputDireccion').val(d[2]);
        $('#inputColonia').val(d[3]);
        $('#inputCiudad').val(d[4]);
        $('#inputMunicipio').val(d[5]);
        $('#inputCp').val(d[6]);
        $('#inputTelefono').val(d[7]);
        $('#InputIdop').val(d[8]);


    }

    function agregaformpass(datosspss) {
        d = datosspss.split('||');


        $('#inputidppass').val(d[0]);



    }
    function inscliente() { 

      var datos = $('#inscliente').serialize();
      $.ajax({
        type: "POST",
        url: "catalogos/crud_clientes.php",
        data: datos,
        beforeSend: function() {

        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

          alert(response);
          if (response === "Insertado") {
            location.reload();
          } else {}
        }
      });

    };


    function actcliente() {

      var datos = $('#actcliente').serialize();
      $.ajax({
        type: "POST",
        url: "catalogos/crud_clientes.php",
        data: datos,
        beforeSend: function() {

        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

          alert(response);
          if (response === "Actualizado") {
            location.reload();
          } else {}
        }
      });

    };

    </script>

  </section>



</div>


<?php require ('footer.php');?>