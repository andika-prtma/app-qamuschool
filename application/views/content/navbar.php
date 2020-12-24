        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
            	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
            	<?= $this->session->flashdata('message')  ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newNavbar">Add new navbar</a>
          		<a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newSubNavbar">Add new sub navbar</a>
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
      				  		foreach ($navbar->result() as $nv): ?>
      					    <tr>
      					      <th scope="row"><?= $no++ ?></th>
      					      <td><?= ucwords($nv->name) ?></td>
                      <td>
                        <button onclick="show_subnavbar(<?= $nv->ID ?>)" class="btn btn-secondary">
                          Detail
                        </button>
                      </td>
      					    </tr>
      				  	<?php endforeach ?>
      				  </tbody>
      				</table>
          	</div>

            <div class="col-lg-6" id="sub_navbar">
              
            </div>
          </div>
        </div>
        <!-- container-fluid -->
      </div>
      <!-- End of Main Content -->

<!-- Modal tambah navbar -->
<div class="modal fade" id="newNavbar" tabindex="-1" role="dialog" aria-labelledby="newNavbar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newNavbar">Add navbar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('content/tambahNavbar') ?>
      <div class="modal-body">
          <div class="form-group">
		    <input type="text" class="form-control" id="name" name="name" placeholder="Name Navbar">
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

<!-- Modal tambah sub navbar -->
<div class="modal fade" id="newSubNavbar" tabindex="-1" role="dialog" aria-labelledby="newSubNavbar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubNavbar">Add navbar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('content/tambahSubNavbar') ?>
      <div class="modal-body">
          <div class="form-group">
		    <input type="text" class="form-control" id="name" name="name" placeholder="Name Sub Navbar">
		  </div>
		  <div class="form-group">
		    <select name="id_navbar" id="id_navbar" class="form-control">
		    	<option value="">Select Navbar</option>
		    	<?php foreach ($navbar->result() as $nv): ?>
		    		<option value="<?= $nv->ID ?>"><?= ucwords($nv->name) ?></option>
		    	<?php endforeach ?>
		    </select>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="link" name="link" placeholder="Link">
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