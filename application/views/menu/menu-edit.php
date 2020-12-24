<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Update Menu <?= $menu->menu ?></h1>
  <div class="row">
    <div class="col-lg-6">
	   <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
	   <?= $this->session->flashdata('message')  ?>
	   <?= form_open('menu/updateProccess') ?>
      <div class="form-group">
        <input type="hidden" name="id" value="<?= $menu->ID ?>">
        <input type="text" name="menu" class="form-control" value="<?= $menu->menu ?>">
      </div>
      <button type="submit" class="btn btn-primary">Save changes</button>
      <?= form_close() ?>
	 </div>
  </div>
</div>