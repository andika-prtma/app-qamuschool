<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Kontak</h2>
    </div>
    <div class="row">
      <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
          <div class="email">
            <i class="icofont-envelope"></i>
            <h4>Email:</h4>
            <p>official@qamuschool.com</p>
          </div>
          <div class="phone">
            <i class="icofont-phone"></i>
            <h4>Whatsapp:</h4>
            <p><a href="https://api.whatsapp.com/send?phone=6282115029525&text=Hello,%20can%20you%20help%20me%20?" target="_blank">+62 82115029525</a></p>
          </div>
          <div class="instagram">
            <i class="icofont-instagram"></i>
            <h4>Follow:</h4>
            <p><a href="https://www.instagram.com/qamuschool/" target="_blank">Instagram</a></p>
          </div>
          <hr>
          <div class="payment">
            <h4>Pembayaran melalui:</h4><br>
            <table width="100%" border="0">
              <tr>
                <td width="50%"><img width="100%" src="<?= base_url('assets/img/logo/').'gopay.png' ?>"></td>
                <td width="50%"><img width="100%" src="<?= base_url('assets/img/logo/').'Jenius-logo.png' ?>"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>
    </div>
  </div>
</section>