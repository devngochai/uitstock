<?php
interface Cloud_Model_UserSession_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);	
	public function save(Cloud_Model_UserSession_CloudUserSession $userSession);
	public function find($id, Cloud_Model_UserSession_CloudUserSession $userSession);
	public function deleteSession($userId);
	public function checkOnline();					
}