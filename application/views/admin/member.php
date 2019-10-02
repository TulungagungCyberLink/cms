<!DOCTYPE html>
<html lang="id">
<head>
	<title>Data Member</title>
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
	<?php $this->load->view('admin/sidebar', array('menu' => 2)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Data Member</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>

			<div class="row">
				<div class="col-sm-12">
					<a href="<?= base_url('admin/member/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Anggota</a>
					<br><br>
				</div>
				<?php foreach ($member as $m) { ?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
					<div class="box box-primary">
						<img src="<?= base_url('home/photo/'.$m->image) ?>" class="img-responsive center-block">
						<div class="box-body">
							<p class="box-title"><?= html_escape($m->nickname) ?></p>
							<span class="badge bg-blue"><?= html_escape($m->nama_role) ?></span>
							<p></p>
							<a href="<?= base_url('admin/member/delete/'.$m->id_member) ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin untuk menghapus data ini');"><i class="fa fa-trash"></i> Hapus</a>
						</div>
					</div>
				</div>
				<?php } ?>
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