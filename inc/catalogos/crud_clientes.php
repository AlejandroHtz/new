<?php
require ('../../conexion.php');

if (isset($_POST['crud'])) {  //si esta declarado el crud

    if ($_POST['crud'] === "insertar") { // insertamos
        $inputNombre = $_POST['inputNombre'];
        $inputRfc = $_POST['inputRfc'];
        $inputDireccion = $_POST['inputDireccion'];        
        $inputColonia = $_POST['inputColonia'];
        $inputCiudad = $_POST['inputCiudad'];
        $inputMunicipio = $_POST['inputMunicipio'];
        $inputCp = $_POST['inputCp'];
        $inputTelefono = $_POST['inputTelefono'];

        $queryobj = "INSERT INTO clientes
        (
        nombre,
        rfc,
        direccion,
        colonia,
        ciudad,
        mun,
        cp,
        telefono,
        fecha_creacion,
        usuario_creacion,
        hora_creacion)

        values (
        '$inputNombre',
        '$inputRfc',
        '$inputDireccion',
        '$inputColonia',
        '$inputCiudad',
        '$inputMunicipio',
        '$inputCp',
        '$inputTelefono',
        current_date,
        'Alex',
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
        $inputRfc = $_POST['inputRfc'];
        $inputDireccion = $_POST['inputDireccion'];        
        $inputColonia = $_POST['inputColonia'];
        $inputCiudad = $_POST['inputCiudad'];
        $inputMunicipio = $_POST['inputMunicipio'];
        $inputCp = $_POST['inputCp'];
        $inputTelefono = $_POST['inputTelefono'];
        $InputIdop = $_POST['InputIdop'];


        $queryobj = "UPDATE clientes SET
        nombre = '$inputNombre',
        rfc = '$inputRfc',
        direccion = '$inputDireccion',
        colonia = '$inputColonia',
        ciudad = '$inputCiudad',
        mun = '$inputMunicipio',
        cp = '$inputCp',
        telefono = '$inputTelefono',
        fecha_modificacion = current_date,
        usuario_modificacion  = 'Alex',
        hora_modificacion = CURRENT_TIMESTAMP 
        where id_cliente = '$InputIdop'";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "Actualizado";
            } else {
                echo "No Actualizado";
            }
    } //se acaba la actualizacion

}

?>