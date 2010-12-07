<?php 
		$number = 7;
		$start = ($this->page - 1) * $number;
		$news = (null == $this->aliasS) ?
			$this->newsMapper->getArticleByParentAlias($this->aliasP, $start,$number) :
			$this->newsMapper->getArticleBySubAlias($this->aliasS, $start,$number);
			
		$number_of_page = (null == $this->aliasS) ?
			$this->newsMapper->countByParentAlias($this->aliasP) :
			$this->newsMapper->countBySubAlias($this->aliasS);						
			
		include("view.phtml"); 
?>