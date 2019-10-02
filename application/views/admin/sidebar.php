<?php
	if(!isset($menu)){
		$menu = 0;
	}
?>
<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU</li>
			<li class="<?php if($menu == 1) echo 'active' ?>"><a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li class="<?php if(in_array($menu, array(2,3,4,5), TRUE)) echo 'active' ?> treeview">
				<a href="#">
					<i class="fa fa-database"></i> <span>Data TCL</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($menu == 2) echo 'active' ?>"><a href="<?php echo base_url('admin/member') ?>"><i class="fa fa-users"></i> <span>Anggota</span></a></li>
					<li class="<?php if($menu == 3) echo 'active' ?>"><a href="<?php echo base_url('admin/slider') ?>"><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
					<li class="<?php if($menu == 4) echo 'active' ?>"><a href="<?php echo base_url('admin/message') ?>"><i class="fa fa-envelope"></i> <span>Pesan</span></a></li>
					<li class="<?php if($menu == 5) echo 'active' ?>"><a href="<?php echo base_url('admin/sc') ?>"><i class="fa fa-id-card"></i> <span>Nick SC Deface</span></a></li>
				</ul>
			</li>
			<li class="<?php if(in_array($menu, array(7,9,10), TRUE)) echo 'active' ?> treeview">
				<a href="#">
					<i class="fa fa-wrench"></i> <span>Tools</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($menu == 7) echo 'active' ?>"><a href="<?php echo base_url('admin/token') ?>"><i class="fa fa-handshake-o"></i> <span>Token TCL</span></a></li>
					<li class="<?php if($menu == 9) echo 'active' ?>"><a href="<?php echo base_url('admin/cookies') ?>"><i class="fa fa-briefcase"></i> <span>Cookies</span></a></li>
					<li class="<?php if($menu == 10) echo 'active' ?>"><a href="<?php echo base_url('admin/bug') ?>"><i class="fa fa-bug"></i> <span>Bug App</span></a></li>
				</ul>
			</li>
			<li class="<?php if($menu == 8) echo 'active' ?>"><a href="<?php echo base_url('admin/kas') ?>"><i class="fa fa-money"></i> <span>Kas</span></a></li>
			<li class="<?php if($menu == 6) echo 'active' ?>"><a href="<?php echo base_url('admin/password') ?>"><i class="fa fa-key"></i> <span>Ganti Password</span></a></li>
		</ul>
	</section>
</aside>