        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
          	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
          	<?= $this->session->flashdata('message')  ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRole">Add new role</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Role</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$no = 1;
				  		foreach ($role->result() as $r): ?>
					    <tr>
					      <th scope="row"><?= $no++ ?></th>
					      <td><?= ucwords($r->role) ?></td>
					      <td>
					      	<a href="<?= base_url('admin/roleAccess/'.$r->ID) ?>" class="badge badge-warning">Access</a>
                  <a href="<?= base_url('menu/update/'.$r->ID) ?>" class="badge badge-success">Edit</a>
					      	<a href="<?= base_url('menu/delete/'.$r->ID.'/1') ?>" class="badge badge-danger">Delete</a>
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

     <!-- modal -->
     <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="newRole" tabindex="-1" role="dialog" aria-labelledby="newRole" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRole">Add new role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('admin/addRole') ?>
      <div class="modal-body">
          <div class="form-group">
		    <input type="text" class="form-control" id="roleName" name="roleName" placeholder="Role name">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>