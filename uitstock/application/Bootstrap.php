<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	protected function _initDatabase(){
		$db = $this->getPluginResource('db')->getDbAdapter();
		Zend_Registry::set('db', $db);	
	}

	protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array (
            'namespace' => 'Cloud',
            'basePath' => APPLICATION_PATH,
        ));
        Zend_Session::start();
        return $autoloader;
    }
    
    protected function _initRoutes()
	{
	    $front = Zend_Controller_Front::getInstance();		
		$router = $front->getRouter();
		$config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/routes.xml');
		$router->addConfig($config->routes);		
	}
    
}
