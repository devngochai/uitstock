<?php 
		$news = $this->newsMapper->getImportantArticle(1, 3, false);		
		include("view.phtml"); 
?>