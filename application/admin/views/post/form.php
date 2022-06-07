<?php
$task = ($this->arrParam['task'] == 'add') ? 'Đăng tin' : 'Lưu bài đăng';
$data = $this->dataEmp;
if ($this->arrParam['task'] == 'edit') {
    $data = $this->dataPost;
}

// ---------------- Input Field ----------------
// Chức danh
$position       = FormBackEnd::createInputField('Chức danh', 'text', 'post-position', 'post_position', @$data['post_position'], 'Vị trí hiển thị đăng tuyển', true);

// Ngành nghề
$arrCareer      = ['default' => 'Chọn ngành nghề', 'Công nghệ thực phẩm', 'Công nghệ chế biến thủy sản', 'Kỹ thuật dệt', 'Kiến trúc', 'Kinh tế và quản lý đô thị', 'Kỹ thuật công trình biển', 'Kỹ thuật xây dựng', 'Kinh tế xây dựng', 'Quản lý xây dựng', 'Kỹ thuật xây dựng công trình giao thông', 'Công nghệ kỹ thuật công trình xây dựng', 'Nhân sự', 'Thủy lợi ', 'Quản trị kinh doanh', 'Quản trị dịch vụ du lịch và lữ hành', 'Quản trị khách sạn', 'Marketing', 'Bất động sản', 'Kinh doanh quốc tế', 'Kế toán', 'Kiểm toán', 'Quản trị nhân lực', 'Hệ thống thông tin quản lý', 'Quản trị văn phòng', 'Khoa học máy tính', 'Truyền thông đa phương tiện', 'Công nghệ thông tin', 'Nhóm ngành luật', 'Việt nam học', 'Ngôn ngữ Anh', 'Ngôn ngữ Pháp', 'Ngôn ngữ Trung', 'Ngôn ngữ Quốc Tế Học', 'Đông Phương Học', 'Triết học', 'Văn học', 'Văn hóa học', 'Quản lý văn hóa', 'Quản lý thể dục thể thao', 'Hội họa', 'Thiết kế công nghiệp', 'Thiết kế đồ họa', 'Thiết kế thời trang', 'Thiết kế nội thất', 'Kinh tế học', 'Chính trị học', 'Tâm lý học', 'Báo chí', 'Quan hệ công chúng', 'Công nghệ sinh học', 'Khoa học vật liệu', 'địa chất học', 'Quản lý giáo dục', 'Giáo dục thể chất', 'Huấn luyện thể thao', 'Giáo dục quốc phòng – an ninh', 'Nhóm ngành sư phạm', 'Nông nghiệp', 'Kinh tế nông nghiệp'];
$career         = FormBackEnd::createSelectBox('Ngành nghề', 'post-career', 'post_career', $arrCareer, @$data['post_career'], true);

// Hình thức làm việc
$arrTypeWork    = ['default' => 'Chọn hình thức làm việc', 'Toàn thời gian tạm thời', 'Toàn thời gian cố định', 'Bán thời gian tạm thời', 'Bán thời gian cố định', 'Theo thỏa thuận hợp đồng', 'Khác'];
$typeWork       = FormBackEnd::createSelectBox('Hình thức làm việc', 'post-type-work', 'post_type_work', $arrTypeWork, @$data['post_type_work'], true);

// Địa chỉ làm việc
$arrAddressWork = ['default' => 'Chọn nơi làm việc' ,'An Giang', 'Kon Tum', 'Bà Rịa - Vũng Tàu', 'Lai Châu', 'Bắc Giang', 'Lâm Đồng', 'Bắc Kạn', 'Lạng Sơn', 'Bạc Liêu', 'Lào Cai', 'Bắc Ninh', 'Long An', 'Bến Tre', 'Nam Định', 'Bình Định', 'Nghệ An', 'Bình Dương', 'Ninh Bình', 'Bình Phước', 'Ninh Thuận', 'Bình Thuận', 'Phú Thọ', 'Cà Mau', 'Phú Yên', 'Cần Thơ', 'Quảng Bình', 'Cao Bằng', 'Quảng Nam', 'Đà Nẵng', 'Quảng Ngãi', 'Đắk Lắk', 'Quảng Ninh', 'Đắk Nông', 'Quảng Trị', 'Điện Biên', 'Sóc Trăng', 'Đồng Nai', 'Sơn La', 'Đồng Tháp', 'Tây Ninh', 'Gia Lai', 'Thái Bình', 'Hà Giang', 'Thái Nguyên', 'Hà Nam', 'Thanh Hóa', 'Hà Nội', 'Thừa Thiên Huế', 'Hà Tĩnh', 'Tiền Giang', 'Hải Dương', 'TP Hồ Chí Minh', 'Hải Phòng', 'Trà Vinh', 'Hậu Giang', 'Tuyên Quang', 'Hòa Bình', 'Vĩnh Long', 'Hưng Yên', 'Vĩnh Phúc', 'Khánh Hòa', 'Yên Bái', 'Kiên Giang'];
$addressWork    = FormBackEnd::createSelectBox('Nơi làm việc', 'post-address-work', 'post_address_work', $arrAddressWork, @$data['post_address_work'], true);

// Cấp bậc
$arrRank        = ['default' => 'Chọn cấp bậc', 'Trưởng nhóm', 'Phó giám đốc', 'Trưởng phòng', 'Phó phòng', 'Trưởng chi nhánh', 'Nhân viên', 'Thực tập sinh', 'Quản lý', 'Cộng tác viên', 'Trưởng dự án'];
$rank           = FormBackEnd::createSelectBox('Cấp bậc', 'post-rank', 'post_rank', $arrRank, @$data['post_rank'], true);

