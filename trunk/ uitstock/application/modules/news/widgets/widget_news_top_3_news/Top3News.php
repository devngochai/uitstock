<?php 
		$news = $this->newsMapper->getImportantArticle(1, 3);		
		include("view.phtml"); 
?>