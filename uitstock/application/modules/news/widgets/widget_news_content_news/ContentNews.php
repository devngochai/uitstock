<?php 	
		$this->newsMapper->updateCount($this->alias);
					
		$new = $this->newsMapper->getArticleByAlias($this->alias);
		
		$otherNews = (null == $this->aliasS) ?				
			$this->newsMapper->getArticleInParent(
				$this->alias, $this->aliasP, 0, 5) :		
			$this->newsMapper->getArticleInSub(
				$this->alias, $this->aliasS, 0, 5);	
		
		$relative_id = $new['relative_id'];				
		$relatives = $this->newsMapper->getRelativeArticle($relative_id);
						
		include("view.phtml"); 
?>