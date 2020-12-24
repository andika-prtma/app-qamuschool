<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message')  ?>
			<?= form_open() ?>
				<div class="form-group">
				    <label for="current_password">Current Password</label>
				    <input type="password" class="form-control" id="current_password" name="current_password" >
				    <small class="text-danger"><?= form_error('current_password') ?></small>
				</div>
				<div class="form-group">
				    <label for="new_password1">New Password</label>
				    <input type="password" class="form-control" id="new_password1" name="new_password1" >
				    <small class="text-danger"><?= form_error('new_password1') ?></small>
				</div>
				<div class="form-group">
				    <label for="new_password2">Repeat Password</label>
				    <input type="password" class="form-control" id="new_password2" name="new_password2" >
				    <small class="text-danger"><?= form_error('new_password2') ?></small>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">change password</button>
				</div>

			<?= form_close() ?>
		</div>
	</div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->