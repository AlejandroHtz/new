<?php
require ('../../conexion.php');
$usuario = $_SESSION['email'];
if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputTracto = $_POST['inputTracto'];
        $inputPlacas = $_POST['inputPlacas'];
        $inputMarca = $_POST['inputMarca'];
        $inputModelo = $_POST['inputModelo'];
        $inputColor = $_POST['inputColor'];
        $inputCilindros = $_POST['inputCilindros'];
        $inputTransmision = $_POST['inputTransmision'];
        $inputMotor = $_POST['inputMotor'];
        $inputSerMotor = $_POST['inputSerMotor'];
        $inputEstatus = $_POST['inputEstatus'];
        $inputKilom = $_POST['inputKilom'];

        $queryobj = "INSERT INTO tracto
        (
        tracto,
        placas,
        marca,
        modelo,
        color,
        cilindros,
        transmision,
        motor,
        serie_motor,
        estatus,
        baja,
        kilometraje,
        fecha_creacion,
        usuario_creacion,
        hora_creacion)

        values (
        '$inputTracto',
        '$inputPlacas',
        '$inputMarca',
        '$inputModelo',
        '$inputColor',
        '$inputCilindros',
        '$inputTransmision',
        '$inputMotor',
        '$inputSerMotor',
        '$inputEstatus',
        '0',
        '$inputKilom',
        current_date,
        '$usuario',
        CURRENT_TIMESTAMP)";
                $resultobj = mysqli_query($conexion, $queryobj);
                if ($resultobj) {
                    echo "Insertado";
                } else {
                    echo "No insertado";
                }
 


    } //se acaba el insert

    if ($_POST['crud'] === "actualizar") { //actualizamos

        $inputTracto = $_POST['inputTracto'];
        $inputPlacas = $_POST['inputPlacas'];
        $inputMarca = $_POST['inputMarca'];
        $inputModelo = $_POST['inputModelo'];
        $inputColor = $_POST['inputColor'];
        $inputCilindros = $_POST['inputCilindros'];
        $inputTransmision = $_POST['inputTransmision'];
        $inputMotor = $_POST['inputMotor'];
        $inputSerMotor = $_POST['inputSerMotor'];
        $inputEstatus = $_POST['inputEstatus'];
        $inputKilom = $_POST['inputKilom'];
        $inputIdtrac = $_POST['inputIdtrac'];


        $queryobj = "UPDATE tracto SET
        tracto ='$inputTracto',
        placas ='$inputPlacas',
        marca ='$inputMarca',
        modelo ='$inputModelo',
        color ='$inputColor',
        cilindros ='$inputCilindros',
        transmision ='$inputTransmision',
        motor ='$inputMotor',
        serie_motor ='$inputSerMotor',
        estatus ='$inputEstatus',
        baja ='0',
        kilometraje ='$inputKilom',
        fecha_modificacion = current_date,
        usuario_modificacion  = '$usuario',
        hora_modificacion = CURRENT_TIMESTAMP 
        where id_tracto = '$inputIdtrac'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>