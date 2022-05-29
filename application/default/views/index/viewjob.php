<?php
$info = $this->infoJob;
$infoJob = '';

if (!empty($info)) {
    $hrefCompany = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'viewcompany', ['idCompany' => $info['comp_id']]);
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
                                <span>' . $info['comp_name'] . '</span>
                            </div>
                            <div class="fs-6">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span class="ps-1">' . $info['post_address_work'] . '</span>
                            </div>
                            <div class="fs-6">
                                <i class="bi bi-cash"></i>
                                <span class="ps-1">' . $info['post_salary'] . '</span>
                            </div>
                            <div class="fs-6">
                                <i class="bi bi-clock-fill"></i>
                                <span class="ps-1">' . date('d/m/Y', strtotime($info['post_expired'])) . '</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="action-job mt-4 text-center">
                        <div class="button-apply py-2">
                            <form action="" method="post">
                                <div class="social mb-2 text-center">
                                    <a class="px-1" href=""><img src="' . $this->_dirImg . 'icons/facebook.png" alt=""></a>
                                    <a class="px-1" href=""><img src="' . $this->_dirImg . 'icons/google.png" alt=""></a>
                                    <a class="px-1" href=""><img src="' . $this->_dirImg . 'icons/twitter.png" alt=""></a>
                                </div>
                                <input class="btn btn-apply border-0 rounded w-50 my-2 fw-bold" type="submit" name="apply" value="Ứng tuyển">
                                <input class="btn btn-share border-0 rounded w-50 fw-bold" type="submit" name="apply" value="Theo dõi">
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
                        <a href="" class="view-all">
                            <span style="font-size: 14px;">Xem thêm các việc làm khác&nbsp;<i style="font-size: 11px;" class="fa-solid fa-arrow-right"></i></span>
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
            $hrefJob   = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'viewjob', ['idPost' => $value['post_id']]);
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