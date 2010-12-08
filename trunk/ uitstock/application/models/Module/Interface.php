<?php
interface Cloud_Model_Module_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_module_CloudModule $module);
	public function find($id, Cloud_Model_Module_CloudModule $module);
	public function fetchAll($page);
}