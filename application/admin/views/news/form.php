<?php
$titleNews      = FormBackEnd::createInputField('Tiêu đề', 'text', 'news_title', 'news_title', '', 'Vui lòng nhập', true);
$thumbnailNews  = FormBackEnd::createInputField('Thumbnail', 'file', 'news_thumb', 'news_thumb', '', 'Vui lòng nhập', true);
$contentNews    = FormBackEnd::createTextArea('Nội dung', '', 'new_content', 'new_content', 10, '', true);

$title = FormBackEnd::formGroupElements($titleNews, 1);
$thumbnail = FormBackEnd::formGroupElements($thumbnailNews, 1);
$content = FormBackEnd::formGroupElements($contentNews, 1);
?>

<!-- Ckeditor 4.18.0 -->
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<div class="row">
    <div class="col-12 ml-2">
        <div class="card card-info card-outline my-2">
            <div class="card-header">
                <h5 class="card-title text-info">Thông tin tin tức</h5>
            </div>

            <form method="post" class="form-job" id="form-add-job">
                <div class="card-body fs-input mx-2">

                    <div class="form-group mb-3">
                        <?= $title ?>
                    </div>

                    <div class="form-group mb-3">
                        <?= $thumbnail ?>
                    </div>

                    <div class="form-group mb-3">
                        <?= $content ?>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" id="submit_post" name="submit_post"
                        class="px-3 btn bg-gradient-info float-right shadow-sm" value="Tạo tin tức">
                    <a href="" class="px-3 btn bg-gradient-secondary float-right shadow-sm mx-3">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>