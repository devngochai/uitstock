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
	public function getPlayerByEmail($email, $currentPlayer);
	public function autoSuggestion($username);
}