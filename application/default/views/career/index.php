<?php
$selectBoxPosition      = FormFrontEnd::selectBoxRow('career_search', $this->careers, @$this->arrParam['career_search'], false);
$selectBoxCity          = FormFrontEnd::selectBoxRow('city_search', $this->cities, @$this->arrParam['city_search'], false);
$selectBoxTypeWork      = FormFrontEnd::selectBoxRow('type_work_search', $this->type_work, @$this->arrParam['type_work_search'], false);

$list = $this->listCareers;
$xhtml = '';
if (!empty($list)) {
    foreach ($list as $infoCareer) {
        $href   = URL::addLink($this->arrParam['module'], 'career', 'viewcareer', ['idPost' => $infoCareer['post_id']]);
        $xhtml .= '<div class="card card-company-job rounded-0 p-2 shadow-sm ps-3 mb-2">
            <div class="row">
                <div class="col-md-2 d-flex justify-content-center my-auto">
                    <img src="' . UPLOAD_URL_ADMIN . 'img/' . $infoCareer['emp_id'] . '/' . $infoCareer['comp_logo'] . '" class="img-fluid" style="max-height: 100px;">
                </div>
                <div class="col-md-9">
                    <a class="company-job" href="' . $href . '">
                        <p class="fw-bold m-0 fs-input pt-2">' . $infoCareer['post_position'] . '</p>
                        <p class="m-0 pb-2 text-muted">' . $infoCareer['comp_name'] . '</p>
                        <div class="list-inline">
                            <div class="list-inline-item pe-3 text-muted" style="font-size: 14px;"><i class="fa-solid fa-coins"></i>
                                <span class="ps-1">Lương:</span>
                                <span class="fw-bold" style="font-size: 14px;">' . $infoCareer['post_salary'] . '</span>
                            </div>
                            <div class="list-inline-item pe-3 text-muted" style="font-size: 14px;"><i class="fa-solid fa-location-dot"></i>
                                <span class="ps-1">Nơi làm việc:</span>
                                <span class="fw-bold" style="font-size: 14px;">' . $infoCareer['post_address_work'] . '</span>
                            </div>
                            <div class="list-inline-item pe-3 text-muted" style="font-size: 14px;"><i class="fa-solid fa-hourglass"></i>
                                <span class="ps-2">Hạn nộp:</span>
                                <span class="fw-bold" style="font-size: 14px;">' . date('d/m/Y', strtotime($infoCareer['post_expired'])) . '</span>
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
} else {
    $xhtml = '<p class="ps-3">Không có ngành nghề phù hợp với thông tin tìm kiếm !</p>';
}
?>

<div class="container" style="min-height: 700px">
    <div class="mt-5">
        <form action="" method="GET" class="d-flex justify-content-center row p-3" id="formSearchCareer">
            <input type="hidden" name="module" value="default">
            <input type="hidden" name="controller" value="career">
            <input type="hidden" name="action" value="index">
            <div class="shadow-sm row p-3 border border-1">
                <div class="col-md-3">
                    <input class="form-control" type="text" autocomplete="off" name="position_search" placeholder="Vị trí bạn muốn ứng tuyển" value="<?= @$this->arrParam['position_search'] ?>">
                </div>
                <div class="col-md-3">
                    <?= $selectBoxPosition ?>
                </div>
                <div class="col-md-2">
                    <?= $selectBoxCity ?>
                </div>
                <div class="col-md-3">
                    <?= $selectBoxTypeWork ?>
                </div>
                <div class="col-md-1">

                    <input class="form-control text-white" style="background-color: #2c95ff;" type="submit" name="search" value="Lọc">
                </div>
            </div>

        </form>
    </div>
    <div class="my-2">
        <div class="card border-0 ps-1">
            <div class="col-md-8  mb-4">

                <div class="card rounded-0 p-2 border-0 shadow-sm ps-3 mb-3">
                    <div class="fw-bold h5">
                        <p>Kết quả tìm kiếm: <?= $this->totalCareer['total'] ?> tin đăng tuyển<br></p>
                        <?php
                        if (!empty(@$this->arrParam['position_search']))
                            echo '<p class="h6 text-muted">Vị trí: ' . @$this->arrParam['position_search'] . '</p>';

                        if (@$this->arrParam['career_search'] != 'Tất cả ngành nghề' && !empty(@$this->arrParam['career_search']))
                            echo '<p class="h6 text-muted">Ngành nghề: ' . @$this->arrParam['career_search'] . '</p>';

                        if (@$this->arrParam['city_search'] != 'Tất cả tỉnh thành'  && !empty(@$this->arrParam['city_search']))
                            echo '<p class="h6 text-muted">Địa điểm: ' . @$this->arrParam['city_search'] . '</p>';

                        if (@$this->arrParam['type_work_search'] != 'Loại công việc'  && !empty(@$this->arrParam['type_work_search']))
                            echo '<p class="h6 text-muted">Loại công việc: ' . @$this->arrParam['type_work_search'] . '</p>';
                        ?>

                    </div>
                </div>

                <?= $xhtml ?>
            </div>
        </div>
    </div>
</div>