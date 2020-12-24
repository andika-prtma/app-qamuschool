
<!-- start content -->

      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>


		<div class="login_wrapper">
		    <div class="animate form login_form">
		        <section class="login_content">
		            <?= form_open('admin') ?>
		            	<h1>Qamuschool | Administrator</h1>
		            	<?= $this->session->flashdata('message') ?>
		              	<div>
		                	<input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
		            	</div>
		              	<div>
		                	<input type="password" class="form-control" placeholder="Password" name="password">
		                	<small class="text-danger"><?= form_error('password') ?></small>
		              	</div>
		              	<div>
		                	<button type="submit" class="btn btn-primary submit">Log in</button>
		              	</div>
		              	<div class="clearfix"></div>
		              	<div class="separator">
		                	<div class="clearfix"></div>
		                	<br>
		                	<div>
		                  		<p>©2020 All Rights Reserved. Qamuschool</p>
		                	</div>
		              </div>
		            <?= form_close() ?>
		        </section>
		    </div>
		</div>

<!-- end content -->

    
