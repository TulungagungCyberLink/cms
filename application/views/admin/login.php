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
<body class="hold-transition login-page">

<div class="login-box">
	<div class="login-logo">
		<a href="<?= base_url() ?>">Tulungagung Cyber Link</a>
	</div>
	<?php flash() ?>
	<?= validation_errors() ?>

	<div class="login-box-body">
		<p class="login-box-msg">Masuk untuk memulai sesi</p>
		<?= form_open() ?>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-block btn-primary btn-flat">Login</button>
		<?php form_close() ?>
	</div>

</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
</body>
</html>