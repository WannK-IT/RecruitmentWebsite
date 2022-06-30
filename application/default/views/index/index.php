<?php
$jobs = $this->jobs;
$listJobs = $place = $career = '';
if (!empty($jobs)) {
    foreach ($jobs as $value) {
        $hrefCareer   = URL::addLink($this->arrParam['module'], 'career', 'viewcareer', ['idPost' => $value['post_id'], 'idComp' => $value['comp_id']]);
        $imgLogo = (!empty($value['comp_logo'])) ? UPLOAD_URL_ADMIN . 'img/' . $value['emp_id'] . '/' . $value['comp_logo'] : IMG_URL_ADMIN . 'thumbnail_default.png';
        $listJobs .= '<div class="card cs-card border-1 shadow-sm mt-2 mb-3">
                        <div class="row g-0">
                            <div class="col-md-3 logo-box d-flex align-items-center">
                                <a href="' . $hrefCareer . '"><img src="' . $imgLogo . '" class="img-thumbnail border-0 rounded" style="max-height: 150px" alt="box_Job"></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="pb-1" style="font-size: 18px;">
                                        <a class="text-decoration-none card-title fw-bold title-job" href="' . $hrefCareer . '">' . $value['post_position'] . '</a>
                                    </div>
                                    <div class="card-text" style="font-size: 15px;">
                                        <div>
                                            <i class="fa-solid fa-city"></i>
                                            <span class="ps-1">' . $value['comp_name'] . '</span>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-map-location-dot"></i>
                                            <span class="ps-1">' . $value['post_address_work'] . '</span>
                                        </div>
                                        <div class="text-success">
                                            <i class="fa-solid fa-money-bill-wave"></i>
                                            <span class="ps-1">' . $value['post_salary'] . '</span>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-clock"></i>
                                            <span class="ps-1">' . date('d/m/Y', strtotime($value['post_expired'])) . '</span>
                                        </div>
                                    </div>
                                    <div>
                                        <small class="text-muted time-post-job">Ngày đăng: ' . date('d/m/Y', strtotime($value['post_createdDate'])) . '</small>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>';
    }
} else {
    $listJobs = '<div class="text-center">Không có tin đăng tuyển !</div>';
}
?>

<!-- Banner -->
<?php require_once "parts/banner.php" ?>

<!-- Category career -->
<?php require_once "parts/category_career.php" ?>

<!-- Post job & sidebar -->
<section class="post-job" style="background-color: hsl(0, 0%, 98%)">
    <div class="container pb-5 px-5" style="max-width: 1200px;">
        <div class="row">
            <div class="col-md-8">

                <?= $listJobs ?>

                <!-- Button view all posts -->
                <div class="d-flex justify-content-end">
                    <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index') ?>" class="view-all">
                        <span>Xem tất cả công việc&nbsp;<i style="font-size: 13px;" class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>

            <!-- Side content -->
            <div class="col-md-4 mt-2">
                <!-- Location Job -->
                <div class="card mx-3 border-1 shadow-sm" style="border: 1px solid rgba(0,185,242,.5); background-color: #f7fdff">
                    <div class="single-sidebar">
                        <h5 class="card-header pt-3 ps-3 fw-bold"><span class="pe-2"><i class="fa-solid fa-city"></i></span>Khu Vực Tuyển Dụng Hot</h5>
                        <ul class="list-group pt-1 pb-4 px-3">
                            <?php
                            if (!empty($this->recruitPlace)) {
                                foreach ($this->recruitPlace as $item) {
                                    $href = URL::addLink($this->arrParam['module'], 'career', 'index', ['city_search' => $item['post_address_work']]);
                                    $place .= '<li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                        <a class="d-flex justify-content-between " href="' . $href . '">
                                            <span>' . $item['post_address_work'] . '</span>
                                            <span>' . $item['total'] . '</span>
                                        </a>
                                    </li>';
                                }
                            } else {
                                $place = '<p class="fw-bold text-center">Chưa có công việc đăng tuyển</p>';
                            }
                            ?>
                            <?= $place ?>
                        </ul>
                    </div>
                </div>

                <!-- Carousel banner job -->
                <div class="mx-3 my-4 shadow-sm">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/01.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/02.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/03.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/04.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/05.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/06.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/07.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/08.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/09.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="<?= $this->_dirImg ?>carousel/10.webp" class="d-block w-100" alt="carousel-job"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Job -->
                <div class="card mx-3 border-1 shadow-sm" style="border: 1px solid rgba(0,185,242,.5); background-color: #f7fdff">
                    <div class="single-sidebar">
                        <h5 class="card-header pt-3 ps-3 fw-bold"><span class="pe-2"><i class="fa-solid fa-building-user"></i></span>Các ngành nghề hot</h5>
                        <ul class="list-group pt-1 pb-4 px-3">
                            <?php
                            if (!empty($this->hotCareer)) {
                                foreach ($this->hotCareer as $h_career) {
                                    $hrefHcareer = URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => $h_career['post_career']]);
                                    $career .= '<li class="list-group-item border-light shadow-sm my-2">
                                        <a class="d-flex justify-content-between " href="'.$hrefHcareer.'">
                                            <span>'.$h_career['post_career'].'</span>
                                            <span>'.$h_career['career'].'</span>
                                        </a>
                                    </li>';
                                }
                            } else {
                                $career = '<p class="fw-bold text-center">Chưa có công việc đăng tuyển</p>';
                            }
                            ?>
                            <?= $career ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End side content -->
        </div>
</section>

<!-- Carousel top employers -->
<?php require_once "parts/top_employer.php" ?>

<!-- Blogs -->
<?php require_once "parts/news.php" ?>