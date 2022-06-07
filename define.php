<?php
// ====================== PATHS ===========================
define('DS'                     , '/');
define('ROOT_PATH'              , dirname(__FILE__));
define('LIBRARY_PATH'           , ROOT_PATH . DS . 'libs' . DS);
define('LIBRARY_EXT_PATH'       , LIBRARY_PATH . DS . 'extends' . DS);
define('PUBLIC_PATH'            , ROOT_PATH . DS . 'public' . DS);
define('APPLICATION_PATH'       , ROOT_PATH . DS . 'application' . DS);
define('TEMPLATE_PATH'          , PUBLIC_PATH . 'template' . DS);
define('UPLOAD_PATH'            , PUBLIC_PATH . 'uploads' . DS);
define('UPLOAD_PATH_ADMIN'      , UPLOAD_PATH . 'admin' . DS);
define('UPLOAD_PATH_DEFAULT'    , UPLOAD_PATH . 'default' . DS);

define('ROOT_URL'               , DS . 'RecruitmentWebsite' . DS);
define('APPLICATION_URL'        , ROOT_URL . 'application' . DS);
define('PUBLIC_URL'             , ROOT_URL . 'public' . DS);
define('TEMPLATE_URL'           , PUBLIC_URL . 'template' . DS);
define('UPLOAD_URL'             , PUBLIC_URL . 'uploads' . DS);
define('UPLOAD_URL_ADMIN'       , UPLOAD_URL . 'admin' . DS);
define('UPLOAD_URL_DEFAULT'     , UPLOAD_URL . 'default' . DS);
define('IMG_URL_DEFAULT'        , TEMPLATE_URL . 'default' . DS . 'images' . DS );
define('IMG_URL_ADMIN'        , TEMPLATE_URL . 'admin' . DS . 'images' . DS );

define('DEFAULT_MODULE'         , 'default');
define('DEFAULT_CONTROLLER'     , 'index');
define('DEFAULT_ACTION'         , 'index');

// ====================== DATABASE ===========================
define('DB_HOST'                , $_SERVER['SERVER_NAME']);
define('DB_USER'                , 'root');
define('DB_PASS'                , '');
define('DB_NAME'                , 'recruitment');
define('DB_TABLE'               , 'post');
define('DB_TBL_EMPLOYER'        , 'employer');
define('DB_TBL_COMPANY'         , 'company');
define('DB_TBL_USER'            , 'user');
define('DB_TBL_CV'              , 'cv');
