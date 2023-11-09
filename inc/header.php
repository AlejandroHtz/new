<?php

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['active'])) {
    header('location: ../index.php');
}
?>

<?php

if (empty($_SESSION['variable'])) {
}

require('../conexion.php');
require ('perfilloader.php');
$semana = date('W');
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DECODITEC</title>
    <link rel="icon" type="image/png" href="img/favicon.png"/>



    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <!-- <img src="#" alt="#" style="height: 100%"> -->
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            </ul>
        </nav>
        <!-- /.navbar -->
        <style>
            .sidebar {
                height: 100%;
                width: fit-content;
                position: fixed;
                z-index: 1;

                background-color: #343a40;
                overflow-x: hidden;

            }
        </style>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div> -->
                    <li class="nav nav-pills nav-sidebar flex-column">
                        <span></span>
                        <a class="nav-link">
                            <p><?PHP echo  $_SESSION['nombre']; ?></p>
                        </a>

                        <!-- <a data-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample"><?PHP echo  $_SESSION['nombre'] . "(" . $_SESSION['perfil'] . ")"; ?></a> -->
                    </li>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <!-- <li class="nav-header text-center" style="font-size: 25px">MENÚ</li> -->
                        <?PHP if($_SESSION['view_cuentas']=="1") { ?>
                            <li class="nav-item">
                                <a href="cuentas.php" class="nav-link">
                                    <span class="nav-icon fas fa-tachometer-alt"></span>
                                    <p>
                                        Cuentas usuarios
                                    </p>
                                </a>
                            </li>
                        <?php  }  if($_SESSION['view_dashboard']=="1") { ?>
                            <li class="nav-item">
                                <a href="dashboard.php" class="nav-link">
                                    <span class="nav-icon fas fa-tachometer-alt"></span>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        <?php  } if($_SESSION['view_cobranza']=="1") { ?>

                            <li class="nav-item">
                                <a href="cobranza.php" class="nav-link">
                                <span class="nav-icon fas fa-warehouse"></span>
                                    <p>
                                    Cobranza
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="egresos.php" class="nav-link">
                                <span class="nav-icon fas fa-warehouse"></span>
                                    <p>
                                    Egresos
                                    </p>
                                </a>
                            </li>
                            <?php  } if($_SESSION['view_catalogos']=="1") { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="nav-icon fas fa-parking"></span>
                                    <p>
                                    Catalogos
                                    </p>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php if($_SESSION['view_cat_clientes']=="1") { ?>
                                <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
                                <?php  } if($_SESSION['view_cat_operadores']=="1") { ?>
                                <li><a class="dropdown-item" href="operadores.php">Operadores</a></li>
                                <?php  } if($_SESSION['view_cat_tracto']=="1") { ?>
                                <li><a class="dropdown-item" href="tracto.php">Tracto</a></li>
                                <?php  } if($_SESSION['view_cat_incuenta']=="1") { ?>
                                <li><a class="dropdown-item" href="incueta.php">Ingreso a cuenta</a></li>
                                <?php  } if($_SESSION['view_cat_movimiento']=="1") { ?>
                                <li><a class="dropdown-item" href="movimiento.php">Tipo de movimiento</a></li>
                                <?php  } if($_SESSION['view_cat_estatus']=="1") { ?>
                                <li><a class="dropdown-item" href="estatus.php">Estatus de viaje</a></li>
                                <?php  } if($_SESSION['view_cat_documentos']=="1") { ?>
                                <li><a class="dropdown-item" href="documentos.php">Tipo de documentos</a></li>
                                <?php  } if($_SESSION['view_cat_depositos']=="1") { ?>
                                <li><a class="dropdown-item" href="depositos.php">Depositos</a></li>
                                <?php  } if($_SESSION['view_cat_tag']=="1") { ?>
                                <li><a class="dropdown-item" href="tag.php">Tag</a></li>
                                <?php  } ?>
                                </ul>

                            </li>
                            <?php  } ?>

                        <li class="nav-item">
                            <a href="../close.php" class="nav-link text-danger">
                                <span class="nav-icon fas fa-power-off"></span>
                                <p>
                                    <strong>Salir</strong>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>