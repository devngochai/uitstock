<?php 
		$hotNews = $this->newsMapper->getImportantArticle(0, 5, true);
		$topNews = $this->newsMapper->getMostCountArticle(0, 5);
		include("view.phtml"); 
?>