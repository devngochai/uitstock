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
	public function searchUser($full_name);
	public function findUserByEmail($email);
	public function deleteAll($listid);
	public function fetchAll($page);
	public function fetchUserById($listId, $page);
	public function fetchUserOnline($from, $end);
	public function getUserByEmail($email, $currentUser);
	public function getUserByPassword($password, $currentUser);	
	public function getUserById($id);
	public function getRolePrivilegeById($id);
	public function isValidate($email, $password);
	public function autoSuggestion($full_name);
	public function showPaging($number, $updateLink, $link, $imgDir);
	public function paging($number, $totalPages, $updateLink, $link, $imgDir);
	public function updateTotalPages($number);
}