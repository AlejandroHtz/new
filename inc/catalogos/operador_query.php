<?php
require ('../../conexion.php');

if (isset($_POST['inpTodo'])) {
     $var1 = $_POST['inpTodo']; 
    if(!empty($var1)){
 
        $consulta = "where 
        (nombre like '%$var1%' or
        apellidos like '%$var1%' or
        rfc  like '%$var1%' or
        direccion  like '%$var1%' or
        municipio  like '%$var1%' or
        colonia  like '%$var1%' or
        telefono  like '%$var1%'   )"; }
else { $consulta = ''; }

    echo "
    <table class='table table-bordered table-responsive-lg table-hover text-center' id='myTable' style='font-size: 100%;'>
        <thead style=' background-color: #ffc107;'>
            <tr >
                <th scope='col'>nombre</th>
                <th scope='col'>apellidos</th>
                <th scope='col'>rfc</th>
                <th scope='col'>direccion</th>
                <th scope='col'>municipio</th>
                <th scope='col'>colonia</th>
                <th scope='col'>telefono</th>
                <th scope='col'>vialidad</th>
                <th scope='col'> </th>
                
            
            </tr>
        </thead>";
    $querydiscaredo =  "SELECT * from operador $consulta order by nombre asc";
    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    $numero = mysqli_num_rows($resdiscaredo);
    echo 'Total de registros: ' . $numero; ?><br><?php

    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    while ($filaresdiscaredo = mysqli_fetch_array($resdiscaredo)) {
        $datoss = $filaresdiscaredo['nombre'] . "||" .
        $datoss = $filaresdiscaredo['apellidos'] . "||" .
        $datoss = $filaresdiscaredo['rfc'] . "||" .
        $datoss = $filaresdiscaredo['direccion'] . "||" . 
        $datoss = $filaresdiscaredo['telefono'] . "||" .
        $datoss = $filaresdiscaredo['id_operador'] . "||" .
        $datoss = $filaresdiscaredo['id_operador'];
        echo "
        <tbody>
            <tr>        
                <td>" . $filaresdiscaredo['nombre'] . "</td>
                <td>" . $filaresdiscaredo['apellidos'] . "</td>
                <td>" . $filaresdiscaredo['rfc'] . "</td>
                <td>" . $filaresdiscaredo['direccion'] . "</td>
                <td>" . $filaresdiscaredo['municipio'] . "</td>
                <td>" . $filaresdiscaredo['colonia'] . "</td>
                <td>" . $filaresdiscaredo['telefono'] . "</td>
                <td>" . $filaresdiscaredo['vialidad'] . "</td>
                <td >" ?><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar</button><?php "</td>
                
            </tr> 
        </tbody>";
    }
    echo "</table>";
}
