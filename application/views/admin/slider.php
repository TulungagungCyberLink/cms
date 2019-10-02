<!DOCTYPE html>
<html lang="id">
<head>
	<title>Data Slider</title>
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
			<h1>Daftar Slider</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>
			<div class="box box-primary">
				<div class="box-body">
					<a href="<?= base_url('admin/slider/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Slider</a>
					<br><br>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Isi Text</th>
							</tr>
						</thead>
						<tbody id="sortable">
							<?php foreach ($slider as $s) { ?>
							<div>
								<tr>
									<td><p><?= html_escape($s->isi_slider_text) ?></p></td>
									<td>
										<a href="<?= base_url('admin/slider/delete/'.$s->id_slider_text) ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin untuk menghapus data ini');"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							</div>
							<?php } ?>
						</tbody>
					</table>
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