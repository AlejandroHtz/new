<?php 
require ('../../conexion.php');
if (isset($_POST['crud'])) {  //si esta declarado el crud
 
if ($_POST['crud'] === "insertar") {
    $id = $_POST['id'];
    $inputTag = $_POST['inputTag'];
    $inputNoEco = $_POST['inputNoEco'];
    $inputFecha = $_POST['inputFecha'];
    $inputHora = $_POST['inputHora'];
    $inputCaseta = $_POST['inputCaseta'];
    $inputCarril = $_POST['inputCarril'];
    $inputClase = $_POST['inputClase'];
    $inputImp = $_POST['inputImp'];
    

    $queryobj = "INSERT INTO tag
    (servicio,
    tag,
    noeconomico,
    fecha,
    hora,
    caseta,
    carril,
    clase,
    importe)values 
    (
    '$id',
    '$inputTag',
    '$inputNoEco',
    '$inputFecha',
    '$inputHora',
    '$inputCaseta',
    '$inputCarril',
    '$inputClase',
    '$inputImp'
    )";
            $resultobj = mysqli_query($conexion, $queryobj);
            if ($resultobj) {
                echo "<script> alert('Insertado') ;window.location='../detalles_egresos.php?idc=$id'</script>";
                }else{echo "<script> alert('No Insertado') ;window.location='../detalles_egresos.php?idc=$id'</script>";}
        
            
    } //termina si es insetr

}


?>