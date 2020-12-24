<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Payment Confirmation-Member</h2>
    </div>
    <div class="row" style="width:100%; margin:0 auto;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 align-items-stretch">
        <?= $this->session->flashdata('message') ?>
        <?= form_open_multipart('home/paymentMember', 'class="php-email-form" id="myform"'); ?>
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
              <label for="paket">Pilihan Paket Member</label>
              <select class="form-control" name="paket">
                <?php foreach ($kategori->result() as $k): ?>
                  <option value="<?= $k->ID ?>"><?= strtoupper($k->kategori) ?></option>
                <?php endforeach ?>
              </select>
              <small class="text-danger"><?= form_error('firstName') ?></small>
          </div>
          <div class="form-group">
              <label for="bayar">Pembayaran</label>
              <select class="form-control" name="bayar">
                <?php foreach ($metode->result() as $m): ?>
                  <option value="<?= $m->ID ?>"><?= $m->metode ?></option>
                <?php endforeach ?>
              </select>
              <small class="text-danger"><?= form_error('firstName') ?></small>
          </div>
          <div class="form-group">
              <label for="bukti">Bukti Pembayaran</label>
              <input type="file" class="form-control" name="bukti" id="bukti" required>
              <small class="text-danger"><?= form_error('bukti') ?></small>
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