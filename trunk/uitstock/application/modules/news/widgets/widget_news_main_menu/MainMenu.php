<?php 
		$parentItem = $this->menuItemMapper->fetchAllParent(3, true);
		$subItem = $this->menuItemMapper->fetchAllSub(3, true);
		include("view.phtml"); 
?>