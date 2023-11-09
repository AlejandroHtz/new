<?php
require ('../../conexion.php');
$usuario = $_SESSION['email'];
if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") {
        
        $inputAServicio = $_POST['inputAServicio'];
        $inputSemana = $_POST['inputSemana'];
        $inputFecha = $_POST['inputFecha'];
        $inputTracto = $_POST['inputTracto'];
        $inputMercancia = $_POST['inputMercancia'];
        $inputOrigen = $_POST['inputOrigen'];
        $inputOperador = $_POST['inputOperador'];
        $inputDestino = $_POST['inputDestino'];
        $inputEmpresa = $_POST['inputEmpresa'];
        $inputContacto = $_POST['inputContacto'];
        $inputFolFactura = $_POST['inputFolFactura'];
        $inputFechFactura = $_POST['inputFechFactura'];
        $inputFechCartPorte = $_POST['inputFechCartPorte'];
        $inputNoCartaporte = $_POST['inputNoCartaporte'];
        $inputSubCartaporte = $_POST['inputSubCartaporte'];
        $inputManiobra = $_POST['inputManiobra'];
        $inputEstadia = $_POST['inputEstadia'];
        $inputReparto = $_POST['inputReparto'];
        $inputCasetas = $_POST['inputCasetas'];
        $inputFlete = $_POST['inputFlete'];
        $inputTotFlete = $_POST['inputTotFlete'];
        $inputMonAnticipo = $_POST['inputMonAnticipo'];
        $inputFechAnticipo = $_POST['inputFechAnticipo'];
        $inputDifCobrar = $_POST['inputDifCobrar'];
        $inputFechEntDoc = $_POST['inputFechEntDoc'];
        $inputDiasCredito = $_POST['inputDiasCredito'];
        $inputFechVenFiniquito = $_POST['inputFechVenFiniquito'];
        $inputSemFinViaje = $_POST['inputSemFinViaje'];
        $inputFechFinViaje = $_POST['inputFechFinViaje'];
        $inputFechFinCasetas = $_POST['inputFechFinCasetas'];
        $inputPagoTotal = $_POST['inputPagoTotal'];
        $inputIngCuenta = $_POST['inputIngCuenta'];
        $inputTransCuenta = $_POST['inputTransCuenta'];
        $inputTipMovimiento = $_POST['inputTipMovimiento'];
        $inputEstatus = $_POST['inputEstatus'];
        $inputObservaciones = $_POST['inputObservaciones'];

        $queryobj = "INSERT INTO cobranza
        (
        semana,
        fecha,
        servicio,
        tracto,
        operador,
        mercancia,
        origen,
        destino,
        empresa,
        contacto,
        folio_factura,
        fecha_factura,
        fecha_cartaporte,
        carta_porte,
        subtotal_carta_porte,
        casetas,
        maniobra,
        estadia,
        reparto,
        flete,
        total_flete,
        monto_anticipo,
        fecha_anticipo,
        diferencia_cobrar,
        fecha_entrega_doc,
        dias_credito,
        fecha_vencimiento_finiquito,
        semana_finiquito_viaje,
        fecha_finiquito_viaje,
        fecha_finiquito_casetas,
        pago_total,
        ingreso_a_cuenta,
        tranferencia_a_cta,
        tipo_movimiento,
        estatus,
        observaciones,
        fecha_creacion,
        usuario_creacion,
        hora_creacion)

        values (
          
        '$inputSemana',
        '$inputFecha',
        '$inputAServicio',
        '$inputTracto',
        '$inputOperador',
        '$inputMercancia',
        '$inputOrigen',
        '$inputDestino',
        '$inputEmpresa',
        '$inputContacto',
        '$inputFolFactura',
        '$inputFechFactura',
        '$inputFechCartPorte',
        '$inputNoCartaporte',
        '$inputSubCartaporte',
        '$inputCasetas',
        '$inputManiobra',
        '$inputEstadia',
        '$inputReparto',
        '$inputFlete',
        '$inputTotFlete',
        '$inputMonAnticipo',
        '$inputFechAnticipo',
        '$inputDifCobrar',
        '$inputFechEntDoc',
        '$inputDiasCredito',
        '$inputFechVenFiniquito',
        '$inputSemFinViaje',
        '$inputFechFinViaje',
        '$inputFechFinCasetas',
        '$inputPagoTotal',
        '$inputIngCuenta',
        '$inputTransCuenta',
        '$inputTipMovimiento',
        '$inputEstatus',
        '$inputObservaciones',
        current_date,
        '$usuario',
        CURRENT_TIMESTAMP)";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
        } //termina si es insetr

    if ($_POST['crud'] === "editar") { // si es editar

        $id = $_POST['id'];
        
        $inputAServicio = $_POST['inputAServicio'];
        $inputSemana = $_POST['inputSemana'];
        $inputFecha = $_POST['inputFecha'];
        $inputTracto = $_POST['inputTracto'];
        $inputMercancia = $_POST['inputMercancia'];
        $inputOrigen = $_POST['inputOrigen'];
        $inputOperador = $_POST['inputOperador'];
        $inputDestino = $_POST['inputDestino'];
        $inputEmpresa = $_POST['inputEmpresa'];
        $inputContacto = $_POST['inputContacto'];
        $inputFolFactura = $_POST['inputFolFactura'];
        $inputFechFactura = $_POST['inputFechFactura'];
        $inputFechCartPorte = $_POST['inputFechCartPorte'];
        $inputNoCartaporte = $_POST['inputNoCartaporte'];
        $inputSubCartaporte = $_POST['inputSubCartaporte'];
        $inputManiobra = $_POST['inputManiobra'];
        $inputEstadia = $_POST['inputEstadia'];
        $inputReparto = $_POST['inputReparto'];
        $inputCasetas = $_POST['inputCasetas'];
        $inputFlete = $_POST['inputFlete'];
        $inputTotFlete = $_POST['inputTotFlete'];
        $inputMonAnticipo = $_POST['inputMonAnticipo'];
        $inputFechAnticipo = $_POST['inputFechAnticipo'];
        $inputDifCobrar = $_POST['inputDifCobrar'];
        $inputFechEntDoc = $_POST['inputFechEntDoc'];
        $inputDiasCredito = $_POST['inputDiasCredito'];
        $inputFechVenFiniquito = $_POST['inputFechVenFiniquito'];
        $inputSemFinViaje = $_POST['inputSemFinViaje'];
        $inputFechFinViaje = $_POST['inputFechFinViaje'];
        $inputFechFinCasetas = $_POST['inputFechFinCasetas'];
        $inputPagoTotal = $_POST['inputPagoTotal'];
        $inputIngCuenta = $_POST['inputIngCuenta'];
        $inputTransCuenta = $_POST['inputTransCuenta'];
        $inputTipMovimiento = $_POST['inputTipMovimiento'];
        $inputEstatus = $_POST['inputEstatus'];
        $inputObservaciones = $_POST['inputObservaciones'];


        $queryobj = "UPDATE cobranza SET
        
        semana='$inputSemana',
        fecha='$inputFecha',
        servicio='$inputAServicio',
        tracto='$inputTracto',
        operador='$inputOperador',
        mercancia='$inputMercancia',
        origen='$inputOrigen',
        destino='$inputDestino',
        empresa='$inputEmpresa',
        contacto='$inputContacto',
        folio_factura='$inputFolFactura',
        fecha_factura='$inputFechFactura',
        fecha_cartaporte='$inputFechCartPorte',
        carta_porte='$inputNoCartaporte',
        subtotal_carta_porte='$inputSubCartaporte',
        casetas='$inputCasetas',
        maniobra='$inputManiobra',
        estadia='$inputEstadia',
        reparto='$inputReparto',
        flete='$inputFlete',
        total_flete='$inputTotFlete',
        monto_anticipo='$inputMonAnticipo',
        fecha_anticipo='$inputFechAnticipo',
        diferencia_cobrar='$inputDifCobrar',
        fecha_entrega_doc='$inputFechEntDoc',
        dias_credito='$inputDiasCredito',
        fecha_vencimiento_finiquito='$inputFechVenFiniquito',
        semana_finiquito_viaje='$inputSemFinViaje',
        fecha_finiquito_viaje='$inputFechFinViaje',
        fecha_finiquito_casetas='$inputFechFinCasetas',
        pago_total='$inputPagoTotal',
        ingreso_a_cuenta='$inputIngCuenta',
        tranferencia_a_cta='$inputTransCuenta',
        tipo_movimiento='$inputTipMovimiento',
        estatus='$inputEstatus',
        observaciones='$inputObservaciones',
        fecha_modificacion = current_date,
        usuario_modificacion  = '$usuario',
        hora_modificacion = CURRENT_TIMESTAMP where id = '$id'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
        
    }// termina editar
    if ($_POST['crud'] === "documento") {
        $idser = $_POST['idser'];
        $inputTipodoc = $_POST['inputTipodoc'];
        if($inputTipodoc === '0' || empty($_FILES['file']['name']))
        {
        echo "<script> alert('Selecciona el tipo de documento o el archivo') ;window.location='../detalles_egresos.php?idc=$idser'</script>";
        }else{

        $micarpeta = "documentos/".$idser;
        if (!file_exists($micarpeta)) {

        // Cómo subir el archivo
        mkdir( "documentos/".$idser, 0777, true); 
        }
        $fichero = $_FILES["file"];

        // Cargando el fichero en la carpeta "subidas"
        move_uploaded_file($fichero["tmp_name"], "documentos/".$idser."/".$fichero["name"]);
        $ruta = "documentos/".$idser."/".$fichero["name"];
        $nombre = $fichero["name"];       
        $query= "INSERT INTO documentos (servicio,tipo_documento,ruta,nombre,fecha,hora,usuario,observaciones)
                values ($idser,'prueba','$ruta','$nombre',current_date,current_time,'$usuario','$inpobserveciones')" ;
                $result = mysqli_query($conexion, $query);
                // Redirigiendo hacia atrás
                if($result){
                //header("Location: " . $_SERVER["HTTP_REFERER"]);
                echo "<script> alert('Insertado') ;window.location='../detalles_egresos.php?idc=$idser'</script>";
                }else{echo "<script> alert('No Insertado') ;window.location='../detalles_egresos.php?idc=$idser'</script>";}
        
            }
    }

    if ($_POST['crud'] === "enlazar") {
        $idser = $_POST['idser'];
        $inputEnlaze = $_POST['inputEnlaze'];
        $queryobj = "INSERT INTO viajes_enlazados
        (
        servicio_uno,
        servicio_dos,
        fecha_creacion,
        usuario_creacion,
        hora_creacion)

        values (
        '$idser',
        '$inputEnlaze',
        current_date,
        '$usuario',
        CURRENT_TIMESTAMP)";
        $resultobj = mysqli_query($conexion, $queryobj);
        if($resultobj){
            echo "Enlazado";
        }

    }
} //termina la validacion del crud



if(isset($_POST['uuid'])){
$id_pend = "SELECT max(servicio)+1 as ultimo FROM cobranza; ";
$resdiscarpend = mysqli_query($conexion, $id_pend);
$id_varidocpend = mysqli_fetch_assoc($resdiscarpend);
echo $ultimo = $id_varidocpend['ultimo'];

} 
