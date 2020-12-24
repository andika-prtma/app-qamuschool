      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">TOEFL Prediction</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <hr>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Mulai Test</button>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Tanggal Tes</th>
                        <th>Email</th>
                        <th>Final Score</th>
                        <th>Cek Jawaban</th>
                      </thead>
                      <tbody>
                        <?php foreach ($score->result() as $us): ?>
                        <tr>
                            <td><?= $us->tgl_ujian ?></td>
                            <td><?= $this->session->userdata('email') ?></td>
                            <td><?= $us->hasil_akhir ?></td>
                            <td>
                                <a href="<?= base_url('dashboard/detailJawaban/').$us->ID?>" class="btn btn-success">Cek</a>
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
        </div>
      </div>


      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Kode Tes</h4>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('simulation') ?>" method="post">
                <input type="text" name="code_tes" class="form-control" placeholder="Masukan kode disini">
              
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>