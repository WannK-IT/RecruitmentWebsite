<?php 
    $task = ($_GET['task'] == 'add') ? 'Đăng tin' : 'Lưu bài đăng';
?>
 <!-- Ckeditor 4.18.0 -->
<script src="//cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
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
                        <div class="error-element">
                            <label for="post-position">Chức danh <span class="text-danger">*</span></label>
                            <input type="text" class="form-control fs-input" id="post-position" name="post_position" autocomplete="off" placeholder="Vị trí hiển thị đăng tuyển">
                        </div>
                    </div>

                    <!-- Ngành nghề, hình thức làm việc, nơi làm việc -->
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-career">Ngành nghề <span class="text-danger">*</span></label>
                                    <select id="post-career" name="post_career" class="form-control" required>
                                        <option selected disabled>Chọn</option>
                                        <option>Công nghệ thông tin</option>
                                        <option>Điện - điện tử</option>
                                        <option>Quản trị kinh doanh</option>
                                        <option>Quản trị du lịch nhà hàng khách sạn</option>
                                        <option>Kỹ thuật</option>
                                        <option>Business Analyst</option>
                                        <option>Architect</option>
                                        <option>Constructor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-type-work">Hình thức làm việc <span class="text-danger">*</span></label>
                                    <select id="post-type-work" name="post_type_work" class="form-control" required>
                                        <option selected disabled>Chọn</option>
                                        <option>Full-time</option>
                                        <option>Part-time</option>
                                        <option>Intern</option>
                                        <option>Contract</option>
                                        <option>Khác</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-address-work">Nơi làm việc <span class="text-danger">*</span></label>
                                    <select id="post-address-work" class="form-control" name="post_address_work" required>
                                        <option selected disabled>Chọn</option>
                                        <option>TPHCM</option>
                                        <option>Hà Nội</option>
                                        <option>Đà Nẵng</option>
                                        <option>Cần Thơ</option>
                                        <option>Hải Phòng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cấp bậc, số lượng tuyển dụng, hạn nộp hồ sơ -->
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-rank">Cấp bậc <span class="text-danger">*</span></label>
                                    <select id="post-rank" name="post_rank" class="form-control" required>
                                        <option selected disabled>Chọn</option>
                                        <option>Giám đốc</option>
                                        <option>Trưởng nhóm</option>
                                        <option>Phó giám đốc</option>
                                        <option>Trưởng phòng</option>
                                        <option>Phó phòng</option>
                                        <option>Trưởng chi nhánh</option>
                                        <option>Nhân viên</option>
                                        <option>Thực tập sinh</option>
                                        <option>Quản lý</option>
                                        <option>Cộng tác viên</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-amount">Số lượng tuyển dụng <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control fs-input" id="post-amount" name="post_amount" autocomplete="off" placeholder="Vui lòng nhập">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-expired">Hạn nộp hồ sơ <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control fs-input" placeholder="Vui lòng nhập" autocomplete="off" id="post-expired" name="post_expired" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kinh nghiệm, giới tính, bằng cấp -->
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-exp">Kinh nghiệm</label>
                                    <select id="post-exp" name="post_exp" class="form-control">
                                        <option>Chưa có kinh nghiệm</option>
                                        <option>Dưới 1 năm</option>
                                        <option>1 năm</option>
                                        <option>2 năm</option>
                                        <option>3 năm</option>
                                        <option>4 năm</option>
                                        <option>5 năm</option>
                                        <option>Hơn 5 năm</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-gender">Giới tính</label>
                                    <select id="post-gender" name="post_gender" class="form-control">
                                        <option value="default_gender">Không yêu cầu</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-degree">Bằng cấp</label>
                                    <select id="post-degree" name="post_degree" class="form-control">
                                        <option>Không yêu cầu</option>
                                        <option>Trên đại học</option>
                                        <option>Đại học</option>
                                        <option>Cao đẳng</option>
                                        <option>Trung cấp</option>
                                        <option>Trung học</option>
                                        <option>Chứng chỉ</option>
                                        <option>Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mức lương, thời hạn thử việc -->
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-salary">Mức lương</label>
                                    <select id="post-salary" name="post_salary" class="form-control">
                                        <option>Thỏa thuận</option>
                                        <option>1 - 3 triệu</option>
                                        <option>3 - 5 triệu</option>
                                        <option>5 - 7 triệu</option>
                                        <option>7 - 10 triệu</option>
                                        <option>10 - 12 triệu</option>
                                        <option>12 - 15 triệu</option>
                                        <option>15 - 20 triệu</option>
                                        <option>20 - 25 triệu</option>
                                        <option>25 - 30 triệu</option>
                                        <option>30 - 40 triệu</option>
                                        <option>Trên 40 triệu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-test-work">Thời hạn thử việc</label>
                                    <input type="text" class="form-control fs-input" placeholder="Vui lòng nhập" autocomplete="off" id="post-test-work" name="post_test_work">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Mô tả công việc -->
                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="error-element">
                                    <label>Mô tả công việc <span class="text-danger">*</span></label>
                                    <p class="text-muted"><span>Thông tin cho vị trí công việc yêu cầu, trách nhiệm mà ứng viên có thể đảm nhận khi làm việc ở công ty</span></p>
                                    <textarea id="post_work_description" name="post_work_description" class="form-control fs-input" autocomplete="off" minlength="50"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('post_work_description');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yêu cầu công việc -->
                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="error-element">
                                    <label for="post-work-required">Yêu cầu công việc <span class="text-danger">*</span></label>
                                    <p class="text-muted"><span>Kỹ năng chuyên môn hoặc kỹ năng mềm cần thiết với công việc mà ứng viên cần quan tâm</span></p>
                                    <textarea name="post_work_required" class="form-control fs-input" autocomplete="off" minlength="50"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('post_work_required');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quyền lợi -->
                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="error-element">
                                    <label for="post-work-benefit">Quyền lợi <span class="text-danger">*</span></label>
                                    <p class="text-muted"><span>Những quyền lợi, lợi ích với công việc cho ứng viên với vị trí đăng tuyển</span></p>
                                    <textarea name="post_work_benefit" class="form-control fs-input" autocomplete="off" minlength="50"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('post_work_benefit');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cách thức ứng tuyển -->
                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="error-element">
                                    <label for="post-work-apply">Cách thức ứng tuyển <span class="text-danger">*</span></label>
                                    <textarea name="post_work_apply" class="form-control fs-input" autocomplete="off" minlength="50"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('post_work_apply');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <label style="font-size: 18px;">Thông tin người liên hệ</label>
                    <!-- Họ tên, email, điện thoại, địa chỉ NTD -->
                    <div class="form-group my-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-contact-name">Họ và tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control fs-input" id="post-contact-name" name="post_contact_name" autocomplete="off" placeholder="Vui lòng nhập">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-contact-email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control fs-input" id="post-contact-email" name="post_contact_email" autocomplete="off" placeholder="Vui lòng nhập">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-contact-phone">Điện thoại <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control fs-input" id="post-contact-phone" name="post_contact_phone" autocomplete="off" placeholder="Vui lòng nhập">
                                    <div class="append-phone"></div>
                                </div>

                                <!-- Add more phones - max: 2 phones -->
                                <!-- Option 1: Type Button -->
                                <!-- <button type="button" class="btn btn-sm btn-info my-1" id="add-more-phone">Thêm số điện thoại</button> -->

                                <!-- Option 2: Type Text -->
                                <p class="my-1 text-info font-weight-bold" id="add-more-phone" style="cursor: pointer; font-size: 14px">Thêm số điện thoại</p>
                            </div>

                            <div class="col-md-4">
                                <div class="error-element">
                                    <label for="post-contact-address">Địa chỉ liên hệ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control fs-input" id="post-contact-address" name="post_contact_address" autocomplete="off" placeholder="Vui lòng nhập">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="post_contact_id" value="1">
                    
                    <input type="hidden" name="post_isActive" value="active">
                    <input type="submit" id="submit_post" name="submit_post" class="btn bg-gradient-info float-right shadow-sm" value="<?= $task?>">
                    <input type="button" id="cancel-post" class="btn bg-gradient-secondary float-right shadow-sm mx-3" value="Hủy bỏ">
                </div>
            </form>
        </div>

    </div>
</div>
