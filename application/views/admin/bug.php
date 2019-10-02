<!DOCTYPE html>
<html lang="id">
<head>
	<title>Dashboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/select2/css/select2.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/adminlte/css/skins/skin-blue.min.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
	
	<?php $this->load->view('admin/header') ?>
	<?php $this->load->view('admin/sidebar', array('menu' => 10)) ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Dashboard</h1>
		</section>

		<section class="content container-fluid">
			<?php flash() ?>

		</section>
	</div>

	<?php $this->load->view('admin/footer') ?>
  
</div>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/moment/moment.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/moment/id.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/select2/js/select2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/logsparser/logsparser.min.js') ?>"></script>
<script type="text/javascript">
    var data = {
        selectLogs: <?php echo json_encode($logs) ?>,
        getUrl: '<?= base_url('admin/bug/api/') ?>',
        downloadUrl: '<?= base_url('admin/bug/api/') ?>',
        deleteUrl: '<?= base_url('admin/bug/api/') ?>',
    }
    $('section.content').LogsParser(data);
</script>
</body>
</html>