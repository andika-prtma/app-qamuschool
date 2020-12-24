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
					<a href="">register</a>
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
				<h5>sign UP</h5>
				<hr>
				<?= form_open('login/register') ?>
					<div class="form-group">	
						<label>First Name</label>
						<input style="color: black" type="text" name="firstName" value="" id="input-name" class="form-control" />
						<small class="text-danger"><?= form_error('firstName') ?></small>
					</div>
					<div class="form-group">	
						<label>Last Name</label>
						<input style="color: black" type="text" name="lastName" value="" id="email" class="form-control" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input style="color: black" type="text" name="email" value="<?= set_value('email') ?>" class="form-control" />
						<small class="text-danger"><?= form_error('email') ?></small>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input style="color: black" type="password" name="password1" value="" id="input-confirmpassword" class="form-control" />
						<small class="text-danger"><?= form_error('password1') ?></small>
					</div>
					<div class="form-group">
						<label>confirm password*</label>
						<input style="color: black" type="password" name="password2" value="" id="input-confirmpassword" class="form-control" />
						<small class="text-danger"><?= form_error('password2') ?></small>
					</div>
					<div class="form-group">
						<label>Alamat (Kota domisili)</label>
						<input style="color: black" type="text" name="alamat" value="" id="alamat" class="form-control" />
						<small class="text-danger"><?= form_error('alamat') ?></small>
					</div>


					<input type="hidden" readonly name="lng" id="lng">
					<input type="hidden" readonly name="lat" id="lat">
					<input type="hidden" name="" id="tempo1">
					<input type="hidden" name="" id="demo">
					<button type="submit" class="btn btn-primary btn-block" >Register now</button>
				<?= form_close() ?>
				<div class="donot">
					Have an account? 
					<a href="login">Login Now</a>
				</div>
			</div>	
		</div>
	</div>
</div>
<!-- login end here -->