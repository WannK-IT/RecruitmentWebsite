<?php
$info               = $this->infoJob;
@$infoCandidate     = $this->infoCandidate;
@$infoCV             = $this->infoCV;
$infoJob = '';

@$ext = '.' . pathinfo($infoCV['fileCV'], PATHINFO_EXTENSION);
@$filename = substr(pathinfo($infoCV['fileCV'], PATHINFO_FILENAME), 0, -8);
$newFilename = $filename . $ext;

// Kiểm tra user login
$checkLogin = ((Authentication::checkLoginDefault()) == false) ? 'notLogged' : 'logged';

// Kiểm tra user cập nhật CV
$profile = (!empty($infoCV['position'])) ? '<span class="float-end"><a href="' . URL::addLink($this->arrParam['module'], 'user', 'previewcv') . '">' . $infoCV['position'] . '</a></span>' : '<span class="float-end"><a class="text-danger fs-13 fst-italic" href="' . URL::addLink($this->arrParam['module'], 'user', 'profile') . '">Cập nhật hồ sơ ngay</a></span>';

$CV = (!empty($infoCV['fileCV'])) ? '<span style="cursor:pointer" class="float-end btnViewCV">' . $newFilename . '</span>' : '<span class="float-end"><a class="text-danger fs-13 fst-italic" href="' . URL::addLink($this->arrParam['module'], 'user', 'uploadcv') . '">Upload CV ngay</a></span>';

$btnChkApply = (@$this->checkApply == 'applied') ? '<button class="btn btn-apply border-0 rounded w-50 my-2 fw-bold bg-gradient" id="apply_job" type="button" onClick="chkLogin(\'' . $checkLogin . '\')" disabled' . '>Đã ứng tuyển</button>' : '<button class="btn btn-apply border-0 rounded w-50 my-2 fw-bold bg-gradient" id="apply_job" type="button" onClick="chkLogin(\'' . $checkLogin . '\')"' . '>Ứng tuyển</button>';

