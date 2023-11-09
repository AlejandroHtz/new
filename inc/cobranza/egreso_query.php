<?php
require ('../../conexion.php');

if (isset($_POST['inpTodo'])) {
    $var1 = $_POST['inpTodo']; 
    if(!empty($var1)){
 
        $consulta = "where 
        (co.servicio like '%$var1%' or
        co.empresa like '%$var1%' or
        co.operador  like '%$var1%' or
        co.mercancia  like '%$var1%' or
        co.origen  like '%$var1%' or
        co.estatus  like '%$var1%' or
        co.total_flete  like '%$var1%' or
        co.empresa  like '%$var1%'  )"; }
else { $consulta = ''; }

    echo "
    <table class='table table-bordered table-responsive-lg table-hover text-center' id='myTable' style='font-size: 100%;'>
        <thead style=' background-color: #07BFFF; ' >
            <tr >
                <th scope='col'>Servicio</th>
                <th scope='col'>Cliente</th>
                <th scope='col'>Operador</th>
                <th scope='col'>Mercancia</th>
                <th scope='col'>Origen</th>
                <th scope='col'>Destino</th>
                <th scope='col'>Total flete</th>
                <th scope='col'>Estatus</th>
                <th scope='col'> </th>
                
            
            </tr>
        </thead>";
     $querydiscaredo =  "SELECT co.*, CONCAT(op.nombre, ' ', op.apellidos) as nombreop, cl.nombre as empresan, 
     ce.estatus as estat
     from cobranza co
     left join operador op on op.id_operador = co.operador
     left join clientes cl on cl.id_cliente = co.empresa
     left join cat_estatus  ce on ce.id_estatus = co.estatus

     $consulta 
     order by co.servicio desc";
    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    $numero = mysqli_num_rows($resdiscaredo);
    echo 'Total de registros: ' . $numero; ?><br><?php

    $resdiscaredo = mysqli_query($conexion, $querydiscaredo);
    while ($filaresdiscaredo = mysqli_fetch_array($resdiscaredo)) {
        if($filaresdiscaredo['estat'] ==="PAGADO"){
            $span="<span class='badge badge-pill badge-success'>";
        }elseif($filaresdiscaredo['estat'] ==="CANCELADO"){
            $span="<span class='badge badge-pill badge-danger'>";
        }elseif($filaresdiscaredo['estat'] ==="FINANCIADO"){
            $span="<span class='badge badge-pill badge-primary'>";
        }else {
            $span="<span class='badge badge-pill badge-warning'>";
          }
        echo "
        <tbody>
            <tr>        
                <td data-titulo='Servicio: '>" . $filaresdiscaredo['servicio'] . "</td>
                <td data-titulo='Empresa: '>" . $filaresdiscaredo['empresan'] . "</td>
                <td data-titulo='Operador: '>" . $filaresdiscaredo['nombreop'] . "</td>
                <td data-titulo='Mercancia: '>" . $filaresdiscaredo['mercancia'] . "</td>
                <td data-titulo='Origen: '>" . $filaresdiscaredo['origen'] . "</td>
                <td data-titulo='Destino: '>" . $filaresdiscaredo['destino'] . "</td>
                <td data-titulo='Total_flete: '>" . $filaresdiscaredo['total_flete'] . "</td>
                <td data-titulo='Estatus: '> $span "  . $filaresdiscaredo['estat'] . "</span></td>
                <td >" ?> <a type="button" class="fas fa-file-alt" href="detalles_egresos.php?idc=<?php echo $filaresdiscaredo['servicio']; ?>"></a> <?php "</td>
                
            </tr> 
        </tbody>";
    }
    echo "</table>";
}
