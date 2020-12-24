<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Register</h2>
    </div>
    <div class="row" style="width:100%; margin:0 auto;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 align-items-stretch">
        
        <?= form_open('login/register', 'class="php-email-form" id="myform"'); ?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Your email</label>
              <input type="text" name="email" class="form-control" id="email" value="<?= set_value('email') ?>">
              <small class="text-danger"><?= form_error('email') ?></small>
            </div>
            <div class="form-group col-md-6">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
              <small class="text-danger"><?= form_error('username') ?></small>
            </div>
          </div>
          <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" name="firstName" class="form-control" id="firstName" value="<?= set_value('firstName') ?>">
              <small class="text-danger"><?= form_error('firstName') ?></small>
          </div>
          <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="lastName" class="form-control" name="lastName" id="lastName" value="<?= set_value('lastName') ?>">
              <small class="text-danger"><?= form_error('lastName') ?></small>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password1">Password</label>
              <input type="password" name="password1" class="form-control" id="password1">
              <small class="text-danger"><?= form_error('password1') ?></small>
            </div>
            <div class="form-group col-md-6">
              <label for="password2">Confirm Password</label>
              <input type="password" class="form-control" name="password2" id="password2">
              <small class="text-danger"><?= form_error('password2') ?></small>
            </div>
          </div>
            <div class="form-group">
              <label for="alamat">Kota Domisili</label>
              <input type="text" class="form-control" name="alamat" id="alamat" value="">
              <small class="text-danger"><?= form_error('alamat') ?></small>
            </div>
            <div class="form-group">
              <label for="telp">No. Telp</label>
              <input type="text" class="form-control" name="telp" id="telp" value="<?= set_value('telp') ?>">
              <small class="text-danger"><?= form_error('telp') ?></small>
            </div>
            <input type="hidden" readonly name="lng" id="lng">
            <input type="hidden" readonly name="lat" id="lat">
            <input type="hidden" name="" id="tempo1">
            <input type="hidden" name="" id="demo">
            <div class="text-center">
              <button type="submit">Register</button>
            </div>
        <?= form_close() ?>
        <div class="donot" align="right">Have an account? <a href="login">login</a>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>