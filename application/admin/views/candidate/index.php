<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline my-2">
            <div class="card-body">

                <div class="col-md-7 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="GET">
                                <select name="" id="" class="form-control">
                                    <option value="default" disabled selected>Tất cả ngành nghề</option>
                                    <option value="">IT</option>
                                    <option value="">Marketing</option>
                                    <option value="">Truyền thông</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <form action="" method="GET">
                                <input type="hidden" name="module" value="admin">
                                <input type="hidden" name="controller" value="candidate">
                                <input type="hidden" name="action" value="index">

                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="search_position" placeholder="Nhập tên vị trí hoặc chức danh">
                                    </div>

                                    <div class="col-md-4">
                                        <button type="button" id="search_candidate" class="btn bg-gradient-info">Tìm kiếm</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                            <a class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                                <span class="fs-5 fw-semibold pl-2">Lọc hồ sơ</span>
                            </a>
                            <ul class="list-unstyled pl-0">
                                <li class="mb-2">
                                    <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse" aria-expanded="true">Hình thức làm việc</button>
                                    <div class="collapse show" id="profile-collapse">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small pt-2">
                                            <li class="form-check">
                                                <div class="pl-4">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">Toàn thời gian</label>
                                                </div>
                                            </li>
                                            <li class="form-check">
                                                <div class="pl-4">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">Bán thời gian</label>
                                                </div>
                                            </li>
                                            <li class="form-check">
                                                <div class="pl-4">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">Khác</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse2" aria-expanded="true">Địa điểm</button>
                                    <div class="collapse show" id="profile-collapse2">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small pt-2">
                                            <li class="form-check">
                                                <select name="" id="" class="form-control">
                                                    <option value="default" selected disabled>Tất cả tỉnh thành</option>
                                                    <option value="">TPHCM</option>
                                                    <option value="">Đà Nẵng</option>
                                                    <option value="">Hà Nội</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse3" aria-expanded="true">Bằng cấp</button>
                                    <div class="collapse show" id="profile-collapse3">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small pt-2">
                                            <li class="form-check">
                                                <select name="" id="" class="form-control">
                                                    <option value="default" selected disabled>Tất cả bằng cấp</option>
                                                    <option value="">Đại học</option>
                                                    <option value="">Cao đẳng</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#profile-collapse4" aria-expanded="true">Giới tính</button>
                                    <div class="collapse show" id="profile-collapse4">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small pt-2">
                                            <li class="form-check">
                                                <select name="" id="" class="form-control">
                                                    <option value="default" selected disabled>Tất cả giới tính</option>
                                                    <option value="">Nam</option>
                                                    <option value="">Nữ</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 p-3">
                        <div class="col-12">
                            <p class="font-weight-bold h5 mb-3 ml-3">Kết quả tìm thấy: <span class="">20 hồ sơ</span></p>
                            <form method="post" action="" id="update-user-form" novalidate="novalidate">
                                <div class="row ml-2">
                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card rounded-0 hover-card p-2 pl-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <a href="">
                                                    <p class="font-weight-bold m-0">Nguyễn Nhựt Quang</p>
                                                    <p class="m-0 pb-2 text-muted" style="font-size: 14px;"><i class="fas fa-file-invoice pr-2"></i>BackEnd Developer</p>
                                                    <div class="list-inline">
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-coins pr-1"></i>
                                                            <span style="font-size: 14px;">Thỏa thuận</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-briefcase pr-1"></i>
                                                            <span style="font-size: 14px;">2 năm</span>
                                                        </div>
                                                        <div class="list-inline-item pr-3 text-muted" style="font-size: 14px;"><i class="fas fa-map-marked-alt pr-1"></i>
                                                            <span style="font-size: 14px;">TPHCM</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>