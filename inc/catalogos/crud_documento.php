<?php
require ('../../conexion.php');

if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputDoc = $_POST['inputDoc'];
        $queryobj = "INSERT INTO cat_tipo_documento
        (
            tipo_documento
        )values ( '$inputDoc'  )";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputDoc = $_POST['inputDoc'];
        $InputId = $_POST['InputId'];



        $queryobj = "UPDATE cat_tipo_documento SET
        tipo_documento ='$inputDoc'
        where id_tipo_documento = '$InputId'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>