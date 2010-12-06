<?php
interface Cloud_Model_Article_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Article_CloudArticle $article);
	public function find($id, Cloud_Model_Article_CloudArticle $article);
	public function delete($listid);
	public function updateAlias($id, $name);
	public function updateRelative($id, $listId);
	public function updateImage($id, $path);
	public function updateImage2($id, $image, $path, $fileName);
	public function fetchArticleByPage($page);	
	public function fetchArticleBySub($id);
	public function getArticleById($id);
	public function getArticleByAlias($alias);
	public function getArticleByParent($id, $from, $end);
	public function getArticleBySub($id, $from, $end);	
	public function getArticleInParent($id, $alias, $from, $end);
	public function getArticleInSub($id, $alias, $from, $end);
	public function getRelativeArticle($id);
	public function getImportantArticle($from, $end);
	public function getMostCountArticle($from, $end);
	public function setImportant($listid);
	public function setNormal($listid);
	public function autoSuggestionArticle($title);
	public function searchArticle($name);
}