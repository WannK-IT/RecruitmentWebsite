<?php
$list = $this->listCompanies;
$xhtml = '';
if (!empty($list)) {
    foreach ($list as $infoCompany) {

        if(!empty($infoCompany['comp_logo'])){
            $imgCompany = UPLOAD_URL_ADMIN . 'img/' . $infoCompany['emp_id'] . '/' . $infoCompany['comp_logo'];
        }else{
            $imgCompany = IMG_URL_ADMIN . 'thumbnail_default.png';
        }

        $href   = URL::addLink($this->arrParam['module'], 'company', 'viewcompany', ['idCompany' => $infoCompany['comp_id']]);
        $xhtml .= '<div class="card card-company-job rounded-0 p-2 shadow-sm ps-3 mb-2">
            <div class="row">
                <div class="col-md-2 d-flex justify-content-center my-auto">
                    <img src="' . $imgCompany . '" class="img-fluid" style="max-height: 100px;">
                </div>
                <div class="col-md-9">
                    <a class="company-job" href="' . $href . '">
                        <p class="fw-bold m-0 pb-2 pt-2 fs-input">' . $infoCompany['comp_name'] . '</p>
                        <p class="m-0 text-muted" style="font-size: 14px;"><i class="fa-solid fa-map-location-dot pe-2"></i>' . $infoCompany['comp_address'] . '</p>
                        <p class="m-0 text-muted" style="font-size: 14px;"><i class="fa-solid fa-user-group pe-2"></i>' . $infoCompany['comp_size'] . '</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <button class="border-0 bg-white float-end">
                        <span>
                            <h5><i class="bi bi-bookmark"></i></h5>
                        </span>
                    </button>
                </div>
            </div>
        </div>';
    }
} else {
    $xhtml = '<p class="ps-3">Không có công ty phù hợp với thông tin tìm kiếm !</p>';
}
?>
<div class="container" style="min-height: 700px">
    <div style="margin-top: 5rem" class="ps-1 mb-5">
        <form method="GET" id="formSearchCompany">
            <input type="hidden" name="module" value="default">
            <input type="hidden" name="controller" value="company">
            <input type="hidden" name="action" value="index">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="company_search" autocomplete="off" class="form-control" placeholder="Nhập công ty cần tìm kiếm" value="<?= @$this->arrParam['company_search']?>">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn text-white bg-primary bg-gradient" id="search_company" value="Tìm kiếm">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="my-2">
        <div class="card border-0 ps-1">
            <div class="col-md-8  mb-4">

                <div class="card rounded-0 p-2 border-0 shadow-sm ps-3 mb-3">
                    <div class="fw-bold h5">
                        <p>Kết quả tìm kiếm: <?= $this->totalCompany['total'] ?> công ty<br></p>
                        <?php
                        $keyword = '';
                        if (!empty(@$this->arrParam['company_search']))
                            $keyword .= '<span class="badge bg-blur-info text-dark ms-1 fs-12">' . @$this->arrParam['company_search'] . '</span>';

                        $keyword = (!empty($keyword)) ? '<div class="mb-2"><span class="fs-12">Từ khóa: </span>' . $keyword . '</div>' : '';
                        echo $keyword;
                        ?>
                    </div>
                </div>

                <?= $xhtml ?>

            </div>
        </div>
    </div>
</div>