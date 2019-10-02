
<html lang="id">
<head>
	<title>Data Pesan</title>
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
	<?php $this->load->view('admin/sidebar', array('menu' => 4)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Daftar Pesan</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>
			<div class="box box-primary">
				<div class="box-body table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Judul</th>
								<th>Isi Pesan</th>
								<th>Tanggal</th>
								<th><a href="<?= base_url('admin/message/delete/') ?>" class="btn btn-danger" onclick="return window.confirm('PERHATIKAN! INI BUKAN BASA BASI\nApakah anda yakin untuk menghapus semua pesan? Dengan kamu mengklik ya berarti semua pesan yang ada disini akan terhapus oleh sistem.');"><i class="fa fa-trash"></i></a></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($message as $k => $m) { ?>
							<tr>
								<td><p><?= ($from-1)*$this->config->item('limit_pagination')+$k+1 ?></p></td>
								<td><p><?= html_escape($m->name) ?></p></td>
								<td><p><?= html_escape($m->email) ?></p></td>
								<td><p><?= html_escape($m->subject) ?></p></td>
								<td><p><?= html_escape($m->message) ?></p></td>
								<td><p><?= date_format(date_create($m->messageDate), 'd-m-Y') ?></p></td>
								<td>
									<a href="<?= base_url('admin/message/delete/'.$m->id_message) ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin untuk menghapus data ini');"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php } ?>
							<?php if(count($message) == 0){ ?>
							<tr>
								<td colspan="7" align="center">Data Kosong</td>
							</tr>
							<?php } ?>

						</tbody>
					</table>
					<div class="text-center">
						<?= $this->pagination->create_links() ?>
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