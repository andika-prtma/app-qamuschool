<section id="team" class="team section">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Pendaftaran</h2>
      <p>Berikut pilihan paket pendaftaran, diusahakan untuk login/registrasi terlebih dahulu sebelum melakukan proses pendaftaran.</p>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
      <div class="col-lg-6" style="margin-top: 20px">
        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
          <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Daftar Paket Member</h4>
            <span>Paket member, dengan harga terjangkau kamu bisa dapat banyak benefit yang menarik.</span>
            <p>...</p>
            <center><a href="<?= base_url('daftar-member') ?>" class="get-started-btn" style="color: blue">Daftar</a></center>
          </div>
        </div>
      </div>

      <div class="col-lg-6" style="margin-top: 20px">
        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
          <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Daftar Paket Free</h4>
            <span>Kamu bisa kok mengikuti tes secara free, hanya saja banyak benefit yang tidak bisa kamu nikmati</span>
            <p>...</p>
            <!--<center><a href="<?= base_url('daftar-free') ?>" class="get-started-btn" style="color: blue">Daftar</a></center>-->
            <center><button class="get-started-btn" style="color: blue" onclick="closed()">Daftar</button></center>
          </div>
        </div>
      </div>
    </div>
    <script>
        function closed(){
            alert('Pendaftaran sudah ditutup')
        }
    </script>
    <div class="member" style="margin-top: 20px">
      <h5>Pembayaran melalui: </h5>
      <ul>
        <li style="margin-top: 10px;">Gopay --> <strong>082219381769 </strong>a.n Deis Hadijah</li>
        <li style="margin-top: 10px;">Jenius/BTPN --> <strong>90260022958 </strong>a.n Deis Hadijah</li>
        <li hidden style="margin-top: 10px;">Bank Syariah Mandiri --> <strong>7098318447 </strong>a.n Deis Hadijah</li>
      </ul>
      <div width="100%">
        <pre>Simpan bukti pembayaran untuk diupload dalam form pendaftaran paket member</pre>    
      </div>
    </div>
  </div>
</section><!-- End Team Section -->