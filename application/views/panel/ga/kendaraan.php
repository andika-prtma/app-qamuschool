
        <div class="right_col" role="main">
        	<div class="">
	            <div class="page-title">
	            	<div class="title_left">
	                	<h3>SPD</h3>
	            	</div>
	            </div>
	        <div class="clearfix"></div>
	        	<div class="row">
	        		<div class="col-md-12 col-sm-12">
	        			<div class="x_panel">
	        				<div class="x_content">
	        					<div class="col-md-6 col-sm-6">
			        				Filter
			        				<?= form_open() ?>


			        				<?= form_close() ?>
	        					</div>
	        					<div class="col-md-6 col-sm-6" style="text-align: right;">
				        			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#newCar">Tambah kendaraan</button>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	            <div class="row">
              		<div class="col-md-12 col-sm-12 ">
                		<div class="x_panel">
		                	<div class="x_title">
		                    	<h2>List kendaraan</h2>
		                    	<div class="clearfix"></div>
		                  	</div>
		                  	<div class="x_content">
			                	<div class="row">
			                    	<div class="col-sm-12">
			                        	<div class="card-box table-responsive">	
				                            <table id="" class="table table-striped table-bordered" style="width:100%">
				                            	<thead>
				                                	<tr>
				                                  		<th>No</th>
				                                  		<th>Name Mobil</th>
				                                  		<th>Plat Nomor</th>
				                                  		<th>Location</th>
				                                  		<th>Status</th>
				                                  		<th>Action</th>
				                                	</tr>
		                              			<tbody>
				                              	</thead>
		                              				<?php $no = 1; ?>
		                                			<?php foreach ($mobil->result() as $m): ?>
		                                				<tr>
		                                					<td><?= $no ?></td>
		                                					<td><?= ucwords($m->name_mbl) ?></td>
		                                					<td><?= strtoupper($m->nmr_plat) ?></td>
		                                					<td><?= ucwords($m->location) ?></td>
		                                					<td><?= $m->status ?></td>
		                                					<td>
		                                						<a href="" class="badge badge-success">Edit</a>
		                                					</td>
		                                				</tr>
		                                			<?php $no++ ?>
		                                			<?php endforeach ?>
		                              			</tbody>
		                            		</table>
		                            		<center>
		                              			<div class="btn-group btn-group-sm text-center" role="group" aria-label="" style="color: white;">
							                   		<a class="btn btn-secondary" href="#" >1</a>
							                        <a class="btn btn-secondary" href="#" >2</a>
							                        <a class="btn btn-secondary" href="#" >3</a>
							                        <a class="btn btn-secondary" href="#" >4</a>
							                    </div>
						                    </center>
			                          	</div>
			                        </div>
			                    </div>
			                </div>
			           	</div>
               		</div>
              	</div>
            </div>
    	</div>
	</div>

		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="newCar">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Menu</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <?= form_open('ga/addKendaraan') ?>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobil">Nama Mobil<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="mobil" class="form-control" value="" name="name_mobil">
                  </div>
                </div>
                <div class="item form-group">
                	<label class="col-form-label col-md-3 col-sm-3 label-align" for="plat">Plat Nomor<span class="required">*</span>
                	</label>
                	<div class="col-md-6 col-sm-6 ">
                    	<input type="text" id="plat" class="form-control" value="" name="plat">
                	</div>
                </div>
                <div class="item form-group">
                	<label class="col-form-label col-md-3 col-sm-3 label-align" for="location">Location<span class="required">*</span>
                	</label>
                	<div class="col-md-6 col-sm-6 ">
                    	<select id="" class="form-control" name="location">
	                      <?php foreach ($location->result() as $loc): ?>
	                        <option value="<?= $loc->ID ?>"><?= ucwords($loc->location) ?></option>          
	                      <?php endforeach ?>
	                    </select>
                	</div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Active<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="checkbox" value="1" name="active" checked>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <?= form_close() ?>
              </div>

            </div>
          </div>
        </div>