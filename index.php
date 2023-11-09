<?php
 $_SERVER['REMOTE_ADDR'];
$alert='';
session_start();

if (!empty($_SESSION['active'])) {
  header('location: inc/dashboard.php');   
}else{
 
  if (!empty($_POST)) {
    if (empty($_POST['usuario'])||empty($_POST['clave'])) {
      $alert='Ingrese su correo y contraseña';
    }else{ 
      require ('conexion.php'); 
      $email=$_POST['usuario'];
      $pass=$_POST['clave'];

      $query= mysqli_query ($conexion, "SELECT * FROM users where email = '$email' and password= PASSWORD ('$pass')" );
      $result= mysqli_num_rows($query);
      if ($result > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['active']= true;
        $_SESSION['id']=$data['id'];
        $_SESSION['nombre']=$data['nombre']; 
        $_SESSION['email']=$data['email'];
        $_SESSION['perfil']=$data['perfil'];
        
        $querybitacora= mysqli_query ($conexion, "INSERT INTO bitacora (usuario,fechainicio,horainicio) values ('$email',current_date,current_time)" );

        if($_SESSION['perfil'] >1 ){
          header('location: inc/cobranza.php');
      }else { header('location: inc/dashboard.php');}

       


      }else{
        $alert='El usuario o la contraseña son incorrectos';
        session_destroy();
      }
    }
  }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Decoditec</title>
  <link rel="icon" type="image/png" href="inc/img/favicon.png"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <link rel="stylesheet" href="inc/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="inc/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="inc/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="login-page" cz-shortcut-listen="true">
  <div class="login-box">

    <div class="card card-outline card-primary">
      <div class="card-header text-center" >
        <img src="inc/dist/img/logo.png" alt="Decoditec" style="height: 100%; width:100%">
      </div>
      <div class="card-body">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <form class="form-signin" action="" method="post"> 
          <div class="input-group mb-3">
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="alert"><?php echo isset($alert)? $alert : '';  ?></div>
<!-- <div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="remember">
<label for="remember">
Remember Me
</label>
</div>
</div> -->

<div class="col-12">
  <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
</div>

</div>
</form>
<!-- <div class="social-auth-links text-center mt-2 mb-3">
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
</a>
</div> -->

<!-- <p class="mb-1">
<a href="forgot-password.html">I forgot my password</a>
</p>
<p class="mb-0">
<a href="register.html" class="text-center">Register a new membership</a>
</p> -->
</div>

</div>

</div>


<script src="inc/plugins/jquery/jquery.min.js"></script>

<script src="inc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="inc/dist/js/adminlte.min.js?v=3.2.0"></script>


</body>  
</body>

</html>