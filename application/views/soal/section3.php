<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/style.css') ?>">

    <title>Qamuschool | Section 3</title>
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
  		<?= form_open('hitung/reading_proses', 'id="theForm"') ?>
	  	<nav class="navbar fixed-top navbar-light bg-light" style="  
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
			<div class="btn-group mr-2" role="group" aria-label="First group">
				<!--<a href="<?= base_url() ?>section/section_structure" class="btn btn-primary" onclick="submitform();">< Back</a>-->
				<button type="submit" class="btn btn-danger" name="kembali" value="kembali">&laquo; Back </button>
				<button type="submit" class="btn btn-success" name="kembali" value="submit">Submit &raquo;</button>
			</div>
			<div align="center"><b><?= ucfirst($this->session->userdata('first_name').' '.$this->session->userdata('last_name')) ?></b></div>
			<?php $this->load->view('time/run'); ?>
		</nav>
		<div class="" style="margin-top: 150px">		
			<h2 class="text-center">Section 3</h2>
			<h2 class="text-center">READING COMPREHENSION</h2><br>
			<h5 class="text-center">Time: 55 Minutes</h5>
			<h5 class="text-center">50 Questions</h5>
			<br>
			<p>In this section you will read several passages. Each one is followed by several questions about it. For questions 1 – 50, you have to choose the one best answer, A, B, C, or D, to each question. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter of the answer you have chosen.</p><br>
			<img src="<?= base_url('assets/img/soal/passage1.PNG') ?>"><br>

			<?php foreach ($soal->result() as $sl): ?> 

				<?php if ($sl->nomor == '11'): ?>
					<img src="<?= base_url('assets/img/soal/passage2.PNG') ?>"><br>
				<?php endif ?>
				<?php if ($sl->nomor == '22'): ?>
					<img src="<?= base_url('assets/img/soal/passage3.PNG') ?>"><br>
				<?php endif ?>
				<?php if ($sl->nomor == '32'): ?>
					<img src="<?= base_url('assets/img/soal/passage4.PNG') ?>"><br>
				<?php endif ?>
				<?php if ($sl->nomor == '41'): ?>
					<img src="<?= base_url('assets/img/soal/passage5.PNG') ?>"><br>
				<?php endif ?>
				<?php $option = $this->db->get_where('tbl_section_three_option', ['id_section_three' => $sl->ID]) ?>
				<label class="col-form-label"><?= $sl->nomor.'. '.$sl->soal ?></label>
				<?php foreach ($option->result() as $op): ?>

				<?php
	            	$check_a = ' '; 
	            	$check_b = ' '; 
	            	$check_c = ' '; 
	            	$check_d = ' '; 
	            	if ($jawaban['section_three']!=""){  
	            		$res   = json_decode($jawaban['section_three']); 
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


				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();"  value="A" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_A' ?>" <?= $check_a ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_A' ?>"><?= $op->answerA ?></label>
				</div>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="B" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_B' ?>" <?= $check_b ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_B' ?>"><?= $op->answerB ?></label>
				</div>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="C" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_C' ?>" <?= $check_c ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_C' ?>"><?= $op->answerC ?></label>
				</div>
				<div class="custom-control custom-radio">
				  <input onclick="simpan_jawaban();" value="D" type="radio" name="<?= 'answer_'.$op->nomor ?>" class="custom-control-input" id="<?= 'answer_'.$op->nomor.'_D' ?>" <?= $check_d ?> >
				  <label class="custom-control-label" for="<?= 'answer_'.$op->nomor.'_D' ?>"><?= $op->answerD ?></label>
				</div>

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
    
    
    <script type="text/javascript">
  function submitform() {
    //   alert("AS");
    document.getElementById("theForm").submit();
  }
</script>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function simpan_jawaban(){
         $.ajax({
          url:"<?= base_url() ?>hitung/reading_proses_ajax",
          method:"POST",
          data:$("#theForm").serialize(),
          beforeSend:function(){
             console.log("beforeSend");
          },success:function(data){
             console.log("Success");
            // alert("As");
          }
        })
    }
  </script>