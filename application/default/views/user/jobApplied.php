<?php
$xhtml = '';
$list = $this->jobApply;

if (!empty($list)) {
    foreach ($list as $info) {
        $hrefPosition = URL::addLink($this->arrParam['module'], 'career', 'viewcareer', ['idPost' => $info['post_id'], 'idComp' => $info['comp_id']]);
        $hrefCompany = URL::addLink($this->arrParam['module'], 'company', 'viewcompany', ['idCompany' => $info['comp_id']]);
        $hrefCheckMsg = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'checkMsg', ['id' => $info['apply_id']]);
        $iconMsg = (!empty($info['introduction'])) ? '<a href="javascript:ajaxCheckMsg(\'' . $hrefCheckMsg . '\')"><i class="fa-solid fa-envelope fa-xs text-warning ps-1"></i></a>' : '';

        // đổi màu cho action
        $action = $info['action'];
        switch ($action) {
            case 'Chờ duyệt':
                $action = '<span class="text-danger fw-bold">' . $action . '</span>';
                break;
            case 'Đã duyệt':
                $action = '<span class="text-info fw-bold">' . $action . '</span>';
                break;
            case 'Đã phỏng vấn':
                $action = '<span class="text-primary fw-bold">' . $action . '</span>';
                break;
            case 'Trúng tuyển':
                $action = '<span class="text-success fw-bold">' . $action . '</span>';
                break;
            case 'Không trúng tuyển':
                $action = '<span class="text-secondary fw-bold">' . $action . '</span>';
                break;
        };

        $date_approval = ($info['date_approval']) ? '<p class="m-0"><i class="fa-solid fa-check pe-1"></i>' . date('d/m/Y H:i:s', strtotime($info['date_approval'])) . '</p>' : '';
        $xhtml .= '<tr>
            <td class="align-middle"><small><a href="' . $hrefPosition . '">' . $info['post_position'] . '</a></small></td>
            <td class="align-middle"><small><a href="' . $hrefCompany . '">' . $info['comp_name'] . '</a></small></td>
            <td class="text-center align-middle"><small>' . $info['post_address_work'] . '</small></td>
            <td class="text-center align-middle"><small>' . $action . $iconMsg . '</small></td>
            <td class="text-center align-middle">
                <small><p class="m-0"><i class="fa-solid fa-location-arrow pe-1"></i>' . date('d/m/Y H:i:s', strtotime($info['date_apply'])) . '</p>
                ' . $date_approval . '</small>
            </td>
        </tr>';
    }
} else {
}
?>
<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <div class="col-12">
                    <p class="fw-bold h5 mb-3 ms-3">Việc làm đã ứng tuyển</p>
                    <table class="table ms-2 table-striped">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Vị trí ứng tuyển</th>
                                <th style="width: 20%;">Công ty</th>
                                <th style="width: 20%;" class="text-center">Nơi làm việc</th>
                                <th style="width: 20%;" class="text-center">Trạng thái ứng tuyển</th>
                                <th style="width: 20%;" class="text-center">Ứng tuyển / Xét duyệt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $xhtml ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal check Message from employer -->
<div class="modal fade modalCheckMsg-modal-lg" id="modalCheckMsg" tabindex="-1" role="dialog" aria-labelledby="modalCheckMsg" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
        <div class="modal-header"><span class="fw-bold h5">Tin nhắn</span></div>
            <div class="modal-body">
            <div class="row">
                <p id="textMsg" cols="30" rows="10" readonly></p>
            </div>
            </div>
        </div>
    </div>
</div>