<?php

$arrSide = [
    [
        'label'         => HelperFrontEnd::labelSideBar('Hồ sơ cá nhân', 'profile-collapse'),
        'idCollapse'    => 'profile-collapse',
        'link'          => HelperFrontEnd::linkSideBar([
            'Thông tin cá nhân' => 'index.php?module=default&controller=user&action=index',
            'Thông tin hồ sơ' => 'index.php?module=default&controller=user&action=profile',
            'Đổi mật khẩu' => 'index.php?module=default&controller=user&action=changePassword'
        ])
    ],
    [
        'label'         => HelperFrontEnd::labelSideBar('CV của tôi', 'cv-collapse'),
        'idCollapse'    => 'cv-collapse',
        'link'          => HelperFrontEnd::linkSideBar([
            'Xem CV' => 'index.php?module=default&controller=user&action=previewcv',
            'Upload CV' => 'index.php?module=default&controller=user&action=uploadcv' 
        ])
    ],
    [
        'label'         => HelperFrontEnd::labelSideBar('Việc làm của tôi', 'job-collapse'),
        'idCollapse'    => 'job-collapse',
        'link'          => HelperFrontEnd::linkSideBar([
            'Việc làm đã theo dõi' => 'index.php?module=default&controller=user&action=jobSaved',
            'Việc làm đã ứng tuyển' => 'index.php?module=default&controller=user&action=jobApplied'
        ])
    ],

];

$formSideBar = HelperFrontEnd::formSideBarUser($arrSide);

?>

<div class="col-md-3">
    <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
        <a class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Trang thông tin ứng viên</span>
        </a>
        <?= $formSideBar ?>
        
    </div>
</div>