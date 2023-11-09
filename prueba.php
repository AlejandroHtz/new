


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DECODITEC</title>
    <!--<link rel="icon" type="image/png" href="img/n.ico" /> -->



    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/inc/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="/inc/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body class="hold-transition sidebar-mini" >
  <div class="wrapper" id="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
          <div class="info">
            <p>
             
              <!-- <a data-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample"><?PHP echo  $_SESSION['nombre']."(".$_SESSION['perfil'].")"; ?></a> -->
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body  bg-danger">
               <a href=""><span class="fas fa-user"></span> Perfil</a>
               <a href=""><span class="fas fa-lock"></span> Cuentas</a>
               <a href="../close.php"><span class="fas fa-power-off"></span> Salir</a>

             </div>
           </div>
         </div>
       </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <!-- <li class="nav-header text-center" style="font-size: 25px">MENÚ</li> -->
           <li class="nav-item">  
            <a href="../dashboard/dashboard.php" class="nav-link">
              <span class="nav-icon fas fa-tachometer-alt"></span>
              <p>
                Dashboard
              </p>
            </a>
          </li>


            <li class="nav-item">
              <a href="../inc/cobranza/cobranza.php" class="nav-link">
                <span class="nav-icon fas fa-warehouse"></span>              
                <p>
                  Cobranza
                </p>
              </a>
            </li>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catalogos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../catalogos/clientes.php">Clientes</a></li>
            <li><a class="dropdown-item" href="../catalogos/operadores.php">Operadores</a></li>
            <li><a class="dropdown-item" href="../catalogos/tracto.php">Tracto</a></li>
            <li><a class="dropdown-item" href="../catalogos/incueta.php">Ingreso a cuenta</a></li>
            <li><a class="dropdown-item" href="../catalogos/movimiento.php">Tipo de movimiento</a></li>
            <li><a class="dropdown-item" href="../catalogos/estatus.php">Estatus de viaje</a></li>
            <li><a class="dropdown-item" href="../catalogos/documentos.php">Tipo de documentos</a></li>
            <li><a class="dropdown-item" href="../catalogos/depositos.php">Depositos</a></li>



            <li><hr class="dropdown-divider"></li>
            <!--<li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
      

          <!--<li class="nav-item">
            <a href="nueva_solicitud.php" class="nav-link">
              <span class="nav-icon fas fa-clipboard"></span>              
              <p>

                <?php 
                  $sqlsolab = "SELECT COUNT(id_estatus) AS cuantas from solicitud WHERE id_estatus = 1";
                  $sqlsolab = mysqli_query($conexion, $sqlsolab);
                  $resultadosolab = mysqli_fetch_array($sqlsolab);
                  ?>
                Solicitudes 
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo"".$resultadosolab['cuantas']; ?>
                </span>
              </p> 
            </a>
          </li>-->

   
 

          <li class="nav-item">
            <a href="close.php" class="nav-link text-danger">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
    #Sucursales {
    border: 1px solid green;
    min-height: 50px;
}

#Seleccionadas {
    border: 1px solid red;
    min-height: 50px;
}
</style>

<div id="Sucursales">
    <div class="Sucursal">sucursal 1</div>
    <div class="Sucursal">sucursal 2</div>
    <div class="Sucursal">sucursal 3</div>
</div>
<button id="Pasar">Seleccionar</button>

<div id="Seleccionadas">

</div>
<a href="../../close.php" class="nav-link text-danger">
              <span class="nav-icon fas fa-power-off"></span>              
              <p>
                <strong>Salir</strong>
              </p>
            </a>
<script>
    $('#Pasar').on('click', function(){
    $("#Sucursales > div").detach()
                          .appendTo('#Seleccionadas');
});
</script>

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <!-- <strong></strong> All rights reserved. -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

<script src="../dist/js/adminlte.min.js"></script>

</body>

</html>