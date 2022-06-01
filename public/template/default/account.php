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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQueryUI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            background-color: #fff;
            min-height: 100vh;
        }

        .brand-wrapper {
            padding-top: 7px;
            padding-bottom: 8px;
        }

        .brand-wrapper .logo {
            height: 25px;
        }

        .login-section-wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            padding: 68px 100px;
            background-color: #fff;
        }

        @media (max-width: 991px) {
            .login-section-wrapper {
                padding-left: 50px;
                padding-right: 50px;
            }
        }

        @media (max-width: 575px) {
            .login-section-wrapper {
                padding-top: 20px;
                padding-bottom: 20px;
                min-height: 100vh;
            }
        }

        .login-wrapper {
            width: 350px;
            max-width: 100%;
            padding-top: 24px;
            padding-bottom: 24px;
        }

        @media (max-width: 575px) {
            .login-wrapper {
                width: 100%;
            }
        }

        .login-wrapper label {
            font-size: 17px;
            font-weight: bold;
            color: #b0adad;
        }

        .login-wrapper .form-control {
            border: none;
            border-bottom: 1px solid #e7e7e7;
            border-radius: 0;
            padding: 9px 5px;
            min-height: 40px;
            font-size: 18px;
            font-weight: normal;
        }

        .login-wrapper .form-control::-webkit-input-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control::-moz-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control:-ms-input-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control::-ms-input-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control::placeholder {
            color: #b0adad;
        }

        .login-wrapper .login-btn {
            padding: 13px 20px;
            background-color: #2bb5cf;
            border-radius: 0;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 14px;
        }

        .login-wrapper .login-btn:hover {
            border: 1px solid #6c757d;
            background-color: #fff;
            color: #6c757d;
        }

        .login-wrapper a.forgot-password-link {
            color: #080808;
            font-size: 14px;
            text-decoration: underline;
            display: inline-block;
            margin-bottom: 54px;
        }

        @media (max-width: 575px) {
            .login-wrapper a.forgot-password-link {
                margin-bottom: 16px;
            }
        }

        .login-wrapper-footer-text {
            font-size: 16px;
            color: #000;
            margin-bottom: 0;
        }

        .login-title {
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .login-img {
            width: 100%;
            height: 100vh;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: left;
            object-position: left;
        }
    </style>
</head>

<body>
    <main>

        <?php require_once "html/header.php" ?>

        <?php
        require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
        ?>

    </main>
    <?php require_once "html/footer.php" ?>
    <?php echo $this->_jsFiles; ?>


    <!-- Select2 v4.1.0 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- jQueryUI v1.12.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery Validation v1.19.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>

    <?php
    if (@$_SESSION['registerUserSuccess'] == true) {
        echo '<script type="text/javascript">
    toastr.options = {
      "timeOut": "3000",
      "positionClass": "toast-top-center"
    };
    toastr["success"]("Đăng ký tài khoản thành công !")
  </script>';
        unset($_SESSION['registerUserSuccess']);
    }
    ?>
</body>

</html>