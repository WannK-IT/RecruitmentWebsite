<?php require_once "elements/statistic.php"; ?>

<?php
$xhtml = '';
if (!empty($this->listPost)) {
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

        $xhtml .=    '<tr id="post-' . $id . '">
                            <td class="text-center"><a class="text-anchor" href="' . $linkViewPost . '">' . $position . '</a></td>
                            <td class="text-center">' . $created . '</td>
                            <td class="text-center">' . $expired . '</td>
                            <td class="text-center">' . $applyAmount . '</td>
                            <td class="text-center position-relative">
                                <a id="status-post-' . $id . '" href="javascript:ajaxStatus(\'' . $linkChangeStatus . '\')">
                                    <span class="fa-lg fas ' . $classStatus . '"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="' . $linkEditPost . '" class="px-1" title="Edit">
                                    <i class="fas fa-cog fa-lg text-info"></i>
                                </a>
                                <a href="javascript:ajaxDelete(\'' . $linkDeletePost . '\')" class="px-1" title="Delete">
                                    <span class="fas fa-trash-alt fa-lg text-danger"></span>
                                </a>
                            </td>
                        </tr>';
    }
} else {
    $xhtml = Helper::showEmptyRow('6', 'Bạn chưa có tin tuyển dụng nào !');
    $xhtml = Helper::showEmptyRow('6', 'Bạn chưa có tin tuyển dụng nào !');
}

?>
<!-- List -->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-info card-outline my-3">
            <div class="card-body">
                <!-- Post Content -->
                <form action="" method="post" class="table-responsive" id="form-table-post">
                    <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                        <thead>
                            <tr class="bg-secondary">
                                <th class="text-center">Tên tin đăng</th>
                                <th class="text-center">Ngày đăng</th>
                                <th class="text-center">Thời hạn</th>
                                <th class="text-center">Lượt ứng tuyển</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $xhtml ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <!-- <?php require_once "elements/pagination.php" ?> -->

        </div>
        <!-- /.card -->
    </div>
</div>
<!-- End List -->