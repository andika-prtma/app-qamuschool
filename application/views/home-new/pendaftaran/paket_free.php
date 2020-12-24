<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Toefl Prediction "Oct"-Free</h2>
    </div>
    <div class="row" style="width:100%; margin:0 auto;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 align-items-stretch">
        <?= $this->session->flashdata('message') ?>
        <?= form_open('daftar-free', 'class="php-email-form" id="myform"'); ?>
          <div class="form-group">
            <label for="email">Your email</label>
            <input type="text" name="email" class="form-control" id="email" value="<?= $this->session->userdata('email') ?>" readonly>
            <small class="text-danger"><?= form_error('email') ?></small>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $this->session->userdata('username') ?>">
            <small class="text-danger"><?= form_error('username') ?></small>
          </div>
          <div class="form-group">
              <label for="tgl_test">Tanggal Test yang dipilih</label>
              <select class="form-control" name="tgl_test">
                <option value="10-10-2020">October 10, 2020</option>
                <option value="10-17-2020">October 17, 2020</option>
                <option value="10-24-2020">October 24, 2020</option>
                <option value="10-31-2020">October 31, 2020</option>
              </select>
              <small class="text-danger"><?= form_error('tgl_test') ?></small>
          </div>
          <div class="form-group">
              <label for="institute">Institute</label>
              <input type="institute" class="form-control" name="institute" id="institute">
              <small class="text-danger"><?= form_error('institute') ?></small>
          </div>
          
            <div class="form-group">
              <label for="info">Informasi online Toefl Prediction di Qamuschool ?</label>
              <pre>Ex : Dari teman, Instagram, grup WA dll. </pre>
              <input type="text" name="info" class="form-control" id="info">
              <small class="text-danger"><?= form_error('info') ?></small>
            </div>
            <div class="form-group">
              <label for="motivasi">Motivasi mengikuti test</label>
              <input type="text" class="form-control" name="motivasi" id="motivasi">
              <small class="text-danger"><?= form_error('motivasi') ?></small>
            </div>
            <div class="form-group">
              <label for="telp">No. Telp</label>
              <input type="text" class="form-control" name="telp" id="telp" value="<?= $this->session->userdata('telp') ?>">
              <small class="text-danger"><?= form_error('telp') ?></small>
            </div>
            <div class="text-center">
              <a href="<?= base_url('pendaftaran') ?>" class="get-started-btn" style="color: blue">Back</a>
              <button type="submit">Daftar</button>
            </div>
        <?= form_close() ?>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>