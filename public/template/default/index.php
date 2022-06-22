<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->_metaHTTP; ?>
    <?php echo $this->_metaName; ?>
    <?php echo $this->_title; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link href="<?= UPLOAD_URL . 'favicon-bg-remove.png' ?>" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3c50210ea0.js" crossorigin="anonymous"></script>
    <?php echo $this->_cssFiles; ?>

    <!-- select2 library - replace select box -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- jQueryUI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>

    <!-- Header -->
    <?php require_once "html/header.php" ?>

    <?php
    require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
    ?>

    <!-- Footer Page -->
    <?php require_once "html/footer.php" ?>
    <?php echo $this->_jsFiles; ?>
    <!-- Select2 v4.1.0 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- jQueryUI v1.12.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery Validation v1.19.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>

    <!-- Font awesome ver 6 -->
    <script src="https://kit.fontawesome.com/3c50210ea0.js" crossorigin="anonymous"></script>

    <?php

    if (isset($_SESSION['default']['userLoginSuccess']) && $_SESSION['default']['userLoginSuccess'] == true) {
        echo '<script type="text/javascript">
                    toastMsg("success", "Đăng nhập thành công !")
            </script>';
        unset($_SESSION['default']['userLoginSuccess']);
    }

    if (isset($_SESSION['default']['updateProfileSuccess']) && $_SESSION['default']['updateProfileSuccess'] == true) {
        echo '<script type="text/javascript">
                    toastMsg("success", "Cập nhật hồ sơ thành công !")
            </script>';
        unset($_SESSION['default']['updateProfileSuccess']);
    }
    
    if (isset($_SESSION['default']['uploadcv']) && $_SESSION['default']['uploadcv'] == true) {
        echo '<script type="text/javascript">
                    toastMsg("success", "Upload CV thành công !")
            </script>';
        unset($_SESSION['default']['uploadcv']);
    }

    if (isset($_SESSION['default']['deletecv']) && $_SESSION['default']['deletecv'] == true) {
        echo '<script type="text/javascript">
                Swal.fire(
                    "Đã xóa!",
                    "CV của bạn đã được xóa thành công",
                    "success"
                )
            </script>';
        unset($_SESSION['default']['deletecv']);
    }

    if (isset($_SESSION['default']['applyJobSuccess']) && $_SESSION['default']['applyJobSuccess'] == true) {
        echo '<script type="text/javascript">
                    toastMsg("success", "Ứng tuyển công việc thành công !")
            </script>';
        unset($_SESSION['default']['applyJobSuccess']);
    }

    if (isset($_SESSION['default']['checkExistProfile']) && $_SESSION['default']['checkExistProfile'] == true) {
        echo '<script type="text/javascript">
                    toastMsg("warning", "Vui lòng hoàn thiện hồ sơ<br>trước khi ứng tuyển !")
            </script>';
        unset($_SESSION['default']['checkExistProfile']);
    }

    if (isset($_SESSION['default']['checkExistCV']) && $_SESSION['default']['checkExistCV'] == true) {
        echo '<script type="text/javascript">
                    toastMsg("warning", "Vui lòng cập nhật CV<br>trước khi ứng tuyển !")
            </script>';
        unset($_SESSION['default']['checkExistCV']);
    }
    ?>

</body>

</html>