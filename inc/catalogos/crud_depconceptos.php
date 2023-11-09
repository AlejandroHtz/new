<?php
require ('../../conexion.php');

if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputConcepto = $_POST['inputConcepto'];
        $queryobj = "INSERT INTO cat_depositos
        (
            concepto
        )values ( '$inputConcepto' )";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputConcepto = $_POST['inputConcepto'];
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