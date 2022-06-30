<?php
$xhtml = '';
$info = $this->post;
$imgThumb = (!empty($info['news_thumbnail'])) ? THUMB_URL_ADMIN . $info['emp_id'] . DS . $info['news_thumbnail'] : IMG_URL_ADMIN . 'thumbnail_default.png';
$imgEmp = (!empty($info['comp_logo'])) ? UPLOAD_URL_ADMIN . 'img' . DS . $info['emp_id'] . DS . $info['comp_logo'] : IMG_URL_ADMIN . 'logoAdmin.png';
$hrefBack = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'index');
$xhtml = '<div class="col-md-8">
        <div class="card mb-2 p-4 mb-4">
            
            <div class="d-flex justify-content-between">
                <a href="'.$hrefBack.'" style="font-size: 13px"><span class="text-muted"><i class="fa-solid fa-angle-left fa-xs pe-1"></i>Quay lại</a>
                <p style="font-size: 12px"><span class="text-muted">' . date('d/m/Y H:i:s', strtotime($info['news_createdtime'])) . ' (GMT+07:00)</span></p>
            </div>
            <img src="' . $imgThumb . '" class="img-fluid mx-auto pb-4" style="max-height: 500px" alt="logo_news">
            <div>
                <p class="fw-bold h3 pb-2">' . $info['news_title'] . '</p>
                <div class="pb-3"></div>
                <div>' . $info['news_description'] . '</div>
            </div>

            <div class="pb-3 pt-4"><img src="' . $imgEmp . '" class="rounded-circle me-1" alt="logo" width="30" height="30"><span class="text-muted pt-3 ps-1" style="font-size: 14px;">' . $info['emp_fullname'] . '</span></div>
        </div>
    </div>';

?>

<div class="container" style="min-height: 700px">
    <div style="margin-top: 5rem" class="ps-1 mb-5">
        <div class="pb-2">
            <div class="row">

                <!-- Main content news -->
                <?= $xhtml ?>

                <!-- Side more news -->
                <?php require_once "sidecontent.php" ?>
            </div>
        </div>
    </div>
</div>