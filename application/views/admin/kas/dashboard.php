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

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Daftar Kas</h3>
					<div class="box-tools">
						<a href="<?= base_url('admin/kas/cetak') ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</a>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addKas"><i class="fa fa-plus"></i> Tambah kas</a>
					</div>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-hover" id="tabel-kas">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tanggal</th>
								<th>Nilai</th>
								<th>Belum membayar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Nama Member</h3>
					<div class="box-tools">
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMember"><i class="fa fa-plus"></i> Tambah member</a>
					</div>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-hover" id="tabel-member">
						<thead>
							<tr>
								<th>Nickname</th>
								<th>Catatan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>

	<div id="addKas" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<?= form_open('admin/kas/tambah') ?>
					<div class="modal-header">
						<h4 class="modal-title">Tambah Kas</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nominal Uang</label>
							<input type="number" name="amount" placeholder="Nominal Uang" class="form-control" value="<?= $nominal ?>" required="required">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
					</div>
				<?= form_close("\n") ?>
			</div>
		</div>
	</div>

	<div id="addMember" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Member</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nickname</label>
						<input type="text" name="nickname" placeholder="Nickname" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary pull-right" id="saveMember"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
  

	<div id="editMember" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Member</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nickname</label>
						<input type="text" name="nickname" placeholder="Nickname" class="form-control">
						<input type="hidden" name="id" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary pull-right" id="updateMember"><i class="fa fa-save"></i> Simpan</button>
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
		var tableMember;
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
			}
		};
		$('#tabel-kas').each(function(){
			config["processing"] = true,
			config["serverSide"] = true,
			config["ajax"] = '<?= base_url('admin/kas/data') ?>',
			config["order"] = [[0, "desc" ]]
			
			$(this).DataTable(config);
		});

		$('#tabel-member').each(function(){
			config["processing"] = true,
			config["serverSide"] = true,
			config["ajax"] = '<?= base_url('admin/kas/data_member') ?>',
			config["order"] = [[0, "desc" ]]
			
			tableMember = $(this).DataTable(config);
		});

		$('#saveMember').click(function(){
			var nickname = $(this).closest('.modal-content').find('input[name="nickname"]').val();
			$.ajax({
				url: '<?= base_url('admin/kas/tambah_member') ?>',
				method: 'post',
				dataType: 'json',
				beforeSend: function(){
					$('#addMember').modal('hide');
				},
				data: {
					nickname: nickname
				},
				success: function(result){
					tableMember.ajax.reload();
				},
				complete: function(){
					$(this).closest('.modal-content').find('input[name="nickname"]').val(null);
				}
			});
		});

		$('#tabel-member').on('click', 'tbody .delete', function(event){
			event.preventDefault();
			if(window.confirm("Apakah kamu ingin menghapus "+$(this).closest('tr').children().first().text()+" dari daftar pembayar kas?")){
				$.ajax({
					url: '<?= base_url('admin/kas/hapus_member') ?>',
					method: 'post',
					dataType: 'json',
					data: {
						id: $(this).data('id')
					},
					complete: function(){
						tableMember.ajax.reload();
					}
				});
			}
		});

		$('#tabel-member').on('click', 'tbody .edit', function(event){
			event.preventDefault();
			$('#editMember').find('input[name="id"]').val($(this).data('id'));
			$('#editMember').find('input[name="nickname"]').val($(this).closest('tr').children().first().text());
			$('#editMember').modal('show');
		});

		$('#editMember').on('hide.bs.modal', function(){
			$('#editMember').find('input[name="id"]').val('');
			$('#editMember').find('input[name="nickname"]').val('');
		});

		$('#updateMember').click(function(){
			$.ajax({
				url: '<?= base_url('admin/kas/edit_member') ?>',
				method: 'post',
				dataType: 'json',
				beforeSend: function(){
					$('#editMember').modal('hide');
				},
				data: {
					id: $('#editMember').find('input[name="id"]').val(),
					nickname: $('#editMember').find('input[name="nickname"]').val()
				},
				complete: function(){
					tableMember.ajax.reload();
				}
			});
		});

	});
</script>
</body>
</html>