if (!empty($info)) {
    $hrefCompany = URL::addLink($this->arrParam['module'], 'company', 'viewcompany', ['idCompany' => $info['comp_id']]);
    $expiredDate = HelperFrontEnd::calculateDate($info['post_expired'], 'days');
    $infoJob = '<div class="card border-0">
            <div class="row g-0 my-2">
                <div class="col-md-3 logo-box d-flex align-items-center">
                    <a href="' . $hrefCompany . '" class="d-flex justify-content-center"><img src="' . UPLOAD_URL_ADMIN . 'img/' . $info['emp_id'] . '/' . $info['comp_logo'] . '" class="img-thumbnail border-0 rounded" style="max-height: 150px" alt="logo_company"></a>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div style="font-size: 22px;">
                            <span class="text-decoration-none card-title fw-bold" style="color: inherit;" href="">' . $info['post_position'] . '</span>
                        </div>
                        <div class="card-text text-muted" style="font-size: 17px;">
                            <div class="pb-2">
                                <span class="fw-bold">' . $info['comp_name'] . '</span>
                            </div>
                            <div class="fs-6">
                                <i class="fa-solid fa-map-location-dot"></i>
                                <span class="ps-1">' . $info['post_address_work'] . '</span>
                            </div>
                            <div class="fs-6">
                                <i class="fa-solid fa-money-bill"></i>
                                <span class="ps-1">' . $info['post_salary'] . '</span>
                            </div>
                            <div class="fs-6">
                                <i class="fa-solid fa-clock"></i>
                                <span class="ps-2">' . date('d/m/Y', strtotime($info['post_expired'])) . '</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pe-5">
                    <div class="action-job mt-4 text-center">
                        <div class="button-apply py-2">
                            <form action="" method="post">
                                <div class="social mb-2 text-center">
                                    <p style="font-size: 14px">Hết hạn trong <span class="text-warning fw-bold">' . $expiredDate . '</span> ngày</p>
                                </div>
                                ' . $btnChkApply . '
                                <input class="btn btn-share border-0 rounded w-50 fw-bold bg-gradient" id="follow_job" type="button" name="follow_job" value="Theo dõi">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

    $contentJob = '<div class="col-md-8">
        <div class="card border-0 mb-2 p-3 pe-5">
            <div>
                <div class="fs-5 fw-bold ps-3">Mô Tả Công Việc</div>
                <div class="job-description p-3 fs-6">' . $info['post_work_description'] . '</div>
            </div>
            <div>
                <div class="fs-5 fw-bold ps-3">Yêu Cầu Công Việc</div>
                <div class="job-description p-3 fs-6">' . $info['post_work_required'] . '</div>
            </div>
            <div>
                <div class="fs-5 fw-bold ps-3">Quyền Lợi</div>
                <div class="job-description p-3 fs-6">' . $info['post_work_benefit'] . '</div>
            </div>
            <div>
                <div class="fs-5 fw-bold ps-3">Cách thức ứng tuyển</div>
                <div class="job-description p-3 fs-6">' . $info['post_work_apply'] . '</div>
            </div>
            <div>
                <div class="fs-5 fw-bold ps-3">Thông tin liên hệ</div>
                <div class="job-description p-3 fs-6">
                    <ul class="list-unstyled">
                        <li>Người liên hệ: ' . $info['emp_fullname'] . '</li>
                        <li>Email: ' . $info['emp_email'] . '</li>
                        <li>Điện thoại: ' . $info['emp_phone'] . '</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="job-detail-map pb-2 mt-3">
            <div class="card border-0 mb-2 p-3">
                <div class="fs-5 fw-bold ps-3 pb-3">Địa Chỉ Công Ty</div>
                <div>
                    <iframe src="https://maps.google.com/maps?q=' . str_replace(' ', '+', $info['comp_address']) . '&output=embed" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>';

    $sideInfo = '<div class="col-md-4">
    <div class="col">
        <div class="card border-0 mb-2 p-3">
            <div>
                <div class="d-flex justify-content-center">
                    <a href="' . $hrefCompany . '"><img src="' . UPLOAD_URL_ADMIN . 'img/' . $info['emp_id'] . '/' . $info['comp_logo'] . '" class="img-thumbnail border-0 rounded shadow" style="max-height: 200px" alt="logo_company"></a>
                </div>
                <div>
                    <div class="mt-3 fw-bold text-center" style="font-size: 17px;">' . $info['comp_name'] . '</div>
                    <p class="p-2 fs-6">' . $info['comp_description'] . '</p>

                    <div class="p-2 text-muted" style="font-size: 15px;">
                        <div class="py-1">
                            <i class="fa-solid fa-map"></i>
                            <span class="ps-1">' . $info['comp_address'] . '</span>
                        </div>
                        <div class="py-1">
                            <i class="fa-solid fa-users"></i>
                            <span class="ps-1">' . $info['comp_size'] . '</span>
                        </div>
                        <div class="py-1">
                            <i class="fa-solid fa-earth-asia fa-lg"></i>
                            <span class="ps-1 "><a class="text-muted web-company" href="https://' . $info['comp_website'] . '">' . $info['comp_website'] . '</a></span>
                        </div>
                        <div class="py-1">
                            <i class="fa-solid fa-envelope fa-lg"></i>
                            <span class="ps-1">' . $info['comp_email'] . '</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="' . $hrefCompany . '" class="view-all">
                            <span style="font-size: 14px;">Các việc làm khác từ công ty&nbsp;<i style="font-size: 11px;" class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="border-1 py-3 my-3 ps-3" style="border: 1px solid rgba(0,185,242,.5); background-color: #f7fdff">
            <div>
                <div class="row py-2 px-2">
                    <div class="col-md-2 pt-2">
                        <span class="ps-2"><i class="bi bi-calendar-check fa-2xl"></i></span>
                    </div>
                    <div class="col-md-10 g-0">
                        <span class="text-muted" style="font-size: 14px;">Ngày đăng tuyển</span><br>
                        <span style="font-size: 14px;">' . date('d/m/Y', strtotime($info['post_createdDate'])) . '</span>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row py-2 px-2">
                    <div class="col-md-2 pt-2">
                        <span class="ps-2"><i class="bi bi-layers fa-2xl"></i></span>
                    </div>
                    <div class="col-md-10 g-0">
                        <span class="text-muted" style="font-size: 14px;">Cấp bậc</span><br>
                        <span style="font-size: 14px;">' . $info['post_rank'] . '</span>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row py-2 px-2">
                    <div class="col-md-2 pt-2">
                        <span class="ps-2"><i class="bi bi-briefcase fa-2xl"></i></span>
                    </div>
                    <div class="col-md-10 g-0">
                        <span class="text-muted" style="font-size: 14px;">Ngành nghề</span><br>
                        <span style="font-size: 14px;">' . $info['post_career'] . '</span>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row py-2 px-2">
                    <div class="col-md-2 pt-2">
                        <span class="ps-2"><i class="bi bi-award fa-2xl"></i></span>
                    </div>
                    <div class="col-md-10 g-0">
                        <span class="text-muted" style="font-size: 14px;">Kinh nghiệm</span><br>
                        <span style="font-size: 14px;">' . $info['post_exp'] . '</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col">
        <div class="card border-1">
            <div class="card-header fw-bold fs-5 ps-4">Công việc tương tự</div>';

    if (!empty($info['relatedJob'])) {
        foreach ($info['relatedJob'] as $value) {
            $hrefJob   = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'viewcareer', ['idPost' => $value['post_id']]);
            $sideInfo .= '<div class="similar-job p-2">
                        <a href="' . $hrefJob . '">
                            <div class="row g-0">
                                <div class="col-md-3 d-flex justify-content-center ">
                                    <img src="' . UPLOAD_URL_ADMIN . 'img/' . $value['emp_id'] . '/' . $value['comp_logo'] . '" class="img-fluid" style="height: 60px;" alt="JobHT">
                                </div>
                                <div class="col-md-9">
                                    <span class="cs-text text-clip">' . $value['post_position'] . '</span><br>
                                    <span class="cs-text text-clip text-muted" style="font-size: 14px">' . $value['comp_name'] . '</span>
                                </div>
                            </div>
                        </a>
                    </div>';
        }
    } else {
        $sideInfo .= '<p class="text-center my-3">Chưa có công việc tương tự</p>';
    }

    $sideInfo .= '</div></div></div>';
}
?>
<!-- Job Header -->
<section class="job-detail mt-5" style="background-color: #f1f1f1;">
    <div class="container">
        <div class="job-detail-header py-3">
            <?= $infoJob ?>
        </div>
    </div>
