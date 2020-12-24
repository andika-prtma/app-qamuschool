        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
          	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
          	<?= $this->session->flashdata('message')  ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add new menu</a>
          		<table class="table table-hover">
      				  <thead>
      				    <tr>
      				      <th scope="col">#</th>
      				      <th scope="col">Menu</th>
      				      <th scope="col">Action</th>
      				    </tr>
      				  </thead>
      				  <tbody>
      				  	<?php 
      				  		$no = 1;
      				  		foreach ($data_menu->result() as $dm): ?>
      					    <tr>
      					      <th scope="row"><?= $no++ ?></th>
      					      <td><?= ucwords($dm->menu) ?></td>
      					      <td>
                        <button onclick="tes(this)" id="<?= $dm->ID?>" class="badge badge-success">Edit</button>
      					      	<a href="<?= base_url('menu/delete/'.$dm->ID.'/1') ?>" class="badge badge-danger">Delete</a>
      					      </td>
      					    </tr>
      				  	<?php endforeach ?>
      				  </tbody>
      				</table>
          	</div>

            <div class="col-lg-6">
              <div id="dicoba">
                
              </div>
            </div>

          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

     <!-- modal -->
     <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModal">Add new menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open() ?>
      <div class="modal-body">
          <div class="form-group">
		    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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