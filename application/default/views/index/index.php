<?php
$jobs = $this->jobs;
$listJobs = '';
if (!empty($jobs)) {
    foreach ($jobs as $value) {
        $hrefCareer   = URL::addLink($this->arrParam['module'], 'career', 'viewcareer', ['idPost' => $value['post_id']]);
        $listJobs .= '<div class="card cs-card border-1 shadow-sm mt-2 mb-3">
                        <div class="row g-0">
                            <div class="col-md-3 logo-box d-flex align-items-center">
                                <a href="' . $hrefCareer . '"><img src="' . UPLOAD_URL_ADMIN . 'img/' . $value['emp_id'] . '/' . $value['comp_logo'] . '" class="img-thumbnail border-0 rounded" style="max-height: 150px" alt="box_Job"></a>
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
                            <div class="col-md-1 p-2">
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
                <!-- button time job -->
                <div class="d-flex justify-content-end my-4">
                    <a href="" class=" border cs-box cs-card border-secondary btn btn-light mx-1">Full Time</a>
                    <a href="" class=" border cs-box cs-card border-secondary btn btn-light mx-1">Part Time</a>
                    <a href="" class=" border cs-box cs-card border-secondary btn btn-light mx-1">Freelance</a>
                    <a href="" class=" border cs-box cs-card border-secondary btn btn-light mx-1">Intern</a>
                </div>
                <?= $listJobs ?>

                <!-- Button view all posts -->
                <div class="d-flex justify-content-end">
                    <a href="" class="view-all">
                        <span>Xem tất cả công việc&nbsp;<i style="font-size: 13px;" class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>

            <!-- Side content -->
            <div class="col-md-4 mt-4">
                <!-- Location Job -->
                <div class="card mx-3 border-1 shadow-sm" style="border: 1px solid rgba(0,185,242,.5); background-color: #f7fdff">
                    <div class="single-sidebar">
                        <h5 class="card-header pt-3 ps-3 fw-bold"><span class="pe-2"><i class="fa-solid fa-city"></i></span>Các Khu Vực Tuyển Dụng</h5>
                        <ul class="list-group pt-1 pb-4 px-3">
                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Hồ Chí Minh</span>
                                    <span>50</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Hà Nội</span>
                                    <span>70</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Đà Nẵng</span>
                                    <span>48</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Bình Dương</span>
                                    <span>80</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Hải Phòng</span>
                                    <span>27</span>
                                </a>
                            </li>
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
                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Công Nghệ</span>
                                    <span>150</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Marketing</span>
                                    <span>50</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Kinh Doanh</span>
                                    <span>78</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2 cs-list-location">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Kỹ Thuật</span>
                                    <span>93</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Kế Toán</span>
                                    <span>29</span>
                                </a>
                            </li>

                            <li class="list-group-item border-light shadow-sm my-2">
                                <a class="d-flex justify-content-between " href="">
                                    <span>Kinh Tế</span>
                                    <span>43</span>
                                </a>
                            </li>
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
<?php require_once "parts/blog.php" ?>