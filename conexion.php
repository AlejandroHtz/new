<?php
  // $host_name = 'localhost';
  // $database = 'dbs3224323';
  // $user_name = 'root';
  // $password = '';

  // $link = new mysqli($host_name, $user_name, $password, $database);

  // if ($link->connect_error) {
  //   die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
  // } else {
  //   echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
  // }


  if(!session_id()) {//session_cache_limiter('public');
    session_start();  } 
   date_default_timezone_set('America/Mexico_City');
   
   //$srv="db5014342510.hosting-data.io"; $usr="dbu1404338"; $pss="Dec103214*J";
   
   
   //$dbb="dbs11930529";

   $srv="localhost"; $usr="root"; $pss="";
   
   
   $dbb="decoditec";
   
   $id_cliente="1";
   
   $dbbfolios="folios_migra";
   $conexion = mysqli_connect("".$srv, "".$usr, "".$pss);
   mysqli_query($conexion,"SET NAMES 'utf8'");
   mysqli_select_db($conexion,$dbb);

  // if(!session_id()) {//session_cache_limiter('public');
  //   session_start();  } 
  //  date_default_timezone_set('America/Mexico_City');
   
   
  //  //$srv="localost"; $usr="eqgorsa"; $pss="945gcm-s";
  //  $srv="db5003934763.hosting-data.io"; $usr="dbu1493163"; $pss="Pegatinas3000!";
   
   
  //  $dbb="dbs3224323";
   
  //  $id_cliente="1";
   
  //  $dbbfolios="folios_migra";
  //  $conexion = mysqli_connect("".$srv, "".$usr, "".$pss);
  //  mysqli_query($conexion,"SET NAMES 'utf8'");
  //  mysqli_select_db($conexion,$dbb);
   
   
?>