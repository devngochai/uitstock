<?php 		
		$parentName = (null != $this->aliasP) ? $this->categoryMapper->getNameByAlias($this->aliasP) : "";
		$subName = (null != $this->aliasS) ? $this->categoryMapper->getNameByAlias($this->aliasS) : "";
		$linkP = $this->aliasP;
		$linkS = $this->aliasS;				
		include("view.phtml"); 
?>