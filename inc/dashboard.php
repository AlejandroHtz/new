<?php
include("header.php");

// include("querys/querys_general.php");
$usuario = $_SESSION['nombre'];
$iduser = $_SESSION['id'];


?>
<link rel="stylesheet" href="../../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../../js/jquery.js"></script>
<script src="../../js/jquery-ui.js"></script>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $querygen =  "SELECT sum(co.total_flete) as generando
                                FROM cobranza co";
                                $resulquerygen = mysqli_query($conexion, $querygen);
                                $som = mysqli_fetch_assoc($resulquerygen);
                                $sumaa = $som['generando'];
                                ?>
                                <h5 class="text-muted">Total generado</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo  "$ " . number_format($sumaa, 2); ?></h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $querycl =  "SELECT count(nombre) as numcl
                                FROM clientes";
                                $resulquerycl = mysqli_query($conexion, $querycl);
                                $somcl = mysqli_fetch_assoc($resulquerycl);
                                $clnum = $somcl['numcl'];
                                ?>
                                <h5 class="text-muted">Numero de clientes</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo $clnum; ?></h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $queryop =  "SELECT count(nombre) as numop
                                FROM operador";
                                $resulqueryop = mysqli_query($conexion, $queryop);
                                $somop = mysqli_fetch_assoc($resulqueryop);
                                $opnum = $somop['numop'];
                                ?>
                                <h5 class="text-muted">Numero de operadores</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo $opnum; ?></h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                    <span>N/A</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue3"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $querytr =  "SELECT count(tracto) as numtr
                                FROM tracto";
                                $resulquerytr = mysqli_query($conexion, $querytr);
                                $somtr = mysqli_fetch_assoc($resulquerytr);
                                $trnum = $somtr['numtr'];
                                ?>
                                <h5 class="text-muted">Numero de unidades</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo $trnum; ?></h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                    <span>-2.00%</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue4"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0">Empresa</th>
                                        <th class="border-0">Generado</th>
                                        <th class="border-0">A cuenta</th>
                                        <th class="border-0">Pendiente</th>
                                    </tr>
                                </thead>
                                <?php

                                $queryArchivos =  "SELECT cl.nombre,sum(co.total_flete) as generando, sum(co.pago_total) as acuenta,
                                (sum(co.total_flete) - sum(co.pago_total)) as pendiente
                                FROM cobranza co
                                left join clientes cl on cl.id_cliente= co.empresa
                                group by co.empresa order by sum(co.total_flete) DESC";
                                $resultadoArchivo = mysqli_query($conexion, $queryArchivos);

                                while ($filaup = mysqli_fetch_array($resultadoArchivo)) {

                                ?>
                                    <tbody>
                                        <tr>
                                            <td data-titulo="Empresa: "><?php echo $filaup['nombre'] ?></td>
                                            <td data-titulo="Generado: "><?php echo number_format($filaup['generando'], 2) ?></td>
                                            <td data-titulo="A cuenta: "><?php echo number_format($filaup['acuenta'], 2) ?></td>
                                            <td data-titulo="Pendiente: "><?php echo number_format($filaup['pendiente'], 2) ?></td>
                                        </tr>
                                    <?PHP
                                }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                        <div class="card">
                            <div class="card-header">

                                <h5 class="mb-0">UTI X VIAJE</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="tab-content table-responsive" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-fee" role="tabpanel">
                                         <table class="table table-striped" id="myTable">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Servicio</th>
                                                        <th>Semana</th>
                                                        <th>Operador</th>
                                                        <th>Origen</th>
                                                        <th>Destino</th>
                                                        <th>Gastos</th>
                                                        <th>Casetas</th>
                                                        <th>Combustibles</th>
                                                        <th>Nomina</th>
                                                        <th>Total Gasos</th>
                                                        <th>Flete</th>
                                                        <th>Ganancias</th>

                                                    </tr>
                                                </thead>
                                                <?php

                                                $queryArchivos =  "SELECT co.semana,co.servicio, CONCAT(op.nombre, ' ', op.apellidos) as nombreop, co.origen, co.destino, 
                                                case when sum(dep.dep_realizado) > 0 then sum(dep.dep_realizado) else 0 end as gastos , 
                                                case when sum(depc.dep_realizado) > 0 and ctag.imptag > 0 then (sum(depc.dep_realizado)+ ctag.imptag) 
                                                     when sum(depc.dep_realizado) > 0 and ctag.imptag is null then sum(depc.dep_realizado) 
                                                     when sum(depc.dep_realizado) is null and ctag.imptag > 0 then ctag.imptag  else 0 end as casetas,
                                                case when comb.depcombus > 0 then comb.depcombus else 0 end as combustibles,
                                                case when nom.depnomin > 0 then nom.depnomin else 0 end as nomina, 
                                                CASE WHEN ctag.imptag > 0 AND dx.totl > 0 THEN ctag.imptag+dx.totl
                                                     WHEN ctag.imptag > 0 AND dx.totl IS NULL THEN ctag.imptag
                                                     WHEN ctag.imptag IS NULL AND dx.totl > 0 THEN dx.totl else 0 end as totaldegastos,
                                                co.total_flete as flete ,
                                                CASE WHEN co.total_flete > 0 AND ctag.imptag > 0 and dx.totl > 0 THEN (co.total_flete - (ctag.imptag+dx.totl)) 
                                                     WHEN co.total_flete > 0 
                                                           AND ctag.imptag is null
                                                          and dx.totl  is null then co.total_flete
                                                     WHEN co.total_flete > 0 
                                                           AND ctag.imptag > 0
                                                          and dx.totl  is null then (co.total_flete - ctag.imptag)
                                                     WHEN co.total_flete > 0 
                                                           AND ctag.imptag is null
                                                          and dx.totl > 0  then (co.total_flete - dx.totl)
                                                          ELSE 0 end as ganancia 
                                                FROM cobranza co
                                                left join depositos dep on dep.servicio = co.servicio and dep.concepto not in ('CASETAS','COMBUSTIBLE','NOMINA')
                                                left JOIN operador op on op.id_operador = co.operador
                                                left join depositos depc on depc.servicio = co.servicio and depc.concepto in ('CASETAS')
                                                left join (SELECT servicio,sum(dep_realizado) as depcombus from depositos where concepto = 'COMBUSTIBLE' GROUP BY servicio) as comb on comb.servicio = co.servicio
                                                left join (SELECT servicio,sum(dep_realizado) as depnomin from depositos where concepto = 'NOMINA' GROUP BY servicio) as nom on nom.servicio = co.servicio
                                                left join (SELECT servicio,CASE WHEN sum(importe) > 0 THEN sum(importe) ELSE 0 END as imptag from tag GROUP BY servicio) as ctag on ctag.servicio = co.servicio
                                                left join (select servicio,CASE WHEN sum(dep_realizado) > 0 THEN sum(dep_realizado) ELSE 0 END as totl from depositos group by servicio) dx on dx.servicio = co.servicio
                                                group by semana,servicio, operador, origen, destino";
                                                $resultadoArchivo = mysqli_query($conexion, $queryArchivos);
                                                $numero = mysqli_num_rows($resultadoArchivo);
                                                while ($filaup = mysqli_fetch_array($resultadoArchivo)) {

                                                                    ?>
                                                    <tbody>

                                                        <tr>


                                                            <td data-titulo="Servicio: "><?php echo $filaup['servicio'] ?></td>
                                                            <td data-titulo="Semana: "><?php echo $filaup['semana'] ?></td>
                                                            <td data-titulo="Operador: "><?php echo $filaup['nombreop'] ?></td>
                                                            <td data-titulo="Origen: "><?php echo $filaup['origen'] ?></td>
                                                            <td data-titulo="Destino: "><?php echo $filaup['destino'] ?></td>
                                                            <td data-titulo="Gastos: "><?php echo number_format($filaup['gastos'],2) ?></td>
                                                            <td data-titulo="Casetas: "><?php echo number_format($filaup['casetas'],2) ?></td>
                                                            <td data-titulo="Combustibles: "><?php echo number_format($filaup['combustibles'],2) ?></td>

                                                            <td data-titulo="Nomina: "><?php echo number_format($filaup['nomina'],2) ?></td>
                                                            <td data-titulo="Total de gastos: "><?php echo number_format($filaup['totaldegastos'],2) ?></td>
                                                            <td data-titulo="Flete: "><?php echo number_format($filaup['flete'],2) ?></td>
                                                            <td data-titulo="Ganancia: "><?php echo number_format($filaup['ganancia'],2) ?></td>


                                                        </tr>
                                                    <?PHP
                                                                    }
                                                    ?>
                                                    </tbody>
                                                    <?php


                                                    ?>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- customer acquistion  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Customer Acquisition</h5>
                            <div class="card-body">
                                <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                                <div class="text-center">
                                    <span class="legend-item mr-2">
                                        <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Returning</span>
                                    </span>
                                    <span class="legend-item mr-2">

                                        <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">First Time</span>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- ============================================================== -->
                    <!-- end customer acquistion  -->
                    <!-- product sales  -->
                    <!-- ============================================================== -->

                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                            </div>
                    <!-- ============================================================== -->
                    <!-- end product sales  -->
                    <!-- ============================================================== -->
                </div>



            </div> <!--- end  -->

        </div>


    </section>
</div>
<?php require('footer.php'); ?>