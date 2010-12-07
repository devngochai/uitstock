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
	public function updateAlias($id, $name);
	public function fetchParentByPage($page);
	public function fetchAllParent();
	public function fetchAllSub();	
	public function getContentCategoryByName($name, $currentContentCategory);
	public function getSubNameById($parentId);	
	public function getNewsParent();
	public function getNewsSub($id);
	public function getNameByAlias($id);
	public function getAliasByArticle($articleId);		
	public function autoSuggestionCat($name);
	public function searchCat($name);
}