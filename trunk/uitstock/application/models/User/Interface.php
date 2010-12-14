<?php
interface Cloud_Model_User_Interface
{
	public function setDbTable($dbTable);
	public function getDbTable();
	public function getEntry($row);
	public function getEntries($rows);
	public function uploadAvatar($avatar, $email);
	public function save(Cloud_Model_User_CloudUser $user);
	public function updateAvatar($id, $user, $avatar);
	public function find($id, Cloud_Model_User_CloudUser $user);
	public function findUserByEmail($email);
	public function deleteAll($listid);
	public function fetchAll($page);
	public function getUserByEmail($email, $currentUser);	
	public function isValidate($email, $password);
}