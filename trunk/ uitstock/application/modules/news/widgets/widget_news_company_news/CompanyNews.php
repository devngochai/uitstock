<?php 
		$news = $this->newsMapper->getArticleBySub(3, 0, 5);		
		include("view.phtml"); 
?>