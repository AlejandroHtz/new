<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../conexion.php';

if(!isset($_POST['uuid'])){
echo"01 - No puedes buscar solicitudes asi";

}
else {

  $uuid = $_POST['uuid'];
  if($uuid=="") {
    echo"02 - No puedes buscar solicitudes asi";
  }
  else {

 $querytc =  "SELECT so.id_folio,so.fecha_solicitud,so.descripcion,so.ubicacion_solicitud,so.archivo,
                      so.fecha_cita,so.hora_cita,so.indicaciones,so.id_estatus,
                      so.fecha_ingreso_servicio,so.fecha_salida_servicio,so.hora_ingreso_servicio,so.hora_salida_servicio,
                      cts.tipo,so.cp,so.asentamiento,
                      inv.economico,inv.serie,
                     inv.marca,ces.tipo_estatus_solicitud,
                    inv.submarca,inv.modelo,inv.color,pr.nombre,
                    CONCAT(upv.vialidad,', ' ,upv.numero_interior, ', ' ,upv.numero_exterior, ', ' ,upv.colonia, ', ' ,upv.entidad_federativa , ', ' ,upv.municipio, ', ' ,upv.codigo_postal) as ubicacionfsc,
                    ccpr.encargado,ccpr.telefono
 from solicitud so
 left join cat_tipo_solicitud cts on cts.id_tipo_solicitud = so.id_tipo
 left join cat_estatus_solicitud ces on ces.id_estatus_solicitud = so.id_estatus
 left join proveedor pr on pr.id_proveedor = so.id_proveedor
 left join ubicacion_proveedor upv on upv.id_proveedor = pr.id_proveedor
 left join inventario inv on inv.id = so.id_inventario
 left JOIN contacto_proveedor ccpr on ccpr.id_ubicacion = upv.id_ubicacion

where id_folio = $uuid";
$resultadotc = mysqli_query($conexion, $querytc);
$fila = mysqli_fetch_array($resultadotc);

    
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title></title>
</head>
<body>
  <img src="" alt="">
  <div class="container">
    <div class="row">
      <img src="img/logo_forza.png" alt="" style="max-width: 350px;">
    </div>
    
    <div class="card">
      <h4 class="card-header">Solicitud Folio <?php echo $fila['id_folio']."- ".$fila['tipo_estatus_solicitud'] ?> </h4>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"> 
          <p>Se registro correctamente <strong><?php echo date("d/m/Y H:i:s",strtotime($fila['fecha_solicitud']));?></strong> la solicitud de <strong><?php echo $fila['tipo'];?></strong> para la unidad que se describe a continuacion: </p>
          <ul>  
            <li>Economico: <strong><?php echo $fila['economico'];?></strong></li>
            <li>Serie: <strong><?php echo $fila['serie'];?></strong></li>
            <li>Marca: <strong><?php echo $fila['marca'];?></strong></li>
            <li>Submarca: <strong><?php echo $fila['submarca'];?></strong></li>
            <li>Modelo: <strong><?php echo $fila['modelo'];?></strong></li>
            <li>Color: <strong><?php echo $fila['color'];?></strong></li>
            <li>Descripcion de solicitud: <strong><?php echo $fila['descripcion'];?></strong></li>
            <li>Colonia: <strong><?php echo $fila['cp'].",".$fila['asentamiento'];?></strong></li>
            <li>Ubicacion: <strong><?php echo $fila['ubicacion_solicitud'];?></strong></li>
            <br>
            <?php if($fila['id_estatus'] == '4' || $fila['id_estatus'] == '2' || $fila['id_estatus'] == '3'  ) {?>
            <li>Proveedor: <strong><?php echo $fila['nombre'];?></strong></li>
            <li>Ubicacion proveedor: <strong><?php echo $fila['ubicacionfsc'];?></strong></li>
            <li>Encargado: <strong><?php echo $fila['encargado'];?></strong></li> 
            <li>Telefono: <strong><?php echo $fila['telefono'];?></strong></li>
            <li>Fecha y hora cita: <strong><?php echo date("d/m/Y",strtotime($fila['fecha_cita']))."-".$fila['hora_cita'];?></strong></li>
            <li>Indicaciones: <strong><?php echo $fila['indicaciones'];?></strong></li>
           
              <?php } 
            if($fila['id_estatus'] == '2' || $fila['id_estatus'] == '3' ) { ?>
              <li>Fecha de ingreso al servicio: <strong><?php echo date("d/m/Y",strtotime($fila['fecha_ingreso_servicio']))."-".$fila['hora_ingreso_servicio'];?></strong></li>
              <?php } 
 
              if($fila['id_estatus'] == '3' ) { ?> 
              <li>Fecha salida del servicio: <strong><?php echo date("d/m/Y",strtotime($fila['fecha_salida_servicio']))."-".$fila['hora_salida_servicio'];?></strong></li>
              
              <?php } ?>
 

          </ul>
        </p>
      </div>
    </div>
    <br>
    <div class="row">
      <p style="font-size: 12px;">Este correo electrónico y/o el material adjunto es para uso exclusivo de la persona o la entidad a la que expresamente se le ha enviado, y puede contener información confidencial y/o material privilegiado. El presente y los datos adjuntos al mismo constituyen Secretos Industriales de FORZA ARRENDADORA AUTOMOTRIZ S.A. de C.V., conforme a las disposiciones del articulo 82 de la Ley de Propiedad Industrial. El uso, copia, reproducción o distribución de este mensaje por cualquier persona distinta al destinatario puede constituir un delito conforme a las disposiciones aplicables del articulo 223 de la misma ley. Queda expresamente prohibida cualquier revisión, retransmisión, difusión o cualquier otro uso de este correo, por personas o entidades distintas a las del destinatario legitimo, en caso contrario, FORZA ARRENDADORA AUTOMOTRIZ S.A. DE C.V., podrá tomar laz medidas legales que estime convenientes Si usted no es el destinatario legitimo del mismo, por favor reportelo inmediatamente al remitente del correo y bórrelo. Entre particulares este correo electrónico no pretende ni debe ser considerado como constitutivo de ninguna relación legal contractual o de otra indole similar. <strong><u>EL PRESENTE CORREO NO ADMITE RESPUESTA EL BUZON NO ES REVISADO FAVOR DE CONTACTAR A SU EJECUTIVO DE CUENTA</u></strong></p>
    </div>
  </div>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<?php

  }//error 02
}//error 01

?>