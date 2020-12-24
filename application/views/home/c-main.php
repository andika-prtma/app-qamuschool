

<!-- slider start here -->
<div class="slide">
	<div class="slideshow owl-carousel">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<img src="<?= base_url('assets/img/slider/') ?>slider1.jpg" alt="banner" title="banner" class="img-fluid"/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<img src="<?= base_url('assets/img/slider/') ?>slider2.jpg" alt="banner" title="banner" class="img-fluid"/>
			</div>
		</div><div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<img src="<?= base_url('assets/img/slider/') ?>slider3.jpg" alt="banner" title="banner" class="img-fluid"/>
			</div>
		</div>
	</div>

	<!-- slide-detail start here -->
	<div class="slide-detail">
		<div class="container">
			<div class="matter" style="background-color: rgba(87, 160, 201, 0.6)">
				<p class="text">Teman Belajar Qamu</p>
				<h4 style="color: black">Qamus Cinta Indonesia</h4>
				<marquee>
					<p class="des">Qamuschool is your learning companion platform, which can be accessed by you to get tutor information, online learning, online test simulations and scholarship information.</p>
				</marquee>
			</div>
			<div class="matter2">
				<h2>Search</h2>
				<?= form_open('simulation', 'class="form-horizontal"') ?>
					<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
							<div class="row">
								<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<select class="custom-select" id="location" required>
											<option value="1">Pilih Simulasi </option>
											<option value="1">Simulasi Toefl</option>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<select class="custom-select" id="location" required name="paket">
											<option value="3">Paket 1</option>
											<!-- <option value="2">Paket 2</option> -->
										</select>
									</div>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
									<input name="code_tes" class="form-control" value="" placeholder="Masukan Kode" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
							<button class="btn-primary" type="submit">Mulai Test</button>
						</div>	
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>	
	<!-- slide-detail end here -->
</div>
<!-- slider end here -->

<!-- service start here -->
<div class="service">
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-12 col-xs-12">
				<div class="commontop text-center">
					<h2>our best service for you</h2>
					<p>Berikut pelayanan menarik yang bisa di dapatkan di Qamuschool</p>
					<hr>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12 box text-center">
				<div class="icons">
					<div class="icon">
						<img src="<?= base_url('assets/edu-theme/') ?>images/icon_01.png" class="img-fluid" alt="icon" title="icon" />
					</div>
				</div>
				<h4>Toefl Prediction</h4>
				<p>Program yang memungkinan kamu untuk melakukan simulasi test toefl online dimanapun dan kapanpun.</p>
			</div>
			<div class="col-sm-6 col-xs-12 box text-center">
				<div class="icons">
					<div class="icon">
						<img src="<?= base_url('assets/edu-theme/') ?>images/icon_02.png" class="img-fluid" alt="icon" title="icon" />
					</div>
				</div>
				<h4>Toefl Preparation</h4>
				<p>Program TPC dipersiapkan untuk kamu yang ingin menaikan level TOEFL ITP mu dengan biaya investasi yang sangat terjangkau.</p>
			</div>
			<!--<div class="col-sm-4 col-xs-12 box text-center">-->
			<!--	<div class="icons">-->
			<!--		<div class="icon">-->
			<!--			<img src="<?= base_url('assets/edu-theme/') ?>images/icon_03.png" class="img-fluid" alt="icon" title="icon" />-->
			<!--		</div>-->
			<!--	</div>-->
			<!--	<h4>Matematika</h4>-->
			<!--	<p>Banyak materi yang bisa diakses secara online dari mulai SD sampai Universitas</p>-->
			<!--</div>-->
		</div>
	</div>
</div>
<!-- service end here -->

<!-- about start here -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="commontop text-left">
					<h2>Qamuschool di Mata Mereka</h2>
					<p>Dimata para member qamuschool, Qamuschool itu seperti apa sih ? <br> Berikut ini Qamuschool di mata mereka.</p>
					<hr>
				</div>
				<div class="image">
					<!-- <div class="embed-responsive embed-responsive-16by9" style="border-style: ridge;">
					  <iframe auto class="embed-responsive-item" src="<?= base_url('assets/video/') ?>Testimoni_Ade.mp4"></iframe>
					</div> -->
					<div class="embed-responsive embed-responsive-16by9 hoverable">
					  <video class="embed-responsive-item" controls autostart="false">
					    <source src="<?= base_url('assets/video/') ?>Testimoni_Ade.mp4" type="video/mp4">
					  </video>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 feature">
				<div class="commontop text-left">
					<h2>our Library</h2>
					<p>Ada beberapa pembelajaran yang disediakan Qamuschool untuk Qamu</p>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- about end here -->

