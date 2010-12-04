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
	public function updateRelative($id, $listId);
	public function updateImage($id, $path);
	public function fetchArticleByPage($page);	
	public function getArticleById($id);	
	public function autoSuggestionCat($name);
	public function searchArticle($name);
}