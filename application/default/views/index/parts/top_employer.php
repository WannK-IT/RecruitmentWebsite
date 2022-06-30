<?php
$xhtml = '';
$list = $this->top_emp;
foreach ($list as $comp) {
    $href = URL::addLink($this->arrParam['module'], 'company', 'viewcompany', ['idCompany' => $comp['comp_id']]);
    $imgLogo = (!empty($comp['comp_logo'])) ? UPLOAD_URL_ADMIN . 'img' . DS . $comp['emp_id'] . DS . $comp['comp_logo'] : IMG_URL_ADMIN . 'thumbnail_default.png';
    $xhtml .= '<div class="item d-flex justify-content-center">
        <a href="' . $href . '">
            <img class="img-fluid border-list-company" src="' . $imgLogo . '" alt="">
            <p class="text-center pt-3" style="font-size: .75rem;">' . $comp['comp_name'] . '</p>
        </a>
    </div>';
}
?>

<section class="top-employers">

    <div class="container">
        <div class="top-company">
            <p class="pt-5 pb-4 h2 text-center text-secondary fw-bold">Nhà tuyển dụng hàng đầu</p>
        </div>

        <div class="owl-carousel owl-theme mb-5">
            <?= $xhtml ?>
        </div>
    </div>
</section>