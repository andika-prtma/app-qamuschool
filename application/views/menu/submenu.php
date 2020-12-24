        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg">
          	<?php if (validation_errors()): ?>
          		<div class="alert alert-danger" role="alert">
          			<?= validation_errors() ?>
          		</div>
          	<?php endif ?>
          	<?= $this->session->flashdata('message')  ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add new submenu</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Menu</th>
				      <th scope="col">url</th>
				      <th scope="col">Icon</th>
				      <th scope="col">Active</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$no = 1;
				  		foreach ($data_sub_menu->result() as $sm): ?>
					    <tr>
					      <th scope="row"><?= $no++ ?></th>
					      <td><?= ucwords($sm->title) ?></td>
					      <td><?= ucwords($sm->menu) ?></td>
					      <td><?= base_url($sm->url) ?></td>
					      <td><?= ucwords($sm->icon) ?></td>
					      <td><?= ucwords($sm->is_active) ?></td>
					      <td>
					      	<a href="<?= base_url('menu/update/'.$sm->ID) ?>" class="badge badge-success">Edit</a>
					      	<a href="<?= base_url('menu/delete/'.$sm->ID.'/2') ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModal">Add new sub menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open() ?>
      <div class="modal-body">
          <div class="form-group">
		    <input type="text" class="form-control" id="title" name="title" placeholder="Title name">
		  </div>
		  <div class="form-group">
		    <select name="id_menu" id="id_menu" class="form-control">
		    	<option value="">Select Menu</option>
		    	<?php foreach ($menu->result() as $mn): ?>
		    		<option value="<?= $mn->ID ?>"><?= ucwords($mn->menu) ?></option>
		    	<?php endforeach ?>
		    </select>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
		  </div>
		  <div class="form-group">
		    <div class="form-check">
			  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
			  <label class="form-check-label" for="is_active" >Is Active</label>
			</div>
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