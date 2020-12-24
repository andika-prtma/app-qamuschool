        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="page-title">
              <div class="title_left">
                <h3>Free</h3>
              </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">Data paket Free</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>username</th>
                          <th>Email</th>
                          <th>Tanggal Tes</th>
                          <th>Institute</th>
                          <th>Sumber Info</th>
                          <th>Contact</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($free->result() as $fr): ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?= $fr->username ?></td>
                          <td><?= $fr->email ?></td>
                          <td><?= $fr->tgl_tes ?></td>
                          <td><?= $fr->institute ?></td>
                          <td><?= $fr->sumber_info ?></td>
                          <td><?= $fr->contact ?></td>
                          <td>
                            <a class="btn btn-primary" href="<?= base_url('peserta/freeDetail/').$fr->f_id ?>">Detail</a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->