<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/style.css') ?>">

    <title>Qamuschool | Section 2</title>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171071175-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-171071175-1');
    </script>
  </head>
  <body>
  	<div class="container">
  		<?= form_open('hitung/structure_proses', ' id="form_soal"') ?>
	  	<nav class="navbar fixed-top navbar-light bg-light" style="  
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
	  		<div class="btn-group mr-2" role="group" aria-label="First group">
				<!--<a href="<?= base_url() ?>section/section_listening" class="btn btn-primary">< Back</a>-->
				<!--<button type="submit" class="btn btn-danger">Next ></button>-->
				<button type="submit" class="btn btn-danger" name="kembali" value="kembali">&laquo; Back </button>
				<button type="submit" class="btn btn-primary" name="kembali" value="submit">Next &raquo;</button>
			  </div>
			 <div align="center"><b><?= ucfirst($this->session->userdata('first_name').' '.$this->session->userdata('last_name')) ?></b></div>
			<?php $this->load->view('time/run'); ?>
		</nav>
		<div class="" style="margin-top: 150px">		
			<h2 class="text-center">Section 2</h2>
			<h2 class="text-center">Structure & Written Expression</h2><br>
			<h5 class="text-center">Time: 25 Minutes</h5>
			<h5 class="text-center">40 Questions</h5><br>
			<p>This section is designed to measure your ability to recognize language that is appropriate for standard written English. There are two types of questions in this section, with special directions for each type.</p><br>
			<h5>PART A : STRUCTURE</h5>
			<h5>DIRECTIONS : </h5>
			<p>Questions 1 – 15 are incomplete sentence. Beneath each sentence you will aee four words or phrares, marked (A), (B), (C), and (D). Choose the one word or phrase that best completes the sentence. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter or the answer you have chosen. Fill the space so that the letter inside the oval cannot be seen.</p><br>
			<p>Example:</p>
			<p>Geysers have often been compared to volcanoes ________ they both emit hot liquids from below the Earth’s surface.</p>
			<ol type="A">
				<li>due to</li>
				<li>because</li>
				<li>in spite of</li>
				<li>regardless of</li>
			</ol>
			<h6>ANSWER : B</h6>
			<p>The sentence should read, “Geysers have often compared to volcanoes because they both emit hot liquids from below the Earth’s surface. “Therefore, you should choose (B).</p>
			<p>QUESTIONS :</p>

			<?php foreach ($soal->result() as $sl): ?> 

				<?php if ($sl->nomor == '16'): ?>
					<h5>PART B : WRITTEN EXPRESSION</h5>
					<h5>DIRECTIONS : </h5>
					<p>In questions 16-40 each sentence has four underlined words or phrases. The four underlined parts of the sentence are marked (A), (B),(C), and (D). Identify the one underlined word or phrase that must be changed in order for the sentence to be correct. Then, on your answer sheet, find the number of the question and fill the number of the question and fill in the space that corresponds to the letter of the answer you have chosen</p><br>
					<p>Example 1:</p>
					<p>Guppies are sometimes call rainbow fish because of the males’bright colors.</p>
					<ol type="A">
						<li>Call</li>
						<li>Fish</li>
						<li>Because</li>
						<li>Bright</li>
					</ol>
					<h6>ANSWER : A</h6>
					<p>The sentence should read, “Guppies are sometimes called rainbow fish because of the males’s bright colors.” Therefore, you should choose (A).</p>
					<p>Example 2:</p>
					<p>Serving several term in Congress, Shirley Chisholm became an important United States politician.</p>
					<ol type="A">
						<li>Serving</li>
						<li>Term</li>
						<li>Important</li>
						<li>Politician</li>
					</ol>
					<h6>ANSWER : B</h6>
					<p>The sentence should read, “Serving several terms in Congress, Shirley Chishom became an important United States politicians. “ Therefore, you should choose (B)</p>
					<H6>NOW BEGIN TO WORK ON THE QUESTIONS</H6>
				<?php endif ?>
				<?php $option = $this->db->get_where('tbl_section_two_option', ['id_section_two' => $sl->ID]) ?>
				
				<?php
					if ($sl->nomor<16){
						?>
							<label class="col-form-label"><?= $sl->nomor.'. '.$sl->soal ?></label>
						<?php
					}else{
						?>
							<img src="<?= base_url() ?>assets/img/soal/<?= $sl->nomor ?>.PNG" >
						<?php
					}
				?>
				<?php foreach ($option->result() as $op): ?>

				<?php
	            	$check_a = ' '; 
	            	$check_b = ' '; 
	            	$check_c = ' '; 
	            	$check_d = ' '; 
	            	if ($jawaban['section_two']!=""){  
	            		$res   = json_decode($jawaban['section_two']); 
	            		for ($i=0; $i < count($res); $i++) { 
	            			if ($op->nomor==$res[$i]->nomor){
	            				if ($res[$i]->jawab=="A"){$check_a = ' checked '; }
	            				if ($res[$i]->jawab=="B"){$check_b = ' checked '; }
	            				if ($res[$i]->jawab=="C"){$check_c = ' checked '; }
	            				if ($res[$i]->jawab=="D"){$check_d = ' checked '; } 
				            	
	            			} 
	            		}
	            	}

	            ?>	
	            <?php
					if ($sl->nomor<16){
						?>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="A" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_A' ?>" <?= $check_a; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_A' ?>">A. <?= $op->answerA ?></label>
							</div>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="B" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_B' ?>" <?= $check_b; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_B' ?>">B. <?= $op->answerB ?></label>
							</div>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="C" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_C' ?>" <?= $check_c; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_C' ?>">C. <?= $op->answerC ?></label>
							</div>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="D" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_D' ?>" <?= $check_d; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_D' ?>">D. <?= $op->answerD ?></label>
							</div>
						<?php
					}else{
						?>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();"  value="A" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_A' ?>" <?= $check_a; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_A' ?>">A</label>
							</div>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="B" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_B' ?>" <?= $check_b; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_B' ?>">B</label>
							</div>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="C" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_C' ?>" <?= $check_c; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_C' ?>">C</label>
							</div>
							<div class="custom-control custom-radio">
							  <input onclick="simpan_jawaban();" value="D" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_D' ?>" <?= $check_d; ?> >
							  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_D' ?>">D</label>
							</div>
						<?php
					}
				?>
				

				<?php
					$check_a = ' '; 
	            	$check_b = ' '; 
	            	$check_c = ' '; 
	            	$check_d = ' '; 
				?>

				<?php endforeach ?>
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
          url:"<?= base_url() ?>hitung/structure_proses",
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