<!DOCTYPE html>
<html lang="id">
<head>
	<title>SC DEFACE</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/skins/skin-blue.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/sortable/css/jquery-ui.min.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
	<style type="text/css">
		.sortable > li > .handle{
			cursor: move;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
	
	<?php $this->load->view('admin/header') ?>
	<?php $this->load->view('admin/sidebar', array('menu' => 5)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Nick Script Deface</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>

			<div class="callout callout-success">
				<span>Ini adalah daftar nama yang akan muncul di script deface Tulungagung Cyber Link. Anda bisa menambahkan ataupun mengubah urutan nama dengan melakukan drag and drop.</span>
			</div>
			<a href="<?= base_url('admin/sc/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
			<br><br>
			<div class="box box-primary">
				<div class="box-body">
					<ul class="todo-list sortable">
						<?php foreach ($members as $m) { ?>
						<li data-id="<?= $m->id_nick ?>">
							<span class="handle">
								<i class="fa fa-ellipsis-v"></i>
								<i class="fa fa-ellipsis-v"></i>
							</span>
							<span class="text"><?= $m->nick ?></span>
							<a href="<?= base_url('admin/sc/delete/'.$m->id_nick) ?>" class="pull-right text-right" onclick="return window.confirm('Apakah kamu yakin ingin menghapus nick <?= $m->nick ?>')"><i class="fa fa-trash"></i></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>
  
</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/sortable/js/jquery-ui.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/sortable/js/jquery.ui.touch-punch.min.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.sortable').sortable({
			placeholder: 'sort-highlight',
			handle: '.handle',
			forcePlaceholderSize: true,
			zIndex: 999999
		});

		$('.sortable').on('sortstop', function(){
			var data = [];

			$(this).children().each(function(i){
				data[i] = {
					id_nick: $(this).data('id'),
					urutan: $(this).index()
				};
			});

			console.log(data);

			$.ajax({
				url: '<?= base_url('admin/sc/update') ?>',
				method: 'post',
				data: {
					data: data
				},
			});
		});
	});
</script>
</body>
</html>