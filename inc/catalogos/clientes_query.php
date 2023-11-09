<?php
require ('../../conexion.php');

if (isset($_POST['inpTodo'])) {
     $var1 = $_POST['inpTodo']; 
    if(!empty($var1)){
 
        $consulta = "where 
        (nombre like '%$var1%' or
        mun like '%$var1%' or
        rfc  like '%$var1%' or

        cp  like '%$var1%'   )"; }
else { $consulta = ''; }

    echo "
    <table class='table table-bordered table-responsive-lg table-hover text-center' id='myTable' style='font-size: 100%;'>
        <thead style=' background-color: #ffc107;'>
            <tr >
                <th scope='col'>nombre</th>
                <th scope='col'>rfc</th>
                <th scope='col'>direccion</th>
                <th scope='col'>Colonia</th>
                <th scope='col'>Ciudad</th>
                <th scope='col'>municipio</th>
                <th scope='col'>CP</th>
                <th scope='col'>telefono</th>
                <th scope='col'> </th>
                
            
            </tr>
        </thead>";
    $querydiscaredo =  "SELECT * from clientes $consulta order by nombre asc";
    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    $numero = mysqli_num_rows($resdiscaredo);
    echo 'Total de registros: ' . $numero; ?><br><?php

    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    while ($filaresdiscaredo = mysqli_fetch_array($resdiscaredo)) { 
        $datoss = $filaresdiscaredo['nombre'] . "||" .
        $datoss = $filaresdiscaredo['rfc'] . "||" .
        $datoss = $filaresdiscaredo['direccion'] . "||" .
        $datoss = $filaresdiscaredo['colonia'] . "||" . 
        $datoss = $filaresdiscaredo['ciudad'] . "||" .
        $datoss = $filaresdiscaredo['mun'] . "||" .
        $datoss = $filaresdiscaredo['cp'] . "||" .
        $datoss = $filaresdiscaredo['telefono'] . "||" .
        $datoss = $filaresdiscaredo['id_cliente'];
        echo "
        <tbody>
            <tr>        
                <td>" . $filaresdiscaredo['nombre'] . "</td>
                <td>" . $filaresdiscaredo['rfc'] . "</td>
                <td>" . $filaresdiscaredo['direccion'] . "</td>
                <td>" . $filaresdiscaredo['colonia'] . "</td>
                <td>" . $filaresdiscaredo['ciudad'] . "</td>
                <td>" . $filaresdiscaredo['mun'] . "</td>
                <td>" . $filaresdiscaredo['cp'] . "</td>
                <td>" . $filaresdiscaredo['telefono'] . "</td>
                <td >" ?><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar</button><?php "</td>
                
            </tr> 
        </tbody>";
    }
    echo "</table>";
}
