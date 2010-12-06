<?php 		
		$parentName = (null != $this->aliasP) ? $this->categoryMapper->getNameByAlias($this->aliasP) : "";
		$subName = (null != $this->aliasS) ? $this->categoryMapper->getNameByAlias($this->aliasS) : "";	
		include("view.phtml"); 
?>