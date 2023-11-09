<?php
include("header.php"); 

require ('perfilloader.php');

$usuario = $_SESSION['nombre'];
$uuid_usr = $_SESSION['id'];

?>

<link rel="stylesheet" href="../../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../../js/jquery.js"></script>
<script src="../../js/jquery-ui.js"></script>

<body onload="Buscarcuenta();"></body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>Depositos</strong></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  
  <section class="content">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo">Agregar</button>
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
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form class="row g-3" id="actconc">
                <!--onSubmit="return validarPasswd()" -->
                <div class="col-md-12">
                        <label for="inputConcepto" class="form-label">Concepto</label>
                        <input type="text" class="form-control" id="inputConcepto" name="inputConcepto" required>
                        <input type="hidden" class="form-control" id="InputId" name="InputId" >

                        <!--<input type="hidden" class="form-control" id="inputuser" name="inputuser" value="<?php echo $_SESSION['nombre'];  ?>"> -->
                </div>
                    
                      <input type="hidden" name="crud" id="crud" value="actualizar">
                


                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnactualizar" onclick="actconc()" name="btnactualizar" value="actualizar" class="btn btn-primary ">Actualizar</button>

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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <form class="row g-3" id="insconc" >
                    <div class="col-md-6">
                        <label for="inputConcepto" class="form-label">Concepto</label>
                        <input type="text" class="form-control" id="inputConcepto" name="inputConcepto" required>
                    </div>
                      
                      <input type="hidden" name="crud" id="crud" value="insertar">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="btnagregar" name="btnagregar" onclick="insconc()" value="agregar" class="btn btn-primary ">Crear</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /modal nuevo usuario -->
    <script>
      function Buscarcuenta() {
        inpTodo = "";

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
          url: 'catalogos/depconceptos_query.php', //archivo que recibe la peticion
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
        
        $('#InputId').val(d[0]);
        $('#inputConcepto').val(d[1]);



    }

    function agregaformpass(datosspss) {
        d = datosspss.split('||');


        $('#inputidppass').val(d[0]);



    }
    function insconc() { 

      var datos = $('#insconc').serialize();
      $.ajax({
        type: "POST",
        url: "catalogos/crud_depconceptos.php", 
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


    function actconc() {

      var datos = $('#actconc').serialize();
      $.ajax({
        type: "POST",
        url: "catalogos/crud_depconceptos.php", 
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