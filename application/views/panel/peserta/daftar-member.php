        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="page-title">
              <div class="title_left">
                <h3>Member</h3>
              </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">Data paket Member</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>username</th>
                          <th>Email</th>
                          <th>Paket</th>
                          <th>Pembayaran</th>
                          <th>Bukti pembayaran</th>
                          <th>Contact</th>
                          <th>Timestamp</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($member->result() as $mbr): ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?= $mbr->username ?></td>
                          <td><?= $mbr->email ?></td>
                          <td><?= $mbr->kategori ?></td>
                          <td><?= $mbr->metode ?></td>
                          <td>
                              <?php if ($mbr->bukti == null): ?>
		                        None
		                      <?php else: ?>
		                      <img width="50%" height="50px" src="<?= base_url('uploads/member/').$mbr->m_id.'/'.$mbr->bukti ?>">  
                            <?php endif ?>
                          </td>
                          <td><?= $mbr->contact ?></td>
                          <td><?= date('d-m-Y', $mbr->timestamp) ?></td>
                          <td>
                            <a class="btn btn-primary" href="<?= base_url('peserta/freeDetail/').$mbr->m_id ?>">Detail</a>
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