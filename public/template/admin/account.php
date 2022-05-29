<!DOCTYPE html>
<html lang="en" class="bg-gradient-info">

<head>
  <?php echo $this->_metaHTTP; ?>
  <?php echo $this->_metaName; ?>
  <?php echo $this->_title; ?>
  <link href="<?= UPLOAD_URL . 'favicon-bg-remove.png'?>" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- select2 library - replace select box -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- jQueryUI -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <?php echo $this->_cssFiles; ?>

</head>

<body>
  <div class="bg-gradient-info text-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <?php
        require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
        ?>
      </div>
    </div>
  </div>
  <!-- Load jQuery Javascript -->
  <?php echo $this->_jsFiles; ?>

  <!-- Select2 v4.1.0 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- jQueryUI v1.12.1 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- jQuery Validation v1.19.3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
</body>

</html>