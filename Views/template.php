<?php
/*===================================
=            Capturar dominio        =
===================================*/

$path = TemplateController::path();
// echo '<pre>';print_r($path);echo '</pre>';

/*===================================
=            Capturar rutas de la URL =
===================================*/

$ruta = $_SERVER['REQUEST_URI'];
// echo '<pre>';print_r($ruta);echo '</pre>';

$arrayRutas = explode("/", $ruta);
array_shift($arrayRutas);

// echo '<pre>';print_r($arrayRutas);echo '</pre>';

foreach ($arrayRutas as $key => $value) {
    $arrayRutas[$key] = explode("?", $value)[0];
}

echo '<pre>';print_r($arrayRutas);echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation + Sidebar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" 
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
          crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=$path?>Views/sources/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- jdSlider -->
    <link rel="stylesheet" href="<?=$path?>Views/sources/plugins/jdSlider/jdSlider.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?=$path?>Views/sources/adminlte/dist/css/adminlte.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?=$path?>Views/sources/css/estilo.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <?php
        include "Views/modules/top.php";
        include "Views/modules/navbar.php";

        if (isset($_SESSION['admin'])) {
            include "Views/modules/aside.php";
        }

        if ($arrayRutas[0] == "admin") {
            include "pages/" . $arrayRutas[0] . "/" . $arrayRutas[0] . ".php";
        } else {
            include "Views/pages/home/home.php";
        }

        // include "Views/modules/sidebar-control.php";
        include "Views/modules/footer.php";
        include "Views/modules/modals.php";
        ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="Views/sources/adminlte/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="Views/sources/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- jdSlider -->
    <script src="<?=$path?>Views/sources/plugins/jdSlider/jdSlider.js"></script>

    <!-- AdminLTE App -->
    <script src="<?=$path?>Views/sources/adminlte/dist/js/adminlte.min.js"></script>

    <!-- Scripts propios -->
    <script src="<?=$path?>Views/sources/js/slide.js"></script>
    <script src="<?=$path?>Views/sources/js/products.js"></script>

</body>
</html>
