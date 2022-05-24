<?php
ob_start();
$createPost = Helper::createItemSide('Tạo tin tuyển dụng', 'far fa-plus-square', 'admin', 'post', 'formPost&task=add');
$listPost = Helper::createItemSide('Danh sách tin đăng', 'fas fa-list-ul', 'admin', 'post', 'index');

$infoEmployer = Helper::createItemSide('Tài khoản NTD', 'fas fa-user', 'admin', 'employer', 'account');

$group_Post = Helper::createGroupSide('Quản lý đăng tuyển', 'fas fa-list-alt', [$createPost, $listPost], 'post');
$group_Employer = Helper::createGroupSide('Quản lý tài khoản NTD', 'fas fa-user-circle', [$infoEmployer], 'user');
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= URL::addLink('admin', 'post', 'index') ?>" class="brand-link">
        <img src="<?= $this->_dirImg ?>AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Recruitment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $this->avatarLogo?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b><?= $this->fullNameEmployer['emp_fullname']?></b></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?= $group_Post . $group_Employer ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>