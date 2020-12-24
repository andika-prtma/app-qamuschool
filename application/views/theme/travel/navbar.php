  <!-- Navigation -->
  <div class="logo">
    <i class="fas fa-book-open" aria-hidden="true"><span>Qamuschool</span></i>
    <!-- <img src="<?= base_url('assets/img/logo/') ?>qamuschool-transparant.png"> -->
  </div>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light justify-content-between">
  <img style="" class="navbar-brand" width="15%" src="<?= base_url('assets/img/logo/') ?>qamuschool-transparant2.png">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse dropdown" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <!-- Program -->
      <?php foreach ($navbar->result() as $nv): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= ucwords($nv->name) ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php $subnavbar = $this->db->get_where("tbl_content_navbar_sub", ['id_navbar' => $nv->ID]) ?>
          <?php foreach ($subnavbar->result() as $sn): ?>
          <a class="dropdown-item" href="<?= base_url().$sn->link ?>"><?= $sn->name ?></a>
          <?php endforeach ?>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</nav>
