        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-12">
          	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>
          	<?= $this->session->flashdata('message')  ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Soal dan Pilihan</a>
          		<div class="table-responsive">
                <table class="table table-striped table-bordered" id="example" >
        				  <thead>
        				    <tr>
        				      <th scope="col">No</th>
        				      <th scope="col">Pilihan A</th>
        				      <th scope="col">Pilihan B</th>
                      <th scope="col">Pilihan C</th>
                      <th scope="col">Pilihan D</th>
        				    </tr>
        				  </thead>
        				  <tbody>
                  <?php foreach ($pilihan->result() as $pl): ?>
                    <tr>
                      <th><?= $pl->nomor ?></th>
                      <td><?= $pl->answerA ?></td>
                      <td><?= $pl->answerB ?></td>
                      <td><?= $pl->answerC ?></td>
                      <td><?= $pl->answerD ?></td>
                    </tr>
                  <?php endforeach ?>
        				  </tbody>
        				</table>
              </div>
          	</div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

     <!-- modal -->
     <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModal">Tambah pilihan jawaban</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('section/tambahSoal/1') ?>
      <div class="modal-body">
          <div class="form-group">
            <select name="batch" id="batch" class="form-control">
              <option value="">Pilih Batch</option>
              <?php foreach ($batch->result() as $btc): ?>
                <option value="<?= $btc->ID ?>"><?= ucwords($btc->batch) ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <select name="audio" id="audio" class="form-control">
              <option value="">Pilih Audio</option>
              <?php foreach ($audio->result() as $au): ?>
                <option value="<?= $au->ID ?>"><?= ucwords($au->audio) ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="nomor" class="form-control" placeholder="Nomor">
          </div>
          <div class="form-group">
            <input type="text" name="answerA" class="form-control" placeholder="Pilihan A">
          </div>
          <div class="form-group">
            <input type="text" name="answerB" class="form-control" placeholder="Pilihan B">
          </div>
          <div class="form-group">
            <input type="text" name="answerC" class="form-control" placeholder="Pilihan C">
          </div>
          <div class="form-group">
            <input type="text" name="answerD" class="form-control" placeholder="Pilihan D">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>