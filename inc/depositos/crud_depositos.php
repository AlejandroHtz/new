<?php
require ('../../conexion.php');
$usuario = $_SESSION['email'];
if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $id = $_POST['id'];
        $inputSolicita = $_POST['inputSolicita'];
        $inputDesc = $_POST['inputDesc'];
        $inputConcepto = $_POST['inputConcepto'];
        $inputTipGasto = $_POST['inputTipGasto'];
        $inputCuenta = $_POST['inputCuenta'];
        $inputAutorizado = $_POST['inputAutorizado'];
        $inputImpGasto = $_POST['inputImpGasto'];
        $inputDepReal = $_POST['inputDepReal'];
        $inputFactura = $_POST['inputFactura'];
        $inputTipMov = $_POST['inputTipMov'];
        $inputEstatus = $_POST['inputEstatus'];
        $inputFecha = $_POST['inputFecha'];
        if($inputConcepto ==="COMBUSTIBLE"){
            $inputTicket = $_POST['inputTicket'];
            $inputTipComb = $_POST['inputTipComb'];
            $inputLitrosSum = $_POST['inputLitrosSum'];
            $inputPrecioComb = $_POST['inputPrecioComb'];
            $inputImpCarga = $_POST['inputImpCarga'];
            $inputFechaPago = $_POST['inputFechaPago'];
            $inputNufactura = $_POST['inputNufactura'];
            $inputFechaFac = $_POST['inputFechaFac'];
            $variable = ",numticket, tipo_combustible,ltr_suministrados,
            precio_combustible,imp_carga,fecha_pago,num_factura,fecha_factura";    
            $variablein = ",'$inputTicket','$inputTipComb','$inputLitrosSum',
            '$inputPrecioComb','$inputImpCarga','$inputFechaPago','$inputNufactura','$inputFechaFac'";      
        }else{
            $variable = "";
            $variablein = "";
        }
        $queryobj = "INSERT INTO depositos
         (
        servicio,
        solicita,
        descripcion,
        concepto,
        tipo_gasto,
        cuenta,
        autorizado,
        importe_gasto,
        dep_realizado,
        factura,
        tipo_movimiento,
        estatus,
        fecha,
        fecha_creacion,
        usuario_creacion,
        hora_creacion $variable )

        values (
        '$id',
        '$inputSolicita',
        '$inputDesc',
        '$inputConcepto',
        '$inputTipGasto',
        '$inputCuenta',
        '$inputAutorizado',
        '$inputImpGasto',
        '$inputDepReal',
        '$inputFactura',
        '$inputTipMov',
        '$inputEstatus',
        '$inputFecha',
        current_date,
        '$usuario',
        CURRENT_TIMESTAMP $variablein)";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputTipMov = $_POST['inputConcepto'];
        $InputId = $_POST['InputId'];



        $queryobj = "UPDATE cat_depositos SET
        concepto ='$inputConcepto'
        where id = '$InputId'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>