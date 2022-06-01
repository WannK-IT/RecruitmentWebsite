<?php
ob_start();
$createPost = HelperBackEnd::createItemSide('Tạo tin tuyển dụng', 'far fa-plus-square', 'admin', 'post', 'formPost&task=add');
$listPost = HelperBackEnd::createItemSide('Danh sách tin đăng', 'fas fa-list-ul', 'admin', 'post', 'index');

$infoEmployer = HelperBackEnd::createItemSide('Tài khoản NTD', 'fas fa-user', 'admin', 'employer', 'account');

$group_Post = HelperBackEnd::createGroupSide('Quản lý đăng tuyển', 'fas fa-list-alt', [$createPost, $listPost], 'post');
$group_Employer = HelperBackEnd::createGroupSide('Quản lý tài khoản', 'fas fa-user-circle', [$infoEmployer], 'user');
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= URL::addLink('admin', 'post', 'index') ?>" class="brand-link">
        <img src="<?= UPLOAD_URL . 'favicon.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>JOBHT</b></span>
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
    <div class="d-flex align-items-end">
        
    </div>
    <!-- /.sidebar -->
</aside>