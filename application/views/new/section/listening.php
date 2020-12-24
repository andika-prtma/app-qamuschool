<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/style.css') ?>">

    <title>Qamuschool | Section 1</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171071175-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-171071175-1');
    </script>
  </head>
  <body>
  	<div class="container" >
  		<?= form_open('calculate/listening_proses', ' id="form_soal"') ?>
	  	<nav class="navbar fixed-top navbar-light bg-light" style="  
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
	  		<audio controls style="width: 200%; box-sizing: border-box;">
	  			<source src="<?= base_url('assets/audio/').$audio->audio?>" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
			<button type="submit" class="btn btn-primary">Next &raquo; </button>
			<div align="center"><b><?= ucfirst($this->session->userdata('first_name').' '.$this->session->userdata('last_name')) ?></b></div>
			<?php $this->load->view('time/run'); ?>
		</nav>
		<div class="" style="margin-top: 150px">		
			<h2 class="text-center">Section 1</h2>
			<h2 class="text-center">Listening Comprehension</h2><br>
			<h5 class="text-center">Time: 35 Minutes</h5>
			<h5 class="text-center">50 Questions</h5>
			<br>
			<p>In this section of the test, you will have an apportunity to demonstare your ability to understand conversations and talks in English. There are three parts of this section with special directions for each part. Answer all the questions on the basis of what is stated or implied by the speakers in this test. When you take the actual TOEFL test, you will not be allowed to take notes or write in your test book.</p><br>
			<h5>PART A</h5>
			<h5>Direction : </h5>
			<p>In Part A you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. After you hear a question, read the four possible answers in your test book and choose the best answer. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter of the answer you have chosen.</p><br>
			<p>Example:</p>
			<p>On the recording, you hear:</p>
			<p>What does the man mean?</p>
			<p>In your text book, you read:</p>
			<ol type="A">
				<li>He doesn’t like the painting either.</li>
				<li>He doesn’t know how to paint.</li>
				<li>He doesn’t have any paintings.</li>
				<li>He doesn’t know what to do.</li>
			</ol>
			<h6>ANSWER : A</h6>
			<p>You learn from the conversation that neither the man nor the woman likes the painting. The best answer for the question “What does the man mean?” is (A). He doesn’t like the painting either.” Therefore, the correct choice is (A).</p>
			<p>Begin to work on the questions</p>

			<?php foreach ($option->result() as $pl): ?>

	            <?php
	            	$check_a = ' '; 
	            	$check_b = ' '; 
	            	$check_c = ' '; 
	            	$check_d = ' '; 
	            	if ($jawaban['section_one']!=""){  
	            		$res   = json_decode($jawaban['section_one']); 
	            		for ($i=0; $i < count($res); $i++) { 
	            			if ($pl->nomor==$res[$i]->nomor){
	            				if ($res[$i]->jawab=="A"){$check_a = ' checked '; }
	            				if ($res[$i]->jawab=="B"){$check_b = ' checked '; }
	            				if ($res[$i]->jawab=="C"){$check_c = ' checked '; }
	            				if ($res[$i]->jawab=="D"){$check_d = ' checked '; } 
				            	
	            			} 
	            		}
	            	}

	            ?>

				<br>
				<?php if ($pl->nomor == '31'): ?>
					<h5>PART B</h5>
					<h5>Direction : </h5>
					<p>In Part A you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. After you hear a question, read the four possible answers in your test book and choose the best answer. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter of the answer you have chosen.</p><br>
					<p>Remember, you are not allowed to take notes or write in your test book.</p>
				<?php endif ?>
				<?php if ($pl->nomor == '39'): ?>
					<h5>PART C</h5>
					<h5>Direction : </h5>
					<p>In this part of the test, you will hear several talks. After each talk, you will hear some questions. The talks and questions will not be repeated. After you hear a question, read the four possible answers in your test book and choose the best answer. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter of the answer you have chosen.</p><br>
					<p>
						After you hear a question, read the four possible answers in your test book and choose the best
						answer. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter of the answer you have chosen.
					</p>
					<p>Now listen to a sample question.</p>
					<p>(A) (narrator) What style of painting is known as American regionalist ?.</p>
					<p>In your text book, you read:</p>
        			<ol type="A">
        				<li>Art from America s inner cities</li>
        				<li>Art from the central region of the United States</li>
        				<li>Art from various urban areas in the United States</li>
        				<li>Art from rural sections of America</li>
        			</ol>
        			<p>The best answer to the question "What style of painting is known as American regionalist?" is (D), "Art from rural sections of America." Therefore, the correct choice is (D).</p>
        			<p>Now listen to another sample question.</p>
        			<p>(A) (narrator) What is the name of Wood's most successful painting ?</p>
        			<p>In your text book, you read:</p>
        			<ol type="A">
        				<li>"American Regionalist"</li>
        				<li>"The Family Farm in Iowa"</li>
        				<li>"American Gothic"</li>
        				<li>"A Serious Couple"</li>
        			</ol>
        			<p>The best answer to the question, "What is the name of Wood's most successful painting?" is (C), "American Gothic." Therefore, the correct choice is (C). Remember, you are not allowed to take notes or write in your test book.</p>
				<?php endif ?>
				<label class="col-form-label"><?= $pl->nomor ?></label>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="A" type="radio" name="<?= 'answer_'.$pl->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$pl->nomor.'_A' ?>"   <?= $check_a ; ?>  >
				  <label class="custom-control-label" for="<?= 'answer_'.$pl->nomor.'_A' ?>">A. <?= $pl->answerA ?></label>
				</div>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="B" type="radio" name="<?= 'answer_'.$pl->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$pl->nomor.'_B' ?>"  <?= $check_b ; ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$pl->nomor.'_B' ?>">B. <?= $pl->answerB ?></label>
				</div>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="C" type="radio" name="<?= 'answer_'.$pl->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$pl->nomor.'_C' ?>"  <?= $check_c ; ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$pl->nomor.'_C' ?>">C. <?= $pl->answerC ?></label>
				</div>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="D" type="radio" name="<?= 'answer_'.$pl->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$pl->nomor.'_D' ?>"  <?= $check_d; ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$pl->nomor.'_D' ?>">D. <?= $pl->answerD ?></label>
				</div>

				<?php
					$check_a = ' '; 
	            	$check_b = ' '; 
	            	$check_c = ' '; 
	            	$check_d = ' '; 
				?>
			<?php endforeach ?>
		<?= form_close() ?>
		</div>
	</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
  </body>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function simpan_jawaban(){
         $.ajax({
          url:"<?= base_url() ?>calculate/listening_proses",
          method:"POST",
          data:$("#form_soal").serialize(),
          beforeSend:function(){
             console.log("beforeSend");
          },success:function(data){
             console.log("Success");
            // alert("As");
          }
        })
    }
  </script>

