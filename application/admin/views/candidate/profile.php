<?php
$info = $this->infoProfile;

if (!empty($info['user_avatar'])) {
        $avatar = UPLOAD_URL_DEFAULT . 'img/' . $info['user_id'] . DS . $info['user_avatar'];
} else {
    if ($info['gender'] == 'Nam') {
        $avatar = IMG_URL_DEFAULT . 'logo_default_male.png';
    } else {
        $avatar = IMG_URL_DEFAULT . 'logo_default_female.png';
    }
}

$info['soft_skl']   = (empty(trim($info['soft_skl']))) ? 'Chưa cập nhật' : $info['soft_skl'];
$info['degree']     = (empty(trim($info['degree']))) ? 'Chưa cập nhật' : $info['degree'];

$xhtml = '<div class="card-body mx-5">
    <div class="row mb-4">
        <img src="' . $avatar . '" alt="logo_employee" class="circular-portrait">
        <div class="pl-3">
            <p class="m-0 font-weight-bold h5">' . $info['user_fullname'] . '<span class="pl-3"><i style="font-size: 17px; cursor: pointer" class="far fa-bookmark"></i></span></p>
            <p class="text-muted">' . $info['position'] . '</p>
            <p class="m-0" style="font-size: 14px;"><i class="fas fa-birthday-cake text-info pr-2"></i>Ngày sinh: ' . date('d/m/Y', strtotime($info['birthday'])) . '</p>
            <p style="font-size: 14px;"><i class="fas fa-venus-mars pr-1 text-info"></i>Giới tính: ' . $info['gender'] . '</p>
        </div>
    </div>


    <!-- Timeline info candidate -->
    <ul class="timeline-with-icons ml-3" style="font-size: 1rem;">
        <li class="timeline-item mb-4">
            <span class="timeline-icon">
                <i class="fas fa-user-tie text-white fa-sm fa-fw"></i>
            </span>

            <h5 class="font-weight-bold text-info">Thông tin cơ bản</h5>
            <p>
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
            </p>
        </li>

        <li class="timeline-item mb-4">
            <span class="timeline-icon">
                <i class="fas fa-award text-white fa-sm fa-fw"></i>
            </span>
            <h5 class="font-weight-bold text-info">Kỹ năng bản thân</h5>
            <p class="text-muted mb-2 font-weight-bold">Kỹ năng chuyên môn</p>
            <p class="text-muted m-0">
                ' . $info['hard_skl'] . '
            </p>
    
            <p class="text-muted mb-2 font-weight-bold pt-3">Kỹ năng xã hội</p>
            <p class="text-muted m-0">
                ' . $info['soft_skl'] . '
            </p>
        </li>

        <li class="timeline-item mb-4">

            <span class="timeline-icon">
                <i class="fas fa-trophy text-white fa-sm fa-fw"></i>
            </span>
            <h5 class="font-weight-bold text-info">Mục tiêu nghề nghiệp</h5>
            <p class="text-muted">
                ' . $info['career_goals'] . '
            </p>
        </li>

        <li class="timeline-item mb-4">
            <span class="timeline-icon">
                <i class="fas fa-business-time text-white fa-sm fa-fw"></i>
            </span>
            <h5 class="font-weight-bold text-info">Kinh nghiệm làm việc</h5>
            <p class="text-muted">
                ' . $info['exp_work'] . '
            </p>
        </li>

        <li class="timeline-item mb-4">
            <span class="timeline-icon">
                <i class="fas fa-user-graduate text-white fa-sm fa-fw"></i>
            </span>
            <h5 class="font-weight-bold text-info">Học vấn bằng cấp</h5>
            <p class="text-muted">
                ' . $info['degree'] . '
            </p>
        </li>

    </ul>
    </div>';
?>

<div class="row">
    <div class="col-12 ml-2">
        <div class="card card-info card-outline my-2">
            <?= $xhtml ?>
        </div>
    </div>
</div>