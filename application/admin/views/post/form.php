<?php
$task = ($this->arrParam['task'] == 'add') ? 'Đăng tin' : 'Lưu bài đăng';
if ($this->arrParam['task'] == 'edit') {
    $data = $this->dataPost;
}

// ---------------- Input Field ----------------
// Chức danh
$position = Form::createInputField('Chức danh', 'text', 'post-position', 'post_position', @$data['post_position'], 'Vị trí hiển thị đăng tuyển', true);

// Ngành nghề
$arrCareer = ['default' => 'Chọn ngành nghề', 'Công nghệ thông tin', 'Điện - điện tử', 'Quản trị kinh doanh', 'Quản trị du lịch nhà hàng khách sạn', 'Kỹ thuật', 'Business Analyst', 'Architect'];
$career = Form::createSelectBox('Ngành nghề', 'post-career', 'post_career', $arrCareer, @$data['post_career'], true);

// Hình thức làm việc
$arrTypeWork = ['default' => 'Chọn hình thức làm việc', 'Full-time', 'Part-time', 'Intern', 'Contract', 'Khác'];
$typeWork = Form::createSelectBox('Hình thức làm việc', 'post-type-work', 'post_type_work', $arrTypeWork, @$data['post_type_work'], true);

// Địa chỉ làm việc
$arrAddressWork = ['default' => 'Chọn nơi làm việc', 'TP Hồ Chí Minh', 'Hà Nội', 'Đà Nẵng', 'Cần thơ', 'Hải Phòng'];
$addressWork = Form::createSelectBox('Nơi làm việc', 'post-address-work', 'post_address_work', $arrAddressWork, @$data['post_address_work'], true);

// Cấp bậc
$arrRank = ['default' => 'Chọn cấp bậc', 'Trưởng nhóm', 'Phó giám đốc', 'Trưởng phòng', 'Phó phòng', 'Trưởng chi nhánh', 'Nhân viên', 'Thực tập sinh', 'Quản lý', 'Cộng tác viên'];
$rank = Form::createSelectBox('Cấp bậc', 'post-rank', 'post_rank', $arrRank, @$data['post_rank'], true);

// Số lượng tuyển dụng
$amount = Form::createInputField('Số lượng tuyển dụng', 'number', 'post-amount', 'post_amount', @$data['post_amount'], 'Vui lòng nhập', true);

// Hạn nộp hồ sơ
$expired = Form::createInputField('Hạn nộp hồ sơ', 'date', 'post-expired', 'post_expired', @$data['post_expired'], 'Vui lòng nhập', true);

