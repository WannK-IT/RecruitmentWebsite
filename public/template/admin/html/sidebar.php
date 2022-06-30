<?php
ob_start();

// manager post
$createPost         = HelperBackEnd::createItemSide('Tạo tin tuyển dụng', 'far fa-plus-square', 'admin', 'post', 'formPost&task=add');
$listPost           = HelperBackEnd::createItemSide('Danh sách tin đăng', 'fas fa-list-ul', 'admin', 'post', 'index');

// manage candidate
$profileApply       = HelperBackEnd::createItemSide('Hồ sơ ứng tuyển', 'fas fa-user-tie', 'admin', 'candidate', 'list');
$profileSaved       = HelperBackEnd::createItemSide('Hồ sơ đã lưu', 'fas fa-heart', 'admin', 'candidate', 'saved');
$profileFind        = HelperBackEnd::createItemSide('Tìm ứng viên', 'fas fa-search', 'admin', 'candidate', 'find');

// manage employer
$infoEmployer       = HelperBackEnd::createItemSide('Tài khoản NTD', 'fas fa-user', 'admin', 'employer', 'account');

// manage news
$createNews         = HelperBackEnd::createItemSide('Tạo tin tức', 'far fa-newspaper', 'admin', 'news', 'formNews', ['taskNews' => 'add']);
$listNews           = HelperBackEnd::createItemSide('Danh sách tin tức', 'fas fa-bars', 'admin', 'news', 'listNews');

// ================== Group Sidebar ==================
$group_Post         = HelperBackEnd::createGroupSide('Quản lý đăng tuyển', 'fas fa-list-alt', [$createPost, $listPost], 'post', $this->arrParam['controller']);
$group_Candidate    = HelperBackEnd::createGroupSide('Quản lý ứng viên', 'fas fa-user-friends', [$profileApply, $profileSaved, $profileFind], 'candidate', $this->arrParam['controller']);
$group_Employer     = HelperBackEnd::createGroupSide('Quản lý tài khoản', 'fas fa-user-circle', [$infoEmployer], 'employer', $this->arrParam['controller']);
$group_News         = HelperBackEnd::createGroupSide('Quản lý tin tức', 'fas fa-newspaper', [$createNews, $listNews], 'news', $this->arrParam['controller']);

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; width: 265px">
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
                <img src="<?= $this->avatarLogo?>" class="img-circle elevation-2" style="width: 35px; height: 35px" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b><?= $this->fullNameEmployer['emp_fullname']?></b></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <?= $group_Post . $group_Candidate . $group_Employer . $group_News ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <div class="d-flex align-items-end">
        
    </div>
    <!-- /.sidebar -->
</aside>