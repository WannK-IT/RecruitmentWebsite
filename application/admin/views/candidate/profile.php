<?php
$cv = $btnContactMail = '';
$info = $this->infoProfile;

// RENAME file cv to original name
@$ext = '.' . pathinfo($info['fileCV'], PATHINFO_EXTENSION);
@$filename = substr(pathinfo($info['fileCV'], PATHINFO_FILENAME), 0, -8);
$newFilename = $filename . $ext;

if (!empty($info['user_avatar'])) {
    $avatar = UPLOAD_URL_DEFAULT . 'img/' . $info['user_id'] . DS . $info['user_avatar'];
} else {
    if ($info['gender'] == 'Nam') {
        $avatar = IMG_URL_DEFAULT . 'logo_default_male.png';
    } else {
        $avatar = IMG_URL_DEFAULT . 'logo_default_female.png';
    }
}

// CHECK nếu ứng viên không có fileCV Upload thì ẩn
if (!empty($info['fileCV'])) {
    $cv = '<div class="text-right btnViewCV">
            <p class="m-0 pb-2 font-weight-bold" style="font-size: 14px">CV đính kèm</p>
            <a href="' . UPLOAD_URL_DEFAULT . 'cv/' . $info['user_id'] . DS . $info['fileCV'] . '" class="border border-1 px-3 py-1 text-dark"><i class="fas fa-file-pdf pr-2 text-danger"></i>' . $newFilename . '</a>
        </div>';
}

// BUTTON xem thông tin liên hệ của ứng viên
if (!empty($this->checkApplied)) {
    $btnContactMail = '<div class="text-right">
            <button type="button" id="btnContactMail" class="mt-3 px-3 py-2 btn btn-sm bg-gradient-warning font-weight-bold"><i class="fas fa-envelope pr-2"></i>Liên hệ qua email</button>
        </div>';
}


$info['soft_skl']   = (empty(trim($info['soft_skl']))) ? 'Chưa cập nhật' : $info['soft_skl'];
$info['degree']     = (empty(trim($info['degree']))) ? 'Chưa cập nhật' : $info['degree'];

$xhtml = '<div class="card-body mx-5">
    <div class="row">
        <div class="col-md-6">
            <div class="row mb-4">
                <img src="' . $avatar . '" alt="logo_employee" class="circular-portrait">
                <div class="pl-3">
                    <p class="m-0 font-weight-bold h5">' . $info['user_fullname'] . '<span class="pl-3"><i style="font-size: 17px; cursor: pointer" class="far fa-bookmark"></i></span></p>
                    <p class="text-muted m-0">' . $info['position'] . '</p>
    
                    <p class="m-0" style="font-size: 14px;"><i class="fas fa-birthday-cake text-info pr-2"></i>Ngày sinh: ' . date('d/m/Y', strtotime($info['birthday'])) . '</p>
                    <p class="m-0" style="font-size: 14px;"><i class="fas fa-venus-mars pr-1 text-info"></i>Giới tính: ' . $info['gender'] . '</p>
                    <p class="m-0" style="font-size: 12px;"><i class="fas fa-spinner pr-2 text-info"></i>Cập nhật gần nhất: ' . date('d/m/Y', strtotime($info['update_time'])) . '</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            ' . $cv . $btnContactMail . '
            
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
                    <div class="col-md-5">
                        <p class="m-0">Trình độ học vấn: <span class="text-muted">' . $info['level'] . '</span></p>
                    </div>
                    <div class="col-md-7">
                        <p class="m-0">Kinh nghiệm làm việc: <span class="text-muted">' . $info['exp'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="m-0">Tình trạng hôn nhân: <span class="text-muted">' . $info['marriage'] . '</span></p>
                    </div>
                    <div class="col-md-7">
                        <p class="m-0">Tỉnh/Thành phố: <span class="text-muted">' . $info['city'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="m-0">Ngành nghề: <span class="text-muted">' . $info['career'] . '</span></p>
                    </div>
                    <div class="col-md-7">
                        <p class="m-0">Nơi làm việc: <span class="text-muted">' . $info['workplace'] . '</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="m-0">Cấp bậc: <span class="text-muted">' . $info['rank'] . '</span></p>
                    </div>
                    <div class="col-md-7">
                        <p class="m-0">Địa chỉ: <span class="text-muted">' . $info['address'] . '</span></p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="m-0">Mức lương: <span class="text-muted">' . $info['salary'] . '</span></p>
                    </div>
                    <div class="col-md-7">
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
    
            <p class="text-muted mb-2 font-weight-bold pt-1">Kỹ năng xã hội</p>
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

<!-- Ckeditor 4.18.0 -->
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<div class="row">
    <div class="col-12 ml-2">
        <div class="card card-info card-outline my-2">
            <?= $xhtml ?>
        </div>
    </div>
</div>

<!-- Modal View CV -->
<div class="modal fade modalViewCV-modal-xl" id="modalViewCV" tabindex="-1" role="dialog" aria-labelledby="modalViewCV" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <iframe src="<?= UPLOAD_URL_DEFAULT . 'cv/' . $info['user_id'] . DS . $info['fileCV'] ?> " height="700px"></iframe>
        </div>
    </div>
</div>

<!-- Modal Contact Email -->
<div class="modal fade modalContact-modal-lg" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContact" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <p class="d-flex ml-4 mt-3 align-items-center font-weight-bold h5 text-info">Liên hệ ứng viên qua email</p>
            <form action="index.php?module=admin&controller=candidate&action=profile&id=<?= $info['id'] ?>&sendMail=<?= $info['user_id'] ?>" id="form_contact_candidate" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $info['id'] ?>">
                    <div class="form-group mb-1 row">
                        <label class="col-sm-3 col-form-label-sm ml-2">Tên ứng viên:</label>
                        <div class="col-sm-8">
                            <input type="text" style="padding-left: 10px;" class="form-control-plaintext text-sm" value="<?= $info['user_fullname'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group mb-1 row">
                        <label class="col-sm-3 col-form-label-sm ml-2">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" style="padding-left: 10px;" class="form-control-plaintext text-sm" value="<?= $info['user_email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-sm-3 col-form-label-sm ml-2">Điện thoại liên hệ:</label>
                        <div class="col-sm-8">
                            <input type="text" style="padding-left: 10px;" class="form-control-plaintext text-sm" value="<?= $info['user_phone'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-sm-3 col-form-label-sm ml-2">Tiêu đề:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control text-sm" id="titleEmail" name="titleEmail" autocomplete="off">
                        </div>
                    </div>


                    <div class="form-group mb-1">
                        <label class="col-sm-3 col-form-label-sm">Nội dung liên hệ:</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="contactEmail" name="contactEmail" autocomplete="off"></textarea>
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace("contactEmail");
                        </script>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" onclick="on()" class="btn bg-gradient-info" id="btnContact_candidate" value="Gửi">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Spinner -->
<div class="modal fade modalSpinner-modal-lg" id="modalSpinner" tabindex="-1" role="dialog" aria-labelledby="modalSpinner" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="row justify-content-center">
            <div class="spinner-border text-info loading-effect mt-5" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="row justify-content-center">
            <strong class="text-white">Đang gửi...</strong>
        </div>
        </div>
        
    </div>
</div>