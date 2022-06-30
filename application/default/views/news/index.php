<?php
$xhtml = '';
$list = $this->news;
if (!empty($list)) {
    foreach ($list as $info) {
        $hrefPost = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'post', ['idNews' => $info['news_id']]);
        $imgThumbnail = (!empty($info['news_thumbnail'])) ? THUMB_URL_ADMIN . $info['emp_id'] . DS . $info['news_thumbnail'] : IMG_URL_ADMIN . 'thumbnail_default.png';
        $imgEmp = (!empty($info['comp_logo'])) ? UPLOAD_URL_ADMIN . 'img' . DS . $info['emp_id'] . DS . $info['comp_logo'] : IMG_URL_ADMIN . 'logoAdmin.png';
        $xhtml .= '<div class="card mb-2 p-4 mb-4">
                <img src="' . $imgThumbnail . '" class="img-fluid mx-auto pb-4" style="max-height: 500px" alt="logo_news">
                <div>
                    <p class="fw-bold h4 pb-2">' . $info['news_title'] . '</p>
                    <div class="pb-3"><img src="' . $imgEmp . '" class="rounded-circle me-1" alt="logo" width="30" height="30"><span class="text-muted pt-3 ps-1" style="font-size: 14px;">' . $info['emp_fullname'] . '</span></div>
                    <p class="cs-ellipsis-2">' . html_entity_decode(strip_tags($info['news_description'])) . '</p>
                </div>
                <a href="' . $hrefPost . '" class="col-md-3 mx-auto btn bg-purple text-white bg-gradient">Đọc tiếp...</a>
            </div>';
    }
}else{
    $xhtml = '<p class="fw-bold text-center">Đang cập nhật các bài viết</p>';
}
?>


<div class="container" style="min-height: 700px">
    <div style="margin-top: 5rem" class="ps-1 mb-5">
        <div class="pb-2">
            <div class="row">

                <!-- Main content news -->
                <div class="col-md-8">
                    <?= $xhtml ?>
                </div>
                <!-- Side more news -->
                <?php require_once "sidecontent.php" ?>
            </div>
        </div>
    </div>
</div>