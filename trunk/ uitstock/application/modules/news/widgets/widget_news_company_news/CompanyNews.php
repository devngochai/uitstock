<?php 
		$news = $this->newsMapper->getArticleBySub(2, 0, 5);		
		include("view.phtml"); 
?>