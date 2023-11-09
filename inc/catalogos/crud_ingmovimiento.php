<?php
require ('../../conexion.php');

if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputTipMov = $_POST['inputTipMov'];
        $queryobj = "INSERT INTO cat_tipo_movimiento
        (
            tipo_movimiento
        )values ( '$inputTipMov'  )";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputTipMov = $_POST['inputTipMov'];
        $InputId = $_POST['InputId'];



        $queryobj = "UPDATE cat_tipo_movimiento SET
        tipo_movimiento ='$inputTipMov'
        where id_tipmovimiento = '$InputId'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>