<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->_metaHTTP; ?>
    <?php echo $this->_metaName; ?>
    <?php echo $this->_title; ?>
    <!-- favicon -->
    <link href="<?= UPLOAD_URL . 'favicon-bg-remove.png'?>" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3c50210ea0.js" crossorigin="anonymous"></script>
    <?php echo $this->_cssFiles; ?>
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
</body>

</html>