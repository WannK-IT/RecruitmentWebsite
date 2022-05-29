<?php
$infoCompany = $posts = '';
$info = $this->infoCompany;
if (!empty($info)) {
    $infoCompany = '<div class="position-relative" style="margin-bottom: -70px;">
            <div class="cs-translate">
                <img src="' . UPLOAD_URL_ADMIN . 'img/' . $info['emp_id'] . '/' . $info['comp_logo'] . '" class="img-fluid h-120 cs-rounded shadow border border-3 border-light" alt="...">
            </div>

            <div class="cs-translate-2">
                <div class="fw-bold fs-company">' . $info['comp_name'] . '</div>
                <span class="text-muted"><i style="color: #2bb5cf;" class="fa-solid fa-location-dot"></i>&nbsp;' . $info['comp_location'] . '</span>

            </div>

            <div class="cs-translate-3">
                <div class="btn-company pb-2">
                    <button class="btn btn-apply fw-bold"><i class="bi bi-eye"></i>&nbsp;Theo dõi</button>
                </div>

                <div class="btn-company">
                    <button class="btn btn-share fw-bold"><i class="bi bi-share"></i>&nbsp;Chia sẻ</button>
                </div>
            </div>
        </div>';

    if (!empty($info['listPosts'])) {
        foreach ($info['listPosts'] as $value) {
            $hrefJob = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'viewjob', ['idPost' => $value['post_id']]);
            $posts .= '<div class="card card-company-job rounded-0 p-2 shadow-sm my-2 ps-3">
                <div class="row">
                    <div class="col-md-11">
                        <a class="company-job" href="' . $hrefJob . '">
                            <div class="fw-bold cs-text text-clip pe-5">' . $value['post_position'] . '</div>
                            <div class="list-inline">
                                <div class="list-inline-item pe-5" style="font-size: 14px;"><i class="fa-solid fa-coins"></i>
                                    <span class="text-muted ps-1">Lương:</span>
                                    <span class="fw-bold" style="font-size: 14px;">' . $value['post_salary'] . '</span>
                                </div>
                                <div class="list-inline-item pe-5" style="font-size: 14px;"><i class="fa-solid fa-location-dot"></i>
                                    <span class="text-muted ps-1">Nơi làm việc:</span>
                                    <span class="fw-bold" style="font-size: 14px;">' . $value['post_address_work'] . '</span>
                                </div>
                                <div class="list-inline-item pe-5" style="font-size: 14px;"><i class="fa-solid fa-hourglass"></i>
                                    <span class="text-muted ps-1">Hạn nộp:</span>
                                    <span class="fw-bold" style="font-size: 14px;">' . date('d/m/Y', strtotime($value['post_expired'])) . '</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button class="border-0 bg-white float-end">
                            <span>
                                <h5><i class="bi bi-bookmark"></i></h5>
                            </span>
                        </button>
                    </div>
                </div>
            </div>';
        }
    }

    $address = '<div class="pt-3 mb-4">
                    <p>' . $info['comp_name'] . '</p>
                    <p>' . $info['comp_address'] . '</p>
                    <p>' . $info['comp_description'] . '</p>
                </div>';

    $sideInfo = '<div class="card rounded-0 p-3 shadow-sm">
                    <div class="fw-bold">Thông tin công ty</div>
                    <a href="https://' . $info['comp_website'] . '" class="web-company fs-6 py-1"><i class="fa-solid fa-earth-asia"></i><span class="ps-1">' . $info['comp_website'] . '</span></a>

                    <div class="fs-6 py-1"><i class="fa-solid fa-user-group fa-xs"></i><span class="ps-1"></span>' . $info['comp_size'] . '</div>

                    <div class="fs-6 py-1"><i class="fa-solid fa-envelope"></i><span class="ps-1">' . $info['comp_email'] . '</span></div>

                    <div class="fs-6 py-1"><i class="fa-solid fa-map-location-dot fa-sm"></i><span class="ps-1"></span>' . $info['comp_address'] . '</div>

                    <div class="py-1">
                        <iframe src="https://maps.google.com/maps?q=' . str_replace(' ', '+', $info['comp_address']) . '&output=embed" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>';
}
?>

<!-- Company Header -->
<section>
    <div class="container">
        <div class="company-detail-header">
            <div class="img-res">
                <img src="<?= $this->_dirImg ?>background2.jpg" class="img-fluid rounded-3" alt="">
            </div>
        </div>

        <div class="img-company">
            <div class="d-flex align-items-center">
                <?= $infoCompany ?>
            </div>
        </div>
    </div>
</section>
<!-- End Company Header -->

<!-- Main content -->
<section>
    <div class="container">
        <div class="mx-5">
            <h3 class="fw-bold mb-3">Vị trí đang tuyển</h3>
            <div class="row">
                <div class="col-md-8">
                    <?= $posts ?>

                    <h3 class="fw-bold mt-5">Giới thiệu doanh nghiệp</h3>
                    <?= $address ?>
                </div>

                <!-- Side Info Company -->
                <div class="col-md-4 my-2">
                    <?= $sideInfo ?>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>