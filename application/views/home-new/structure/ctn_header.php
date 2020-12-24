<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">
	     	<a href="<?= base_url() ?>" class="logo mr-auto">
	    		<img src="<?= base_url('assets/template/original/') ?>assets/img/logo-qamus.png" alt="" class="img-fluid">
	     	</a>
	    	<nav class="nav-menu d-none d-lg-block">
	        	<ul>
	        		<li class="active"><a href="<?= base_url() ?>">Home</a></li>
	          		<li class="drop-down"><a>Program</a>
	            <ul>
	              	<li><a href="<?= base_url('online-prediction') ?>">Online Toefl Prediction</a></li>
	              	<li><a href="<?= base_url('materi-toefl') ?>">Materi Toefl Preparation</a></li>
	            </ul>
	          		</li>
	          		<li class="active">
	            		<a href="<?= base_url('event') ?>">Event</a>
	          		</li>
	          		<li class="active">
	            		<a href="<?= base_url('les-private') ?>">Les Private</a>
	          		</li>
	        	</ul>
	    	</nav>
			<?php if (!$this->session->userdata('email')): ?>
				<a href="<?= base_url('login') ?>" class="get-started-btn scrollto">Login/Register</a>
			<?php else: ?>
			    <?php 
					if ($this->session->userdata('username') == '') {
						$name = $this->session->userdata('first_name');
					} else {
						$name = $this->session->userdata('username');
					} 
				?>
				<a href="<?= base_url('dashboard/prediction-test') ?>" class="get-started-btn"><?= $name ?></a>
				<a href="<?= base_url('logout') ?>" class="get-started-btn scrollto">Logout</a>
			<?php endif ?>
    	</div>
	</header>
<!-- End Header -->
