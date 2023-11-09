<?php
require ('../../conexion.php');

if (isset($_POST['inpTodo'])) {
     $var1 = $_POST['inpTodo']; 
    if(!empty($var1)){
 
        $consulta = "where 
        (tracto like '%$var1%' or
        placas like '%$var1%' or
        marca  like '%$var1%' or
        modelo  like '%$var1%' or
        color  like '%$var1%' or
        serie_motor  like '%$var1%'   )"; }
else { $consulta = ''; }

    echo "
    <table class='table table-bordered table-responsive-lg table-hover text-center' id='myTable' style='font-size: 100%;'>
        <thead style=' background-color: #ffc107;'>
            <tr >
                <th scope='col'>tracto</th>
                <th scope='col'>placas</th>
                <th scope='col'>marca</th>
                <th scope='col'>modelo</th>
                <th scope='col'>color</th>
                <th scope='col'>cilindros</th>
                <th scope='col'>transmision</th>
                <th scope='col'>motor</th>
                <th scope='col'>serie_motor</th>
                <th scope='col'>Estatus</th>
                <th scope='col'>Kilometraje</th>
                <th scope='col'></th>

                
            
            </tr>
        </thead>";
    $querydiscaredo =  "SELECT * from tracto $consulta order by tracto asc";
    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    $numero = mysqli_num_rows($resdiscaredo);
    echo 'Total de registros: ' . $numero; ?><br><?php

    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    while ($filaresdiscaredo = mysqli_fetch_array($resdiscaredo)) {
        $datoss = $filaresdiscaredo['tracto'] . "||" .
        $datoss = $filaresdiscaredo['placas'] . "||" .
        $datoss = $filaresdiscaredo['marca'] . "||" .
        $datoss = $filaresdiscaredo['modelo'] . "||" .
        $datoss = $filaresdiscaredo['color'] . "||" . 
        $datoss = $filaresdiscaredo['cilindros'] . "||" .
        $datoss = $filaresdiscaredo['transmision'] . "||" .
        $datoss = $filaresdiscaredo['motor'] . "||" .
        $datoss = $filaresdiscaredo['serie_motor'] . "||" .
        $datoss = $filaresdiscaredo['estatus'] . "||" .
        $datoss = $filaresdiscaredo['kilometraje'] . "||" .
        $datoss = $filaresdiscaredo['id_tracto'];
        echo "
        <tbody>
            <tr>        
                <td>" . $filaresdiscaredo['tracto'] . "</td>
                <td>" . $filaresdiscaredo['placas'] . "</td>
                <td>" . $filaresdiscaredo['marca'] . "</td>
                <td>" . $filaresdiscaredo['modelo'] . "</td>
                <td>" . $filaresdiscaredo['color'] . "</td>
                <td>" . $filaresdiscaredo['cilindros'] . "</td>
                <td>" . $filaresdiscaredo['transmision'] . "</td>
                <td>" . $filaresdiscaredo['motor'] . "</td>
                <td>" . $filaresdiscaredo['serie_motor'] . "</td>
                <td>" . $filaresdiscaredo['estatus'] . "</td>
                <td>" . $filaresdiscaredo['kilometraje'] . "</td>
                <td >" ?><button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modificart" onclick="agregaform('<?php echo $datoss ?>')">Modificar</button><?php "</td>
                
            </tr> 
        </tbody>";
    }
    echo "</table>";
}
