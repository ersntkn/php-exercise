<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="./assets/images/icons/favicon.ico" alt="Aurora Creation" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Aurora Creation</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./assets/images/icons/favicon.ico" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION["user"]["name"]; ?></a>
      </div>
    </div>
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
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Articles</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Quick Menu</li>
        <li class="nav-item">
          <a href="./functions/logout.php" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
