<?php
require_once "elements/statistic.php";
$xhtml = '';

if (!empty($this->listPost)) {
    $index = 1;
    foreach ($this->listPost as $post) {
        $id                 = $post['post_id'];
        $position           = $post['post_position'];
        $created            = date('d/m/Y H:i:s', strtotime($post['post_createdDate']));
        $expired            = date('d/m/Y', strtotime($post['post_expired']));
        $applyAmount        = 'Default';
        $status             = $post['post_isActive'];
        $classStatus        = ($status == 'active') ? 'fa-check text-success' : 'fa-minus text-danger';

        $linkChangeStatus   = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'changeStatus', ['status' => $status, 'pid' => $id]);
        $linkDeletePost     = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'ajaxDelete', ['pid' => $id]);
        $linkEditPost       = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'formPost', ['task' => 'edit', 'pid' => $id]);
        $linkViewPost       = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'previewPost', ['pid' => $id]);

        $xhtml .= '<tr id="post-' . $id . '">
                            <td>' . $index . '</td>
                            <td>
                                <a>' . $position . '</a><br>
                                <small> Ngày tạo ' . $created . '</small>
                            </td>
                            <td class="text-center">' . $expired . '</td>
                            <td class="text-center">' . $applyAmount . '</td>
                            <td class="project-state">
                                <a id="status-post-' . $id . '" href="javascript:ajaxStatus(\'' . $linkChangeStatus . '\')">
                                    <span class="fa-lg fas ' . $classStatus . '"></span>
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn bg-gradient-primary btn-sm" href="' . $linkViewPost . '">
                                    <i class="fas fa-eye"></i>
                                    Xem
                                </a>
                                <a class="btn bg-gradient-info btn-sm" href="' . $linkEditPost . '">
                                    <i class="fas fa-pencil-alt"></i>
                                    Sửa
                                </a>
                                <a class="btn bg-gradient-danger btn-sm" href="javascript:ajaxDelete(\'' . $linkDeletePost . '\')">
                                    <i class="fas fa-trash"></i>
                                    Xóa
                                </a>
                            </td>
                        </tr>';
        $index++;
    }
} else {
    $xhtml = HelperBackEnd::showEmptyRow('6', 'Bạn chưa có tin tuyển dụng nào !');
}
?>

<div class="card ml-2">
    <div class="card-header">
        <h3 class="card-title">Danh sách tin đăng tuyển</h3>
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
                    <th style="width: 25%">Tên tin đăng</th>
                    <th style="width: 20%" class="text-center">Thời hạn</th>
                    <th style="width: 20%" class="text-center">Lượt ứng tuyển</th>
                    <th style="width: 10%" class="text-center">Trạng thái</th>
                    <th style="width: 20%"></th>
                </tr>
            </thead>
            <tbody>
                <?= $xhtml ?>
            </tbody>
        </table>
    </div>
</div>