// Kinh nghiệm
$arrExp = ['Chưa có kinh nghiệm', 'Dưới 1 năm', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm', 'Hơn 5 năm', 'Hơn 10 năm'];
$exp = Form::createSelectBox('Kinh nghiệm', 'post-exp', 'post_exp', $arrExp, @$data['post_exp'], false);

// Giới tính
$arrGender = ['Không yêu cầu', 'Nam', 'Nữ'];
$gender = Form::createSelectBox('Giới tính', 'post-gender', 'post_gender', $arrGender, @$data['post_gender'], false);

// Bằng cấp
$arrDegree = ['Không yêu cầu', 'Trên đại học', 'Đại học', 'Cao đẳng', 'Trung cấp', 'Trung học', 'Chứng chỉ', 'Khác'];
$degree = Form::createSelectBox('Bằng cấp', 'post-degree', 'post_degree', $arrDegree, @$data['post_degree'], false);

// Mức lương
$arrSalary = ['Thỏa thuận', '1 - 3 triệu', '3 - 5 triệu', '5 - 7 triệu', '7 - 10 triệu', '10 - 12 triệu', '12 - 15 triệu', '15 - 20 triệu', '20 - 25 triệu', '25 - 30 triệu', '30 - 40 triệu', 'Trên 40 triệu'];
$salary = Form::createSelectBox('Mức lương', 'post-salary', 'post_salary', $arrSalary, @$data['post_salary'], false);

// Thời hạn thử việc
$testWork = Form::createInputField('Thời hạn thử việc', 'text', 'post-test-work', 'post_test_work', @$data['post_test_work'], 'Vui lòng nhập', false);


// ---------------- Text Area ----------------
// Mô tả 
$descriptionWork = Form::createTextArea('Mô tả công việc', 'Thông tin cho vị trí công việc yêu cầu, trách nhiệm mà ứng viên có thể đảm nhận khi làm việc ở công ty', 'post_work_description', 'post_work_description', 50, @$data['post_work_description'], true);

// Yêu cầu
$requiredWork = Form::createTextArea('Yêu cầu công việc', 'Kỹ năng chuyên môn hoặc kỹ năng mềm cần thiết với công việc mà ứng viên cần quan tâm', 'post_work_required', 'post_work_required', 50, @$data['post_work_required'], true);

// Quyền lợi
$benefitWork = Form::createTextArea('Quyền lợi', 'Những quyền lợi, lợi ích với công việc cho ứng viên với vị trí đăng tuyển', 'post_work_benefit', 'post_work_benefit', 50, @$data['post_work_benefit'], true);

// Cách thức ứng tuyển
$applyWork = Form::createTextArea('Cách thức ứng tuyển', '', 'post_work_apply', 'post_work_apply', 50, @$data['post_work_apply'], true);


// ---------------- Contact ----------------
// name
$contactName = Form::createInputField('Họ và tên', 'text', 'emp_fullname', 'emp_fullname', @$data['emp_fullname'], 'Vui lòng nhập', true);

// email 
$contactEmail = Form::createInputField('Email', 'email', 'emp_email', 'emp_email', @$data['emp_email'], 'Vui lòng nhập', true);

// phone
$contactPhone = Form::createInputField('Điện thoại', 'text', 'emp_phone', 'emp_phone', @$data['emp_phone'], 'Vui lòng nhập', true);

// address
$contactAddress = Form::createInputField('Địa chỉ liên hệ', 'text', 'emp_address', 'emp_address', @$data['emp_address'], 'Vui lòng nhập', true);


// ---------------- Optimize Form ----------------
$_position = Form::formGroupElements($position, 1);
$career_typeWork_adddressWork = Form::formGroupElements([$career, $typeWork, $addressWork], 3);
$rank_amount_expired = Form::formGroupElements([$rank, $amount, $expired], 3);
$exp_gender_degree = Form::formGroupElements([$exp, $gender, $degree], 3);
$salary_testWork = Form::formGroupElements([$salary, $testWork], 3);

$description = Form::formGroupElements($descriptionWork, 1);
$required = Form::formGroupElements($requiredWork, 1);
$benefit = Form::formGroupElements($benefitWork, 1);
$apply = Form::formGroupElements($applyWork, 1);

$contactName_Email_Phone = Form::formGroupElements([$contactName, $contactEmail, $contactPhone], 3);
$_address = Form::formGroupElements([$contactAddress], 3);
?>

<!-- Ckeditor 4.18.0 -->
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline my-2">
            <div class="card-header">
                <h5 class="card-title text-info">Thông tin tuyển dụng</h5>
            </div>

            <form method="post" class="form-job" id="form-add-job">
                <div class="card-body fs-input mx-2">
                    <!-- Chức danh -->
                    <div class="form-group mb-3">
                        <?= $position ?>
                    </div>

                    <!-- Ngành nghề, hình thức làm việc, nơi làm việc -->
                    <div class="form-group mb-3">
                        <?= $career_typeWork_adddressWork ?>
                    </div>

                    <!-- Cấp bậc, số lượng tuyển dụng, hạn nộp hồ sơ -->
                    <div class="form-group mb-3">
                        <?= $rank_amount_expired ?>
                    </div>

                    <!-- Kinh nghiệm, giới tính, bằng cấp -->
                    <div class="form-group mb-3">
                        <?= $exp_gender_degree ?>
                    </div>

                    <!-- Mức lương, thời hạn thử việc -->
                    <div class="form-group mb-3">
                        <?= $salary_testWork ?>
                    </div>

                    <hr class="my-4">

                    <!-- Text Area -->
                    <!-- Mô tả công việc -->
                    <div class="form-group mb-3">
                        <?= $description ?>
                    </div>

                    <!-- Yêu cầu công việc -->
                    <div class="form-group mb-3">
                        <?= $required ?>
                    </div>

                    <!-- Quyền lợi -->
                    <div class="form-group mb-3">
                        <?= $benefit ?>
                    </div>

                    <!-- Cách thức ứng tuyển -->
                    <div class="form-group mb-3">
                        <?= $apply ?>
                    </div>

                    <hr class="my-4">

                    <label style="font-size: 18px;">Thông tin người liên hệ</label>
                    <!-- Họ tên, email, điện thoại -->
                    <div class="form-group mb-3">
                        <?= $contactName_Email_Phone ?>
                    </div>

                    <!-- Địa chỉ NTD -->
                    <div class="form-group mb-3">
                        <?= $_address ?>
                    </div>


                </div>
                <div class="card-footer">
                    <input type="hidden" name="emp_id" value="1">
                    <input type="submit" id="submit_post" name="submit_post" class="px-3 btn bg-gradient-info float-right shadow-sm" value="<?= $task ?>">
                    <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="px-3 btn bg-gradient-secondary float-right shadow-sm mx-3">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>