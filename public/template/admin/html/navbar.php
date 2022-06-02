<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="<?= URL::addLink('default', 'index', 'index')?>" class="nav-link">
            <i class="fas fa-briefcase pr-1"></i>
                <span class="text-sm">Trang tìm việc</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= URL::addLink('admin', 'candidate', 'index')?>" class="nav-link">
            <i class="fas fa-user-tie pr-1"></i>
                <span class="text-sm">Tìm ứng viên</span>
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= $this->avatarLogo?>" class=" user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><b><?= $this->fullNameEmployer['emp_fullname']?></b></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-gradient-info">
                    <img src="<?= $this->avatarLogo?>" class="img-circle elevation-2" alt="User Image">
                    <p><b><?= $this->fullNameEmployer['emp_fullname']?></b><small>Admin</small></p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?= URL::addLink($this->arrParam['module'], 'employer', 'account') ?>" class="btn btn-default btn-flat border border-1">Thông tin</a>
                    <a href="<?= URL::addLink($this->arrParam['module'], 'account', 'logoutAccount') ?>" class="btn btn-default btn-flat float-right border border-1">Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>