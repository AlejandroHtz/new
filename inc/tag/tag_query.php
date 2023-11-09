<?php
require ('../../conexion.php');

if (isset($_POST['inpTodo'])) {
    $var1 = $_POST['inpTodo']; 
    if(!empty($var1)){
 
        $consulta = "where 
        (servicio like '%$var1%' or
        tag like '%$var1%' or
        noeconomico  like '%$var1%' or
        fecha  like '%$var1%' or
        hora  like '%$var1%' or
        caseta  like '%$var1%' or
        carril  like '%$var1%' or
        clase  like '%$var1%' or
        importe  like '%$var1%'  )"; }
else { $consulta = ''; }

    echo "
    <table class='table table-bordered table-responsive-lg table-hover text-center' id='myTable' style='font-size: 100%;'>
        <thead style=' background-color: #07BFFF; ' >
            <tr >
                <th scope='col'>Servicio</th>
                <th scope='col'>Tag</th>
                <th scope='col'>#Economico</th>
                <th scope='col'>fecha</th>
                <th scope='col'>hora</th>
                <th scope='col'>Caseta</th>
                <th scope='col'>Carril</th>
                <th scope='col'>Clase</th>
                <th scope='col'>Importe</th>
                
            
            </tr>
        </thead>";
     $querydiscaredo =  "SELECT * from tag

     $consulta 
     order by servicio desc, fecha asc, hora asc";
    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    $numero = mysqli_num_rows($resdiscaredo);
    echo 'Total de registros: ' . $numero; ?><br><?php

    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    while ($filaresdiscaredo = mysqli_fetch_array($resdiscaredo)) {
       
        echo "
        <tbody>
            <tr>        
                <td data-titulo='Servicio: '>" . $filaresdiscaredo['servicio'] . "</td>
                <td data-titulo='Empresa: '>" . $filaresdiscaredo['tag'] . "</td>
                <td data-titulo='Operador: '>" . $filaresdiscaredo['noeconomico'] . "</td>
                <td data-titulo='Mercancia: '>" . $filaresdiscaredo['fecha'] . "</td>
                <td data-titulo='Origen: '>" . $filaresdiscaredo['hora'] . "</td>
                <td data-titulo='Destino: '>" . $filaresdiscaredo['caseta'] . "</td>
                <td data-titulo='Total_flete: '>" . $filaresdiscaredo['carril'] . "</td>
                <td data-titulo='Estatus: '>"  . $filaresdiscaredo['clase'] . "</td>
                <td data-titulo='Estatus: '> "  . $filaresdiscaredo['importe'] . "</td>
                
                
            </tr> 
        </tbody>";
    }
    echo "</table>";
}
