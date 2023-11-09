<?php
include("header.php"); 

$usuario = $_SESSION['nombre'];
$uuid_usr = $_SESSION['id'];

$idserv = $_GET['idc'];

$id_pend = "SELECT  co.*, CONCAT(op.nombre, ' ', op.apellidos) as nombreop,op.id_operador, 
cl.nombre as empresan, cl.id_cliente,
ce.estatus as estat,ce.id_estatus ,ctc.tipo_cuenta,ctc.id_tipcuenta, ctm.tipo_movimiento,ctm.id_tipmovimiento,tr.tracto,tr.id_tracto 
from cobranza co 
left join operador op on op.id_operador = co.operador
     left join clientes cl on cl.id_cliente = co.empresa
     left join cat_estatus  ce on ce.id_estatus = co.estatus
     left join cat_tipo_cuenta  ctc on ctc.id_tipcuenta = co.ingreso_a_cuenta
     left join cat_tipo_movimiento  ctm on ctm.id_tipmovimiento = co.tipo_movimiento
     left join tracto  tr on tr.id_tracto = co.tracto
where servicio = $idserv ";
$resdiscarpend = mysqli_query($conexion, $id_pend);
$id_varidocpend = mysqli_fetch_assoc($resdiscarpend);
$id = $id_varidocpend['id'];
$no = $id_varidocpend['no'];
$semana = $id_varidocpend['semana'];
$fecha = $id_varidocpend['fecha'];
$servicio = $id_varidocpend['servicio'];
$tracto = $id_varidocpend['tracto'];
$id_tracto = $id_varidocpend['id_tracto'];
$id_operador = $id_varidocpend['id_operador'];
$operador = $id_varidocpend['nombreop'];
$mercancia = $id_varidocpend['mercancia'];
$origen = $id_varidocpend['origen'];
$destino = $id_varidocpend['destino'];
$id_cliente = $id_varidocpend['id_cliente'];
$empresa = $id_varidocpend['empresan'];
$contacto = $id_varidocpend['contacto'];
$folio_factura = $id_varidocpend['folio_factura'];
$fecha_factura = $id_varidocpend['fecha_factura'];
$fecha_cartaporte = $id_varidocpend['fecha_cartaporte'];
$carta_porte = $id_varidocpend['carta_porte'];
$subtotal_carta_porte = $id_varidocpend['subtotal_carta_porte'];
$casetas = $id_varidocpend['casetas'];
$maniobra = $id_varidocpend['maniobra'];
$estadia = $id_varidocpend['estadia'];
$reparto = $id_varidocpend['reparto'];
$flete = $id_varidocpend['flete'];
$total_flete = $id_varidocpend['total_flete'];
$monto_anticipo = $id_varidocpend['monto_anticipo'];
$fecha_anticipo = $id_varidocpend['fecha_anticipo'];
$diferencia_cobrar = $id_varidocpend['diferencia_cobrar'];
$fecha_entrega_doc = $id_varidocpend['fecha_entrega_doc'];
$dias_credito = $id_varidocpend['dias_credito'];
$fecha_vencimiento_finiquito = $id_varidocpend['fecha_vencimiento_finiquito'];
$semana_finiquito_viaje = $id_varidocpend['semana_finiquito_viaje'];
$fecha_finiquito_viaje = $id_varidocpend['fecha_finiquito_viaje'];
$fecha_finiquito_casetas = $id_varidocpend['fecha_finiquito_casetas'];
$pago_total = $id_varidocpend['pago_total'];
$ingreso_a_cuenta = $id_varidocpend['tipo_cuenta'];
$id_tipcuenta = $id_varidocpend['id_tipcuenta'];
$tranferencia_a_cta = $id_varidocpend['tranferencia_a_cta'];
$id_tipmovimiento = $id_varidocpend['id_tipmovimiento'];
$tipo_moviemiento = $id_varidocpend['tipo_movimiento'];
$estatus = $id_varidocpend['estat'];
$id_estatus = $id_varidocpend['id_estatus'];
$observaciones = $id_varidocpend['observaciones'];
$documentos = $id_varidocpend['documentos'];




if ($estatus === "CANCELADO") {
  $colorbutton = "btn btn-danger";
} elseif ($estatus === "FINANCIADO") {
  $colorbutton = "btn btn-primary";
} elseif ($estatus === "PAGADO") {
  $colorbutton = "btn btn-success";
} else {
  $colorbutton = "btn btn-warning";
}
?>

