<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Login</h2>
    </div>
    <div class="row" style="width:100%; margin:0 auto;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 align-items-stretch">
        <?= $this->session->flashdata('message') ?>
        <?= form_open('login', 'class="php-email-form" id="myform"'); ?>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email">            
              <small class="text-danger"><?= form_error('email') ?></small>
            </div>
            <div class="form-group col-md-12">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password">           
            <small class="text-danger"><?= form_error('password') ?></small>
            </div>
          </div>
          <div class="text-center"><button type="submit">Login Now</button></div>
          <a href="<?= base_url('login/forgotPassword') ?>">Forgot Password ?</a>
        <?= form_close() ?>
        <div class="donot" align="right">Don't have an account? <a href="register">Create a New Account</a>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>