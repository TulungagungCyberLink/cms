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
	<?php $this->load->view('admin/sidebar', array('menu' => 9)) ?>

	<div class="content-wrapper">

		<section class="content container-fluid">
			<?php flash() ?>

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cookies</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-hover" id="cookies">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tanggal</th>
								<th>Nilai</th>
								<th>Host</th>
								<th style="min-width: 80px;">Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>

		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>

	<div id="viewCookie" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Cookie</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
  
</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
<script>
	$(document).ready(function() {
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
			"processing": true,
			"serverSide": true,
			"ajax": '<?= base_url('admin/cookies/data') ?>',
			"order": [[0, "desc" ]]
		};
		var tableMember = $('#cookies').DataTable(config);

		$('#cookies').on('click', 'tbody .delete', function(event){
			event.preventDefault();
			if(window.confirm("Apakah kamu ingin menghapus cookie?")){
				$.ajax({
					url: '<?= base_url('admin/cookies/hapus/') ?>'+$(this).data('id'),
					method: 'get',
					dataType: 'json',
					complete: function(){
						tableMember.ajax.reload();
					}
				});
			}
		});

		$('#cookies').on('click', 'tbody .view', function(event){
			event.preventDefault();
			$.ajax({
				url: '<?= base_url('admin/cookies/view/') ?>'+$(this).data('id'),
				method: 'get',
				dataType: 'json',
				success: function(result){
					var html = '<dl class="dl-horizontal">';

					$.each(result, function(index, data) {
						html += '<dt>'+index+'</dt>';
						html += '<dd>'+data+'</dd>';
					});
               		
               		html += '</dl>';
					$('#viewCookie .modal-body').html(html);
					$('#viewCookie').modal('show');
				},
				error: function(){
					alert('error to view cookie');
				}
			});

			$('#viewCookie').on('hide.bs.modal', function(){
				$(this).find('.modal-body').html('');
			});
		});

	});
</script>
</body>
</html>