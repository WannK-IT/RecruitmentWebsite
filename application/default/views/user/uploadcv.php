<?php
$href = '';
$errorUpload = (!empty($this->errorUpload)) ? '<p class="text-center pt-2 text-sm text-danger">' . $this->errorUpload . '</p>' : '';
$CV = $btnDeleteCV = '';
if (!empty($this->getCV['fileCV'])) {

    $href       .= 'javascript:deleteCV(\''.URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'deleteCV').'\')';
    $CV         .=   '<div class="mt-4">
                    <iframe src=' . UPLOAD_URL_DEFAULT . 'cv' . DS . $_SESSION['loginDefault']['idUser'] . DS . $this->getCV['fileCV'] . ' width="100%" height="1000px"></iframe>
                </div>';
    $btnDeleteCV .= '<div class="mt-3 mx-1" id="deleteCV">
                        <a href="' . $href . '" style="width: 110px" class="btn bg-red text-white bg-gradient">
                        <i class="fa-solid fa-trash pe-2"></i>Xóa CV</a>
                    </div>';
}
?>

<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <div class="col-12">
                    <form class="form-horizontal" method="post" id="form-upload-cv" enctype="multipart/form-data">
                        <div class="mt-2 d-flex justify-content-center">
                            <label for="upload_cv" role="button" style="width: 110px" class="btn bg-purple fw-bold mt-3 mx-1 text-white bg-gradient">
                                <i class="fa-solid fa-cloud-arrow-up pe-2"></i><span>Tải CV</span>
                            </label>
                            <input id="upload_cv" type="file" name="upload_cv" style="display:none">
                            <?= $btnDeleteCV ?>
                        </div>
                        <p class="text-center text-muted pt-1">(CV phải có định dạng .pdf, dung lượng không vượt quá 3MB)</p>
                    </form>

                    <?= $errorUpload ?>
                    <?= $CV ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>