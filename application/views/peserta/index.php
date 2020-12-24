        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-12">
          	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
          	<?= $this->session->flashdata('message')  ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add new menu</a>
          		<div class="table-responsive">
                <table class="table table-hover" id="example">
				  <thead>
				    <tr>
				      <th scope="col-md-2">No</th>
				      <th scope="col">Code</th>
				      <th scope="col">Email</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Score</th>
              <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$no = 1;
				  		foreach ($peserta->result() as $ps): ?>
					    <tr>
    					    <th scope="row" width="2%"><?= $no++ ?></th>
    					    <td width="5%"><?= strtoupper($ps->kode) ?></td>
    					    <td width="15%"><?= strtolower($ps->email) ?></td>
                            <td width="15%"><?= ucwords(strtolower($ps->first_name)) ?></td>
                            <td width="15%"><?= ucwords(strtolower($ps->last_name)) ?></td>
                            <td width="5%"><?= $ps->hasil_akhir ?></td>
                            <td>
                              <a href="<?= base_url('peserta/detail/'). $ps->id_user ?>" class="badge badge-success">Detail</a>
            					      </td>
					    </tr>
				  	<?php endforeach ?>
				  </tbody>
				</table>
              </div>
          	</div>
          </div>
        </div>
      </div>