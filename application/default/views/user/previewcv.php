<?php
$info = $this->infoCV;

$info['soft_skl']   = (empty(trim($info['soft_skl']))) ? 'Chưa cập nhật' : $info['soft_skl'];
$info['degree']     = (empty(trim($info['degree']))) ? 'Chưa cập nhật' : $info['degree'];

if (trim($info['position']) != null) {
    $xhtml = '<div class="col-12">
        <div class="row mb-4">
            <div class="col-2">
                <img src="' . $this->avatarLogo . '" alt="logo_employee" class="circular-portrait">
            </div>
            <div class="pt-3 col-6">
                <p class="m-0 fw-bold h5">' . $info['user_fullname'] . '<span class="ps-3"></span></p>
                <p class="text-muted">' . $info['position'] . '</p>
                <p class="m-0" style="font-size: 14px;"><i class="fas fa-birthday-cake text-purple pe-2"></i>Ngày sinh: ' . date('d/m/Y', strtotime($info['birthday'])) . '</p>
                <p style="font-size: 14px;"><i class="fas fa-venus-mars pe-1 text-purple"></i>Giới tính: ' . $info['gender'] . '</p>
            </div>
        </div>


        <!-- Timeline info candidate -->
        <ul class="timeline-with-icons ms-3" style="font-size: 1rem;">
            <li class="timeline-item mb-4">
                <span class="timeline-icon">
                    <i class="fas fa-user-tie text-white fa-sm fa-fw"></i>
                </span>

                <h5 class="fw-bold text-purple">Thông tin cơ bản</h5>
                <p>
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0">Trình độ học vấn: <span class="text-muted">' . $info['level'] . '</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="m-0">Kinh nghiệm làm việc: <span class="text-muted">' . $info['exp'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0">Tình trạng hôn nhân: <span class="text-muted">' . $info['marriage'] . '</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="m-0">Tỉnh/Thành phố: <span class="text-muted">' . $info['city'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0">Ngành nghề: <span class="text-muted">' . $info['career'] . '</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="m-0">Nơi làm việc: <span class="text-muted">' . $info['workplace'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0">Cấp bậc: <span class="text-muted">' . $info['rank'] . '</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="m-0">Địa chỉ: <span class="text-muted">' . $info['address'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0">Mức lương: <span class="text-muted">' . $info['salary'] . '</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="m-0">Loại hình làm việc: <span class="text-muted">' . $info['type_work'] . '</span></p>
                    </div>
                </div>
                <p></p>
            </li>

            <li class="timeline-item mb-4">
                <span class="timeline-icon">
                    <i class="fas fa-award text-white fa-sm fa-fw"></i>
                </span>
                <h5 class="fw-bold text-purple">Kỹ năng bản thân</h5>
                <p class="text-muted mb-2 fw-bold">Kỹ năng chuyên môn</p>
                <p class="text-muted m-0">
                    ' . $info['hard_skl'] . '
                </p>

                <p class="text-muted mb-2 fw-bold pt-3">Kỹ năng xã hội</p>
                <p class="text-muted m-0">
                    ' . $info['soft_skl'] . '
                </p>
            </li>

            <li class="timeline-item mb-4">

                <span class="timeline-icon">
                    <i class="fas fa-trophy text-white fa-sm fa-fw"></i>
                </span>
                <h5 class="fw-bold text-purple">Mục tiêu nghề nghiệp</h5>
                <p class="text-muted">
                    ' . $info['career_goals'] . '
                </p>
            </li>

            <li class="timeline-item mb-4">
                <span class="timeline-icon">
                    <i class="fas fa-business-time text-white fa-sm fa-fw"></i>
                </span>
                <h5 class="fw-bold text-purple">Kinh nghiệm làm việc</h5>
                <p class="text-muted">
                    ' . $info['exp_work'] . '
                </p>
            </li>

            <li class="timeline-item mb-4">
                <span class="timeline-icon">
                    <i class="fas fa-user-graduate text-white fa-sm fa-fw"></i>
                </span>
                <h5 class="fw-bold text-purple">Học vấn bằng cấp</h5>
                <p class="text-muted">
                    ' . $info['degree'] . '
                </p>
            </li>

        </ul>

    </div>';
}else{
    $xhtml = '<div class="text-center">
                <p class="mt-2">Bạn cần cập nhật hồ sơ ứng tuyển !</p>
                <a href="'.URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'profile').'" class="btn bg-purple">Tạo CV ngay</a>
            </div>';
}

?>

<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <?= $xhtml ?>
            </div>
        </div>
    </div>
</div>