<!DOCTYPE html>
<html lang="id">
<head>
	<title>Token</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/skins/skin-blue.min.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
	<style>
		.token-box{
			text-align: center;
		}
		.token-box span{
			display: inline-block;
			padding: 20px;
			border: 2px dashed #000;
			font-size: 3em;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
	
	<?php $this->load->view('admin/header') ?>
	<?php $this->load->view('admin/sidebar', array('menu' => 7)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Token</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-tools">
						<a href="<?= base_url('admin/token/generate') ?>" class="btn btn-primary">Perbarui</a>
					</div>
				</div>
				<div class="box-body">
					<div class="token-box">
						<span><?= $token ?></span>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>
  
</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
</body>
</html>