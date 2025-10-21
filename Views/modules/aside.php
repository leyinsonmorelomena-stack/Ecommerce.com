<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="Views/sources/adminlte/index3.html" class="brand-link">
    <img src="<?=$path?>Views/sources/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=$path?>Views/sources/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-capitalize" ><?= $_SESSION['admin_nombre'];?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar"  type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" 
          data-widget="treeview" 
          role="menu" 
          data-accordion="false">

          <!-- Administradores -->
        <li class="nav-item">
          <a href="/admin/administradores" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "administradores"):?> active <?php endif ?>">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>
              Administradores
            </p>
          </a>

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "dashboard"):?> active <?php endif ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Dashboard
            </p>
          </a>

        <!-- Productos -->
        <li class="nav-item">
          <a href="/admin/productos" class="nav-link <?php if(!empty($arrayRutas[1]) && in_array($arrayRutas[1],['categorias','subcategorias','inventario','mensajes'])):?> menu-open <?php endif ?>">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Productos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/categorias" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "categorias"):?> active <?php endif ?>">
                <i class="fas fa-tags nav-icon"></i>
                <p>Categorías</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/subcategorias" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "subcategorias"):?> active <?php endif ?>">
                <i class="fas fa-tag nav-icon"></i>
                <p>Subcategorías</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/inventario" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "inventario"):?> active <?php endif ?>">
                <i class="fas fa-warehouse nav-icon"></i>
                <p>Inventario</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/mensajes" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "mensajes"):?> active <?php endif ?>">
                <i class="fas fa-envelope nav-icon"></i>
                <p>Mensajes</p>
              </a>
            </li>
          </ul>
        </li>

         <!-- Ventas -->
        <li class="nav-item">
          <a href="/admin/ventas" class="nav-link <?php if(!empty($arrayRutas[1]) && in_array($arrayRutas[1],['pedidos','informes','disputas'])):?> menu-open <?php endif ?>">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/pedidos" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "pedidos"):?> active <?php endif ?>">
                <i class="fas fa-receipt nav-icon"></i>
                <p>Pedidos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/informes" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "informes"):?> active <?php endif ?>">
                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                <p>Informes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/disputas" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "disputas"):?> active <?php endif ?>">
                <i class="fas fa-exclamation-triangle nav-icon"></i>
                <p>Disputas</p>
              </a>
            </li>
          </ul>
        </li>

         <!-- Clientes -->
        <li class="nav-item">
          <a href="/admin/clientes" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Clientes
            </p>
          </a>

        <!-- Widgets -->
        <li class="nav-item">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        <!-- Cerrar sesión -->
        <li class="nav-item">
          <a href="/salir" class="nav-link bg-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Cerrar Sesión</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->

</aside>
