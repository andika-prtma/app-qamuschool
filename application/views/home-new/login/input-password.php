<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Input new password</h2>
    </div>
    <div class="row" style="width:100%; margin:0 auto;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 align-items-stretch">
        <?= $this->session->flashdata('message') ?>
        <?= form_open('login/inputPassword', 'class="php-email-form" id="myform"'); ?>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="email">New Password</label>
              <input type="password" name="password1" class="form-control" id="email">            
              <small class="text-danger"><?= form_error('password1') ?></small>
            </div>
            <div class="form-group col-md-12">
              <label for="email">Re-type New Password</label>
              <input type="password" name="password2" class="form-control" id="email">            
              <small class="text-danger"><?= form_error('password2') ?></small>
            </div>
          </div>
          <div class="text-center"><button type="submit">Change Password</button></div>
        <?= form_close() ?>
        <div class="donot" align="right">Don't have an account? <a href="register">Create a New Account</a>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>