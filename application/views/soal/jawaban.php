<div class="container" style="margin-top: 10%; 
  padding: 10px 10px 20px 10px;
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
<h3>Cek Jawaban</h3>
<?= form_open('contact/ambil_jawaban')?>
  <div class="form-group">
    <label>Masukan Email untuk cek jawaban</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?= form_close()?>
</div>