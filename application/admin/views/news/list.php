<?php
$xhtml = '';
$news = $this->listNews;
if (!empty($news)) {
    $i = 1;
    foreach ($news as $info) {
        $classStatus        = ($info['news_status'] == 'active') ? 'fa-check text-success' : 'fa-minus text-danger';
        $linkChangeStatus   = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'changeStatus', ['status' => $info['news_status'], 'nid' => $info['news_id']]);
        $linkDeleteNews     = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'ajaxDelete', ['nid' => $info['news_id']]);
        $linkPreviewNews    = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'previewNews', ['nid' => $info['news_id']]);
        $linkEditNews       = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'formNews', ['taskNews' => 'edit', 'nid' => $info['news_id']]);
        $updatetime         = (!empty($info['news_updatetime'])) ? '<i class="fas fa-pen-square pr-1 text-secondary"></i>' . date('d/m/Y H:i:s', strtotime($info['news_updatetime'])) : '';
        $thumb              = (!empty($info['news_thumbnail'])) ? THUMB_URL_ADMIN . $_SESSION['login']['idUser'] . DS . $info['news_thumbnail'] : IMG_URL_ADMIN . 'thumbnail_default.png';

        $xhtml .= '<tr id="news-' . $info['news_id'] . '">
                <td>' . $i . '</td>
                <td>
                    <p class="cs-ellipsis-2 m-0 text-sm">' . $info['news_title'] . '</p>
                </td>
                <td class="text-center">
                    <img src="' . $thumb . '" alt="thumbnail_news" class="" height="100">
                </td>
                <td class="text-center">
                    <p class="m-0 text-sm"><i class="fas fa-calendar-plus pr-1"></i>' . date('d/m/Y H:i:s', strtotime($info['news_createdtime'])) . '</p>
                    <p class="m-0 text-sm">' . $updatetime . '</p>
                </td>
                <td class="text-center">
                    <a id="status-news-' . $info['news_id'] . '" href="javascript:ajaxStatus(\'' . $linkChangeStatus . '\', \'news\')">
                        <span class="fa-lg fas ' . $classStatus . '"></span>
                    </a>
                </td>
                <td class="project-actions text-center">
                    <div class="row">
                        <a class="btn bg-gradient-primary btn-sm mx-1" href="'.$linkPreviewNews.'">
                            <i class="fas fa-eye"></i>
                            Xem
                        </a>
                        <a class="btn bg-gradient-info btn-sm" href="' . $linkEditNews . '">
                            <i class="fas fa-pencil-alt"></i>
                            Sửa
                        </a>
                        <a class="btn bg-gradient-danger btn-sm mx-1" href="javascript:ajaxDelete(\'' . $linkDeleteNews . '\', \'news\')">
                            <i class="fas fa-trash"></i>
                            Xóa
                        </a>
                    </div>
                </td>
            </tr>';
        $i++;
    }
} else {
    $xhtml = '<tr>
                <td colspan="6" style="text-align: center">Chưa có tin tức nào được đăng<br>
                    <a href=' . URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'formNews', ['taskNews' => 'add']) . ' class="my-2 px-4 btn bg-gradient-info btn-sm">Tạo bài viết ngay</a>
                </td>
            </tr>';
}
?>
<div class="py-3">
    <div class="card ml-2">
        <div class="card-header">
            <h3 class="card-title">Danh sách tin đăng tuyển: <span class="font-weight-bold"><?= $this->total['total']?> bài viết</span></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects" id="postTable">
                <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 25%">Tiêu đề bài viết</th>
                        <th style="width: 20%" class="text-center">Thumbnail</th>
                        <th style="width: 15%" class="text-center">Ngày tạo / cập nhật</th>
                        <th style="width: 15%" class="text-center">Trạng thái</th>
                        <th style="width: 20%" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?= $xhtml ?>
                </tbody>
            </table>
        </div>
    </div>
</div>