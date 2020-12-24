  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h2>Hi sobat, saatnya kamu mencari tau sejauh mana level kemampuan Toeflmu, sebelum mengikuti tes TOEFL yang sebenarnya.</h2>
          <h1>Cek Kemampuan Toefl mu</h1>
          <?php 
            if (!$this->session->userdata('email')) {
              $link = 'login';
            } else {
              $link = 'online-prediction';
            }
          ?>
            <div class="d-lg-flex">
              <a href="<?= base_url($link) ?>" class="btn-get-started scrollto">Test Sekarang</a>
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?= base_url('assets/template/original/') ?>assets/video/testimoni-ade.mp4" allowfullscreen></iframe>
          </div>
          <!--div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/QC.png" class="img-fluid animated" alt=""-->
        </div>
      </div>
    </div>

  </section>