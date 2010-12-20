<?php
interface Cloud_Model_Player_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);	
	public function save(Cloud_Model_Player_CloudPlayer $player);	
	public function searchPlayer($username);	
	public function deleteAll($listid);
	public function fetchAll($page);
	public function getPlayerByUsername($username, $currentPlayer);
	public function getPlayerByEmail($email, $currentPlayer);
	public function getPlayerByPassword($password, $currentPlayer);
	public function autoSuggestion($username);
	public function isValidate($username, $password);
	public function login($username, $password, $remember = null);
	public function getNumberUser();
	public function getUserNameById($listId);	
	public function showPaging($page, $number, $link, $imgDir);
	public function paging($pageCount, $currentPage, $totalPages, $link, $imgDir);
}