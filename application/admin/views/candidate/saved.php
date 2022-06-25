<?php

$xhtml  = '';
$list   = $this->candidates;
if (!empty($list)) {
    foreach ($list as $info) {
        $hrefCandidate  = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'profile', ['id' => $info['id']]);
        $hrefUnsave     = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'deleteSaveProfile', ['id' => $info['cv_id']]);
        $age            = HelperBackEnd::calculateDate($info['birthday']);
        $xhtml .= '<tr>
                <td class="text-center"><a href="' . $hrefUnsave . '"><i class="fas fa-heart text-danger fa-lg"></i></a></td>
                <td>
                    <a href="' . $hrefCandidate . '">
                        <p class="font-weight-bold m-0">' . $info['user_fullname'] . '<span class="text-muted font-weight-normal text-sm pl-1">(' . $age . ' tuổi)</span></p>
                    </a>
                    <p class="m-0 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>' . $info['position'] . '</p>
                    <div class="list-inline">
                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                            <span style="font-size: 14px;">' . $info['salary'] . '</span>
                        </div>
                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                            <span style="font-size: 14px;">' . $info['exp'] . '</span>
                        </div>
                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                            <span style="font-size: 14px;">' . $info['workplace'] . '</span>
                        </div>
                    </div>
                </td>
                <td class="text-center pr-5">
                    <p class="m-0 text-sm">' . date('d/m/Y', strtotime($info['time_save'])) . '</p>
                </td>
                
            </tr>';
    }
}

?>

<div class="py-3">
    <div class="card ml-2">
        <div class="card-header">
            <h3 class="card-title">Hồ sơ đã lưu: <span class="font-weight-bold"><?= ($this->total['total']) ?? 0?> hồ sơ</span></h3>
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
                        <th style="width: 10%" class="text-center"></th>
                        <th style="width: 70%">Tên hồ sơ</th>
                        <th style="width: 20%" class="text-center pr-5">Ngày lưu</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $xhtml ?>
                </tbody>
            </table>
        </div>
    </div>
</div>