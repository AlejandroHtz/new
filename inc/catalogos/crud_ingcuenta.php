<?php
require ('../../conexion.php');

if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputTipCuenta = $_POST['inputTipCuenta'];
        $queryobj = "INSERT INTO cat_tipo_cuenta
        (
            tipo_cuenta
        )values ( '$inputTipCuenta'  )";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputTipCuenta = $_POST['inputTipCuenta'];
        $InputId = $_POST['InputId'];



        $queryobj = "UPDATE cat_tipo_cuenta SET
        tipo_cuenta ='$inputTipCuenta'
        where id_tipcuenta = '$InputId'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>