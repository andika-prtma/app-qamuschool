        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
          	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
          	<?= $this->session->flashdata('message')  ?>
            <h5>Role: <?= $role->role ?></h5>
        <table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Menu</th>
				      <th scope="col">Access</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$no = 1;
				  		foreach ($menu->result() as $m): ?>
					    <tr>
					      <th scope="row"><?= $no++ ?></th>
					      <td><?= ucwords($m->menu) ?></td>
					      <td>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?= check_access($role->ID, $m->ID) ?> data-role="<?= $role->ID ?>" data-menu="<?= $m->ID ?>">
                  </div>
					      </td>
					    </tr>
				  	<?php endforeach ?>
				  </tbody>
				</table>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->