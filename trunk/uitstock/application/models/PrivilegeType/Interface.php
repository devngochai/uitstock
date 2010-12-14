<?php
interface Cloud_Model_PrivilegeType_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_PrivilegeType_CloudPrivilegeType $privilegeType);
	public function find($id, Cloud_Model_PrivilegeType_CloudPrivilegeType $privilegeType);
	public function delete($id);
	public function fetchAll();
	public function getPrivilegeTypeByModule($moduleId);
	public function getPrivilegeTypeByName($name, $currentPrivilegeType);
	public function getShortcutById($id);
	public function getButton1ById($id, $moduleId);	
	public function getButton2ById($id, $moduleId);
}