  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Qamuschool | Admin Page</h1>
                  </div>
                  <?= $this->session->flashdata('message') ?>
                  <?= form_open() ?>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email') ?>">
                  </div>
                    
                    <!-- <small class="text-danger"><?= form_error('email') ?></small> -->
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    </div>
                    <small class="text-danger"><?= form_error('password') ?></small>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  <?= form_close() ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/forgotPassword') ?>">Forgot Password?</a>
                  </div>
                  
                  <!-- Forget Password -->
                  <!-- <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a>
                  </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>