// Số lượng tuyển dụng
$amount         = FormBackEnd::createInputField('Số lượng tuyển dụng', 'number', 'post-amount', 'post_amount', @$data['post_amount'], 'Vui lòng nhập', true);

// Hạn nộp hồ sơ
$expired        = FormBackEnd::createInputField('Hạn nộp hồ sơ', 'date', 'post-expired', 'post_expired', @$data['post_expired'], 'Vui lòng nhập', true);

// Kinh nghiệm
$arrExp         = ['Chưa có kinh nghiệm', 'Dưới 1 năm', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm', 'Hơn 5 năm', 'Hơn 10 năm'];
$exp            = FormBackEnd::createSelectBox('Kinh nghiệm', 'post-exp', 'post_exp', $arrExp, @$data['post_exp'], false);

// Giới tính
$arrGender      = ['Không yêu cầu', 'Nam', 'Nữ'];
$gender         = FormBackEnd::createSelectBox('Giới tính', 'post-gender', 'post_gender', $arrGender, @$data['post_gender'], false);

// Bằng cấp
$arrDegree      = ['Không yêu cầu', 'Trên đại học', 'Đại học', 'Cao đẳng', 'Trung cấp', 'Trung học', 'Chứng chỉ', 'Khác'];
$degree         = FormBackEnd::createSelectBox('Bằng cấp', 'post-degree', 'post_degree', $arrDegree, @$data['post_degree'], false);

// Mức lương
$arrSalary      = ['Thỏa thuận', '1 - 3 triệu', '3 - 5 triệu', '5 - 7 triệu', '7 - 10 triệu', '10 - 12 triệu', '12 - 15 triệu', '15 - 20 triệu', '20 - 25 triệu', '25 - 30 triệu', '30 - 40 triệu', 'Trên 40 triệu'];
$salary         = FormBackEnd::createSelectBox('Mức lương', 'post-salary', 'post_salary', $arrSalary, @$data['post_salary'], false);

// Thời hạn thử việc
$testWork       = FormBackEnd::createInputField('Thời hạn thử việc', 'text', 'post-test-work', 'post_test_work', @$data['post_test_work'], 'Vui lòng nhập', false);


// ---------------- Text Area ----------------
// Mô tả 
$descriptionWork = FormBackEnd::createTextArea('Mô tả công việc', 'Thông tin cho vị trí công việc yêu cầu, trách nhiệm mà ứng viên có thể đảm nhận khi làm việc ở công ty', 'post_work_description', 'post_work_description', 50, @$data['post_work_description'], true);

// Yêu cầu
$requiredWork   = FormBackEnd::createTextArea('Yêu cầu công việc', 'Kỹ năng chuyên môn hoặc kỹ năng mềm cần thiết với công việc mà ứng viên cần quan tâm', 'post_work_required', 'post_work_required', 50, @$data['post_work_required'], true);

// Quyền lợi
$benefitWork    = FormBackEnd::createTextArea('Quyền lợi', 'Những quyền lợi, lợi ích với công việc cho ứng viên với vị trí đăng tuyển', 'post_work_benefit', 'post_work_benefit', 50, @$data['post_work_benefit'], true);

// Cách thức ứng tuyển
$applyWork      = FormBackEnd::createTextArea('Cách thức ứng tuyển', '', 'post_work_apply', 'post_work_apply', 50, @$data['post_work_apply'], true);


// ---------------- Contact ----------------
// name
$contactName    = FormBackEnd::createInputField('Họ và tên', 'text', 'emp_fullname', 'emp_fullname', @$data['emp_fullname'], 'Vui lòng nhập', true);

// email 
$contactEmail   = FormBackEnd::createInputField('Email', 'email', 'emp_email', 'emp_email', @$data['emp_email'], 'Vui lòng nhập', true);

// phone
$contactPhone   = FormBackEnd::createInputField('Điện thoại', 'text', 'emp_phone', 'emp_phone', @$data['emp_phone'], 'Vui lòng nhập', true);

// address
$contactAddress = FormBackEnd::createInputField('Địa chỉ liên hệ', 'text', 'emp_address', 'emp_address', @$data['emp_address'], 'Vui lòng nhập', false);


// ---------------- Optimize Form ----------------
$_position                      = FormBackEnd::formGroupElements($position, 1);
$career_typeWork_adddressWork   = FormBackEnd::formGroupElements([$career, $typeWork, $addressWork], 3);
$rank_amount_expired            = FormBackEnd::formGroupElements([$rank, $amount, $expired], 3);
$exp_gender_degree              = FormBackEnd::formGroupElements([$exp, $gender, $degree], 3);
$salary_testWork                = FormBackEnd::formGroupElements([$salary, $testWork], 3);

$description                    = FormBackEnd::formGroupElements($descriptionWork, 1);
$required                       = FormBackEnd::formGroupElements($requiredWork, 1);
$benefit                        = FormBackEnd::formGroupElements($benefitWork, 1);
$apply                          = FormBackEnd::formGroupElements($applyWork, 1);

$contactName_Email_Phone        = FormBackEnd::formGroupElements([$contactName, $contactEmail, $contactPhone], 3);
$_address                       = FormBackEnd::formGroupElements([$contactAddress], 3);
?>

<!-- Ckeditor 4.18.0 -->
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<div class="row">
    <div class="col-12 ml-2">
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
                    <input type="submit" id="submit_post" name="submit_post" class="px-3 btn bg-gradient-info float-right shadow-sm" value="<?= $task ?>">
                    <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'index')?>" class="px-3 btn bg-gradient-secondary float-right shadow-sm mx-3">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>