</section>
<!-- End Job Header -->

<!-- Job Content -->
<section class="job-detail-content" style="background-color: #f1f1f1;">
    <div class="container">
        <div class="job-detail-description pb-2">
            <div class="row">

                <!-- Main content job -->
                <?= $contentJob ?>

                <!-- Side infomation company -->
                <?= $sideInfo ?>
            </div>
        </div>

</section>
<!-- End Job Content -->



<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="labelModalLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="labelModalLogin">Người tìm việc đăng nhập </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container" style="width: 90%;">
                    <div class="login-wrapper text-center">
                        <form action="" method="post" id="form-user-login">

                            <div class="form-group mb-3">
                                <input type="text" name="user_username" id="user_username" class="form-control fs-6" placeholder="Nhập tên tài khoản" autocomplete="off">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" name="user_password" id="user_password" class="form-control fs-6" placeholder="Nhập mật khẩu" autocomplete="off">
                            </div>

                            <a class="btn bg-purple text-white" name="loginUser" id="loginUser" href="javascript:loginUser('<?= URL::addLink($this->arrParam['module'], 'account', 'loginUser') ?>', '<?= URL::addLink('default', 'index', 'index') ?>')">Đăng nhập</a>

                        </form>
                        <p class="login-wrapper-footer-text mt-3">Bạn chưa có tài khoản ? <a href="<?= URL::addLink($this->arrParam['module'], 'account', 'register') ?>" class="text-reset">Đăng ký</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Login -->


