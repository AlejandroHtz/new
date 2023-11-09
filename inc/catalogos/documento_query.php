<?php
require ('../../conexion.php');

if (isset($_POST['inpTodo'])) {
     $var1 = $_POST['inpTodo']; 
    if(!empty($var1)){
 
        $consulta = ""; }
else { $consulta = ''; }

    echo "
    <table class='table table-bordered table-responsive-lg table-hover text-center' id='myTable' style='font-size: 100%;'>
        <thead style=' background-color: #ffc107;'>
            <tr >
                <th scope='col'>ID</th>
                <th scope='col'>Tipo de documento</th>
                <th scope='col'> </th>
                
            
            </tr>
        </thead>";
    $querydiscaredo =  "SELECT * from cat_tipo_documento $consulta order by id_tipo_documento asc";
    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    $numero = mysqli_num_rows($resdiscaredo);
    echo 'Total de registros: ' . $numero; ?><br><?php

    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    while ($filaresdiscaredo = mysqli_fetch_array($resdiscaredo)) {
        $datoss = $filaresdiscaredo['id_tipo_documento'] . "||" .
        $datoss = $filaresdiscaredo['tipo_documento'];
        echo "
        <tbody>
            <tr>        
                <td>" . $filaresdiscaredo['id_tipo_documento'] . "</td>
                <td>" . $filaresdiscaredo['tipo_documento'] . "</td>

                <td >" ?><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar</button><?php "</td>
                
            </tr> 
        </tbody>";
    }
    echo "</table>";
}
