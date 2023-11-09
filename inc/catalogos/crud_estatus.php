<?php
require ('../../conexion.php');

if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputEstatus = $_POST['inputEstatus'];
        $queryobj = "INSERT INTO cat_estatus
        (
            estatus
        )values ( '$inputEstatus'  )";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputEstatus = $_POST['inputEstatus'];
        $InputId = $_POST['InputId'];



        $queryobj = "UPDATE cat_estatus SET
        estatus ='$inputEstatus'
        where id_estatus = '$InputId'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>