<!-- Modal Apply -->
<div class="modal fade" id="modalApply" tabindex="-1" aria-labelledby="labelModalApply" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body mb-2">
                <div class="container">
                    <div class="pb-3">
                        <h5 class="modal-title fw-bold" id="labelModalApply">Ứng tuyển <span class="text-warning"><?= $info['post_position'] ?></span></h5>
                        <p class="text-muted fw-bold m-0" style="font-size: 13px;"><?= $info['comp_name'] ?></p>
                    </div>
                    <div class="login-wrapper">
                        <form action="" method="post" id="form-apply-job">

                            <div class="form-group mb-3">
                                <div class="error-element">
                                    <label for="user_fullname" class="fw-bold mb-1">Họ và tên <span class="text-danger">*</span></label>
                                    <input type="text" name="user_fullname" id="user_fullname" class="form-control-plaintext fs-6" placeholder="Nhập họ và tên" value="<?= @$infoCandidate['user_fullname'] ?>" autocomplete="off" required readonly>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="error-element">
                                    <label for="user_email" class="fw-bold mb-1">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="user_email" id="user_email" class="form-control-plaintext fs-6" placeholder="Nhập Email" value="<?= @$infoCandidate['user_email'] ?>" autocomplete="off" required readonly>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="error-element">
                                    <label for="user_phone" class="fw-bold mb-1">Điện thoại <span class="text-danger">*</span></label>
                                    <input type="text" name="user_phone" id="user_phone" class="form-control-plaintext fs-6" placeholder="Nhập số điện thoại" value="<?= @$infoCandidate['user_phone'] ?>" autocomplete="off" required readonly>
                                </div>
                            </div>

                            <!-- Chọn CV -->
                            <div class="form-group mb-3">

                                <label for="user_phone" class="fw-bold mb-1">Chọn hồ sơ ứng tuyển <span class="text-danger">*</span></label>
                                <div class="error-element">
                                    <input class="form-check-input" type="radio" name="profileApply" id="chooseProfile" value="profile" data-id="<?= @$infoCV['position'] ?>" />
                                    <label class="form-check-label" for="chooseProfile"> Hồ sơ <span class="text-danger">*</span></label><?= $profile ?><br>

                                    <input class="form-check-input" type="radio" name="profileApply" id="chooseCV" value="cv" data-id="<?= @$filename ?>" />
                                    <label class="form-check-label" for="chooseCV"> CV</label><?= $CV ?>


                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="error-element">
                                    <label for="introduction" class="fw-bold mb-1">Thư giới thiệu <span class="text-muted h6">(không bắt buộc)</span></label>
                                    <textarea name="introduction" id="introduction" cols="40" rows="6" class="form-control fs-6"></textarea>
                                </div>
                            </div>

                            <div class="float-end">
                                <input type="hidden" name="comp_id" value="<?= $info['comp_id'] ?>">
                                <input type="hidden" name="cv_id" value="<?= $infoCV['id'] ?>">
                                <a href="<?= URL::addLink($this->arrParam['module'], 'user', 'index') ?>" class="btn bg-main text-white">Sửa hồ sơ</a>
                                <input type="submit" class="btn bg-purple text-white" name="applyJob" value="Nộp hồ sơ">

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Apply -->

<!-- Modal View CV -->
<div class="modal fade modalViewCV-modal-xl" id="modalViewCV" tabindex="-1" role="dialog" aria-labelledby="modalViewCV" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <iframe src="<?= UPLOAD_URL_DEFAULT . 'cv/' . $_SESSION['loginDefault']['idUser'] . DS . $infoCV['fileCV'] ?> " height="650px"></iframe>
        </div>
    </div>
</div>
<!-- End Modal View CV -->