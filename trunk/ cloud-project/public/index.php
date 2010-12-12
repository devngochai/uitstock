<?php
	// Define base path obtainable throughout the whole application
    defined('BASE_PATH')
        || define('BASE_PATH', realpath(dirname(dirname(__FILE__))));        

	// Define path to the application directory
	defined('APPLICATION_PATH')
		|| define('APPLICATION_PATH',
				  BASE_PATH . '/application');	

   // Define path to the public directory
	defined('PUBLIC_PATH')
		|| define('PUBLIC_PATH',
				  BASE_PATH . '/public');					  
				  
	// Define application environment
	defined('APPLICATION_ENV')
		|| define('APPLICATION_ENV',
				  (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
				  							: 'development'));	

    // Typically, you will also want to add your library/ directory
    // to the include_path, particularly if it contains your ZF installed				  							 
    set_include_path(implode(PATH_SEPARATOR, array(
        realpath(BASE_PATH . '/library'),
        get_include_path()
    )));			

	/** Zend Application **/
	require_once 'Zend/Application.php';
	
	$environment = APPLICATION_ENV;
	$options     = APPLICATION_PATH . '/configs/application.ini';

	$application = new Zend_Application($environment, $options);
	
	$application->bootstrap()->run();