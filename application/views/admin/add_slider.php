<!DOCTYPE html>
<html lang="id">
<head>
	<title>Tambah Slider</title>
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
	<?php $this->load->view('admin/sidebar', array('menu' => 3)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Tambah data slider</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>
			<?= validation_errors() ?>
			<div class="box box-primary">
				<div class="box-body">
					<?= form_open_multipart() ?>
						<div class="form-group">
							<label>Isi Text</label>
							<textarea type="text" name="isi_slider_text" placeholder="Isi Slider Text" class="form-control" style="resize: vertical;"><?= set_value('isi_slider_text') ?></textarea>
						</div>
						<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					<?= form_close() ?>
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