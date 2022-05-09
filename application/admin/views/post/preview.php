<?php
$data = '';
if (!empty($this->previewPost)) {
    $data = $this->previewPost;
}
?>

<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-info card-outline my-3">
            <div class="card-header">
                <div class="h5 font-weight-bold m-0"><a href="<?= URL::addLink('admin', 'post', 'index') ?>" class="text-anchor"><i class="pr-2 fas fa-arrow-left fa-sm"></i></a>Thông tin đăng tuyển</div>
            </div>
            <div class="card-body">
                <!-- Input field -->
                <div class="row">
                    <div class="col-md-6 pl-5">
                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Chức danh:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_position'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Ngành nghề:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_career'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Hình thức làm việc:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_type_work'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Nơi làm việc:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_address_work'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Cấp bậc:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_rank'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Số lượng tuyển dụng:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_amount'] ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 pl-5">
                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Hạn nộp hồ sơ:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= date('d/m/Y', strtotime($data['post_expired'])) ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Kinh nghiệm làm việc:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_exp'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Giới tính:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_gender'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Bằng cấp:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_degree'] ?></p>
                        </div>

                        <div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Mức lương:</p>
                            <p class="col-md-4 h6 list-inline-item"><?= $data['post_salary'] ?></p>
                        </div>

                        <?= (!empty($data['post_test_work'])) ? '<div class="my-1">
                            <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Thời hạn thử việc:</p>
                            <p class="col-md-4 h6 list-inline-item">' . $data["post_test_work"] . '</p>
                        </div>' : '' ?>
                    </div>
                </div>

                <!-- Mô tả, yêu cầu, quyền lợi, cách thức ứng tuyển -->
                <hr>
                <div>
                    <div class="mt-2 pl-5">
                        <p class="h6 font-weight-bold text-muted">Mô tả công việc</p>
                        <p class="h6"><?= $data['post_work_description'] ?></p>
                    </div>

                    <div class="my-4 pl-5">
                        <p class="h6 font-weight-bold text-muted">Yêu cầu công việc</p>
                        <p class="h6"><?= $data['post_work_required'] ?></p>
                    </div>

                    <div class="my-4 pl-5">
                        <p class="h6 font-weight-bold text-muted">Quyền lợi</p>
                        <p class="h6"><?= $data['post_work_benefit'] ?></p>
                    </div>

                    <div class="my-4 pl-5">
                        <p class="h6 font-weight-bold text-muted">Cách thức ứng tuyển</p>
                        <p class="h6"><?= $data['post_work_apply'] ?></p>
                    </div>
                </div>

                <!-- Thông tin liên hệ -->
                <hr>
                <div class="col-md-6 pl-5">
                    <div class="my-1 row">
                        <p class="col-md-4 my-2 h5 font-weight-bold list-inline-item">Thông tin liên hệ</p>
                    </div>

                    <div class="my-1 row">

                        <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Người liên hệ:</p>
                        <p class="col-md-6 h6 list-inline-item"><?= $data['post_contact_name'] ?></p>
                    </div>

                    <div class="my-1 row">
                        <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Email liên hệ:</p>
                        <p class="col-md-6 h6 list-inline-item"><?= $data['post_contact_email'] ?></p>
                    </div>

                    <div class="my-1 row">
                        <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Số điện thoại:</p>
                        <p class="col-md-6 h6 list-inline-item"><?= $data['post_contact_phone'] ?></p>
                    </div>

                    <div class="my-1 row">
                        <p class="col-md-4 h6 font-weight-bold text-muted list-inline-item">Địa chỉ:</p>
                        <p class="col-md-6 h6 list-inline-item"><?= $data['post_contact_address'] ?></p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'formPost', ['task' => 'edit', 'pid' => $this->arrParam['pid']])?>" class="float-right btn bg-gradient-info mx-2 px-3">Chỉnh sửa tin</a>
                <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="float-right btn bg-gradient-secondary px-3">Quay lại</a>

            </div>
        </div>
        <!-- /.card -->
    </div>
</div>