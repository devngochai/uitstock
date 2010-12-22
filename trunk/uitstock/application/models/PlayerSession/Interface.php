<?php
interface Cloud_Model_PlayerSession_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);	
	public function save(Cloud_Model_PlayerSession_CloudPlayerSession $playerSession);
	public function find($id, Cloud_Model_PlayerSession_CloudPlayerSession $playerSession);
	public function checkOnline();			
	public function getAllOnline();
	public function getUserOnline();			
}