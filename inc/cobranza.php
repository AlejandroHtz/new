<?php
require('perfilloader.php');
include("header.php"); 
  
// include("querys/querys_general.php");
$usuario = $_SESSION['nombre'];
$iduser = $_SESSION['id'];
 
echo  $semana; 

?>

<link rel="stylesheet" href="../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>

<body onload="BuscarCobranza();"></body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>Cobranza</strong></h1>
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
            <input class="form-control" type="text" name="buscar" id="buscar" onkeyup="BuscarCobranza()">
          </div>
          <div class="form-group col-sm-2">
            <?PHP if ($_SESSION['add_cobranza'] == "1") { ?>
              <button type="button" class="form-control btn btn-primary" data-bs-toggle="modal" data-bs-target="#cobranzaModal" onclick="ultimo();">Agregar</button>
            <?php } ?>
          </div>
        </div>

      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="cobranzaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cobranzaModal" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Agregar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" id="formcob">
              <div class="row mb-3">

                <div class="col-2">
                  <label for="inputAServicio" class="form-label">Servicio</label>
                  <input type="text" class="form-control" id="inputAServicio" name="inputAServicio">
                </div> 
                <div class="col-md-1">
                  <label for="inputSemana" class="form-label">Semana</label>
                  <input type="text" class="form-control" id="inputSemana" name="inputSemana" value="<?php echo  $semana;  ?>">
                </div>
                <div class="col-2">
                  <label for="inputFecha" class="form-label">Fecha</label>
                  <input type="date" class="form-control" id="inputFecha" name="inputFecha">
                </div>

                <div class="col-md-2">
                  <label for="inputTracto" class="form-label">Tracto</label>
                                 
                <select name="inputTracto" id="inputTracto" class="form-control">
                  <option value="0">Seleccione</option>
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from tracto ORDER BY tracto ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_tracto']; ?>'> <?php echo $regone['tracto']; ?></option>
                <?php } ?>
                </select>
                </div> 

                <div class="col-md-3">
                  <label for="inputMercancia" class="form-label">Mercancia</label>
                  <input type="text" class="form-control" id="inputMercancia" name="inputMercancia">
                </div>
                <div class="col-md-2">
                  <label for="inputTipMovimiento" class="form-label">Estatus</label>
                  <select name="inputEstatus" id="inputEstatus" class="form-control">
                  
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from cat_estatus ORDER BY estatus ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_estatus']; ?>'> <?php echo $regone['estatus']; ?></option>
                <?php } ?>
                </select>
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-2">
                  <label for="inputOrigen" class="form-label">Origen</label>
                  <input type="text" class="form-control" id="inputOrigen" name="inputOrigen">
                </div>
                <div class="col-md-3">
                  <label for="inputOperador" class="form-label">Operador</label>

                  <select name="inputOperador" id="inputOperador" class="form-control">
                  <option value="0">Seleccione</option>
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from operador ORDER BY nombre ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_operador']; ?>'> <?php echo $regone['nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
                <div class="col-3">
                  <label for="inputDestino" class="form-label">Destino</label>
                  <input type="text" class="form-control" id="inputDestino" name="inputDestino">
                </div>
                <div class="col-md-2">
                  <label for="inputEmpresa" class="form-label">Empresa</label>
                  <select name="inputEmpresa" id="inputEmpresa" class="form-control">
                  <option value="0">Seleccione</option>
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from clientes ORDER BY nombre ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_cliente']; ?>'> <?php echo $regone['nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
                <div class="col-2">
                  <label for="inputContacto" class="form-label">Contacto</label>
                  <input type="text" class="form-control" id="inputContacto" name="inputContacto">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-2">
                  <label for="inputFolFactura" class="form-label">Folio factura</label>
                  <input type="text" class="form-control" id="inputFolFactura" name="inputFolFactura">
                </div>

                <div class="col-md-2">
                  <label for="inputFechFactura" class="form-label">Fecha factura</label>
                  <input type="date" class="form-control" id="inputFechFactura" name="inputFechFactura">
                </div>
                <div class="col-md-2">
                  <label for="inputFechCartPorte" class="form-label">Fecha cartaporte</label>
                  <input type="date" class="form-control" id="inputFechCartPorte" name="inputFechCartPorte">
                </div>

                <div class="col-md-2">
                  <label for="inputNoCartaporte" class="form-label">#Cartaporte</label>
                  <input type="text" class="form-control" id="inputNoCartaporte" name="inputNoCartaporte">
                </div>
                <div class="col-md-2">
                  <label for="inputSubCartaporte" class="form-label">Subtotal Cartaporte</label>
                  <input type="text" class="form-control" id="inputSubCartaporte" name="inputSubCartaporte">
                </div>
                <div class="col-md-2">
                  <label for="inputManiobra" class="form-label">Maniobra</label>
                  <input type="text" class="form-control" id="inputManiobra" name="inputManiobra">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-2">
                  <label for="inputEstadia" class="form-label">Estadia</label>
                  <input type="text" class="form-control" id="inputEstadia" name="inputEstadia">
                </div>

                <div class="col-md-1">
                  <label for="inputReparto" class="form-label">Reparto</label>
                  <input type="text" class="form-control" id="inputReparto" name="inputReparto">
                </div>
                <div class="col-md-2">
                  <label for="inputCasetas" class="form-label">Casetas</label>
                  <input type="text" class="form-control" id="inputCasetas" name="inputCasetas">
                </div>
                <div class="col-md-1">
                  <label for="inputFlete" class="form-label">Flete</label>
                  <input type="text" class="form-control" id="inputFlete" name="inputFlete">
                </div>

                <div class="col-md-2">
                  <label for="inputTotFlete" class="form-label">Total flete</label>
                  <input type="text" class="form-control" id="inputTotFlete" name="inputTotFlete">
                </div>
                <div class="col-md-2">
                  <label for="inputMonAnticipo" class="form-label">Monto anticipo</label>
                  <input type="text" class="form-control" id="inputMonAnticipo" name="inputMonAnticipo">
                </div>
                <div class="col-md-2">
                  <label for="inputFechAnticipo" class="form-label">Fecha anticipo</label>
                  <input type="date" class="form-control" id="inputFechAnticipo" name="inputFechAnticipo">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-2">
                  <label for="inputDifCobrar" class="form-label">Dif por cobrar</label>
                  <input type="text" class="form-control" id="inputDifCobrar" name="inputDifCobrar">
                </div>


                <div class="col-md-2">
                  <label for="inputFechEntDoc" class="form-label">Fecha entrega doc</label>
                  <input type="date" class="form-control" id="inputFechEntDoc" name="inputFechEntDoc">
                </div>

                <div class="col-md-2">
                  <label for="inputDiasCredito" class="form-label">Dias de credito</label>
                  <input type="text" class="form-control" id="inputDiasCredito" name="inputDiasCredito">
                </div>
                <div class="col-md-2">
                  <label for="inputFechVenFiniquito" class="form-label">Vencimiento finiquito</label>
                  <input type="date" class="form-control" id="inputFechVenFiniquito" name="inputFechVenFiniquito">
                </div>
                <div class="col-md-2">
                  <label for="inputSemFinViaje" class="form-label">Sem finiquito viaje</label>
                  <input type="text" class="form-control" id="inputSemFinViaje" name="inputSemFinViaje">
                </div>
                <div class="col-md-2">
                  <label for="inputFechFinViaje" class="form-label">Fecha finiquito viaje</label>
                  <input type="date" class="form-control" id="inputFechFinViaje" name="inputFechFinViaje">
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-md-2">
                  <label for="inputFechFinCasetas" class="form-label">Fecha fini casetas</label>
                  <input type="date" class="form-control" id="inputFechFinCasetas" name="inputFechFinCasetas">
                </div>
                <div class="col-md-2">
                  <label for="inputPagoTotal" class="form-label">Pago total</label>
                  <input type="text" class="form-control" id="inputPagoTotal" name="inputPagoTotal">
                </div>
                <div class="col-md-3"> 
                  <label for="inputIngTotal" class="form-label">Ingreso a cuenta</label>
                  <select name="inputIngCuenta" id="inputIngCuenta" class="form-control">
                  <option value="0">Seleccione</option>
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from cat_tipo_cuenta ORDER BY tipo_cuenta ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_tipcuenta']; ?>'> <?php echo $regone['tipo_cuenta']; ?></option>
                <?php } ?>
                </select>
                </div>
                <div class="col-md-3">
                  <label for="inputTransCuenta" class="form-label">Transferencia cuenta</label>
                  <input type="text" class="form-control" id="inputTransCuenta" name="inputTransCuenta">
                </div>
                <div class="col-md-2">
                  <label for="inputTipMovimiento" class="form-label">Tipo movimiento</label>
                  <select name="inputTipMovimiento" id="inputTipMovimiento" class="form-control">
                  <option value="0">Seleccione</option>
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from cat_tipo_movimiento ORDER BY id_tipmovimiento ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_tipmovimiento']; ?>'> <?php echo $regone['tipo_movimiento']; ?></option>
                <?php } ?>
                </select>
                </div> 

                
              </div>

              <div class="col-md-12">
                <label for="inputTipMovimiento" class="form-label">Observaciones</label>
                <textarea type="text" class="form-control" id="inputObservaciones" name="inputObservaciones"></textarea>
              </div>
              <input type="hidden" name="crud" id="crud" value="insertar">


            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" id="btnguardargest" onclick="insCobranza();" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- FIn Modal -->

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


    <script>
      function BuscarCobranza() {
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
          url: 'cobranza/cobranza_query.php', //archivo que recibe la peticion
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

      function insCobranza() {

        var datos = $('#formcob').serialize();
        $.ajax({
          type: "POST",
          url: "cobranza/crud_cobranza.php",
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

      
function ultimo(){
    var uuid= "ultimo";
    $.ajax({
        data: {
                  
                    'uuid': uuid
                },
            
            url: 'cobranza/crud_cobranza.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
              
                $("#resultadocontrato").html("Procesando, espere por favor...");
            },
            success: function(responsedos) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              document.getElementById('inputAServicio').value= responsedos;
            }
        });
}

    </script>

  </section>



</div>


<?php require ('footer.php');?>