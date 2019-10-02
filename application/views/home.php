<!DOCTYPE html>
<html lang="id">
<head>
	<title>Tulungagung Cyber Link</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="TCL, tcl, Tulungagung Cyber Link, Defacer, Hacker, Cyber, Anonymous" />
	<link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/css/bootstrap-grid.min.css') ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/images/favicon.ico') ?>" rel="shortcut icon" type="image/ico" media="all" />
	<link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/flexslider.css') ?>" type="text/css" media="screen" />
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="http://fonts.googleapis.com/css?family=Raleway:200,300,400,600,700,800,900" rel="stylesheet">

</head>
<body>

	<div class="banner" id="home">
		<div class="w3-agile-dot">
			<div class="header">
				<div class="header-main">
					<div class="container">
						<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<h1>
									<a href="index.html">TCL</a>
								</h1>
							</div>
							
							<div class="collapse navbar-collapse cl-effect-13" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li>
										<a href="#home" class="active scroll">Beranda</a>
									</li>
									<li>
										<a href="#team" class="scroll">Hall of Fame</a>
									</li>
									<li>
										<a href="#contact" class="scroll">Kontak</a>
									</li>
									<li>
										<a href="<?= base_url('download') ?>"><i class="fa fa-download"></i></a>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</nav>
					</div>
				</div>
				<div class="container">
					<div class="banner-bottom">
						<section class="slider">
							<div class="flexslider">
								<ul class="slides">
									<?php foreach($slider as $s){ ?>
									<li>
										<div class="banner-bottom-text">
											<h3><?= html_escape($s->isi_slider_text) ?></h3>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</section>
						<div class="thim-click-to-bottom">
							<a href="#team" class="scroll">
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="team" id="team">
		<div class="container">
			<br><br><br><br>
			<h3 class="w3layouts-heading white-title text-center">Hall of Fame</h3>
		</div>
		<div class="container">
			<div class="row agileits-w3layouts-team-grids">
				<?php foreach ($member as $m){ ?>
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-xl-2 agileits-w3layouts-team-grid">
					<div class="team-info">
						<img src="<?= base_url('home/photo/'.$m->image) ?>" alt="">
						<div class="team-caption">
							<h4><?= html_escape($m->nickname) ?></h4>
							<p><?= html_escape($m->nama_role) ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="contact-sectn" id="contact">
		<div class="container">
			<h3 class="w3layouts-heading white-title">Hubungi
				<span>Kami</span>
			</h3>
			<div class="w3-agile_mail_grids">
				<div class="col-md-5 contact-left-w3-agile-sectn">
					<h2>Info Kontak</h2>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-instagram" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text-w3-agile">
							<h4>Instagram</h4>
							<p><a href="http://instagram.com/tulungagungcyberlink">@tulungagungcyberlink</a></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="mail-w3ls">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text-w3-agile">
							<h4>Surel kami</h4>
							<p>
								<a href="mailto:admin@tulungagungcyberlink.org">admin@tulungagungcyberlink.org</a>
							</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-group" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text-w3-agile">
							<h4>Forum</h4>
							<p>
								<a href="forum.tulungagungcyberlink.org">forum.tulungagungcyberlink.org</a>
							</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-7 w3-agile_mail_grid_right">
					<h3>Isi formulir ini untuk mengirimkan pesan kepada kami.</h3>
					<?= form_open('home/send', array('id'=>'form-contact')) ?>
						<input type="text" name="name" placeholder="Name" required="">
						<input type="email" name="email" placeholder="Email" required="">
						<input type="text" name="subject" placeholder="Subject" required="">
						<textarea name="message" placeholder="Message..." required></textarea>
						<input type="submit" value="Submit">
						<input type="reset" value="Clear">
					<?= form_close() ?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<div class="copy">
		<p>© 2018 Tulungagung Cyber Link | Design by MYXZLPLTK</p>
	</div>
	
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	
	<script src="<?= base_url('assets/js/main.js') ?>"></script>
	
	<script defer src="<?= base_url('assets/js/jquery.flexslider.js') ?>"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	
	<script type="text/javascript" src="<?= base_url('assets/js/move-top.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/easing.js') ?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000, function(){
					$('.scroll').removeClass('active');
					$(this).addClass('active');
				});
			});
		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function () {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>
	
	<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#form-contact').submit(function(){

				var form = this;

				$.ajax({
					url: '<?= base_url("home/send") ?>',
					dataType: 'json',
					data: $(form).serializeArray(),
					method: 'post',
					success: function(){
						$(form).siblings('h3').html('Terima kasih telah mengirim pesan kepada kami');
						$(form).fadeOut('slow', function(){
							$(form).remove();
						});
					},
					error: function(){
						alert('Gagal mengirim');
					}
				});

				return false;
			});
		});
	</script>

</body>

</html>