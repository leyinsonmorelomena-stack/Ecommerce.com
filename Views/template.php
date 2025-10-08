
<?php
  $path = TemplateController::path();

  // echo '<pre>';print_r($path);echo '</pre>';
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation + Sidebar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/sources/adminlte/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="Views\sources\plugins\jdSlider\jdSlider.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="views/sources/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="views/sources/css/estilo.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

<?php
  include "views/modules/top.php";
  include "views/modules/navbar.php";
  include "views/modules/aside.php";
  // include "views/modules/control-sidebar.php";
  include "views/pages/home/home.php";
  include "views/modules/footer.php";
  include "views/modules/modals.php";
  
  ?>

  

 

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="views/sources/adminlte/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="views/sources/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- bootstrap 5 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

 <script src="Views\sources\plugins\jdSlider\jdSlider.js"></script>

<!-- AdminLTE App -->
<script src="views/sources/adminlte/dist/js/adminlte.min.js"></script>

<!-- Slider -->
<script src="Views\sources\js\slide.js"></script>

</body>
</html>
