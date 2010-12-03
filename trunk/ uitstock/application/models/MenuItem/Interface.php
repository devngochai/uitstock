<?php
interface Cloud_Model_MenuItem_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_MenuItem_CloudMenuItem $menuItem);
	public function find($id, Cloud_Model_MenuItem_CloudMenuItem $menuItem);
}