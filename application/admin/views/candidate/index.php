<?php
$selectBoxPosition      = FormBackEnd::selectBoxAccount('career_search', $this->career, @$this->arrParam['career_search'], false);
$selectBoxWorkPlace     = FormBackEnd::selectBoxAccount('workplace_search', $this->city, @$this->arrParam['workplace_search'], false);
$selectBoxDegree        = FormBackEnd::selectBoxAccount('degree_search', $this->degree, @$this->arrParam['degree_search'], false);
$selectBoxGender        = FormBackEnd::selectBoxAccount('gender_search', $this->gender, @$this->arrParam['gender_search'], false);
$selectBoxExp           = FormBackEnd::selectBoxAccount('exp_search', $this->exp, @$this->arrParam['exp_search'], false);

$info   = $this->candidates;
echo '<pre style="color: blue;">';
print_r($info);
echo '</pre>';
$xhtml  = '';
if (!empty($info)) {
    foreach ($info as $candidate) {
        $age    = HelperBackEnd::calculateDate($candidate['birthday']);
        $href   = URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'profile', ['id' => $candidate['id']]);
        $xhtml .= '<div class="card rounded-0 hover-card p-2 pl-4 mb-2 py-1">
            <div class="row">
                <div class="col-md-8">
                    <a href="'.$href.'">
                        <p class="font-weight-bold m-0">' . $candidate['user_fullname'] . '<span class="text-muted font-weight-normal text-sm pl-1">(' . $age . ' tuổi)</span></p>
                    </a>
                    <p class="m-0 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>' . $candidate['position'] . '</p>
                    <div class="list-inline">
                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                            <span style="font-size: 14px;">' . $candidate['salary'] . '</span>
                        </div>
                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                            <span style="font-size: 14px;">' . $candidate['exp'] . '</span>
                        </div>
                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                            <span style="font-size: 14px;">' . $candidate['workplace'] . '</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-2">
                    <div class="col-12 text-right pt-1">
                        <a href="" class="btn btn-sm"><i class="far fa-heart"></i></a>
                        <a href="'.$href.'" class="btn btn-sm bg-blur-info">Xem</a>
                    </div>
                    <div class="col-12 text-right">
                        <div class="fs-12  pt-3">Thời gian cập nhật: ' . date('d/m/Y', strtotime($candidate['update_time'])) . '</div>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    $xhtml = '<p class="">Không có hồ sơ phù hợp với thông tin tìm kiếm !</p>';
}
?>

<div class="row">
    <div class="col-md-12 ml-2">
        <div class="card card-info card-outline my-2">
            <div class="card-body" style="min-height: 700px">
                <form action="" id="formSearch" method="GET">
                    <input type="hidden" name="module" value="admin">
                    <input type="hidden" name="controller" value="candidate">
                    <input type="hidden" name="action" value="index">
                    <div class="col-md-12 mb-4">
                        <div class="row">
                            <div class="col-md-3 mr-1" style="font-size: 1rem;">

                                <?= $selectBoxPosition ?>

                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" autocomplete="off" name="position_search" placeholder="Nhập tên vị trí hoặc chức danh" value="<?= @$this->arrParam['position_search'] ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" id="search_candidate" class="btn bg-gradient-info">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                                <div class="d-flex justify-content-between pb-3 mb-3 link-dark text-decoration-none border-bottom">
                                    <a class="font-weight-bold pl-2 text-dark">Lọc hồ sơ</a>
                                    <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="text-info">Xóa bộ lọc</a>
                                </div>
                                <ul class="list-unstyled pl-0">
                                    <li class="mb-2">
                                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse" aria-expanded="true">Hình thức làm việc</button>
                                        <div class="collapse show" id="profile-collapse">
                                            <ul class="btn-toggle-nav list-unstyled pb-1 pt-2">
                                                <li class="form-check">
                                                    <div class="pl-4">
                                                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">Toàn thời gian</label>
                                                    </div>
                                                </li>
                                                <li class="form-check">
                                                    <div class="pl-4">
                                                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">Bán thời gian</label>
                                                    </div>
                                                </li>
                                                <li class="form-check">
                                                    <div class="pl-4">
                                                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">Khác</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse2" aria-expanded="true">Địa điểm</button>
                                        <div class="collapse show" id="profile-collapse2">
                                            <ul class="btn-toggle-nav list-unstyled pb-1 pt-2">
                                                <li class="form-check" style="font-size: 1rem;">
                                                    <?= $selectBoxWorkPlace ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse3" aria-expanded="true">Bằng cấp</button>
                                        <div class="collapse show" id="profile-collapse3">
                                            <ul class="btn-toggle-nav list-unstyled pb-1 pt-2">
                                                <li class="form-check" style="font-size: 1rem;">
                                                    <?= $selectBoxDegree ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse4" aria-expanded="true">Giới tính</button>
                                        <div class="collapse show" id="profile-collapse4">
                                            <ul class="btn-toggle-nav list-unstyled pb-1 pt-2">
                                                <li class="form-check" style="font-size: 1rem;">
                                                    <?= $selectBoxGender ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse5" aria-expanded="true">Kinh nghiệm</button>
                                        <div class="collapse show" id="profile-collapse5">
                                            <ul class="btn-toggle-nav list-unstyled pb-1 pt-2">
                                                <li class="form-check" style="font-size: 1rem;">
                                                    <?= $selectBoxExp ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 p-3">
                            <p class="font-weight-bold h5">Kết quả tìm thấy: <span class="">20 hồ sơ</span></p>
                            <?php
                            $keyword = '';
                            if (!empty(@$this->arrParam['position_search']))
                                $keyword .= '<span class="badge bg-blur-info ml-1">' . @$this->arrParam['position_search'] . '</span>';

                            if (@$this->arrParam['career_search'] != 'Tất cả ngành nghề' && !empty(@$this->arrParam['career_search']))
                                $keyword .= '<span class="badge bg-blur-info ml-1">' . @$this->arrParam['career_search'] . '</span>';

                            if (@$this->arrParam['workplace_search'] != 'Tất cả tỉnh thành'  && !empty(@$this->arrParam['workplace_search']))
                                $keyword .= '<span class="badge bg-blur-info ml-1">' . @$this->arrParam['workplace_search'] . '</span>';

                            if (@$this->arrParam['degree_search'] != 'Tất cả bằng cấp'  && !empty(@$this->arrParam['degree_search']))
                                $keyword .= '<span class="badge bg-blur-info ml-1">' . @$this->arrParam['degree_search'] . '</span>';

                            if (@$this->arrParam['gender_search'] != 'Tất cả giới tính'  && !empty(@$this->arrParam['gender_search']))
                                $keyword .= '<span class="badge bg-blur-info ml-1">' . @$this->arrParam['gender_search'] . '</span>';

                            if (@$this->arrParam['exp_search'] != 'Tất cả kinh nghiệm'  && !empty(@$this->arrParam['exp_search']))
                                $keyword .= '<span class="badge bg-blur-info ml-1">' . @$this->arrParam['exp_search'] . '</span>';

                            $keyword = (!empty($keyword)) ? '<div class="mb-2"><span class="fs-12">Từ khóa: </span>'.$keyword.'</div>' : '';
                            echo $keyword;
                            ?>

                            <form method="post" action="" id="form-list-candidate">

                                <?= $xhtml ?>

                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>