<?php
class ZendStock_Controller_Action extends Zend_Controller_Action {

	public function init() {
          parent::init();
	}
	
	public function createLayout($dirTemplate, $dirTheme, $fileTemplate = "index", $sectionConfig = 'template', $fileConfig = 'config.ini') {
    	  /* -------------------------------------------------------------- 
    	   * Đọc file config   
		  -------------------------------------------------------------- */    	   
    	  $dirFileConfig = PUBLIC_PATH . $dirTheme . '/' .$fileConfig;    
    	  $section  = $sectionConfig;		  
          $config   = new Zend_Config_Ini( $dirFileConfig, $section);      
          $config   = $config->toArray();   

          $dirCss = $dirTheme . $config['dirCss'];
          $dirImg = $dirTheme . $config['dirImg'];
          $dirJs = $dirTheme . $config['dirJs'];
    
          /* -------------------------------------------------------------- 
    	   * Thiết lập DocType   
		  -------------------------------------------------------------- */
          $this->view->doctype($config['doctype']);

          /* -------------------------------------------------------------- 
    	   * Thiết lập thẻ meta	   
		  -------------------------------------------------------------- */                  
          if(count($config['metaHttp'])>0){
             foreach ($config['metaHttp'] as $key => $metaHttp){
                $tmp = explode('|',$metaHttp);	          
                $this->view->headMeta()->appendHttpEquiv($tmp[0],$tmp[1]);
             }
          }
          	  
          if(count($config['metaName'])>0){
             foreach ($config['metaName'] as $key => $metaName){
                $tmp = explode('|',$metaName);	  
                $this->view->headMeta()->appendName($tmp[0],$tmp[1]);
             }
          }          
         
          /* -------------------------------------------------------------- 
    	   * Thiết lập thẻ link	   
		  -------------------------------------------------------------- */                                        
          // Thiết lập favicon
          if(count($config['imgFav'])>0){
             foreach ($config['imgFav'] as $key => $fav){
                $this->view->headLink()->headLink(array('rel' => 'shortcut icon',
          						 				  'href' => $dirImg . $fav),
          						 				  'PREPEND');
                }
          }                                                  
          
          // Thiết lập tập tin css                                       
          if(count($config['fileCss'])>0){
             foreach ($config['fileCss'] as $key => $css){
                $this->view->headLink()->appendStylesheet($dirCss . $css);
             }
          }
          
          // Thiết lập tập tin fix css cho ie
          if(count($config['fixCss'])>0){
             foreach ($config['fixCss'] as $key => $css){
                $tmp = explode("|", $css);
                $this->view->headLink()->prependStylesheet($dirCss . $tmp[1],
          							                       'screen',
          							                       true,
          							                       array('conditional' => $tmp[0]));
             }
          }	
                  
          /* -------------------------------------------------------------- 
    	   * Thiết lâp thẻ script	   
		  -------------------------------------------------------------- */          	      						    	          
          // Thiết lập tập tin javascript     								      							          
          
          if(count($config['fileJs'])>0){
             foreach ($config['fileJs'] as $key => $js){
                $this->view->headScript()->appendFile($dirJs . $js);
             }
          }
          
          // Thiết lập tập tin cấu hình HTM5 cho IE < 9
          if(count($config['fixJs'])>0){
             foreach ($config['fixJs'] as $key => $js){
                 $tmp = explode("|", $js);
                 $this->view->headScript()->prependFile($dirJs . $tmp[1],	  
                                                        'text/javascript',   						  
         						                        array('conditional' => $tmp[0]));
             }
          }
          
          /* -------------------------------------------------------------- 
    	   * Thiết lập đường dẫn	   
		  -------------------------------------------------------------- */                						   
          $this->view->dirCss = $dirCss;
          $this->view->dirImg = $dirImg;
          $this->view->dirJs  = $dirJs;
          
          /* -------------------------------------------------------------- 
    	   * Thiết lập template	   
		  -------------------------------------------------------------- */     	 
    	  $templatePath = PUBLIC_PATH . $dirTemplate;		
    	  $option     = array('layout' => $fileTemplate,
    	                      'layoutPath' => $templatePath);
    	  Zend_Layout::startMvc($option);	
          
          return $config;	
	}
	
	public function getForm($section, $myForm)
	{
		 $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/cloudform.xml', 'localhost');		 
		 $form = new Zend_Form($config->$section->$myForm);
		 return $form;
	}
}