<?php

$xhtml = '';
$list = $this->top_news;
foreach ($list as $news) {
    $imgNew = (!empty($news['news_thumbnail'])) ? THUMB_URL_ADMIN . $news['emp_id'] . DS . $news['news_thumbnail'] : IMG_URL_ADMIN . 'thumbnail_default.png';
    $href = URL::addLink($this->arrParam['module'], 'news', 'post', ['idNews' => $news['news_id']]);
    $xhtml .= '<div class="col">
        <div class="border border-light shadow border-blog mx-1" style="max-width: 290px;">
            <div class="d-flex justify-content-center bor">
                <a href="' . $href . '"><img src="' . $imgNew . '" class="card-img-top img-fluid cs-zoom-img" style="width: 300px; height: 200px" alt="logoNews"></a>
            </div>
            <div class="card-body">
                <a href="' . $href . '">
                    <h6 class="card-title title-job cs-ellipsis-2 pb-1 fw-bold">'.$news['news_title'].'</h6>
                </a>
                <p class="card-text cs-ellipsis-4" style="font-size: 15px;">'.html_entity_decode(strip_tags($news['news_description'])).'</p>
            </div>
        </div>
    </div>';
}
?>

<section class="all-blogs">
    <!-- Blog -->
    <div class="container">
        <div class="blog-title">
            <p class="pt-5 pb-4 h2 text-center text-secondary fw-bold">Tin tức</p>
        </div>
        <div class="blogs mb-5">
            <div class="row">
            <?= $xhtml?>
            </div>

            <div class="d-flex justify-content-end mt-4 me-2">
                <a href="<?= URL::addLink($this->arrParam['module'], 'news', 'index')?>" class="view-all">
                    <span>Xem thêm tin tức khác&nbsp;<i style="font-size: 13px;" class="fa-solid fa-arrow-right"></i></span>

                </a>
            </div>

        </div>
    </div>
    <!-- End blog -->
</section>