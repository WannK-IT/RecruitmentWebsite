<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline my-2">
            <div class="card-header">
                <h5 class="card-title text-info">Thông tin tuyển dụng</h5>
            </div>

            <form method="post" action="" class="form-job">
                <div class="card-body fs-input mx-2">

                    <div class="form-group mb-3">
                        <label for="post-position">Chức danh <span class="text-danger">*</span></label>
                        <input type="text" class="form-control fs-input" id="post-position" autocomplete="off" placeholder="Vị trí hiển thị đăng tuyển">
                        <span class="error">Vui lòng nhập vị trí công việc</span>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="post-career">Ngành nghề <span class="text-danger">*</span></label>
                                <select id="post-career" class="form-control">
                                    <option value="" selected disabled>Chọn</option>
                                    <option value="">Công nghệ thông tin</option>
                                    <option value="">Điện - điện tử</option>
                                    <option value="">Quản trị kinh doanh</option>
                                    <option value="">Quản trị du lịch nhà hàng khách sạn</option>
                                    <option value="">Kỹ thuật</option>
                                    <option value="">Business Analyst</option>
                                    <option value="">Architect</option>
                                    <option value="">Constructor</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="post-type-work">Hình thức làm việc <span class="text-danger">*</span></label>
                                <select id="post-type-work" class="form-control">
                                    <option value="" selected disabled>Chọn</option>
                                    <option value="">Full-time</option>
                                    <option value="">Part-time</option>
                                    <option value="">Intern</option>
                                    <option value="">Contract</option>
                                    <option value="">Khác</option>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="post-address-work">Nơi làm việc <span class="text-danger">*</span></label>
                                <select id="post-address-work" class="form-control">
                                    <option value="" selected disabled>Chọn</option>
                                    <option value="">TPHCM</option>
                                    <option value="">Hà Nội</option>
                                    <option value="">Đà Nẵng</option>
                                    <option value="">Cần Thơ</option>
                                    <option value="">Hải Phòng</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="post-level">Cấp bậc <span class="text-danger">*</span></label>
                                <select id="post-level" class="form-control">
                                    <option value="" selected disabled>Chọn</option>
                                    <option value="">Giám đốc</option>
                                    <option value="">Trưởng nhóm</option>
                                    <option value="">Phó giám đốc</option>
                                    <option value="">Trưởng phòng</option>
                                    <option value="">Phó phòng</option>
                                    <option value="">Trưởng chi nhánh</option>
                                    <option value="">Nhân viên</option>
                                    <option value="">Thực tập sinh</option>
                                    <option value="">Quản lý</option>
                                    <option value="">Cộng tác viên</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="post-amount">Số lượng tuyển dụng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-input" id="post-amount" autocomplete="off" placeholder="Vui lòng nhập">
                            </div>

                            <div class="col-md-4">
                                <label for="post-expired">Hạn nộp hồ sơ <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control fs-input" placeholder="Vui lòng nhập" autocomplete="off" id="post-expired">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="post-exp">Kinh nghiệm</label>
                                <select id="post-exp" class="form-control">
                                    <option value="">Chưa có kinh nghiệm</option>
                                    <option value="">Dưới 1 năm</option>
                                    <option value="">1 năm</option>
                                    <option value="">2 năm</option>
                                    <option value="">3 năm</option>
                                    <option value="">4 năm</option>
                                    <option value="">5 năm</option>
                                    <option value="">Hơn 5 năm</option>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="post-gender">Giới tính</label>
                                <select id="post-gender" class="form-control">
                                    <option value="">Không yêu cầu</option>
                                    <option value="">Nam</option>
                                    <option value="">Nữ</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="post-degree">Bằng cấp</label>
                                <select id="post-degree" class="form-control">
                                    <option value="">Không yêu cầu</option>
                                    <option value="">Trên đại học</option>
                                    <option value="">Đại học</option>
                                    <option value="">Cao đẳng</option>
                                    <option value="">Trung cấp</option>
                                    <option value="">Trung học</option>
                                    <option value="">Chứng chỉ</option>
                                    <option value="">Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="post-salary">Mức lương <span class="text-danger">*</span></label>
                                <select id="post-salary" class="form-control">
                                    <option value="">Thỏa thuận</option>
                                    <option value="">1 - 3 triệu</option>
                                    <option value="">3 - 5 triệu</option>
                                    <option value="">5 - 7 triệu</option>
                                    <option value="">7 - 10 triệu</option>
                                    <option value="">10 - 12 triệu</option>
                                    <option value="">12 - 15 triệu</option>
                                    <option value="">15 - 20 triệu</option>
                                    <option value="">20 - 25 triệu</option>
                                    <option value="">25 - 30 triệu</option>
                                    <option value="">30 - 40 triệu</option>
                                    <option value="">Trên 40 triệu</option>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="post-test-work">Thời hạn thử việc</label>
                                <input type="text" class="form-control fs-input" placeholder="Vui lòng nhập" autocomplete="off" id="post-test-work">
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="post-work-description">Mô tả công việc <span class="text-danger">*</span></label>
                                <p class="text-muted"><span>Thông tin cho vị trí công việc yêu cầu, trách nhiệm mà ứng viên có thể đảm nhận khi làm việc ở công ty</span></p>
                                <textarea name="post-description" class="form-control fs-input" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="post-work-required">Yêu cầu công việc <span class="text-danger">*</span></label>
                                <p class="text-muted"><span>Kỹ năng chuyên môn hoặc kỹ năng mềm cần thiết với công việc mà ứng viên cần quan tâm</span></p>
                                <textarea name="post-work-required" class="form-control fs-input" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="post-work-benefit">Quyền lợi <span class="text-danger">*</span></label>
                                <p class="text-muted"><span>Những quyền lợi, lợi ích với công việc cho ứng viên với vị trí đăng tuyển</span></p>
                                <textarea name="post-work-benefit" class="form-control fs-input" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="post-work-apply">Cách thức ứng tuyển <span class="text-danger">*</span></label>
                                <textarea name="post-work-apply" class="form-control fs-input" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <label style="font-size: 18px;">Thông tin người liên hệ</label>
                    <div class="form-group my-2">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="post-contact-name">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-input" id="post-contact-name" autocomplete="off" placeholder="Vui lòng nhập">
                            </div>

                            <div class="col-md-4">
                                <label for="post-contact-email">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-input" id="post-contact-email" autocomplete="off" placeholder="Vui lòng nhập">
                            </div>

                            <div class="col-md-4">
                                <label for="post-contact-phone">Điện thoại <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-input" id="post-contact-phone" autocomplete="off" placeholder="Vui lòng nhập">
                                <div class="append-phone"></div>

                                <!-- Add more phones - max: 2 phones -->
                                <!-- Option 1: Type Button -->
                                <!-- <button type="button" class="btn btn-sm btn-info my-1" id="add-more-phone">Thêm số điện thoại</button> -->

                                <!-- Option 2: Type Text -->
                                <p class="my-1 text-info font-weight-bold" id="add-more-phone" style="cursor: pointer; font-size: 14px">Thêm số điện thoại</p>
                            </div>

                            <div class="col-md-4">
                                <label for="post-contact-address">Địa chỉ liên hệ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-input" id="post-contact-address" autocomplete="off" placeholder="Vui lòng nhập">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-info float-right shadow-sm">Đăng tin</button>
                    <button type="submit" class="btn bg-gradient-secondary float-right shadow-sm mx-3">Hủy bỏ</button>
                </div>

            </form>
        </div>

    </div>
</div>