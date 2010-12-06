<?php 
		$hotNews = $this->newsMapper->getImportantArticle(4, 5);
		$topNews = $this->newsMapper->getMostCountArticle(0, 5);
		include("view.phtml"); 
?>