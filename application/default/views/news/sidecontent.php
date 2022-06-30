<?php
$xhtml = '';
$list = $this->relatedNews;
if (!empty($list)) {
    foreach ($list as $info) {
        $href = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'post', ['idNews' => $info['news_id']]);
        $xhtml .= '<div class="similar-job px-4 py-2">
                <a href="' . $href . '" class="text-purple cs-ellipsis-2 py-1 border-bottom">' . html_entity_decode(strip_tags($info['news_title'])) . '</a>
            </div>';
    }
} else {
    $xhtml = '<p class="fw-bold text-center">Chưa có thêm tin tức khác</p>';
}
?>

<div class="col-md-4">
    <div class="col">
        <div class="card border-1">
            <div class="fw-bold fs-5 text-purple mx-auto py-2">Tin tức khác</div>
            <hr class="mx-4">
            <?= $xhtml?>
        </div>
    </div>
</div>