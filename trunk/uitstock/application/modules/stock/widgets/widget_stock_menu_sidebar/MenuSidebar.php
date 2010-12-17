<?php 
		$parentItem = $this->menuItemMapper->fetchAllParent(2);
		$subItem = $this->menuItemMapper->fetchAllSub(2);
		include("view.phtml"); 
?>