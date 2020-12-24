<section id="hero" class="d-flex align-items-center">
   <div class="container">
    <div class="section-title" style="text-align: center;">
      <h1 style="font-size: 45px;">Toefl Preparation</h1><br>
      <h5>Try to listen and write in the text area!</h5>
      <audio controls>
          <source src="<?= base_url('assets/template/original/') ?>assets/video/audio1.mp3" type="audio/mpeg" style="">
              Your browser does not support the audio element.
      </audio>

      <form class="needs-validation" novalidate="">
        <label for="validation"> tulis tanpa huruf kapital, tanpa koma, titik dan tanda baca lainnya</label>
          <input type="text" class="form-control" id="validation" placeholder="text area" required>
          <p style="color: white" hidden id="answer">Answer : yah i think it means to make things too simple like you want to make easy to undestand but you make it to easy so it is like writing for a little child</p>
          <br>
          <button type="button" class="btn btn-outline-light" id="btn-chk-prediction" onclick="showText()">Check</button>
      </form>

    </div>
      
      
    </div>
  </section>