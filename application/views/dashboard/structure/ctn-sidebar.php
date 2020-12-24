<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="<?= base_url() ?>" class="simple-text logo-normal">
          Qamuschool
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item" hidden>
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/profile') ?>">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/prediction-test') ?>">
              <i class="material-icons">content_paste</i>
              <p>Toefl Prediction</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="<?= base_url('logout') ?>">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
</div>