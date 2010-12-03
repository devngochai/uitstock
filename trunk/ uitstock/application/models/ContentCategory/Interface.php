<?php
interface Cloud_Model_ContentCategory_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_ContentCategory_CloudContentCategory $contentCategory);
	public function find($id, Cloud_Model_ContentCategory_CloudContentCategory $contentCategory);
	public function delete($id);
	public function fetchAllParent();
	public function fetchAllSub();
	public function getContentCategoryByName($name, $currentContentCategory);
	public function updateAlias($id, $name);
	public function stripUnicode($str);	
	public function setPublishAction($listid);
	public function setUnPublish($listid);
	public function setPublishCatAjax($id);
	public function autoSuggestionCat($name);
	public function searchCat($name);
}