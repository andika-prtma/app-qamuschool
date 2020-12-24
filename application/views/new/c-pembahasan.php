<div class="container" style="margin-top: 5%; 
  padding: 10px 10px 20px 10px;
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
<h3>Email = <?= $this->session->userdata('email') ?></h3>
<a href="<?= base_url('dashboard/prediction-test')?>" class="btn btn-primary">Back to dashboard</a>
<hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="row">
                    Hasil Akhir = <?= $peserta->hasil_akhir ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                  Score Section 1 = <?= $peserta->convert_section1 ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    Score Section 2 = <?= $peserta->convert_section2 ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    Score Section 3 = <?= $peserta->convert_section3 ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php $color = '' ?>
    <div class="row">
        <div class="col-sm-4">
        <h6>Section 1</h6>
        <p>Jumlah Jawaban Betul: <?= $peserta->true_one ?></p>
        <table width="200%" class="table table-bordered table-sm">
          <?php foreach (json_decode($peserta->section_one) as $j1): ?>
          	<tr>
          		<td width="5%"><?= $j1->nomor ?></td>
          		<td align="center"><?= $j1->jawab ?></td>
          	</tr>
          <?php endforeach ?>
        </table>
        </div>
        <div class="col-sm-4">
          <h6>Kunci Jawaban Section 1</h6>
          <p>...</p>
          <table width="200%" class="table table-bordered table-sm">
            <?php foreach ($key1 as $k1): ?>
              <tr>
                <td width="5%"><?= $k1->nomor ?></td>
                <td align="center"><?= $k1->jawaban ?></td>
              </tr>
            <?php endforeach ?>
          </table>
        </div>

        <div class="col-sm-4">
          <a target="_blank" href="<?= base_url('assets/document/4/').'SECTION 1 PEMBAHASAN.pdf' ?>">Download pembahasan section 1</a>
        </div>
    </div>    

    <div class="row">
        <div class="col-sm-4">
        <h6>Section 2</h6>
        <p>Jumlah Jawaban Betul: <?= $peserta->true_two ?></p>
        <table width="200%" class="table table-bordered table-sm">
          <?php foreach (json_decode($peserta->section_two) as $j1): ?>
            <tr style="">
              <td width="5%"><?= $j1->nomor ?></td>
              <td align="center"><?= $j1->jawab ?></td>
            </tr>
          <?php endforeach ?>
        </table>
        </div>
        <div class="col-sm-4">
          <h6>Kunci Jawaban Section 2</h6>
          <p>...</p>
          <table width="200%" class="table table-bordered table-sm">
            <?php foreach ($key2 as $k2): ?>
              <tr>
                <td width="5%"><?= $k2->nomor ?></td>
                <td align="center"><?= $k2->jawaban ?></td>
              </tr>
            <?php endforeach ?>
          </table>
        </div>
        <div class="col-sm-4">
          <a target="_blank" href="<?= base_url('assets/document/4/').'SECTION 2 PEMBAHASAN.pdf' ?>">Download pembahasan section 2</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
        <h6>Section 3</h6>
        <p>Jumlah Jawaban Betul: <?= $peserta->true_three ?></p>
        <table width="200%" class="table table-bordered table-sm">
          <?php foreach (json_decode($peserta->section_three) as $j1): ?>
            <tr style="">
              <td width="5%"><?= $j1->nomor ?></td>
              <td align="center"><?= $j1->jawab ?></td>
            </tr>
          <?php endforeach ?>
        </table>
        </div>
        <div class="col-sm-4">
          <h6>Kunci Jawaban Section 3</h6>
          <p>...</p>
          <table width="200%" class="table table-bordered table-sm">
            <?php foreach ($key3 as $k3): ?>
              <tr>
                <td width="5%"><?= $k3->nomor ?></td>
                <td align="center"><?= $k3->jawaban ?></td>
              </tr>
            <?php endforeach ?>
          </table>
        </div>
        <div class="col-sm-4">
          <a target="_blank" href="<?= base_url('assets/document/4/').'SECTION 3 PEMBAHASAN.pdf' ?>">Download pembahasan section 3</a>
        </div>
    </div>
</div>