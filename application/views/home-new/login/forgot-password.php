<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Forgot Password</h2>
    </div>
    <div class="row" style="width:100%; margin:0 auto;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 align-items-stretch">
        <?= $this->session->flashdata('message') ?>
        <?= form_open('login/changeProses', 'class="php-email-form" id="myform"'); ?>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email">            
              <small class="text-danger"><?= form_error('email') ?></small>
            </div>
          </div>
          <div class="text-center"><button type="submit">Next</button></div>
        <?= form_close() ?>
        <div class="donot" align="right">Don't have an account? <a href="register">Create a New Account</a>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>