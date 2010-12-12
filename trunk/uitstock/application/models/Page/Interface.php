<?php
interface Cloud_Model_Page_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Page_CloudPage $Page);
	public function updateComponentbyPage($componentId, $pageId);
	public function find($id, Cloud_Model_Page_CloudPage $Page);
	public function fetchAll();
	public function savePage(Cloud_Model_Page_CloudPage $Page, $component_id);	
	public function getPageByComponent($component_id);
	public function getPageByComponentListDyn($component_id);		
	public function getPageByTitle($title, $component_id, $currentPage);
	public function getPageByName($name, $component_id, $currentPage);
	public function getMinOrder();
	public function getMaxOrder();
	public function deleteAll($listid);
	public function autoSuggestionPage($title, $component_id);
	public function searchPage($title, $component_id);
}