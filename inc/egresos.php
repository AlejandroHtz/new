<?php
require('perfilloader.php');
include("header.php"); 
  
// include("querys/querys_general.php");
$usuario = $_SESSION['nombre'];
$iduser = $_SESSION['id'];
 
echo  $semana; 

?>

<link rel="stylesheet" href="../css/style_tab.css">
<link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>

<body onload="BuscarCobranza();"></body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>Egresos</strong></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card mb-3 ">
      <h5 class="card-header"><strong>Buscar</strong></h5>
      <div class="card-body">



        <div class="row ">
          <div class="form-group col-sm-3">
            <input class="form-control" type="text" name="buscar" id="buscar" onkeyup="BuscarCobranza()">
          </div>

        </div>

      </div>
    </div>


  </section>

  <section class="content">
    <div class="card text-dark bg-light mb-3">
      <!--<h5 class="card-header border-warning mb-2 text-center" ><strong>Solicitudes en proceso</strong></h5>-->
      <div class="card-body">


        <span id="resultado"></span>


      </div>
    </div>

    <style>
      ul.pagination li a {
        margin: 0 2px;
        /* 0 is for top and bottom. Feel free to change it */
      }
    </style>


    <div class="container">
      <ul class="pagination pagination-lg" id="myPager"></ul>
    </div>


    <script>
      function BuscarCobranza() {
        inpTodo = document.getElementById('buscar').value;

        if (inpTodo == '') {
          var inpTodo = 0;

        } else {
          var aux = 0;
        }
        var parametros = {
          "inpTodo": inpTodo,
          "aux": aux
        };
 

        $.ajax({
          data: parametros, //datos que se envian a traves de ajax
          url: 'cobranza/egreso_query.php', //archivo que recibe la peticion
          type: 'post', //método de envio
          beforeSend: function() {
            $("#resultado").html("Procesando, espere por favor...");
          },
          success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
            console.log(response);

          }
        });
      }

      function insCobranza() {

        var datos = $('#formcob').serialize();
        $.ajax({
          type: "POST",
          url: "cobranza/crud_cobranza.php",
          data: datos,
          beforeSend: function() {

          },
          success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

            alert(response);
            if (response === "Insertado") {
              location.reload();
            } else {}
          }
        });

      };

      
function ultimo(){
    var uuid= "ultimo";
    $.ajax({
        data: {
                  
                    'uuid': uuid
                },
            
            url: 'cobranza/crud_cobranza.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {
              
                $("#resultadocontrato").html("Procesando, espere por favor...");
            },
            success: function(responsedos) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              document.getElementById('inputAServicio').value= responsedos;
            }
        });
}

    </script>

  </section>



</div>


<?php require ('footer.php');?>