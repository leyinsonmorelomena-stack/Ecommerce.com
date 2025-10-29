<style>
#password-requisitos li {
  margin-bottom: 4px;
  color: #dc3545;
  font-size: 0.9rem;
}

.progress {
  height: 8px;
  border-radius: 5px;
}

#password-strength-text {
  transition: color 0.3s ease;
}
</style>

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
          <div class="alert alert-primary text-center md-3" role="alert">'.$mensaje.'</div>
          
              <script>
                  formatearCamposFomulario();
                  sweetAlert("Atención","'.$mensaje.'","primary");
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

          <ul id="password-requisitos" class="list-unstyled small mt-2">
            <li>❌ Mínimo 8 caracteres</li>
            <li>❌ Mínimo 1 mayúscula</li>
            <li>❌ Mínimo 1 minúscula</li>
            <li>❌ Mínimo 1 número</li>
            <li>❌ Mínimo 1 carácter especial (@#!-*)</li>
          </ul>

          <div class="progress mt-2" style="height: 8px;">
            <div id="password-strength-bar" class="progress-bar bg-danger" style="width: 0%;"></div>
          </div>
          <div id="password-strength-text" class="small mt-1 fw-bold">Débil</div>
          <br>


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