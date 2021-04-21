<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Mesa de Ayuda">
    <meta name="author" content="Mateo Arroyave, Nilton Henao, Diego Zapata">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/starter-template/">
    <title>PPI62-2 - PHP - 2021-1</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/estilos2.css" rel="stylesheet">
    <style>
     .grid1 {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr) ) ;
    background-color: #fff;
    color: #444;
      }

    .item1 { 
      grid-column: auto / span 3;
      grid-row: auto / span 3;
      background-color: #444;
      color: #fff;      
      padding: 26px;
      align-items:  center;
    }

    .item2 { grid-column: auto / span 2; }
    .item3 { grid-column: auto / span 2; }
    .item4 { grid-column: auto / span 2; }
    .item5 { grid-column: auto / span 2; }
    .item6 { grid-column: auto / span 2; }
    .item7 { grid-column: auto / span 2; } 

    </style>
  </head>

  <body>
      
    
      <div class="container">
        <header>
        <?php include "header.html" ?>
        </header>
        <div class="grid1">
          <div class="item1">
            <iframe width="425" height="350" src="https://www.youtube.com/embed/OlSpSawBNFo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="item2">
            <h4>CRUD Áreas</h4>
            <h5>Guardar, Consultar, Modificar y Borrar Áreas</h5>
            <a class="btn btn-info" href="vista/vistaAreas.php" role="button">Ingresar</a>
          </div>
          <div class="item3">
            <h4>CRUD Empleados</h4>
            <h5>Guardar, Consultar, Modificar y Borrar Empleados</h5>
            <a class="btn btn-info" href="vista/vistaEmpleados.php" role="button">Ingresar</a>
          </div>  
          <div class="item4">
            <h4>CRUD Cargo</h4>
            <h5>Guardar, Consultar, Modificar y Borrar Cargo</h5>
            <a class="btn btn-info" href="vista/vistaCargos.php" role="button">Ingresar</a>
          </div>
          <div class="item5">
            <h4>Formulario Requerimientos</h4>
            <h5>Ingresar un requerimiento</h5>
            <a class="btn btn-info" href="vista/vistaRequerimiento.php" role="button" >Ingresar</a>
          </div>
          <div class="item6">
            <h4>Administración de requerimientos</h4>
            <h5>Asignar, solucionar o cancelar un requerimiento</h5>
            <a class="btn btn-info" href="vista/vistaAdminRequerimientos.php" role="button">Ingresar</a>
          </div>
          <div class="item7">
            
          </div>
        </div>
  
      </div>
    <br>
    <br>
    <br>
    
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-xs-4">
            <h4>Mateo Arroyave Quintero</h4>
            <p>Carnet 17208487</p>
          </div>
          <div class="col-md-2 col-xs-4">
            <h4>Nilton Arley Henao Calle</h4>
            <p>Carnet 17208157</p>
          </div>
          <div class="col-md-2 col-xs-4">
            <h4>Diego Alejandro Zapata Betancur</h4>
            <p>Carnet 17208338</p>
          </div>
          <div class="col-md-6 col-xs-12">
            <p>PPI62-2 - Programación para la web PHP - ITM 2021-1</p>
            <p>Docente Carlos Arturo Castro Castro</p>
          </div>     
        </div>
      </div>
    </footer>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
  </body>
</html>