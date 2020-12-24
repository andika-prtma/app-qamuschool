
        <div class="right_col" role="main">
        	<div class="">
	            <div class="page-title">
	            	<div class="title_left">
	                	<h3>SPD</h3>
	            	</div>
	            </div>
	            <div class="clearfix"></div>
	            <div class="row">
              		<div class="col-md-12 col-sm-12 ">
                		<div class="x_panel">
		                	<div class="x_title">
		                    	<h2>Create New SPD</h2>
		                    	<div class="clearfix"></div>
		                  	</div>
		                  	<div class="x_content">
		                    <br>
		                   		<?= form_open_multipart('spd/proses_create', 'class="form-horizontal form-label-left" id="demo-form2"') ?>
			                    	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Date<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input type="text" id="create" class="form-control" value="<?= date('d-m-Y') ?>" name="create">
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align" for="reqby">Request By<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input type="text" id="reqby" name="reqby" required="required" class="form-control">
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label for="reqfor" class="col-form-label col-md-3 col-sm-3 label-align">Request for</label>
			                        	<div class="col-md-6 col-sm-6">
			                        		<select class="js-example-basic-single form-control js-example-responsive">
			                        				<option value="0">Pilih user</option>
			                        			<?php foreach ($users as $u): ?>
			                        				<option><?= $u->first_name.' '.$u->last_name.' | '. $u->username?></option>
			                        			<?php endforeach ?>
			                        		</select>
			                        	</div>
			                      	</div>

									<!-- start maps -->
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Pickups<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input id="pickup" name="pickup" placeholder="Masukan Alamat.." type="text" class="form-control" />
			                        	</div>
			                      	</div>

			                      	<div class="item form-group hidden" hidden>
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Latitude<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6">
			                          		<input type="text" name="lat1" id='lat1'class="form-control" >
			                        	</div>
			                      	</div>

			                      	<div class="item form-group hidden" hidden>
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Longitude<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input type="text" name="lng1" id='lng1' class="form-control">
			                        	</div>
			                      	</div>
									<!-- end maps -->

									<!-- start maps -->
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Destination<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input id="destination" name="destination" placeholder="Masukan Alamat.." type="text" class="form-control" />
			                        	</div>
			                      	</div>

			                      	<div class="item form-group" hidden>
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Latitude<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6">
			                          		<input type="text" name="lat2" id='lat2'class="form-control" >
			                        	</div>
			                      	</div>

			                      	<div class="item form-group" hidden>
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Longitude<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input type="text" name="lng2" id='lng2' class="form-control">
			                        	</div>
			                      	</div>
									<!-- end maps -->
									
									<!-- hidden value -->
									<input type="hidden" name="tempo1" id="tempo1">
									<input type="hidden" name="tempo2" id="tempo2">
			                      	<!-- hidden value -->
			                      	
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Distance (Km)<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input id="jarak" class="date-picker form-control" required="required" type="text" name="jarak">
			                        	</div>
			                      	</div>

			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Agenda<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<textarea id="message" required="required" class="form-control" name="agenda"></textarea>
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Departure Date<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-2 col-sm-2 ">
					                        <div class="input-group date" id="">
					                            <input type="" name="timedeparture" id="timedeparture" class="form-control">
					                        </div>
			                      		</div>
			                      		<div class="col-md-2 col-sm-2">
				                            <select class="form-control" name="mobil_pickup">
				                            	<option>Choose Vehicle</option>
				                            	<?php foreach ($mobil->result() as $mbl): ?>
				                            		<option value="<?= $mbl->ID ?>"><?= $mbl->name_mbl.' | '.$mbl->nmr_plat.' | '.$mbl->location ?></option>
				                            	<?php endforeach ?>
				                            </select>
			                      		</div>
			                      		<div class="col-md-2 col-sm-2">
					                        <select class="form-control" name="driver_pickup">
				                            	<option>Choose Driver</option>
				                            	<?php foreach ($driver->result() as $dr): ?>
				                            		<option value="<?= $dr->ID ?>" ><?= $dr->name ?></option>
				                            	<?php endforeach ?>
				                            </select>
			                      		</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Expected Date<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-2 col-sm-2">
					                        <div class="input-group date" id="">
					                            <input type="" name="expectdate" id="timeback" class="form-control">
					                        </div>
			                      		</div>
			                      		<div class="col-md-2 col-sm-2">
				                            <select class="form-control" name="mobil_destination">
				                            	<option>Choose Vehicle</option>
				                            	<?php foreach ($mobil->result() as $mbl): ?>
				                            		<option value="<?= $mbl->ID ?>"><?= $mbl->name_mbl.' | '.$mbl->nmr_plat.' | '.$mbl->location ?></option>
				                            	<?php endforeach ?>
				                            </select>
			                      		</div>
			                      		<div class="col-md-2 col-sm-2">
					                        <select class="form-control" name="driver_destination">
				                            	<option>Choose Driver</option>
				                            	<?php foreach ($driver->result() as $dr): ?>
				                            		<option value="<?= $dr->ID ?>" ><?= $dr->name ?></option>
				                            	<?php endforeach ?>
				                            </select>
			                      		</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Status<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
											<input type="text" name="status" class="form-control">
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Job Cost Centre Acivity</label>
			                        	<div class="col-md-6 col-sm-6 ">
				                          <select class="js-example-basic-single form-control js-example-responsive" name="project">
											  <option>--Pilih--</option>
											  <?php foreach ($project as $prj): ?>
											  <option value="<?= $prj->code ?>"><?= $prj->code.' | '.$prj->project_name ?></option>
											  <?php endforeach ?>
											</select>
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Job Cost Centre Approval</label>
			                        	<div class="col-md-6 col-sm-6 ">
											<select class="js-example-basic-single form-control" name="cost_center">
											  <option>--Pilih--</option>
											  <?php foreach ($cost_center as $cc): ?>
											  	<option value="<?= $cc->code ?>"><?= $cc->code.' | '.$cc->project_name.' | '.$cc->pic ?></option>
											  <?php endforeach ?>
											</select>
			                        	</div>
			                      	</div>
			                      	<!-- <div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Transport request by<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input id="birthday" class="date-picker form-control" required="required" type="text">
			                        	</div>
			                      	</div> -->
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Attachment
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<input id="birthday" class="form-control" type="file" name="attach">
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Remarks<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<textarea id="remarks" required="required" class="form-control" name="remarks" ></textarea>
			                        	</div>
			                      	</div>
			                      	<div class="item form-group">
			                        	<label class="col-form-label col-md-3 col-sm-3 label-align">Comment/ Notes<span class="required">*</span>
			                        	</label>
			                        	<div class="col-md-6 col-sm-6 ">
			                          		<textarea id="comment" required="required" class="form-control" name="comment" ></textarea>
			                        	</div>
			                      	</div>
			                      	<div class="ln_solid"></div>
			                      	<div class="item form-group">
			                        	<div class="col-md-6 col-sm-6 offset-md-3">
			                          		<button class="btn btn-primary" type="submit" name="save" value="draft">SAVE DRAFT</button>
									  		<button class="btn btn-primary" type="submit" name="save" value="submit">SAVE & SUBMIT</button>
			                          		<button type="reset" class="btn btn-success">CANCEL</button>
			                        	</div>
			                      	</div>
			                	<?= form_close() ?>
		                	</div>
               			</div>
              		</div>
            	</div>
    		</div>
		</div>

