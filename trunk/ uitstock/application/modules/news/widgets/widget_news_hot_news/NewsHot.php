<?php 
		$hotNews = $this->newsMapper->getImportantArticle(4, 8);
		$topNews = $this->newsMapper->getMostCountArticle(0, 5);
		include("view.phtml"); 
?>