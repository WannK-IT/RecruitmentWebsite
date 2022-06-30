<?php
$xhtml = '';
$info = $this->jobSaved;
if (!empty($info)) {
    foreach ($info as $value) {
        $hrefCareer = URL::addLink($this->arrParam['module'], 'career', 'viewcareer', ['idPost' => $value['post_id'], 'idComp' => $value['comp_id']]);
        $hrefComp = URL::addLink($this->arrParam['module'], 'company', 'viewcompany', ['idCompany' => $value['comp_id']]);;
        $xhtml .= '<tr>
            <td class="text-sm align-middle"><small><a href="' . $hrefCareer . '">' . $value['post_position'] . '</a></small></td>
            <td class="align-middle"><small><a href="' . $hrefComp . '">' . $value['comp_name'] . '</a></small></td>
            <td class="text-center align-middle"><small>' . $value['post_address_work'] . '</small></td>
            <td class="text-center align-middle"><small>' . date('d/m/Y', strtotime($value['post_expired'])) . '</small></td>
            <td class="text-center align-middle"><small>' . date('d/m/Y H:i:s', strtotime($value['saved_time'])) . '</small></td>
        </tr>';
    }
} else {
    $xhtml = '<td colspan=5 class="text-center">Chưa có công việc được lưu</td>';
}
?>


<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <div class="col-12">
                    <p class="fw-bold h5 mb-3 ms-3">Việc làm đã theo dõi</p>
                    <table class="table ms-2 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tên tin đăng tuyển</th>
                                <th scope="col">Công ty</th>
                                <th scope="col" class="text-center">Nơi làm việc</th>
                                <th scope="col" class="text-center">Hạn ứng tuyển</th>
                                <th scope="col" class="text-center">Ngày lưu</th>
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