<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"><i class="fas fa-eye"></i>&nbsp;View site</a>
        </li> -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= $this->_dirImg?>admin2.png" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?= Session::get('loginFullname')?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-info">
                    <img src="<?= $this->_dirImg?>admin2.png" class="img-circle elevation-2" alt="User Image">
                    <p><?= Session::get('loginFullname')?><small>Admin</small></p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat border border-1">Profile</a>
                    <a href="<?= URL::addLink($this->arrParam['module'], 'employer', 'logoutAccount')?>" class="btn btn-default btn-flat float-right border border-1">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>