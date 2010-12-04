<?php
interface Cloud_Model_Article_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Article_CloudArticle $article);
	public function find($id, Cloud_Model_Article_CloudArticle $article);	
	public function updateAlias($id, $name);
	public function stripUnicode($str);	
	public function setPublishAction($listid);
	public function setUnPublish($listid);
	public function setPublishCatAjax($id);
	public function autoSuggestionCat($name);
	public function searchArticle($name);
}