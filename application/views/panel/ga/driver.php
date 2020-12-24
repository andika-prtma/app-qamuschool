
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
				        			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#newDriver">Tambah Driver</button>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	            <div class="row">
              		<div class="col-md-12 col-sm-12 ">
                		<div class="x_panel">
		                	<div class="x_title">
		                    	<h2>List Driver</h2>
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
				                                  		<th>Name Driver</th>
				                                  		<th>Contact</th>
				                                  		<th>Status</th>
				                                  		<th>Action</th>
				                                	</tr>
				                              	</thead>
		                              			<tbody>
		                              				<?php $no = 1; ?>
		                                			<?php foreach ($driver->result() as $d): ?>
		                                				<tr>
		                                					<td><?= $no ?></td>
		                                					<td><?= ucwords($d->name) ?></td>
		                                					<td><?= $d->contact ?></td>
		                                					<td><?= $d->status ?></td>
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

		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="newDriver">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Menu</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <?= form_open('ga/addDriver') ?>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="driver">Name Driver<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="driver" class="form-control" value="" name="name_driver">
                  </div>
                </div>
                <div class="item form-group">
                	<label class="col-form-label col-md-3 col-sm-3 label-align" for="contact">Contact<span class="required">*</span>
                	</label>
                	<div class="col-md-6 col-sm-6 ">
                    	<input type="text" id="contact" class="form-control" value="" name="contact">
                	</div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Active<span class="required">*</span>
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