<link rel="stylesheet" href="../../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../../js/jquery.js"></script>
<script src="../../js/jquery-ui.js"></script>

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
  <div class="container-sm">
    <div class="progress" style="height: 30px;">
      <div class="progress-bar bg-info" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <button type="button" class="<?php echo $colorbutton; ?>" data-bs-toggle="modal" data-bs-target="#clasific" onclick="agregaform('<?php echo $datosdoc ?>')"><?php echo "Servicio: " . $idserv . "   " . $estatus ?></button><br>


      </div>
    </div>


  </div><br>

  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Detalles</button>
      </li>
      
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <!--https://es.stackoverflow.com/questions/353078/espacio-entre-los-elementos-bootstrap -->
        <style>
          .table-wrapper {
            width: 100%;
            height: 200px;
            /* Altura de ejemplo */
            overflow: auto;
          }

          .table-wrapper table {
            border-collapse: separate;
            border-spacing: 0;
          }

          .table-wrapper table thead {
            position: -webkit-sticky;
            /* Safari... */
            position: sticky;
            top: 0;
            left: 0;
          }

          .table-wrapper table thead th,
          .table-wrapper table tbody td {
            border: 1px solid #000;
            background-color: #FFF;
          }
        </style>


        <table class="table table-hover table-condensed table-wrapper">
          <tr>
            <td scope="col"><b><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enlazarModal">
                  Enlazar
                </button> </b></td>
            <td scope="col"><b></b></td>
            <td scope="col"><b>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cobranzaEditModal">
                  Editar
                </button> </b> </td>
          </tr>

          <tr>
            <td scope="col"><b>Semana: </b><?php echo $id_varidocpend['semana']; ?> </td>
            <td scope="col"><b>Fecha: </b><?php echo $id_varidocpend['fecha']; ?> </td>
            <td scope="col"><b>Servicio: </b><?php echo $id_varidocpend['servicio']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Estatus: </b><?php echo $id_varidocpend['estat']; ?> </td>
            <td scope="col"><b>Tracto: </b><?php echo $id_varidocpend['tracto']; ?> </td>
            <td scope="col"><b>Operador: </b><?php echo $id_varidocpend['nombreop']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Mercancia: </b><?php echo $id_varidocpend['mercancia']; ?> </td>
            <td scope="col"><b>Origen: </b><?php echo $id_varidocpend['origen']; ?> </td>
            <td scope="col"><b>Destino: </b><?php echo $id_varidocpend['destino']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Empresa: </b><?php echo $id_varidocpend['empresan']; ?> </td>
            <td scope="col"><b>Folio factura: </b><?php echo $id_varidocpend['folio_factura']; ?> </td>
            <td scope="col"><b>Fecha factura: </b><?php echo $id_varidocpend['fecha_factura']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Fecha cartaporte: </b><?php echo $id_varidocpend['fecha_cartaporte']; ?> </td>
            <td scope="col"><b>Carta porte: </b><?php echo $id_varidocpend['carta_porte']; ?> </td>
            <td scope="col"><b>Subtotal carta porte: </b><?php echo $id_varidocpend['subtotal_carta_porte']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Casetas: </b><?php echo $id_varidocpend['casetas']; ?> </td>
            <td scope="col"><b>Maniobra: </b><?php echo $id_varidocpend['maniobra']; ?> </td>
            <td scope="col"><b>Estadia: </b><?php echo $id_varidocpend['estadia']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Reparto: </b><?php echo $id_varidocpend['reparto']; ?> </td>
            <td scope="col"><b>Flete: </b><?php echo $id_varidocpend['flete']; ?> </td>
            <td scope="col"><b>Total flete: </b><?php echo $id_varidocpend['total_flete']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Monto anticipo: </b><?php echo $id_varidocpend['monto_anticipo']; ?> </td>
            <td scope="col"><b>Fecha anticipo: </b><?php echo $id_varidocpend['fecha_anticipo']; ?> </td>
            <td scope="col"><b>Diferencia por cobrar: </b><?php echo $id_varidocpend['diferencia_cobrar']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Fecha entrega doc: </b><?php echo $id_varidocpend['fecha_entrega_doc']; ?> </td>
            <td scope="col"><b>Dias credito: </b><?php echo $id_varidocpend['dias_credito']; ?> </td>
            <td scope="col"><b>Fecha vencimiento finiquito: </b><?php echo $id_varidocpend['fecha_vencimiento_finiquito']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Semana finiquito viaje: </b><?php echo $id_varidocpend['semana_finiquito_viaje']; ?> </td>
            <td scope="col"><b>fecha finiquito viaje: </b><?php echo $id_varidocpend['fecha_finiquito_viaje']; ?> </td>
            <td scope="col"><b>Fecha finiquito casetas: </b><?php echo $id_varidocpend['fecha_finiquito_casetas']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Pago total: </b><?php echo $id_varidocpend['pago_total']; ?> </td>
            <td scope="col"><b>ingreso a cuenta: </b><?php echo $id_varidocpend['tipo_cuenta']; ?> </td>
            <td scope="col"><b>Tranferencia a cta: </b><?php echo $id_varidocpend['tranferencia_a_cta']; ?> </td>
          </tr>
          <tr>
            <td scope="col"><b>Tipo moviemiento: </b><?php echo $id_varidocpend['tipo_movimiento']; ?> </td>

            <td scope="col" colspan="2"><b>Observaciones: </b><?php echo $id_varidocpend['observaciones']; ?> </td>
          </tr>




        </table>

      </div> <!-- termina el detalle -->

    </div>



  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="docModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cargar documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <form action="cobranza/crud_cobranza.php" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
              <div class="col-md-12">
                <label for="formFile" class="form-label"></label>
                <input class="form-control" type="file" name="file">
                <input type="hidden" name="idser" value="<?php echo $servicio; ?>">
                <input type="hidden" name="crud" id="crud" value="documento">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label for="inputTipodoc" class="form-label">Tipo documento</label>
                <select name="inputTipodoc" id="inputTipodoc" class="form-control">
                  <option value="0">Seleccione</option>
                  <?PHP
                  $registro = mysqli_query($conexion, "SELECT * from cat_tipo_documento ORDER BY tipo_documento ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                    <option value='<?php echo $regone['tipo_documento']; ?>'> <?php echo $regone['tipo_documento']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <input class="btn btn-primary" type="submit" value="Cargar Archivos">
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- FIn Modal -->


<!-- Modal -->
<div class="modal fade" id="enlazarModal" tabindex="-1" aria-labelledby="enlazarModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enlazar viaje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <form id="enlaz">
            <div class="row mb-3">
              <div class="col-md-12">

                <input type="hidden" name="idser" value="<?php echo $servicio; ?>">
                <input type="hidden" name="crud" id="crud" value="enlazar">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label for="inputEnlaze" class="form-label">Numero de servicio a enlazar</label>
                <select name="inputEnlaze" id="inputEnlaze" class="form-control">
                  <option value="0">Sin enlace</option>
                  <?PHP
                  $registro = mysqli_query($conexion, "SELECT * from cobranza ORDER BY servicio ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                    <option value='<?php echo $regone['servicio']; ?>'> <?php echo $regone['servicio']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
              <button type="button" id="btnenlaz" onclick="enlazar();" class="btn btn-primary">Enlazar</button>
                
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- FIn Modal -->

<!-- Modal -->
<div class="modal fade" id="cobranzaEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cobranzaEditModal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="formcobedit">
          <div class="row mb-3">

            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
            <div class="col-2">
              <label for="inputAServicio" class="form-label">Servicio</label>
              <input type="text" class="form-control" id="inputAServicio" name="inputAServicio" value="<?php echo $servicio; ?>">
            </div>
            <div class="col-md-1">
              <label for="inputSemana" class="form-label">Semana</label>
              <input type="text" class="form-control" id="inputSemana" name="inputSemana" value="<?php echo $semana; ?>">
            </div>
            <div class="col-2">
              <label for="inputFecha" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="inputFecha" name="inputFecha" value="<?php echo $fecha; ?>">
            </div>

            <div class="col-md-2">
              <label for="inputTracto" class="form-label">Tracto</label>
              <select name="inputTracto" id="inputTracto" class="form-control">
                <option value="<?php echo $id_tracto; ?>"><?php echo $tracto; ?></option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT * from tracto ORDER BY tracto ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['id_tracto']; ?>'> <?php echo $regone['tracto']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="inputOperador" class="form-label">Operador</label>

              <select name="inputOperador" id="inputOperador" class="form-control">
                <option value="<?php echo $id_operador; ?>"><?php echo $operador; ?></option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT id_operador,concat (nombre, ' ' , apellidos) as nombre from operador ORDER BY nombre ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['id_operador']; ?>'> <?php echo $regone['nombre']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-2">
              <label for="inputMercancia" class="form-label">Mercancia</label>
              <input type="text" class="form-control" id="inputMercancia" name="inputMercancia" value="<?php echo $mercancia; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2">
              <label for="inputOrigen" class="form-label">Origen</label>
              <input type="text" class="form-control" id="inputOrigen" name="inputOrigen" value="<?php echo $origen; ?>">
            </div>


            <div class="col-3">
              <label for="inputDestino" class="form-label">Destino</label>
              <input type="text" class="form-control" id="inputDestino" name="inputDestino" value="<?php echo $destino; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputEmpresa" class="form-label">Empresa</label>

              <select name="inputEmpresa" id="inputEmpresa" class="form-control">
                <option value="<?php echo $id_cliente; ?>"><?php echo $empresa; ?></option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT * from clientes ORDER BY nombre ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['id_cliente']; ?>'> <?php echo $regone['nombre']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-3">
              <label for="inputContacto" class="form-label">Contacto</label>
              <input type="text" class="form-control" id="inputContacto" name="inputContacto" value="<?php echo $contacto; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputTipMovimiento" class="form-label">Estatus</label>
              <select name="inputEstatus" id="inputEstatus" class="form-control">
                <option value="<?php echo $id_estatus; ?>"><?php echo $estatus; ?></option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT * from cat_estatus ORDER BY id_estatus ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['id_estatus']; ?>'> <?php echo $regone['estatus']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2">
              <label for="inputFolFactura" class="form-label">Folio factura</label>
              <input type="text" class="form-control" id="inputFolFactura" name="inputFolFactura" value="<?php echo $folio_factura; ?>">
            </div>

            <div class="col-md-2">
              <label for="inputFechFactura" class="form-label">Fecha factura</label>
              <input type="date" class="form-control" id="inputFechFactura" name="inputFechFactura" value="<?php echo $fecha_factura; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputFechCartPorte" class="form-label">Fecha cartaporte</label>
              <input type="date" class="form-control" id="inputFechCartPorte" name="inputFechCartPorte" nvalue="<?php echo $fecha_cartaporte; ?>">
            </div>

            <div class="col-md-2">
              <label for="inputNoCartaporte" class="form-label">#Cartaporte</label>
              <input type="text" class="form-control" id="inputNoCartaporte" name="inputNoCartaporte" value="<?php echo $carta_porte; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputSubCartaporte" class="form-label">Subtotal Cartaporte</label>
              <input type="text" class="form-control" id="inputSubCartaporte" name="inputSubCartaporte" value="<?php echo $subtotal_carta_porte; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputManiobra" class="form-label">Maniobra</label>
              <input type="text" class="form-control" id="inputManiobra" name="inputManiobra" value="<?php echo $maniobra; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2">
              <label for="inputEstadia" class="form-label">Estadia</label>
              <input type="text" class="form-control" id="inputEstadia" name="inputEstadia" value="<?php echo $estadia; ?>">
            </div>

            <div class="col-md-1">
              <label for="inputReparto" class="form-label">Reparto</label>
              <input type="text" class="form-control" id="inputReparto" name="inputReparto" value="<?php echo $reparto; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputCasetas" class="form-label">Casetas</label>
              <input type="text" class="form-control" id="inputCasetas" name="inputCasetas" value="<?php echo $casetas; ?>">
            </div>
            <div class="col-md-1">
              <label for="inputFlete" class="form-label">Flete</label>
              <input type="text" class="form-control" id="inputFlete" name="inputFlete" value="<?php echo $flete; ?>">
            </div>

            <div class="col-md-2">
              <label for="inputTotFlete" class="form-label">Total flete</label>
              <input type="text" class="form-control" id="inputTotFlete" name="inputTotFlete" value="<?php echo $total_flete; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputMonAnticipo" class="form-label">Monto anticipo</label>
              <input type="text" class="form-control" id="inputMonAnticipo" name="inputMonAnticipo" value="<?php echo $monto_anticipo; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputFechAnticipo" class="form-label">Fecha anticipo</label>
              <input type="date" class="form-control" id="inputFechAnticipo" name="inputFechAnticipo" value="<?php echo $fecha_anticipo; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2">
              <label for="inputDifCobrar" class="form-label">Dif por cobrar</label>
              <input type="text" class="form-control" id="inputDifCobrar" name="inputDifCobrar" value="<?php echo $diferencia_cobrar; ?>">
            </div>


            <div class="col-md-2">
              <label for="inputFechEntDoc" class="form-label">Fecha entrega doc</label>
              <input type="date" class="form-control" id="inputFechEntDoc" name="inputFechEntDoc" value="<?php echo $fecha_entrega_doc; ?>">
            </div>

            <div class="col-md-2">
              <label for="inputDiasCredito" class="form-label">Dias de credito</label>
              <input type="text" class="form-control" id="inputDiasCredito" name="inputDiasCredito" value="<?php echo $dias_credito; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputFechVenFiniquito" class="form-label">Vencimiento finiquito</label>
              <input type="date" class="form-control" id="inputFechVenFiniquito" name="inputFechVenFiniquito" value="<?php echo $fecha_vencimiento_finiquito; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputSemFinViaje" class="form-label">Sem finiquito viaje</label>
              <input type="text" class="form-control" id="inputSemFinViaje" name="inputSemFinViaje" value="<?php echo $semana_finiquito_viaje; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputFechFinViaje" class="form-label">Fecha finiquito viaje</label>
              <input type="date" class="form-control" id="inputFechFinViaje" name="inputFechFinViaje" value="<?php echo $fecha_finiquito_viaje; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2">
              <label for="inputFechFinCasetas" class="form-label">Fecha finiquito casetas</label>
              <input type="date" class="form-control" id="inputFechFinCasetas" name="inputFechFinCasetas" value="<?php echo $fecha_finiquito_casetas; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputPagoTotal" class="form-label">Pago total</label>
              <input type="text" class="form-control" id="inputPagoTotal" name="inputPagoTotal" value="<?php echo $pago_total; ?>">
            </div>
            <div class="col-md-2">
              <label for="inputIngCuenta" class="form-label">Ingreso a cuenta</label> 
              <select name="inputIngCuenta" id="inputIngCuenta" class="form-control">
              <option value="<?php echo $id_tipcuenta; ?>"><?php echo $ingreso_a_cuenta; ?></option>
                  <?PHP 
                  $registro = mysqli_query($conexion, "SELECT * from cat_tipo_cuenta ORDER BY tipo_cuenta ASC;");
                  while ($regone = mysqli_fetch_array($registro)) { ?>
                <option value='<?php echo $regone['id_tipcuenta']; ?>'> <?php echo $regone['tipo_cuenta']; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
              <label for="inputTransCuenta" class="form-label">Transferencia a cuenta</label>
              <input type="text" class="form-control" id="inputTransCuenta" name="inputTransCuenta" value="<?php echo $tranferencia_a_cta; ?>">
            </div>
            <div class="col-md-3">
              <label for="inputTipMovimiento" class="form-label">Tipo de movimiento</label>
              <select name="inputTipMovimiento" id="inputTipMovimiento" class="form-control">
              <option value="<?php echo $id_tipmovimiento; ?>"><?php echo $tipo_moviemiento; ?></option>
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
            <textarea type="text" class="form-control" id="inputObservaciones" name="inputObservaciones"><?php echo $observaciones; ?></textarea>
          </div>
          <input type="hidden" name="crud" id="crud" value="editar">


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnguardargest" onclick="ediCobranza();" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIn Modal -->



<!-- Modal -->
<div class="modal fade" id="depModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="depModal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar deposito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="frmdepositos">


          <div class="row mb-3">

            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $servicio; ?>">

            <div class="col-md-3">
              <label for="inputSolicita" class="form-label">Solicita</label>
              <input type="text" class="form-control" id="inputSolicita" name="inputSolicita">
            </div>
            <div class="col-md-3">
              <label for="inputDesc" class="form-label">Descripcion</label>
              <input type="text" class="form-control" id="inputDesc" name="inputDesc">
            </div>
            <div class="col-md-3">
              <label for="inputConcepto" class="form-label">Concepto</label>
              <select name="inputConcepto" id="inputConcepto" class="form-control" onchange="myFunction();">
                <option value="0">Seleccione</option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT * from cat_depositos ORDER BY concepto ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['concepto']; ?>'> <?php echo $regone['concepto']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="inputTipGasto" class="form-label">Tipo de gasto</label>
              <input type="text" class="form-control" id="inputTipGasto" name="inputTipGasto">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-3">
              <label for="inputCuenta" class="form-label">Cuenta</label>
              <select name="inputCuenta" id="inputCuenta" class="form-control">
                <option value="0">Seleccione</option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT * from cat_tipo_cuenta ORDER BY tipo_cuenta ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['tipo_cuenta']; ?>'> <?php echo $regone['tipo_cuenta']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="inputAutorizado" class="form-label">Autorizado</label>
              <input type="text" class="form-control" id="inputAutorizado" name="inputAutorizado">
            </div>
            <div class="col-md-3">
              <label for="inputImpGasto" class="form-label">Importe de gasto</label>
              <input type="text" class="form-control" id="inputImpGasto" name="inputImpGasto">
            </div>
            <div class="col-md-3">
              <label for="inputDepReal" class="form-label">Deposito realizado</label>
              <input type="text" class="form-control" id="inputDepReal" name="inputDepReal">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-3">
              <label for="inputFactura" class="form-label">Factura</label>
              <input type="text" class="form-control" id="inputFactura" name="inputFactura">
            </div>
            <div class="col-md-3">
              <label for="inputTipMov" class="form-label">Tipo de movimiento</label>
              <select name="inputTipMov" id="inputTipMov" class="form-control">
                <option value="0">Seleccione</option>
                <?PHP
                $registro = mysqli_query($conexion, "SELECT * from cat_tipo_movimiento ORDER BY tipo_movimiento ASC;");
                while ($regone = mysqli_fetch_array($registro)) { ?>
                  <option value='<?php echo $regone['tipo_movimiento']; ?>'> <?php echo $regone['tipo_movimiento']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="inputEstatus" class="form-label">Estatus</label>
              <input type="text" class="form-control" id="inputEstatus" name="inputEstatus">
            </div>
            <div class="col-md-3">
              <label for="inputFecha" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="inputFecha" name="inputFecha">
            </div>
          </div>

          <div id="comb">
            <h3>Combustible</h3>
            <div class="row mb-3">

              <div class="col-md-3">
                <label for="inputTicket" class="form-label">#Ticket</label>
                <input type="text" class="form-control" id="inputTicket" name="inputTicket">
              </div>
              <div class="col-md-3">
                <label for="inputTipComb" class="form-label">Tipo de combustible</label>
                <input type="text" class="form-control" id="inputTipComb" name="inputTipComb">
              </div>
              <div class="col-md-3">
                <label for="inputLitrosSum" class="form-label">Li     
                  tros Suministrados</label>
                <input type="text" class="form-control" id="inputLitrosSum" name="inputLitrosSum">
              </div>
              <div class="col-md-3">
                <label for="inputPrecioComb" class="form-label">Precio de combustible</label>
                <input type="text" class="form-control" id="inputPrecioComb" name="inputPrecioComb">
              </div>
              <div class="col-md-3">
                <label for="inputImpCarga" class="form-label">Importe carga</label>
                <input type="text" class="form-control" id="inputImpCarga" name="inputImpCarga">
              </div>
              <div class="col-md-3">
                <label for="inputFechaPago" class="form-label">Fecha de pago</label>
                <input type="date" class="form-control" id="inputFechaPago" name="inputFechaPago">
              </div>
              <div class="col-md-3">
                <label for="inputNufactura" class="form-label">#Factura</label>
                <input type="text" class="form-control" id="inputNufactura" name="inputNufactura">
              </div>
              <div class="col-md-3">
                <label for="inputFechaFac" class="form-label">Fecha factura</label>
                <input type="date" class="form-control" id="inputFechaFac" name="inputFechaFac">
              </div>
            </div>
          </div>
          <input type="hidden" name="crud" id="crud" value="insertar">


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnguardargest" onclick="ondepositos();" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIn Modal -->


<script>
  function ediCobranza() {

    var datos = $('#formcobedit').serialize();
    $.ajax({
      type: "POST",
      url: "cobranza/crud_cobranza.php",
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

  function enlazar() {

    var datos = $('#enlaz').serialize();
    $.ajax({
      type: "POST",
      url: "cobranza/crud_cobranza.php",
      data: datos,
      beforeSend: function() {

      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

        alert(response);
        if (response === "Enlazado") {
          location.reload();
        } else {}
      }
    });

  };
  

  function ondepositos() {

    var datos = $('#frmdepositos').serialize();
    $.ajax({
      type: "POST",
      url: "depositos/crud_depositos.php",
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

  const myFunction = () => {
    let inputValue = document.getElementById("inputConcepto").value;
    let div = document.querySelector('#comb');
    //alert(inputValue);
    if (inputValue === 'COMBUSTIBLE') {
      // document.getElementById("valueInput").innerHTML = inputValue; 

      div.style.visibility = 'visible';

    } else {
      div.style.visibility = 'hidden';
    }
  }
</script>

<?php require ('footer.php');?>