<?php   $this->load->model("auth_model"); 
        $menu = $this->auth_model->getMenu($this->session->userdata('id_role'))->result();
?>

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider">
      

      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m): ?>
        <div class="sidebar-heading">
          <?= $m->menu ?>
        </div>
      <?php $submenu = $this->auth_model->getSubMenu($m->ID)->result() ?>
        <?php foreach ($submenu as $sm): ?>
            <li class="nav-item <?= $title == ucwords($sm->title) ? 'active' : '' ?>">
              <a class="nav-link pb-0" href="<?= base_url($sm->url) ?>">
                <i class="<?= $sm->icon ?>"></i>
                <span><?= ucwords($sm->title) ?></span></a>
            </li>    
        <?php endforeach ?>
            <hr class="sidebar-divider mt-3">
      <?php endforeach ?>
      


      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
          <i class="fas fa-user fa-fw"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    