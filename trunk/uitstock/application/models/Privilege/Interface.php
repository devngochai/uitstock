<?php
interface Cloud_Model_Privilege_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function save(Cloud_Model_Privilege_CloudPrivilege $privilege);
	public function saveAll($data, $id);
	public function find($id, Cloud_Model_Privilege_CloudPrivilege $privilege);
	public function delete($id);
	public function update($moduleId, $privilegeId);	
	public function fetchAllPrivilege();
	public function getPrivilegeById($id);
	public function getMaxOrder($moduleId);
	public function getAccessPrivilege();
}