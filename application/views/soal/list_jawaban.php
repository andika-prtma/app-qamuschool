<div class="container" style="margin-top: 10%; 
  padding: 10px 10px 20px 10px;
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
<h3>Email = <?= $peserta->email ?></h3>
<hr>
<a href="<?= base_url('contact/export/').$peserta->ID ?>"class="btn btn-primary">Export Excel</a>
<br>
<br>
    <div class="row">
        <div class="col-sm-4">
        <h6>Section 1</h6>
        <p>Jumlah Jawaban Betul: <?= $peserta->true_one ?></p>
        <table class="table" border='1' cellspacing='0'>
          <?php foreach (json_decode($peserta->section_one) as $j1): ?>
          	<tr>
          		<td><?= $j1->nomor ?></td>
          		<td><?= $j1->jawab ?></td>
          	</tr>
          <?php endforeach ?>
        </table>    
        </div>
        <div class="col-sm-4">
        <h6>Section 2</h6>
        <p>Jumlah Jawaban Betul: <?= $peserta->true_two ?></p>
        <table class="table" border='1' cellspacing='0'>
          <?php foreach (json_decode($peserta->section_two) as $j2): ?>
          	<tr>
          		<td><?= $j2->nomor ?></td>
          		<td><?= $j2->jawab ?></td>
          	</tr>
          <?php endforeach ?>
        </table>    
        </div>
        <div class="col-sm-4">
        <h6>Section 3</h6>
        <p>Jumlah Jawaban Betul: <?= $peserta->true_one ?></p>
        <table class="table" border='1' cellspacing='0'>
          <?php foreach (json_decode($peserta->section_three) as $j3): ?>
          	<tr>
          		<td><?= $j3->nomor ?></td>
          		<td><?= $j3->jawab ?></td>
          	</tr>
          <?php endforeach ?>
        </table>    
        </div>
    </div>  
    
</div>