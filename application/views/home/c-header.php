<!--top start here -->
<div class="top">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<ul class="list-inline float-left icon">
					<li>
						<a href="<?= base_url('coming-soon') ?>"><i class="icofont icofont-exclamation-circle"></i>Help center</a>
					</li>
					<li>
						<a href="<?= base_url('coming-soon') ?>"><i class="icofont icofont-support-faq"></i>faq</a>
					</li>
				</ul>
				<ul class="list-inline float-right icon">
				<?php if (!$this->session->userdata('email')): ?>
					<li>
						<a href="<?= base_url('login') ?>"><i class="icofont icofont-key"></i>Login</a>
					</li>
					<li>
						<a href="<?= base_url('register') ?>"><i class="icofont icofont-ui-user"></i>Register</a>
					</li>
				<?php else: ?>
					<li>
						<a href="#"><i class="icofont icofont-ui-user"></i><?= ucwords($this->session->userdata('first_name')) ?></a>
					</li>
					<?php if ($this->db->get_where('tbl_user_score', ['id_user' => $this->session->userdata('id_user'), 'submit' => '1'])->num_rows() > 0): ?>
						<li>
							<a href="<?= base_url('simulation/answerKey') ?>"><i class="icofont icofont-ui-key"></i>Answer Key</a>
						</li>
					<?php endif ?>
					<li>
						<a href="<?= base_url('logout') ?>"><i class="icofont icofont-ui-user"></i>Logout</a>
					</li>
				<?php endif ?>
				
				</ul>
			</div>
		</div>
	</div>
</div>
<!--top end here -->

<!-- header start here-->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div id="logo">
					<a href="<?= base_url() ?>">
						<img style="height: 45px" class="img-fluid" src="<?= base_url('assets/img/logo/') ?>qamuschool-transparant2.png" alt="logo" title="logo" />
					</a>
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12 paddmenu">
				<!-- menu start here -->
				<div id="menu">	
					<nav class="navbar navbar-expand-lg">
						<span class="menutext visible-xs">Menu</span>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i>
						<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarmain">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active">
									<a class="nav-link" href="<?= base_url() ?>">HOME</a>
								</li>
<!-- 								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('about-us') ?>">about us</a>
								</li> -->
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="dropdownmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programs</a>
									<div class="dropdown-menu" aria-labelledby="dropdownmenu">
										<ul class="list-unstyled">
											<li>
												<a class="dropdown-item" href="<?= base_url('toefl-preparation-club') ?>">Toefl Preparation Club</a>
											</li>
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">Focus Structure Club</a>
											</li>
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">Focus Listening & Reading Club</a>
											</li>
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">UTBK</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="dropdownpages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Students</a>
									<div class="dropdown-menu" aria-labelledby="dropdownpages">
										<ul class="list-unstyled">
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">Apa kata mereka ?</a>
											</li>
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">Scholarship Information</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="dropdownevents" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Simulasi Online</a>
									<div class="dropdown-menu" aria-labelledby="dropdownevents">
										<ul class="list-unstyled">
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">Toefl Prediction Test</a>
											</li>
											<li>
												<a class="dropdown-item" href="<?= base_url('coming-soon') ?>">Try Out UTBK</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('events') ?>">Event</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<!-- menu end here -->
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<ul class="list-inline icon float-right">
					<li>
						<button type="button" class="btn-primary" style="color: white">Qamus Cinta Indonesia</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
<!-- header end here -->

<!-- start klik whatsapp -->
    <div class="float-button-wrapper" style="z-index: 2000; position: absolute;">
        <div style="position: fixed; left: 10px; bottom: 50px">
            <a target="_blank" href="https://api.whatsapp.com/send?phone=6282115029525&text=Hello,%20can%20you%20help%20me%20?">
                <img src="<?= base_url('assets/img/logo/').'icon-wa.png' ?>" title="Contact Me" style="width:90px;" >
            </a>
        </div>
    </div>
<!-- end klik whatsapp -->