<?php
/**
	 * Class        : Utli Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Utli_CloudUtli implements Cloud_Model_Utli_Interface
	{
		const DATE = 'dd/MM/YYYY';
		const TIME = 'HH:mm';
		const DATETIME = 'dd/MM/YYYY HH:mm:ss';
		const DATABASE_DATE = 'YYYY-MM-dd';
	    const DATABASE_DATETIME = 'YYYY-MM-dd HH:mm:ss';
	    
	    public static function showDate($date)
	    {	    					    	    																	 
		    $date = new Zend_Date($date, Cloud_Model_Utli_CloudUtli::DATETIME);
		    $date = $date->get(Cloud_Model_Utli_CloudUtli::DATETIME);	
		    return $date;
	    }
	    
		public static function showDateDB($date)
	    {	    					    	    																	 
		    $date = new Zend_Date($date, Cloud_Model_Utli_CloudUtli::DATABASE_DATE);
		    $date = $date->get(Cloud_Model_Utli_CloudUtli::DATABASE_DATE);	
		    return $date;
	    }
	    
		public static function showDay($date)
	    {	    					    	    																	 
		    $date = new Zend_Date($date, Cloud_Model_Utli_CloudUtli::DATE);
		    $date = $date->get(Cloud_Model_Utli_CloudUtli::DATE);	
		    return $date;
	    }
	    
		public static function showTime($date)
	    {	    					    	    																	 
		    $date = new Zend_Date($date);
		    $date = $date->get(Cloud_Model_Utli_CloudUtli::TIME);	
		    return $date;
	    }

		public static function stripUnicode($str)
        {
            if (!$str) return false;
            $unicode = array(
             'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
             'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
             'd'=>'đ',
             'D'=>'Đ',
        	  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        	  'i'=>'í|ì|ỉ|ĩ|ị',	  
        	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
             'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
             'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
             'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
             'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
           );
           foreach ($unicode as $khongdau => $codau)
           {
                $arr = explode("|", $codau);
                $str = str_replace($arr, $khongdau, $str);
           }
           return $str;
        } 
        
		public static function setPublish($dbTable, $listid)
		{
			for ($i = 0; $i < count($listid); $i++) {
				$id = $listid[$i]; 
				$data = array('published' => 1);
				$where = array('id = ?' => $id);
				$dbTable->update($data, $where);
			}
		}
		
	    public static function setUnPublish($dbTable, $listid)
		{
			for ($i = 0; $i < count($listid); $i++) {						
				$id = $listid[$i]; 				
				$data = array('published' => 0);
				$where = array('id = ?' => $id);
				$dbTable->update($data, $where);
			}
		}
		
		public static function setPublishAjax($dbTable, $id)
		{		;
			$select = $dbTable->select()			    
			                  ->from($dbTable, 'published')            	
			                  ->where('id = ?', $id);				          
			$row = $dbTable->fetchRow($select);																	
																      				 			      		
			$publish = ($row->published == 1) ? 0 : 1;
						
			$data = array('published' => $publish);
			$where = array('id = ?' => $id);
			$dbTable->update($data, $where);
			echo "AnHien_$publish.png";
		}
		
		public static function setEnable($dbTable, $listid)
		{
			for ($i = 0; $i < count($listid); $i++) {
				$id = $listid[$i]; 
				$data = array('is_enable' => 1);
				$where = array('id = ?' => $id);
				$dbTable->update($data, $where);
			}
		}
		
	    public static function setDisable($dbTable, $listid)
		{
			for ($i = 0; $i < count($listid); $i++) {						
				$id = $listid[$i]; 				
				$data = array('is_enable' => 0);
				$where = array('id = ?' => $id);
				$dbTable->update($data, $where);
			}
		}
		
		public static function setEnableAjax($dbTable, $id)
		{		;
			$select = $dbTable->select()			    
			                  ->from($dbTable, 'is_enable')            	
			                  ->where('id = ?', $id);				          
			$row = $dbTable->fetchRow($select);																	
																      				 			      		
			$publish = ($row->is_enable == 1) ? 0 : 1;
						
			$data = array('is_enable' => $publish);
			$where = array('id = ?' => $id);
			$dbTable->update($data, $where);
			echo "AnHien_$publish.png";
		}
		

		public static function getBrowser($user_agent)
		{		
			$info = array();
            $browser = array("Navigator" => "/Navigator(.*)/i",
                              "Firefox"  => "/Firefox(.*)/i",
                              "Internet Explorer" => "/MSIE(.*)/i",
                              "Google Chrome"  => "/chrome(.*)/i",
                              "MAXTHON" => "/MAXTHON(.*)/i",
                               "Opera" => "/Opera(.*)/i",
            );

            foreach($browser as $key => $value){
            	if(preg_match($value, $user_agent)){
                	$info = array_merge($info, array("Browser" => $key));
                    $info = array_merge($info, array(
                               	"Version" => Cloud_Model_Utli_CloudUtli::getVersion($info, $key, $value, $user_agent)));
                                break;
                }else{
                    $info = array_merge($info, array("Browser" => "UnKnown"));
                    $info = array_merge($info, array("Version" => "UnKnown"));
                 }
            }
            
            return $info;
		}	
		
	
        public static function getVersion($info, $browser, $search, $string){
                $browser = $info['Browser'];
                $version = "";
                $browser = strtolower($browser);
                preg_match_all($search,$string,$match);

                switch($browser){
                        case "firefox": $version = str_replace("/","",$match[1][0]);
                        break;                      
                        case "internet explorer": $version = substr($match[1][0],0,4);
                        break;                      
                        case "opera": $version = str_replace("/","",substr($match[1][0],0,5));
                        break;                      
                        case "navigator": $version = substr($match[1][0],1,7);
                        break;                       
                        case "maxthon": $version = str_replace(")","",$match[1][0]);
                        break;                       
                        case "google chrome": $version = substr($match[1][0],1,10);
                }

                return $version;
        }		
			

		public static function getOs($user_agent)		
		{		
			$oses = array (			
				'Windows 3.11' => 'Win16',			
				'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',			
				'Windows 98' => '(Windows 98)|(Win98)',			
				'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',			
				'Windows XP' => '(Windows NT 5.1)|(Windows XP)',			
				'Windows 2003' => '(Windows NT 5.2)',			
				'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',			
				'Windows ME' => 'Windows ME',			
				'Open BSD'=>'OpenBSD',			
				'Sun OS'=>'SunOS',			
				'Linux'=>'(Linux)|(X11)',			
				'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',			
				'QNX'=>'QNX',			
				'BeOS'=>'BeOS',			
				'OS/2'=>'OS/2',			
				'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'			
			);
						 			
			foreach($oses as $os=>$pattern)
			
			{			
				if (eregi($pattern, $user_agent))			
					return $os;			
				}			
				return 'Unknown';			
				}		
	}