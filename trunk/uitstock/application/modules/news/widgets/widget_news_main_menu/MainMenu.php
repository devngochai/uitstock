<?php 
		$parentItem = $this->menuItemMapper->fetchAllParent(3);
		$subItem = $this->menuItemMapper->fetchAllSub(3);
		include("view.phtml"); 
?>