<?php   
        $this->load->model("superadmin_model");        
        $arr = $this->db->get_where('tbl_user_access_menu', ['id_role'=> $this->session->userdata('id_role')])->row();
        $arr = json_decode($arr->id_menu);
?>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url() ?>" class="site_title"><i class="fa fa-compass"></i> <span>Qamuschool</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic" style="border: none;">
                <img src="<?= base_url('assets/img/profile/') ?>default.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= ucwords($this->session->userdata('username')) ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php foreach ($arr as $m): ?>
              <div class="menu_section" style="margin-bottom: 10px">
                <?php $submenu = $this->superadmin_model->getSubMenu($m)->result() ?>
                <?php $menu = $this->db->get_where('tbl_user_menu', ['ID' => $m])->row() ?>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i><?= ucwords($menu->menu) ?><span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php foreach ($submenu as $sm): ?>
                      <li><a href="<?= base_url().$sm->link ?>"><?= ucwords($sm->title) ?></a></li>
                      <?php endforeach ?>
                    </ul>
                  </li>
                </ul>
              </div>
              <?php endforeach ?>
            </div>
            <!-- /sidebar menu -->            
          </div>
        </div>