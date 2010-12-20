<?php 
		$stockNews = $this->newsMapper->getArticleBySub(27, 0, 8);			
		$reports = $this->newsMapper->getArticleBySub(28, 0, 8);		
		$events = $this->newsMapper->getArticleBySub(29, 0, 12);
		$dates = $this->newsMapper->getSummarize(29, 0, 3);				
		include("view.phtml"); 
?>