<?php
	// ====================== PATHS ===========================
	define ('DS'				, '/');
	define ('ROOT_PATH'			, dirname(__FILE__));						
	define ('LIBRARY_PATH'		, ROOT_PATH . DS . 'libs' . DS);			
	define ('PUBLIC_PATH'		, ROOT_PATH . DS . 'public' . DS);							
	define ('APPLICATION_PATH'	, ROOT_PATH . DS . 'application' . DS);									
	define ('TEMPLATE_PATH'		, PUBLIC_PATH . 'template' . DS);								
	
	define	('ROOT_URL'			, DS . 'RecruitmentWebsite' . DS);
	define	('APPLICATION_URL'	, ROOT_URL . 'application' . DS);
	define	('PUBLIC_URL'		, ROOT_URL . 'public' . DS);
	define	('TEMPLATE_URL'		, PUBLIC_URL . 'template' . DS);
	
	define	('DEFAULT_MODULE'		, 'admin');
	define	('DEFAULT_CONTROLLER'	, 'post');
	define	('DEFAULT_ACTION'		, 'index');

	// ====================== DATABASE ===========================
	define ('DB_HOST'			, $_SERVER['SERVER_NAME']);
	define ('DB_USER'			, 'root');						
	define ('DB_PASS'			, '');						
	define ('DB_NAME'			, 'recruitment');						
	define ('DB_TABLE'			, 'post');						
	define ('DB_TBL_EMPLOYER'	, 'employer');						
