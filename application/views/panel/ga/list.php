
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
	        				Filter
	        				<?= form_open() ?>


	        				<?= form_close() ?>
	        			</div>
	        		</div>
	        	</div>
	            <div class="row">
              		<div class="col-md-12 col-sm-12 ">
                		<div class="x_panel">
		                	<div class="x_title">
		                    	<h2>List SPD</h2>
		                    	<div class="clearfix"></div>
		                  	</div>
		                  	<div class="x_content">
			                	<div class="row">
			                    	<div class="col-sm-12">
			                        	<div class="card-box table-responsive">	
				                            <table id="" class="table table-striped table-bordered" style="width:100%">
				                            	<thead>
				                                	<tr>
				                                  		<th>Nomor SPD</th>
				                                  		<th>Created date</th>
				                                  		<th>Agenda</th>
				                                  		<th>Action</th>
				                                	</tr>
				                              	</thead>
		                              			<tbody>
		                                			<?php foreach ($spd as $s): ?>
		                                				<tr>
		                                					<td><?= $s->nomor_spd ?></td>
		                                					<td><?= date('d-m-Y H:i', $s->created_at) ?></td>
		                                					<td><?= $s->agenda ?></td>
		                                					<td>
		                                						<a href="" class="badge badge-success">Detail</a>
		                                						<a href="" class="badge badge-primary">Revision</a>
		                                					</td>
		                                				</tr>
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