<!-- courses start here -->
<div class="course">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="commontop text-center">
					<h2>News Update</h2>
					<p>Jangan sampai ketinggalan update info dari instagram Qamuschool.</p>
					<hr>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="courses owl-carousel">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<img src="<?= base_url('assets/img/thumb/') ?>th1.jpg" class="img-fluid" alt="img" title="img" />
							</div>
							<div class="caption">
								<h3>Information</h3>
								<h4>Jenis Jenis Toefl</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="https://www.instagram.com/p/CBQVECiJ6J3/?utm_source=ig_web_copy_link" class="btn btn-success" style="color: white" target="_blank">Detail</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<img src="<?= base_url('assets/img/thumb/') ?>th2.jpg" class="img-fluid" alt="img" title="img" />
							</div>
							<div class="caption">
								<h3>Tips</h3>
								<h4>Bijak ber Smartphone</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="https://www.instagram.com/p/CBf2qXHDnUB/?igshid=lpvcobb41mjn" class="btn btn-success" style="color: white" target="_blank">Detail</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
									<img src="<?= base_url('assets/img/thumb/') ?>th3.jpg" class="img-fluid" alt="img" title="img" />
							</div>
							<div class="caption">
								<h3>Tips</h3>
								<h4>Fokus saat sibuk</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="https://www.instagram.com/p/CBh_dB9DgYV/?igshid=1r11y57lrf6s4" class="btn btn-success" style="color: white" target="_blank">Detail</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<img src="<?= base_url('assets/img/thumb/') ?>th4.jpg" class="img-fluid" alt="img" title="img" />
							</div>
							<div class="caption">
								<h3>Announcement</h3>
								<h4>Highest Score</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="https://www.instagram.com/p/CCBClWOjmT_/?igshid=wuw99b5odged" class="btn btn-success" style="color: white" target="_blank">Detail</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<img src="<?= base_url('assets/img/thumb/') ?>th5.jpg" class="img-fluid" alt="img" title="img" />
							</div>
							<div class="caption">
								<h3>Promotion</h3>
								<h4>Toefl Preparation Test</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="https://www.instagram.com/p/CCdWrsrD72x/?igshid=hz12ydemxo6y" class="btn btn-success" style="color: white" target="_blank">Detail</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- courses end here -->

<!-- featured start here -->
<div class="featured">
	<div class="image">
		<img src="<?= base_url('assets/img/') ?>1920x300-2.jpg" class="img-fluid" alt="bg" title="bg" />
	</div>
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="list-inline text-center">
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="<?= base_url('assets/edu-theme/') ?>images/features/icon1.png" class="img-fluid" alt="image" title="image" />	
									</div>
								</div>
								<h4>City Reached</h4>
								<p>15</p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="<?= base_url('assets/edu-theme/') ?>images/features/icon2.png" class="img-fluid" alt="image" title="image" />	
									</div>
								</div>
								<h4>Participants</h4>
								<p>390</p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="<?= base_url('assets/edu-theme/') ?>images/features/icon3.png" class="img-fluid" alt="image" title="image" />	
									</div>
								</div>
								<h4>Active Members</h4>
								<p>80</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- featured end here -->

<!-- newsletter start here -->
<div id="newsletter">
	<div class="container">
		<div class="row">
			<div id="subscribe">
				<form class="form-horizontal" name="subscribe">
					<div class="col-sm-12"> 
						<p class="news">SUBSCribe to our <span>newsletter</span></p>
					</div>
					<div class="col-sm-12 form-group">
						<div class="input-group">
							<input  value="" name="subscribe_email" id="subscribe_email" placeholder="Type your e-mail..." type="text">
							<button class="btn btn-news" type="" value="submit">Submit</button>
						</div>
					</div>
				</form>
			</div> 
		</div>
	</div>
</div>
<!-- newsletter end here -->

