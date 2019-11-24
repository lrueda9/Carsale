<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['rol']==1) {
    }else{
      require('modelo/Login/redirigir.php');
    }
  }else {
    header('Location: ?action=inicio');
    exit;
  }

  $now = time();
  if($now > $_SESSION['expire']) {
    session_unset();
    session_destroy();
    echo"<script type=\"text/javascript\">alert('Su sesion a terminado'); window.location='?action=inicio';</script>";
    exit;
  }
?>
<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- Start Page Loading -->
<?php include 'views/Dashboard/Loading.php';?>
<!-- End Page Loading -->

<!-- START HEADER -->
<?php include 'views/Dashboard/Header.php';?>
<!-- END HEADER -->

<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">
    <!-- START LEFT SIDEBAR NAV-->
    <?php include 'views/Dashboard/AsideLateral.php';?>
    <!-- END LEFT SIDEBAR NAV-->
    <!-- START CONTENT -->
    <section id="content" class="white">
      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Ciudades</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li id="white" class="active">Ciudades</li>
                <li><a href="?action=Form_Ciudad_Insertar" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-content-add"></i></a></li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->
      
      <!--start container-->
      <div class="container">
        <div class="section container">
          <div class="divider"></div>
          <!--Input fields-->
          <div id="input-fields">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Detalle</th>
                  <th>Departamento</th>
                  <th>Pais</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Detalle</th>
                  <th>Departamento</th>
                  <th>Pais</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelCiudad->Listar() as $r): ?>
                  <tr>
                    <td><?php echo $r->__GET('id'); ?></td>
                    <td><?php echo $r->__GET('det'); ?></td>
                    <td><?php echo $r->__GET('depto'); ?></td>
                    <td><?php echo $r->__GET('pais'); ?></td>
                    <td>
                    	<form action="?action=Form_Ciudad_Actualizar" method="post">
	                        <input type="hidden" name="id" value="<?php echo $r->id; ?>">
	                        <input type="hidden" name="det" value="<?php echo $r->det; ?>">
                          	<input type="hidden" name="depto" value="<?php echo $r->depto; ?>">
	                        <button type="submit" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-editor-mode-edit"></i></button>
                      	</form>
                    </td>
                    <td>
                    <form action="?action=<?php echo 'Ciudad_eliminar'; ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $r->id; ?>"/>
                      <button type="submit" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-action-delete"></i></button>
                    </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section><!-- END CONTENT -->
  </div><!-- END WRAPPER -->
</div><!-- END MAIN -->

<!-- START FOOTER -->
<?php include 'views/Dashboard/Footer.php';?>
<!-- END FOOTER -->

<!-- ================================================
  Scripts
================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="estilos/dashboard/js/jquery-1.11.2.min.js"></script>    

<!--materialize js-->
<script type="text/javascript" src="estilos/dashboard/js/materialize.js"></script>
    
<!--prism-->
<script type="text/javascript" src="estilos/dashboard/js/prism.js"></script>

<!--scrollbar-->
<script type="text/javascript" src="estilos/dashboard/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- data-tables -->
<script type="text/javascript" src="estilos/dashboard/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="estilos/dashboard/js/plugins/data-tables/data-tables-script.js"></script>

<!-- chartist -->
<script type="text/javascript" src="estilos/dashboard/js/plugins/chartist-js/chartist.min.js"></script>   
    
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>