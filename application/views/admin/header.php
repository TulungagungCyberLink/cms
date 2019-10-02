<header class="main-header">
    <a href="<?= base_url() ?>" class="logo">
        <span class="logo-mini"><span class="fa fa-user-secret"></span></span>
        <span class="logo-lg"><span class="fa fa-user-secret"></span> TCL</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?= $this->session->userdata('username') ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <h4 class="img-circle" alt="User Image"><span class="fa fa-user fa-4x fa-inverse"></span></h4>
                            <p>
                                <?= $this->session->userdata('username') ?>
                                <small><?= $this->session->userdata('role') ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?= base_url('admin/logout') ?>" class="btn btn-danger btn-flat"><span class="fa fa-sign-out"></span> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>