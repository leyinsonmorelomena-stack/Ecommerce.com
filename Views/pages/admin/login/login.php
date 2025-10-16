<div class="login-page" style="min-height: 466px;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Administradores</b></a>
    </div>
    <div class="card-body">

      <?php
        require_once "Controllers/AdminsController.php";
        $controller = new AdminsController();
        $mensaje = $controller->login();

        //mostrar mensaje de error si existe
        if(!empty($mensaje)){
          echo '
          <div class="alert alert-warning text-center md-3" role="alert">'.$mensaje.'</div>
          
              <script>
                  formatearCamposFomulario();
                  sweetAlert("Atención","'.$mensaje.'","warning");
              </script>
          ';
        }

      ?>


      <form method="post" class="needs-validation" novalidate>
        <!-- Campo email -->
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="emailAdmin" onchange="validarJs(event, 'email')" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

          <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Campo inválido.</div>
          </div>

           <!-- Campo password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="passwordAdmin" onchange="validarJs(event, 'password')" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

          <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Campo inválido.</div>
          </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" onchange="recordarEmail(event)">
              <label for="remember">
                Recordar Usuario
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
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
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Recuperar Contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Registrarse</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


</div>