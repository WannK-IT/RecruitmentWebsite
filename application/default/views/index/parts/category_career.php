<section class="category-career" style="background-color: hsl(0, 0%, 98%)">
    <div class="container pb-2" style="max-width: 1160px;">
        <div class="col-md-12 col-12">
            <div class="row d-flex justify-content-center">
                <p class="py-5 h2 text-center text-secondary fw-bold">Đa dạng ngành nghề</p>
            </div>

            <div class="row mb-5 d-flex justify-content-center" style="background: radial-gradient(rgba(13, 110, 253, .06), white);">
                <div class="card shadow-sm border-1 cs-list-job mx-3" style="width: 10rem;">
                    <div class="card-body text-center">
                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => 'Công nghệ thông tin'])?>"><img src="<?= $this->_dirImg ?>listjob/it.png" alt="jobit"></a>
                        <p class="card-title pt-2">Công Nghệ</p>
                    </div>
                </div>

                <div class="card shadow-sm border-1 cs-list-job mx-3" style="width: 10rem;">
                    <div class="card-body text-center">
                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => 'Marketing'])?>"><img src="<?= $this->_dirImg ?>listjob/marketing.png" alt="jobmarketing"></a>
                        <p class="card-title pt-2">Marketing</p>
                    </div>
                </div>

                <div class="card shadow-sm border-1 cs-list-job mx-3" style="width: 10rem;">
                    <div class="card-body text-center">
                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => 'Quản trị kinh doanh'])?>"><img src="<?= $this->_dirImg ?>listjob/business.png" alt="jobbusiness"></a>
                        <p class="card-title pt-2">Kinh Doanh</p>
                    </div>
                </div>

                <div class="card shadow-sm border-1 cs-list-job mx-3" style="width: 10rem;">
                    <div class="card-body text-center">
                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => 'Truyền thông đa phương tiện'])?>"><img src="<?= $this->_dirImg ?>listjob/media.png" alt="jobtechnique"></a>
                        <p class="card-title pt-2">Truyền thông</p>
                    </div>
                </div>

                <div class="card shadow-sm border-1 cs-list-job mx-3" style="width: 10rem;">
                    <div class="card-body text-center">
                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => 'Kế toán'])?>"><img src="<?= $this->_dirImg ?>listjob/accounting.png" alt="jobaccounting"></a>
                        <p class="card-title pt-2">Kế Toán</p>
                    </div>
                </div>

                <div class="card shadow-sm border-1 cs-list-job mx-3" style="width: 10rem;">
                    <div class="card-body text-center">
                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index', ['career_search' => 'Bất động sản'])?>"><img src="<?= $this->_dirImg ?>listjob/realty.png" alt="jobeconomic"></a>
                        <p class="card-title pt-2">Bất động sản</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3 me-3">
                    <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'index')?>" class="view-all">
                        <span>Xem thêm nhiều ngành nghề hot&nbsp;<i style="font-size: 13px;" class="fa-solid fa-arrow-right"></i></span>

                    </a>
                </div>
            </div>
        </div>
    </div>
</section>