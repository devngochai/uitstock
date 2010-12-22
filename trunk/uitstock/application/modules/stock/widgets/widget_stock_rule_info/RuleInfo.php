<?php 
		$rule = $this->newsMapper->getArticleBySub(23, 0, 1);
		$hotkey = $this->newsMapper->getArticleBySub(30, 0, 1);
		include("view.phtml"); 
?>