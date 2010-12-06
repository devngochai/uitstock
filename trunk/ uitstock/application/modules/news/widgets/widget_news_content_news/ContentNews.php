<?php 				
		$new = $this->newsMapper->getArticleById($this->id);
		$otherNews = $this->newsMapper->getRelativeArticleByParent(
			$this->id, $this->catPID, 0, 5);		
		include("view.phtml"); 
?>