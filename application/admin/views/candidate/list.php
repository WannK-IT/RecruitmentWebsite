<?php
$xhtml = '';
$item = $this->candidates;

if (!empty($item)) {
    $i = 1;
    foreach ($item as $info) {
        $href   = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'profile', ['id' => $info['cv_id']]);
        // đổi màu trạng thái
        $action = $info['action'];
        switch($action){
            case 'Chờ duyệt':
                $action = '<span class="text-danger font-weight-bold">'.$action.'</span>';
                break;
            case 'Đã duyệt':
                $action = '<span class="text-info font-weight-bold">'.$action.'</span>';
                break;
            case 'Đã phỏng vấn':
                $action = '<span class="text-primary font-weight-bold">'.$action.'</span>';
                break;
            case 'Trúng tuyển':
                $action = '<span class="text-success font-weight-bold">'.$action.'</span>';
                break;
            case 'Không trúng tuyển':
                $action = '<span class="text-secondary font-weight-bold">'.$action.'</span>';
                break;
        };
        $xhtml .= '<tr style="font-size: 14px">
                    <td>' . $i . '</td>
                    <td>
                        <a class="text-dark">
                            <p class="m-0"><strong>' . $info['user_fullname'] . '</strong></p>
                            <p class="m-0">' . $info['position'] . '</p>
                        </a>
                    </td>
                    <td><a class="text-dark" href="'.URL::addLink('default', 'career', 'viewcareer', ['idPost' => $info['post_id']]).'">' . $info['post_position'] . '</a></td>
                    <td class="text-center">' . date('d/m/Y H:i:s', strtotime($info['date_apply'])) . '</td>
                    <td class="text-center">' . strtoupper($info['type_apply']) . '</td>
                    <td class="text-center">' . $action . '</td>
                    <td class="text-center">
                        <a data-id="' . $info['apply_id'] . '" class="mx-1 btn bg-gradient-primary btn-sm" href="javascript:updateStatusProfile(\'' . $info['apply_id'] . '\')">Cập nhật</a>
                        <a href="'.$href.'" class="btn bg-gradient-info btn-sm">Xem hồ sơ</a>
                    </td>
                </tr>';
        $i++;
    }
} else {
    $xhtml = '<tr>
                <td colspan="7" style="text-align: center">Chưa có lượt ứng tuyển</td>
            </tr>';
}

?>

<div class="py-2">
    <div class="card ml-2">
        <div class="card-header">
            <h3 class="card-title">Danh sách ứng viên</h3>
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
                        <th style="width: 20%">Tên hồ sơ</th>
                        <th style="width: 15%">Vị trí ứng tuyển</th>
                        <th style="width: 15%" class="text-center">Thời gian nộp</th>
                        <th style="width: 15%" class="text-center">Loại hồ sơ</th>
                        <th style="width: 15%" class="text-center">Trạng thái</th>
                        <th style="width: 20%" class="text-center">Hành động</th>

                    </tr>
                </thead>
                <tbody>
                    <?= $xhtml ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Update Status Profile -->
<div class="modal fade modalUpdateStatus-modal-lg" id="modalUpdateStatus" tabindex="-1" aria-labelledby="modalUpdateStatus" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="form-update-status-profile">
                <p class="text-center font-weight-bold my-4 h5">Cập nhật trạng thái hồ sơ</p>
                <div class="row">
                    <div class="col-md-4 pl-4">
                        <!-- <div class="form-check">
                            <input class="form-check-input" data-name="Chờ duyệt" type="radio" name="statusApply" id="statusApply1" value="Chờ duyệt" disabled>
                            <label class="form-check-label font-weight-bold" for="statusApply1">Chờ duyệt</label>
                        </div> -->
                        <div class="form-check">
                            <input class="form-check-input" data-name="Đã duyệt" type="radio" name="statusApply" id="statusApply2" value="Đã duyệt">
                            <label class="form-check-label font-weight-bold" for="statusApply2">Đã duyệt</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" data-name="Đã phỏng vấn" type="radio" name="statusApply" id="statusApply3" value="Đã phỏng vấn">
                            <label class="form-check-label font-weight-bold" for="statusApply3">Đã phỏng vấn</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" data-name="Trúng tuyển" type="radio" name="statusApply" id="statusApply4" value="Trúng tuyển">
                            <label class="form-check-label font-weight-bold" for="statusApply4">Trúng tuyển</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" data-name="Không trúng tuyển" type="radio" name="statusApply" id="statusApply5" value="Không trúng tuyển">
                            <label class="form-check-label font-weight-bold" for="statusApply5">Không trúng tuyển</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <textarea name="introduction" id="introduction" cols="55" rows="10" placeholder="Lời nhắn..."></textarea>
                    </div>
                </div>
                <input type="hidden" name="apply_id" value="">
                <input type="submit" name="btnUpdateStatusProfile" class="btn bg-gradient-info float-left ml-3 my-3" value="Lưu trạng thái">
            </form>
        </div>
    </div>
</div>
<!-- End Modal Update Status Profile -->