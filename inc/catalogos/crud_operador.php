<?php
require ('../../conexion.php');
$usuario = $_SESSION['email'];
if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputNombre = $_POST['inputNombre'];
        $inputApellidos = $_POST['inputApellidos'];
        $inputRfc = $_POST['inputRfc'];
        $inputDireccion = $_POST['inputDireccion'];
        $inputTelefono = $_POST['inputTelefono'];

        $queryobj = "INSERT INTO operador
        (
        nombre,
        apellidos,
        rfc,
        direccion,
        telefono,
        fecha_creacion,
        usuario_creacion,
        hora_creacion)

        values (
        '$inputNombre',
        '$inputApellidos',
        '$inputRfc',
        '$inputDireccion',
        '$inputTelefono',
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
        $inputNombre = $_POST['inputNombre'];
        $inputApellidos = $_POST['inputApellidos'];
        $inputRfc = $_POST['inputRfc'];
        $inputDireccion = $_POST['inputDireccion'];
        $inputTelefono = $_POST['inputTelefono'];
        $InputIdop = $_POST['InputIdop'];


        $queryobj = "UPDATE operador SET
        nombre= '$inputNombre',
        apellidos= '$inputApellidos',
        rfc= '$inputRfc',
        direccion= '$inputDireccion',
        telefono= '$inputTelefono',
        fecha_modificacion = current_date,
        usuario_modificacion  = '$usuario',
        hora_modificacion = CURRENT_TIMESTAMP 
        where id_operador = '$InputIdop'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>