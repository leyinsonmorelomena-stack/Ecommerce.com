<style>
/* =========================================================
   SIDEBAR PROFESIONAL - DANLEY TECHNOLOGY
   Combinado con interfaz blanca y azul corporativo
   ========================================================= */

:root {
  --primary-blue: #007bff;
  --hover-blue: #0d6efd;
  --sidebar-bg: #f8f9fa;
  --sidebar-border: #e9ecef;
  --text-dark: #212529;
  --text-muted: #6c757d;
  --radius: 10px;
  --font: "Poppins", "Segoe UI", sans-serif;
}

/* ----- SIDEBAR PRINCIPAL ----- */
.main-sidebar {
  background-color: var(--sidebar-bg);
  color: var(--text-dark);
  border-right: 1px solid var(--sidebar-border);
  font-family: var(--font);
  transition: var(--transition);
}

/* ----- LOGO ----- */
.brand-link {
  background: var(--sidebar-bg);
  padding: 1.5rem 0.5rem;
  border-bottom: 1px solid var(--sidebar-border);
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
}

.brand-link img {
  width: 75px;
  height: 75px;
  border-radius: 50%;
  margin-bottom: 10px;
  transition: var(--transition);
}

.brand-link img:hover {
  transform: scale(1.05);
}

.brand-text {
  color: var(--text-dark);
  text-align: center;
  font-weight: 600;
  font-size: 1.1rem;
  letter-spacing: 0.5px;
}

.brand-text strong {
  color: var(--primary-blue);
}

/* ----- PANEL DE USUARIO ----- */
.user-panel {
  padding: 0.7rem 1rem;
  border: 1px solid var(--sidebar-border);
  transition: var(--transition);
}

.user-panel:hover {
  background-color: #f1f3f5;
}

.user-panel .image img {
  border-radius: 50%;
  width: 40px;
  height: 40px;
  margin-right: 10px;
}

.user-panel .info a {
  color: var(--text-dark);
  font-weight: 500;
  
}

.user-panel .info a:hover {
  color: var(--primary-blue);
}

/* ----- BUSCADOR ----- */
.form-control-sidebar {
  background-color: #ffffff;
  border: 1px solid var(--sidebar-border);
  border-radius: var(--radius);
  color: var(--text-dark);
}

.form-control-sidebar::placeholder {
  color: var(--text-muted);
}

.btn-sidebar {
  background-color: var(--primary-blue);
  color: white;
  border-radius: 0 var(--radius) var(--radius) 0;
  transition: var(--transition);
}

.btn-sidebar:hover {
  background-color: var(--hover-blue);
}

/* ----- MENÚ PRINCIPAL ----- */
.nav-sidebar > .nav-item > .nav-link {
  color: var(--text-dark);
  border-radius: var(--radius);
  margin: 4px 10px;
  font-weight: 500;
  display: flex;
  align-items: center;
}

.nav-sidebar > .nav-item > .nav-link i {
  margin-right: 10px;
  color: var(--primary-blue);
}

.nav-sidebar > .nav-item > .nav-link:hover {
  background-color: rgba(0, 123, 255, 0.08);
  color: var(--primary-blue);
}

.nav-sidebar > .nav-item > .nav-link.active {
  background-color: var(--primary-blue);
  color: white;
  font-weight: 600;
  box-shadow: 0 2px 6px rgba(13, 13, 14, 0.25);
}

.nav-sidebar > .nav-item > .nav-link.active i {
  color: white;
}

/* ----- SUBMENÚS ----- */
.nav-treeview {
  margin-left: 15px;
  border-left: 2px solid var(--sidebar-border);
  padding-left: 10px;
}

.nav-treeview .nav-item .nav-link {
  color: var(--text-muted);
  font-size: 0.9rem;
}

.nav-treeview .nav-item .nav-link:hover {
  color: var(--primary-blue);
}

.nav-treeview .nav-item .nav-link.active {
  color: var(--primary-blue);
  font-weight: 600;
}

/* ----- BADGES ----- */
.badge-primary {
  background-color: var(--primary-blue);
  color: #fff;
  border-radius: 8px;
  font-size: 0.7rem;
  padding: 3px 6px;
}

/* ----- BOTÓN CERRAR SESIÓN ----- */
.nav-link.bg-primary {
  background-color: var(--primary-blue) !important;
  border-radius: var(--radius);
  color: white !important;
  transition: var(--transition);
  text-align: center;
  margin: 10px;
}

.nav-link.bg-primary:hover {
  background-color: var(--hover-blue) !important;
  transform: translateX(2px);
}

/* ----- SCROLLBAR PERSONALIZADO ----- */
.main-sidebar::-webkit-scrollbar {
  width: 6px;
}

.main-sidebar::-webkit-scrollbar-thumb {
  background-color: #cfd8dc;
  border-radius: 5px;
}

.main-sidebar::-webkit-scrollbar-thumb:hover {
  background-color: var(--primary-blue);
}

</style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo -->
  <a href="Views/sources/adminlte/index3.html" class="brand-link text-center d-flex flex-column align-items-center justify-content-center">
    <img src="<?= $path ?>Views/sources/adminlte/dist/img/credit/DANLEYTechnologyLogo.png" 
        alt="DANLEY Technology Logo" 
        class="brand-image img-circle elevation-3 mb-2"
        style="opacity: .9; width:70px; height:70px;">
    <span class="brand-text font-weight-light mt-1">
      DANLEY<br><strong>Technology</strong>
    </span>
  </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$path?>views/sources/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize"><?= $_SESSION['admin_nombre'] ;?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Administradores -->
          <li class="nav-item">
            <a href="/admin/administradores" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "administradores"):?> active <?php endif ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Administradores
              </p>
            </a>
          </li>

          <!-- Dashboard -->
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link <?php if(empty($arrayRutas[1]) || !empty($arrayRutas[1]) && $arrayRutas[1] === "dashboard"):?> active <?php endif ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Productos -->
          <li class="nav-item <?php if(!empty($arrayRutas[1]) && in_array($arrayRutas[1],['categorias','subcategorias','inventario','mensajes'])):?> menu-open <?php endif ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
                <span class="right badge badge-primary">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/categorias" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "categorias"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/subcategorias" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "subcategorias"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subcategorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/inventario" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "inventario"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/mensajes" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "mensajes"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Mensajes
                    <span class="right badge badge-primary">3</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Ventas -->
          <li class="nav-item <?php if(!empty($arrayRutas[1]) && in_array($arrayRutas[1],['pedidos','informes','disputas'])):?> menu-open <?php endif ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-funnel-dollar"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
                <span class="right badge badge-primary">8</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/pedidos" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "pedidos"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pedidos
                    <span class="right badge badge-primary">5</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/informes" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "informes"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/disputas" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "disputas"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Disputas
                    <span class="right badge badge-primary">3</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Cerrar Sesión -->
          <li class="nav-item">
            <a href="/salir" class="nav-link bg-primary">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>