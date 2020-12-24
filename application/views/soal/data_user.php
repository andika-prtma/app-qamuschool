<div class="container" style="margin-top: 2%; 
  padding: 10px 10px 20px 10px;
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
<h3>Wajib Dibaca</h3>
<ul>
  <li>
    Dalam tes ini, Anda akan diberikan waktu 2 jam untuk menyelesaikan 140 soal yang terbagi kedalam tiga section. 
    <ol>
      <li>Section 1 : Listening comprehension (50 Soal)</li>
      <li>Section 2 : Structure & Written Expression (40 Soal) </li>
      <li>Section 3 : Reading Comprehension (50 Soal)</li>
    </ol>
  </li>
  <li>Jika sudah menyelesaikan soal pada section 1 klik tombol next untuk menyelesaikan soal di section selanjutnya.</li>
  <li>Mengklik tombol SUBMIT pada bagian section 3 artinya Anda sudah selesai melakukan tes Toefl Prediction.</li>
  <li>Jika masih tersisa waktu Anda dapat mengklik tombol BACK untuk memeriksa soal dan pilihan jawaban di section sebelumnya.</li>
</ul>
<h5>NOTE</h5>
<p>
  Jika waktu habis dan Anda belum selesai mengerjakan soal-soal maka lembar pengerjaan akan tertutup secara otomatis dan jawaban Anda akan tersimpan secara otomatis dan akan <strong>tampil Halaman Score</strong> Anda.
</p>
<h6>Ingat !</h6>
<p style="font-style: italic;">Dengan menginput email dan nama pada kolom <strong>di bawah</strong> artinya Anda siap melakukan tes dan waktu akan berjalan ketika kamu mengklik tombol <strong>SUBMIT</strong></p>
</div>
<div class="container" style="margin-top: 1%;
  margin-bottom: 20%;
  padding: 10px 10px 20px 10px;
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
<h3>Silahkan isi data diri sebelum memulai test</h3>
<?= form_open('contact/registrasi') ?>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required>
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name">
  </div>
  <div class="form-group">
    <label>Time Zone -> Pilih berdasarkan zona waktu tempat tinggal</label>
    <select name="zone" id="zone" class="form-control" required>
        <option value="0">WIB</option>
        <option value="1">WITA</option>
        <option value="2">WIT</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?= form_close() ?>
</div>