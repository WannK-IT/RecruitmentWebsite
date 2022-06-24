<?php
$actionButton = 'Tạo bài viết';
if($this->arrParam['taskNews'] == 'edit'){
    $actionButton = 'Lưu bài viết';
    $data = $this->infoNews;
    if(!empty($data['news_thumbnail'])){
        $imgThumb = '<div class="my-4"><img src="' . THUMB_URL_ADMIN . $_SESSION['login']['idUser'] . DS . $data['news_thumbnail'] . '" alt="thumbnail_news" class="" height="150"></div>';
    }else{
        $imgThumb = '<div class="mt-2 mb-4 font-weight-bold">Chưa có ảnh thumbnail</div>';
    }
    echo '<pre style="color: blue;">';
    print_r($data);
    echo '</pre>';
}

$titleNews      = FormBackEnd::createInputField('Tiêu đề', 'text', 'news_title', 'news_title', @$data['news_title'], 'Nhập tiêu đề bài viết', true);
$thumbnailNews  = FormBackEnd::createInputField('Ảnh thumbnail <span class="text-muted h6 fs-input">( png | jpg | jpeg )</span>', 'file', 'news_thumbnail', 'news_thumbnail', '');
$contentNews    = FormBackEnd::createTextArea('Nội dung', '', 'news_description', 'news_description', 10, @$data['news_description'], true);

$title = FormBackEnd::formGroupElements($titleNews, 1);
$thumbnail = FormBackEnd::formGroupElements($thumbnailNews, 1);
$content = FormBackEnd::formGroupElements($contentNews, 1);
?>

<!-- Ckeditor 4.18.0 -->
<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

<div class="row">
    <div class="col-12 ml-2">
        <div class="card card-info card-outline my-2">
            <div class="card-header">
                <h5 class="card-title text-info">Thông tin tin tức</h5>
            </div>

            <form method="post" class="form-job" id="form-add-news" enctype="multipart/form-data">
                <div class="card-body fs-input mx-2">

                    <div class="form-group mb-3">
                        <?= $title ?>
                    </div>

                    <div class="form-group mb-3">
                        <?= $thumbnail ?>
                        <?= @$imgThumb?>
                    </div>

                    <div class="form-group mb-3">
                        <?= $content ?>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="hidden" name="news_id" value="<?= @$data['news_id']?>">
                    <input type="submit" id="submit_news" name="submit_news"
                        class="px-3 btn bg-gradient-info float-right shadow-sm" value="<?= $actionButton?>">
                    <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'listNews')?>" class="px-3 btn bg-gradient-secondary float-right shadow-sm mx-3">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>