<!-- bread-crumb start here -->
<div class="bread-crumb">
	<img src="<?= base_url('assets/img/logo/') ?>comingsoon-1920x170.jpg" class="img-responsive" alt="banner-top" title="banner-top">
	<div class="container">
		<div class="matter">
			<h2>register now</h2>
			<ul class="list-inline">
				<li>
					<a href="">HOME</a>
				</li>
				<li>
					<a href="">Login</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- bread-crumb end here -->

<!-- login start here -->
<div class="login">
	<div class="container d-flex justify-content-center"> 
		<div class="col-md-6 col-sm-6 col-xs-12 box padd0">
			<div class="col-md-12 col-sm-12 col-xs-12 mt-2">
				<h5>sign in</h5>
				<hr>
                <?= $this->session->flashdata('message') ?>
				<?= form_open('login/inputPassword') ?>
					<div class="form-group">
						<label>New Password</label>
						<input style="color: black" type="password" name="password1" value="" id="input-confirmpassword" class="form-control" />
						<small class="text-danger"><?= form_error('password1') ?></small>
					</div>
					<div class="form-group">
						<label>Retype new password*</label>
						<input style="color: black" type="password" name="password2" value="" id="input-confirmpassword" class="form-control" />
						<small class="text-danger"><?= form_error('password2') ?></small>
					</div>
					<button type="submit" class="btn btn-primary btn-block">change Password</button>
				<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- login end here -->