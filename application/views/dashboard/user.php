
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">User Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="post" action="<?= base_url('dashboard/updateProfile') ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" readonly value="<?= $user->username ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" readonly value="<?= $user->email ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input required name="firstName" type="text" class="form-control" value="<?= $user->first_name ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="lastName" type="text" class="form-control" value="<?= $user->last_name ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status (Mahasiswa/guru/karyawan)</label>
                          <input name="status_diri" type="text" class="form-control" value="<?= $user->status_diri ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender (Male/Female)</label>
                          <input type="text" class="form-control" name="gender" value="<?= $user->gender ?>">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input name="telp" type="text" class="form-control" value="<?= $user->contact ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">About Me</label>
                            <textarea class="form-control" rows="5" name="about"><?= $user->about_me ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Password</label>
                          <input type="password" class="form-control" name="password1">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?= base_url('assets/img/profile/') ?>default.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?= ucwords($user->first_name).' '.ucwords($user->last_name) ?></h4>
                  <p class="card-description">
                    <?= $user->about_me ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>