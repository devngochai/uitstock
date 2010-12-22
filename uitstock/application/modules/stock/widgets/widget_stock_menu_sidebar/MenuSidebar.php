<?php 
		$parentItem = $this->menuItemMapper->fetchAllParent(2, true);
		$subItem = $this->menuItemMapper->fetchAllSub(2, true);
		include("view.phtml"); 
?>