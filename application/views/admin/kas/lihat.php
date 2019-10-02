<!DOCTYPE html>
<html lang="id">
<head>
	<title>Data Kas</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/css/dataTables.bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/skins/skin-blue.min.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
	
	<?php $this->load->view('admin/header') ?>
	<?php $this->load->view('admin/sidebar', array('menu' => 8)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Kas</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>

			<div class="row">
				<div class="col-md-9">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Daftar Kas</h3>
						</div>
						<div class="box-body table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Nickname</th>
										<th>Nominal</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($unpaid as $u){ ?>
									<tr>
										<td><?= $u->nickname ?></td>
										<td><?= $u->amount ?></td>
										<td>
											<a href="<?= base_url("admin/kas/bayar/$u->id_kas/$u->id_member") ?>" class="btn btn-primary btn-sm" onclick="return window.confirm('Apakah kamu yakin ingin memproses pembayaran <?= $u->nickname ?>')">Bayar</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="info-box bg-aqua">
						<span class="info-box-icon"><i class="fa fa-money"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">KAS</span>
							<span class="info-box-number"><?= idr($kas->amount) ?></span>

							<div class="progress">
								<div class="progress-bar" style="width: <?= round((count($paid)/$kas->total)*100) ?>%"></div>
							</div>
							<span class="progress-description"><?= count($paid)." Dari ".$kas->total." Orang" ?></span>
						</div>
					</div>

					<div class="box box-success">
						<div class="box-footer no-padding">
							<ul class="nav nav-stacked">
								<?php if(count($paid) == 0){ ?>
								<li><a href="#" class="disabled">Tidak ada data</a></li>
								<?php } ?>
								
								<?php foreach($paid as $p){ ?>
								<li><a href="<?= base_url("admin/kas/reverse/$p->id_kas/$p->id_member") ?>" onclick="return window.confirm('Apakah kamu yakin ingin membatalkan pembayaran <?= $p->nickname ?>')"><?= $p->nickname ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>
  
</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('table').each(function(){
			var config = {
				"language" : {
					"sProcessing":   "Sedang memproses...",
					"sLengthMenu":   "Tampilkan _MENU_ entri",
					"sZeroRecords":  "Tidak ditemukan data yang sesuai",
					"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
					"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
					"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
					"sInfoPostFix":  "",
					"sSearch":       "Cari:",
					"sUrl":          "",
					"oPaginate": {
						"sFirst":    "Pertama",
						"sPrevious": "Sebelumnya",
						"sNext":     "Selanjutnya",
						"sLast":     "Terakhir"
					}
				},
				"order": [[0, "desc" ]]
			}
			$(this).DataTable(config);
		});
	});
</script>
</body>
</html>