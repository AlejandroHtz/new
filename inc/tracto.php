<?php
include("header.php"); 

require ('perfilloader.php');
$usuario = $_SESSION['nombre'];
$uuid_usr = $_SESSION['id']; 
 
?>

<link rel="stylesheet" href="../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>

<body onload="BuscarTracto();"></body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>Tracto</strong></h1>
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
            <input class="form-control" type="text" name="buscar" id="buscar" onkeyup="BuscarTracto()">
          </div>
          <div class="form-group col-sm-2">
            <?PHP if ($_SESSION['add_cobranza'] == "1") { ?>

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo">Agregar</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Modificar operador</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form class="row g-3" id="actracto">
                <!--onSubmit="return validarPasswd()" -->
                <div class="col-md-6">
                        <label for="inputTracto" class="form-label">Tracto</label>
                        <input type="text" class="form-control" id="inputTracto" name="inputTracto" required>

                        <!--<input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>"> -->
                      </div>
                      <div class="col-md-6">
                        <label for="inputPlacas" class="form-label">Placas</label>
                        <input type="text" class="form-control" id="inputPlacas" name="inputPlacas" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputMarca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="inputMarca" name="inputMarca" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputModelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="inputModelo" name="inputModelo" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputColor" class="form-label">Color</label>
                        <input type="text" class="form-control" id="inputColor" name="inputColor" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCilindros" class="form-label">Cilindros</label>
                        <input type="text" class="form-control" id="inputCilindros" name="inputCilindros" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputTransmision" class="form-label">Transmision</label>
                        <input type="text" class="form-control" id="inputTransmision" name="inputTransmision" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputMotor" class="form-label">Motor</label>
                        <input type="text" class="form-control" id="inputMotor" name="inputMotor" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputSerMotor" class="form-label">Serie motor</label>
                        <input type="text" class="form-control" id="inputSerMotor" name="inputSerMotor" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputEstatus" class="form-label">Estatus</label>
                        <input type="text" class="form-control" id="inputEstatus" name="inputEstatus" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputKilom" class="form-label">Kilometraje</label>
                        <input type="text" class="form-control" id="inputKilom" name="inputKilom" required>
                      </div>
                      <input type="hidden" name="crud" id="crud" value="actualizar">
                      <input type="hidden" name="inputIdtrac" id="inputIdtrac">
                      

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnactualizar" onclick="acttract()" name="btnactualizar" value="actualizar" class="btn btn-primary ">Actualizar</button>

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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar tracto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <form class="row g-3" id="instract" >
                      <div class="col-md-6">
                        <label for="inputTracto" class="form-label">Tracto</label>
                        <input type="text" class="form-control" id="inputTracto" name="inputTracto" required>

                        <!--<input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>"> -->
                      </div>
                      <div class="col-md-6">
                        <label for="inputPlacas" class="form-label">Placas</label>
                        <input type="text" class="form-control" id="inputPlacas" name="inputPlacas" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputMarca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="inputMarca" name="inputMarca" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputModelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="inputModelo" name="inputModelo" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputColor" class="form-label">Color</label>
                        <input type="text" class="form-control" id="inputColor" name="inputColor" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCilindros" class="form-label">Cilindros</label>
                        <input type="text" class="form-control" id="inputCilindros" name="inputCilindros" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputTransmision" class="form-label">Transmision</label>
                        <input type="text" class="form-control" id="inputTransmision" name="inputTransmision" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputMotor" class="form-label">Motor</label>
                        <input type="text" class="form-control" id="inputMotor" name="inputMotor" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputSerMotor" class="form-label">Serie motor</label>
                        <input type="text" class="form-control" id="inputSerMotor" name="inputSerMotor" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputEstatus" class="form-label">Estatus</label>
                        <input type="text" class="form-control" id="inputEstatus" name="inputEstatus" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputKilom" class="form-label">Kilometraje</label>
                        <input type="text" class="form-control" id="inputKilom" name="inputKilom" required>
                      </div>
                      <input type="hidden" name="crud" id="crud" value="insertar">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="btnagregar" name="btnagregar" onclick="insTracto()" value="agregar" class="btn btn-primary ">Crear</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /modal nuevo usuario -->
    <script>
      function BuscarTracto() {
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
          url: 'catalogos/tracto_query.php', //archivo que recibe la peticion
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
        
        $('#inputTracto').val(d[0]);
        $('#inputPlacas').val(d[1]);
        $('#inputMarca').val(d[2]);
        $('#inputModelo').val(d[3]);
        $('#inputColor').val(d[4]);
        $('#inputCilindros').val(d[5]);
        $('#inputTransmision').val(d[6]);
        $('#inputMotor').val(d[7]);
        $('#inputSerMotor').val(d[8]);
        $('#inputEstatus').val(d[9]);
        $('#inputKilom').val(d[10]);
        $('#inputIdtrac').val(d[11]);




    }

    function agregaformpass(datosspss) {
        d = datosspss.split('||');


        $('#inputidppass').val(d[0]);



    }
    function insTracto() { 

      var datos = $('#instract').serialize();
      $.ajax({
        type: "POST",
        url: "catalogos/crud_tracto.php",
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


    function acttract() {

      var datos = $('#actracto').serialize();
      $.ajax({
        type: "POST",
        url: "catalogos/crud_tracto.php",
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