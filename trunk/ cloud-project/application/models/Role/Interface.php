<?php
interface Cloud_Model_Role_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Role_CloudRole $role);	
	public function find($id, Cloud_Model_Role_CloudRole $role);
	public function fetchAll();
}