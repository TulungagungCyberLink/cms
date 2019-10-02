<!DOCTYPE html>
<html lang="id">
<head>
	<title>Dashboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/skins/skin-blue.min.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
	
	<?php $this->load->view('admin/header') ?>
	<?php $this->load->view('admin/sidebar', array('menu' => 1)) ?>

	<div class="content-wrapper">

		<section class="content container-fluid">
			<?php flash() ?>
			
			<h1 class="text-center" id="welcome"><?= html_escape($msg) ?></h1>
			<?= form_open('admin/home/change_welcome', 'id="changeWelcome" style="display: none;"') ?>
				<input type="text" name="welcome" class="form-control input-lg text-center" value="<?= html_escape($msg) ?>">
			<?= form_close() ?>

		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>
  
</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#welcome').dblclick(function(){
			$(this).hide();
			$('#changeWelcome').show();
		});

		$('#changeWelcome input').blur(function(){
			$('#changeWelcome').submit();
		});
	});
</script>

</body>
</html>