<?php
	
	require_once 'define.php';

	spl_autoload_register(function ($class_name) {
		require_once LIBRARY_PATH . "{$class_name}.php";
	});
	
	$bootstrap = new Bootstrap();
	$bootstrap->init();