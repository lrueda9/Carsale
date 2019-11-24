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

  if($_REQUEST['id']==null){
      header('Location: ?action=Marca');
  }
?>

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

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
    <section id="content" >
      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Actualizar Marca</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Marca">Marcas</a></li>
                <li id="white" class="active">Actualizar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->


      <div id="login-page" align="center">
        <br>
        <div class="col s12" >
          
          <form class="login-form" action="?action=<?php echo 'Marca_actualizar'; ?>" method="post" id="oscurecer">
           
            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="id" value="<?php echo $_REQUEST['id']; ?>" readonly/>
                  <label for="id">Id</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="det" value="<?php echo $_REQUEST['det']; ?>" maxlength="45" required/>
                  <label for="det">Detalle</label>
              </div>
            </div>

            <div class="row margin">

              <div class="input-field col s12">
                 <button type="submit" class="waves-effect waves-light btn col s12 cyan">Actualizar</button>
              </div>
            </div>

            <br>
          </form>
          <br>
        </div>
      </div>
  </div><!-- END WRAPPER -->
</div><!-- END MAIN -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

<!-- chartist -->
<script type="text/javascript" src="estilos/dashboard/js/plugins/chartist-js/chartist.min.js"></script>   
    
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>

<script type="text/javascript">
  var singleValues = $( "#single" ).val();
  $(document).ready(function() {
    $('select').material_select();
  });
</script>