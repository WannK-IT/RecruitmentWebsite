<?php
$arrNavbar = [
    HelperFrontEnd::itemNavBar('Ngành nghề', 'fa-solid fa-briefcase', URL::addLink('default', 'career', 'index'), 'career', $this->arrParam['controller']),
    HelperFrontEnd::itemNavBar('Công ty', 'fa-solid fa-building', URL::addLink('default', 'company', 'index'), 'company', $this->arrParam['controller']),
    HelperFrontEnd::itemNavBar('Tin tức', 'fa-solid fa-newspaper', URL::addLink('default', 'news', 'index'), 'news', $this->arrParam['controller'])
];

$navbar = HelperFrontEnd::formNavbar($arrNavbar);


$sessionLogin = '';
if (Authentication::checkLoginDefault()) {
    $sessionLogin =
        '<li class="nav-item dropdown p-0 m-0">
        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
        </a>

        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="true">
            <img src="' . $this->avatarLogo . '" class="avatar rounded-circle me-1" alt="logo" width="40" height="40"> <span class="text-dark pt-3">' . $this->fullNameDefault['user_fullname'] . '</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
            <a class="dropdown-item" href="' . URL::addLink($this->arrParam['module'], 'user', 'index') . '"><i class="fa-solid fa-user-tie pe-2"></i>Trang cá nhân</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="'.URL::addLink($this->arrParam['module'], 'user', 'previewcv').'"><i class="fa-solid fa-address-card pe-2 text-gray"></i>Hồ sơ ứng viên</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="' . URL::addLink($this->arrParam['module'], 'account', 'logout') . '"><i class="fa-solid fa-right-from-bracket pe-2"></i>Đăng xuất</a>
        </div>
    </li>';
} else {
    $sessionLogin =
        '<li class="nav-item me-1">
        <a class="nav-link" href="' . URL::addLink($this->arrParam['module'], 'account', 'login') . '">Đăng nhập</a>
    </li>
    <li class="nav-item me-1 rounded bg-info bg-gradient">
        <a class="nav-link text-white" href="' . URL::addLink('admin', 'post', 'index') . '">Nhà tuyển dụng</a>
    </li>';
}

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow" style="height: 60px;">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="<?= URL::addLink($this->arrParam['module'], 'index', 'index') ?>">
                <span><img class="img-fluid" style="height: 30px;" src="<?= UPLOAD_URL . 'favicon-bg-remove.png' ?>">&nbsp;<b class="text-muted">JobHT</b></span>
            </a>

            <!-- Toggle hide navbar when resize -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Navbar -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?= $navbar?>
                </ul>

                <!-- Right Navbar -->
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?= $sessionLogin ?>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>